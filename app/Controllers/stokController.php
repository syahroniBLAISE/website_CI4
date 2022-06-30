<?php 
namespace App\Controllers;

use \App\Models\stokKaosModel;

class stokController extends BaseController
{       
    protected $stokKaosModel;
    public function __construct()
    {
        $this->stokKaosModel = new stokKaosModel();
    }

    public function getStokAll(){
        
        if ($this->request->isAJAX()){
            $data =[
            'item' => $this->stokKaosModel->paginate(3),
            'pager' => $this->stokKaosModel->pager
            ];
            echo json_encode($data);

        }else{
            exit('tidak bisa');
        }
    }

    public function getStok()
    {

        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            $data = json_encode($this->stokKaosModel->find($id));
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }

    public function uploadCSVStok(){
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
                            'nama_produk'=> $row[0],
                            'warna_kaos'=> $row[1],
                            'size_kaos'=> $row[2],
                            'jumlah_stok'=> $row[3],
                            'kategori'=> $row[4]
                        ];
                    $this->stokKaosModel->insert($data);
                }
                return redirect()->to('adminStokKaos');
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }

    }
 
    public function tambahStok()
    {
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_produk' => 'required',
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $date = date("j, n, Y");
                    $data = [
                        'nama_produk'=> $this->request->getVar('nama_produk') ,
                        'warna_kaos'=> $this->request->getVar('warna_kaos') ,
                        'size_kaos'=> $this->request->getVar('size_kaos') ,
                        'jumlah_stok'=> $this->request->getVar('jumlah_stok') ,
                        'kategori'=> $this->request->getVar('kategori') ,
                    ];
                    $this->stokKaosModel->insert($data);
                    echo json_encode(true);
                    
                    // 'id_stok'=> $this->request->getVar('id_stok') ,
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusStok()
    {
        $id = $this->request->getVar('id_stok');
        $this->stokKaosModel->where('id_stok',$id)->delete();
        echo json_encode(true);

    }

    
    public function updateStok()
    {
        // echo json_encode('controler updateKaos');
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_produk' => 'required'
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $id = $this->request->getVar('id_stok');
                    $data = [
                        'nama_produk'=> $this->request->getVar('nama_produk') ,
                        'warna_kaos'=> $this->request->getVar('warna_kaos') ,
                        'size_kaos'=> $this->request->getVar('size_kaos') ,
                        'jumlah_stok'=> $this->request->getVar('jumlah_stok') ,
                        'kategori'=> $this->request->getVar('kategori') ,
                    ];
                    $this->stokKaosModel->update($id,$data);
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