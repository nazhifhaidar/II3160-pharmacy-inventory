<?php

namespace App\Controllers;
use App\Models\Cocoone;
use App\Models\StockPredictionModel;
use App\Models\Drugs;

class Home extends BaseController
{
    public function index(): string
    {
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
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Connection: keep-alive', 'Content-Length: '.strlen($jsonData)));
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // Set timeout in seconds
        $requestBody = curl_getinfo($ch, CURLOPT_POSTFIELDS);
        // echo $requestBody;

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
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

        }else{
            $apiData = json_decode($response, true);
            
        }

        // Close cURL session
        curl_close($ch);

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

        return view('header').view('menu').view('dashboard', ['data' => $data['data'], 'fields' => $data['fields']]).view('footer');
    }
}
