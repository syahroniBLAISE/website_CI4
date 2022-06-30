<?php 
namespace App\Models;
use CodeIgniter\Model;

class stokKaosModel extends Model
{
    protected $table = 'stokkaos';
    protected $primaryKey = 'id_stok';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_stok','nama_produk','warna_kaos','size_kaos','jumlah_stok','kategori'];

    public function get_data_all()
    {
        return $this->findAll();
    }

    public function search($keyword){
        $builder = $this->table('stokkaos');
        $builder->like('nama_produk', $keyword)->orLike('warna_kaos', $keyword);
        return $builder;
    }
}
?>