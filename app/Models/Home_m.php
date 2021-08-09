<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Home_m extends Model
{
    public function tPenerjemah()
    {
        return $this->db->table('penerjemah')->countAll();
    }

    public function tInstansi()
    {
        // return $this->db->table('instansi')
        // // ->distinct('instansi')
        // // ->from('instansi')
        // ->countAllResults();
        return $this->db->table('instansi')
        ->select('instansi')
        ->distinct('instansi')
        ->countAllResults()
        ;
    }

    public function tArsip()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */

        $user = session()->get('id_user');
        return $this->db->table('surat_usulan')
        ->where('status', 'Diajukan')
        ->where('iduser', $user)
        ->countAllResults();
    }

    public function jum_arsip()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */

        return $this->db->table('surat_usulan')
        // ->where('status', 'Diajukan')
        ->countAllResults();
    }

    public function tSuratMasuk()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */
        $user = session()->get('id_user');
        return $this->db->table('surat_masuk')
        ->join('user', 'user.id_user = surat_masuk.user', 'left')
        ->where('status', 'Diajukan')
        ->where('user', $user)
        ->countAllResults();
    }

    public function jum_masuk()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */
        $user = session()->get('id_user');
        return $this->db->table('surat_masuk')
        ->join('user', 'user.id_user = surat_masuk.user', 'left')
        // ->where('status', 'Diajukan')
        // ->where('user', $user)
        ->countAllResults();
    }

    public function tSuratKeluar()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */
        $user = session()->get('id_user');
        return $this->db->table('surat_keluar')
        ->join('user', 'user.id_user = surat_keluar.user', 'left')
        // ->where('status', 'Diajukan')
        ->where('user', $user)
        ->countAllResults();
    }

    public function jum_keluar()
    {
        /* $sql = 'select count(*) as jumlah from tugas where status = Diajukan';
        $query = $this->db->query($sql);
        return $query->getResult(); */
        $user = session()->get('id_user');
        return $this->db->table('surat_keluar')
        ->join('user', 'user.id_user = surat_keluar.user', 'left')
        // ->where('status', 'Diajukan')
        // ->where('user', $user)
        ->countAllResults();
    }

    
}