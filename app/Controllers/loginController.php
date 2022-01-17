<?php namespace App\Controllers;

use App\Models\loginModel;
use App\Models\halamanModel;

class loginController extends BaseController
{
   protected $dataHalaman;
   public function __construct()
   {
       $this->dataHalaman = new halamanModel();
      
   }
	public function index()
	{
		return view('login/index');
   }
   
   public function login_action() 
   {
     $userLogin = true;
      if($userLogin == true)
      {  $data = [
            'title' => 'HALAMAN ADMIN UTAMA',
            'data_halaman' => $this->dataHalaman->get_data_all()
            
        ];
         return view('admin/index', $data);
      }else{
         return view('login');
      }
   }

	//--------------------------------------------------------------------

}