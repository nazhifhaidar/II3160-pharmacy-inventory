<?php
namespace app\Controllers;
class Inventory extends BaseController
{
    public function index() : string 
    {
        return view('inventory');
    }
}