<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Cocoone;
use App\Models\StockPredictionModel;

class ApiController extends ResourceController{
    public function getData(){
        $data = model(Cocoone::class)->findAll();
        return $this->respond($data);
    }

    public function postPrediction(){
        try {
            // Get JSON data from the request
            $json = $this->request->getJSON();

            // Access the data from the JSON body
            $timestamp = $json->timestamp;
            $stock = $json->stock;

            // Validate input data if necessary

            // Create an instance of StockPredictionModel
            $stockModel = new StockPredictionModel();
            $initialDate = '2023-01-01';
            $initialStock = 100;
            $stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

            $stockModel->simulateData($initialDate, $initialStock, $stockDecreasePattern);

            // Perform training and prediction using the StockPredictionModel
            $stockModel->trainAndSaveModel();
            $daysLeft = $stockModel->dayLeftPrediction($timestamp, $stock);

            // Return the result as a JSON response
            return $this->respond(['predicted_days_left' => $daysLeft]);

        } catch (\Exception $e) {
            // Handle exceptions and respond with an error
            log_message('error', 'Exception: ' . $e->getMessage() . "\n" . $e->getTraceAsString());

            // Handle exceptions and respond with an error
            return $this->failServerError('Internal Server Error: ' .  $e->getTraceAsString());
        }
    }
}