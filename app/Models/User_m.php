<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class User_m extends Model
{
    /* protected $table = 'divisi';

	protected $primaryKey = 'id_divisi';

	protected $allowedFields = ['nama_divisi']; */
    
    public function getData()
    {
        return $this->db->table('user')
            ->join('divisi', 'divisi.id_divisi=user.id_divisi', 'left')
            ->get()
            ->getResultArray();
    }

    public function getID()
    {
        $id = session()->get('id_user');
        return $this->db->table('user')
            ->join('divisi', 'divisi.id_divisi=user.id_divisi', 'left')
            ->where('id_user', $id)
            ->get()
            ->getRowArray();
    }

    public function detailData($id)
    {
        // $id = session()->get('id_user');
        return $this->db->table('user')
            ->join('divisi', 'divisi.id_divisi=user.id_divisi', 'left')
            ->where('id_user', $id)
            ->get()
            ->getRowArray();
    }

    public function saveUser($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function updateUser($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function updatePass($id, $npwd)
    {
        // $id = session()->get('id_user');
        $this->db->table('user')
            ->where('id_user', $id)
            ->update(['password' => $npwd]);
        // $update_pass = $this->db->query("update user set password='$npwd' where id_user='$id'");
        // return $update_pass;
    }

    public function deleteUser($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}

