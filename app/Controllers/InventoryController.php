<?php
namespace App\Controllers;
class InventoryController extends BaseController
{
    public function index()
    {
        return view("inventory");
    }
}