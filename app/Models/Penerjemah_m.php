<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Penerjemah_m extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getPenerjemah()
    {
        return $this->db->table('penerjemah')->
        join('instansi', 'instansi.id_instansi=penerjemah.id_instansi_penerjemah')->
        get()->getResultArray();
    }
    
    public function getLaporan()
    {
        return $this->db->table('penerjemah')->
        join('instansi', 'instansi.id_instansi=penerjemah.id_instansi_penerjemah')->
        where('status', 'Aktif') ->
        get()->getResultArray();
    }

    public function getDetail($id)
    {
        return $this->db->table('penerjemah')
        ->join('instansi', 'instansi.id_instansi=penerjemah.id_instansi_penerjemah')
        ->where('id_penerjemah', $id)
        ->get()
        ->getRowArray();
    }

    public function savePenerjemah($data){
        return $this->db->table('penerjemah')->insert($data);
    }

    public function getJabatan()
    {
        $query = $this->db->table('penerjemah')
        ->select('jabatan as jabatan, Count(jabatan) AS jumlah, ROUND((Count(jabatan) * 100 / (select Count(*) from penerjemah)), 2) AS persentase')
		->join('instansi','instansi.id_instansi=penerjemah.id_instansi_penerjemah')
		->groupBy('jabatan')
		->get()
        ->getResultArray();
        return $query;
    }

    public function getAktif()
    {
        $query = $this->db->table('penerjemah')
        ->select('Count(id_penerjemah) AS jumlah, status as status')
		->groupBy('status')
		->get()
        ->getResultArray();
        return $query;
    }    

    public function getPersen()
    {
        $query = $this->db->table('penerjemah')
        ->select('status as status, Count(status) AS jumlah, ROUND((Count(status) * 100 / (select Count(*) from penerjemah)), 2) AS persentase')
		->groupBy('status')
		->get()
        ->getResultArray();
        return $query;
    }
 
    public function updatePenerjemah($data)
    {
        $query = $this->db->table('penerjemah')->
        join('instansi', 'instansi.id_instansi = penerjemah.id_instansi_penerjemah', 'left')->
        where('id_penerjemah', $data['id_penerjemah'])->
        update($data);
        return $query;
    }
 
    public function deletePenerjemah($id)
    {
        $query = $this->db->table('penerjemah')->delete(array('id_penerjemah' => $id));
        return $query;
    }

}