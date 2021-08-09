<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Kategori_m extends Model
{
    public function getData()
    {
        return $this->db->table('kategori')
            ->get()
            ->getResultArray();
    }

    public function saveKategori($data)
    {
        $this->db->table('kategori')->insert($data);
    }

    public function updateKategori($data)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function deleteKategori($data)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}

