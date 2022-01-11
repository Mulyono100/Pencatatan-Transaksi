-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 09:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master-kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_keluar` varchar(50) NOT NULL,
  `pegawai_id` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `totalbeli` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`id`, `tanggal`, `kode_masuk`, `suplier_id`, `totalbeli`, `subtotal`, `created_at`, `updated_at`) VALUES
(118, '2021-07-05', 'MK-0000001', 4, 0, 4000, '2021-07-05 06:28:25', '2021-07-05 06:28:25'),
(119, '2021-07-05', 'MK-0000002', 3, 3, 5000, '2021-07-05 06:45:12', '2021-07-05 06:45:12'),
(120, '2021-07-08', 'MK-0000003', 4, 3, 4000, '2021-07-07 19:40:50', '2021-07-07 19:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(30) UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoribarang_id` int(10) NOT NULL,
  `harga` double DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kode`, `nama`, `kategoribarang_id`, `harga`, `stock`, `satuan`, `created_at`, `updated_at`) VALUES
(11, 'M001', 'Sabun Sunlight', 98938961, 2000, 2, 'pcs', '2021-07-05 06:24:00', '2021-07-05 06:24:00'),
(12, 'M002', 'Nabati', 98938959, 2000, 2, 'pcs', '2021-07-05 06:25:50', '2021-07-05 06:25:50'),
(13, 'M003', 'Kapal Api', 98938960, 1000, 5, 'sachet', '2021-07-05 06:26:15', '2021-07-05 06:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `id` int(11) NOT NULL,
  `kode_masuk` varchar(26) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id`, `kode_masuk`, `created_at`, `updated_at`) VALUES
(324, 'INV-000001', '2021-06-03 07:39:35', '2021-06-03 07:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `cobas`
--

CREATE TABLE `cobas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cobas`
--

INSERT INTO `cobas` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'b.indonesia\r\n', NULL, NULL),
(2, '', '2021-05-16 01:52:45', '2021-05-16 01:52:45'),
(3, '', '2021-05-16 01:52:48', '2021-05-16 01:52:48'),
(4, 'ff', '2021-05-16 02:26:35', '2021-05-16 02:26:35'),
(5, 'dd2', '2021-05-16 02:28:58', '2021-05-16 02:28:58'),
(6, 'gedang', '2021-05-16 02:29:09', '2021-05-16 02:29:09'),
(7, 'gedangg', '2021-05-16 02:29:20', '2021-05-16 02:29:20'),
(8, 'buahh,melon', '2021-05-16 02:29:37', '2021-05-16 02:29:37'),
(9, 'intan,sukma', '2021-05-17 22:51:02', '2021-05-17 22:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `detailmasuk`
--

CREATE TABLE `detailmasuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `barangmasuk_id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailmasuk`
--

INSERT INTO `detailmasuk` (`id`, `tanggal`, `barangmasuk_id`, `suplier_id`, `barang_id`, `harga_barang`, `jumlah_beli`, `total_harga`, `subtotal`, `bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(148, '2021-07-05', 118, 4, 12, 2000, 1, 2000, 4000, 6000, 2000, '2021-07-05 06:28:25', '2021-07-05 06:28:25'),
(149, '2021-07-05', 118, 4, 13, 1000, 2, 2000, 4000, 6000, 2000, '2021-07-05 06:28:25', '2021-07-05 06:28:25'),
(150, '2021-07-05', 119, 3, 11, 2000, 2, 4000, 5000, 6000, 1000, '2021-07-05 06:45:12', '2021-07-05 06:45:12'),
(151, '2021-07-05', 119, 3, 13, 1000, 1, 1000, 5000, 6000, 1000, '2021-07-05 06:45:12', '2021-07-05 06:45:12'),
(152, '2021-07-08', 120, 4, 12, 2000, 1, 2000, 4000, 6000, 2000, '2021-07-07 19:40:50', '2021-07-07 19:40:50'),
(153, '2021-07-08', 120, 4, 13, 1000, 2, 2000, 4000, 6000, 2000, '2021-07-07 19:40:50', '2021-07-07 19:40:50');

--
-- Triggers `detailmasuk`
--
DELIMITER $$
CREATE TRIGGER `barangmasuk` AFTER INSERT ON `detailmasuk` FOR EACH ROW BEGIN
UPDATE barangs set stock=stock+NEW.jumlah_beli
WHERE id=NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksis`
--

CREATE TABLE `detailtransaksis` (
  `id` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `transaksi_id` int(11) UNSIGNED DEFAULT NULL,
  `barang_id` int(10) NOT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `total_beli` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtransaksis`
--

INSERT INTO `detailtransaksis` (`id`, `tanggal`, `transaksi_id`, `barang_id`, `harga_barang`, `total_beli`, `subtotal`, `bayar`, `kembalian`, `total_harga`, `created_at`, `updated_at`) VALUES
(437, '2021-07-08', 374, 12, 2000, 2, 4000, 10000, 1000, 9000, '2021-07-07 19:41:43', '2021-07-07 19:41:43'),
(438, '2021-07-08', 374, 13, 1000, 5, 5000, 10000, 1000, 9000, '2021-07-07 19:41:43', '2021-07-07 19:41:43'),
(439, '2021-07-14', 376, 12, 2000, 1, 2000, 6000, 2000, 4000, '2021-07-14 00:01:53', '2021-07-14 00:01:53'),
(440, '2021-07-14', 376, 13, 1000, 2, 2000, 6000, 2000, 4000, '2021-07-14 00:01:53', '2021-07-14 00:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribarangs`
--

CREATE TABLE `kategoribarangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoribarangs`
--

INSERT INTO `kategoribarangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(98938959, 'snack', NULL, NULL),
(98938960, 'Coffea', NULL, NULL),
(98938961, 'Sabun', NULL, NULL),
(98938962, 'Candy\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_30_131708_create_supliers_table', 2),
(4, '2021_05_01_071600_create_kategoribarangs_table', 3),
(8, '2021_05_01_073837_create_barangs_table', 4),
(9, '2021_05_16_053203_create_cobas_table', 5),
(10, '2021_05_30_054314_create_transaksi_table', 6),
(11, '2021_06_05_130639_create_detailtransaksis_table', 7),
(12, '2021_06_07_130442_create_detailmasuks_table', 8),
(13, '2021_06_13_140258_create_barangmasuks_table', 9),
(14, '2021_06_13_140824_create_detailmasuks_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone` int(12) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `email`, `handphone`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'deanna.schimmell', 'hkunde@gmail.com', 942, '3397 Delilah Garden\r\nEast Jeromemouth, NJ 53744', '2021-04-30 06:50:11', '2021-06-15 06:13:23'),
(3, 'ulices94', 'astrid48@brown.info', 994, '490 Izaiah Turnpike Apt. 993\nLake Shaina, VT 30525-9153', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(4, 'jamar.franecki', 'garry.vonrueden@powlowski.com', 902, '5005 Ledner Meadows Apt. 595\nMuellerborough, RI 34756', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(5, 'wilderman.elmo', 'jackie.ritchie@bednar.biz', 910, '605 Nikolaus Falls Suite 490\nRenemouth, CA 31887-9872', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(6, 'deshawn25', 'verdman@gmail.com', 942, '6411 Nader Port Apt. 285\nNew Myleschester, AL 23728-7379', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(7, 'suzanne09', 'spencer.cynthia@hotmail.com', 969, '840 Nitzsche Islands Suite 378\nPort Stephanyland, OR 22046', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(42, 'miles43', 'martin.schmeler@ankunding.com', 33457, '211 Odell Ford\nLake Burdette, MD 96092-7180', '2021-04-30 06:42:33', '2021-04-30 06:42:33'),
(56, 'tharber', 'conrad30@sipes.info', 952, '1825 Raheem Route\nAutumnbury, GA 70881', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(58, 'clabadie', 'bruce90@gmail.com', 921, '676 Will Run\nMetzmouth, SC 99275', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(59, 'dach.tillman', 'rylan.cruickshank@gmail.com', 919, '716 Mueller Bridge\nKaceyside, ID 58294-2893', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(63, 'talia.kunze', 'gweissnat@hotmail.com', 993, '122 Mckayla Parkways Suite 723\nWest Frances, VT 47485', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(66, 'cathy.rowe', 'sosinski@gmail.com', 985, '6543 Schaefer Heights\nNorth Mandy, IN 27561-0146', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(67, 'oberbrunner.jayne', 'onikolaus@hotmail.com', 970, '7021 Emard Ports Apt. 090\nBotsfordbury, NM 50498', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(68, 'elza.sawayn', 'torp.tristin@schiller.com', 977, '35233 Aglae Street\nMohrland, ND 17073-9738', '2021-04-30 06:50:11', '2021-04-30 06:50:11'),
(70, 'katharina.dickens', 'reginald.ohara@hodkiewicz.com', 924, '707 Hilpert Terrace Suite 451\nBorerport, OK 15008-8031', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(72, 'alysson65', 'dickens.allie@hotmail.com', 946, '81710 O\'Keefe Radial Suite 204\nHahnland, KS 39772', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(75, 'rhianna.mann', 'reynold00@reichel.com', 907, '4249 Minnie Lodge\nMarinaton, OK 47069-7408', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(76, 'hope84', 'elvis.daugherty@bechtelar.com', 903, '9184 Lester Drives Suite 050\nThurmanland, NJ 72617', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(99, 'selena.fahey', 'bartoletti.aaron@kovacek.com', 965, '73692 Barton Village Apt. 435\nBartolettifort, MD 15059-5612', '2021-04-30 06:49:42', '2021-04-30 06:49:42'),
(2195803, 'elinor.yundt', 'dboyle@gmail.com', 959, '679 Delia Keys Suite 702\nNorth Angelaport, NV 80285-2179', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(3215586, 'sarina.bosco', 'akirlin@okon.info', 999, '5531 Smitham Underpass\nPowlowskiborough, MN 20185', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(3574379, 'samantha.witting', 'cturner@hotmail.com', 997, '128 Reba Brook Suite 203\nNorth Aurelie, KS 34380-1464', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(4375784, 'tromp.gilberto', 'von.alysa@herzog.com', 918, '7188 Lennie Trail Suite 529\nPort Talia, AZ 78825', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(5667857, 'ryan.gillian', 'aliya.bartell@runte.com', 984, '791 Antwon Mountain\nHeathcoteburgh, CO 89058', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(6539443, 'marcos.rohan', 'cohara@johnston.biz', 967, '9362 Cathryn Rest\nKunzestad, ND 53384-5613', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(6887407, 'kathleen94', 'ikoss@gmail.com', 969, '7478 Margarita Ports\nNorth Kieran, DC 95497', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(7630835, 'katelyn.ferry', 'braun.wallace@hotmail.com', 996, '59557 Hessel Mission\nLeopoldomouth, IL 64269', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(7884924, 'cleveland.hyatt', 'otha.von@yahoo.com', 971, '593 Milton Knolls\nKlockoberg, IA 09429-5147', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(9264328, 'howell88', 'padams@miller.com', 974, '9375 Stiedemann Courts\nWest Kitty, CT 91366', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(9815643, 'xbrekke', 'okuneva.ivory@hermiston.com', 960, '635 Penelope Underpass\nMariehaven, ME 26991', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(11704522, 'shyatt', 'otha10@hodkiewicz.com', 913, '70127 Nitzsche Island Apt. 776\nNorwoodland, OR 16009-1516', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(12224371, 'eichmann.parker', 'lillian.wuckert@yahoo.com', 981, '4088 Oleta Forest\nDoylechester, SD 73969', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(12551620, 'eyost', 'wpowlowski@gmail.com', 966, '29296 Brennon Squares\nLeonoraburgh, NV 20141', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(12658237, 'toy.cortney', 'brooklyn.prohaska@gmail.com', 999, '803 Thompson Union Apt. 166\nPort Tyler, KY 69384', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(13425197, 'mabernathy', 'deonte.littel@hotmail.com', 995, '669 Jace Lake\nFarrellland, FL 80453-0878', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(15028082, 'micaela.corwin', 'ona.greenholt@strosin.net', 981, '88127 Elsa Underpass Apt. 164\nAdamsborough, NY 90742-6604', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(16624139, 'gkuhn', 'brielle.grant@wuckert.com', 914, '22933 Savannah Inlet Apt. 620\nMartashire, HI 71454', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(17705677, 'kuphal.raquel', 'violet.powlowski@huels.com', 934, '8886 Ryan Valleys\nLake Dianna, FL 88279', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(19015040, 'keegan.okeefe', 'susan82@anderson.org', 894, '4876 Keith Bridge Apt. 976\nLake Cathrineland, NM 10670-1517', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(19719924, 'missouri59', 'ohara.lauryn@hotmail.com', 915, '881 Marina Ridges Apt. 484\nDarionview, ME 56437', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(20931599, 'kerluke.fletcher', 'devonte.bahringer@gaylord.net', 967, '2220 Izaiah Port\nWest Jacksonchester, NJ 53797', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(21040436, 'august.batz', 'terry.meda@hotmail.com', 941, '904 Corwin Trail\nWest Kevinport, NH 29330-2481', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(23808188, 'elton00', 'jackie.muller@hotmail.com', 957, '62174 Abshire Place\nBrandynview, PA 95741-8806', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(24104951, 'sklein', 'alaina.jast@schinner.com', 936, '5658 Breitenberg Path Apt. 158\nAlphonsostad, UT 75016', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(24108348, 'dokon', 'mathilde98@farrell.com', 990, '36596 Bruce Turnpike\nJonatanstad, IA 49540-9463', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(24707237, 'giles33', 'hreynolds@borer.com', 911, '4967 Ashtyn Cliff Suite 189\nPort Danaport, IL 03126-0040', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(25668759, 'consuelo94', 'bupton@yahoo.com', 937, '759 Rice Glens\nWhitemouth, HI 65716', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(26722177, 'will.gus', 'dawn.lueilwitz@swift.com', 929, '8971 Titus Fork Apt. 630\nSouth Keenanville, HI 40593', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(27097427, 'rowland.heller', 'uspencer@yahoo.com', 998, '2311 Vivien Curve Suite 356\nLake Asafort, GA 98136-4369', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(30474192, 'kub.dameon', 'santino.ohara@gmail.com', 984, '43380 Larkin Keys\nHertamouth, SD 78245-6848', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(30765511, 'alvina.abernathy', 'golson@yahoo.com', 956, '10380 Jedidiah Mountain Apt. 292\nRueckerhaven, ND 51310', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(31795760, 'okeefe.mark', 'preston15@yahoo.com', 941, '352 Armstrong Crest Apt. 759\nNew Urielmouth, TN 13779-5674', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(32429176, 'qlebsack', 'runolfsson.lauretta@yahoo.com', 894, '60959 Cronin Unions Suite 016\nBlickchester, WI 64712', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(32899962, 'jarrod.grant', 'kozey.carli@williamson.biz', 982, '38977 Alexanne Gardens Suite 383\nKeeleyhaven, GA 05935', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(34236352, 'coy62', 'kianna.volkman@reinger.com', 933, '39462 Pouros Divide Suite 147\nNorth Alessandraborough, MD 51450-9209', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(35991410, 'hauck.freddy', 'kirstin26@mann.info', 995, '7202 Deion Junctions\nLake Amira, ND 80406-1072', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(37496135, 'ursula52', 'hbradtke@durgan.net', 982, '61110 Klocko Fork Apt. 489\nNorth Gerald, NH 71174', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(40606422, 'eweimann', 'igottlieb@ondricka.com', 962, '715 Hirthe Mews\nHandfort, KS 38957-8893', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(40706795, 'kulas.dennis', 'remington.feest@yahoo.com', 982, '416 Donato Vista Suite 667\nTillmanfort, MA 94668', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(42131472, 'boconner', 'eparisian@weber.com', 951, '16220 Roma Throughway\nMoenbury, FL 32414-7161', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(42805755, 'geovany42', 'retta03@kihn.com', 946, '37007 Mitchell Mountain Apt. 614\nNorth Wilford, VA 92870', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(43366644, 'wroberts', 'cschulist@yahoo.com', 994, '646 Manuel Parks Suite 095\nPort Ginoport, MS 97932-4041', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(44211929, 'odare', 'maynard.funk@hotmail.com', 964, '3946 Harvey Creek Suite 129\nBashirianstad, IA 96570-5837', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(47027527, 'imonahan', 'jacobs.leatha@yahoo.com', 990, '533 Lisette Wells\nEast Janaefurt, CA 37448', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(47876217, 'jackeline61', 'wfadel@corkery.org', 917, '63954 Botsford Mountain Suite 522\nJasontown, PA 53924', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(50268115, 'gislason.katheryn', 'rrohan@hotmail.com', 980, '627 Luigi Turnpike Apt. 461\nAdolphusland, MO 67967-8530', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(50998999, 'iroberts', 'ihagenes@cartwright.org', 978, '43648 Angelita Wall\nLake Carmelaview, TN 88945-8449', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(54045156, 'mlegros', 'ullrich.eugenia@barton.com', 915, '243 Marquardt Key\nFeilfort, MS 23230', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(54089846, 'ahintz', 'fpadberg@gmail.com', 901, '932 Mckenna Club Suite 276\nNorth Thelmastad, NV 55415', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(54857681, 'cmueller', 'henderson.ullrich@hotmail.com', 972, '8266 Walter Prairie\nMartaville, DE 50542-0837', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(55326384, 'dakota.jacobs', 'heller.camryn@barton.com', 995, '81080 Jerrold Parkway Suite 675\nKautzerfurt, ND 95072-6383', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(57733265, 'brenna.gaylord', 'nienow.donald@hotmail.com', 913, '9263 Hodkiewicz Gateway Suite 866\nWisozkside, LA 99426', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(58257241, 'herman11', 'lacey.rice@hotmail.com', 897, '407 Crooks Summit Apt. 264\nCorinehaven, MS 43144-3371', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(59739241, 'dconn', 'oliver.renner@baumbach.com', 981, '7872 Margie Turnpike\nDelphafurt, CT 83722', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(60486332, 'nbergstrom', 'astamm@gmail.com', 928, '62835 Hahn Drive\nNorth Vickie, DE 68089', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(60844088, 'adrain.glover', 'hailey56@friesen.net', 954, '8124 Henriette Pike Suite 854\nLowemouth, MO 50744-6442', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(62654586, 'thilpert', 'anastasia.grimes@bauch.biz', 930, '352 Bernier Freeway Suite 736\nNorth Sheamouth, ID 18169-3393', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(63217506, 'elfrieda80', 'stephanie42@hotmail.com', 935, '554 Cullen Squares\nWest Terrillland, WV 84155', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(63371871, 'murazik.dianna', 'myrl07@hamill.biz', 928, '915 O\'Reilly Glens\nGabrielside, NH 37379', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(65926468, 'sage.bergstrom', 'jast.cleo@hotmail.com', 932, '56878 Alvah Ridges Apt. 676\nWaynebury, HI 91324', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(66892786, 'cordia57', 'alexa.cole@will.biz', 1000, '812 Weber Squares\nChaimside, TN 28265-8711', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(66991311, 'luella15', 'hauck.shannon@gmail.com', 971, '47477 Alda Village\nHicklemouth, WY 99885-6896', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(67603923, 'abigail32', 'nlueilwitz@yahoo.com', 909, '89982 Flo Dam\nPort Nasirborough, VT 22480-2312', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(71335087, 'glover.florian', 'jones.bo@yahoo.com', 987, '8742 Schulist Cliffs Suite 250\nNew Jamaal, NH 49695', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(71453811, 'johnson10', 'doyle.josianne@veum.org', 922, '155 Balistreri Bypass Apt. 397\nNew Alizeville, VA 39021', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(72824337, 'davion.zemlak', 'marvin.macey@schuster.com', 935, '5501 Schaden Glen Apt. 611\nPort Mariahton, KS 36528', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(72825693, 'mwaelchi', 'dare.retha@gmail.com', 905, '2399 Hegmann Divide Apt. 527\nKennithmouth, NV 92498', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(73689522, 'alva68', 'bruen.harrison@zemlak.com', 935, '1566 Kole Way\nEast Avischester, AZ 16150', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(74581573, 'brekke.delfina', 'bhalvorson@beer.com', 897, '79485 Beatty Junction Suite 097\nPort Rita, FL 22960-4802', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(74943067, 'jacky75', 'ogreen@yahoo.com', 983, '63276 Bartoletti Ridges\nWest Alveraville, NE 40480', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(75710323, 'rae63', 'schultz.presley@yahoo.com', 902, '73404 Jacobson Ranch\nNew Malachiville, HI 22516', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(76060069, 'ukovacek', 'melvin.quigley@hotmail.com', 924, '636 Mona Creek\nWest Alexander, ME 96990', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(76635878, 'elouise.zemlak', 'bergnaum.kylee@yahoo.com', 926, '7542 Reinger Greens\nBuckridgeshire, KY 83601-8918', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(77552938, 'owunsch', 'beryl03@gmail.com', 947, '2625 Feeney Wall\nIdellachester, OK 12536', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(77976086, 'nrunolfsson', 'lubowitz.lonie@mccullough.biz', 979, '67885 Ankunding Views\nEast Myrlside, DC 66178', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(78257580, 'adell39', 'ywalker@stracke.info', 935, '6629 Moore Row Suite 622\nRohanside, LA 19301-1043', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(79199278, 'monahan.mason', 'bhegmann@yahoo.com', 977, '439 Zachariah Estates\nIsaacmouth, DE 40956', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(80394495, 'fmayer', 'ifeil@muller.com', 935, '21910 Marjory Walk Apt. 636\nHaleighberg, NV 22904', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(82329914, 'cmitchell', 'diego35@yahoo.com', 953, '93289 Angie Mission Apt. 640\nGillianshire, VA 98848', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(85139985, 'knikolaus', 'keyshawn04@greenfelder.com', 890, '325 Hills Course\nWest Marionburgh, TX 58574', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(85389540, 'vern.wolf', 'cschmitt@luettgen.com', 989, '34888 Christiansen Mount\nNew Alexieberg, CT 70943-0719', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(87689303, 'alexandre86', 'zoconnell@yahoo.com', 953, '93685 Bergnaum Ferry\nJaskolskitown, NH 31120', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(88380704, 'jany.buckridge', 'zetta60@armstrong.com', 908, '4996 Lacey Village\nSpencerbury, DC 02354-6446', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(88549262, 'jayson24', 'kilback.nyasia@gmail.com', 971, '21948 Adams Garden Suite 669\nEast Briafort, AR 81505', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(90020094, 'antonia.borer', 'abbott.sibyl@okon.com', 943, '27348 Tyrell Walk Suite 751\nSouth Ulisesbury, OK 33923-9297', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(91321008, 'ueffertz', 'augustus36@morissette.com', 916, '53293 Corkery Lock Suite 436\nNew Corene, ID 49492', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(91553966, 'oma.kessler', 'pankunding@champlin.org', 987, '4383 Jesse Plaza Suite 724\nJamieview, OH 45135-5917', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(92866485, 'jerrod.runte', 'kiehn.werner@yahoo.com', 976, '559 Zack Flat\nSouth Chasitychester, NH 41931', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(93099950, 'koss.margarita', 'vmayer@kovacek.com', 927, '714 Evan Motorway Suite 785\nPort Caleigh, DC 06675', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(94628142, 'bert.russel', 'brannon52@hotmail.com', 927, '2680 Botsford Port\nNorth Brook, RI 71601', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(94847611, 'danial27', 'zwatsica@glover.info', 996, '8948 Corkery Squares\nNew Cielomouth, NJ 92459', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(94961171, 'eboehm', 'ignacio48@dibbert.com', 916, '34779 Armand Spur\nLake Logan, MD 44344', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(95328737, 'mario96', 'ellen43@hotmail.com', 974, '534 Labadie Lane\nYostfort, SD 82556-1999', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(97079057, 'alexane62', 'lavern.stanton@mcglynn.com', 953, '241 Jordon Rapid Suite 447\nSouth Daphnemouth, NC 79900', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(98087297, 'lexi.lesch', 'mcdermott.vallie@hotmail.com', 975, '87377 Kutch Prairie Apt. 501\nLake Edythe, ND 19735', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(98241491, 'daniella.hartmann', 'hintz.kristoffer@hotmail.com', 932, '331 Ritchie Mission Suite 246\nMakenziefurt, OH 01972-6999', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(98456611, 'alda.medhurst', 'adelbert12@hermann.biz', 999, '476 Ken Way Suite 965\nAltenwerthland, TX 69655-3764', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(98944163, 'ppurdy', 'bednar.martine@leannon.biz', 907, '6182 Lang Mountains\nBeahanfurt, ME 33099-0070', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(99179038, 'qdamore', 'lrempel@gmail.com', 983, '331 Sanford Route Apt. 056\nLake Emersonville, AK 36981-9339', '2021-04-30 06:53:11', '2021-04-30 06:53:11'),
(99179039, 'Maju Bersama', 'mulyono101299@gmail.com', 89678876, 'bandung', '2021-05-01 18:09:46', '2021-05-01 18:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga_barang` int(50) DEFAULT NULL,
  `jumlah_beli` int(50) DEFAULT NULL,
  `total_harga` int(50) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `kode_transaksi`, `barang_id`, `harga_barang`, `jumlah_beli`, `total_harga`, `subtotal`, `jumlah_bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(374, '2021-07-08', 'TR-0000001', NULL, NULL, NULL, NULL, 9000, NULL, NULL, '2021-07-07 19:41:43', '2021-07-07 19:41:43'),
(375, '2021-07-14', 'TR-0000002', NULL, NULL, NULL, NULL, 6000, NULL, NULL, '2021-07-14 00:01:36', '2021-07-14 00:01:36'),
(376, '2021-07-14', 'TR-0000003', NULL, NULL, NULL, NULL, 4000, NULL, NULL, '2021-07-14 00:01:53', '2021-07-14 00:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'kasir', 'hani', 'hani@gmail.com', NULL, 'hani123', '$2y$10$Lhlu5.4ALm4Y7DLdsqPJd.o9oPMQ39FbQYSAwKkgdHUOGHp3mEbuy', '8xgk2PDCp3', '2021-06-15 05:51:17', '2021-06-18 04:57:20'),
(8, 'admin', 'admin kenala', 'admin@gmail.com', NULL, 'admin', '$2y$10$heu8MkAOsXC4rhQxvYmEQ.gcUxQNaa7yemfERr43NtBN/vvlZd1WC', 'w5HIw4I92u', '2021-06-20 18:57:12', '2021-06-20 18:57:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategoribarang_id_foreign` (`kategoribarang_id`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobas`
--
ALTER TABLE `cobas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailmasuk`
--
ALTER TABLE `detailmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailtransaksis`
--
ALTER TABLE `detailtransaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoribarangs`
--
ALTER TABLE `kategoribarangs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `cobas`
--
ALTER TABLE `cobas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detailmasuk`
--
ALTER TABLE `detailmasuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `detailtransaksis`
--
ALTER TABLE `detailtransaksis`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `kategoribarangs`
--
ALTER TABLE `kategoribarangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98938963;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99179040;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
