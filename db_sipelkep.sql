-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 11:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipelkep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_pengguna`, `kata_sandi`, `status`) VALUES
(1, 'a', 'q', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_penduduk`
--

CREATE TABLE `tb_data_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `t_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `gol_dar` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kel` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_p` varchar(50) NOT NULL,
  `kerja` varchar(50) NOT NULL,
  `warga` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_penduduk`
--

INSERT INTO `tb_data_penduduk` (`id`, `nik`, `nama`, `t_lahir`, `tgl_lahir`, `jk`, `gol_dar`, `alamat`, `rt`, `rw`, `kel`, `kec`, `agama`, `status_p`, `kerja`, `warga`, `telp`, `ket`) VALUES
(1, '5104387654128764', 'Miko', 'Denpasar', '1997-05-02', 'L', 'O', 'jl. perintis bandaira no 12 x ry 01 rw02 kecoe oewjpweoj ei poewjfpewj', '07', '08', 'Pasar Lama', 'Banjarmasin Tengah', 'ISLAM', 'Lajang', 'Pengusaha', 'WNI', '081339674916', ''),
(2, '5104387654128000', 'Rifki', 'Banjarmasin', '2019-09-01', 'L', 'O', 'bjm', '07', '08', 'Pasar Lama', 'Banjarmasin Tengah', 'ISLAM', 'Lajang', 'Pengusaha', 'WNI', '081339674916', ''),
(3, '5104387654128002', 'Putri', 'Lombok', '2002-02-02', 'P', 'B', 'st', '07', '08', 'Pasar Lama', 'Banjarmasin Tengah', 'ISLAM', 'Lajang', 'Pengusaha', 'WNI', '081339674916', ''),
(4, '5104387654128763', 'coba', 'Banjarmasin', '2019-09-25', 'L', 'B', 'asd', '1', '2', 'as', 'as', 'ISLAM', 'as', 'as', 'as', '081339674916', 'jkhuiash iaugha sdiuahdaoihs aoiaoiaoisoi aoihsa osihao');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_surat`
--

CREATE TABLE `tb_data_surat` (
  `id` int(11) NOT NULL,
  `kd_surat` varchar(50) NOT NULL,
  `surat` varchar(50) NOT NULL,
  `syarat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_surat`
--

INSERT INTO `tb_data_surat` (`id`, `kd_surat`, `surat`, `syarat`, `ket`) VALUES
(1, 'KDS-00001', 'Surat Pindah', '1. Surat Pengantar RT\r\n2. FC KTP\r\n3. FC KK\r\n4. Surat Kuasa Bermaterai (Jika DiWakilkan)', ''),
(2, 'KDS-00002', 'Surat Kelahiran', '1. Surat Pengantar RT\r\n2. FC KTP Bapak dan Ibu Kandung', ''),
(3, 'KDS-00003', 'Surat Keterangan Domisili', '1. Surat Pengantar RT\r\n2. FC KTP Pemohon', ''),
(4, 'KDS-00004', 'Surat Pengantar Kartu Keluarga', '1. Surat Keterangan Ahli Waris\r\n2. Pengantar Rt\r\n3. Surat Nikah Yang Meninggal\r\n4. Kartu Keluarga Ahli Waris\r\n5. KTP 2 Orang Saksi\r\n6. KTP Yang Meninggal', ''),
(5, 'KDS-00005', 'Surat Pengantar KTP', '1. Surat Pengantar RT\r\n2. KTP Bapak Kandung\r\n3. KTP Ibu Kandung', ''),
(6, 'KDS-00006', 'Surat Kehilangan', '1. Surat Pengantar RT\r\n2. KTP', ''),
(7, 'KDS-00007', 'Surat Keterangan Belum Menikah', '1. Surat Pengantar RT', ''),
(8, 'KDS-00008', 'Surat Pengantar Nikah', '1. Surat Pengantar RT\r\n2. KTP', ''),
(9, 'KDS-00009', 'Surat Keterangan Tidak Mampu', '1. Surat Pengantar RT\r\n2. KTP', ''),
(10, 'KDS-00010', 'Surat Ahli Waris', '1. Surat Keterangan Ahli Waris\r\n2. Surat Pengantar RT\r\n3. Surat Nikah Yg Meninggal\r\n4. KK Ahli Waris\r\n5. KTP 2 Orang Saksi\r\n6. PBB Tahun Berjalan\r\n7. KTP Yg Meninggal', ''),
(11, 'KDS-00011', 'Surat IMB', '1. Surat Pengantar RT\r\n2. KTP\r\n3. Sertifikat Tanah\r\n4. Surat Pernyataan Tidak Keberatan\r\n5. KTP  Tetangga Yg Berbatasan Langsung\r\n6. Lunas PBB Tahun Berjalan', ''),
(12, 'KDS-00012', 'Surat Izin Tempat Usaha', '1. Surat Pengantar RT\r\n2. KTP\r\n3. Sertifikat Tanah\r\n4. IMB\r\n5. Surat Permohonan\r\n6. Tanda Lunas PBB Tahun Berjalan\r\n7. Surat Pernyataan Tidak Keberatan\r\n8. Akta Notaris\r\n9. KTP Tetangga Yg Berbatasan Langsung\r\n10. NPWP', ''),
(13, 'KDS-00013', 'Surat Keterangan Usaha', '1. Surat Pengantar RT\r\n2. KTP Pemohon\r\n3. Keterangan Domisili', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi_pembuatan_surat_admin`
--

CREATE TABLE `tb_informasi_pembuatan_surat_admin` (
  `id` int(11) NOT NULL,
  `kd` varchar(20) NOT NULL,
  `kd_surat` varchar(20) NOT NULL,
  `syarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi_pembuatan_surat_user`
--

CREATE TABLE `tb_informasi_pembuatan_surat_user` (
  `id` int(11) NOT NULL,
  `kd` varchar(20) NOT NULL,
  `kd_surat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi_penyelesaian_surat_admin`
--

CREATE TABLE `tb_informasi_penyelesaian_surat_admin` (
  `id` int(11) NOT NULL,
  `kd` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kd_surat` varchar(20) NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi_penyelesaian_surat_user`
--

CREATE TABLE `tb_informasi_penyelesaian_surat_user` (
  `id` int(11) NOT NULL,
  `kd` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keberadaan_lurah_admin`
--

CREATE TABLE `tb_keberadaan_lurah_admin` (
  `id` int(11) NOT NULL,
  `kd_lurah` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keberadaan_lurah_admin`
--

INSERT INTO `tb_keberadaan_lurah_admin` (`id`, `kd_lurah`, `tgl`, `status`, `ket`) VALUES
(1, 'KD-L-0001', '2019-08-25', 'TIDAK ADA', 'Sedang Dinas Keluar Kota selama 3 Hari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keberadaan_lurah_user`
--

CREATE TABLE `tb_keberadaan_lurah_user` (
  `id` int(11) NOT NULL,
  `kd` varchar(20) NOT NULL,
  `kd_lurah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_pelayanan_surat`
--

CREATE TABLE `tb_register_pelayanan_surat` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(18) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kd_surat` varchar(20) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_register_pelayanan_surat`
--

INSERT INTO `tb_register_pelayanan_surat` (`id`, `no_registrasi`, `nik`, `nama`, `kd_surat`, `tgl_registrasi`, `ket`) VALUES
(1, 'KDR-00001', '5104387654128764', 'Miko', 'KDS-00001', '2019-09-08', ''),
(6, 'KDR-00002', '5104387654128002', 'Putri', 'KDS-00002', '2019-09-10', ''),
(7, 'KDR-00003', '5104387654128000', 'Rifki', 'KDS-00003', '2019-09-02', ''),
(8, 'KDR-00004', '5104387654128764', 'Miko', 'KDS-00004', '2019-09-10', ''),
(10, 'KDR-00005', '5104387654128763', 'coba', 'KDS-00005', '2019-09-04', 'wdxed');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_ahli_waris`
--

CREATE TABLE `tb_surat_ahli_waris` (
  `id` int(11) NOT NULL,
  `no_surat_ahli_waris` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_ahli_waris` text NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_nikah_meninggal` text NOT NULL,
  `fc_kk_ahli_waris` text NOT NULL,
  `fc_ktp_saksi` text NOT NULL,
  `fc_pbb` text NOT NULL,
  `fc_ktp_meninggal` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_izin_mendirikan_bangunan`
--

CREATE TABLE `tb_surat_izin_mendirikan_bangunan` (
  `id` int(11) NOT NULL,
  `no_surat_imb` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `fc_sertifikat_tanah` text NOT NULL,
  `fc_surat_tidak_keberatan` text NOT NULL,
  `fc_ktp_tetangga` text NOT NULL,
  `fc_lunas_pbb` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_izin_tempat_usaha`
--

CREATE TABLE `tb_surat_izin_tempat_usaha` (
  `id` int(11) NOT NULL,
  `no_surat_izin_usaha` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `fc_sertifikat_tanah` text NOT NULL,
  `fc_imb` text NOT NULL,
  `fc_surat_permohonan` text NOT NULL,
  `fc_tanda_lunas_pbb` text NOT NULL,
  `fc_surat_tidak_keberatan` text NOT NULL,
  `fc_akta_notaris` text NOT NULL,
  `fc_ktp_tetangga` text NOT NULL,
  `fc_npwp` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_kehilangan`
--

CREATE TABLE `tb_surat_kehilangan` (
  `id` int(11) NOT NULL,
  `no_surat_kehilangan` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_ktp` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_kelahiran`
--

CREATE TABLE `tb_surat_kelahiran` (
  `id` int(11) NOT NULL,
  `no_surat_kelahiran` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp_bapak` text NOT NULL,
  `fc_ktp_ibu` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keterangan_belum_menikah`
--

CREATE TABLE `tb_surat_keterangan_belum_menikah` (
  `id` int(11) NOT NULL,
  `no_surat_belum_menikah` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keterangan_domisili`
--

CREATE TABLE `tb_surat_keterangan_domisili` (
  `id` int(11) NOT NULL,
  `no_surat_keterangan_domisili` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keterangan_tidak_mampu`
--

CREATE TABLE `tb_surat_keterangan_tidak_mampu` (
  `id` int(11) NOT NULL,
  `no_surat_tidak_mampu` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keterangan_usaha`
--

CREATE TABLE `tb_surat_keterangan_usaha` (
  `id` int(11) NOT NULL,
  `no_surat_ket_usaha` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `fc_surat_ket_domisili` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pengantar_kartu_keluarga`
--

CREATE TABLE `tb_surat_pengantar_kartu_keluarga` (
  `id` int(11) NOT NULL,
  `no_surat_pengantar_kk` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_surat_ket_ahli_waris` text NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_surat_nikah_meninggal` text NOT NULL,
  `fc_kk_ahli_waris` text NOT NULL,
  `fc_ktp_saksi` text NOT NULL,
  `fc_ktp_meninggal` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pengantar_ktp`
--

CREATE TABLE `tb_surat_pengantar_ktp` (
  `id` int(11) NOT NULL,
  `no_surat_pengantar_ktp` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp_bapak` text NOT NULL,
  `fc_ktp_ibu` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pengantar_nikah`
--

CREATE TABLE `tb_surat_pengantar_nikah` (
  `id` int(11) NOT NULL,
  `no_surat_nikah` varchar(20) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pindah`
--

CREATE TABLE `tb_surat_pindah` (
  `id` int(11) NOT NULL,
  `no_surat_pindah` varchar(10) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `fc_pengantar_rt` text NOT NULL,
  `fc_ktp` text NOT NULL,
  `fc_kk` text NOT NULL,
  `fc_surat_kuasa` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_pindah`
--

INSERT INTO `tb_surat_pindah` (`id`, `no_surat_pindah`, `no_registrasi`, `nik`, `nama`, `tgl_keluar`, `fc_pengantar_rt`, `fc_ktp`, `fc_kk`, `fc_surat_kuasa`, `ket`) VALUES
(1, 'NS-P-00001', 'KDR-00005', '5104387654128763', 'coba', '2019-09-12', 'NS-P-00001-pengantar_rt.jpg', 'NS-P-00001-ktp.jpg', 'NS-P-00001-kk.jpg', 'NS-P-00001-surat_kuasa.jpg', 'dw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`,`nama_pengguna`);

--
-- Indexes for table `tb_data_penduduk`
--
ALTER TABLE `tb_data_penduduk`
  ADD PRIMARY KEY (`id`,`nik`);

--
-- Indexes for table `tb_data_surat`
--
ALTER TABLE `tb_data_surat`
  ADD PRIMARY KEY (`id`,`kd_surat`);

--
-- Indexes for table `tb_informasi_pembuatan_surat_admin`
--
ALTER TABLE `tb_informasi_pembuatan_surat_admin`
  ADD PRIMARY KEY (`id`,`kd`);

--
-- Indexes for table `tb_informasi_pembuatan_surat_user`
--
ALTER TABLE `tb_informasi_pembuatan_surat_user`
  ADD PRIMARY KEY (`id`,`kd`);

--
-- Indexes for table `tb_informasi_penyelesaian_surat_admin`
--
ALTER TABLE `tb_informasi_penyelesaian_surat_admin`
  ADD PRIMARY KEY (`id`,`kd`);

--
-- Indexes for table `tb_informasi_penyelesaian_surat_user`
--
ALTER TABLE `tb_informasi_penyelesaian_surat_user`
  ADD PRIMARY KEY (`id`,`kd`);

--
-- Indexes for table `tb_keberadaan_lurah_admin`
--
ALTER TABLE `tb_keberadaan_lurah_admin`
  ADD PRIMARY KEY (`id`,`kd_lurah`);

--
-- Indexes for table `tb_keberadaan_lurah_user`
--
ALTER TABLE `tb_keberadaan_lurah_user`
  ADD PRIMARY KEY (`id`,`kd`);

--
-- Indexes for table `tb_register_pelayanan_surat`
--
ALTER TABLE `tb_register_pelayanan_surat`
  ADD PRIMARY KEY (`id`,`no_registrasi`);

--
-- Indexes for table `tb_surat_ahli_waris`
--
ALTER TABLE `tb_surat_ahli_waris`
  ADD PRIMARY KEY (`id`,`no_surat_ahli_waris`);

--
-- Indexes for table `tb_surat_izin_mendirikan_bangunan`
--
ALTER TABLE `tb_surat_izin_mendirikan_bangunan`
  ADD PRIMARY KEY (`id`,`no_surat_imb`);

--
-- Indexes for table `tb_surat_izin_tempat_usaha`
--
ALTER TABLE `tb_surat_izin_tempat_usaha`
  ADD PRIMARY KEY (`id`,`no_surat_izin_usaha`);

--
-- Indexes for table `tb_surat_kehilangan`
--
ALTER TABLE `tb_surat_kehilangan`
  ADD PRIMARY KEY (`id`,`no_surat_kehilangan`);

--
-- Indexes for table `tb_surat_kelahiran`
--
ALTER TABLE `tb_surat_kelahiran`
  ADD PRIMARY KEY (`id`,`no_surat_kelahiran`);

--
-- Indexes for table `tb_surat_keterangan_belum_menikah`
--
ALTER TABLE `tb_surat_keterangan_belum_menikah`
  ADD PRIMARY KEY (`id`,`no_surat_belum_menikah`);

--
-- Indexes for table `tb_surat_keterangan_domisili`
--
ALTER TABLE `tb_surat_keterangan_domisili`
  ADD PRIMARY KEY (`id`,`no_surat_keterangan_domisili`);

--
-- Indexes for table `tb_surat_keterangan_tidak_mampu`
--
ALTER TABLE `tb_surat_keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id`,`no_surat_tidak_mampu`);

--
-- Indexes for table `tb_surat_keterangan_usaha`
--
ALTER TABLE `tb_surat_keterangan_usaha`
  ADD PRIMARY KEY (`id`,`no_surat_ket_usaha`);

--
-- Indexes for table `tb_surat_pengantar_kartu_keluarga`
--
ALTER TABLE `tb_surat_pengantar_kartu_keluarga`
  ADD PRIMARY KEY (`id`,`no_surat_pengantar_kk`);

--
-- Indexes for table `tb_surat_pengantar_ktp`
--
ALTER TABLE `tb_surat_pengantar_ktp`
  ADD PRIMARY KEY (`id`,`no_surat_pengantar_ktp`);

--
-- Indexes for table `tb_surat_pengantar_nikah`
--
ALTER TABLE `tb_surat_pengantar_nikah`
  ADD PRIMARY KEY (`id`,`no_surat_nikah`);

--
-- Indexes for table `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  ADD PRIMARY KEY (`id`,`no_surat_pindah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_data_penduduk`
--
ALTER TABLE `tb_data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_data_surat`
--
ALTER TABLE `tb_data_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_informasi_pembuatan_surat_admin`
--
ALTER TABLE `tb_informasi_pembuatan_surat_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_informasi_pembuatan_surat_user`
--
ALTER TABLE `tb_informasi_pembuatan_surat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_informasi_penyelesaian_surat_admin`
--
ALTER TABLE `tb_informasi_penyelesaian_surat_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_informasi_penyelesaian_surat_user`
--
ALTER TABLE `tb_informasi_penyelesaian_surat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_keberadaan_lurah_admin`
--
ALTER TABLE `tb_keberadaan_lurah_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_keberadaan_lurah_user`
--
ALTER TABLE `tb_keberadaan_lurah_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_register_pelayanan_surat`
--
ALTER TABLE `tb_register_pelayanan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_surat_ahli_waris`
--
ALTER TABLE `tb_surat_ahli_waris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_izin_mendirikan_bangunan`
--
ALTER TABLE `tb_surat_izin_mendirikan_bangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_izin_tempat_usaha`
--
ALTER TABLE `tb_surat_izin_tempat_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_kehilangan`
--
ALTER TABLE `tb_surat_kehilangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_kelahiran`
--
ALTER TABLE `tb_surat_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_keterangan_belum_menikah`
--
ALTER TABLE `tb_surat_keterangan_belum_menikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_keterangan_domisili`
--
ALTER TABLE `tb_surat_keterangan_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_keterangan_tidak_mampu`
--
ALTER TABLE `tb_surat_keterangan_tidak_mampu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_keterangan_usaha`
--
ALTER TABLE `tb_surat_keterangan_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_pengantar_kartu_keluarga`
--
ALTER TABLE `tb_surat_pengantar_kartu_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_pengantar_ktp`
--
ALTER TABLE `tb_surat_pengantar_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_pengantar_nikah`
--
ALTER TABLE `tb_surat_pengantar_nikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
