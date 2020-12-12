-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 01:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayes_sawit`
--

-- --------------------------------------------------------

--
-- Table structure for table `y_admin`
--

CREATE TABLE `y_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_admin`
--

INSERT INTO `y_admin` (`id_admin`, `username`, `password`, `fullname`, `level`, `email`, `reset`) VALUES
(1, 'admin', '$2y$10$zs/ChlclDvuC1aORPjvLfel0obpIF8ByNUy68S5hT1KIspJ1tcQAW', 'Administrator', 1, 'administrator@gmail.com', ''),
(2, 'admin2', '$2y$10$/DH/CykM0BSu2Yy56J87pOvppOoEGf6DnkkUp.7AyznQTJ8xLhDJy', 'Administrator II', 1, 'administrator2@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `y_gejala`
--

CREATE TABLE `y_gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nm_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_gejala`
--

INSERT INTO `y_gejala` (`id_gejala`, `nm_gejala`) VALUES
('GKS01', '<p>Ditemukannya hama rayap dengan alur-alur terowongan dari tanah.</p>\r\n'),
('GKS02', '<p>Tidak ditemukannya hama rayap, namun batang berlubang.</p>\r\n'),
('GKS03', '<p>Tanaman tumbang dan bagian dalam mengalami pembusukan.</p>\r\n'),
('GKS04', '<p>Busuk pada bagian pangkal atas.</p>\r\n'),
('GKS05', '<p>Seluruh tajuk terlihat kekuningan dan pucat, disertai dengan meningkatnya jumlah daun tombak (pupus yang belum terbuka) sampai 2-4 daun didalam pucuk.</p>\r\n'),
('GKS06', '<p>Daun-daun sebelah bawah tajuk lama-lama merunduk, namun pada bagian atas tetap tegak dan tidak mau membuka (adanya ruang kosong yang membelah dua tajuk).</p>\r\n'),
('GKS07', '<p>Munculnya tubuh buah cendawan (<em>carpophore</em>) pada pangkal batang.</p>\r\n'),
('GKS08', '<p>Munculnya <em>carpophore</em> secara tiba-tiba, namun tajuk pohon masih terlihat segar.</p>\r\n'),
('GKS09', '<p>Adanya bagian buah yang terjepit di antara batang dan pelepah daun di atasnya.</p>\r\n'),
('GKS10', '<p>Adanya jamur berwarna putih mengkilap yang menutupi buah.</p>\r\n'),
('GKS11', '<p>Terjadi pembusukan pada buah dan bagian pelepah apabila dipotong melintang.</p>\r\n'),
('GKS12', '<p>Terdapat bekas gerekan pada buah.</p>\r\n'),
('GKS13', '<p>Adanya hama tupai atau tikus.</p>\r\n'),
('GKS14', '<p>Daun tanaman layu, kemudian tanaman mati.</p>\r\n'),
('GKS15', '<p>Pada perakaran tanaman tampak adanya pembusukan pada akar.</p>\r\n'),
('GKS16', '<p>Tandan buah yang sedang berbunga mengalami pembusukan.</p>\r\n'),
('GKS17', '<p>Pelepahnya mudah patah, tetapi daun tetap berwarna hijau untuk beberapa saat, kemudian membusuk dan mengering.</p>\r\n'),
('GKS18', '<p>Terjadinya pembusukan (busuk kering) pada pangkal batang.</p>\r\n'),
('GKS19', '<p>Tanaman bercabang 2 atau 3.</p>\r\n'),
('GKS20', '<p>Terdapat serangga / hama <em>Rhynchophorus spp.</em></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `y_konsul`
--

CREATE TABLE `y_konsul` (
  `id_konsul` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `y_konsultasi`
--

CREATE TABLE `y_konsultasi` (
  `id_konsul` int(11) NOT NULL,
  `id_petani` int(11) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `hasil` double NOT NULL,
  `tgl_konsul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_konsultasi`
--

INSERT INTO `y_konsultasi` (`id_konsul`, `id_petani`, `id_penyakit`, `hasil`, `tgl_konsul`) VALUES
(1, 1, 'PKS2', 2.19, '2020-09-06'),
(3, 3, 'PKS2', 16, '2020-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `y_penyakit`
--

CREATE TABLE `y_penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nm_penyakit` varchar(100) NOT NULL,
  `ket_penyakit` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_penyakit`
--

INSERT INTO `y_penyakit` (`id_penyakit`, `nm_penyakit`, `ket_penyakit`, `solusi`) VALUES
('PKS1', 'Penyakit Busuk Pangkal Batang', '<p>Salah satu  penyakit yang menyerang tanaman kelapa sawit dan dapat mematikan tanaman, penyebabnya adalah  jamur patagenik dari genus ganoderma.  infeksi dan penularan penyakit terjadi di dalam tanah melalui kontak akar tanaman sehat dengan sumber infeksi seperti tunggul kayuan eks hutan, karet, kelapa dan kelapa sawit yang telah terkolonisasi patogen.</p>\r\n', '<ol>\r\n <li>Menyemprotkan insektisida sebanyak 1-2 liter tiap pohon pada batang dan pelepah yang rusak.</li>\r\n <li>Pada 6 pohon di sekitarnya, diberikan 2 liter tiap pohon pada radius 30cm dari pangkal batang.</li>\r\n <li>Tanaman yang sakit/ hampir mati / sudah mati harus dibongkar hingga bonggol akarnya.</li>\r\n <li>Drainasi atau pengairan yang baik.</li>\r\n <li>Menanam 2 sampai 3 stek tanaman <em>Calopogonium caeruleum </em>atau / dan Musuna di sekitar lubang pembongkaran untuk menekan pertumbuhan gulma dan pembiakan <em>orycater</em>.</li>\r\n</ol>\r\n'),
('PKS2', 'Penyakit Busuk Tandan', '<p>Penyakit busuk tandan disebabkan oleh Marasmius palmivorus. yang mula mula jamur ini membentuk benang benang berwarna putih yang banyak menutupi kulit buah, dan kemudian membentuk payung.</p>\r\n', '<ol>\r\n <li>Mengumpulkan dan membakar tanaman yang terserang, mengumpulkan dan  memendam bagian/tanaman sakit kedalam tanah.</li>\r\n <li>Menggunakan <em>Fungisida </em>yang selektif sehingga tidak mematikan serangga dan kumbang yang membantu penyerbukan.</li>\r\n <li>Melakukan penyerbukan buatan, kastrasi dan mengurangi kelembapan udara dengan penunasan secara teratur, terutama pada musim hujan.</li>\r\n <li>Bunga dan buah yang membusuk sebaiknya dibuang.</li>\r\n <li>Menggunakan predator yakni burung hantu <em>Tyto alba</em>.</li>\r\n <li>Menggunakan umpan racun tikus.</li>\r\n</ol>\r\n'),
('PKS3', 'Penyakit Akar Blast Disease', '<p>Penyakit akar atau disebut juga Blast disease disebabkan oleh cendawan/jamur Rhizoctonia lamellifera dan Phytium sp. Cendawan ini menyerang sistem perakaran tanaman kelapa sawit yang berada didalam tanah dan menyebabkan akar tanaman membusuk. Akar tanaman yang terinfeksi membusuk dan rusak sehingga fungsinya sebagai penyerap nutrisi dan air terhenti. Akibatnya tanaman kelapa sawit mengalami pertumbuhan yang tidak normal dan lama kelamaan mati.</p>\r\n', '<ol>\r\n <li>Membuat pembibitan yang baik agar pertumbuhan bibit sehat dan kuat.</li>\r\n <li>Pemberian air irigasi pada musim kemarau dapat mencegah terjadinya gangguan penyakit ini.</li>\r\n</ol>\r\n'),
('PKS4', 'Penyakit Batang Dry Basal Rot', '<p>Penyakit busuk kering pangkal batang tanaman kelapa sawit di sebabkan oleh jamur ceratocystis paradoxa.</p>\r\n', '<ol>\r\n <li>Seleksi bibit tanaman yang bebas penyakit ini.</li>\r\n</ol>\r\n'),
('PKS5', 'Penyakit Busuk Pupus', '<p>Infeksi jamur pada pupus atau titik tumbuhnya jaringan muda sawit. Busuk pupus biasanya muncul saat pohon sawit telah rusak, misalnya rusak akibat serangga.</p>\r\n', '<ol>\r\n <li>Melakukan penyemprotan atau penyiraman dengan fungisida dan antibiotik.</li>\r\n <li>Menggunakan ferotrap yang berisi air sabun, kemudian dipasang pada tiang bambu setinggi 2,5m.</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `y_petani`
--

CREATE TABLE `y_petani` (
  `id_petani` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reset` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_petani`
--

INSERT INTO `y_petani` (`id_petani`, `username`, `password`, `fullname`, `alamat`, `email`, `jk`, `telp`, `status`, `reset`) VALUES
(1, 'yunita', '$2y$10$5EhUzDFbISX/KjD66mUG/.P4CUXXBNc8bYDPCdl5T7ZGQ1AGHSQBm', 'Yunita Cahaya', 'Cengkeh', 'yunita11@gmail.com', 'P', '081234561234', 1, ''),
(2, 'fajri', '$2y$10$W9H1g6Yx8n4RIlmyuDQefOiOcfSStTZqlNkK66IDqVbJYKR.5eDA2', 'Fajri Karim', 'Lubuk Begalung', 'fajrikarim55@gmail.com', 'L', '081234566554', 2, ''),
(3, 'sugiri', '$2y$10$BAFq.yRWuZAAYWVDeJnSa.cBoKjvvQYQIOGK0QjkUJygKfRFho5uW', 'F.X Sugiri', 'Taratak Tinggi Timpeh', 'sugurifx87@gmail.com', 'L', '081253646432', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `y_rule`
--

CREATE TABLE `y_rule` (
  `id_rule` int(11) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `prob` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `y_rule`
--

INSERT INTO `y_rule` (`id_rule`, `id_penyakit`, `id_gejala`, `prob`) VALUES
(1, 'PKS1', 'GKS01', 1),
(2, 'PKS1', 'GKS02', 1),
(3, 'PKS1', 'GKS03', 1),
(4, 'PKS1', 'GKS04', 1),
(5, 'PKS1', 'GKS05', 1),
(6, 'PKS1', 'GKS06', 1),
(7, 'PKS1', 'GKS07', 1),
(8, 'PKS1', 'GKS08', 1),
(9, 'PKS1', 'GKS09', 0),
(10, 'PKS1', 'GKS10', 0),
(11, 'PKS1', 'GKS11', 0),
(12, 'PKS1', 'GKS12', 0),
(13, 'PKS1', 'GKS13', 0),
(14, 'PKS1', 'GKS14', 0),
(15, 'PKS1', 'GKS15', 0),
(16, 'PKS1', 'GKS16', 0),
(17, 'PKS1', 'GKS17', 0),
(18, 'PKS1', 'GKS18', 0),
(19, 'PKS1', 'GKS19', 0),
(20, 'PKS1', 'GKS20', 0),
(22, 'PKS2', 'GKS01', 0),
(23, 'PKS2', 'GKS02', 0),
(24, 'PKS2', 'GKS03', 0),
(25, 'PKS2', 'GKS04', 0),
(26, 'PKS2', 'GKS05', 0),
(27, 'PKS2', 'GKS06', 0),
(28, 'PKS2', 'GKS07', 0),
(29, 'PKS2', 'GKS08', 0),
(30, 'PKS2', 'GKS09', 1),
(31, 'PKS2', 'GKS10', 1),
(32, 'PKS2', 'GKS11', 1),
(33, 'PKS2', 'GKS12', 1),
(34, 'PKS2', 'GKS13', 1),
(35, 'PKS2', 'GKS14', 0),
(36, 'PKS2', 'GKS15', 0),
(37, 'PKS2', 'GKS16', 0),
(38, 'PKS2', 'GKS17', 0),
(39, 'PKS2', 'GKS18', 0),
(40, 'PKS2', 'GKS19', 0),
(41, 'PKS2', 'GKS20', 0),
(42, 'PKS3', 'GKS01', 0),
(43, 'PKS3', 'GKS02', 0),
(44, 'PKS3', 'GKS03', 0),
(45, 'PKS3', 'GKS04', 0),
(46, 'PKS3', 'GKS05', 0),
(47, 'PKS3', 'GKS06', 0),
(48, 'PKS3', 'GKS07', 0),
(49, 'PKS3', 'GKS08', 0),
(50, 'PKS3', 'GKS09', 0),
(51, 'PKS3', 'GKS10', 0),
(52, 'PKS3', 'GKS11', 0),
(53, 'PKS3', 'GKS12', 0),
(54, 'PKS3', 'GKS13', 0),
(55, 'PKS3', 'GKS14', 1),
(56, 'PKS3', 'GKS15', 1),
(57, 'PKS3', 'GKS16', 0),
(58, 'PKS3', 'GKS17', 0),
(59, 'PKS3', 'GKS18', 0),
(60, 'PKS3', 'GKS19', 0),
(61, 'PKS3', 'GKS20', 0),
(62, 'PKS4', 'GKS01', 0),
(63, 'PKS4', 'GKS02', 0),
(64, 'PKS4', 'GKS03', 0),
(65, 'PKS4', 'GKS04', 0),
(66, 'PKS4', 'GKS05', 0),
(67, 'PKS4', 'GKS06', 0),
(68, 'PKS4', 'GKS07', 0),
(69, 'PKS4', 'GKS08', 0),
(70, 'PKS4', 'GKS09', 0),
(71, 'PKS4', 'GKS10', 0),
(72, 'PKS4', 'GKS11', 0),
(73, 'PKS4', 'GKS12', 0),
(74, 'PKS4', 'GKS13', 0),
(75, 'PKS4', 'GKS14', 0),
(76, 'PKS4', 'GKS15', 0),
(77, 'PKS4', 'GKS16', 1),
(78, 'PKS4', 'GKS17', 1),
(79, 'PKS4', 'GKS18', 1),
(80, 'PKS4', 'GKS19', 0),
(81, 'PKS4', 'GKS20', 0),
(82, 'PKS5', 'GKS01', 0),
(83, 'PKS5', 'GKS02', 0),
(84, 'PKS5', 'GKS03', 0),
(85, 'PKS5', 'GKS04', 0),
(86, 'PKS5', 'GKS05', 0),
(87, 'PKS5', 'GKS06', 0),
(88, 'PKS5', 'GKS07', 0),
(89, 'PKS5', 'GKS08', 0),
(90, 'PKS5', 'GKS09', 0),
(91, 'PKS5', 'GKS10', 0),
(92, 'PKS5', 'GKS11', 0),
(93, 'PKS5', 'GKS12', 0),
(94, 'PKS5', 'GKS13', 0),
(95, 'PKS5', 'GKS14', 0),
(96, 'PKS5', 'GKS15', 0),
(97, 'PKS5', 'GKS16', 0),
(98, 'PKS5', 'GKS17', 0),
(99, 'PKS5', 'GKS18', 0),
(100, 'PKS5', 'GKS19', 1),
(101, 'PKS5', 'GKS20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `y_admin`
--
ALTER TABLE `y_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `y_gejala`
--
ALTER TABLE `y_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `y_konsul`
--
ALTER TABLE `y_konsul`
  ADD PRIMARY KEY (`id_konsul`);

--
-- Indexes for table `y_konsultasi`
--
ALTER TABLE `y_konsultasi`
  ADD PRIMARY KEY (`id_konsul`);

--
-- Indexes for table `y_penyakit`
--
ALTER TABLE `y_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `y_petani`
--
ALTER TABLE `y_petani`
  ADD PRIMARY KEY (`id_petani`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `y_rule`
--
ALTER TABLE `y_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `y_admin`
--
ALTER TABLE `y_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `y_konsul`
--
ALTER TABLE `y_konsul`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `y_konsultasi`
--
ALTER TABLE `y_konsultasi`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `y_petani`
--
ALTER TABLE `y_petani`
  MODIFY `id_petani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `y_rule`
--
ALTER TABLE `y_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
