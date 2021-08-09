<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Divisi_m extends Model
{
    /* protected $table = 'divisi';

	protected $primaryKey = 'id_divisi';

	protected $allowedFields = ['nama_divisi']; */
    
    public function getData()
    {
        return $this->db->table('divisi')
            ->get()
            ->getResultArray();
    }

    /* public function getDiv()
    {
        $query = $this->db->table('divisi')->orderBy('nama_divisi', 'ASC');
        return $query->findAll();
    } */

    public function saveDivisi($data)
    {
        $this->db->table('divisi')->insert($data);
    }

    public function updateDivisi($data)
    {
        $this->db->table('divisi')
            ->where('id_divisi', $data['id_divisi'])
            ->update($data);
    }

    public function deleteDivisi($data)
    {
        $this->db->table('divisi')
            ->where('id_divisi', $data['id_divisi'])
            ->delete($data);
    }
}

