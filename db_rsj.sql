-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 07:53 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rsj`
--

-- --------------------------------------------------------

--
-- Table structure for table `databarang`
--

CREATE TABLE `databarang` (
  `no_seri` varchar(119) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jumlah_barang` varchar(100) NOT NULL,
  `tahun_pengadaan` date NOT NULL,
  `distributor` varchar(100) NOT NULL,
  `penempatan_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `dana_perbaikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databarang`
--

INSERT INTO `databarang` (`no_seri`, `nama_barang`, `jenis_barang`, `jumlah_barang`, `tahun_pengadaan`, `distributor`, `penempatan_barang`, `harga_barang`, `dana_perbaikan`) VALUES
('brg001', 'Komputer Acer', 'Elektronik', '2', '2019-02-19', 'PT. DMW. Tbk', 'Pusat Rehabilitasi', '3500000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_pemohon` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `uraian_perbaikan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lama_perbaikan` varchar(255) NOT NULL,
  `jadwal_perbaikan` date NOT NULL,
  `jenis_kerusakan` varchar(255) NOT NULL,
  `bahan_digunakan` varchar(255) NOT NULL,
  `biaya_perbaikan` varchar(255) NOT NULL,
  `pelaksanaan` varchar(255) NOT NULL,
  `hasil_perbaikan` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_pemohon`, `ruangan`, `nama`, `nip`, `uraian_perbaikan`, `jumlah`, `tanggal`, `jam`, `lama_perbaikan`, `jadwal_perbaikan`, `jenis_kerusakan`, `bahan_digunakan`, `biaya_perbaikan`, `pelaksanaan`, `hasil_perbaikan`, `status`) VALUES
(14, 'Informasi Teknologi', 'Rizal', '002', 'Komputer rusak', 1, '2019-02-12', '22:10:00', '8 hari', '2019-02-19', 'keybord rusak', 'keyboard', '150000', 'ipsrs', 'bagus', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
('1', 'Pusat Rehabilitasi'),
('2', 'Inventaris'),
('3', 'Informasi Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('1','2') NOT NULL,
  `image` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `nama`, `username`, `password`, `hak_akses`, `image`, `ruangan`) VALUES
(1, 'ridho darmawan', 'admin', 'admin', '1', 'asset/img/profil/001.jpg', 'Inventaris'),
(2, 'M Rizal', 'pemohon', 'pemohon', '2', 'asset/img/profil/002.jpg', 'Informasi Teknologi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
