<?php 
namespace App\Controllers;

use App\models\produkModel;
use App\models\halamanModel;

class adminController extends BaseController
{
    public function __construct()
    {
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
    }
    public function index()
    {
        // $data = [
        //     'title' => 'HALAMAN ADMIN UTAMA',
        //     // 'data_produk' => $this->dataBarang->get_data_all(),
        //     'data_halaman' => $this->dataHalaman->get_data_all()
        //     // 'validation' => \Config\Services::validation(),
        // ];
        // return view('admin/index', $data);
    }
    public function adminToko()
    {
        // session();
        // $data = $dataBarang->get_data_all();
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
        $data = [
            'title' => 'HALAMAN ADMIN TOKO',
            'data_produk' => $dataBarang->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/adminToko', $data);

    }

    public function kelolaHalaman()
    {
        // session();
        // $data = $dataBarang->get_data_all();
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
        $data = [
            'title' => 'KELOLA HALAMAN',
            'data_produk' => $dataBarang->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/kelolaHalaman', $data);

    }
    public function getProduk()
    {
        $dataBarang = new produkModel();
        $data = $dataBarang->get_data_all();
        return $data;

    }
}


?>