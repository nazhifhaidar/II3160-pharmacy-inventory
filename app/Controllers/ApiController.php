<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Cocoone;
use App\Models\Drugs;
use App\Models\StockPredictionModel;

class ApiController extends ResourceController
{
    public function getData()
    {
        $data = model(Drugs::class)->findAll();
        return $this->respond($data);
    }

    public function postPrediction()
    {
        try {
            // Get JSON data from the request
            $json = $this->request->getJSON();
            // var_dump($json); 

            // Access the data from the JSON body
            $predictions = $json->predictions;

            // Validate input data if necessary

            // Create an instance of StockPredictionModel
            $stockModel = new StockPredictionModel();
            $initialDate = '2023-01-01';
            $initialStock = 100;
            $stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

            $stockModel->simulateData($initialDate, $initialStock, $stockDecreasePattern);

            // Perform training and prediction using the StockPredictionModel
            $stockModel->trainAndSaveModel();
            $predictionsResult = [];
            foreach ($predictions as $prediction) {
                $timestamp = $prediction->timestamp;
                $stock = $prediction->stock;
                $daysLeft = $stockModel->dayLeftPrediction($timestamp, $stock);

                $predictionsResult[] = [
                    'timestamp' => $timestamp,
                    'predicted_days_left' => $daysLeft,
                ];
            }

            // Return the result as a JSON response
            return $this->respond($predictionsResult);
        } catch (\Exception $e) {
            // Handle exceptions and respond with an error
            log_message('error', 'Exception: ' . $e->getMessage() . "\n" . $e->getTraceAsString());

            // Handle exceptions and respond with an error
            return $this->failServerError('Internal Server Error: ' .  $e->getTraceAsString());
        }
    }

    public function getDataAndTheirPredictions()
    {
        try {
            $data = model(Drugs::class)->findAll();
            $stockModel = new StockPredictionModel();
            $initialDate = '2023-01-01';
            $initialStock = 100;
            $stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

            $stockModel->simulateData($initialDate, $initialStock, $stockDecreasePattern);

            // Perform training and prediction using the StockPredictionModel
            $stockModel->trainAndSaveModel();
            $predictionsResult = [];
            foreach ($data as $index => $record) {
                $timestamp = date('Y-m-d');
                $stock = $record["stock"];
                $daysLeft = $stockModel->dayLeftPrediction($timestamp, $stock);

                $predictionsResult[] = [
                    'predicted_days_left' => $daysLeft,
                ];
            }

            //merge data with $predictionsResult
            $result = [];
            foreach ($data as $index => $record) {
                $result[] = array_merge($record, $predictionsResult[$index]);
            }

            // Return the result as a JSON response
            return $this->respond($result);
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage() . "\n" . $e->getTraceAsString());

            // Handle exceptions and respond with an error
            return $this->failServerError('Internal Server Error: ' .  $e->getTraceAsString());
        }
    }

    public function getDataAndItsPrediction($id)
    {
        try {
            $model = new Drugs();
            $data = $model->getDataDrug($id);

            if (empty($data['data'])) {
                return $this->failNotFound('Drug not found');
            }

            $data = $data['data'];
            $stockModel = new StockPredictionModel();
            $initialDate = '2023-01-01';
            $initialStock = 100;
            $stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

            $stockModel->simulateData($initialDate, $initialStock, $stockDecreasePattern);

            // Perform training and prediction using the StockPredictionModel
            $stockModel->trainAndSaveModel();
            $timestamp = date('Y-m-d');
            $stock = $data["stock"];
            $daysLeft = $stockModel->dayLeftPrediction($timestamp, $stock);

            $predictionsResult = [
                'predicted_days_left' => $daysLeft,
            ];
            $result =  array_merge($data, $predictionsResult);
            return $this->respond($result);
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage() . "\n" . $e->getTraceAsString());

            // Handle exceptions and respond with an error
            return $this->failServerError('Internal Server Error: ' .  $e->getTraceAsString());
        }
    }
}
