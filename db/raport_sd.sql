-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2022 pada 12.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport_sd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kehadiran` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen`, `id_siswa`, `tanggal`, `kehadiran`) VALUES
(4, 1, '2022-06-26', 'H'),
(5, 8, '2022-06-25', 'I'),
(6, 5, '2022-06-26', 'I'),
(7, 8, '2022-06-26', 'A'),
(8, 8, '2022-06-27', 'I'),
(9, 6, '2022-06-28', 'A'),
(10, 5, '2022-06-28', 'H'),
(11, 9, '2022-06-21', 'H'),
(12, 9, '2022-06-29', 'I'),
(13, 1, '2022-06-01', 'H'),
(14, 1, '2022-06-02', 'H'),
(15, 1, '2022-06-03', 'H'),
(16, 1, '2022-06-04', 'H'),
(17, 1, '2022-06-05', 'H'),
(18, 1, '2022-06-06', 'I'),
(19, 1, '2022-06-07', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `NPK` varchar(225) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` longtext NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` varchar(10) NOT NULL,
  `wali_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `NPK`, `nama_lengkap`, `alamat`, `telepon`, `level`, `wali_kelas`) VALUES
(15, '432007006190094', 'Gian Sonia', 'Citerewes ', '082321634181', 'guru', 1),
(18, '432007006190125', 'Aril Maulana', ' Sukabapak', '082321634181', 'guru', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(4, 'PPKN'),
(5, 'PAI'),
(6, 'BAHASA INDONESIA'),
(10, 'MATEMATIKA'),
(11, 'SENBUD PRA'),
(12, 'PENJASKES'),
(16, 'BAHASA SUNDA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_keterampilan`
--

CREATE TABLE `nilai_keterampilan` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `H1` int(11) NOT NULL,
  `H2` int(11) NOT NULL,
  `H3` int(11) NOT NULL,
  `H4` int(11) NOT NULL,
  `H5` int(11) NOT NULL,
  `H6` int(11) NOT NULL,
  `H7` int(11) NOT NULL,
  `H8` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `PTS` int(11) NOT NULL,
  `PAS` int(11) NOT NULL,
  `HPA` int(11) NOT NULL,
  `PRE` varchar(3) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_keterampilan`
--

INSERT INTO `nilai_keterampilan` (`id_nilai`, `id_siswa`, `id_mapel`, `NISN`, `nama_lengkap`, `jenis_kelamin`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `H8`, `RPH`, `PTS`, `PAS`, `HPA`, `PRE`, `deskripsi`) VALUES
(2, 1, 6, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(3, 1, 13, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(4, 1, 10, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(5, 1, 5, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(6, 1, 12, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(7, 1, 4, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(8, 1, 11, 148500877, '0', '0', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(11, 6, 6, 155490065, 'Afkar Mujahid Shaf', 'L', 90, 98, 77, 87, 56, 88, 98, 85, 85, 99, 90, 90, 'A', 'Baik Sekali'),
(12, 1, 16, 148500877, 'Adzkia Khairina Nurfayza', 'P', 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 'A', 'Baik Sekali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pengetahuan`
--

CREATE TABLE `nilai_pengetahuan` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `NISN` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `H1` varchar(225) NOT NULL,
  `H2` varchar(225) NOT NULL,
  `H3` varchar(225) NOT NULL,
  `H4` varchar(225) NOT NULL,
  `H5` varchar(225) NOT NULL,
  `H6` varchar(225) NOT NULL,
  `H7` varchar(225) NOT NULL,
  `H8` varchar(225) NOT NULL,
  `RPH` varchar(225) NOT NULL,
  `PTS` varchar(225) NOT NULL,
  `PAS` varchar(225) NOT NULL,
  `HPA` varchar(225) NOT NULL,
  `PRE` enum('A','B','C','D') NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_pengetahuan`
--

INSERT INTO `nilai_pengetahuan` (`id_nilai`, `id_siswa`, `id_mapel`, `NISN`, `nama_lengkap`, `jenis_kelamin`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `H8`, `RPH`, `PTS`, `PAS`, `HPA`, `PRE`, `deskripsi`) VALUES
(24, 1, 6, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(25, 1, 13, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(26, 1, 10, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(27, 1, 5, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(28, 1, 12, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(29, 1, 4, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(30, 1, 11, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(31, 5, 6, '3145225768', 'Adzkia Saufa Darmawan', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali'),
(32, 5, 13, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(33, 5, 10, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(34, 5, 5, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(35, 5, 12, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(36, 5, 4, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(37, 5, 11, '3145225768', 'Adzkia Saufa Darmawan', 'P', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'B', 'Baik'),
(38, 6, 6, '0155490065', 'Afkar Mujahid Shaf', 'L', '80', '90', '0', '0', '0', '0', '0', '0', '85', '0', '0', '43', 'D', 'Kurang'),
(39, 1, 16, '0148500877', 'Adzkia Khairina Nurfayza', 'P', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', '90', 'A', 'Baik Sekali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jenis_prestasi` varchar(255) NOT NULL,
  `tingkat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_siswa`, `jenis_prestasi`, `tingkat`) VALUES
(1, 8, 'Juara 1 Lomba Adzan', 'Kecamatan'),
(2, 6, 'Juara 1 melukis', 'Nasional'),
(3, 1, 'Juara 1 Feshion Show', 'Nasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` varchar(225) NOT NULL,
  `NIS` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `agama` enum('ISLAM','PROTESTAN','BUDDHA','HINDU','KATOLIK','KHONGHUCU') NOT NULL,
  `PS` varchar(225) NOT NULL,
  `kelas` int(11) NOT NULL,
  `alamat_siswa` varchar(225) NOT NULL,
  `nama_ayah` varchar(225) NOT NULL,
  `nama_ibu` varchar(225) NOT NULL,
  `kerja_ayah` varchar(225) NOT NULL,
  `kerja_ibu` varchar(225) NOT NULL,
  `alamat_ortu` varchar(225) NOT NULL,
  `nama_wali` varchar(225) NOT NULL,
  `kerja_wali` varchar(225) NOT NULL,
  `alamat_wali` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `NISN`, `NIS`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `PS`, `kelas`, `alamat_siswa`, `nama_ayah`, `nama_ibu`, `kerja_ayah`, `kerja_ibu`, `alamat_ortu`, `nama_wali`, `kerja_wali`, `alamat_wali`, `level`) VALUES
(1, '0148500877', '212201003', 'Adzkia Khairina Nurfayza', 'Tasikmalaya', '2014-11-25', 'PEREMPUAN', 'ISLAM', 'TK AL-IKHLAS', 1, 'Salaksa RT 05 RW 02', 'Yusuf Rukmana', 'Nurul Ajijah', 'Karyawan Swasta', 'Ibu Rumah Tangga', 'Salaksa RT 05 RW 02, Kel. Cipari, Kec. Mangkubumi, Kota. Tasikmalaya, Jawa Barat', '', '', '', ''),
(5, '3145225768', '212201004', 'Adzkia Saufa Darmawan', 'Tasikmalaya', '2014-08-30', 'PEREMPUAN', 'ISLAM', 'RA AL-IRSYAD ASSULAIMANY', 1, ' Kp. Nyalindung RT 03 RW 05', 'Rahadian Darmawan', 'Helda Alisa', 'Wiraswasta', 'Wiraswasta', ' Kp. Nyalindung RT 03 RW 05, kel. Mangkubumi, kec. Mangkubumi, kota Tasikmalaya, Jawa Barat', '', '', ' ', 'siswa'),
(6, '0155490065', '212201005', 'Afkar Mujahid Shaf', 'TASIKMALAYA', '2015-02-04', 'LAKI-LAKI', 'ISLAM', 'PAUD AL-IKHLAS', 1, ' Situ Beet RT 03 RW 08', 'RACHMAN RAMADHAN PRIANA, s.S0S.Si', 'EKA FUZI RAHAYU', 'Wiraswasta', 'Ibu Rumah Tangga', '  Situ Beet RT 03 RW 08', '-', '-', ' -', 'siswa'),
(9, '0146964173', '212201006', 'Ahmad Luthfi Rahmani', 'TASIKMALAYA', '2014-05-07', 'LAKI-LAKI', 'ISLAM', 'TK AL-MUBTADIIN', 1, ' perum puri melodi d2 no. 11 rt 05 rw 10', 'muhamad taupik', 'yani suryani', 'karyawan swasta', 'Ibu Rumah Tangga', ' perum puri melodi d2 no. 11 rt 05 rw 10', '', '', ' ', 'siswa'),
(10, '0147545442', '212201007', 'Albiansyah Kahvi Athaya', 'TASIKMALAYA', '2014-11-18', 'LAKI-LAKI', 'ISLAM', 'KB AMINATUSSAADAH', 1, ' perum baitul marhamah IV Blok J-39 rt 03 rw 07', 'dedi wahyudi', 'rina aprillani', 'buruh', 'Ibu Rumah Tangga', ' perum baitul marhamah IV Blok J-39 rt 03 rw 07', '', '', ' ', 'siswa'),
(11, '3148771586', '212201008', 'Astria Syafiyya Nur Fauziah', 'TASIKMALAYA', '2014-11-25', 'PEREMPUAN', 'ISLAM', 'RA AL-MUKHTARIYAH', 1, ' warung lebak rt 04 rw 06', 'budi hisa', 'dea puspitasari', 'Wiraswasta', 'Ibu Rumah Tangga', ' warung lebak rt 04 rw 06', '', '', ' ', 'siswa'),
(12, '0141604136', '212201009', 'Azka Tazkiyatul Lathifah', 'TASIKMALAYA', '2014-10-15', 'PEREMPUAN', 'ISLAM', 'TK AL-MUBTADIIN', 1, ' cipari tengah rt 02 rw 07', 'yangga kamayat', 'ema rahmawati', 'Wiraswasta', 'Ibu Rumah Tangga', ' cipari tengah rt 02 rw 07', '', '', ' ', 'siswa'),
(13, '0142084142', '212201010', 'Azkiya Maulida', 'TASIKMALAYA', '2014-12-02', 'PEREMPUAN', 'ISLAM', 'TK AL-IKHLAS', 1, ' palasari rt 03 rw 10', 'tantan abdul hiban', 'dessi natalia', 'Wiraswasta', 'Ibu Rumah Tangga', ' palasari rt 03 rw 10', '', '', ' ', 'siswa'),
(14, '3143304220', '212201011', 'Azzam Pradipta Firmansyah', 'TASIKMALAYA', '2014-11-22', 'PEREMPUAN', 'ISLAM', 'RA AL-ANWAR', 1, ' batu nungku rt 02 rw 12', 'ari firmansyah', 'khoerunnisa', 'buruh', 'Ibu Rumah Tangga', ' batu nungku rt 02 rw 12', '', '', ' ', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `level` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(5, 'indriamalia', '$2y$10$IHpEs6vL3JNhpwSMeecvMea5M5YsuotUKhRiqhH5LbvF1ROFn48D2', 'Indri Amalia Rahman', 'admin'),
(21, '212201004', '$2y$10$CHno.enoh0H0AKYqlZMzvuNScHEi/8Hnml7NBB6ubOrl.7mWvIo2e', 'Adzkia Saufa Darmawan', 'siswa'),
(22, '432007006190094', '$2y$10$pSTL5EqZrxOO5pNsifFKO.yAHZfYehqdQQ9WUThZrHTG12R.Uxizy', 'Gian Sonia', 'guru'),
(23, '212201005', '$2y$10$IIj1v3C47Zm5rc6hui2Vv.tH4brPov8DbiNAIgGhjASOUj0zmxjMm', 'Afkar Mujahid Shaf', 'siswa'),
(28, 'arilmaulana', '$2y$10$fgW.40Pt7LO3AVQKDvxpbOvU4CAfFQpPWoBixue5pN94Fx40kAYLS', 'Aril', 'admin'),
(29, '432007006190125', '$2y$10$ux8YykPEDYjJfE9zXOvjaeRlmUJ.RwyZ88H//Dl5vlYE.uZDmWRN2', 'Aril Maulana', 'guru'),
(30, '212201006', '$2y$10$2LYKEXuqXU65QXDU9984y.ga4i9uy4FnuvnzvQHjJ5fGABGGx1gjK', 'Ahmad Luthfi Rahmani', 'siswa'),
(31, '212201007', '$2y$10$GKSXtxKHLEp.IaU9y.CdFu9/RxGXVynb/IjkbDvlsLG17255UsrBe', 'Albiansyah Kahvi Athaya', 'siswa'),
(32, '212201008', '$2y$10$oTFbmX3dBBIYpqctiKwP/./Lwqt8BM2UKrGVDLeGptoEg.QifGnTS', 'Astria Syafiyya Nur Fauzi', 'siswa'),
(33, '212201009', '$2y$10$KM7biSX8F7EDCv3oP1uHaOc8bRANpTQyeA86JN6cZAhrpSuem7g1.', 'Azka Tazkiyatul Lathifah', 'siswa'),
(34, '212201010', '$2y$10$AkQKdVtM31RAP0m65Aw88upyJ88o5ohOa3z3TeLMfDwDygKgbZTfe', 'Azkiya Maulida', 'siswa'),
(35, '212201011', '$2y$10$qP1c1wM0tJ6BkoA3xkPwzeC5RhIgKolV1qID8h4HZpz6cE4gX8yBq', 'Azzam Pradipta Firmansyah', 'siswa'),
(38, '212201003', '$2y$10$LrHm72fom30tbGWw4F3wVO.ntN7o5FSDc4nuYz33duyfqKWs9ECIi', 'Adzkia Khairina Nurfayza', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
