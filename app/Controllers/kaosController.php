<?php 
namespace App\Controllers;

use \App\Models\kaosModel;

class kaosController extends BaseController
{       
    protected $kaosModel;
    public function __construct()
    {
        $this->kaosModel = new kaosModel();
    }

    public function getKaosAll(){

        echo json_encode($this->kaosModel->get_data_all());
    }

    public function getKaos()
    {
        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            $data = json_encode($this->kaosModel->find($id));
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }

    public function uploadCSVKaos(){
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
                            'nama_kaos'=> $row[0],
                            'harga_kaos'=> $row[1],
                            'gambar_kaos'=> $row[2],
                            'thumbnail_kaos'=> $row[3],
                            'kategori_kaos'=> $row[4],
                            'warna_kaos'=> $row[5],
                            'waktu_update'=> date("j, n, Y")
                        ];
                    $this->kaosModel->insert($data);
                }
                return redirect()->to('adminKaos');
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }

    }
 
    public function tambahKaos()
    {
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_kaos' => 'required',
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $date = date("j, n, Y");
                    $data = [
                        'nama_kaos'=> $this->request->getVar('nama_kaos') ,
                        'harga_kaos'=> $this->request->getVar('harga_kaos') ,
                        'gambar_kaos'=> $this->request->getVar('gambar_kaos') ,
                        'thumbnail_kaos'=> $this->request->getVar('thumbnail_kaos') ,
                        'kategori_kaos'=> $this->request->getVar('kategori_kaos') ,
                        'warna_kaos'=> $this->request->getVar('warna_kaos') ,
                        'waktu_update'=> date("j, n, Y")
                    ];
                    $this->kaosModel->insert($data);
                    echo json_encode(true);
    
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusKaos()
    {
        $id = $this->request->getVar('id_kaos');
        $this->kaosModel->where('id_kaos',$id)->delete();
        echo json_encode(true);

    }

    
    public function updateKaos()
    {
        // echo json_encode('controler updateKaos');
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_kaos' => 'required'
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $id = $this->request->getVar('id_kaos');
                    $data = [
                        'nama_kaos'=> $this->request->getVar('nama_kaos') ,
                        'harga_kaos'=> $this->request->getVar('harga_kaos') ,
                        'gambar_kaos'=> $this->request->getVar('gambar_kaos') ,
                        'thumbnail_kaos'=> $this->request->getVar('thumbnail_kaos') ,
                        'kategori_kaos'=> $this->request->getVar('kategori_kaos') ,
                        'warna_kaos'=> $this->request->getVar('warna_kaos') ,
                        'waktu_update'=> date("j, n, Y")
                    ];
                    $this->kaosModel->update($id,$data);
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