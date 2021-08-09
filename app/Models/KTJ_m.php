<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class KTJ_m extends Model
{
    protected $table = 'tugas';

	protected $primaryKey = 'id_tugas';

	protected $allowedFields = ['id_divisi_tugas', 'kode_tugas', 'list_tugas'];

    public function getData()
    {
        return $this->db->table('tugas')
            ->get()
            ->getResultArray();
    }

    public function getKTJ()
    {
        return $this->db->table('divisi')
        ->join('divisi', 'tugas.id_divisi_tugas=divisi.id_divisi')
        ->where('id_divisi_tugas = id_divisi')
        ->get()
        ->getResultArray();
    }

    public function saveKTJ($data)
    {
        $this->db->table('tugas')->insert($data);
    }

    public function updateKTJ($data)
    {
        $this->db->table('tugas')
            ->where('id_tugas', $data['id_tugas'])
            ->update($data);
    }

    public function deleteKTJ($data)
    {
        $this->db->table('kategori')
            ->where('id_tugas', $data['id_tugas'])
            ->delete($data);
    }
}

