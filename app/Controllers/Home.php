<?php

namespace App\Controllers;
use App\Models\Home_m;
use App\Models\Penerjemah_m;

class Home extends BaseController
{
	public function __construct()
	{
		$this->Home = new Home_m();
		$this->Penerjemah = new Penerjemah_m();
	}
	public function index()
	{
		

		$data = array(
			'title'		  		=> 'Dashboard',
			'tPenerjemah' 		=> $this->Home->tPenerjemah(),
			'tInstansi'	  		=> $this->Home->tInstansi(),
			'tArsip'	  		=> $this->Home->tArsip(),
			'jum_arsip'	  		=> $this->Home->jum_arsip(),
			'tSuratMasuk'	  	=> $this->Home->tSuratMasuk(),
			'tSuratKeluar'	  	=> $this->Home->tSuratKeluar(),
			'jum_masuk'	  		=> $this->Home->jum_masuk(),
			'jum_keluar'	  	=> $this->Home->jum_keluar(),
			'piechartTitle' 	=> 'Jumlah Penerjemah per Jabatan',
			'piechart_jabatan'  => $this->Penerjemah->getJabatan(),
			'piechartAktif'		=> 'Jumlah Penerjemah yang Aktif',	
			'piechart_aktif'	=> $this->Penerjemah->getAktif(),
		);
		return view('index', $data);
	}

	public function sidebar()
	{
		

		$data = array(
			'title'		  		=> 'Dashboard',
			'tPenerjemah' 		=> $this->Home->tPenerjemah(),
			'tInstansi'	  		=> $this->Home->tInstansi(),
			'tArsip'	  		=> $this->Home->tArsip(),
			'piechartTitle' 	=> 'Jumlah Penerjemah per Golongan',
			'piechart_jabatan'  => $this->Penerjemah->getJabatan(),
			'piechartAktif'		=> 'Jumlah Penerjemah yang Aktif',	
			'piechart_aktif'	=> $this->Penerjemah->getAktif(),
		);
		return view('templates/sidebar', $data);
	}

}
