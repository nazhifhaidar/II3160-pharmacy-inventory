<?php
namespace App\Controllers;
use App\Models\Cocoone;

class DashboardController extends BaseController{
    public function index(){
        $model = model(Cocoone::class);
        $data = $model->getDataCocoon(10);
        echo $model->getLastQuery(); // Output the last executed query
        // echo view('dashboard', $data);
        return view('header').view('menu').view('dashboard', $data).view('blog').view('footer');
    }
}