<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Surat_keluar_m extends Model
{
    public function getData()
    {
        $user = session()->get('id_user');
        return $this->db->table('surat_keluar')
            ->join('divisi', 'divisi.id_divisi = surat_keluar.divisi', 'left')
            ->join('user', 'user.id_user = surat_keluar.user', 'left')
            ->join('tugas', 'tugas.id_tugas = surat_keluar.no_ktj')
            ->where('user', $user)
            ->orderBy('id_suratKeluar', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getLaporan()
    {
        return $this->db->table('surat_keluar')
            ->join('divisi', 'divisi.id_divisi = surat_keluar.divisi', 'left')
            ->join('user', 'user.id_user = surat_keluar.user', 'left')
            ->join('tugas', 'tugas.id_tugas = surat_keluar.no_ktj')
            ->orderBy('id_suratKeluar', 'DESC')
            ->get()
            ->getResultArray();
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

    /* public function detailData($id)
    {
        return $this->db->table('arsip')
            ->join('divisi', 'divisi.id_divisi = arsip.iddivisi', 'left')
            ->join('user', 'user.id_user = arsip.iduser', 'left')
            ->join('kategori', 'kategori.id_kategori = arsip.id_kategori', 'left')
            ->where('id_arsip', $id)
            ->get()
            ->getRowArray();
    } */

    public function saveSuratKeluar($data){
        return $this->db->table('surat_keluar')->insert($data);
    }

    public function updateSuratKeluar($data)
    {
        $query = $this->db->table('surat_keluar')
        ->join('divisi', 'divisi.id_divisi = surat_keluar.divisi', 'left')
        ->join('user', 'user.id_user = surat_keluar.user', 'left')
        ->join('kategori', 'kategori.id_kategori = surat_keluar.kategori', 'left')
        ->join('tugas', 'tugas.id_tugas = surat_keluar.no_ktj')
        ->where('id_suratKeluar', $data['id_suratKeluar'])
        ->update($data);
        return $query;
    }

    public function deleteSuratKeluar($id)
    {
        $query = $this->db->table('surat_keluar')->delete(array('id_suratKeluar' => $id));
        return $query;
    }
}

