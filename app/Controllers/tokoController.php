<?php 
namespace App\Controllers;

use App\models\produkModel;

class  tokoController extends BaseController
{
    public function index(){       
        $dataBarang = new produkModel();
        $data = $dataBarang->get_data_all();
        return view('toko/produkToko', compact('data'));
    }

    
}


?>