<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Cocoone;
use App\Models\Drugs;
use App\Models\StockPredictionModel;
use CodeIgniter\CLI\CLI;


class DatabaseAPI extends ResourceController
{
    public function restockDrugs($id)
    {
        $json = $this->request->getJSON();
        $amount = $json->amount;
        $model = model(Drugs::class);
        $updatedRows = $model->restock($id, $amount);

        if ($updatedRows > 0) {
            // log_message('info', json_encode(['message' => 'Restock successful']));
            // CLI::write(json_encode(['message' => 'Restock successful']));
            return $this->respond(['message' => 'Restock successful', 'data'=> $updatedRows], 200);
            
        } else {
            // log_message('info', json_encode(['message' => 'Restock failed']));
            // CLI::write(json_encode(['message' => 'Restock failed']));
            return $this->respond(['message' => 'Restock failed'], 500);
        }
    }
}
