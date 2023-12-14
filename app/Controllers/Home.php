<?php

namespace App\Controllers;
use App\Models\Cocoone;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(Cocoone::class);
        $data = $model->getDataCocoon(10);
        return view('header').view('menu').view('dashboard', $data).view('footer');
    }
}
