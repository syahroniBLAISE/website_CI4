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
    public function tambahProduk()
    {
        // dd($this->request->getVar());
        $data = [ 
            'nama_produk'=> $this->request->getVar('nama_produk') ,
            'harga_produk'=> $this->request->getVar('harga_produk') ,
            'img_produk'=> $this->request->getVar('gambar_produk') ,
            'kategori_produk'=> $this->request->getVar('kategori_produk') ,
            'rating_produk'=> $this->request->getVar('rating_produk') 
        ];
        // dd($data);
       $this->produkModel->save($data);
        return redirect()->to('adminToko');
    }

    public function hapusProduk($id)
    {
        // dd($id);
        $this->produkModel->where('id_produk',$id)->delete();
        return redirect()->to('adminToko');

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
        $id = $this->request->getVar('id_produk');
        $data = [
            'nama_produk'=> $this->request->getVar('nama_produk') ,
            'harga_produk'=> $this->request->getVar('harga_produk') ,
            'img_produk'=> $this->request->getVar('gambar_produk') ,
            'kategori_produk'=> $this->request->getVar('kategori_produk') ,
            'rating_produk'=> $this->request->getVar('rating_produk')
        ];
        $this->produkModel->update($id,$data);
        return redirect()->to('adminToko');
        
    }
}


?>