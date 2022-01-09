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
        $dataBarang = new produkModel();
        $data = $dataBarang->get_data_all();
        return view('admin/adminToko', compact('data'));

    }
}


?>