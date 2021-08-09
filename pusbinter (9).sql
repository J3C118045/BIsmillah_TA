-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 06:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Kepala Pusat Pembinaan Penerjemah'),
(2, 'Kepala Bidang Program dan Pengembangan'),
(3, 'Kepala Bidang Evaluasi dan Kompetensi'),
(4, 'Kepala Bagian Tata Usaha'),
(5, 'Kepala Subbidang Perencanaan dan Pengembangan Program dan Kerjasama'),
(6, 'Kepala Subbidang Penilaian Kinerja'),
(7, 'Kepala Subbagian Umum'),
(8, 'Kepala Subbagian Data dan Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
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
(127, 'Komisi Yudisial', 'Pusat Analisis dan Layanan Informasi', 'Komisi Yudisial Republik Indonesia\nJl. Kramat Raya No. 57, Jakarta Pusat', 'JAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Surat Masuk'),
(2, 'Surat Keluar'),
(3, 'Memo'),
(4, 'Surat Usulan Rekomendasi Pengangkatan'),
(5, 'Surat Usulan Rekomendasi Pemberhentian'),
(6, 'Surat Usulan Formasi Penerjemah'),
(7, 'Surat Perintah '),
(8, 'SPRINT'),
(9, 'Memorandum Masuk'),
(10, 'Memorandum Keluar'),
(11, 'Surat Pernyataan'),
(12, 'PAK / KAK'),
(14, 'Sertifikat Uji Kompetensi'),
(15, 'Sertifikat Diklat');

-- --------------------------------------------------------

--
-- Table structure for table `penerjemah`
--

CREATE TABLE `penerjemah` (
  `id_penerjemah` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `golongan` enum('I/a/Juru Muda','I/b/Juru Muda Tingkat I','I/c/Juru','I/d/Juru Tingkat I','II/a/Pengatur Muda','II/b/Pengatur Muda Tingkat I','II/c/Pengatur','II/d/Pengatur Tingkat I','III/a/Penata Muda','III/b/Penata Muda Tingkat I','III/c/Penata','III/d/Penata Tingkat I','IV/a/Pembina','IV/b/Pembina Tingkat I','IV/c/Pembina Utama Muda','IV/d/Pembina Utama Madya','IV/e/Pembina Utama') DEFAULT NULL,
  `tmtgol` date DEFAULT NULL,
  `jabatan` enum('Penerjemah Ahli Pertama','Penerjemah Ahli Muda','Penerjemah Ahli Madya','Penerjemah Ahli Utama') DEFAULT NULL,
  `tmtjab` date DEFAULT NULL,
  `id_instansi_penerjemah` int(10) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerjemah`
--

INSERT INTO `penerjemah` (`id_penerjemah`, `nama`, `nip`, `tempat`, `tanggal_lahir`, `email`, `telepon`, `golongan`, `tmtgol`, `jabatan`, `tmtjab`, `id_instansi_penerjemah`, `status`) VALUES
(1, 'Nur Azizah, S.S.', '198209082009042005', 'JAKARTA', '1990-11-30', 'hubbinafillah@gmail.com', '081311483547', 'III/c/Penata', '2019-03-20', 'Penerjemah Ahli Muda', '2019-03-20', 70, 'Aktif'),
(2, 'Penni Patmawati Rusman, S.S.', '198609092009012001', 'SUKABUMI', '1986-09-09', 'penni.patmawati@gmail.com', '08562263922', 'IV/a/Pembina', '2019-07-26', 'Penerjemah Ahli Madya', '2019-07-26', 21, 'Aktif'),
(3, 'Ratna Dibyaningtyas Margitarina,S.Sos.MA', '197312162006042002', 'SEMARANG', '1973-12-16', 'mratnadibyaningtyas@yahoo.com', '081931973081', 'III/b/Penata Muda Tingkat I', '2013-01-01', 'Penerjemah Ahli Pertama', '2013-01-01', 22, 'Aktif'),
(4, 'Ratna Mala Sukma, S.S.', '198005262006042001', 'MANOKWARI', '1980-05-26', 'ratnamalasukma@yahoo.com', '081344379989', 'III/d/Penata Tingkat I', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 36, 'Aktif'),
(5, 'Rini Rusyeni, S.IP.. MA.', '198003142001121001', 'JAKARTA SELATAN', '1980-03-14', 'rinirusyeni80@gmail.com', '081281820279', 'III/c/Penata', '2012-02-01', 'Penerjemah Ahli Muda', '2012-02-01', 1, 'Aktif'),
(6, 'Ririn Scorviyanti, S.Pd., M.M.Tr.', '197710232006042001', 'JAKARTA', '1977-03-23', 'hilhai_ayu@yahoo.co.id', '08128442172', 'III/b/Penata Muda Tingkat I', '2011-06-01', 'Penerjemah Ahli Pertama', '2011-06-01', 59, 'Aktif'),
(7, 'Risa Sukmawardani, S.S.', '198005032003122001', 'JAKARTA', '1980-05-03', 'risasukmawardani@gmail.com', '087881523600', 'III/d/Penata Tingkat I', '2017-03-10', 'Penerjemah Ahli Muda', '2017-03-10', 12, 'Aktif'),
(8, 'Sabdanur, S.Ag.', '197505132005011002', 'JAMBI', '1975-05-13', 'wosabdanur75@gmail.com', '082177233539', 'III/c/Penata', '2013-07-01', 'Penerjemah Ahli Muda', '2013-07-01', 37, 'Aktif'),
(9, 'Siti Alfa Ariestya, S.S.', '198005172006042003', 'PASURUAN', '1980-05-17', 'akualfa2010@yahoo.com', '081254423310', 'III/c/Penata', '2017-07-01', 'Penerjemah Ahli Muda', '2017-07-01', 38, 'Aktif'),
(10, 'Siti Chodijah, S.Hum.', '198204192009122002', 'JAKARTA', '1982-04-19', 'khadeeja_19@yahoo.com', '082297952155', 'III/c/Penata', '2018-08-01', 'Penerjemah Ahli Muda', '2018-08-01', 24, 'Aktif'),
(11, 'Sofyan Effendi, S.Th.I.', '199010202015031003', 'KEBUMEN', '1990-10-20', 'sofyaneff90@gmail.com', '082133886631', 'III/a/Penata Muda', '2018-04-23', 'Penerjemah Ahli Pertama', '2018-04-23', 89, 'Aktif'),
(12, 'Sophan Derryan Lintang, S.S.', '197912282010011013', 'JAKARTA', '1979-12-28', 'lintang2016ok@gmail.com', '08588313217', 'III/c/Penata', '2020-03-01', 'Penerjemah Ahli Muda', '2020-03-01', 105, 'Aktif'),
(13, 'Sri Vidia Fika, S.Pd.', '198203132006042001', 'PALEMBANG', '1982-03-13', 'srividia.fika@kemdikbud.go.id', '08197813382', 'III/c/Penata', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 39, 'Aktif'),
(14, 'Suceputra Sigunsa, S.S.', '198112202008041001', 'BENGKULU', '1981-12-20', 'yusufalfatih81@gmail.com', '081368196791', 'III/c/Penata', '2017-08-18', 'Penerjemah Ahli Muda', '2017-08-18', 90, 'Aktif'),
(15, 'Sugiarti, S.Hum.', '198612182011012020', 'BOGOR', '1986-12-18', 'sugiartisman2@gmail.com', '081380548547', 'III/a/Penata Muda', '2020-08-01', 'Penerjemah Ahli Muda', '2020-08-01', 25, 'Aktif'),
(16, 'Sularsih, S.S.', '198207082009122002', 'WONOGIRI', '1982-07-08', 'mizasih@gmail.com', '08176412437', 'III/d/Penata Tingkat I', '2017-03-01', 'Penerjemah Ahli Muda', '2017-03-01', 8, 'Aktif'),
(17, 'Surya Kurniawan Suhairi, S.Psi., M.IDP.', '198305282008031001', 'JAKARTA', '1983-05-28', 'surya-k@kemenperin.go.id', '0818830012', 'III/d/Penata Tingkat I', '2017-01-03', 'Penerjemah Ahli Muda', '2017-01-03', 61, 'Aktif'),
(18, 'Syekh Ahmad Sobri, S.S.', '197805232010011008', 'MUARA ENIM', '1978-05-23', 'syekhsobri@yahoo.com', '081367324461', 'III/d/Penata Tingkat I', '2017-03-01', 'Penerjemah Ahli Muda', '2017-03-01', 106, 'Aktif'),
(19, 'Taufiq Awaludin, S.S.', '197808302006041002', 'BANDUNG', '1978-08-30', 'taufiq.awaludin78@gmail.com', '081368300317', 'III/c/Penata', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 40, 'Aktif'),
(20, 'Tri Martiningsih, S.S, M.M.', '198203162011012007', 'BANDUNG', '1982-03-16', 'trimartiningsih@gmail.com', '081284910074', 'III/c/Penata', '2019-07-01', 'Penerjemah Ahli Muda', '2019-07-01', 32, 'Aktif'),
(21, 'Victoria, S.S', '198411252010012002', 'PALANGKA RAYA', '1984-11-25', 'orikame.vd@gmail.com', '08156200012', 'III/b/Penata Muda Tingkat I', '2015-08-01', 'Penerjemah Ahli Pertama', '2015-08-01', 102, 'Aktif'),
(22, 'Wahdanie Rakhman, S.S.', '197808142005011001', 'BANJARBARU', '1978-08-14', 'wahdanie.rakhman@kemdikbud.go.id', '081351737372', 'III/d/Penata Tingkat I', '2018-07-01', 'Penerjemah Ahli Muda', '2018-07-01', 38, 'Aktif'),
(23, 'Wilda Stiana, S.S.', '198610012011012014', 'JAKARTA', '1926-12-12', 'wilda.stiana@yahoo.com', '081288384418', 'III/b/Penata Muda Tingkat I', '2019-07-26', 'Penerjemah Ahli Muda', '2019-07-26', 23, 'Aktif'),
(24, 'Winda Dwi Melisa, S.S., MEGov', '198902272011012004', 'PADANG', '1989-02-27', 'winda.melisa@penerjemahpemerintah.id', '082117476351', 'III/c/Penata', '2020-04-01', 'Penerjemah Ahli Muda', '2020-04-01', 122, 'Aktif'),
(25, 'Yanos Okterano, S.S., M.A.', '197910212005011001', 'JAKARTA', '1979-10-21', 'yanos.ok@penerjemahpemerintah.id', '087887054976', 'III/d/Penata Tingkat I', '2013-09-30', 'Penerjemah Ahli Muda', '2013-09-30', 13, 'Aktif'),
(26, 'Yessy Successly, S.Hum.', '198806142015032003', 'PADANG', '1988-06-14', 'yessy.successly@gmail.com', '085310501854', 'III/a/Penata Muda', '2017-04-04', 'Penerjemah Ahli Pertama', '2017-04-04', 14, 'Aktif'),
(27, 'Zelly Eliani, S.S.', '198204232010012010', 'BANGKA', '1982-04-23', 'zelly.eliani@gmail.com', '085322992024', 'III/c/Penata', '2020-03-01', 'Penerjemah Ahli Muda', '2020-03-01', 106, 'Aktif'),
(28, 'Yolferi, S.S., M.Hum.', '197107132006041001', 'KAMPAR', '1971-07-13', 'yolferiabdullah@gmail.com', '08126394557', 'III/c/Penata', '2017-02-01', 'Penerjemah Ahli Muda', '2017-02-01', 41, 'Aktif'),
(29, 'Anas Yuliadi Nurdin, S.S.', '197607072006041001', 'MANADO', '1976-07-07', 'anasmanado@gmail.com', '081356666626', 'III/c/Penata', '2018-02-01', 'Penerjemah Ahli Muda', '2018-02-01', 42, 'Aktif'),
(30, 'Ni Putu Ayu Krisna Dewi, S.S.', '197801072005012002', 'TABANAN', '1990-03-01', 'ayukrisna_dewi@yahoo.com', '0817355178', 'III/d/Penata Tingkat I', '2017-04-01', 'Penerjemah Ahli Muda', '2017-04-01', 43, 'Aktif'),
(31, 'Meyrina Megasari, S.Hum.', '198605082014032005', 'JAKARTA SELATAN', '1986-05-08', 'meyrina.megasari@penerjemahpemerintah.id', '087888646864', 'III/b/Penata Muda Tingkat I', '2018-08-01', 'Penerjemah Ahli Pertama', '2018-08-01', 1, 'Aktif'),
(32, 'Nugrahita Rizky, S.Hum.', '198611222014032001', 'JAKARTA SELATAN', '1986-11-22', 'kikinugrahita@gmail.com', '081380390676', 'III/b/Penata Muda Tingkat I', '2018-08-01', 'Penerjemah Ahli Pertama', '2018-08-01', 2, 'Aktif'),
(33, 'Rica Hartami, S.S.', '198701262011022001', 'PEKANBARU', '1987-01-26', 'rica_hartami@hotmail.com', '085263692226', 'III/c/Penata', '2020-01-29', 'Penerjemah Ahli Muda', '2020-01-29', 116, 'Aktif'),
(34, 'Muhammad Erfan, S.S.', '198002262010011012', 'BANGKA BARAT', '1980-02-26', 'em.erfan.com@gmail.com', '081364099100', 'III/c/Penata', '2019-10-01', 'Penerjemah Ahli Muda', '2019-10-01', 75, 'Aktif'),
(35, 'Mayke Widi, S.Hum.', '198405062011011003', 'PADANG', '1984-05-06', 'maykewidi.mw@gmail.com', '081270100648', 'III/b/Penata Muda Tingkat I', '2018-12-28', 'Penerjemah Ahli Pertama', '2018-12-28', 110, 'Aktif'),
(36, 'Zumalal Laeli, S.S.', '197905062005012003', 'REMBANG', '1979-05-06', 'laelizumalal@gmail.com', '081369675044', 'III/d/Penata Tingkat I', '2018-07-27', 'Penerjemah Ahli Muda', '2018-07-27', 37, 'Aktif'),
(37, 'Rahmadina, S.Ag.', '197710202010122002', 'LIMA PULUH KOTA', '1977-10-20', 'dina_bza@yahoo.co.id', '081365536840', 'III/c/Penata', '2020-02-20', 'Penerjemah Ahli Muda', '2020-02-20', 37, 'Aktif'),
(38, 'Wessa Ostika Utami, S.S.', '198701182010122004', 'JAMBI', '1987-01-18', 'wecha_oztika@yahoo.co.id', '081366325321', 'III/c/Penata', '2020-02-10', 'Penerjemah Ahli Muda', '2020-02-10', 37, 'Aktif'),
(39, 'Yalta Jalinus, M.Pd.', '197402152005011002', 'PEKANBARU', '1974-02-15', 'yaltaj_5@yahoo.com', '085356544680', 'III/d/Penata Tingkat I', '2018-09-24', 'Penerjemah Ahli Muda', '2018-09-24', 44, 'Aktif'),
(40, 'Estu Widyamurti, S.Hum.', '198806172018012001', 'JAKARTA', '1988-06-17', 'estu.widyamurti@gmail.com', '085280902013', 'III/a/Penata Muda', '2010-10-01', 'Penerjemah Ahli Pertama', '2010-10-01', 125, 'Aktif'),
(41, 'Galuh Wicaksono Hidayat, S.Hum.', '199008012018011002', 'JAKARTA', '1990-08-01', 'hidayatgaluh@gmail.com', '085692753035', 'III/a/Penata Muda', '2010-10-01', 'Penerjemah Ahli Pertama', '2010-10-01', 125, 'Aktif'),
(42, 'Andri, S.Pd.', '197106092011011001', 'TANJUNG PINANG', '1971-06-09', 'asliandri3@gmail.com', '081372240094', 'III/c/Penata', '2020-07-03', 'Penerjemah Ahli Muda', '2020-07-03', 111, 'Aktif'),
(43, 'Abdul Muiz, S.Pd.', '198602122018011001', 'PANDEGLANG', '1917-07-10', 'monsieurmuiz@gmail.com', '081285972158', 'III/a/Penata Muda', '2019-08-08', 'Penerjemah Ahli Pertama', '2019-08-08', 124, 'Aktif'),
(44, 'Nurul Muttaqin, S.S.', '198608062018021001', 'DEMAK', '1986-08-06', 'mutthsm@gmail.com', '081575094044', 'III/a/Penata Muda', '2019-08-08', 'Penerjemah Ahli Pertama', '2019-08-08', 124, 'Aktif'),
(45, 'Yudi Chandri Setiawan, S.Pd.', '199112232018031001', 'SOLO', '1931-01-12', 'yudichandri@gmail.com', '082301569024', 'III/a/Penata Muda', '2019-08-08', 'Penerjemah Ahli Pertama', '2019-08-08', 124, 'Aktif'),
(46, 'Devyanti Asmalasari, S.S., M.Pd.', '197812052006042002', 'BANDUNG', '1978-12-05', 'dv_soenda@yahoo.com', '08121980639', 'III/d/Penata Tingkat I', '2019-08-19', 'Penerjemah Ahli Muda', '2019-08-19', 40, 'Aktif'),
(47, 'Evi Olivia Kumbangsila, S.Pd.', '198312142010122002', 'AMBON', '1990-02-16', 'evioliviakumbangsila@gmail.com', '081248570572', 'III/b/Penata Muda Tingkat I', '2018-10-02', 'Penerjemah Ahli Pertama', '2018-10-02', 45, 'Aktif'),
(48, 'Faisal Gazali, S.S.', '198304042010121005', 'PEKANBARU', '1983-04-04', 'faisal.gazali@gmail.com', '081321600284', 'III/c/Penata', '2019-08-27', 'Penerjemah Ahli Pertama', '2019-08-27', 46, 'Aktif'),
(49, 'Meindika Wiweka Hartri, S.S.', '198605122010122002', 'GROBOGAN', '1986-05-12', 'meindikawh@gmail.com', '081290033199', 'III/c/Penata', '2020-07-14', 'Penerjemah Ahli Muda', '2020-07-14', 16, 'Aktif'),
(50, 'R. Ratna Sarwilujeng, S.S., M.M.Tr.', '197207101999032001', 'JAKARTA SELATAN', '1972-07-10', 'wilujeng.2u@gmail.com', '08128017075', 'IV/a/Pembina', '2019-06-12', 'Penerjemah Ahli Madya', '2019-06-12', 60, 'Aktif'),
(51, 'Raja Rachmawati, S.Pd.', '197403102005012001', 'TANJUNG PINANG', '2020-01-12', 'raja.rachmawati@yahoo.com', '081276656611', 'III/d/Penata Tingkat I', '2015-01-01', 'Penerjemah Ahli Muda', '2015-01-01', 46, 'Aktif'),
(52, 'Ratih Gumilang, S.Hum., M.H.', '198710162011012010', 'JAKARTA', '1987-10-16', 'mamuyonduty@gmail.com', '085217776575', 'III/c/Penata', '2019-04-30', 'Penerjemah Ahli Muda', '2019-04-30', 71, 'Aktif'),
(53, 'Ratri Nugrahini, S.Pd.', '198212012009012006', 'YOGYAKARTA', '1982-12-01', 'ratrinugrahini@gmail.com', '085643530375', 'III/a/Penata Muda', '2011-09-01', 'Penerjemah Ahli Pertama', '2011-09-01', 26, 'Aktif'),
(54, 'Rokhimah Rokhimus Sofyan, S.S.', '199209012015032001', 'BANYUMAS', '1992-09-01', 'sofyan.rokhimah@gmail.com', '085647777141', 'III/b/Penata Muda Tingkat I', '2017-05-22', 'Penerjemah Ahli Pertama', '2017-05-22', 18, 'Aktif'),
(55, 'Safoan Abdul Hamid, S.Pd.', '197412312006041002', 'LOMBOK BARAT', '1974-12-31', 'safoan.hamid@gmail.com', '08175754286', 'III/d/Penata Tingkat I', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 47, 'Aktif'),
(56, 'Tigor Nirman Simanjuntak, S.S.', '198411262011011007', 'PEKANBARU', '1984-11-26', 'tigor@bps.go.id', '081314634509', 'III/d/Penata Tingkat I', '2017-07-01', 'Penerjemah Ahli Muda', '2017-07-01', 4, 'Aktif'),
(57, 'Toni Samsul Hidayat, M.Pd.', '197805162005011002', 'LOMBOK BARAT', '1978-05-16', 'echa.lubna08@gmail.com', '087865110164', 'III/d/Penata Tingkat I', '2013-07-01', 'Penerjemah Ahli Muda', '2013-07-01', 47, 'Aktif'),
(58, 'Aprizal, S.S., M.Si.', '197610192010011010', 'JAKARTA', '1976-10-19', 'arsyasyatief@gmail.com', '081808420073', 'III/b/Penata Muda Tingkat I', '2018-12-04', 'Penerjemah Ahli Pertama', '2018-12-04', 117, 'Aktif'),
(59, 'Ari Suprapti, S.S.', '198308262008042003', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-01-01', 'Penerjemah Ahli Pertama', '2013-01-01', 91, 'Aktif'),
(60, 'Dewi Indrayanti Savitri, S.S.', '198604062009012002', 'BANTUL', '1986-04-06', 'dewindrayanti@gmail.com', '081328498336', 'III/c/Penata', '2017-12-13', 'Penerjemah Ahli Muda', '2017-12-13', 18, 'Aktif'),
(61, 'Dian Sati, S.S.', '198710012011012009', 'SANGGAU', '1987-10-01', 'diansatim4tondang@gmail.com', '085252057499', 'III/b/Penata Muda Tingkat I', '2013-12-01', 'Penerjemah Ahli Pertama', '2013-12-01', 99, 'Aktif'),
(62, 'Eva Mariaty, S.S.', '198403292010012018', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-01-07', 'Penerjemah Ahli Pertama', '2013-01-07', 91, 'Aktif'),
(63, 'Eva Safitri, S.Hum.', '198409012008042001', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '085273704888', 'III/b/Penata Muda Tingkat I', '2013-01-07', 'Penerjemah Ahli Pertama', '2013-01-07', 91, 'Aktif'),
(64, 'Irma Agryanti, S.S.', '198608282011012013', 'MATARAM', '1986-08-28', 'irma.agryanti@gmail.com', '081805774547', 'III/b/Penata Muda Tingkat I', '2015-05-05', 'Penerjemah Ahli Pertama', '2015-05-05', 112, 'Aktif'),
(65, 'Jhon Risman Purba, S.S.', '198109242010011007', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-01-07', 'Penerjemah Ahli Pertama', '2013-01-07', 92, 'Aktif'),
(66, 'Laila Kurniawaty, S.Pd., M.A.', '197910062002122003', 'JAKARTA', '1998-01-01', 'user@setkab.go.id', '00', 'III/c/Penata', '2010-10-01', 'Penerjemah Ahli Muda', '2010-10-01', 48, 'Aktif'),
(67, 'Melva Fridawati Silalahi, S.S.', '198510062011012003', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-04-22', 'Penerjemah Ahli Pertama', '2013-04-22', 93, 'Aktif'),
(68, 'Nova Elfiyanti, S.S.', '198202232010012008', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-01-07', 'Penerjemah Ahli Pertama', '2013-01-07', 94, 'Aktif'),
(69, 'Rita Eviyanti, S.S.', '198502282010012014', 'BELITUNG', '1985-02-28', 'ritaeviyanti28@yahoo.com', '081273618169', 'III/c/Penata', '2020-03-01', 'Penerjemah Ahli Muda', '2020-03-01', 106, 'Aktif'),
(70, 'Tedy Feriansyah, S.S.', '198605012009031001', 'BENGKULU', '1986-05-01', 'tedyferiansyah@gmail.com', '081392347171', 'III/c/Penata', '2017-08-18', 'Penerjemah Ahli Muda', '2017-08-18', 95, 'Aktif'),
(71, 'Vina Loriza, S.S.', '198609082011012006', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '085758155342', 'II/a/Pengatur Muda', '2013-03-28', 'Penerjemah Ahli Pertama', '2013-03-28', 93, 'Aktif'),
(72, 'Wina Julizarni, S.Hum.', '198607242010012012', 'JAKARTA', '1980-01-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2013-01-01', 'Penerjemah Ahli Pertama', '2013-01-01', 91, 'Aktif'),
(73, 'Winda Nugraheni, S.S.', '198507022011012003', 'SEMARANG', '1985-07-02', 'winda_nugraheni@yahoo.com', '081295919288', 'III/b/Penata Muda Tingkat I', '2016-04-05', 'Penerjemah Ahli Pertama', '2016-04-05', 113, 'Aktif'),
(74, 'Muhammad Erwin Darma', '198204042006041004', 'SAMARINDA', '1982-04-04', 'darma_ismaya@yahoo.com', '08125584022', 'III/c/Penata', '2018-02-01', 'Penerjemah Ahli Muda', '2018-02-01', 49, 'Aktif'),
(75, 'Novi Muharrami, S.S.', '197911282014022001', 'DEPOK', '1979-11-28', 'novi.muharrami@gmail.com', '081250234364', 'III/a/Penata Muda', '2015-06-01', 'Penerjemah Ahli Pertama', '2015-06-01', 99, 'Aktif'),
(76, 'Zamzam Hariro, S.Pd., M.Pd.', '197802052006041002', 'LOMBOK TIMUR', '1978-02-05', 'hariro.zam@gmail.com', '08123772355', 'III/d/Penata Tingkat I', '2014-10-01', 'Penerjemah Ahli Muda', '2014-10-01', 47, 'Aktif'),
(77, 'Dwi Pratiwi S. Husba, S.Pd.', '198604132010122005', 'LUWU', '1986-04-13', 'dwihusba@gmail.com', '082193993367', 'III/b/Penata Muda Tingkat I', '2018-01-01', 'Penerjemah Ahli Pertama', '2018-01-01', 48, 'Aktif'),
(78, 'Syafruddin, S.S.', '198208142015021001', 'BIMA', '2019-12-12', 'syafruddinabdrahman@gmail.com', '085242810198', 'III/a/Penata Muda', '2016-12-29', 'Penerjemah Ahli Pertama', '2016-12-29', 114, 'Aktif'),
(79, 'Sri Mulyani Mukhtar, S.S.', '198601192011022001', 'PARIAMAN', '1986-01-19', 'sree_moekhtar@yahoo.com', '085263180714', 'III/c/Penata', '2020-01-29', 'Penerjemah Ahli Muda', '2020-01-29', 117, 'Aktif'),
(80, 'Ana Rahmawati, S.S.', '199207132015032002', 'PALANGKA RAYA', '1992-07-13', 'anarahma58@gmail.com', '082250123399', 'III/b/Penata Muda Tingkat I', '2019-09-01', 'Penerjemah Ahli Pertama', '2019-09-01', 102, 'Aktif'),
(81, 'Arrienda Rizky Dwi Widyawati, S.S.', '199105232015032002', 'PONOROGO', '1991-05-23', 'riendarizky@gmail.com', '08995196146', 'III/b/Penata Muda Tingkat I', '2019-10-01', 'Penerjemah Ahli Pertama', '2019-10-01', 67, 'Aktif'),
(82, 'Magista Dian Fitrilia, S.Hum.', '199204062015032001', 'SEMARANG', '1992-04-06', 'magistadian@gmail.com', '08995541161', 'III/b/Penata Muda Tingkat I', '2019-10-01', 'Penerjemah Ahli Pertama', '2019-10-01', 68, 'Aktif'),
(83, 'Erni Martland Virantika Simbolon, S.S.', '198703112015052001', 'SAMOSIR', '1987-03-11', 'erni.martland@gmail.com', '081397118837', 'III/a/Penata Muda', '2019-05-28', 'Penerjemah Ahli Pertama', '2019-05-28', 76, 'Aktif'),
(84, 'Trias Noverdi, S.S., M.Hum.', '198011282009121001', 'PEKANBARU', '1980-11-28', 'triasnoverdi@gmail.com', '081398132689', 'III/c/Penata', '2019-05-01', 'Penerjemah Ahli Muda', '2019-05-01', 69, 'Aktif'),
(85, 'Fathi Mustaqim, S.S., M.A., M.Journ.Comm.', '198209032008011007', 'SUKOHARJO', '1982-09-03', 'fathi.mustaqim@gmail.com', '082285524849', 'III/d/Penata Tingkat I', '2019-12-03', 'Penerjemah Ahli Muda', '2019-12-03', 74, 'Aktif'),
(86, 'Endang Yunita Sari, S.S.', '198506132015042001', 'JAKARTA', '1985-06-13', 'end.yunita@gmail.com', '085253602513', 'III/b/Penata Muda Tingkat I', '2019-12-23', 'Penerjemah Ahli Pertama', '2019-12-23', 118, 'Aktif'),
(87, 'Erwin Suprianto B, S.S.', '198810222015041001', 'WAJO', '1920-01-12', 'erwinbaru22@gmail.com', '081211974030', 'III/b/Penata Muda Tingkat I', '2015-04-01', 'Penerjemah Ahli Pertama', '2015-04-01', 99, 'Aktif'),
(88, 'Nurliah T, S.S.', '198709012015042001', 'MAROS', '1987-09-01', 'nurliah02@gmail.com', '08114443008', 'III/b/Penata Muda Tingkat I', '2019-12-23', 'Penerjemah Ahli Pertama', '2019-12-23', 119, 'Aktif'),
(89, 'Muhammad Fadly, S.S.', '199001122015041001', 'TAKALAR', '1990-01-12', 'fadlydellu@gmail.com', '085234934500', 'III/b/Penata Muda Tingkat I', '2019-12-20', 'Penerjemah Ahli Pertama', '2019-12-20', 120, 'Aktif'),
(90, 'Silvia Nadjib, S.S.', '198111252015042001', 'UJUNG PANDANG', '1981-11-25', 'daengpepy@gmail.com', '085399792581', 'III/a/Penata Muda', '2010-10-01', 'Penerjemah Ahli Pertama', '2010-10-01', 120, 'Aktif'),
(91, 'Rusni Budiati, SIP., M.Sc., M.Eng', '197705162002122002', 'BANGKA BARAT', '1977-05-16', 'rusni.budiati@gmail.com', '081367388638', 'IV/a/Pembina', '2020-05-01', 'Penerjemah Ahli Madya', '2020-05-01', 107, 'Aktif'),
(92, 'Enny Ingketria, S.S.', '198503092010122002', 'PEKANBARU', '1985-03-09', 'enny.ingketria@gmail.com', '081311656564', 'III/a/Penata Muda', '2012-09-01', 'Penerjemah Ahli Pertama', '2012-09-01', 8, 'Aktif'),
(93, 'Fairuzzamani Inayatillah, S.S.', '199105112019022001', 'YOGYAKARTA', '1991-05-11', 'inayafairuzza@gmail.com', '081329606140', 'III/a/Penata Muda', '2020-04-07', 'Penerjemah Ahli Pertama', '2020-04-07', 125, 'Aktif'),
(94, 'Riszqie Naskiah Na\'im, S.Hut.', '198008282006042002', 'PONTIANAK', '2026-12-12', 'riszqienaim@yahoo.com', '08125658800', 'III/a/Penata Muda', '2012-01-01', 'Penerjemah Ahli Pertama', '2012-01-01', 64, 'Aktif'),
(95, 'Ma\'shum Meilina, S.S., M.M.', '198105252015042001', 'UJUNG PANDANG', '1981-05-25', 'meilina.achmad@gmail.com', '081355810606', 'III/b/Penata Muda Tingkat I', '2019-12-23', 'Penerjemah Ahli Pertama', '2019-12-23', 121, 'Aktif'),
(96, 'Tilly Wulandari, S.S.', '199204202015042001', 'UJUNG PANDANG', '1992-04-20', 'tillywan@hotmail.com', '085299302340', 'III/b/Penata Muda Tingkat I', '2019-12-23', 'Penerjemah Ahli Pertama', '2019-12-23', 121, 'Aktif'),
(97, 'Fitriani Husain, S.S.', '199004232015042001', 'DONGGALA', '1990-04-23', 'fitrianihusain2015@gmail.com', '082197223669', 'III/b/Penata Muda Tingkat I', '2019-12-23', 'Penerjemah Ahli Pertama', '2019-12-23', 121, 'Aktif'),
(98, 'Nina Farlina, S.S.', '198211102009032002', 'REJANG LEBONG', '1982-11-10', 'ninaaqlanarfendes@gmail.com', '085381098415', 'III/b/Penata Muda Tingkat I', '2010-10-01', 'Penerjemah Ahli Pertama', '2010-10-01', 96, 'Aktif'),
(99, 'Athohillah El Anshory, S.S.', '198509012015031005', 'JAKARTA', '1985-09-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2017-10-20', 'Penerjemah Ahli Pertama', '2017-10-20', 126, 'Aktif'),
(100, 'Khairul Ahyadi, S.S.', '19861102015031001', 'KOTABARU', '1986-11-01', 'user@setkab.go.id', '00', 'III/a/Penata Muda', '2017-11-01', 'Penerjemah Ahli Pertama', '2017-11-01', 126, 'Aktif'),
(101, 'Antonius Adhi Irianto, S.S.', '198405072011011007', 'SORONG', '1984-05-07', 'axeldee7@gmail.com', '081280221776', 'III/c/Penata', '2020-02-21', 'Penerjemah Ahli Muda', '2020-02-21', 72, 'Aktif'),
(102, 'Wulandari, S.Hum.', '198403112009122004', 'JAKARTA PUSAT', '1984-03-11', 'wulan.azayaka@gmail.com', '087884522434', 'III/c/Penata', '2019-08-05', 'Penerjemah Ahli Muda', '2019-08-05', 12, 'Aktif'),
(103, 'Catur Santi Darini, S.H.', '197411012001122001', 'JAKARTA PUSAT', '1974-11-01', 'catursanti111@gmail.com', '081513562248', 'III/d/Penata Tingkat I', '2019-01-09', 'Penerjemah Ahli Muda', '2019-01-09', 16, 'Aktif'),
(104, 'Yarmalus, S.Pd.', '197302182005011002', 'TANAH DATAR', '1973-02-18', 'yarmalusbaren@yahoo.co.id', '085267752119', 'III/c/Penata', '2013-07-01', 'Penerjemah Ahli Muda', '2013-07-01', 37, 'Aktif'),
(105, 'Arum Apriliyana, S.S.', '198504142009122006', 'KARANGANYAR', '1985-04-14', 'dreamy.tm@gmail.com', '085813453262', 'III/c/Penata', '2018-02-18', 'Penerjemah Ahli Muda', '2018-02-18', 13, 'Aktif'),
(106, 'Noviana Aqmarina, S.S.', '199211142019022002', 'JAKARTA', '1992-11-14', 'novianaaqmarina.anri@gmail.com', '085782386625', 'III/a/Penata Muda', '2020-06-30', 'Penerjemah Ahli Pertama', '2020-06-30', 1, 'Aktif'),
(107, 'Monica Imanuela Bendatu, S.S.', '199008072019022001', 'BANDAR LAMPUNG', '1990-08-07', 'monicabendatu@gmail.com', '082138839017', 'III/a/Penata Muda', '2020-02-01', 'Penerjemah Ahli Pertama', '2020-02-01', 1, 'Aktif'),
(108, 'Adhit Pratama Putra, S.Hum.', '198809262019021002', 'JAKARTA PUSAT', '1988-09-26', 'adhitptr26@gmail.com', '081297479926', 'III/a/Penata Muda', '2020-07-21', 'Penerjemah Ahli Pertama', '2020-07-21', 5, 'Aktif'),
(109, 'Bety Mawarni, S.S.', '199310142019022007', 'SUKOHARJO', '1993-10-14', 'betymawarni@gmail.com', '082313692588', 'III/a/Penata Muda', '2020-07-21', 'Penerjemah Ahli Pertama', '2020-07-21', 5, 'Aktif'),
(110, 'Dini Rifaati Hanifah, S.Hum.', '199603082019022006', 'KOTA SERANG', '1996-03-08', 'dinirifaati@gmail.com', '082112239038', 'III/a/Penata Muda', '2020-07-21', 'Penerjemah Ahli Pertama', '2020-07-21', 6, 'Aktif'),
(111, 'Anninda Nurul Islami, S.S.', '199004062015042002', 'JAKARTA', '1990-04-06', 'annindaislami@gmail.com', '081318164959', 'III/b/Penata Muda Tingkat I', '2020-08-04', 'Penerjemah Ahli Pertama', '2020-08-04', 30, 'Aktif'),
(112, 'Beryl Septiani Adji, S.Hum.', '199209172019032002', 'MALANG', '1992-09-17', 'adjiberyl@gmail.com', '081913200126', 'III/a/Penata Muda', '2020-03-01', 'Penerjemah Ahli Pertama', '2020-03-01', 3, 'Aktif'),
(113, 'IKRAR ADHITYA NUGRAHA, S.S.', '198612142019031002', 'CIANJUR', '1986-12-14', 'ikrar.adhitya@bnpb.go.id', '0811222813', 'III/a/Penata Muda', '2020-03-01', 'Penerjemah Ahli Pertama', '2020-03-01', 3, 'Aktif'),
(114, 'Wisnu Wardoyo', '199310012019021002', 'JAKARTA TIMUR', '1993-10-01', 'wisn005@kominfo.go.id', '081282374165', 'III/a/Penata Muda', '2020-07-06', 'Penerjemah Ahli Pertama', '2020-07-06', 24, 'Aktif'),
(115, 'Rama Andria, S.Sos, M.I.Kom', '197808242006042004', 'PADANG', '1978-08-24', 'ramaandria1@gmail.com', '081363180909', 'III/b/Penata Muda Tingkat I', '2020-11-01', 'Penerjemah Ahli Pertama', '2020-11-01', 80, 'Aktif'),
(116, 'Septiana Delaseniati, S.Pd', '197509082005012004', 'PALANGKA RAYA', '1975-09-08', 'vinavivian08@gmail.com', '085246095883', 'III/d/Penata Tingkat I', '2020-11-03', 'Penerjemah Ahli Muda', '2020-11-03', 50, 'Aktif'),
(117, 'Rensi Sisilda, S.S.', '197802102003122011', 'PALANGKA RAYA', '1978-02-10', 'rensisisilda07@gmail.com', '085252919607', 'III/d/Penata Tingkat I', '2020-11-03', 'Penerjemah Ahli Muda', '2020-11-03', 50, 'Aktif'),
(118, 'Syarif Hidayatullah. S.S., M.A.L.L.C.', '198112142005011001', 'JAKARTA SELATAN', '1981-12-14', 'syarief.hidayatullah1412@gmail.com', '081919811919', 'IV/a/Pembina', '2021-01-28', 'Penerjemah Ahli Madya', '2021-01-28', 125, 'Aktif'),
(119, 'Ana Susilowati, S.Pd. ', '198907162019022005', 'BANTUL', '1989-07-16', 'ana.susilowati.08@gmail.com', '085868407381', 'III/a/Penata Muda', '2021-01-25', 'Penerjemah Ahli Pertama', '2021-01-25', 67, 'Aktif'),
(120, 'Syarifah Aisyah, S.S.', '199112192019022001', 'BOGOR', '1991-12-19', 'rifakafadillah@gmail.com', '08128948839', 'III/a/Penata Muda', '2020-04-07', 'Penerjemah Ahli Pertama', '2020-04-07', 125, 'Aktif'),
(121, 'Rany Anjany Subachrum, S.Hum.', '199201042015032002', 'JAKARTA', '1992-01-04', 'ranyanjanysubachrum@gmail.com', '085694190501', 'III/b/Penata Muda Tingkat I', '2017-01-13', 'Penerjemah Ahli Pertama', '2017-01-13', 125, 'Aktif'),
(122, 'Ridwan Ibadurrohman, S.S.', '198704262018011001', 'BANDUNG', '1987-04-26', 'ibad2210@gmail.com', '0853 2844 81', 'III/a/Penata Muda', '2019-03-27', 'Penerjemah Ahli Pertama', '2019-03-27', 125, 'Aktif'),
(123, 'Anak Agung Ayu Dwi Yuni Pritiari, S.S., M.Si.', '198306222008022002', 'MALANG', '1983-06-22', 'yuni.pritiari83@gmail.com', '081337534371', 'III/b/Penata Muda Tingkat I', '2011-09-01', 'Penerjemah Ahli Pertama', '2011-09-01', 84, 'Aktif'),
(124, 'Abdul Basith, S.Hum', '198002022010011010', 'SUMENEP', '1980-02-02', 'basithwork@gmail.com', '081805080106', 'III/a/Penata Muda', '2014-05-01', 'Penerjemah Ahli Pertama', '2014-05-01', 77, 'Aktif'),
(125, 'Abdullah Sani, S.Pd.', '198010042006041003', 'LAMPUNG UTARA', '1980-10-04', 'sanipane80@gmail.com', '082238466844', 'III/b/Penata Muda Tingkat I', '2010-10-01', 'Penerjemah Ahli Pertama', '2010-10-01', 51, 'Aktif'),
(126, 'Adi Mishadi, S.S.', '198502022010011016', 'PALEMBANG', '1985-02-02', 'adi.mishadi.2010@gmail.com', '082176707295', 'III/c/Penata', '2020-03-01', 'Penerjemah Ahli Muda', '2020-03-01', 107, 'Aktif'),
(127, 'Agung Hestusubekti Kurniawan, S.H.', '198612222006041001', 'TANGERANG', '1986-12-22', 'go2agunghk@gmail.com', '08111336327', 'III/b/Penata Muda Tingkat I', '2016-12-01', 'Penerjemah Ahli Pertama', '2016-12-01', 17, 'Aktif'),
(128, 'Agung Purnomo, S.S.', '198605202009131001', 'SURABAYA', '1986-05-20', 'agungpurnomo8@gmail.com', '081283311860', 'III/a/Penata Muda', '2012-06-01', 'Penerjemah Ahli Pertama', '2012-06-01', 19, 'Aktif'),
(129, 'Agus Bachtiar, S.S.', '198708032015031003', 'JAKARTA', '1987-08-03', 'ajus.bah@gmail.com', '082133998352', 'III/b/Penata Muda Tingkat I', '2017-05-22', 'Penerjemah Ahli Pertama', '2017-05-22', 18, 'Aktif'),
(130, 'Ahmad Nawari, S.Pd., M.A.', '197407172003121002', 'KAMPAR', '1974-07-17', 'ahmadnawari@gmail.com', '08127686974', 'IV/b/Pembina Tingkat I', '2017-02-01', 'Penerjemah Ahli Madya', '2017-02-01', 52, 'Aktif'),
(131, 'Alfi Kurnianingsih, S.Hum.', '198507082009012003', 'BLITAR', '1985-07-08', 'alphie8785@gmail.com', '08567792141', 'III/d/Penata Tingkat I', '2012-10-01', 'Penerjemah Ahli Muda', '2012-10-01', 9, 'Aktif'),
(132, 'Alfien Handiansyah, S.S.', '198611262011011002', 'PROBOLINGGO', '1986-11-26', 'scootersholics@gmail.com', '085749201026', 'III/d/Penata Tingkat I', '2017-04-01', 'Penerjemah Ahli Muda', '2017-04-01', 81, 'Aktif'),
(133, 'Amin Mulyanto, S.S.', '197205122005011002', 'TUBAN', '1972-05-12', 'farich2@gmail.com', '085856470506', 'III/d/Penata Tingkat I', '2019-02-01', 'Penerjemah Ahli Muda', '2019-02-01', 53, 'Aktif'),
(134, 'Amrih Marsudi, S.S., M.M.', '197710192011011004', 'JAKARTA TIMUR', '1977-10-19', 'amrihmars@gmail.com', '081212306164', 'III/c/Penata', '2020-02-21', 'Penerjemah Ahli Muda', '2020-02-21', 71, 'Aktif'),
(135, 'Anandika Panca Nugraha, S.S.', '198506282010011008', 'BANGKALAN', '1985-06-28', 'anand.nugraha@gmail.com', '08983959038', 'III/b/Penata Muda Tingkat I', '2014-05-01', 'Penerjemah Ahli Pertama', '2014-05-01', 78, 'Aktif'),
(136, 'Andria Puji Kesuma, S.S.', '198109122005012002', 'PEKANBARU', '1981-09-12', 'andriapujikesuma@gmail.com', '0817160110', 'III/d/Penata Tingkat I', '2017-11-13', 'Penerjemah Ahli Muda', '2017-11-13', 12, 'Aktif'),
(137, 'Andini Sawitriana, S.S.', '198604162011012006', 'JAKARTA', '1986-04-16', 'velvetblue_corner@yahoo.co.uk', '082172733555', 'III/c/Penata', '2020-03-01', 'Penerjemah Ahli Muda', '2020-03-01', 107, 'Aktif'),
(138, 'Andriaji Gumilar Laksanaputra, S.S., MInter&TransSt.', '198408012009121003', 'BANDUNG', '1920-12-11', 'andriaji.gumilar@dpr.go.id', '08562239922', 'III/b/Penata Muda Tingkat I', '2011-09-01', 'Penerjemah Ahli Pertama', '2011-09-01', 124, 'Aktif'),
(139, 'Anjar Astriani, S.S., M.Sas.', '198304072009042005', 'JAKARTA', '1983-04-07', 'aku.anjarastriani@gmail.com', '087874523552', 'III/c/Penata', '2017-08-01', 'Penerjemah Ahli Muda', '2017-08-01', 71, 'Aktif'),
(140, 'Anne Angeline, S.S.', '198205282011012002', 'BANJARMASIN', '1982-05-28', 'annangel.ingkiriwang@gmail.com', '082153565262', 'III/b/Penata Muda Tingkat I', '2014-01-01', 'Penerjemah Ahli Pertama', '2014-01-01', 102, 'Aktif'),
(141, 'Annissa Noviarny, S.Hum.', '198511092009022006', 'TANGERANG', '1985-11-09', 'toufa18@gmail.com', '08179961901', 'III/d/Penata Tingkat I', '2019-07-01', 'Penerjemah Ahli Muda', '2019-07-01', 33, 'Aktif'),
(142, 'Awaludin Rusiandi, M.A.', '197907212005011001', 'SURABAYA', '1979-07-21', 'awaludin.rusiandi@penerjemahpemerintah.id', '08123284659', 'III/d/Penata Tingkat I', '2020-04-01', 'Penerjemah Ahli Madya', '2020-04-01', 53, 'Aktif'),
(143, 'Bintang Alvita Wahyuningtyas, S.S.', '198511232009122003', 'SURAKARTA', '1985-11-23', 'bivta@yahoo.com', '081310218225', 'III/c/Penata', '2018-06-01', 'Penerjemah Ahli Muda', '2018-06-01', 73, 'Aktif'),
(144, 'Cylas Desidarius Rianantang, S.S.', '198612132011011006', 'KETAPANG', '1986-12-13', 'cylas.d.r@gmail.com', '081227806968', 'III/a/Penata Muda', '2013-08-01', 'Penerjemah Ahli Pertama', '2013-08-01', 100, 'Aktif'),
(145, 'Dalwiningsih, S.Pd., M.Hum.', '197902092002122005', 'KEBUMEN', '1979-02-09', 'dalwiningsih@yahoo.com', '081289437217', 'IV/a/Pembina', '2019-02-01', 'Penerjemah Ahli Madya', '2019-02-01', 53, 'Aktif'),
(146, 'Desi Ari Pressanti, S.S., M.Hum.', '197812162005012001', 'KULON PROGO', '1978-12-16', 'desipressanti@gmail.com', '081228209521', 'IV/a/Pembina', '2019-02-01', 'Penerjemah Ahli Madya', '2019-02-01', 54, 'Aktif'),
(147, 'Desie Natalia, S.S.', '197612212005012001', 'BANDUNG', '1976-12-21', 'nengdc@gmail.com', '081221261819', 'III/d/Penata Tingkat I', '2017-02-01', 'Penerjemah Ahli Muda', '2017-02-01', 40, 'Aktif'),
(148, 'Desintalia, S.S.', '198212272010012009', 'BELITUNG', '1982-12-27', 'desintalia_2007@yahoo.co.id', '081367013636', 'III/a/Penata Muda', '2013-08-01', 'Penerjemah Ahli Pertama', '2013-08-01', 107, 'Aktif'),
(149, 'Dewi Ratih Rozana, S.S.', '198408132011012002', 'DELI SERDANG', '1984-08-13', 'dhewey@gmail.com', '081362368006', 'III/b/Penata Muda Tingkat I', '2013-08-01', 'Penerjemah Ahli Pertama', '2013-08-01', 107, 'Aktif'),
(150, 'Diah Susanti Handayani, S.S.', '198507082009032001', 'TEGAL', '1985-07-08', 'oshienvda@gmail.com', '081226549450', 'III/b/Penata Muda Tingkat I', '2016-12-23', 'Penerjemah Ahli Pertama', '2016-12-23', 84, 'Aktif'),
(151, 'Dian Afiana Purnama, S.S.', '198509112009032007', 'SALATIGA', '1985-09-11', 'deean.afiana@yahoo.com', '085640403815', 'III/b/Penata Muda Tingkat I', '2016-12-23', 'Penerjemah Ahli Pertama', '2016-12-23', 85, 'Aktif'),
(152, 'Dra. Andi Maryam', '196512311992032001', 'BARRU', '1965-12-31', 'iyangandi@yahoo.co.id', '085299185400', 'III/d/Penata Tingkat I', '2013-07-01', 'Penerjemah Ahli Madya', '2013-07-01', 55, 'Aktif'),
(153, 'Dra. Arum Gayatri', '196106051992032002', 'JAKARTA', '1961-06-05', 'arum_gayatri@yahoo.co.id', '08562893953', 'IV/b/Pembina Tingkat I', '2013-04-01', 'Penerjemah Ahli Madya', '2013-04-01', 28, 'Aktif'),
(154, 'Dra. Emma Lintje Margaretha Nababan', '196301211988032001', 'BANDUNG', '1963-01-21', 'sitohangnababan@yahoo.com', '08129611294', 'III/d/Penata Tingkat I', '2011-07-01', 'Penerjemah Ahli Muda', '2011-07-01', 56, 'Aktif'),
(155, 'Dra. Ria Mutiara', '195902041985032001', 'JAKARTA', '1959-02-04', 'riamutiara2002@yahoo.com', '087771207504', 'IV/d/Pembina Utama Madya', '2017-09-05', 'Penerjemah Ahli Utama', '2017-09-05', 31, 'Aktif'),
(156, 'Drs. Bisman Butar Butar. M.Ed.', '196305091991031004', 'DELI SERDANG', '1990-11-18', 'bisman_butar1963@yahoo.com', '08111196844', 'IV/b/Pembina Tingkat I', '2011-11-01', 'Penerjemah Ahli Madya', '2011-11-01', 20, 'Aktif'),
(157, 'Eko Priyo Purnomo, S.S., M.Med.Kom.', '197909302009011008', 'SEMARANG', '1979-09-30', 'eko_priyo_p@yahoo.com', '081393988894', 'III/c/Penata', '2019-02-13', 'Penerjemah Ahli Muda', '2019-02-13', 62, 'Aktif'),
(158, 'Dwi Laily Sukmawati, S.Pd., M.Hum.', '198210102006042003', 'SAMPANG', '1982-10-10', 'sya_lel@yahoo.co.id', '081332138188', 'IV/a/Pembina', '2019-02-01', 'Penerjemah Ahli Madya', '2019-02-01', 53, 'Aktif'),
(159, 'Elsa Surya, S.S., M.Si.', '19821162009122004', 'JAKARTA', '1982-02-16', 'chrisa_surya@yahoo.com', '081316086006', 'III/a/Penata Muda', '2012-01-31', 'Penerjemah Ahli Pertama', '2012-01-31', 59, 'Aktif'),
(160, 'Eneng Mina Nurhasanah, S.S.', '198801192011012009', 'PANDEGLANG', '1988-01-19', 'eminanurhasanah@gmail.com', '081220197493', 'III/c/Penata', '2020-02-21', 'Penerjemah Ahli Muda', '2020-02-21', 71, 'Aktif'),
(161, 'Erik Limantara, S.S.', '198609122009121001', 'BANYUMAS', '1986-09-12', 'erik001@kominfo.go.id', '081296698894', 'III/b/Penata Muda Tingkat I', '2016-10-01', 'Penerjemah Ahli Pertama', '2016-10-01', 29, 'Aktif'),
(162, 'Erliana Hastuti, S.S., M.Si.', '197606142011012007', 'SURABAYA', '1976-06-14', 'leeya_dl@yahoo.com', '0811739355', 'III/c/Penata', '2017-04-17', 'Penerjemah Ahli Muda', '2017-04-17', 79, 'Aktif'),
(163, 'Fasrudin Arief Budiman, S.S., M.Si.', '197011051997031007', 'TANGERANG', '1970-11-05', 'fabparlemen@gmail.com', '08158948506', 'IV/a/Pembina', '2013-02-08', 'Penerjemah Ahli Madya', '2013-02-08', 124, 'Aktif'),
(164, 'Febrina Natalia, S.S., M.Sc.', '198802042010012002', 'PALANGKA RAYA', '1988-02-04', 'bree.natalie@gmail.com', '082113988057', 'III/c/Penata', '2019-04-01', 'Penerjemah Ahli Muda', '2019-04-01', 103, 'Aktif'),
(165, 'Fera Mardaleny, S.S.', '197602042010012003', 'JAKARTA', '1932-01-12', 'feramardaleny1@gmail.com', '082148480769', 'III/b/Penata Muda Tingkat I', '2017-06-01', 'Penerjemah Ahli Pertama', '2017-06-01', 98, 'Aktif'),
(166, 'Fika Pratiwi Walton, S.S.', '198503222010012013', 'YOGYAKARTA', '1985-03-22', 'walton_23@yahoo.com', '081930802800', 'III/a/Penata Muda', '2013-08-01', 'Penerjemah Ahli Pertama', '2013-08-01', 106, 'Aktif'),
(167, 'Filmon Leonard Warouw, S.S., MComn.', '198107312008031001', 'SURABAYA', '1981-07-31', 'fl.warouw@gmail.com', '082124277411', 'IV/a/Pembina', '2020-03-01', 'Penerjemah Ahli Madya', '2020-03-01', 23, 'Aktif'),
(168, 'Fitri Sumirah, S.S.', '198406292008022001', 'JAKARTA', '1984-06-29', 'fitrisumirah@penerjemahpemerintah.id', '085695420435', 'III/c/Penata', '2019-04-01', 'Penerjemah Ahli Muda', '2019-04-01', 34, 'Aktif'),
(169, 'Fivtinia Octagusni, S.S.', '198310152011012003', 'BUKITTINGGI', '1983-10-15', 'ofivtinia@gmail.com', '081374651056', 'III/c/Penata', '2020-07-01', 'Penerjemah Ahli Muda', '2020-07-01', 123, 'Aktif'),
(170, 'Galang Aprilian, S.S.', '198704082010121001', 'GUNUNG KIDUL', '1987-04-08', 'aprilian.galang@gmail.com', '081227708666', 'III/c/Penata', '2020-08-24', 'Penerjemah Ahli Muda', '2020-08-24', 12, 'Aktif'),
(171, 'Gersom Leonardo Panjaitan, S.S.', '198608022014021002', 'BLORA', '1986-08-02', 'gersomleonardo@gmail.com', '081325460607', 'III/a/Penata Muda', '2017-01-01', 'Penerjemah Ahli Pertama', '2017-01-01', 104, 'Aktif'),
(172, 'Hafid, S.Sos.I.', '198501102015031002', 'SERANG', '1985-01-10', 'hafid.farhati@gmail.com', '081806820986', 'III/a/Penata Muda', '2018-04-23', 'Penerjemah Ahli Pertama', '2018-04-23', 89, 'Aktif'),
(173, 'Hanny Fariany Fauziah, S.S.', '198202162008012001', 'BANDUNG', '1990-02-26', 'hannyff1982@gmail.com', '085222213082', 'III/b/Penata Muda Tingkat I', '2020-11-05', 'Penerjemah Ahli Muda', '2020-11-05', 10, 'Aktif'),
(174, 'Hariyanti Agustina, S.S.', '198308052011012014', 'BANYUWANGI', '1983-08-05', 'ryantzagozt@gmail.com', '081336644006', 'III/b/Penata Muda Tingkat I', '2017-04-01', 'Penerjemah Ahli Muda', '2017-04-01', 82, 'Aktif'),
(175, 'Hastie Kaharti, S.H.', '197303212005012004', 'SIDOARJO', '2026-07-26', 'hestyemir2017@gmail.com', '081332732828', 'III/b/Penata Muda Tingkat I', '2013-10-01', 'Penerjemah Ahli Pertama', '2013-10-01', 7, 'Aktif'),
(176, 'Hero Patrianto, S.S.,M.A.', '197811212006041002', 'SURABAYA', '1978-11-21', 'heropatrianto@gmail.com', '08113222280', 'III/d/Penata Tingkat I', '2020-04-01', 'Penerjemah Ahli Madya', '2020-04-01', 53, 'Aktif'),
(177, 'I Gede Pariasa, S.S.', '198201202009021002', 'DENPASAR', '1982-01-20', 'pariasa270@gmail.com', '081338277269', 'III/d/Penata Tingkat I', '2016-03-01', 'Penerjemah Ahli Muda', '2016-03-01', 87, 'Aktif'),
(178, 'I Nyoman Sutrisna, S.S.', '197909092006041002', 'BADUNG', '1979-09-09', 'nyomansutrisna79@gmail.com', '08123989590', 'III/d/Penata Tingkat I', '2018-02-01', 'Penerjemah Ahli Muda', '2018-02-01', 43, 'Aktif'),
(179, 'I Nyoman Cahyasabudhi Santosa, S.Pd.', '197711272005011001', 'MATARAM', '1977-11-27', 'cahyasabudhi@gmail.com', '08175739329', 'III/d/Penata Tingkat I', '2017-02-01', 'Penerjemah Ahli Muda', '2017-02-01', 47, 'Aktif'),
(180, 'Ida Ayu Ria Utami Saraswati, S.S.', '198004052006042001', 'SEMARANG', '1980-04-05', 'ida.ayu.ria@gmail.com', '08176390770', 'III/d/Penata Tingkat I', '2017-11-13', 'Penerjemah Ahli Muda', '2017-11-13', 12, 'Aktif'),
(181, 'Ika Inayati, S.S., M.Li.', '197903142005012001', 'SERANG', '1979-03-14', 'ikainayati1979@gmail.com', '087834510410', 'IV/a/Pembina', '2020-03-01', 'Penerjemah Ahli Madya', '2020-03-01', 54, 'Aktif'),
(182, 'Ika Nurita Novianty, S.S.', '198011022005012001', 'JAKARTA', '1980-11-02', 'ikano.nurita@gmail.com', '087808600668', 'III/d/Penata Tingkat I', '2017-10-05', 'Penerjemah Ahli Muda', '2017-10-05', 12, 'Aktif'),
(183, 'Ilsa Dewita Putri Soraya, S.S., M.A.', '197910132006042001', 'JAMBI', '1990-01-15', 'ilsya.dps@gmail.com', '082175831516', 'III/b/Penata Muda Tingkat I', '2013-07-01', 'Penerjemah Ahli Pertama', '2013-07-01', 37, 'Aktif'),
(184, 'Irene Debby Carolina Rindorindo, S.S.', '197610012006042002', 'MANADO', '1976-10-01', 'irene0110rindorindo@gmail.com', '081340106986', 'III/c/Penata', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 42, 'Aktif'),
(185, 'Irma Yulianti, S.S.', '197707202008012001', 'JAKARTA', '1977-07-20', 'irmayuli777@yahoo.com', '081389322660', 'III/d/Penata Tingkat I', '2020-12-14', 'Penerjemah Ahli Madya', '2020-12-14', 11, 'Aktif'),
(186, 'Johanes, S.S.', '198006112009041005', 'JAKARTA', '1980-06-11', 'johaneslibu.doni@gmail.com', '085216894549', 'III/c/Penata', '2019-02-15', 'Penerjemah Ahli Muda', '2019-02-15', 73, 'Aktif'),
(187, 'Juli Andriana Siboro, S.S.', '199007292015032001', 'MEDAN', '1990-07-29', 'juli.siboro90@gmail.com', '085361109444', 'III/b/Penata Muda Tingkat I', '2016-04-01', 'Penerjemah Ahli Pertama', '2016-04-01', 65, 'Aktif'),
(188, 'Kahar Dwi Prihantono, S.S.', '197809232002121003', 'SEMARANG', '1978-09-23', 'akang_har@yahoo.com', '082137141608', 'III/d/Penata Tingkat I', '2016-11-01', 'Penerjemah Ahli Madya', '2016-11-01', 54, 'Aktif'),
(189, 'Karlina Irsalyana, S.S.', '198507062008012004', 'JAKARTA', '1985-07-06', 'sallycharlitos@gmail.com', '081381752075', 'III/c/Penata', '2017-04-01', 'Penerjemah Ahli Muda', '2017-04-01', 66, 'Aktif'),
(190, 'Kartika Suciati, S.S.', '198107092015022001', 'YOGYAKARTA', '1981-07-09', 'kartikasholihin@gmail.com', '087865230644', 'III/a/Penata Muda', '2016-12-22', 'Penerjemah Ahli Pertama', '2016-12-22', 115, 'Aktif'),
(191, 'Khoiru Ummatin, S.Pd.', '197904092006042002', 'SIDOARJO', '1979-04-09', 'atien09neita@gmail.com', '081332165855', 'III/c/Penata', '2017-10-01', 'Penerjemah Ahli Muda', '2017-10-01', 53, 'Aktif'),
(192, 'Lellyana, S.S.', '197902012009032001', 'SANGGAU', '1979-02-01', 'lellyana0102@gmail.com', '0811731496', 'III/d/Penata Tingkat I', '2018-11-23', 'Penerjemah Ahli Muda', '2018-11-23', 97, 'Aktif'),
(193, 'Lukman, S.Pd.', '197702272005011001', 'JAMBI', '1977-02-27', 'lukmantanjung13@gmail.com', '082183976655', 'III/c/Penata', '2013-06-03', 'Penerjemah Ahli Muda', '2013-06-03', 37, 'Aktif'),
(194, 'Margaretta Charolyna, S.E., M.M.', '198008152006042001', 'JAKARTA', '1980-08-15', 'margarettacharolyna@gmail.com', '08128502767', 'III/d/Penata Tingkat I', '2015-02-26', 'Penerjemah Ahli Muda', '2015-02-26', 63, 'Aktif'),
(195, 'Maria Ulfah, S.S.', '198201022010012015', 'PANGKALPINANG', '1982-01-02', 'mariaulfah2015ok@gmail.com', '08128135548', 'III/d/Penata Tingkat I', '2017-03-01', 'Penerjemah Ahli Muda', '2017-03-01', 109, 'Aktif'),
(196, 'Marike Ivone Onsu, S.S.', '197703062003122002', 'MANADO', '1977-03-06', 'marikeivone@gmail.com', '082347594197', 'IV/a/Pembina', '2017-02-01', 'Penerjemah Ahli Madya', '2017-02-01', 42, 'Aktif'),
(197, 'Martrisa Canda Chaniago, S.Pd., M.Li.', '198403312009122001', 'JAKARTA', '1984-03-31', 'martrisa@dpr.go.id', '081294089908', 'III/a/Penata Muda', '2017-02-01', 'Penerjemah Ahli Muda', '2017-02-01', 124, 'Aktif'),
(198, 'Maya Apriliani Aria Kusnani, S.S.', '198704022011012009', 'PURWOREJO', '1987-04-02', 'apriliamaia@gmail.com', '081315990419', 'III/c/Penata', '2019-07-01', 'Penerjemah Ahli Muda', '2019-07-01', 35, 'Aktif'),
(199, 'Mayang Prameswari Ayuningtyas, S.Hum.', '198709102010122001', 'JAKARTA', '1987-09-10', 'mayang.p.ayuningtyas@gmail.com', '089653212760', 'III/c/Penata', '2010-08-24', 'Penerjemah Ahli Muda', '2010-08-24', 12, 'Aktif'),
(200, 'Medi Setiabudi, S.S.', '197806192009031001', 'BENGKULU', '1978-06-19', 'setiabudi.medi@gmail.com', '081271510512', 'III/c/Penata', '2018-11-23', 'Penerjemah Ahli Muda', '2018-11-23', 97, 'Aktif'),
(201, 'Mia Medyana Bonaedy, S.Hum., M.A', '198405202008012009', 'JAKARTA', '1984-05-20', 'mia.medyana@gmail.com', '08159675520', 'IV/a/Pembina', '2017-05-02', 'Penerjemah Ahli Madya', '2017-05-02', 125, 'Aktif'),
(202, 'Mohamad Azhar Rasjid, S.S.', '197703122005011004', 'BANDUNG', '1977-03-12', 'azhrasjid@gmail.com', '081320574845', 'III/d/Penata Tingkat I', '2013-09-01', 'Penerjemah Ahli Muda', '2013-09-01', 40, 'Aktif'),
(203, 'Mohammad Rosadi, S.S.', '197512022001121001', 'UJUNG PANDANG', '1975-12-02', 'mrosadi_ocha@yahoo.com', '081342055921', 'III/c/Penata', '2011-07-01', 'Penerjemah Ahli Muda', '2011-07-01', 58, 'Aktif'),
(204, 'Muhammad Ersan Pamungkas, S.S., M.A.', '198312292008011005', 'BANDUNG', '1983-12-29', 'ersanpamungkas83@gmail.com', '081394801894', 'III/c/Penata', '2017-05-02', 'Penerjemah Ahli Madya', '2017-05-02', 125, 'Aktif'),
(205, 'Muhammad Irsan, M.Hum.', '197402152003121002', 'MEDAN', '1974-02-15', 'irsanbbp@yahoo.co.id', '08153824159', 'III/c/Penata', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 39, 'Aktif'),
(206, 'Mulawarman, S.S.', '198011242006041001', 'MUSI RAWAS', '1980-11-24', 'mulawarman24@gmail.com', '085664773399', 'III/c/Penata', '2016-11-01', 'Penerjemah Ahli Muda', '2016-11-01', 39, 'Aktif'),
(207, 'Ni Wayan Pering Muliawati, S.S.', '198410182009022004', 'GIANYAR', '1984-10-18', 'pering.muliawati@gmail.com', '081339103884', 'III/d/Penata Tingkat I', '2016-10-25', 'Penerjemah Ahli Muda', '2016-10-25', 88, 'Aktif'),
(208, 'Noezafri Amar, S.S., M.Pd.', '197311042006041001', 'PADANG PANJANG', '1973-11-04', 'noezafriamar73@gmail.com', '08127610842', 'III/c/Penata', '2017-01-01', 'Penerjemah Ahli Muda', '2017-01-01', 44, 'Aktif'),
(209, 'Novri Helmawan, S.Pd.', '197711132009121002', 'JAKARTA', '1977-11-13', 'nhelmawan@gmail.com', '08129240516', 'III/c/Penata', '2017-02-01', 'Penerjemah Ahli Muda', '2017-02-01', 124, 'Aktif'),
(210, 'Yuni Yulianita, S.S.', '198306292008121001', 'PALEMBANG', '1983-06-29', 'yyulianita@gmail.com', '085220055969', 'III/c/Penata', '2017-04-01', 'Penerjemah Ahli Muda', '2021-02-07', 127, 'Aktif'),
(211, 'Priskilla Siregar., S.Sos', '198311222008122001', 'JAKARTA', '1983-11-22', 'priskilla@komisiyudisial.go.id', '081280091413', 'III/c/Penata', '2017-03-31', 'Penerjemah Ahli Muda', '2021-02-17', 127, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratKeluar` int(11) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `divisi` int(11) DEFAULT NULL,
  `no_ktj` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `no_arsip` varchar(50) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `hal` text DEFAULT NULL,
  `disposisi_seskab` text DEFAULT NULL,
  `disposisi_waseskab` text DEFAULT NULL,
  `disposisi_deputi` text DEFAULT NULL,
  `disposisi_kapus` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratKeluar`, `no_surat`, `tgl_surat`, `tgl_kirim`, `divisi`, `no_ktj`, `user`, `no_arsip`, `tujuan`, `hal`, `disposisi_seskab`, `disposisi_waseskab`, `disposisi_deputi`, `disposisi_kapus`, `link`) VALUES
(1, 'B-111/PUSBINTER/04/2021', '2021-04-01', '2021-04-08', 7, 40, 2, NULL, 'Instansi A', ' Pengiriman Sertifikat Uji Kompetensi ', '    ', '    ', '    ', '    ', 'https://ini-link-netbox.com'),
(2, 'B-111/PUSBINTER/04/2021', '2021-04-15', '2021-04-21', 8, 42, 1, NULL, 'Bpk. Ahmad', '    testing ', '          ', '          ', '          ', '          ', 'http://youtube.com'),
(5, 'B-121/PUSBINTER/06/2021', '2021-06-08', '2021-06-17', 7, 37, 2, NULL, 'Bpk. Aceng', ' testing', NULL, NULL, NULL, NULL, 'https://ini-link-netbox.com'),
(7, 'B-191/PUSBINTER/06/2021', '2021-06-18', '2021-06-23', 8, 43, 1, '01672/ARSIP/06/2021', 'Instansi A', ' testing', NULL, NULL, NULL, NULL, 'https://ini-link-netbox.com'),
(8, 'B-14/PUSBINTER/06/2021', '2021-06-21', '2021-06-24', 8, 44, 1, '03817/ARSIP/06/2021', 'Kepala Pusat', ' Kesediaan Hadir untuk Undangan Rapat', NULL, NULL, NULL, NULL, 'https://drive.google.com/drive/u/0/folders/1Hi9vsHhEl6rIcQ64XEx8QxsG0FTcGLig'),
(10, 'B-18/PUSBINTER/06/2021', '2021-06-24', '2021-06-26', 8, 46, 1, NULL, 'Kepala Bidang ABC', ' testinggggggg', NULL, NULL, NULL, NULL, 'http://netbox.com');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratMasuk` int(11) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `divisi` int(11) DEFAULT NULL,
  `no_ktj` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `hal` text DEFAULT NULL,
  `disposisi_waseskab` text DEFAULT NULL,
  `disposisi_deputi` text DEFAULT NULL,
  `disposisi_kapus` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` enum('Diajukan','Ditolak','Disetujui') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratMasuk`, `no_surat`, `tgl_surat`, `tgl_diterima`, `kategori`, `divisi`, `no_ktj`, `user`, `pengirim`, `hal`, `disposisi_waseskab`, `disposisi_deputi`, `disposisi_kapus`, `link`, `status`) VALUES
(1, 'B-333/PUSBINTER/03/2021', '2021-03-17', '2021-03-19', 7, 8, 43, 1, 'Kementerian XYZ', '', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(2, 'B-123/PUSBINTER/03/2021', '2021-03-22', '2021-03-25', 11, 8, 46, 1, 'Bpk. Jono', '', '', '', '', 'https://www.ini-link-netbox.com', 'Diajukan'),
(3, 'B-456/PUSBINTER/04/2021', '2021-04-20', '2021-04-23', 3, 7, 39, 2, 'Bpk. Saiful', 'testing', '', '', '', 'http://www.google.com', 'Diajukan'),
(4, 'B-121/PUSBINTER/04/2021', '2021-04-14', '2021-04-19', 10, 8, 42, 1, 'Bpk. Ahmad', '', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(5, 'B-98/PUSBINTER/04/2021', '2021-04-07', '2021-04-09', 3, 7, 36, 2, 'Bpk. Roji', '', '', '', '', 'http://youtube.com', 'Diajukan'),
(6, 'B-123/PUSBINTER/04/2021', '2021-04-05', '2021-04-06', 14, 8, 44, 1, 'Bpk. Fatur', 'Permohonan Sertifikat Hasil Uji Kompetensi', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(7, 'B-333/PUSBINTER/04/2021', '2021-04-09', '2021-04-12', 7, 8, 45, 1, 'Kementerian XYZ', 'Undangan Rapat', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(8, 'B-100/PUSBINTER/04/2021', '2021-04-19', '2021-04-20', 14, 7, 37, 2, 'Biro SDM', '', '', '', '', 'http://www.codeigniter.com', 'Diajukan'),
(10, 'B-13/PUSBINTER/04/2021', '2021-04-06', '2021-04-08', 15, 7, 38, 2, 'Bpk. Tono', 'Permohonan Pembuatan Sertifikat Diklat', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(11, 'B-14/PUSBINTER/04/2021', '2021-04-21', '2021-04-23', 12, 7, 40, 2, 'Biro Naskah', 'Permohonan Penetapan Angka Kredit ', '', '', '', 'http://www.link-file.com', 'Diajukan'),
(12, 'B-333/PUSBINTER/06/2021', '2021-06-11', '2021-06-17', 12, 7, 41, 2, 'Bpk. Sadil', 'testing', '', '', '', 'https://ini-link-netbox.com', 'Diajukan'),
(13, 'B-14/PUSBINTER/06/2021', '2021-06-21', '2021-06-24', 7, 8, 42, 1, 'Kepala Pusat', 'Undangan Rapat', '', '', '', 'https://drive.google.com/drive/u/0/folders/1Hi9vsHhEl6rIcQ64XEx8QxsG0FTcGLig', 'Disetujui'),
(14, 'B-15/PUSBINTER/06/2021', '2021-06-24', '2021-06-26', 12, 8, 45, 1, 'Kepala Pusat', 'ewagagdg', '', '', '', 'http://netbox.com', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `surat_usulan`
--

CREATE TABLE `surat_usulan` (
  `id_suratUsulan` int(11) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `iddivisi` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `hal` text DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` enum('Diajukan','Ditolak','Disetujui') DEFAULT 'Diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_usulan`
--

INSERT INTO `surat_usulan` (`id_suratUsulan`, `no_surat`, `tgl_surat`, `tgl_diterima`, `id_kategori`, `iddivisi`, `iduser`, `hal`, `pengirim`, `link`, `status`) VALUES
(1, 'B-111/PUSBINTER/03/2021', '2021-04-05', '2021-04-07', 4, 7, 2, 'Pengangkatan Penerjemah bapak Dummy', 'User Dummy', 'https://ini-link-netbox.com', 'Diajukan'),
(2, 'B-333/PUSBINTER/03/2021', '2021-04-12', '2021-04-13', 5, 8, 1, 'Pemberhentian Penerjemah', 'Kementerian XYZ', 'http://www.link-file.com', 'Diajukan'),
(3, 'B-121/PUSBINTER/03/2021', '2021-04-09', '2021-04-12', 4, 8, 1, 'Pengangkatan Penerjemah', 'Bpk. Deni', 'http://www.link-file.com', 'Disetujui'),
(4, 'B-81/PUSBINTER/06/2021', '2021-06-14', '2021-06-17', 6, 7, 2, 'safdfcscsdcsdcsdc', 'Pak Anang', 'https://ini-link-netbox.com', 'Diajukan'),
(5, 'B-14/PUSBINTER/06/2021', '2021-06-25', '2021-06-26', 4, 8, 1, 'wefewsfsdf', 'Bpk. Jono', 'http://netbox.com', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_divisi_tugas` int(11) DEFAULT NULL,
  `kode_tugas` varchar(50) DEFAULT NULL,
  `list_tugas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_divisi_tugas`, `kode_tugas`, `list_tugas`) VALUES
(1, 1, 'KTJ/Kapus/1', 'Persentase rekomendasi terkait penilaian, penetapan angka kredit, pengangkatan, kenaikan jabatan, kenaikan pangkat/golongan, pemberhentian sementara dan pengangkatan kembali, serta pemberhentian dari jabatan yang di selesaikan secara tepat waktu '),
(2, 1, 'KTJ/Kapus/2', 'Persentase rekomendasi penyelesaian permasalahan pelayanan Jabatan Fungsional Penerjemah yang ditindaklanjuti'),
(3, 1, 'KTJ/Kapus/3', 'Persentase kelulusan pejabat fungsional penerjemah pada pendidikan dan pelatihan dengan predikat minimal baik'),
(4, 1, 'KTJ/Kapus/4', 'Persentase dokumen pelaksanaan reformasi birokrasi Pusat Pembinaan Penerjemah yang disampaikan secara tepat waktu'),
(5, 1, 'KTJ/Kapus/5', 'Persentase rekomendasi hasil evaluasi akuntabilitas kinerja oleh inspektorat yang ditindaklanjuti oleh Pusat Pembinaan Penerjemah'),
(6, 1, 'KTJ/Kapus/6', 'Persentase dokumen perencanaan program dan anggaran Pusat Pembinaan Penerjemah yang disampaikan secara tepat waktu'),
(7, 1, 'KTJ/Kapus/7', 'Indeks revisi program dan anggaran Pusat Pembinaan Penerjemah'),
(8, 1, 'KTJ/Kapus/8', 'Persentase kepuasan layanan tata usaha Pusat Pembinaan Penerjemah'),
(9, 1, 'KTJ/Kapus/9', 'Persentase kepuasan Pejabat Fungsional Penerjemah terhadap sistem informasi Jabatan Fungsional Penerjemah'),
(10, 2, 'KTJ/KabidProPem/1', 'Persentase kelulusan pejabat fungsional penerjemah pada pendidikan dan pelatihan dengan predikat minimal baik'),
(11, 2, 'KTJ/KabidProPem/2', 'Persentase penyelenggaraan pendidikan dan pelatihan penerjemah yang dilaksanakan tepat waktu'),
(12, 2, 'KTJ/KabidProPem/3', 'Persentase modul bahan ajar diklat yang dapat diselesaikan tepat waktu'),
(13, 2, 'KTJ/KabidProPem/4', 'Persentase laporan hasi; penyelenggaraan pendidikan dan pelatihan JFP yang ditujukan kepada Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi dan ditembuskan kepada Kepala Lembaga Administrasi Negara, yang dapat diselesaikan tepat waktu'),
(14, 2, 'KTJ/KabidProPem/5', 'Persentase rancangan peraturan/standar/pedoman/ juklak/juknis terkait pembinaan JFP yang dapat diselesaikan tepat waktu'),
(15, 2, 'KTJ/KabidProPem/6', 'Persentase korespondensi permintaan kerjasama dengan K/L/D dan negara sahabat/lembaga internasional yang ditindaklanjuti'),
(16, 3, 'KTJ/KabidEvaKomp/1', 'Persentase rekomendasi terkait penilaian, akreditasi, penetapan angka kredit, pengangkatan, kenaikan jabatan, kenaikan pangkat/golongan, pemberhentian sementara dan pengangkatan kembali, serta pemberhentian dari jabatan yang di selesaikan secara tepat waktu'),
(17, 3, 'KTJ/KabidEvaKomp/2', 'Persentase rekomendasi penyelesaian permasalahan pelayanan Jabatan Fungsional Penerjemah yang ditindaklanjuti'),
(18, 3, 'KTJ/KabidEvaKomp/3', 'Persentase penyelenggaraan bimbingan teknis penerjemah yang dilaksanakan tepat waktu'),
(19, 3, 'KTJ/KabidEvaKomp/4', 'Persentase pelaksanaan uji kompetensi yang diselenggarakan tepat waktu'),
(20, 3, 'KTJ/KabidEvaKomp/5', 'Persentase rancangan jurnal penerjemah yang diselesaikan secara tepat waktu'),
(21, 3, 'KTJ/KabidEvaKomp/6', 'Persentase laporan kegiatan pembinaan dan pengembangan JFP yang ditujukan kepada Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi dan ditembuskan kepada Kepala Badan Kepegawaian Negara yang diselesaikan tepat waktu'),
(22, 4, 'KTJ/KabagTU/1', 'Persentase dokumen pelaksanaan Reformasi Birokrasi Pusat Pembinaan Penerjemah yang disampaikan secara tepat waktu'),
(23, 4, 'KTJ/KabagTU/2', 'Persentase rekomendasi hasil evaluasi akuntabilitas kinerja oleh Inspektorat yang ditindaklanjuti oleh Pusat Pembinaan Penerjemah'),
(24, 4, 'KTJ/KabagTU/3', 'Persentase dokumen perencanaan program dan anggaran Pusat Pembinaan Penerjemah yang disampaikan secara tepat waktu'),
(25, 4, 'KTJ/KabagTU/4', 'Indeks revisi program dan anggaran Pusat Pembinaan Penerjemah'),
(26, 4, 'KTJ/KabagTU/5', 'Persentase kepuasan layanan tata usaha Pusat Pembinaan Penerjemah'),
(27, 4, 'KTJ/KabagTU/6', 'Persentase kepuasan Pejabat Fungsional Penerjemah terhadap sistem informasi Jabatan Fungsional Penerjemah'),
(28, 4, 'KTJ/KabagTU/7', 'Persentase Penyelenggaraan diseminasi informasi JFP yang dilaksanakan tepat waktu'),
(29, 4, 'KTJ/KabagTU/8', 'Jumlah layanan dukungan penatausahaan, teknis, dan administrasi Pusat Pembinaan Penerjemah'),
(30, 5, 'KTJ/KasubbidProKer/1', 'Persentase rancangan peraturan/standar/pedoman/ juklak/juknis terkait pembinaan JFP yang dapat diselesaikan tepat waktu'),
(31, 5, 'KTJ/KasubbidProKer/2', 'Persentase korespondensi permintaan kerjasama dengan K/L/D dan negara sahabat/lembaga internasional yang ditindaklanjuti'),
(32, 5, 'KTJ/KasubbidProKer/3', 'Persentase sosialisasi peraturan/standar/pedoman/ juklak/juknis terkait pembinaan JFP yang diselenggarakan secara tepat waktu'),
(33, 6, 'KTJ/KasubbidNilaiKerja/1', 'Persentase rekomendasi terkait penilaian, akreditasi, penetapan angka kredit, pengangkatan, kenaikan jabatan, kenaikan pangkat/golongan, pemberhentian sementara dan pengangkatan kembali, serta pemberhentian dari jabatan yang di selesaikan secara tepat waktu'),
(34, 6, 'KTJ/KasubbidNilaiKerja/2', 'Persentase rancangan rekomendasi penyelesaian permasalahan pelayanan Jabatan Fungsional Penerjemah yang ditindaklanjuti'),
(35, 6, 'KTJ/KasubbidNilaiKerja/3', 'Persentase pelaksanaan uji kompetensi yang diselenggarakan tepat waktu'),
(36, 7, 'KTJ/KasubbagUmum/1', 'Persentase rancangan dokumen pelaksanaan Reformasi Birokrasi yang di selesaikan secara tepat waktu'),
(37, 7, 'KTJ/KasubbagUmum/2', 'Persentase bahan/data dukung evaluasi akuntabilitas kinerja yang akurat'),
(38, 7, 'KTJ/KasubbagUmum/3', 'Persentase rancangan dokumen perencanaan program dan anggaran Pusat Pembinaan Penerjemah yang diselesaikan tepat waktu'),
(39, 7, 'KTJ/KasubbagUmum/4', 'Persentase usulan revisi program dan anggaran Pusat Pembinaan Penerjemah yang akurat'),
(40, 7, 'KTJ/KasubbagUmum/5', 'Persentase laporan hasil survei kepuasan layanan tata usaha Pusat Pembinaan Penerjemah yang diselesaikan tepat waktu'),
(41, 7, 'KTJ/KasubbagUmum/6', 'Jumlah layanan dukungan penatausahaan, teknis, dan administrasi Pusat Pembinaan Penerjemah'),
(42, 8, 'KTJ/KasubbagDatIn/1', 'Persentase laporan hasil survei kepuasan pengguna terhadap sistem informasi Jabatan Fungsional Penerjemah yang diselesaikan tepat waktu'),
(43, 8, 'KTJ/KasubbagDatIn/2', 'Persentase Penyelenggaraan diseminasi informasi JFP yang dilaksanakan tepat waktu'),
(44, 8, 'KTJ/KasubbagDatIn/3', 'Persentase data Usulan terkait JFP pada sistem informasi E-JFP yang dapat diverifikasi secara akurat'),
(45, 8, 'KTJ/KasubbagDatIn/4', 'Jumlah layanan dukungan teknis dan administrasi Sistem Informasi Jabatan Fungsional Penerjemah'),
(46, 8, 'KTJ/KasubbagDatIn/5', 'Jumlah layanan diseminasi informasi kegiatan pembinaan Jabatan Fungsional Penerjemah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('1','2','3','') DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `id_divisi`, `foto`) VALUES
(1, 'admin', 'admin@gmail.com', '123456789', '1', 8, '1624802267_7ccd6a2dded457134656.jpg'),
(2, 'user', 'user@gmail.com', '123456789', '2', 7, '1624801593_73d62fb611e954716a11.jpg'),
(21, 'test', 'muhammad_rayhan@apps.ipb.ac.id', '123456789', '2', 4, '1624803490_6584b76398f3d33163a8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penerjemah`
--
ALTER TABLE `penerjemah`
  ADD PRIMARY KEY (`id_penerjemah`),
  ADD KEY `id_instansi_penerjemah` (`id_instansi_penerjemah`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratKeluar`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `user` (`user`),
  ADD KEY `no_ktj` (`no_ktj`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratMasuk`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `no_ktj` (`no_ktj`),
  ADD KEY `user` (`user`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `surat_usulan`
--
ALTER TABLE `surat_usulan`
  ADD PRIMARY KEY (`id_suratUsulan`),
  ADD KEY `id_kategori` (`id_kategori`,`iddivisi`,`iduser`),
  ADD KEY `iddivisi` (`iddivisi`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_divisi` (`id_divisi_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penerjemah`
--
ALTER TABLE `penerjemah`
  MODIFY `id_penerjemah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratKeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `surat_usulan`
--
ALTER TABLE `surat_usulan`
  MODIFY `id_suratUsulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penerjemah`
--
ALTER TABLE `penerjemah`
  ADD CONSTRAINT `fk_id_instansi` FOREIGN KEY (`id_instansi_penerjemah`) REFERENCES `instansi` (`id_instansi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_2` FOREIGN KEY (`no_ktj`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_3` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_2` FOREIGN KEY (`no_ktj`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_3` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_4` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_usulan`
--
ALTER TABLE `surat_usulan`
  ADD CONSTRAINT `surat_usulan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_usulan_ibfk_2` FOREIGN KEY (`iddivisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_usulan_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_divisi_tugas`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
