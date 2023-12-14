<?php
require 'vendor/autoload.php';

use Phpml\Regression\LeastSquares;
use App\Prediction\ARIMA;

$modelData = file_get_contents('trained_model.dat');
$model = unserialize($modelData);
$futureDate = '2023-12-14';
$futureTimestamp = strtotime($futureDate);
$currentStock = 44;

$predictedTimestamp = $model->predict([$currentStock, $futureTimestamp]);

// Convert predicted timestamp to a human-readable date
$predictedDate = date('Y-m-d', $predictedTimestamp);

echo "Stok akan habis pada tanggal $predictedDate\n";