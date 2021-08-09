<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Surat_masuk_m extends Model
{
    public function getData()
    {
        $user = session()->get('id_user');
        // $div = $this->getpost('divisi');
        // $divisi = session()->get('divisi');
        return $this->db->table('surat_masuk')
            ->join('divisi', 'divisi.id_divisi = surat_masuk.divisi', 'left')
            ->join('user', 'user.id_user = surat_masuk.user', 'left')
            ->join('kategori', 'kategori.id_kategori = surat_masuk.kategori', 'left')
            ->join('tugas', 'tugas.id_tugas = surat_masuk.no_ktj')
            ->where('user', $user)
            // ->orWhere('divisi', $div)
            ->orderBy('id_suratMasuk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getLaporan()
    {
        $user = session()->get('id_user');
        // $div = $this->getpost('divisi');
        // $divisi = session()->get('divisi');
        return $this->db->table('surat_masuk')
            ->join('divisi', 'divisi.id_divisi = surat_masuk.divisi', 'left')
            ->join('user', 'user.id_user = surat_masuk.user', 'left')
            ->join('kategori', 'kategori.id_kategori = surat_masuk.kategori', 'left')
            ->join('tugas', 'tugas.id_tugas = surat_masuk.no_ktj')
            // ->orWhere('divisi', $div)
            ->orderBy('id_suratMasuk', 'DESC')
            ->get()
            ->getResultArray();
    }

    // public function getLaporan($tgl_awal, $tgl_akhir)
    // {
    //     // $query = $this->db->query("select * from surat_masuk where tgl_surat between '$tgl_awal' and '$tgl_akhir'");
    //     // return $query->getResult();
    //     return $this->db->table('surat_masuk')
    //     ->join('divisi', 'divisi.id_divisi = surat_masuk.divisi', 'left')
    //     ->join('user', 'user.id_user = surat_masuk.user', 'left')
    //     ->join('kategori', 'kategori.id_kategori = surat_masuk.kategori', 'left')
    //     ->join('tugas', 'tugas.id_tugas = surat_masuk.no_ktj')
    //     ->where('tgl_surat>=', $tgl_awal)
    //     ->where('tgl_surat<=', $tgl_akhir)
    //     ->orderBy('tgl_surat', 'ASC')
    //     ->get()
    //     ->getResultArray();
    // }

    public function getDetail($id)
    {
        return $this->db->table('surat_masuk')
            ->join('divisi', 'divisi.id_divisi = surat_masuk.divisi', 'left')
            ->join('user', 'user.id_user = surat_masuk.user', 'left')
            ->join('kategori', 'kategori.id_kategori = surat_masuk.kategori', 'left')
            ->join('tugas', 'tugas.id_tugas = surat_masuk.no_ktj')
            ->where('id_suratMasuk', $id)
            ->get()
            ->getRowArray();
    }

    public function getDiv()
    {
        $query = $this->db->query('select * from divisi');
        return $query->getResult();
    }

    public function getKTJDiv($postdata)
    {
        $sql = 'select * from tugas where id_divisi_tugas ='.$postdata['id_divisi_tugas'];
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    /* public function getEditKTJ($postData)
	{
		$sql = 'select * from divisi where id_divisi ='.$postData['id_divisi'];
        $query = $this->db->query($sql);
        return $query;
	}

    public function get_surat_byID($id_suratMasuk)
    {
        $sql = 'select * from surat_masuk where id_suratMasuk='.$id_suratMasuk['id_suratMasuk'];
        $query = $this->db->query($sql);
        return $query;
    } */
    
    /* public function getEditKTJ_byID($id)
    {
        $sql = $this->db->table('surat_masuk')
        ->getWhere(array('id_suratMasuk' => $id));
        return $sql;
    } */

    

    public function saveSuratMasuk($data){
        return $this->db->table('surat_masuk')->insert($data);
    }

    public function updateSuratMasuk($data)
    {
        $query = $this->db->table('surat_masuk')
        ->join('divisi', 'divisi.id_divisi = surat_masuk.divisi', 'left')
        ->join('user', 'user.id_user = surat_masuk.user', 'left')
        ->join('kategori', 'kategori.id_kategori = surat_masuk.kategori', 'left')
        ->join('tugas', 'tugas.id_tugas = surat_masuk.no_ktj')
        ->where('id_suratMasuk', $data['id_suratMasuk'])
        ->update($data);
        return $query;
    }

    public function deleteSuratMasuk($id)
    {
        $query = $this->db->table('surat_masuk')->delete(array('id_suratMasuk' => $id));
        return $query;
    }
}

