-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2021 pada 15.10
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusbinter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `instansi`, `unit_kerja`, `alamat`, `wilayah`) VALUES
(1, 'Arsip Nasional Republik Indonesia', 'Direktorat Pengolahan', 'Jl. Ampera Raya no. 7, Cilandak, Jakarta Selatan 12560', 'JAKARTA'),
(2, 'Arsip Nasional Republik Indonesia', 'Direktorat Layanan dan Pemanfaatan Arsip Nasional Republik Indonesia', 'Jl. Ampera Raya No. 7 Jakarta Selatan 12561', 'JAKARTA'),
(3, 'Badan Nasional Penanggulangan Bencana', 'Pusat Pendidikan dan Pelatihan PB', 'Jl. Anyar No. 37, Tangkil, Kec. Citeureup, Kab. Bogor', 'JAWA BARAT'),
(4, 'Badan Pusat Statistik', 'Direktorat Analisis dan Pengembangan Statistik', 'Jl. Dr. Sutomo no. 6-8, Jakarta Pusat 10710\n Gedung 5 Lantai 5', 'JAKARTA'),
(5, 'Badan Siber dan Sandi Negara', 'Sekretariat Utama', 'Jl. Harsono RM No. 70, Ragunan, Pasar Minggu, Jakarta 12550', 'JAKARTA'),
(6, 'Badan Siber dan Sandi Negara', 'Biro Hukum dan Hubungan Masyarakat', 'Jl. Harsono RM No. 70, Ragunan, Pasar Minggu, Jakarta 12550', 'JAKARTA'),
(7, 'Kejaksaan Agung', 'Kejaksaan Tinggi Jawa Timur', 'Jl. A. Yani No. 54 - 56 Surabaya, Jawa Timur', 'JAWA TIMUR'),
(8, 'Kementerian Energi dan Sumber Daya Mineral', 'Direktorat Pembinaan Program Minyak dan Gas Bumi', 'Gedung Migas, Jl. HR. Rasuna Said Kav. B-5, Jakarta12910', 'JAKARTA'),
(9, 'Kementerian Energi dan Sumber Daya Mineral', 'Direktorat Jenderal Energi Baru, Terbarukan dan Konservasi Energi', 'Jalan Pegangsaan Timur No. 1, Menteng-Jakarta Pusat', 'JAKARTA'),
(10, 'Kementerian Energi dan Sumber Daya Mineral', 'Pusat Penelitian dan Pengembangan Teknologi Mineral dan Batubara', 'Jl. Jend. Sudirman No. 623 Bandung 40211', 'JAWA BARAT'),
(11, 'Kementerian Energi dan Sumber Daya Mineral', 'Bagian Kerjasama Regional dan Bilateral, Biro KLIK', 'Gedung Ditjen EBTKE Lantai 8 Jl. Pegangsaan Timur No. 1A, Cikini Jakarta Pusat 10320', 'JAKARTA'),
(12, 'Kementerian Hukum dan Hak Asasi Manusia', 'Direktorat Jenderal Kekayaan Intelektual', 'Jl. H.R. Rasuna Said Kav. 8-9 Jakarta', 'JAKARTA'),
(13, 'Kementerian Hukum dan Hak Asasi Manusia', 'Direktorat Jenderal Imigrasi', 'Gedung Sentra Mulia, Jl. H.R. Rasuna Said Kav X no 6, Kuningan, Jakarta 12910', 'JAKARTA'),
(14, 'Kementerian Hukum dan Hak Asasi Manusia', 'Direktorat Kerja Sama Keimigrasian', 'Jl. H.R. Rasuna Said Blok. X-6 Kav. 8 Kuningan, Jakarta Selatan 12940', 'JAKARTA'),
(15, 'Kementerian Hukum dan Hak Asasi Manusia', 'Kantor Wilayah Jawa Tengah', 'Jalan Dokter Cipto No.64, Kebonagung, Semarang Tim., Kota Semarang, Jawa Tengah 50232', 'JAWA TENGAH'),
(16, 'Kementerian Hukum dan Hak Asasi Manusia', 'Direktorat Teknologi Informasi dan Kerja Sama', 'Jl. Veteran No.11 Jakarta Pusat 10110', 'JAKARTA'),
(17, 'Kementerian Hukum dan Hak Asasi Manusia', 'Biro Umum, Sekretariat Jenderal', 'Jl. HR. Rasuna Said kav 6-7 Kuningan, Jakarta Selatan, DKI Jakarta12940', 'JAKARTA'),
(18, 'Kementerian Hukum dan Hak Asasi Manusia', 'Direktorat Jenderal Peraturan Perundang Undangan', 'Jl. HR. Rasuna Said kav 6-7 Kuningan, Jakarta Selatan, DKI Jakarta12940', 'JAKARTA'),
(19, 'Kementerian Kelautan dan Perikanan', 'Sekretariat Badan Penelitian dan Pengembangan Kelautan dan Perikanan', 'Jl. Pasir Putih 1 Ancol Timur Jakarta', 'JAKARTA'),
(20, 'Kementerian Ketenagakerjaan', 'Sekretaris Direktur Jenderal Pembinaan Pengawasan Ketenagakerjaan dan Keselamatan dan Kesehatan Kerja', 'Jl. Jendral Gatot Subroto Kav. 51, Kuningan, Jakarta Selatan 12950', 'JAKARTA'),
(21, 'Kementerian Komunikasi dan Informatika', 'Direktorat Informasi dan Komunikasi Perekonomian dan Maritim', '-', 'JAKARTA'),
(22, 'Kementerian Komunikasi dan Informatika', 'Balai Pengkajian dan Pengembangan Komunikasi Dan Informatika (BPPKI) Yogyakarta', 'Jl. Imogiri Barat No.km 5,Sewon, Bantul, Yogyakarta 55188', 'D I YOGYAKARTA'),
(23, 'Kementerian Komunikasi dan Informatika', 'Direktorat Informasi dan Komunikasi Politik , Hukum dan Keamanan', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(24, 'Kementerian Komunikasi dan Informatika', 'Direktorat Pengelolaan Media', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(25, 'Kementerian Komunikasi dan Informatika', 'Direktorat Informasi dan Komunikasi Pembangunan Manusia dan Kebudayaan', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(26, 'Kementerian Komunikasi dan Informatika', 'MMTC Yogyakarta', 'Jalan Magelang KM.6, Mlati,Yogyakarta 55284', 'D I YOGYAKARTA'),
(27, 'Kementerian Komunikasi dan Informatika', 'Direktorat Telekomunikasi, Ditjen Penyelenggaraan Pos dan Informatika', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(28, 'Kementerian Komunikasi dan Informatika', 'Puslitbang Literasi dan Profesi', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(29, 'Kementerian Komunikasi dan Informatika', 'Sekretariat Ditjen Aplikasi Informatika', 'Jl. Medan Merdeka Barat No. 9 Jakarta 10110', 'JAKARTA'),
(30, 'Kementerian Lingkungan Hidup dan Kehutanan', 'Direktorat Penyelesaian Sengketa Lingkungan Hidup', 'Gedung Manggala Wanabhakti Blok IV Lantai 4 Jl. Jenderal Gatot Soebroto - Jakarta 10270', 'JAKARTA'),
(31, 'Kementerian Lingkungan Hidup dan Kehutanan', 'Biro Kerjasama Luar Negeri, Sekretariat Jenderal Kemenlinghut', 'Biro Kerjasama Luar Negeri Blok VII Lt. 4, Gedung Manggala Wanabhakti, Jl. Gatot Subroto, Jakarta 10270. Telp 021 5701114, Fax 021 5720210', 'JAKARTA'),
(32, 'Kementerian Pariwisata Dan Ekonomi Kreatif', 'Direktorat Pemasaran Pariwisata Regional III', 'Gedung Sapta Pesona\n Jl. Medan Merdeka Barat No. 17, Jakarta 10110', 'JAKARTA'),
(33, 'Kementerian Pariwisata Dan Ekonomi Kreatif', 'Direktorat Pemasaran Pariwisata Regional II', 'Gedung Sapta Pesona\n Jl. Medan Merdeka Barat No. 17, Jakarta 10110', 'JAKARTA'),
(34, 'Kementerian Pariwisata Dan Ekonomi Kreatif', 'Biro Umum dan Hukum', 'Gedung Sapta Pesona\n Jl. Medan Merdeka Barat No. 17, Jakarta 10110', 'JAKARTA'),
(35, 'Kementerian Pariwisata Dan Ekonomi Kreatif', 'Biro Komunikasi', 'Gedung Sapta Pesona\n Jl. Medan Merdeka Barat No. 17, Jakarta 10110', 'JAKARTA'),
(36, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Papua', 'Jl. Yoka, Waena Distrik Heram Jayapura 99358\n Papua', 'PAPUA'),
(37, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Jambi', 'Jalan Arif Rahman Hakim No. 101 Telanaipura, Jambi 36124', 'JAMBI'),
(38, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Kalimantan Selatan', 'Jl. Jenderal Ahmad Yani Km 32 No. 60, Loktabat Utara Banjarbaru, Kalimantan Selatan', 'KALIMANTAN SELATAN'),
(39, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Sumatera Selatan', 'Jl. Seniman Amri Yahya, Kompleks Taman Budaya Sriwijaya, Jakabaring, Palembang, \n Sumatera Selatan', 'SUMATERA SELATAN'),
(40, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Jawa Barat', 'Jl. Sumbawa No. 11, Bandung 40113', 'JAWA BARAT'),
(41, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Sumatera Utara', 'Jl. Kolam Ujung no. 7 Medan Estate, Medan', 'SUMATERA UTARA'),
(42, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Sulawesi Utara', 'Jl. Diponegoro no. 25, Manado, 95111', 'SULAWESI UTARA'),
(43, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Bali', 'Jl. Trengguli I No. 34 Tembau, Denpasar 80238', 'BALI'),
(44, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Riau', 'Kampus Bina Widya, Jl. H.R. Subrantas Km. 12,5, Pekanbaru Riau 28292', 'RIAU'),
(45, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Maluku', 'Kompleks LPMP Maluku, Jl. Tihu, Wailela, Rumah tiga, Ambon 97234', 'MALUKU'),
(46, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Kepulauan Riau', 'Komp. LPMP Kepulauan Riau, Jalan Tata Bumi Km. 20 Ceruk Ijuk, Kabupaten Bintan, Kep. Riau 29145', 'KEPULAUAN RIAU'),
(47, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Nusa Tenggara Barat', 'Jl. Dr. Sujono, Kel. Jempong Baru, Kec. Sekarbela, Mataram, Nusa Tenggara Barat 83115', 'NUSA TENGGARA BARAT'),
(48, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Sulawesi Tenggara', 'Jl. Halu Oleo Komp. Bumi Praja Andounohu Kendari, Sulawesi Tenggara 93231', 'SULAWESI TENGGARA'),
(49, 'Kementerian Pendidikan dan Kebudayaan', 'Kantor Bahasa Kalimantan Timur', 'Jalan Batu Cermin No. 25, Samarinda, Kalimantan Timur 75131', 'KALIMANTAN TIMUR'),
(50, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Kalimantan Tengah', 'Jalan Tingang Km. 3,5, Palangka Raya Kalimantan Tengah 73112', 'KALIMANTAN TENGAH'),
(51, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Papua dan Papua Barat', 'Jl. Yoka, Waena Distrik Heram Jayapura 99358 Papua', 'PAPUA'),
(52, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Provinsi Riau', 'Kampus Bina Widya Km.12,5, Simpang Baru, Tampan, Pekanbaru 28293', 'RIAU'),
(53, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Jawa Timur', 'Jl. Siwalanpanji, Buduran Sidoarjo 61252 Jawa Timur', 'JAWA TIMUR'),
(54, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Jawa Tengah', 'Jl. Elang Raya No.1, Mangunharjo, Tembalang, Semarang, Jawa Tengah 50272.', 'JAWA TENGAH'),
(55, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Pelestarian Nilai Budaya Makassar', 'Jalan Sultan Alauddin Km. 7, Talasalapang, Makassar, Sulawesi Selatan', 'SULAWESI SELATAN'),
(56, 'Kementerian Pendidikan dan Kebudayaan', 'Kepala Pusat Pembinaan Bahasa dan Sastra', 'Jl. Dr. Saharjo, Komp.AKABRI No.10A', 'JAKARTA'),
(57, 'Kementerian Pendidikan dan Kebudayaan', 'Badan Pengembangan dan Pembinaan Bahasa', 'Jalan Daksinapati Barat IV, Rawamangun, Jakarta 13220', 'JAKARTA'),
(58, 'Kementerian Pendidikan dan Kebudayaan', 'Balai Bahasa Gorontalo', 'Jl. Salak No. 21, Tomulabutao Gorontalo', 'GORONTALO'),
(59, 'Kementerian Perhubungan', 'Direktorat Sarana Transporatasi Jalan, Ditjen Perhubungan Darat', 'Graha Dinamika Lantai 2. Jl. Tanah Abang II No. 49 & 51, RW.4, Petojo Sel., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160', 'JAKARTA'),
(60, 'Kementerian Perhubungan', 'Pusat Fasilitasi Kemitraan dan Kelembagaan Nasional', 'Jl. Merdeka Barat No. 8 Gedung Cipta Lantai 6 Jakarta 10110', 'JAKARTA'),
(61, 'Kementerian Perindustrian', 'Sekretariat Direktorat Jenderal Industri Logam Mesin Alat Transportasi dan Elektronika', 'Jl. Jend. Gatot Subroto Kav.52-53 Jaksel 12950', 'JAKARTA'),
(62, 'Kementerian Perindustrian', 'Sekretariat Badan Penelitian dan Pengembangan Industri', 'Jl. Jend. Gatot Subroto Kav.52-53 Jaksel 12950', 'JAKARTA'),
(63, 'Kementerian Perindustrian', 'Balai Besar Kimia dan Kemasan', 'Jl. Balai Kimia No. 1, Pekayon, Pasar Rebo, Jakarta Timur 13710', 'JAKARTA'),
(64, 'Kementerian Riset, Teknologi, dan Pendidikan Tinggi', 'Politeknik Negeri Pontianak', 'Jl. Jenderal Ahmad Yani, Pontianak 78124', 'KALIMANTAN BARAT'),
(65, 'Kementerian Sekretariat Negara', 'Asisten Deputi Bidang Hubungan Masyarakat', 'Jl. Veteran No. 17-18 Jakarta Pusat 10110', 'JAKARTA'),
(66, 'Kementerian Sosial', 'Biro Hubungan Masyarakat', 'Jl Salemba raya No.28 Jakarta Pusat', 'JAKARTA'),
(67, 'Lembaga Ketahanan Nasional RI', 'Subdit Matdik Ditmatlaitadik Debiddikpimkatnas', 'Jl. Medan Merdeka Selatan No. 10 Jakarta 10110', 'JAKARTA'),
(68, 'Lembaga Ketahanan Nasional RI', 'Bag Pen Rohumas Settama', 'Jl. Medan Merdeka Selatan No. 10 Jakarta 10110', 'JAKARTA'),
(69, 'Lembaga Ketahanan Nasional RI', 'Biro Kerja Sama dan Hukum, Sekretariat Utama', 'Jl. Medan Merdeka Selatan No. 10 Jakarta 10110', 'JAKARTA'),
(70, 'Mahkamah Agung RI', 'Biro Hukum dan Humas Badan Urusan Administrasi', 'Jl. Medan Merdeka Utara no. 9-13, Jakarta Pusat 10010', 'JAKARTA'),
(71, 'Mahkamah Agung RI', 'Sekretariat Badan Litbang Diklat Kumdil', 'Jl. Cikopo Selatan Desa Sukamaju, Kec. Megamendung Bogor, Jawa Barat 16770', 'JAWA BARAT'),
(72, 'Mahkamah Agung RI', 'Biro Perlengkapan', 'Jalan Medan Merdeka Utara No 9-13. Jakarta Pusat', 'JAKARTA'),
(73, 'Mahkamah Agung RI', 'Pusat Penelitian dan pengembangan Hukum dan Peradilan', 'Gedung Sekretariat Mahkamah Agung RI, Jl. Jend. Achmad Yani, Kav. 58 Lantai 10,Jakarta Pusat', 'JAKARTA'),
(74, 'Pemerintah Daerah D I Yogyakarta', 'Dinas Perizinan dan Penanaman Modal Daerah Istimewa Yogyakarta', 'Jl. Janti No. 8, Banguntapan, Bantul, Yogyakarta 55198', 'D I YOGYAKARTA'),
(75, 'Pemerintah Kab. Bangka Barat', 'Dinas Pariwisata dan Kebudayaan', 'Komplek Perkantoran Terpadu Pemkab Bangka Barat, Kabupaten Bangka barat 33315', 'KEPULAUAN BANGKA BELITUNG'),
(76, 'Pemerintah Kab. Kepahiang', 'Dinas Pariwisata, Pemuda dan Olahraga', 'Jl. Aipda Mu\'an Kompleks Perkantoran Kelobak, Kab. Kepahiang', 'BENGKULU'),
(77, 'Pemerintah Kab. Sampang', 'Dinas Kebudayaan, Pariwisata, Pemuda dan Olah Raga Kab. Sampang', 'Jl. KH. Wahid Hasyim no. 23 Sampang, Jawa Timur 69213', 'JAWA TIMUR'),
(78, 'Pemerintah Kab. Sampang', 'Bagian Humas, Setdakab Sampang', 'Jl. Jamaluddin No. 1A, Sampang, Jawa Timur 69213', 'JAWA TIMUR'),
(79, 'Pemerintah Kota Bengkulu', 'Dinas Tenaga Kerja', 'Jl. Basuki Rahmat No.05, Belakang Pd., Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38115', 'BENGKULU'),
(80, 'Pemerintah Kota Padang', 'Bagian Kerjasama Sekretariat Daerah Kota Padang', 'Jl. Bagindo Aziz Chan No.1 By Pass Aie Pacah Padang', 'SUMATERA BARAT'),
(81, 'Pemerintah Kota Probolinggo', 'Dinas Komunikasi dan Informatika', 'Jl. Dr. Saleh No. 5, Probolinggo, Jawa Timur, 67211', 'JAWA TIMUR'),
(82, 'Pemerintah Kota Probolinggo', 'Dinas Pemuda, Olahraga dan Pariwisata', 'Jl. Soekarno - Hatta No.273, Pilang, Kec. Kademangan, Kota Probolinggo, Jawa Timur 67212', 'JAWA TIMUR'),
(83, 'Pemerintah Kota Semarang', 'Bagian Kerjasama, Setda Kota Semarang', 'Jl. Pemuda No. 148, Semarang', 'JAWA TENGAH'),
(84, 'Pemerintah Kota Semarang', 'Dinas Kebudayaan dan Pariwisata', 'Jl. Pemuda No. 175, Gedung Pandanaran Lantai 8, Semarang', 'JAWA TENGAH'),
(85, 'Pemerintah Kota Semarang', 'Bagian Humas, Setda Kota Semarang', 'Jl. Pemuda No. 148, Semarang', 'JAWA TENGAH'),
(86, 'Pemerintah Provinsi Bali', 'Dinas Kebudayaan dan Pariwisata', 'Jl. Raya Puputan Niti Mandala 80235 Despasar Bali', 'BALI'),
(87, 'Pemerintah Provinsi Bali', 'UPT Museum Bali, Dinas Kebudayaan', 'Jalan Raya Puputati Niti Mandala 80235 Kota Denpasar', 'BALI'),
(88, 'Pemerintah Provinsi Bali', 'Dinas Komunikasi, Informatika, dan Statistik Provinsi Bali', 'Jalan Nusa Indah, Denpasar, Bali 80231', 'BALI'),
(89, 'Pemerintah Provinsi Banten', 'Dinas Perpustakaan dan Kearsipan, Sekretariat Daerah Prov. Banten', 'Jl. Raya Jakarta - Serang Km 04, Serang Banten 42124', 'BANTEN'),
(90, 'Pemerintah Provinsi Bengkulu', 'Biro Umum, Humas dan Protokol, Sekretariat Daerah', 'Jl. Pembangunan No.1 Bengkulu 38225', 'BENGKULU'),
(91, 'Pemerintah Provinsi Bengkulu', 'Dinas Kebudayaan dan Pariwisata Provinsi Bengkulu', 'Jl. Kapten Tendean no. 26, Km. 6,5, Bengkulu', 'BENGKULU'),
(92, 'Pemerintah Provinsi Bengkulu', 'Badan Kesbangpolinmas', 'Jl. Indra Giri no. 26, Padang Harapan, Bengkulu', 'BENGKULU'),
(93, 'Pemerintah Provinsi Bengkulu', 'Badan Perpustakaan, Arsip dan Dokumentasi Daerah', 'Jl. Mahoni no. 12, Bengkulu', 'BENGKULU'),
(94, 'Pemerintah Provinsi Bengkulu', 'Dinas Pendidikan', 'Jl. Indra Giri no. 26, Padang Harapan, Bengkulu', 'BENGKULU'),
(95, 'Pemerintah Provinsi Bengkulu', 'Dinas Komunikasi, Informatika dan Statistik', 'Jl. Basuki Rahmat, Nomor 06, Sawah Lebar Baru, (0736) 7325176, Kota Bengkulu', 'BENGKULU'),
(96, 'Pemerintah Provinsi Bengkulu', 'Dinas Perindustrian dan Perdagangan', 'jl. S. Parman No.21 Bengkulu 38227', 'BENGKULU'),
(97, 'Pemerintah Provinsi Bengkulu', 'Dinas Penanaman Modal dan PTSP', 'Jl. Batang Hari No. 108, Padang Harapan Bengkulu 38225', 'BENGKULU'),
(98, 'Pemerintah Provinsi Gorontalo', 'Badan Kepegawaian Daerah Provinsi Gorontalo', 'Jl. Thayeb Moh. Gobel, Komp. Blok Plan Desa Ayula Tinelo, Kec. Bulango Selatan 96182', 'GORONTALO'),
(99, 'Pemerintah Provinsi Kalimantan Barat', 'Biro Administrasi Pimpinan Sekretariat Daerah', 'Jl. Ahmad Yani Pontianak, Kalimantan Barat', 'KALIMANTAN BARAT'),
(100, 'Pemerintah Provinsi Kalimantan Barat', 'Dinas Perpustakaan dan Kearsipan', 'Jl. Letjen Sutoyo no. 6, Pontianak 78121', 'KALIMANTAN BARAT'),
(101, 'Pemerintah Provinsi Sulawesi Selatan', 'Biro Administrasi Pimpinan Sekretariat Daerah', 'Jl. Urip Sumoharjo No 269', 'SULAWESI SELATAN'),
(102, 'Pemerintah Provinsi Kalimantan Tengah', 'Dinas Kebudayaan dan Pariwisata', 'Jl. Cilik Riwut Km. 5,5, Bukit Tunggal, Jekan Raya, Kota Palangka Raya, Kalimantan Tengah 74874', 'KALIMANTAN TENGAH'),
(103, 'Pemerintah Provinsi Kalimantan Tengah', 'Biro Administrasi Pimpinan Sekretariat Daerah', 'Jl. R.T.A. Milono No.1 Palangka Raya', 'KALIMANTAN TENGAH'),
(104, 'Pemerintah Provinsi Kalimantan Tengah', 'Dinas Penanaman Modal dan PTSP', 'Jl. Tjilik Riwut Km 5,5 Palangka Raya 73112', 'KALIMANTAN TENGAH'),
(105, 'Pemerintah Provinsi Kep. Bangka Belitung', 'Dinas Pendidikan', 'Jl. Kompleks Perkantoran Pemerintahan Kepulauan Provinsi Bangka Belitung, Air Itam, Pangkal Pinang, Bangka Belitung', 'KEPULAUAN BANGKA BELITUNG'),
(106, 'Pemerintah Provinsi Kep. Bangka Belitung', 'Dinas Kebudayaan dan Pariwisata', 'Jl. Kompleks Perkantoran Pemerintahan Kepulauan Provinsi Bangka Belitung, Air Itam, Pangkal Pinang, Bangka Belitung', 'KEPULAUAN BANGKA BELITUNG'),
(107, 'Pemerintah Provinsi Kep. Bangka Belitung', 'Badan Perencanaan dan Penelitian Pembangunan Daerah', 'Jl. Kompleks Perkantoran Pemerintahan Kepulauan Provinsi Bangka Belitung, Air Itam, Pangkal Pinang, Bangka Belitung', 'KEPULAUAN BANGKA BELITUNG'),
(108, 'Pemerintah Provinsi Kep. Bangka Belitung', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Jl. Kompleks Perkantoran Pemerintahan Kepulauan Provinsi Bangka Belitung, Air Itam, Pangkal Pinang, Bangka Belitung', 'KEPULAUAN BANGKA BELITUNG'),
(109, 'Pemerintah Provinsi Kep. Bangka Belitung', 'Badan Perpustakaan dan Arsip Daerah', 'Kompleks Perkantoran Walikota Pangkal Pinang, Jl. Rasa Kunda Bukit Intan Pangkal Pinang, Bangka Belitung', 'KEPULAUAN BANGKA BELITUNG'),
(110, 'Pemerintah Provinsi Kepulauan Riau', 'Biro Humas Protokol dan Penghubung', 'Gedung Sultan Mahmud Riayat Syah - Pulau Dompak Kota Tanjungpinang Provinsi Kepulauan Riau', 'KEPULAUAN RIAU'),
(111, 'Pemerintah Provinsi Kepulauan Riau', 'Biro Humas Protokol dan Penghubung', 'Pusat Pemerintahan Provinsi Kepulauan Riau, Istana Kota Piring, Gedung Sultan Mahmud Riayat Syah, Pulau Dompak - Tanjungpinang, Provinsi Kepulauan Riau, Kode Pos 29124', 'KEPULAUAN RIAU'),
(112, 'Pemerintah Provinsi NTB', 'Dinas Pariwisata Provinsi NTB', 'Jl. Langko No. 70, Mataram, Nusa Tenggara Barat', 'NUSA TENGGARA BARAT'),
(113, 'Pemerintah Provinsi NTB', 'Kantor Penghubung Pemerintah Provinsi NTB di Jakarta', 'Jalan Garut No. 5, Menteng, Jakarta Pusat', 'JAKARTA'),
(114, 'Pemerintah Provinsi NTB', 'Biro Humas dan Protokol', 'Jl. Pejanggik No.12, Mataram, NTB', 'NUSA TENGGARA BARAT'),
(115, 'Pemerintah Provinsi NTB', 'Dinas Perpustakaan dan Kearsipan', 'Jl. Majapahit No. 09, Mataram', 'NUSA TENGGARA BARAT'),
(116, 'Pemerintah Provinsi Riau', 'Dinas Pariwisata Provinsi Riau', 'Komplek Bandar Serai Jl. Sudirman Pekanbaru Riau 28282', 'RIAU'),
(117, 'Pemerintah Provinsi Riau', 'Badan Penghubung Provinsi Riau', 'Jl. Otto iskandar dinata Raya No. 107 Jakarta Timur 13330', 'JAKARTA'),
(118, 'Pemerintah Provinsi Sulawesi Selatan', 'Dinas Kebudayaan dan Kepariwisataan', 'Jl. Sudirman No. 23 Makassar', 'SULAWESI SELATAN'),
(119, 'Pemerintah Provinsi Sulawesi Selatan', 'Biro Pemerintahan Sekretariat Daerah', 'Jl. Urip Sumoharjo No 269', 'SULAWESI SELATAN'),
(120, 'Pemerintah Provinsi Sulawesi Selatan', 'Biro Administrasi Pimpinan Sekretariat Daerah', 'Jl. Urip Sumoharjo No 269', 'SULAWESI SELATAN'),
(121, 'Pemerintah Provinsi Sulawesi Selatan', 'Dinas Penanaman Modal dan PTSP', 'Jl. Bougenville No 5, Makassar', 'SULAWESI SELATAN'),
(122, 'Pemerintah Provinsi Sumatera Barat', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Jl. Setia Budi No. 15 Kecamatan Padang Barat Sumatra Barat 25112', 'SUMATERA BARAT'),
(123, 'Pemerintah Provinsi Sumatera Barat', 'Biro Kerjasama, Pembangunan dan Rantau Sekretariat Daerah', 'Jl. Jend. Sudirman No. 51, Padang Pasir, Padang Bar., Kota Padang, Sumatera Barat 25129', 'SUMATERA BARAT'),
(124, 'Sekretariat Jenderal DPR RI', 'Biro Kerja Sama Antar Parlemen', 'Gd. DPR RI, Jl. Jenderal Gatot Subroto, Senayan,Jakarta 10270', 'JAKARTA'),
(125, 'Sekretariat Kabinet', 'Asisten Deputi Bidang Naskah dan Penerjemahan', 'Jl. Veteran No.18 Jakarta 10110', 'JAKARTA'),
(126, 'Setjen Dewan Perwakilan Daerah', 'DPD RI', 'Jl. Jenderal Gatot Subroto No.6 Jakarta 10270', 'JAKARTA'),
(128, 'zxzxz', 'xcxcxc', 'cvcvcvcv', 'bbbbbbb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerjemah`
--

CREATE TABLE `penerjemah` (
  `id_penerjemah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `golongan` enum('I/a/Juru Muda','I/b/Juru Muda Tingkat I','I/c/Juru','I/d/Juru Tingkat I','II/a/Pengatur Muda','II/b/Pengatur Muda Tingkat I','II/c/Pengatur','II/d/Pengatur Tingkat I','III/a/Penata Muda','III/b/Penata Muda Tingkat I','III/c/Penata','III/d/Penata Tingkat I','IV/a/Pembina','IV/b/Pembina Tingkat I','IV/c/Pembina Utama Muda','IV/d/Pembina Utama Madya','IV/e/Pembina Utama') NOT NULL,
  `tmtgol` date NOT NULL,
  `jabatan` enum('Penerjemah Ahli Pertama','Penerjemeh Ahli Muda','Penerjemah Ahli Madya','Penerjemah Ahli Utama') NOT NULL,
  `tmtjab` date NOT NULL,
  `id_instansi_penerjemah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerjemah`
--

INSERT INTO `penerjemah` (`id_penerjemah`, `nama`, `nip`, `tempat`, `tanggal_lahir`, `email`, `telepon`, `golongan`, `tmtgol`, `jabatan`, `tmtjab`, `id_instansi_penerjemah`) VALUES
(3, 'Ratna Dibyaningtyas Margitarina,S.Sos.MA', 197312162006042002, 'SEMARANG', '1973-12-16', 'mratnadibyaningtyas@yahoo.com', '081931973081', 'III/b/Penata Muda Tingkat I', '2013-01-01', 'Penerjemah Ahli Pertama', '2013-01-01', 22),
(4, 'Ratna Mala Sukma, S.S.', 198005262006042001, 'MANOKWARI', '1980-05-26', 'ratnamalasukma@yahoo.com', '081344379989', 'III/d/Penata Tingkat I', '2016-11-01', '', '2016-11-01', 36),
(5, 'Rina Alexandra, S.S.', 198101142009122002, 'JAKARTA', '1981-01-14', 'rina_alexandra@yahoo.com', '081322203874', 'III/a/Penata Muda', '2013-01-01', 'Penerjemah Ahli Pertama', '2013-01-01', 23),
(17, 'aaaaaaaaaa', 198710162011012010, 'asasasas', '1111-11-11', 'admin@gmail.com', '089670303419', 'I/a/Juru Muda', '1111-11-11', 'Penerjemah Ahli Pertama', '1111-11-11', 19);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `penerjemah`
--
ALTER TABLE `penerjemah`
  ADD PRIMARY KEY (`id_penerjemah`),
  ADD KEY `id_instansi_penerjemah` (`id_instansi_penerjemah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `penerjemah`
--
ALTER TABLE `penerjemah`
  MODIFY `id_penerjemah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penerjemah`
--
ALTER TABLE `penerjemah`
  ADD CONSTRAINT `penerjemah_ibfk_1` FOREIGN KEY (`id_instansi_penerjemah`) REFERENCES `instansi` (`id_instansi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
