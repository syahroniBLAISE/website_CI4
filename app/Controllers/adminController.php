<?php 
namespace App\Controllers;

use App\models\produkModel;

class adminController extends BaseController
{
    public function index()
    {
        return view('admin/index');
    }
    public function adminToko()
    {
        session();
        $dataBarang = new produkModel();
        // $data = $dataBarang->get_data_all();
        $data = [
            'title' => 'DATA PRODUK',
            'data_produk' => $dataBarang->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/adminToko', $data);

    }
    public function getProduk()
    {
        $dataBarang = new produkModel();
        $data = $dataBarang->get_data_all();
        return $data;

    }
}


?>