<?php 
namespace App\Models;
use CodeIgniter\Model;

class produkModel extends Model
{
    protected $table = 'dataBarang';
    protected $allowedFields = ['id_produk','nama_produk','harga_produk','kategori_produk','img_produk','rating_produk'];
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