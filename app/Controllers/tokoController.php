<?php 
namespace App\Controllers;

use App\models\produkModel;

class  tokoController extends BaseController
{   
    protected $produkMode;
    public function __construct(){
        // $this->cart = new \Config\Services::cart();
        $this->produkModel = new produkModel();
    }
    public function index(){  
        session();       
        $data = [
            'title' => 'PARTNERSABLON',
            'data' => $this->produkModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];

        return view('toko/listProdukTesting', $data);
    }

    public function index2(){   
        session();    
        $data = [
            'title' => 'PARTNERSABLON',
            'data' => $this->produkModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];
        
        return view('toko/produkToko', $data);
    }

    
}


?>