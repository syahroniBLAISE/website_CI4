<?php namespace App\Controllers;

use App\Models\loginModel;

class loginController extends BaseController
{

	public function index()
	{
		return view('login/index');
   }
   
   public function login_action() 
   {
     $userLogin = true;
      if($userLogin == true)
      {
         return redirect()->to(base_url('admin'));
      }else{
         return redirect()->to(base_url('LoginController'));
      }
   }

	//--------------------------------------------------------------------

}