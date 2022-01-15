<?php 
namespace App\Models;
use CodeIgniter\Model;

class halamanModel extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'id_halaman';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_halaman','judul_halaman','url_halaman','content_halaman'];
    // protected $primaryKey = 'id_produk';

    public function get_data_all()
    {
        return $this->findAll();
    }
//     public function save_data($data)
//     {
        
//         // return $this->insert($data);
//     }
}
?>