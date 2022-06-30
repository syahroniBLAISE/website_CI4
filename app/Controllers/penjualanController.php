<?php 
namespace App\Controllers;

use \App\Models\catatanPenjualanModel;

class penjualanController extends BaseController
{       
    protected $catatanPenjualanModel;
    public function __construct()
    {
        $this->catatanPenjualanModel = new catatanPenjualanModel();
    }

    public function getStokAll(){
        
        if ($this->request->isAJAX()){
            $data =[
            'item' => $this->catatanPenjualanModel->paginate(3),
            'pager' => $this->catatanPenjualanModel->pager
            ];
            echo json_encode($data);

        }else{
            exit('tidak bisa');
        }
    }

    public function getPenjualan()
    {

        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            $data = json_encode($this->catatanPenjualanModel->find($id));
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }

    

    public function uploadCSVPenjualan(){
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
                            'nama_pelanggan'=> $row[0],
                            'uang_masuk'=> $row[1],
                            'uang_keluar'=> $row[2],
                            'time_transaksi'=> $row[3],
                            'ket_transaksi'=> $row[4]
                        ];
                    $this->catatanPenjualanModel->insert($data);
                }
                return redirect()->to('catatanPenjualan');
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }

    }
 
    public function tambahPenjualan()
    {
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_pelanggan' => 'required',
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $date = date("j, n, Y");
                    $data = [
                        'nama_pelanggan'=> $this->request->getVar('nama_pelanggan') ,
                        'uang_masuk'=> $this->request->getVar('uang_masuk') ,
                        'uang_keluar'=> $this->request->getVar('uang_keluar') ,
                        'ket_transaksi'=> $this->request->getVar('ket_transaksi') ,
                        'time_transaksi'=> date("j, n, Y")
                    ];
                    $this->catatanPenjualanModel->insert($data);
                    echo json_encode(true);
                    
                    // 'id_stok'=> $this->request->getVar('id_stok') ,
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusPenjualan()
    {
        $id = $this->request->getVar('id_transaksi');
        $this->catatanPenjualanModel->where('id_transaksi',$id)->delete();
        echo json_encode(true);

    }

    
    public function updatePenjualan()
    {
        // echo json_encode('controler updateKaos');
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_pelanggan' => 'required'
                // 'kategori_produk' => 'required',
                // 'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $id = $this->request->getVar('id_transaksi');
                    $data = [
                        'nama_pelanggan'=> $this->request->getVar('nama_pelanggan') ,
                        'uang_masuk'=> $this->request->getVar('uang_masuk') ,
                        'uang_keluar'=> $this->request->getVar('uang_keluar') ,
                        'time_transakasi'=> $this->request->getVar('time_transakasi') ,
                        'ket_transaksi'=> $this->request->getVar('ket_transaksi') ,
                    ];
                    $this->catatanPenjualanModel->update($id,$data);
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