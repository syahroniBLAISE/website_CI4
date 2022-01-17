<?php 
namespace App\Controllers;

use \App\Models\produkModel;

class produkController extends BaseController
{       
    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new produkModel();
    }

    public function getProdukAll(){

        echo json_encode($this->produkModel->get_data_all());
    }

    public function uploadCSV(){
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
                            'harga_produk'=> $row[1],
                            'img_produk'=> $row[2],
                            'kategori_produk'=> $row[3],
                            'rating_produk'=> $row[4]
                        ];
                    $this->produkModel->insert($data);
                }
                return redirect()->to('adminToko');
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }

    }
 
    public function tambahProduk()
    {
        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_produk' => 'required',
                'kategori_produk' => 'required',
                'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    
                    $data = [
                        'nama_produk'=> $this->request->getVar('nama_produk') ,
                        'harga_produk'=> $this->request->getVar('harga_produk') ,
                        'img_produk'=> $this->request->getVar('img_produk') ,
                        'kategori_produk'=> $this->request->getVar('kategori_produk') ,
                        'rating_produk'=> $this->request->getVar('rating_produk')
                    ];
                    $this->produkModel->insert($data);
                    echo json_encode(true);
    
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusProduk()
    {
        $id = $this->request->getVar('id_produk');
        $this->produkModel->where('id_produk',$id)->delete();
        echo json_encode(true);

    }

    public function getProduk()
    {
        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            $data = json_encode($this->produkModel->find($id));
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }
    public function updateProduk()
    {

        if ($this->request->isAJAX()){
            if(!$this->validate([
                'nama_produk' => 'required',
                'kategori_produk' => 'required',
                'harga_produk' => 'required'
                ])){
                    $validation =  \Config\Services::validation();
                    $errors = $validation->getErrors();
    
                    echo json_encode($errors);
                    
                }else{
                    $id = $this->request->getVar('id_produk');
                    $data = [
                        'nama_produk'=> $this->request->getVar('nama_produk') ,
                        'harga_produk'=> $this->request->getVar('harga_produk') ,
                        'img_produk'=> $this->request->getVar('img_produk') ,
                        'kategori_produk'=> $this->request->getVar('kategori_produk') ,
                        'rating_produk'=> $this->request->getVar('rating_produk')
                    ];
                    $this->produkModel->update($id,$data);
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