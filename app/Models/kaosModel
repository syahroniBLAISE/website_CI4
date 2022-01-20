<?php 
namespace App\Models;
use CodeIgniter\Model;

class kaosModel extends Model
{
    protected $table = 'dataKaos';
    protected $primaryKey = 'id_kaos';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_kaos','nama_kaos','harga_kaos','kategori_kaos','gambar_kaos','warna_kaos','waktu_update','thumbnail_kaos'];

    public function get_data_all()
    {
        return $this->findAll();
    }

}
?>