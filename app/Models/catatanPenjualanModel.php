<?php 
namespace App\Models;
use CodeIgniter\Model;

class catatanPenjualanModel extends Model
{
    protected $table = 'catatan_penjualan';
    protected $primaryKey = 'id_transaksi';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_transaksi','nama_pelanggan','uang_masuk','uang_keluar','time_transaksi','ket_transaksi'];

    public function get_data_all()
    {
        return $this->findAll();
    }

    public function search($keyword){
        $builder = $this->table('catatan_penjualan');
        $builder->like('nama_pelanggan', $keyword)->orLike('ket_transaksi', $keyword);
        return $builder;
    }
    public function getTotalPenjualan(){
        $data = $this->findAll();
        $total = 0;
        foreach($data as $d){
            $total = $d['uang_masuk'] + $total;
        }
        return $total;
    }
}
?>