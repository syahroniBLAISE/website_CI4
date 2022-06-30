<?php 
namespace App\Controllers;

use \App\Models\halamanModel;

class halamanController extends BaseController
{       
    protected $halamanModel;
    public function __construct()
    {
        $this->halamanModel = new halamanModel();
    }

    public function getHalamanAll(){

        echo json_encode($this->halamanModel->get_data_all());
    }

    public function getHalaman()
    {
        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            $data = json_encode($this->halamanModel->find($id));
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }

    public function uploadCSVHalaman(){
        if(isset($_POST['upload'])){

        $file = $this->request->getFile('csv');
        $extensiFile = $file->guessExtension();
        if($extensiFile == 'csv'){
            $file->move('img');
            $namaFile = $file->getName();
            $file_path = 'img/';



            if(file_exists($file_path.$namaFile)){
                $open = fopen('img/'.$namaFile, 'r');
                while(($row = fgetcsv($open, 1000, ';'))!== FALSE){

                    $data = [
                            'namH_halaman'=> $row[0],
                            'harHa_halaman'=> $row[1],
                            'gamHar_halaman'=> $row[2],
                            'thuHbnail_halaman'=> $row[3],
                            'katHgori_halaman'=> $row[4],
                            'warHa_halaman'=> $row[5],
                            'waktu_update'=> date("j, n, Y")
                        ];
                    $this->halamanModel->insert($data);
                }
                return redirect()->to('admHnhalaman');
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }

    }
 
    public function tambahHalaman()
    {
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'judul_halaman' => 'required',
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $date = date("j, n, Y");
                    $data = [
                        'judul_halaman'=> $this->request->getVar('judul_halaman') ,
                        'url_halaman'=> $this->request->getVar('url_halaman') ,
                        'content_halaman'=> $this->request->getVar('content_halaman')
                    ];
                    $this->halamanModel->insert($data);
                    echo json_encode(true);
    
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusHalaman()
    {
        $id = $this->request->getVar('id_halaman');
        $this->halamanModel->where('id_Halaman',$id)->delete();
        echo json_encode(true);

    }

    
    public function updateHalaman()
    {
        // echo json_encode('controler updHtehalaman');
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'judul_halaman' => 'required'
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $id = $this->request->getVar('id_halaman');
                    $data = [
                        'judul_halaman'=> $this->request->getVar('judul_halaman') ,
                        'url_halaman'=> $this->request->getVar('url_halaman') ,
                        'content_halaman'=> $this->request->getVar('content_halaman') 
                    ];
                    $this->halamanModel->update($id,$data);
                    echo json_encode(true);
    
                }
        }else{
            exit('tidak bisa di akses');
        }
        
    }

    public function cart(){
        $cart = \Config\Services::cart();
        // $data = ['nama' => $this->request->getVar('nama_produk')];
        // dd($data);
        $cart->insert(array(
            'id'      => $this->request->getVar('id_produk'),
            'qty'     => $this->request->getVar('qty'),
            'price'   => $this->request->getVar('harga_produk'),
            'name'    => $this->request->getVar('nama_produk') ,
            'options' => array('img_produk' => $this->request->getVar('img_produk'))
            ));

        // $data = json_encode($cart->contents()) ;
        // $cart->destroy();
        // // $data = count($data);
        // dd($data);
        // echo($data);
        // echo'<prev>';
        // print_r($data);
        // echo'</prev>';
        // sesion()->setFlasData('pesan' ,'produk berhasil di tambahkan ke keranjang');
        return redirect()->to(base_url());
    }

    public function cek(){
        $cart = \Config\Services::cart();
        $data = $cart->contents();
        dd($data);
    }

    public function clearCart(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url());

    }
    
}


?>