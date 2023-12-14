<?php

namespace App\Controllers;
use App\Models\Cocoone;
use App\Models\Drugs;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(Drugs::class);
        $data = $model->getDataDrugs();
        return view('header').view('menu').view('dashboard', $data).view('footer');
    }
}
