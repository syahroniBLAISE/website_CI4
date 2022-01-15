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

        // dd($_FILES);
        $file = $this->request->getFile('csv');
        $extensiFile = $file->guessExtension();

        // dd($extensiFile);
        if($extensiFile == 'csv'){
            $file->move('img');
            $namaFile = $file->getName();
            $file_path = 'img/';

            // if(file_exists($file_path.$namaFile){
            //     $namaFile = $namaFile.
            // }

            if(file_exists($file_path.$namaFile)){
                $open = fopen('img/'.$namaFile, 'r');
                while(($row = fgetcsv($open, 1000, ';'))!== FALSE){
        // dd($row);

                    $data = [
                            'nama_produk'=> $row[0],
                            'harga_produk'=> $row[1],
                            'img_produk'=> $row[2],
                            'kategori_produk'=> $row[3],
                            'rating_produk'=> $row[4]
                        ];
                        // dd($data);
                    $this->produkModel->insert($data);
                }
                
            }else{
                    echo 'gagal upload';
            }
        }else{
            echo 'bukan file csv';
        }
        }


        // $uploads_dir = '/img';
        // foreach($_FILES["csv"]["error"] as $key => $error) {
        //     if ($error == UPLOAD_ERR_OK) {
        //         $tmp_name = $_FILES["csv"]["tmp_name"][$key];
        //         // basename() may prevent filesystem traversal attacks;
        //         // further validation/sanitation of the filename may be appropriate
        //         $name = basename($_FILES["csv"]["name"][$key]);
        //         move_uploaded_file($tmp_name, "$uploads_dir/$name");
        //     }
        // }



            // $file = $this->request->getFile('csv');
            // $file->move('img');
            // $namaFile = $file->getName();



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