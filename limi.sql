-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jan 2021 pada 22.22
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `limi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ibadah`
--

CREATE TABLE IF NOT EXISTS `tbl_ibadah` (
`id_ibadah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_ibadah` varchar(50) NOT NULL,
  `tempat_ibadah` varchar(100) NOT NULL,
  `pengkotbah` varchar(100) NOT NULL,
  `judul_kotbah` varchar(255) NOT NULL,
  `jumlah_jemaat` varchar(5) NOT NULL,
  `jumlah_persembahan` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_ibadah`
--

INSERT INTO `tbl_ibadah` (`id_ibadah`, `tanggal`, `jenis_ibadah`, `tempat_ibadah`, `pengkotbah`, `judul_kotbah`, `jumlah_jemaat`, `jumlah_persembahan`) VALUES
(1, '2021-01-03', 'Ibadah Minggu', 'Sentani', 'Parkheun', 'Contoh Saja', '37', '15'),
(2, '2021-01-03', 'Ibadah Minggu', 'Entrop', 'Park Ji Soung', 'Contoh Saja', '24', '17'),
(3, '2021-01-10', 'Ibadah Minggu', 'Sentani', 'Heunxi', 'Contoh Saja', '11', '5'),
(4, '2021-01-10', 'Ibadah Minggu', 'Entrop', 'Kiuxi', 'Contoh Saja', '51', '27'),
(5, '2021-01-17', 'Ibadah Minggu', 'Sentani', 'Liuo', 'Contoh Saja', '22', '19'),
(6, '2021-01-17', 'Ibadah Minggu', 'Entrop', 'Sauing', 'Contoh Saja', '28', '14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jemaat`
--

CREATE TABLE IF NOT EXISTS `tbl_jemaat` (
`id_jemaat` int(11) NOT NULL,
  `nama_jemaat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp_hp` varchar(13) NOT NULL,
  `no_telp_rumah` varchar(15) NOT NULL,
  `no_telp_kantor` varchar(15) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL,
  `status_pernikahan` varchar(20) NOT NULL,
  `tempat_menikah` varchar(100) NOT NULL,
  `tgl_pernikahan` varchar(20) NOT NULL,
  `nama_pasangan` varchar(100) NOT NULL,
  `anak_ke_1` varchar(100) NOT NULL,
  `anak_ke_2` varchar(100) NOT NULL,
  `anak_ke_3` varchar(100) NOT NULL,
  `anak_ke_4` varchar(100) NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `tgl_baptis` date NOT NULL,
  `tempat_baptis` varchar(100) NOT NULL,
  `pendeta` varchar(100) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `pendidikan_terakhir` varchar(5) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tanggal_pengisian_formulir` date NOT NULL,
  `id_licom` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dekripsi` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_jemaat`
--

INSERT INTO `tbl_jemaat` (`id_jemaat`, `nama_jemaat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp_hp`, `no_telp_rumah`, `no_telp_kantor`, `status_keluarga`, `status_pernikahan`, `tempat_menikah`, `tgl_pernikahan`, `nama_pasangan`, `anak_ke_1`, `anak_ke_2`, `anak_ke_3`, `anak_ke_4`, `ayah`, `ibu`, `tgl_baptis`, `tempat_baptis`, `pendeta`, `golongan_darah`, `pendidikan_terakhir`, `keahlian`, `pekerjaan`, `tanggal_pengisian_formulir`, `id_licom`, `username`, `password`, `dekripsi`, `level`, `foto`) VALUES
(1, 'Riko Tamba', 'Wamena', '1983-09-14', 'Laki-Laki', 'Bucend II Entrop, Butik Lily', '08114896088', '', '', 'Suami', 'Menikah', 'Makassar, GTM Ebenheizer', '2016-08-06', 'Vivin Sappa', 'Adriel Malacay Tamba', '', '', '', 'Tommy Tamba', 'Lilyanti SB', '2021-01-10', 'GBI ROCK Jayapura', 'PDM. Ridy Lasa', 'AB', 'S1', 'Ekonomi', 'Pekerja Swasta', '2021-01-12', '1', 'rikotamba', '314475b871ee17288c5f6392f0333da9', 'rikotamba', 'Admin', 'foto/3.png'),
(2, 'Remuz Kmurawak', 'Biak', '1983-06-15', 'Laki-Laki', 'Jayapura', '082248815140', '', '', 'Suami', 'Menikah', '-', '', '', '', '', '', '', '-', '-', '2021-01-10', '-', '-', 'AB', 'S1', 'Ekonomi', 'Pekerja Swasta', '2021-01-18', '2', 'remuzkmurawak', '70a6cc173917b83fadbdb1daa8af28fd', 'remuzkmurawak', 'Ketua', 'foto/2e9ba55f8bafbb1c3116c3007ab3f06c.jpg'),
(3, 'Gerson', 'Manado', '1985-07-22', 'Laki-Laki', 'Manado', '081378273811', '', '', 'Suami', 'Menikah', 'GWK Bali', '2011-06-19', 'Fania', 'Michael Yesla', '', '', '', 'Andre', 'Kristina', '2015-12-25', 'Manado', 'Miauhi', 'O', 'S1', 'Teknik Sipil', 'PNS/Pegawai BUMN', '2021-01-19', '3', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Anggota', 'foto/6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_licom`
--

CREATE TABLE IF NOT EXISTS `tbl_licom` (
`id_licom` int(11) NOT NULL,
  `nama_licom` varchar(100) NOT NULL,
  `ketua_licom` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_kontak` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_licom`
--

INSERT INTO `tbl_licom` (`id_licom`, `nama_licom`, `ketua_licom`, `alamat`, `no_kontak`) VALUES
(1, 'Licom Dorkas', 'Riko Tamba', 'Bucend II Entrop, Butik Lily', '081148960886'),
(2, 'Licom Pioneer', 'Remuz Kmurawak', 'Biak, Papua', '082248815140'),
(3, 'Licom MAC', 'Gerson', 'Manado', '081378273811');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi_ibadah`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasi_ibadah` (
`id_lokasi_ibadah` int(11) NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `contact_person` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_lokasi_ibadah`
--

INSERT INTO `tbl_lokasi_ibadah` (`id_lokasi_ibadah`, `alamat_lokasi`, `contact_person`) VALUES
(1, 'Sentani', '081278242919'),
(2, 'Entrop', '088674328941');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ibadah`
--
ALTER TABLE `tbl_ibadah`
 ADD PRIMARY KEY (`id_ibadah`), ADD KEY `FK_TEMPAT` (`tempat_ibadah`);

--
-- Indexes for table `tbl_jemaat`
--
ALTER TABLE `tbl_jemaat`
 ADD PRIMARY KEY (`id_jemaat`);

--
-- Indexes for table `tbl_licom`
--
ALTER TABLE `tbl_licom`
 ADD PRIMARY KEY (`id_licom`);

--
-- Indexes for table `tbl_lokasi_ibadah`
--
ALTER TABLE `tbl_lokasi_ibadah`
 ADD PRIMARY KEY (`id_lokasi_ibadah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ibadah`
--
ALTER TABLE `tbl_ibadah`
MODIFY `id_ibadah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_jemaat`
--
ALTER TABLE `tbl_jemaat`
MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_licom`
--
ALTER TABLE `tbl_licom`
MODIFY `id_licom` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_lokasi_ibadah`
--
ALTER TABLE `tbl_lokasi_ibadah`
MODIFY `id_lokasi_ibadah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
