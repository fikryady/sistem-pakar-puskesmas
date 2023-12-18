-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2023 pada 21.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sptb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nm_admin`, `username`, `no_hp`, `tgl_lahir`, `email`, `password`) VALUES
(1, 'Admin', 'admin', '081264578284', '1997-10-10', 'admin@gmail.com', '$2y$10$TjUmTnycz9pg.xUKPLv53.lYUr0kDcZXk9L6Z0otlEwxlOU2lp1Ce');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diseases`
--

INSERT INTO `diseases` (`id`, `kd`, `nama`, `keterangan`, `solusi`, `created_at`, `updated_at`) VALUES
(1, 'KP001', 'Tuberkulosis Paru', '<div>TB Paru merupakan penyakit tuberkulosis yang menginfeksi di bagian paru-paru</div>', '<div>a. Silahkan datangi puskesmas atau dokter spesialis paru untuk berkonsultasi lebih lanjut.&nbsp;<br>b. Lakukan tes dahak untuk mengetahui bta+ atau bta-&nbsp;<br>c. Lama pengobatan berkisar 6-8 bulan&nbsp;<br>d. Pengobatan tb diberikan dalam 2 tahap yaitu tahap intensif (2 bulan) dan tahap lanjutan (4 atau 6 bulan)&nbsp;<br>e. Minumlah obat secara teratur agar tidak menular dan kuman tb dapat terbunuh sehingga mencegah terjadinya kambuh&nbsp;<br>f. Perlu dilakukan pemeriksaan ulang untuk memastikan kesembuhannya&nbsp;<br>g. Adanya pengawasan minum obat&nbsp;<br>h. Mulailah hidup sehat dengan membuka ventilasi rumah agar sinar matahari masuk</div>', NULL, '2023-07-12 09:37:46'),
(2, 'KP002', 'Tuberkulosis Limfadenitis', '<div>TB Limfadenitis merupakan penyakit tuberkulosis yang menginfeksi di bagian kelenjar getah bening</div>', '<div>a. Silahkan datangi puskesmas atau dokter spesialis paru untuk berkonsultasi lebih lanjut.&nbsp;<br>b. Lakukan tes darah, rongsen torak, biopsi dan dahak.&nbsp;<br>c. Lama pengobatan 6 sampai 8 bulan&nbsp;<br>d. Pengobatan tb diberikan dalam 2 tahap yaitu tahap intensif (2 bulan) dan tahap lanjutan (4 atau 6 bulan)&nbsp;<br>e. Minumlah obat secara teratur agar tidak menular dan kuman tb dapat terbunuh sehingga mencegah terjadinya kambuh&nbsp;<br>f. Perlu dilakukan pemeriksaan ulang untuk memastikan kesembuhannya&nbsp;<br>g. Adanya pengawasan minum obat</div>', NULL, '2023-07-12 10:05:57'),
(3, 'KP003', 'Tuberkulosis Meningitis', '<div>TB Miningitis merupakan penyakit tuberkulosis yang menginfeksi dibagian sistem membran tipis yang melindungi otak dan saraf tulang belakang</div>', '<div>a. Silahkan datangi puskesmas atau dokter spesialis paru untuk berkonsultasi lebih lanjut<br>b. Lakukan tes darah.&nbsp;<br>c. Lama pengobatan 6 sampai 8 bulan&nbsp;<br>d. Pengobatan tb diberikan dalam 2 tahap yaitu tahap intensif (2 bulan) dan tahap lanjutan (4 atau 6 bulan)&nbsp;<br>e. Minumlah obat secara teratur agar tidak menular dan kuman tb dapat terbunuh sehingga mencegah terjadinya kambuh<br>f. Perlu dilakukan pemeriksaan ulang untuk memastikan kesembuhannya&nbsp;</div>', NULL, '2023-07-12 10:06:07'),
(4, 'KP004', 'Tuberkulosis Tulang', '<div>TB Tulang merupakan penyakit tuberkulosis yang menginfeksi dibagian tulang belakang pada area toraks ( dada belakang) bagian bawah dan vertebra lumbalis (pinggang Belakang) bagian atas</div>', '<div>a. Silahkan datangi puskesmas atau dokter spesialis paru dan dokter spesialis saraf untuk berkonsultasi lebih lanjut.&nbsp;<br>b. Lakukan tes darah. Foto thorakal (x-ray), foto mri jika diperlukan&nbsp;<br>c. Lama pengobatan 6 sampai 18 bulan&nbsp;<br>d. Pengobatan tb diberikan dalam 2 tahap yaitu tahap intensif (2 bulan) dan tahap lanjutan (4 atau 16 bulan)<br>e. Minumlah obat secara teratur agar tidak menular dan kuman tb dapat terbunuh sehingga mencegah terjadinya kambuh<br>f. Perlu dilakukan pemeriksaan ulang untuk memastikan kesembuhannya&nbsp;<br>g. Adanya pengawasan minum obat</div>', NULL, '2023-07-12 10:06:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_konsultasi` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `symptom_id` text NOT NULL,
  `bayes_value` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `histories`
--

INSERT INTO `histories` (`id`, `kd_konsultasi`, `tgl`, `user_id`, `disease_id`, `symptom_id`, `bayes_value`, `created_at`, `updated_at`) VALUES
(88, 'KDK323', '2023-07-29', 5, 1, '[\"1\",\"3\",\"7\"]', 76.70, '2023-07-29 09:17:54', '2023-07-29 09:17:54'),
(89, 'KDK612', '2023-07-29', 7, 2, '[\"7\",\"10\",\"18\"]', 72.57, '2023-07-29 09:18:34', '2023-07-29 09:18:34'),
(90, 'KDK998', '2023-07-29', 9, 3, '[\"4\",\"6\",\"13\"]', 70.17, '2023-07-29 09:18:57', '2023-07-29 09:18:57'),
(91, 'KDK475', '2023-07-29', 10, 4, '[\"2\",\"8\",\"22\"]', 60.50, '2023-07-29 09:19:23', '2023-07-29 09:19:23'),
(92, 'KDK320', '2023-07-29', 11, 1, '[\"2\",\"7\",\"17\"]', 60.97, '2023-07-29 09:19:47', '2023-07-29 09:19:47'),
(93, 'KDK580', '2023-07-29', 12, 2, '[\"8\",\"11\",\"21\"]', 70.99, '2023-07-29 09:20:08', '2023-07-29 09:20:08'),
(94, 'KDK504', '2023-07-29', 5, 3, '[\"8\",\"12\",\"14\"]', 75.26, '2023-07-29 09:20:29', '2023-07-29 09:20:29'),
(95, 'KDK204', '2023-07-29', 9, 4, '[\"8\",\"9\",\"23\"]', 59.80, '2023-07-29 09:20:59', '2023-07-29 09:20:59'),
(96, 'KDK560', '2023-07-29', 13, 1, '[\"7\",\"17\",\"25\"]', 75.63, '2023-07-29 09:21:21', '2023-07-29 09:21:21'),
(97, 'KDK458', '2023-07-29', 14, 2, '[\"8\",\"19\",\"20\"]', 71.69, '2023-07-29 09:21:42', '2023-07-29 09:21:42'),
(101, 'KDK555', '2023-07-31', 7, 1, '[\"1\",\"3\",\"7\"]', 76.70, '2023-07-31 00:39:41', '2023-07-31 00:39:41'),
(102, 'KDK877', '2023-07-31', 11, 2, '[\"7\",\"10\",\"18\"]', 72.57, '2023-07-31 00:40:16', '2023-07-31 00:40:16'),
(104, 'KDK735', '2023-08-14', 10, 1, '[\"2\",\"3\",\"6\"]', 82.43, '2023-08-13 20:38:26', '2023-08-13 20:38:26'),
(105, 'KDK988', '2023-08-14', 10, 3, '[\"4\",\"24\",\"25\"]', 51.26, '2023-08-13 20:40:14', '2023-08-13 20:40:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_10_180246_create_diseases_table', 1),
(6, '2023_07_10_180313_create_symptoms_table', 1),
(7, '2023_07_10_180422_create_rules_table', 1),
(8, '2023_07_10_180443_create_histories_table', 1),
(9, '2023_08_10_190341_create_admins_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `symptom_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`id`, `disease_id`, `symptom_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 2, 7, NULL, NULL),
(10, 2, 8, NULL, NULL),
(11, 2, 9, NULL, NULL),
(12, 2, 10, NULL, NULL),
(13, 2, 11, NULL, NULL),
(14, 3, 4, NULL, NULL),
(15, 3, 6, NULL, NULL),
(16, 3, 7, NULL, NULL),
(17, 3, 8, NULL, NULL),
(18, 3, 12, NULL, NULL),
(19, 3, 13, NULL, NULL),
(20, 3, 14, NULL, NULL),
(21, 4, 2, NULL, NULL),
(22, 4, 7, NULL, NULL),
(23, 4, 8, NULL, NULL),
(24, 4, 9, NULL, NULL),
(25, 4, 15, NULL, NULL),
(26, 4, 16, NULL, NULL),
(27, 1, 17, NULL, NULL),
(28, 1, 25, NULL, NULL),
(29, 2, 18, NULL, NULL),
(30, 2, 19, NULL, NULL),
(31, 2, 20, NULL, NULL),
(32, 2, 21, NULL, NULL),
(33, 3, 24, NULL, NULL),
(34, 4, 22, NULL, NULL),
(35, 4, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `symptoms`
--

CREATE TABLE `symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` decimal(4,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `symptoms`
--

INSERT INTO `symptoms` (`id`, `kd`, `nama`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'KG001', 'Sakit disalah satu sisi dada (G1)', 0.570, NULL, NULL),
(2, 'KG002', 'Berkeringat dimalam hari (G2)', 0.490, NULL, NULL),
(3, 'KG003', 'Sesak nafas(G3)', 0.530, NULL, NULL),
(4, 'KG004', 'Demam meriang lebih dari 1 bulan(G4)', 0.500, NULL, NULL),
(5, 'KG005', 'Batuk terus menerus dengan dahak selama 3 minggu atau lebih(G5)', 0.560, NULL, NULL),
(6, 'KG006', 'Bandan lemah(G6)', 0.450, NULL, NULL),
(7, 'KG007', 'Nafsu makan menurun(G7)', 0.480, NULL, NULL),
(8, 'KG008', 'Berat badan menurun(G8)', 0.470, NULL, NULL),
(9, 'KG009', 'Demam tinggi lebih dari 3 minggu(G9)', 0.280, NULL, NULL),
(10, 'KG010', 'Pembengkakan di kelenjar getah bening di leher atau ketiak(G10)', 0.390, NULL, NULL),
(11, 'KG011', 'Keluarnya cairan dari kelenjar getah bening yang bengkak(G11)', 0.320, NULL, NULL),
(12, 'KG012', 'Adanya penurunan kesadaran dan kejang-kejang(G12)', 0.470, NULL, NULL),
(13, 'KG013', 'Sakit kepala parah(G13)', 0.540, NULL, NULL),
(14, 'KG014', 'Perubahan pada kondisi mental(G14)', 0.490, NULL, NULL),
(15, 'KG015', 'Bungkuk dan disertai bengkak di tulang(G15)', 0.580, NULL, NULL),
(16, 'KG016', 'Munculnya abses atau nanah(G16)', 0.470, NULL, NULL),
(17, 'KG017', 'Dahak Bercampur darah (batuk darah)(G17)', 0.540, NULL, NULL),
(18, 'KG018', 'Adanya tanda-tanda radang di daerah sekitar benjolan kelenjar(G18)', 0.400, NULL, NULL),
(19, 'KG019', 'Benjolan kelenjar mudah digerakkan(G19)', 0.380, NULL, NULL),
(20, 'KG020', 'Benjolan kelenjar yang timbul terasa kenyal(G20)', 0.340, NULL, NULL),
(21, 'KG021', 'Terdapat luka pada jaringan kulit atau kulit yang disebabkan pecahnya benjolan kelenjar(G21)', 0.360, NULL, NULL),
(22, 'KG022', 'Rasa nyeri atau kekakuan pada bagian leher atau punggung(G22)', 0.500, NULL, NULL),
(23, 'KG023', 'timbulnya benjolan di bagian leher atau tulang belakang(G23)', 0.460, NULL, NULL),
(24, 'KG024', 'muntah-muntah(G24)', 0.520, NULL, NULL),
(25, 'KG025', 'Menggigil(G25)', 0.470, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `no_hp`, `alamat`, `pekerjaan`, `email`, `email_verified_at`, `password`, `tgl_lahir`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin2', '0812377654', 'Padang', 'Admin', 'admin@gmail.com', NULL, '$2y$10$TjUmTnycz9pg.xUKPLv53.lYUr0kDcZXk9L6Z0otlEwxlOU2lp1Ce', '1997-10-10', 1, NULL, '2023-07-30 03:46:30', '2023-07-30 04:18:17'),
(5, 'Windra', 'windra', '082265632727', 'Jl. Delima I', 'Mahasiswa', 'ujang@gmail.com', NULL, '$2y$10$VAq3No6PMY8jL.FsRpl3cuer.7LqO3f3FIj24ludrcBIeEH6IAXmu', '1997-04-06', 0, NULL, '2023-07-12 17:55:18', '2023-08-10 13:05:42'),
(7, 'Ujang', 'ujang', '08123476576', 'Jl. Tui Kuranji', 'Mahasiswa', 'pasien@gmail.com', NULL, '$2y$10$Ccx2wWmPVf19YW0Qzyo0Huc0IdJmj/B98rfIRZOtR8rUZBaCXDdRq', '2000-06-02', 0, NULL, '2023-07-27 23:02:52', '2023-07-27 23:18:11'),
(9, 'Wahyu', 'wahyu', '081264588765', 'Jl. Markisa Raya', 'Driver', 'wahyu@gmail.com', NULL, '$2y$10$hH0Z9LsCNv31L39uNyCwLeRLbZ.t54brdhgZI9qKtypGjh7j0anGO', '1997-08-01', 0, NULL, NULL, '2023-08-10 13:05:06'),
(10, 'Irvan', 'irvan', '082265748294', 'Jl. Apel II', 'Pegawai Swasta', 'irvan@gmail.com', NULL, '$2y$10$JjYF1xqsxrUEyZtZjr8vc.pSYLY7E2jQiO4v2RDszhYBDeTR.3EzS', '1998-04-02', 0, NULL, '2023-08-10 12:53:04', '2023-08-10 13:05:22'),
(11, 'Feli', 'feli', '081265777465', 'Jl. Salak Raya', 'Mahasiswa', 'feli@gmail.com', NULL, '$2y$10$Hgfbd9QQGd2eZDlKYu/Qm.hhuKyond9zrfNGgjwZG8PxIfMG7y8j.', '2001-03-05', 0, NULL, '2023-08-10 12:55:25', '2023-08-10 12:55:25'),
(12, 'Fitri', 'fitri', '081256775566', 'Jl. Mangga V', 'Pegawai Negri', 'fitri@gmail.com', NULL, '$2y$10$qSMdOhn.GGj4waYXEd6X/OM5rtS5Ls4xIL.8MdBad8q3SY/kdKh72', '1981-08-05', 0, NULL, '2023-08-10 13:04:39', '2023-08-10 13:04:39'),
(13, 'Fachri', 'fachri', '081264487462', 'Jl. Salak III', 'Mahasiswa', 'fachri@gmail.com', NULL, '$2y$10$mK/Z.vHKSWz15KqRdSjxMOK8PaBeGPK8lLPhgoBtx53WKtut3Ir32', '1993-03-07', 0, NULL, '2023-08-10 13:07:00', '2023-08-10 13:07:00'),
(14, 'Peter', 'peter', '082266478920', 'Jl. Jeruk Raya', 'Pegawai Negri', 'peter@gmail.com', NULL, '$2y$10$ziLFSOyXB4DfbcHYD4e0tu3TLvIjNWLQr3cnDhI2PBGN2xICWj2Z2', '1989-07-06', 0, NULL, '2023-08-10 13:08:14', '2023-08-10 13:08:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`),
  ADD KEY `histories_disease_id_foreign` (`disease_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rules_disease_id_foreign` (`disease_id`),
  ADD KEY `rules_symptom_id_foreign` (`symptom_id`);

--
-- Indeks untuk tabel `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rules_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
