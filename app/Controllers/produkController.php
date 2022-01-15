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
    public function validateProduk()
    {   
        
        
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

                    // return redirect()->to('adminToko');
    
                }
        }else{
            exit('tidak bisa di akses');
        }
       
        
    }

      public function hapusProduk()
    {
        // dd($id);
        $id = $this->request->getVar('id_produk');
        $this->produkModel->where('id_produk',$id)->delete();
        echo json_encode(true);

    }

    public function getProduk()
    {
        if ($this->request->isAJAX()){
            $id = $_POST['id'];
            // echo 'ok';
            $data = json_encode($this->produkModel->find($id));
            
            echo $data;

        }else{
            exit('tidak bisa');
        }
    }
    public function updateProduk()
    {
        // $id = $this->request->getVar('id_produk');
        // $data = [
        //     'nama_produk'=> $this->request->getVar('nama_produk') ,
        //     'harga_produk'=> $this->request->getVar('harga_produk') ,
        //     'img_produk'=> $this->request->getVar('gambar_produk') ,
        //     'kategori_produk'=> $this->request->getVar('kategori_produk') ,
        //     'rating_produk'=> $this->request->getVar('rating_produk')
        // ];
        // $this->produkModel->update($id,$data);
        // // return redirect()->to('adminToko');
        // echo $data;



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
}


?>