-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkmmaros`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `umkms_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `umkms_id`, `created_at`, `updated_at`) VALUES
(1, 'UMKM-1', 1, '2023-05-18 15:13:02', '2023-05-18 15:14:59'),
(2, 'UMKM-2', 2, '2023-05-18 15:13:15', '2023-05-18 15:15:10'),
(3, 'UMKM-3', 3, '2023-05-18 15:13:23', '2023-05-18 15:15:22'),
(4, 'UMKM-4', 4, '2023-05-18 15:13:30', '2023-05-18 15:15:33'),
(5, 'UMKM-5', 5, '2023-05-18 15:13:39', '2023-05-18 15:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aspek` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL,
  `cf` int(11) NOT NULL,
  `sf` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id`, `nama_aspek`, `bobot`, `cf`, `sf`, `created_at`, `updated_at`) VALUES
(1, 'Usaha UMKM', 60, 60, 40, '2023-05-18 03:30:23', '2023-05-18 03:30:23'),
(2, '5C', 40, 60, 40, '2023-05-18 03:32:33', '2023-05-18 03:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `umkms_id` bigint(20) UNSIGNED NOT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `nib` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `umkms_id`, `kartu_keluarga`, `ktp`, `nib`, `tempat`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/documents/PW8lHHsCHoqjOgOCGd5JMPR3zIhlkCERwbI14ENB.png', 'assets/documents/v0Ab4EgHAwn50WvDI0RHQuZyD4gaHA3TJXtpmz2R.jpg', 'assets/documents/AFfha9kZUcUD1OdRs4fu7ObOC1gSsiTv8OySBnBB.pdf', 'assets/documents/Q63sMRNXIywT4lNb9A1rd4APzME21pfCdbErldaT.jpg', 3, '2023-05-17 17:09:44', '2023-05-21 17:27:27'),
(2, 2, 'assets/documents/MlwUMhbX1fXOS4OSbRPOEUo2EZpTAvaiQnsyJDaZ.jpg', 'assets/documents/Obcy9dCImQtjtylS4EhV6czYKsMJOnJ1QimuitJQ.png', 'assets/documents/oj9SMvvx6KOdz3by4c7QyOr8LBvgqDneo6HqovWQ.pdf', 'assets/documents/6KQ2Ytc8XUSL2rP6WyeEXQjbaPpaqUTSrfhF8L7z.jpg', 3, '2023-05-17 18:59:44', '2023-05-21 17:27:30'),
(3, 3, 'assets/documents/crWi25bQpauNWesHu7V9iecGfAO8Ar0WtDuApdpy.jpg', 'assets/documents/VNGt773VEwrGr3bNJqUuf9qoerzLWqpZsSXOyahD.png', 'assets/documents/egEEycp0ubizFVBMNyn7GOlz940X6IjQQfX5Yfmv.pdf', 'assets/documents/IYeMhjKLw6082MMXP8ZBWMW78fFzTz2vf254C7Ka.jpg', 3, '2023-05-17 21:27:45', '2023-05-21 17:27:32'),
(4, 4, 'assets/documents/vqvbLMlJilqwJtfrEpxBt2WJDWZqIxuWD98sIUa1.png', 'assets/documents/zMVI0BZceMi5gQcOZqEzwTjVLrCsjESeM4EcxMZq.jpg', 'assets/documents/7lzbGBG2Ia1W7zLuqmg8qX7ZpxY8vpPZ7jr0ZuRj.pdf', 'assets/documents/zQJrRAiPVwgvcrZwXKw0IMohKX1tEyRjUNJlASLG.png', 3, '2023-05-18 00:36:07', '2023-05-21 17:27:35'),
(5, 5, 'assets/documents/n4VHGXYqpzckzem4NNL8AAhniGnuAOTAzI2GNmF2.png', 'assets/documents/gzfUxx8WHhuBABPOz8l3RwJcS13t4pHP1dwitbv3.jpg', 'assets/documents/pS4Pww1mHSKF9St4l0su6eMlsy8MWd67qhc6l61T.pdf', 'assets/documents/gj0XijdeLbkjvu5B0LcTA46zXmtKXHhDjTWEPWbW.jpg', 3, '2023-05-18 00:54:32', '2023-05-21 17:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_akhir` double(8,4) NOT NULL DEFAULT 0.0000,
  `pengumuman` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `alternatif_id`, `nilai_akhir`, `pengumuman`, `created_at`, `updated_at`) VALUES
(1, 1, 4.7800, 'Lulus', '2023-05-18 15:21:52', '2023-05-28 01:15:12'),
(2, 2, 3.7400, 'Lulus', '2023-05-18 15:21:52', '2023-05-28 01:15:12'),
(3, 3, 3.7000, 'Lulus', '2023-05-18 15:21:52', '2023-05-28 01:15:12'),
(4, 4, 3.9200, 'Lulus', '2023-05-18 15:21:52', '2023-05-28 01:15:12'),
(5, 5, 3.5400, 'Lulus', '2023-05-18 15:21:52', '2023-06-05 21:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspek_id` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `jenis` enum('cf','sf') NOT NULL,
  `target` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `aspek_id`, `kode_kriteria`, `nama_kriteria`, `jenis`, `target`, `created_at`, `updated_at`) VALUES
(1, 1, 'K01', 'Jumlah Tenaga Kerja', 'cf', 4, '2023-05-18 03:33:38', '2023-05-18 03:33:38'),
(2, 1, 'K02', 'Modal Awal', 'cf', 4, '2023-05-18 03:36:23', '2023-05-18 03:41:31'),
(3, 1, 'K03', 'Lama Usaha', 'sf', 3, '2023-05-18 03:36:53', '2023-05-18 03:36:53'),
(4, 1, 'K04', 'Omset', 'sf', 3, '2023-05-18 03:37:19', '2023-05-18 03:37:19'),
(5, 2, 'C01', 'Character (Karakter)', 'cf', 4, '2023-05-18 03:38:29', '2023-05-18 03:38:29'),
(6, 2, 'C02', 'Capacity (Kapasitas)', 'cf', 4, '2023-05-18 03:38:58', '2023-05-18 03:38:58'),
(7, 2, 'C03', 'Capital (Modal )', 'cf', 3, '2023-05-18 03:39:41', '2023-05-18 03:39:41'),
(8, 2, 'C04', 'Collateral (Jaminan)', 'sf', 3, '2023-05-18 03:40:33', '2023-05-18 03:40:33'),
(9, 2, 'C05', 'Conditions (Kondisi)', 'sf', 3, '2023-05-18 03:41:18', '2023-05-18 14:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_19_154112_create_umkms_table', 1),
(6, '2023_02_22_200941_documents', 1),
(7, '2023_04_08_023614_create_table_aspek', 1),
(8, '2023_04_09_070345_create_kriteria_table', 1),
(9, '2023_04_09_074015_create_alternatif_table', 1),
(10, '2023_04_09_082107_create_subkriteria_table', 1),
(11, '2023_04_09_084001_create_penilaian_table', 1),
(12, '2023_04_09_084201_create_hasil_table', 1),
(13, '2023_04_13_073609_create_selisih_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `subkriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `alternatif_id`, `kriteria_id`, `subkriteria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2023-05-18 15:16:59', '2023-05-18 15:18:52'),
(2, 1, 2, 9, '2023-05-18 15:16:59', '2023-05-18 15:18:52'),
(3, 1, 3, 14, '2023-05-18 15:16:59', '2023-05-18 15:16:59'),
(4, 1, 4, 18, '2023-05-18 15:16:59', '2023-05-18 15:18:52'),
(5, 1, 5, 24, '2023-05-18 15:16:59', '2023-05-18 15:16:59'),
(6, 1, 6, 28, '2023-05-18 15:16:59', '2023-05-18 15:18:52'),
(7, 1, 7, 34, '2023-05-18 15:16:59', '2023-05-18 15:18:52'),
(8, 1, 8, 38, '2023-05-18 15:16:59', '2023-05-18 15:16:59'),
(9, 1, 9, 44, '2023-05-18 15:16:59', '2023-05-18 15:16:59'),
(10, 2, 1, 2, '2023-05-18 15:19:28', '2023-05-27 19:24:47'),
(11, 2, 2, 8, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(12, 2, 3, 14, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(13, 2, 4, 20, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(14, 2, 5, 21, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(15, 2, 6, 28, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(16, 2, 7, 34, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(17, 2, 8, 37, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(18, 2, 9, 44, '2023-05-18 15:19:28', '2023-05-18 15:19:28'),
(19, 3, 1, 3, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(20, 3, 2, 7, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(21, 3, 3, 14, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(22, 3, 4, 20, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(23, 3, 5, 22, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(24, 3, 6, 27, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(25, 3, 7, 31, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(26, 3, 8, 38, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(27, 3, 9, 44, '2023-05-18 15:19:54', '2023-05-18 15:19:54'),
(28, 4, 1, 4, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(29, 4, 2, 6, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(30, 4, 3, 12, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(31, 4, 4, 20, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(32, 4, 5, 23, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(33, 4, 6, 29, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(34, 4, 7, 31, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(35, 4, 8, 38, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(36, 4, 9, 43, '2023-05-18 15:20:19', '2023-05-18 15:20:19'),
(37, 5, 1, 3, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(38, 5, 2, 6, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(39, 5, 3, 15, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(40, 5, 4, 17, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(41, 5, 5, 23, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(42, 5, 6, 28, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(43, 5, 7, 31, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(44, 5, 8, 38, '2023-05-18 15:20:40', '2023-05-18 15:20:40'),
(45, 5, 9, 45, '2023-05-18 15:20:40', '2023-05-18 15:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selisih`
--

CREATE TABLE `selisih` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selisih` int(11) NOT NULL,
  `bobot` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selisih`
--

INSERT INTO `selisih` (`id`, `selisih`, `bobot`, `keterangan`) VALUES
(1, 0, 5, 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)'),
(2, 1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(3, -1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(4, 2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(5, -2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(6, 3, 2.5, 'Kompetensi individu kelebihan 3 tingkat'),
(7, -3, 2, 'Kompetensi individu kekurangan 3 tingkat'),
(8, 4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(9, -4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `nilai_bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama_subkriteria`, `nilai_bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sangat Kurang', 1, '2023-05-18 14:47:37', '2023-05-27 19:25:30'),
(2, 1, 'Kurang', 2, '2023-05-18 14:48:02', '2023-05-18 14:48:02'),
(3, 1, 'Cukup', 3, '2023-05-18 14:48:14', '2023-05-18 14:48:14'),
(4, 1, 'Baik', 4, '2023-05-18 14:48:27', '2023-05-18 14:48:27'),
(5, 1, 'Sangat Baik', 5, '2023-05-18 14:48:44', '2023-05-18 14:48:44'),
(6, 2, 'Sangat Kurang', 1, '2023-05-18 14:49:12', '2023-05-18 14:49:12'),
(7, 2, 'Kurang', 2, '2023-05-18 14:49:21', '2023-05-18 14:49:21'),
(8, 2, 'Cukup', 3, '2023-05-18 14:49:32', '2023-05-18 14:49:32'),
(9, 2, 'Baik', 4, '2023-05-18 14:49:43', '2023-05-18 14:49:43'),
(10, 2, 'Sangat Baik', 5, '2023-05-18 14:50:02', '2023-05-18 14:50:02'),
(11, 3, 'Sangat Kurang', 1, '2023-05-18 14:50:13', '2023-05-18 14:50:13'),
(12, 3, 'Kurang', 2, '2023-05-18 14:50:22', '2023-05-18 14:50:22'),
(13, 3, 'Cukup', 3, '2023-05-18 14:50:32', '2023-05-18 14:50:32'),
(14, 3, 'Baik', 4, '2023-05-18 14:51:04', '2023-05-18 14:51:04'),
(15, 3, 'Sangat Baik', 5, '2023-05-18 14:51:11', '2023-05-18 14:51:11'),
(16, 4, 'Sangat Kurang', 1, '2023-05-18 14:51:31', '2023-05-18 14:51:31'),
(17, 4, 'Kurang', 2, '2023-05-18 14:51:44', '2023-05-18 14:51:44'),
(18, 4, 'Cukup', 3, '2023-05-18 14:51:54', '2023-05-18 14:51:54'),
(19, 4, 'Baik', 4, '2023-05-18 14:52:01', '2023-05-18 14:52:01'),
(20, 4, 'Sangat Baik', 5, '2023-05-18 14:52:13', '2023-05-18 14:52:13'),
(21, 5, 'Sangat Kurang', 1, '2023-05-18 14:52:30', '2023-05-18 14:52:30'),
(22, 5, 'Kurang', 2, '2023-05-18 14:52:38', '2023-05-18 14:52:38'),
(23, 5, 'Cukup', 3, '2023-05-18 14:53:12', '2023-05-18 14:53:12'),
(24, 5, 'Baik', 4, '2023-05-18 14:53:24', '2023-05-18 14:53:24'),
(25, 5, 'Sangat Baik', 5, '2023-05-18 14:53:33', '2023-05-18 14:53:33'),
(26, 6, 'Sangat Kurang', 1, '2023-05-18 14:53:42', '2023-05-18 14:53:42'),
(27, 6, 'Kurang', 2, '2023-05-18 14:53:56', '2023-05-18 14:53:56'),
(28, 6, 'Cukup', 3, '2023-05-18 14:54:03', '2023-05-18 14:54:03'),
(29, 6, 'Baik', 4, '2023-05-18 14:54:13', '2023-05-18 14:54:13'),
(30, 6, 'Sangat Baik', 5, '2023-05-18 14:54:25', '2023-05-18 14:54:25'),
(31, 7, 'Sangat Kurang', 1, '2023-05-18 14:54:33', '2023-05-18 14:54:33'),
(32, 7, 'Kurang', 2, '2023-05-18 14:54:48', '2023-05-18 14:54:48'),
(33, 7, 'Cukup', 3, '2023-05-18 14:54:58', '2023-05-18 14:54:58'),
(34, 7, 'Baik', 4, '2023-05-18 14:55:07', '2023-05-18 14:55:07'),
(35, 7, 'Sangat Baik', 5, '2023-05-18 14:55:15', '2023-05-18 14:55:15'),
(36, 8, 'Sangat Kurang', 1, '2023-05-18 14:55:38', '2023-05-18 14:55:38'),
(37, 8, 'Kurang', 2, '2023-05-18 14:55:51', '2023-05-18 14:55:51'),
(38, 8, 'Cukup', 3, '2023-05-18 14:56:01', '2023-05-18 14:56:01'),
(39, 8, 'Baik', 4, '2023-05-18 14:56:20', '2023-05-18 14:56:20'),
(40, 8, 'Sangat Baik', 5, '2023-05-18 14:56:31', '2023-05-18 14:56:31'),
(41, 9, 'Sangat Kurang', 1, '2023-05-18 14:56:42', '2023-05-18 14:56:42'),
(42, 9, 'Kurang', 2, '2023-05-18 14:56:50', '2023-05-18 14:56:50'),
(43, 9, 'Cukup', 3, '2023-05-18 14:57:00', '2023-05-18 14:57:00'),
(44, 9, 'Baik', 4, '2023-05-18 14:57:07', '2023-05-18 14:57:07'),
(45, 9, 'Sangat Baik', 5, '2023-05-18 14:57:15', '2023-05-18 14:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `umkms`
--

CREATE TABLE `umkms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `nama_usaha` varchar(255) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nib` varchar(255) DEFAULT NULL,
  `nib_tahun` varchar(255) DEFAULT NULL,
  `pirt` varchar(255) DEFAULT NULL,
  `pirt_tahun` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `npwp_tahun` varchar(255) DEFAULT NULL,
  `halal` varchar(255) DEFAULT NULL,
  `halal_tahun` varchar(255) DEFAULT NULL,
  `haki` varchar(255) DEFAULT NULL,
  `haki_tahun` varchar(255) DEFAULT NULL,
  `modal` double DEFAULT NULL,
  `jumlah_karyawan` varchar(255) DEFAULT NULL,
  `jumlah_karyawan_pria` varchar(255) DEFAULT NULL,
  `jumlah_karyawan_wanita` varchar(255) DEFAULT NULL,
  `tanggal_mulai_usaha` date DEFAULT NULL,
  `lama_usaha` varchar(255) DEFAULT NULL,
  `omset_usaha` int(11) DEFAULT NULL,
  `jenis_kemitraan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `rt_rumah` varchar(255) DEFAULT NULL,
  `rw_rumah` varchar(255) DEFAULT NULL,
  `desa_rumah` varchar(255) DEFAULT NULL,
  `kecamatan_rumah` varchar(255) DEFAULT NULL,
  `kabupaten_rumah` varchar(255) DEFAULT NULL,
  `provinsi_rumah` varchar(255) DEFAULT NULL,
  `kode_pos_rumah` varchar(255) DEFAULT NULL,
  `koordinat_alamat_rumah` varchar(255) DEFAULT NULL,
  `alamat_usaha` varchar(255) DEFAULT NULL,
  `rt_usaha` varchar(255) DEFAULT NULL,
  `rw_usaha` varchar(255) DEFAULT NULL,
  `desa_usaha` varchar(255) DEFAULT NULL,
  `kecamatan_usaha` varchar(255) DEFAULT NULL,
  `kabupaten_usaha` varchar(255) DEFAULT NULL,
  `provinsi_usaha` varchar(255) DEFAULT NULL,
  `kode_pos_usaha` varchar(255) DEFAULT NULL,
  `koordinat_alamat_usaha` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umkms`
--

INSERT INTO `umkms` (`id`, `users_id`, `nama_pemilik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `kewarganegaraan`, `nama_usaha`, `jenis_usaha`, `kecamatan`, `nik`, `nib`, `nib_tahun`, `pirt`, `pirt_tahun`, `npwp`, `npwp_tahun`, `halal`, `halal_tahun`, `haki`, `haki_tahun`, `modal`, `jumlah_karyawan`, `jumlah_karyawan_pria`, `jumlah_karyawan_wanita`, `tanggal_mulai_usaha`, `lama_usaha`, `omset_usaha`, `jenis_kemitraan`, `email`, `no_hp`, `alamat_rumah`, `rt_rumah`, `rw_rumah`, `desa_rumah`, `kecamatan_rumah`, `kabupaten_rumah`, `provinsi_rumah`, `kode_pos_rumah`, `koordinat_alamat_rumah`, `alamat_usaha`, `rt_usaha`, `rw_usaha`, `desa_usaha`, `kecamatan_usaha`, `kabupaten_usaha`, `provinsi_usaha`, `kode_pos_usaha`, `koordinat_alamat_usaha`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Abdul Rahman', 'Jayapura', '2001-09-12', 'Laki-laki', 'Islam', 'WNI', 'PT Sejahtera', 'Menjual Mobil Bekas', 'BANTIMURUNG', '7312042510720002', '9120000792674', '22 Maret 2023', '2103203011559-24', '14 Februari 2023', '09.254.294.3-407.000', '10 Oktober 2023', '51220000016050420', '1 September 2020', 'EC00201823258', '8 Agustus 2018', 2000000000, '16 Orang', '10 Orang', '6 Orang', '2023-05-17', '5 Tahun', 1200000000, 'Pendampingan', 'abdulrahmann012@gmail.com', '085375555802', 'Dusun Pakalli', '01', '04', 'Alataengae', 'Bantimurung', 'Maros', 'Sulawesi Selatan', '90561', NULL, 'Jl Boulevard', '04', '06', 'Masale', 'Panakukang', 'Makassar', 'Sulawesi Selatan', '90432', NULL, 'assets/UserFoto/mMfyhCOo58aat66T7xpDF9aVLEh2RbwEKfAQiKZF.png', 3, '2023-05-17 17:01:54', '2023-05-18 17:34:47'),
(2, 5, 'Abdul Rahim', 'Jayapura', '2023-05-10', 'Laki-laki', 'Islam', 'WNI', 'PT Mulia Jaya', 'Menjual Air Mineral', 'TURIKALE', '7312042510720002', '9120000792674', '22 Maret 2023', '2103203011559-24', '14 Februari 2023', '09.254.294.3-407.000', '10 Oktober 2023', '51220000016050420', '1 September 2020', 'EC00201823258', '8 Agustus 2018', 200000000, '13 Orang', '3 Orang', '10 orang', '2023-05-02', '3 Tahun', 5000000, 'Pelatihan', 'rahim@gmail.com', '081344646478', 'Jln. Poros Bantimurung No.3, Dusun Pakalli, Desa Alatengae, Kec. Bantimurung', '03', '05', 'Alataengae', 'Bantimurung', 'Maros', 'Sulawesi Selatan', '90561', NULL, 'Jln. Poros Maros Makassar (Batangase) No.03, Kel Bontoa, Kec. Mandai', '05', '06', 'Bontoa', 'Mandai', 'Mandai', 'Sulawesi Selatan', '90531', NULL, 'assets/UserFoto/dWjxGl9jqDeyNeatkUIqXkqU3BQcr9HfXDnraNVz.jpg', 3, '2023-05-17 17:23:02', '2023-05-21 17:26:56'),
(3, 6, 'Fakhri Qardhwi', 'Luwu TImur', '2001-02-21', 'Laki-laki', 'Islam', 'WNI', 'CV Abadi Jaya', 'Penjual Nasi Goreng', 'MARUSU', '91710212000999003', '9120000792674', '22 Maret 2023', '2103203011559-24', '14 Februari 2023', '09.254.294.3-407.000', '10 Oktober 2023', '51220000016050420', '1 September 2020', 'EC00201823258', '8 Agustus 2018', 41200000000, '5 Orang', '3 Orang', '2 Orang', '2010-05-11', '7 Tahun', 56000000, 'Pendampingan', 'fakhri@gmail.com', '085375555802', 'Jln Poros Masale, No.04, Kel Tanateko, Kec. Marusu', '04', '02', 'Taneteko', 'Marusu', 'Maros', 'Sulawesi Selatan', '905324', NULL, 'Jln. Poros Mandai Maros (Batangase) No.03, Kel Bontoa, Kec. Mandai', '04', '06', 'Bontoa', 'Masale', 'Makassar', 'Sulawesi Selatan', '90643', NULL, 'assets/UserFoto/sn27KZ1hPqCrZK1VMOg8NEat91LPYYD0TwNsx1nm.jpg', 3, '2023-05-17 21:18:48', '2023-05-21 17:26:59'),
(4, 7, 'Muh Abi Hidayat', 'Jeneponto', '2001-05-16', 'Laki-laki', 'Islam', 'WNI', 'CV Sinar Jaya', 'Mencuci Motor', 'SIMBANG', '7312042510720002', '9120000792674', '22 Maret 2023', '2103203011559-24', '14 Februari 2023', '09.254.294.3-407.000', '10 Oktober 2023', '51220000016050420', '1 September 2020', 'EC00201823258', '8 Agustus 2018', 50000000, '7 Orang', '2 Orang', '5 Orang', '2023-05-09', '2 Tahun', 4500000, 'Hibah', 'abi@gmail.com', '081344656578', 'Jl. Sungai Kelara', '03', '02', 'Jenetesa', 'Marusu', 'Jeneponto', 'Sulawesi Selatan', '90321', NULL, 'Jln. Maccini Raya Makassar No.03, Kel Masale, Kec. Boulverd', '05', '04', 'Masale', 'Boulevrad', 'Makassar', 'Sulawesi Selatan', '90543', NULL, 'assets/UserFoto/PPjbzoJxKfcjEeF8Y7rQ7CMInUxC93Wqhb3OsMhs.jpg', 3, '2023-05-18 00:24:10', '2023-05-21 17:27:03'),
(5, 8, 'Wawan Kurniawan', 'Jayapura', '2002-05-14', 'Laki-laki', 'Islam', 'WNI', 'PT Batu Jaya', 'Menjual Batu Bata', 'MANDAI', '91710212000999003', '9120000792675', '22 Maret 2023', '2103203011559-24', '14 Februari 2023', '09.224.294.3-217.000', '10 Oktober 2023', '51220000016050422', '1 September 2020', 'EC00201823258', '8 Agustus 2018', 5400000, '3 Orang', '2 Orang', '1 Orang', '2023-05-02', '1 Bulan', 18000000, 'Pendampingan', 'wawan@gmail.com', '085344676789', 'Jln Poros Soppeng, Kel Ujung Pandang, Kec. Mandai', '04', '06', 'Ujung Pandang', 'Mandai', 'Soppeng', 'Sulawesi Selatan', '90567', NULL, 'Jl. Poros Antang Raya, Kel Antang, Kec. Ujung', '04', '05', 'Antang Raya', 'Gowa', 'Makassar', 'Sulawesi Selatan', '90345', NULL, 'assets/UserFoto/fztcE37m9m3qPdZApWXZgL90jQSuQ5MzWb1KStcg.jpg', 3, '2023-05-18 00:38:04', '2023-05-21 17:27:07'),
(9, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BANTIMURUNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/UserFoto/98ZlKDCq0V2cB7dmyWaLV9b1RsvrAL98tvwZ0PzN.png', 1, '2023-05-20 05:00:12', '2023-05-22 03:17:06'),
(11, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BANTIMURUNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/UserFoto/dAUUY3febsvShFozayvdwOQAhemj0vebgSCYqOZr.png', 1, '2023-05-22 05:53:31', '2023-05-22 05:53:43'),
(12, 18, 'abdul rahman', 'jayapura', '2023-05-25', NULL, NULL, NULL, 'Pt berau', 'memasak', 'BONTOA', '92039339393', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/UserFoto/jkQO9bSFOtgrjs1zkzJuqu1oc6gv8tVGWf2azxXc.png', 1, '2023-05-22 05:57:21', '2023-06-05 21:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `profile_image` varchar(225) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `role`, `profile_image`, `nama`, `jabatan`, `nip`, `created_at`, `updated_at`) VALUES
(1, 'adminumkmmaros_01', '$2y$10$DzA.PqHEl34gAGDiP0vgz.xyNNeCVSF1z5iG2G/UxQhWOpugfcbiK', NULL, 2, 'assets/UserFoto/1686024530.png', NULL, NULL, NULL, '2023-05-17 10:01:17', NULL),
(2, 'adminumkmmaros_02', '$2y$10$8DBETfPRUybR095FZ0cyoOKs4HmOZ82o6g7LTxFKQnbhzW/s.lB1y', NULL, 2, 'assets/UserFoto/1684843111.png', NULL, NULL, NULL, '2023-05-17 10:01:17', NULL),
(3, 'user', '$2y$10$kFI/x.vj08BMJPazHWrafukgzNlXUKwXNKn/64zOPcOCW87aq1gT.', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 10:01:17', NULL),
(4, 'rahman1', '$2y$10$DzA.PqHEl34gAGDiP0vgz.xyNNeCVSF1z5iG2G/UxQhWOpugfcbiK', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:50:17', '2023-05-17 16:50:17'),
(5, 'rahman2', '$2y$10$sKtHYHM43jXIYwaa8HtRmOeDFT4rcleJUdhRboSJ4b3KhfyeAEyRO', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:50:44', '2023-05-17 16:50:44'),
(6, 'rahman3', '$2y$10$bHMKQd2ANerp0ILLY6ISCeVhUsvHBmZ.eCMb8O.ptVlG7Q/zP0b9m', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:51:09', '2023-05-17 16:51:09'),
(7, 'rahman4', '$2y$10$81Ws87x8cHlpvc9IyQvhP.wLy3ncjjMhhdRvIwUiSnTydVnxTUYAW', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:51:39', '2023-05-17 16:51:39'),
(8, 'rahman5', '$2y$10$Rdvh3kDQaS/mqJFAPHmiAO/0x8DXAwMIA7zcAnXagk811vh4qi4Sa', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:52:10', '2023-05-17 16:52:10'),
(9, 'rahman6', '$2y$10$ieXviKrhG7ez4IaMNMdtTukSRan..82xFzKpuNX4cjUGYiLF5Lqsy', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:52:45', '2023-05-17 16:52:45'),
(10, 'rahman7', '$2y$10$Nt2SwOrSaz4c4yLPXbC7Eu.hSNoWAomKUNRgEb8LGIeMvmyZLPD8q', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-17 16:53:12', '2023-05-17 16:53:12'),
(11, 'ray', '$2y$10$DzA.PqHEl34gAGDiP0vgz.xyNNeCVSF1z5iG2G/UxQhWOpugfcbiK', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'ray2', '$2y$10$bQGMR0CFIKe/VKEUrIdv1eksrUowV5Q/RTM30eIdMNyO4qEbqBV5u', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-20 02:56:21', '2023-05-20 02:56:21'),
(16, 'rahman99', '$2y$10$Q.a5EKI0P4CmE9NHEhK9GOUY9A6HvxATI3m/LdXGfjhGJyp0i.RkO', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-22 05:42:18', '2023-05-22 05:42:18'),
(17, 'rahman12', '$2y$10$eQwvU0QSj0nEVdSJkHmSm.JP32fw4IqekKXEW16B51cv.wZVGomsu', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-22 05:45:25', '2023-05-22 05:45:25'),
(18, 'rahman13', '$2y$10$ggGqi8/Vx7IsZXhhwyXd2elSImDhruLUgAen91Fxwrw80CRvfWFHm', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-22 05:56:39', '2023-05-22 05:56:39'),
(20, 'rahman16', '$2y$10$jfw6Dw2qex7ilzWnhRRpWu3Q20zimJYXFbDWoJa.I/.KGm8NIhmAO', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-22 18:04:49', '2023-05-22 18:04:49'),
(21, 'rahman20', '$2y$10$3T31zeXqNBE/nLvX6G09EOmMMPt8urtuhZPBksNGFkK6XeA8N6Xfq', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-23 07:22:45', '2023-05-23 07:22:45'),
(24, 'adminumkmmaros_05', '$2y$10$rjN5gHLCYlKCGP8r1MdgNe1beB4yNH54TPiU8zLsFbAsYS2sXJJby', NULL, 2, 'assets/UserFoto/1685260166.png', NULL, NULL, NULL, NULL, NULL),
(25, 'rahman21', '$2y$10$lxbnh2EJbNScRwfYkHO61.PA0GABfGdVHLnZe6GYDBJ2a49YIUKxy', NULL, 1, NULL, NULL, NULL, NULL, '2023-05-27 18:56:49', '2023-05-27 18:56:49'),
(27, 'rahmanji', '$2y$10$gxyMMlACF2H8hPFsLJtyp.5z9ZcVLd41MV3FyiEhNCyoebh9ad.bG', NULL, 2, 'img/avatar.png', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_umkms_id_foreign` (`umkms_id`);

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_umkms_id_foreign` (`umkms_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_alternatif_id_foreign` (`alternatif_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_aspek_id_foreign` (`aspek_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `penilaian_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `penilaian_subkriteria_id_foreign` (`subkriteria_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `selisih`
--
ALTER TABLE `selisih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriteria_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `umkms`
--
ALTER TABLE `umkms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umkms_users_id_foreign` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selisih`
--
ALTER TABLE `selisih`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `umkms`
--
ALTER TABLE `umkms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_umkms_id_foreign` FOREIGN KEY (`umkms_id`) REFERENCES `umkms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_umkms_id_foreign` FOREIGN KEY (`umkms_id`) REFERENCES `umkms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_aspek_id_foreign` FOREIGN KEY (`aspek_id`) REFERENCES `aspek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriteria` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `umkms`
--
ALTER TABLE `umkms`
  ADD CONSTRAINT `umkms_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
