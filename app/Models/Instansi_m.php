<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Instansi_m extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }
    
    

    public function getAlldata()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }

    public function saveInstansi($data){
        return $this->db->table('instansi')->insert($data);
        
    }
 
    public function updateInstansi($data, $id)
    {
        $query = $this->db->table('instansi')->update($data, array('id_instansi' => $id));
        return $query;
    }
 
    public function deleteInstansi($id)
    {
        $query = $this->db->table('instansi')->delete(array('id_instansi' => $id));
        return $query;
    } 
}