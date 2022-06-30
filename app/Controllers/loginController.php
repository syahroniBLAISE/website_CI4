<?php namespace App\Controllers;

// use App\Models\loginModel;
use App\Models\halamanModel;
use App\Models\UsersModel;
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
        //  return view('login/index');
        return view('toko/index');


    }
	public function loginRegister()
    {
        return view('login/vw_register');
    }
   public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name')
        ]);
        return redirect()->to('login');
    }
    public function loginProses()
    {
        
        // $users = new UsersModel();
        // $username = $this->request->getVar('username');
        // $password = $this->request->getVar('password');
        // $dataUser = $users->where([
        //     'username' => $username,
        // ])->first();
        // if ($dataUser) {
        //     if (password_verify($password, $dataUser->password)) {
        //         session()->set([
        //             'username' => $dataUser->username,
        //             'name' => $dataUser->name,
        //             'logged_in' => TRUE
        //         ]);
        //         return redirect()->to(base_url('admin'));
        //     } else {
        //         session()->setFlashdata('error', 'Username & Password Salah');
        //         return redirect()->back();
        //     }
        // } else {
        //     session()->setFlashdata('error', 'Username & Password Salah');
        //     return redirect()->back();
        // }

        return redirect()->to(base_url('admin'));
    }

 
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
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
         return view('login/index');
      }

      return view('admin/index', $data);
   }

}