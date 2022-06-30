<?php 
namespace App\Controllers;

use App\models\produkModel;
use App\models\halamanModel;
use App\models\stokKaosModel;
use App\models\catatanPenjualanModel;

class adminController extends BaseController
{
    public function __construct()
    {
        // $dataBarang = new produkModel();
        // $dataHalaman = new halamanModel();
        $this->dataHalaman = new halamanModel();
        $this->stokKaosModel = new stokKaosModel();
        $this->catatanPenjualanModel = new catatanPenjualanModel();
        // $kaosModel = new kaosModel();
        
    }
    public function index()
    {
        $userLogin = true;
        if($userLogin == true)
        {  $data = [
                'title' => 'HALAMAN ADMIN UTAMA',
                'data_halaman' => $this->dataHalaman->get_data_all(),
                'pemasukan' => $this->catatanPenjualanModel->getTotalPenjualan()              
                // 'pengeluaran' => $this->catatanPenjualanModel->getTotalPengeluaran()               
            ];
            return view('admin/index', $data);
        }else{
            return view('login/index');
        }

    }

    public function totalPenjualan(){
        $userLogin = true;
        if($userLogin == true)
        {  $data = [
                'title' => 'HALAMAN ADMIN UTAMA',
                'data_halaman' => $this->dataHalaman->get_data_all(),
                'pemasukan' => $this->catatanPenjualanModel->getTotalPenjualan()                         
            ];
            return view('admin/index', $data);
        }else{
            return view('login/index');
        }
    }
    public function adminToko()
    {
        // session();
        // $data = $dataBarang->get_data_all();
        $produkModel = new produkModel();
        $dataHalaman = new halamanModel();
        // $kaosModel = new kaosModel();
        
        $data = [
            'title' => 'HALAMAN ADMIN TOKO',
            'data_kaos' => $produkModel->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/adminToko', $data);

    }
    

    public function adminKaos()
    {
        // session();
        // $data = $dataBarang->get_data_all();
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
        $data = [
            'title' => 'HALAMAN ADMIN KAOS',
            'data_produk' => $dataBarang->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
            
        ];
        // dd($data);
        return view('admin/kelolaKaos', $data);

    }
    public function adminStokKaos()
    {
        $page = $this->request->getVar('page_data_produk') ? $this->request->getVar('page_data_produk') : 1 ;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $data_produk = $this->stokKaosModel->search($keyword);
        }else{
            $data_produk = $this->stokKaosModel;
        }
        
        // dd($keyword);
        // dd($page);
        $data = [
            'title' => 'HALAMAN STOK KAOS',
            // 'data_produk' => $this->catatanPenjualanModel->findAll(),
            'data_produk' => $data_produk->paginate(3, "data_produk"),
            // 'data_produk' => $this->catatanPenjualanModel->paginate(3),
            'data_halaman' => $this->dataHalaman->findAll(),
            'pager' => $data_produk->pager,
            'page' => $page
            // 'validation' => \Config\Services::validation(),
        ];
        return view('admin/adminStokKaos', $data);

    }

    public function catatanPenjualan()
    {
        $page = $this->request->getVar('page_data_produk') ? $this->request->getVar('page_data_produk') : 1 ;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $catatan_penjualan_model = $this->catatanPenjualanModel->search($keyword);
        }else{
            $catatan_penjualan_model = $this->catatanPenjualanModel;
        }
        // dd($keyword);
        // dd($page);
        $data = [
            'title' => 'HALAMAN STOK KAOS',
            // 'data_produk' => $this->stokKaosModel->findAll(),
            'catatan_penjualan' => $catatan_penjualan_model->paginate(4, "catatan_penjualan"),
            // 'data_produk' => $this->stokKaosModel->paginate(3),
            'data_halaman' => $this->dataHalaman->findAll(),
            'pager' => $this->catatanPenjualanModel->pager,
            'page' => $page
            // 'validation' => \Config\Services::validation(),
        ];
        return view('admin/adminCatatanKeuangan', $data);

    }

    public function kelolaHalaman()
    {
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
        $data = [
            'title' => 'KELOLA HALAMAN ADMIN',
            'data_produk' => $dataBarang->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/kelolaHalaman', $data);

    }

    public function adminProduk()
    {
        $dataBarang = new produkModel();
        $dataHalaman = new halamanModel();
        
        $data = [
            'title' => 'KELOLA HALAMAN PRODUK',
            'data_produk' => $dataBarang->get_data_all(),
            'data_halaman' => $dataHalaman->get_data_all(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/adminProduk', $data);

    }
    public function getProduk()
    {
        $dataBarang = new produkModel();
        $data = $dataBarang->get_data_all();
        return $data;

    }
}


?>