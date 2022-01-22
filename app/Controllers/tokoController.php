<?php 
namespace App\Controllers;

use App\models\produkModel;
use App\models\kaosModel;

class  tokoController extends BaseController
{   
    protected $produkMode;
    protected $kaosModel;
    
    public function __construct(){
        $this->produkModel = new produkModel();
        $this->kaosModel = new kaosModel();
    }
    public function index(){  
        session();                         
        $data = [
            'title' => 'PARTNERSABLON',
            'data' => $this->produkModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];

        return view('toko/index', $data);
    }

    public function tokoLink(){                       
        $data = [
            'title' => 'PARTNERSABLON'
        ];

        return view('toko/link', $data);
    }
    public function kaos(){  
        session();                         
        $data = [
            'title' => 'KAOS KOZE',
            'kaos' => $this->kaosModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];

        return view('toko/kaosKoze', $data);
    }
    public function konveksi(){  
        session();                         
        $data = [
            'title' => 'KONVEKSI',
            'data' => $this->produkModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];

        return view('toko/konveksi', $data);
    }

    public function produk(){  
        session();                         
        $data = [
            'title' => 'PARTNERSABLON',
            'data' => $this->produkModel->get_data_all(),
            'cart' =>  \Config\Services::cart()
        ];

        return view('toko/listProdukTesting', $data);
    }

    public function galery(){  
        $data = [
            'title' => 'PARTNERSABLON'
        ];

        return view('toko/galery', $data);
    }

    // public function index2(){   
    //     session();    
    //     $data = [
    //         'title' => 'PARTNERSABLON',
    //         'data' => $this->produkModel->get_data_all(),
    //         'cart' =>  \Config\Services::cart()
    //     ];
        
    //     return view('toko/produkToko', $data);
    // }

    
}


?>