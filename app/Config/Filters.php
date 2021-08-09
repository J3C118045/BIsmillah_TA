<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'Filter_Admin' => \App\Filters\Filter_Admin::class,
		'Filter_User' => \App\Filters\Filter_User::class,
		'Filter_SuperUser' => \App\Filters\Filter_SuperUser::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'Filter_Admin' => ['except' => [
			'auth', 'auth/*']],	

			'Filter_User' => ['except' => [
				'auth', 'auth/*']],

			'Filter_User' => ['except' => [
				'auth', 'auth/*']],
			
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'Filter_Admin' => ['except' => [
				'home', 'home/*',
				'penerjemah', 'penerjemah/*',
				'instansi', 'instansi/*',
				'surat_usulan', 'surat_usulan/*',
				'kategori', 'kategori/*',
				'divisi', 'divisi/*',
				'ktj', 'ktj/*',
				'surat_masuk', 'surat_masuk/*',
				'surat_keluar', 'surat_keluar/*',
				'pengguna', 'pengguna/*',
				'user', 'user/*',
				'laporan_masuk', 'laporan_masuk/*',
				'laporan_keluar', 'laporan_keluar/*',
				]],

			'Filter_User' => ['except' => [
				'home', 'home/*',
				'penerjemah', 'penerjemah/*',
				'instansi', 'instansi/*',
				'surat_usulan', 'surat_usulan/*',
				'kategori', 'kategori/*',
				'divisi', 'divisi/*',
				'ktj', 'ktj/*',
				'surat_masuk', 'surat_masuk/*',
				'surat_keluar', 'surat_keluar/*',
				'user', 'user/*',
				]],

			// 'Filter_SuperUser' => ['except' => [
			// 	'home', 'home/*',
			// 	'penerjemah', 'penerjemah/*',
			// 	'instansi', 'instansi/*',
			// 	'surat_usulan', 'surat_usulan/*',
			// 	'kategori', 'kategori/*',
			// 	'divisi', 'divisi/*',
			// 	'ktj', 'ktj/*',
			// 	'surat_masuk', 'surat_masuk/*',
			// 	'surat_keluar', 'surat_keluar/*',
			// 	]],

			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
