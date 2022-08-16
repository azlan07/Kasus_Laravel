-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 02:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(20) NOT NULL,
  `ketua_bagian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`, `ketua_bagian`) VALUES
(1, 'kurikulum', 'novaldi'),
(2, 'kesiswaan', 'yondrizon'),
(3, 'tata usaha', 'sintia rosa'),
(4, 'bk', 'suprapto'),
(5, 'perpustakaan', 'indra agus');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `nama_pangkat` varchar(50) DEFAULT NULL,
  `alasan` varchar(50) DEFAULT NULL,
  `mulai_tgl` date DEFAULT NULL,
  `sampai_tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `nip`, `nama_pangkat`, `alasan`, `mulai_tgl`, `sampai_tgl`) VALUES
(7, '2001092019', 'wakil ketua', 'demam', '2022-01-06', '2022-01-09'),
(10, '196701132003121002', 'ketua perpustakaan', 'cuti tahunan', '2022-01-13', '2022-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `nik` int(20) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `alamat_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`nik`, `nip`, `nama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_ibu`) VALUES
(12345, '4', 'supardi', 'pns', 'sumanik', 'yarni', 'pns', 'sumanik'),
(12345002, '2001092019', 'erman n', 'petani', 'sumanik', 'ridatul fitri', 'ibu rumah tangga', 'sumanik');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_pangkat` varchar(50) NOT NULL,
  `jenis_pangkat` varchar(50) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `sah_sk` date NOT NULL,
  `nama_pengesah_sk` varchar(50) NOT NULL,
  `no_sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nip`, `nama_pangkat`, `jenis_pangkat`, `tmt_pangkat`, `sah_sk`, `nama_pengesah_sk`, `no_sk`) VALUES
(6, '2001092019', 'ketua', 'sementara', '2022-01-06', '2022-01-06', 'suprapno', '12345'),
(8, '198201132003121002', 'kepala sekolah', 'kepala', '2022-01-13', '2022-01-13', 'darmono', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(19) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` varchar(255) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `gol_darah` enum('o','a','b','ab') NOT NULL,
  `status_pernikahan` enum('kawin','lajang') NOT NULL,
  `status_kepegawaian` enum('pns','honor') NOT NULL,
  `id_bagian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `foto_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `agama`, `email`, `alamat`, `gol_darah`, `status_pernikahan`, `status_kepegawaian`, `id_bagian`) VALUES
('1', 'pardi', '61e0270616b75.png', 'situmbuk', '1983-01-13', 'laki-laki', '082467654728', 'islam', 'pardi@shc.id', 'situmbuk', 'a', 'lajang', 'honor', '4'),
('196701132003121002', 'indra agus', '61e025e3d8e89.jpg', 'lawang mandahiling', '1967-01-13', 'laki-laki', '082136765435', 'islam', 'indraagus@sch.id', 'sungayang', 'o', 'kawin', 'pns', '5'),
('197201132003121001', 'yondrizon', '61e0255f9691d.png', 'sumanik', '1972-01-13', 'laki-laki', '082345643223', 'islam', 'yondrizon@sch.id', 'tanjung', 'a', 'kawin', 'pns', '2'),
('197501132003121002', 'suprapto', '61e026c173ab8.png', 'solo', '1975-01-13', 'laki-laki', '083367545676', 'islam', 'suprapto@sch.id', 'sungai tarab', 'b', 'lajang', 'pns', '4'),
('198001132003121002', 'sintia rosa', '61e02663221c8.jpeg', 'sumanik', '1980-01-13', 'perempuan', '0852876545678', 'islam', 'sintiarosa@sch.id', 'sumanik', 'b', 'kawin', 'pns', '3'),
('198201132003121002', 'novaldi', '61dfd1f26c632.jpeg', 'sumanik', '1982-01-13', 'laki-laki', '082345678901', 'islam', 'novaldi@sch.id', 'sungai leman', 'o', 'kawin', 'pns', '1'),
('2', 'buyuang sakai', '61d7e6e3b243a.png', 'bonjol', '1991-01-01', 'laki-laki', '082000000000', 'islam', 'buyuang@gmail.com', 'kota padang', 'a', 'kawin', 'honor', '1'),
('2001092019', 'azlan', '61d6f8deb8dbf.png', 'sumanik', '2002-07-15', 'laki-laki', '082377458691', 'islam', 'azlan.nur15.07hakim@gmail.com', 'tanah datar', 'a', 'lajang', 'pns', '2'),
('3', 'erid mardi', '61e027bfb60cd.png', 'sumanik', '1986-01-13', 'laki-laki', '082236746564', 'islam', 'mardi@sch.id', 'sumanik', 'a', 'lajang', 'honor', '3'),
('4', 'yanti rahma', '61e0280496eb1.png', 'padang', '1991-01-13', 'laki-laki', '0823457864537', 'islam', 'yantirhma@sch.id', 'sumanik', 'a', 'lajang', 'honor', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `tingkat` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `no_ijazah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nip`, `tingkat`, `nama_sekolah`, `lokasi`, `jurusan`, `tgl_ijazah`, `no_ijazah`) VALUES
(9, '2001092019', 'd3', 'politeknik negeri padang', 'padang', 'teknologi informasi', '2022-01-06', '12345678'),
(11, '197201132003121001', 's2', 'universitas islam negeri imam bonjol', 'padang', 'pendidikan islam', '2022-01-13', '12345'),
(12, '198201132003121002', 's1', 'institut islam negeri batusangkar', 'batusangkar', 'hukum islam', '2022-01-13', '23123123');

-- --------------------------------------------------------

--
-- Table structure for table `pensiun`
--

CREATE TABLE `pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan_terakhir` varchar(50) NOT NULL,
  `tanggal_pensiun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pensiun`
--

INSERT INTO `pensiun` (`id_pensiun`, `nip`, `jabatan_terakhir`, `tanggal_pensiun`) VALUES
(1, '2001092019', 'ketua kesiswaan', '2022-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$zAUs62heLZcoSvJ9XiAeye3g44poC6uWE7GhurTEJgm.6.UxTYZ1m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `nip2` (`nip`);

--
-- Indexes for table `pensiun`
--
ALTER TABLE `pensiun`
  ADD PRIMARY KEY (`id_pensiun`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pensiun`
--
ALTER TABLE `pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `pangkat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `nip2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `pensiun`
--
ALTER TABLE `pensiun`
  ADD CONSTRAINT `pensiun_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
