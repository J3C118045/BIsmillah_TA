<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Surat_usulan_m extends Model
{
    public function getData()
    {
        $user = session()->get('id_user');
        return $this->db->table('surat_usulan')
            ->join('divisi', 'divisi.id_divisi = surat_usulan.divisi', 'left')
            ->join('user', 'user.id_user = surat_usulan.user', 'left')
            ->join('kategori', 'kategori.id_kategori = surat_usulan.kategori', 'left')
            ->where('user', $user)
            ->orderBy('id_suratUsulan', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getData_forAdmin()
    {
        $user = session()->get('id_user');
        return $this->db->table('surat_usulan')
            ->join('divisi', 'divisi.id_divisi = surat_usulan.divisi', 'left')
            ->join('user', 'user.id_user = surat_usulan.user', 'left')
            ->join('kategori', 'kategori.id_kategori = surat_usulan.kategori', 'left')
            // ->where('user', $user)
            ->orderBy('id_suratUsulan', 'DESC')
            ->get()
            ->getResultArray();
    }


    public function saveUsulan($data){
        return $this->db->table('surat_usulan')->insert($data);
    }

    public function updateUsulan($data)
    {
        $query = $this->db->table('surat_usulan')
        ->join('divisi', 'divisi.id_divisi = surat_usulan.divisi', 'left')
        ->join('user', 'user.id_user = surat_usulan.user', 'left')
        ->join('kategori', 'kategori.id_kategori = surat_usulan.kategori', 'left')
        ->where('id_suratUsulan', $data['id_suratUsulan'])
        ->update($data);
        return $query;
    }

    public function deleteUsulan($id)
    {
        $query = $this->db->table('surat_usulan')->delete(array('id_suratUsulan' => $id));
        return $query;
    }
}

