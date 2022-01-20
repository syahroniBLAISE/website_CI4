<?php namespace App\Controllers;

// use App\Models\loginModel;
use App\Models\halamanModel;
// use App\libraries\kunjunganCounter;

class loginController extends BaseController
{
   protected $dataHalaman;
   public function __construct()
   {
       $this->dataHalaman = new halamanModel();
      //  $this->load->library('kunjunganCounter');
      // require_once(APPPATH.'libraries/kunjunganCounter.php');
      
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

}