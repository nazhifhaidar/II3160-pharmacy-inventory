<?php

namespace App\Controllers;

use App\Models\StockPredictionModel;
use App\Models\Drugs;

class InventoryController extends BaseController
{
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        $model = model(Drugs::class);
        $data = $model->getDataDrugs();

        $apiUrl = base_url('api/prediction');
        // $apiUrl = '/api/prediction';
        /* echo $apiUrl;
        echo "<br>"; */
        $currentDate = date('Y-m-d');
        $predictions = array_map(function ($item) use ($currentDate) {
            return ['timestamp' => $currentDate, 'stock' => (int) $item->stock];
        }, $data['data']);

        $postData = ['predictions' => $predictions];

        // echo (json_encode($postData));
        $jsonData = json_encode($postData);
        /* echo json_encode($postData, JSON_PRETTY_PRINT); */

        // echo $jsonData."<br>";

        // $client= \Config\Services::curlrequest();

        // echo 'Curl error: ' . curl_error($ch)."<br>";
        $stockModel = new StockPredictionModel();
        $initialDate = '2023-01-01';
        $initialStock = 100;
        $stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

        $stockModel->simulateData($initialDate, $initialStock, $stockDecreasePattern);

        // Perform training and prediction using the StockPredictionModel
        $stockModel->trainAndSaveModel();
        $predictionsResult = [];
        foreach ($predictions as $prediction) {
            $timestamp = $prediction["timestamp"];
            $stock = $prediction['stock'];
            $daysLeft = $stockModel->dayLeftPrediction($timestamp, $stock);

            $predictionsResult[] = [
                'timestamp' => $timestamp,
                'predicted_days_left' => $daysLeft,
            ];
        }
        $apiData = $predictionsResult;


        // Process $response as needed
        /* print_r($apiData); */


        // Check if decoding was successful
        if ($apiData === null && json_last_error() !== JSON_ERROR_NONE) {
            // echo 'Error decoding JSON: ' . json_last_error_msg();
        } else {
            $data['fields'][] = 'Predicted Days to Depleted';
            foreach ($apiData as $key => $prediction) {
                $data['data'][$key]->{'Predicted Days to Depleted'} = $prediction['predicted_days_left'] ?? null;
            }
        }
        return view("inventorywithpopup", ['data' => $data['data'], 'fields' => $data['fields']]);
    }
}
