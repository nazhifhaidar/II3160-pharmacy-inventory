<?php
namespace App\Controllers;

use App\Models\Drugs;

class RestockController extends BaseController{
    public function restock(){
        $id = $this->request->getPost('drugsId');
        $amount = (int)$this->request->getPost('restockAmount');
        $drugsModel = new Drugs();
        $result = $drugsModel->restock($id, $amount);

        // Redirect or return a response based on the result
        if ($result){
            return redirect()->to('/inventory');
        }
        else {
            return view('error',  ['message'=>$result]);
        }
        
    }
}