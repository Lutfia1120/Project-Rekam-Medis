-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2025 pada 09.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` varchar(11) NOT NULL,
  `kd_poli` varchar(11) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `kd_user` int(11) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `SIP` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `kd_poli`, `tgl_kunjungan`, `kd_user`, `nm_dokter`, `SIP`, `tmpt_lahir`, `no_telp`, `alamat`) VALUES
('1', '0', '0000-00-00', 2, 'Heidi Kurniawan', '123456789', 'Bandung', 87654321, '0'),
('D001', 'POL004', '0000-00-00', 2, 'Heidi Kurniawan', '12345789', 'Bandung', 81234567, 'Jl. Surabaya'),
('D002', 'POL005', '0000-00-00', 2, 'Sinta Kurniawan', '2345689', 'Jakarta', 8542378, 'Jl. Cikajang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `no_pasien` varchar(11) NOT NULL,
  `kd_poli` varchar(11) NOT NULL,
  `jam_kunjungan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `tgl_kunjungan`, `no_pasien`, `kd_poli`, `jam_kunjungan`) VALUES
(8, '2025-06-18', 'P002', 'POL002', '18:00:00'),
(11, '2025-06-19', 'P001', 'POL005', '13:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium`
--

CREATE TABLE `laboratorium` (
  `kd_lab` varchar(11) NOT NULL,
  `no_RM` varchar(11) NOT NULL,
  `hasil_lab` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laboratorium`
--

INSERT INTO `laboratorium` (`kd_lab`, `no_RM`, `hasil_lab`, `ket`) VALUES
('LAB001', 'RM001', 'Sehat', 'Luka dalam yang memerlukan tindakan operasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Dokter','Apoteker','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin'),
(2, 'dokter ', '3f52941fdfe4208868722618d264ad8c', 'Dokter'),
(3, 'apoteker', '20f576791aa857d4bf1503a4592abbb1', 'Apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(11) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `jml_obat` varchar(20) NOT NULL,
  `ukuran` int(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `jml_obat`, `ukuran`, `harga`) VALUES
('OB01', 'Paracetamol', '10 Kaplet', 500, 4000),
('OB02', 'Amoxicillin', '10 Kaplet', 500, 6000),
('OB03', 'Infus Ringer Laktat', '1 satuan', 500, 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_pasien` varchar(11) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `j_kel` enum('Perempuan','Laki-laki','','') NOT NULL,
  `agama` enum('Islam','Kristen','Budha','Hindu','Katolik','Konghucu') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` int(5) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nm_kk` varchar(50) NOT NULL,
  `hub_kel` enum('Ayah','Ibu','Anak','Suami','Istri','Wali','Lainnya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nm_pasien`, `j_kel`, `agama`, `alamat`, `tgl_lahir`, `usia`, `no_telp`, `nm_kk`, `hub_kel`) VALUES
('P001', 'Eli', 'Perempuan', 'Kristen', 'Jl. Bogor 123', '2005-05-11', 29, '087543678', 'Anton', 'Wali'),
('P002', 'Ali', 'Laki-laki', 'Islam', 'BEKASI UTARA', '2025-06-17', 27, '0899999127', 'Budi', 'Ayah'),
('P003', 'Al', 'Perempuan', 'Islam', 'Jl. Cikajang', '2007-11-20', 17, '0876542', 'Zaki', 'Wali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `kd_poli` varchar(11) NOT NULL,
  `nm_poli` varchar(50) NOT NULL,
  `lantai` int(5) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`kd_poli`, `nm_poli`, `lantai`, `ket`) VALUES
('POL001', 'Poli Umum', 1, 'Pemeriksaan kesehatan umum'),
('POL002', 'Poli Gigi', 2, 'Layanan kesehatan gigi dan mulut'),
('POL003', 'Poli Anak', 2, 'Pemeriksaan anak-anak'),
('POL004', 'Poli kandungan', 1, 'Pemeriksaan ibu hamil'),
('POL005', 'Poli Mata', 2, 'Pemeriksaan gangguan penglihatan'),
('POL006', 'Poli Lansia', 1, 'Khusus untuk pasien usia lanjut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_RM` varchar(11) NOT NULL,
  `kd_tindakan` varchar(11) NOT NULL,
  `kd_obat` varchar(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `no_pasien` varchar(11) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `resep` varchar(50) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_RM`, `kd_tindakan`, `kd_obat`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_periksa`, `ket`) VALUES
('RM001', 'T001', 'OB01', '2', 'P002', 'Kelelahan Fisik', 'Minum 3x sehari', 'Pusing dan mudah lelah', '2025-06-18', 'Perlu istirahat yang cukup agar cepat pulih'),
('RM002', 'T002', 'OB02', '2', 'P003', 'Kelelahan Fisik', 'Minum 3x sehari', 'Pusing dan mudah lelah', '2025-06-18', 'Perlu istirahat yang cukup agar cepat pulih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` varchar(11) NOT NULL,
  `nm_tindakan` enum('Pemeriksaan Fisik','Operasi','Pemasangan Infus','Suntik Antibiotik','CT SCAN','USG') NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nm_tindakan`, `ket`) VALUES
('T001', 'Pemeriksaan Fisik', 'Pemeriksaan tekanan darah, suhu, kondisi fisik'),
('T002', 'Operasi', 'Luka dalam yang memerlukan tindakan operasi'),
('T003', 'Pemasangan Infus', 'Biasanya dilakukan untuk hidrasi, pemberian antibiotik, atau nutrisi.'),
('T004', 'Suntik Antibiotik', 'Digunakan saat obat oral tidak efektif atau kondisi darurat.'),
('T005', 'CT SCAN', ' Digunakan di kepala, dada, abdomen, dll.'),
('T006', 'USG', ' Umumnya digunakan untuk kehamilan, perut, dan organ dalam lainnya.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kd_dokter`),
  ADD UNIQUE KEY `kd_poli` (`kd_poli`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD UNIQUE KEY `no_pasien` (`no_pasien`),
  ADD UNIQUE KEY `kd_poli` (`kd_poli`);

--
-- Indeks untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`kd_lab`),
  ADD UNIQUE KEY `no_RM` (`no_RM`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`kd_poli`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_RM`),
  ADD UNIQUE KEY `kd_tindakan` (`kd_tindakan`,`kd_obat`,`kd_user`,`no_pasien`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
