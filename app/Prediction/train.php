<?php
//train.php
require 'vendor/autoload.php';

use Phpml\Regression\LeastSquares;

class StockPredictionModel
{
    private $dates = [];
    private $stock = [];

    private $model;

    public function simulateData($initialDate, $initialStock, $stockDecreasePattern, $numDays = 300)
    {
        $currentDate = $initialDate;
        $currentStock = $initialStock;

        for ($i = 0; $i < $numDays; $i++) {
            $this->dates[] = $currentDate;
            $this->stock[] = max(0, $currentStock);

            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));

            if ($currentStock <= 0) {
                $currentStock = 100;
            } else {
                $currentStock -= $stockDecreasePattern[$i % count($stockDecreasePattern)];
            }
        }
    }

    public function trainAndSaveModel()
    {
        $timestamps = array_map('strtotime', $this->dates);
        $trainingData = array_map(null, $timestamps);
        $trainingData = array_map(function ($value) {
            return [$value];
        }, $this->stock);

        $model = new LeastSquares();
        $model->train($trainingData, $timestamps);
        $this->model = $model;

        file_put_contents('trained_model.dat', serialize($model));
    }

    public function dayLeftPrediction($timestamp, $stock)
    {
        // Your logic for predicting the days left based on the trained model
        $predictedTimestamp = $this->model->predict([$stock, $timestamp]);
        $predictedDate = new DateTime(date('Y-m-d', $predictedTimestamp));
        $lastDate = new DateTime(end($this->dates));

        // Calculate the interval between the predicted date and the last date
        $interval = $predictedDate->diff($lastDate);

        // Extract the number of days from the interval
        $daysLeft = $interval->days;

        return $daysLeft;
    }
}

// Example Usage
$model = new StockPredictionModel();

$initialDate = '2023-01-01';
$initialStock = 100;
$stockDecreasePattern = [8, 7, 8, 7, 7, 9, 7, 8, 5, 7, 4, 3, 6, 5, 5, 6, 4];

$model->simulateData($initialDate, $initialStock, $stockDecreasePattern);
$model->trainAndSaveModel();

// Example for day left prediction
$timestamp = strtotime('2023-08-15');
$stock = 32;
$daysLeft = $model->dayLeftPrediction($timestamp, $stock);

echo "Predicted days left: $daysLeft";
