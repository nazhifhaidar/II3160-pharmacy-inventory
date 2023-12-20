<?php

namespace App\Controllers;

use App\Models\Cocoone;
use App\Models\StockPredictionModel;
use App\Models\Drugs;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        $url = getenv('SERVICE_URL').'/api/summary';
        $method = 'GET';
        $client = \Config\Services::curlrequest();
        $client->setHeader('Content-Type', 'application/json');
        $response = $client->request($method, $url);
        $result = json_decode($response->getBody(), true);
        $title = 'Dashboard';
        return view('header', ['title'=>$title]) . view('menu') . view('dashboard', ['summary'=>$result]) . view('footer');
    }
}
