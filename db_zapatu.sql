-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2022 pada 03.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixzapatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_username` varchar(25) NOT NULL,
  `adm_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`adm_id`, `adm_username`, `adm_pass`) VALUES
(1, 'ibra', '0b5ffc09eb62ef2241f07327276ee064'),
(2, 'nanda', '859a37720c27b9f70e11b79bab9318fe'),
(3, 'al', '5058f1af8388633f609cadb75a75dc9d'),
(4, 'al', '5058f1af8388633f609cadb75a75dc9d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_brand` varchar(25) NOT NULL,
  `prod_size` tinyint(1) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_gender` tinyint(1) NOT NULL,
  `prod_img` varchar(100) NOT NULL,
  `prod_category` tinyint(1) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`prod_id`, `prod_name`, `prod_brand`, `prod_size`, `prod_price`, `prod_gender`, `prod_img`, `prod_category`, `prod_desc`, `prod_stock`, `prod_date`) VALUES
(1, 'primo point', 'rubi', 0, 900000, 1, 'PROD_primopoint_1654794229.png', 3, '<p>Dare we say, the Primo Point Flats will be your new go-to. A part of our Work Essentials Range, these ballet flats are made with added cushioning because we know you&#39;re a girl on the go.</p>\n\n<p>Details and Style :</p>\n\n<ul>\n	<li>100% synthetic materials</li>\n	<li>Pointed toe</li>\n	<li>Slip-on design</li>\n	<li>Cushion sole comfort</li>\n</ul>\n\n<p>Composition and Care Instruction :</p>\n\n<ul>\n	<li>Upper: Polyurethane / Polyester</li>\n	<li>Outsole: TPR</li>\n</ul>\n', 41, '2022-06-09 10:03:49'),
(2, 'primo point', 'rubi', 1, 910000, 1, 'PROD_primopoint_1654794229.png', 3, '<p>Dare we say, the Primo Point Flats will be your new go-to. A part of our Work Essentials Range, these ballet flats are made with added cushioning because we know you&#39;re a girl on the go.</p>\n\n<p>Details and Style :</p>\n\n<ul>\n	<li>100% synthetic materials</li>\n	<li>Pointed toe</li>\n	<li>Slip-on design</li>\n	<li>Cushion sole comfort</li>\n</ul>\n\n<p>Composition and Care Instruction :</p>\n\n<ul>\n	<li>Upper: Polyurethane / Polyester</li>\n	<li>Outsole: TPR</li>\n</ul>\n', 31, '2022-06-09 10:07:07'),
(3, 'primo point', 'rubi', 2, 1000000, 1, 'PROD_primopoint_1654794229.png', 3, '<p>Dare we say, the Primo Point Flats will be your new go-to. A part of our Work Essentials Range, these ballet flats are made with added cushioning because we know you&#39;re a girl on the go.</p>\n\n<p>Details and Style :</p>\n\n<ul>\n	<li>100% synthetic materials</li>\n	<li>Pointed toe</li>\n	<li>Slip-on design</li>\n	<li>Cushion sole comfort</li>\n</ul>\n\n<p>Composition and Care Instruction :</p>\n\n<ul>\n	<li>Upper: Polyurethane / Polyester</li>\n	<li>Outsole: TPR</li>\n</ul>\n', 51, '2022-06-09 10:09:54'),
(4, 'tri-tone comfycush slip-on', 'vans', 9, 1000000, 2, 'PROD_tritonecomfycushslipon_1654795343.png', 2, '<p>Dimana Classics Meet Comfort Vans telah menghidupkan kembali siluet Classic Slip-On yang ikonik dengan memperkenalkan teknologi ComfyCush: outsole baru yang lebih lembut dan empuk yang memberikan ComfyCush Slip-On kenyamanan kelas satu yang terasa seperti berjalan di atas awan. Menampilkan konstruksi busa dan karet yang dibentuk bersama untuk kombinasi sempurna antara kenyamanan dan cengkeraman, Tri-Tone ComfyCush Slip-On membuatnya tetap nyaman setiap saat sambil tetap mempertahankan estetika ikonik dari sepatu slip-on asli kami. Tampilan tak lekang oleh waktu ini juga dilengkapi dengan outsole karet yang menawarkan daya tahan dan traksi, interior one-piece yang disederhanakan dengan tambahan penyangga lengkung, dan bahan pelapis yang menyerap kelembapan di seluruh bagian dalam sepatu. Seiring dengan bagian atas kanvas yang baru dibangun yang berfokus pada stabilisasi lidah, Tri-Tone ComfyCush Slip-On memberikan sentuhan retro pada gaya sport Vans di awal 90-an, dan memberikan pengalaman di mana kenyamanan sangat penting.</p>\r\n\r\n<ul>\r\n	<li>Interior berkonstruksi one-piece agar pas dan nyaman</li>\r\n	<li>Busa Vans ComfyCush untuk meningkatkan kenyamanan &bull; Dukungan lengkungan tambahan</li>\r\n	<li>Outsole karet untuk daya tahan dan traksi</li>\r\n	<li>Bagian atas kanvas kokoh yang fokus pada stabilisasi lidah</li>\r\n	<li>Bahan pelapis yang menyerap kelembapan</li>\r\n</ul>\r\n', 31, '2022-06-09 10:22:23'),
(5, 'tri-tone comfycush slip-on', 'vans', 8, 900000, 2, 'PROD_tritonecomfycushslipon_1654795343.png', 2, '<p>Dimana Classics Meet Comfort Vans telah menghidupkan kembali siluet Classic Slip-On yang ikonik dengan memperkenalkan teknologi ComfyCush: outsole baru yang lebih lembut dan empuk yang memberikan ComfyCush Slip-On kenyamanan kelas satu yang terasa seperti berjalan di atas awan. Menampilkan konstruksi busa dan karet yang dibentuk bersama untuk kombinasi sempurna antara kenyamanan dan cengkeraman, Tri-Tone ComfyCush Slip-On membuatnya tetap nyaman setiap saat sambil tetap mempertahankan estetika ikonik dari sepatu slip-on asli kami. Tampilan tak lekang oleh waktu ini juga dilengkapi dengan outsole karet yang menawarkan daya tahan dan traksi, interior one-piece yang disederhanakan dengan tambahan penyangga lengkung, dan bahan pelapis yang menyerap kelembapan di seluruh bagian dalam sepatu. Seiring dengan bagian atas kanvas yang baru dibangun yang berfokus pada stabilisasi lidah, Tri-Tone ComfyCush Slip-On memberikan sentuhan retro pada gaya sport Vans di awal 90-an, dan memberikan pengalaman di mana kenyamanan sangat penting.</p>\r\n\r\n<ul>\r\n	<li>Interior berkonstruksi one-piece agar pas dan nyaman</li>\r\n	<li>Busa Vans ComfyCush untuk meningkatkan kenyamanan &bull; Dukungan lengkungan tambahan</li>\r\n	<li>Outsole karet untuk daya tahan dan traksi</li>\r\n	<li>Bagian atas kanvas kokoh yang fokus pada stabilisasi lidah</li>\r\n	<li>Bahan pelapis yang menyerap kelembapan</li>\r\n</ul>\r\n', 21, '2022-06-09 10:23:53'),
(6, 'chuck 70 75th anniversary', 'converse', 4, 2100000, 0, 'PROD_chuck7075thanniversary_1654795589.png', 1, '<p>Game ikonik, gaya ikonik. Kami merayakan 75 tahun NBA dengan desain bola basket asli tahun 1970-an, menampilkan warna yang terinspirasi tim dan bahan yang terinspirasi permainan seperti kulit, mesh, dan kain terry. Bagian atas yang terinspirasi pola bola basket dilengkapi dengan detail vintage seperti dinding samping karet mengkilap dan jahitan lidah bersayap. Pencitraan merek NBA pada pelat nomor Converse membuatnya menjadi lingkaran penuh. Hormati permainannya.</p>\r\n', 21, '2022-06-09 10:26:29'),
(7, 'chuck 70 75th anniversary', 'converse', 6, 2100000, 0, 'PROD_chuck7075thanniversary_1654795589.png', 1, '<p>Game ikonik, gaya ikonik. Kami merayakan 75 tahun NBA dengan desain bola basket asli tahun 1970-an, menampilkan warna yang terinspirasi tim dan bahan yang terinspirasi permainan seperti kulit, mesh, dan kain terry. Bagian atas yang terinspirasi pola bola basket dilengkapi dengan detail vintage seperti dinding samping karet mengkilap dan jahitan lidah bersayap. Pencitraan merek NBA pada pelat nomor Converse membuatnya menjadi lingkaran penuh. Hormati permainannya.</p>\r\n', 41, '2022-06-09 10:30:19'),
(8, 'nike free run 5.0', 'nike', 2, 4100000, 0, 'PROD_nikefreerun50_1654795885.png', 0, '<p>Terbuat dari setidaknya 20% bahan daur ulang menurut beratnya, sepatu boot seperti kaus kaki dari Nike Free ini dirancang untuk transisi dari lari ke latihan ke rutinitas sehari-hari Anda. Dengan bagian atas rajutan yang bernapas, ini menggabungkan fleksibilitas yang Anda sukai dengan desain yang aman yang akan membantu Anda tetap dekat dengan tanah untuk perasaan bertelanjang kaki. Bantalan baru lebih ringan, lebih lembut, dan lebih responsif daripada versi sebelumnya sehingga Anda dapat terus bergerak dengan nyaman baik saat berada di aspal atau trek.</p>\r\n', 61, '2022-06-09 10:31:25'),
(9, 'nike free run 5.0', 'nike', 3, 4500000, 0, 'PROD_nikefreerun50_1654795885.png', 0, '<p>Terbuat dari setidaknya 20% bahan daur ulang menurut beratnya, sepatu boot seperti kaus kaki dari Nike Free ini dirancang untuk transisi dari lari ke latihan ke rutinitas sehari-hari Anda. Dengan bagian atas rajutan yang bernapas, ini menggabungkan fleksibilitas yang Anda sukai dengan desain yang aman yang akan membantu Anda tetap dekat dengan tanah untuk perasaan bertelanjang kaki. Bantalan baru lebih ringan, lebih lembut, dan lebih responsif daripada versi sebelumnya sehingga Anda dapat terus bergerak dengan nyaman baik saat berada di aspal atau trek.</p>\r\n', 51, '2022-06-09 10:31:50'),
(10, 'adidas 4d run 1.0 shoes', 'adidas', 4, 4199999, 1, 'PROD_adidas4drun10shoes_1654826456.jpg', 0, '<p>Dibuat untuk lari dimasa depan, disesuaikan untuk Anda. 4D Run 1.0 memadukan data atletik adidas selama 17 tahun dengan inovasi dalam desain digital. Dibuat untuk kenyamanan dan gaya sepanjang hari, midsole dengan cetakan 3D menggunakan Digital Light Synthesis menjadikannya versi 4D yang paling ringan. Disesuaikan dengan langkah Anda, teknologi ini menyerap tekanan dari semua sudut. Bagian atas tekstil bersahaja dan klip tumit yang dibentuk menahan kaki Anda di tempatnya. Detail 3-Stripes yang tak lekang oleh waktu melengkapi siluet ikonik yang akan membawa Anda lebih jauh dan lebih cepat ke masa depan.</p>\r\n', 62, '2022-06-09 19:00:56'),
(12, 'Adidas Ultra Boost', 'Adidas', 43, 2500000, 1, 'Ultraboost.jpg', 1, 'Nama Ultraboost berasal dari bantalan boost yang ada pada bagian midsole. Koleksi sepatu seri terbaru ini punya boost 20% lebih banyak dibandingkan model lain. Berbekal teknologi yang canggih, butir-butir boost disebar lebih merata sehingga bobot midsole tetap sama.', 0, '2022-06-18 04:42:04'),
(13, 'Asics Gel Kayano', 'Asics', 44, 1200000, 1, 'Kayano 26_man.jpg', 1, 'Lorem Ipsum', 2, '2022-06-18 04:48:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adm_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `receiver_tlp` varchar(30) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `trans_status_date` timestamp NULL DEFAULT NULL,
  `trans_status` tinyint(1) NOT NULL,
  `trans_img_pay` varchar(100) NOT NULL,
  `receiver_address` text NOT NULL,
  `receiver_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaction`
--

INSERT INTO `tb_transaction` (`trans_id`, `user_id`, `adm_id`, `prod_id`, `prod_price`, `prod_qty`, `total_price`, `receiver_tlp`, `trans_date`, `trans_status_date`, `trans_status`, `trans_img_pay`, `receiver_address`, `receiver_name`) VALUES
(1, 1, 1, 1, 3200000, 2, 6400000, '+6209876543210', '2022-05-29 09:59:10', NULL, 0, 'bank_dummy.jpeg', 'Jalan Dummy ', 'dummy_penerima'),
(2, 1, 1, 1, 3200000, 1, 3200000, '+6209876543210', '2022-05-29 10:00:35', NULL, 0, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(3, 1, 1, 1, 3200000, 3, 9600000, '+6209876543210', '2022-05-29 10:00:35', NULL, 0, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(4, 1, 1, 1, 3200000, 4, 12800000, '+6209876543210', '2022-05-29 10:00:35', NULL, 0, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(5, 1, 1, 1, 3200000, 5, 16000000, '+6209876543210', '2022-05-29 10:00:35', NULL, 0, 'bank_dummy_5.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(6, 1, 1, 1, 3200000, 2, 6400000, '+6209876543210', '2022-05-29 09:59:10', '2022-06-07 02:34:53', 1, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima'),
(7, 1, 1, 1, 3200000, 1, 3200000, '+6209876543210', '2022-05-29 10:00:35', '2022-06-07 02:34:53', 1, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(8, 1, 1, 1, 3200000, 3, 9600000, '+6209876543210', '2022-05-29 10:00:35', '2022-06-07 02:34:53', 1, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(9, 1, 1, 1, 3200000, 4, 12800000, '+6209876543210', '2022-05-29 10:00:35', '2022-06-07 02:34:53', 1, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(10, 1, 1, 1, 3200000, 5, 16000000, '+6209876543210', '2022-05-29 10:00:35', '2022-06-07 02:34:53', 1, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(11, 1, 1, 1, 3200000, 2, 6400000, '+6209876543210', '2022-05-29 09:59:10', '2022-06-07 02:34:53', 2, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima'),
(12, 1, 1, 1, 3200000, 1, 3200000, '+6209876543210', '2022-05-29 10:00:35', '2022-06-07 02:34:53', 2, 'bank_dummy.jpeg', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_penerima1'),
(43, 3, 0, 12, 2500000, 1, 2500000, '085166666', '2022-06-18 04:49:46', NULL, 0, '', 'Jalan Lama', 'Al'),
(44, 3, 0, 12, 2500000, 1, 2500000, '085921410877', '2022-06-18 05:00:14', NULL, 0, '', 'Jalan Kebagusan IV RT 008 RW 04 No 53', 'Rizanis Aqshol Himam'),
(45, 3, 0, 13, 1200000, 1, 1200000, '085921410877', '2022-06-18 09:31:27', NULL, 0, '', 'Jalan Kebagusan IV RT 008 RW 04 No 53', 'Rizanis Aqshol Himam'),
(46, 3, 0, 13, 1200000, 1, 1200000, '085921410877', '2022-06-18 09:31:32', NULL, 0, 'IMG-62ada3c2daed25.02197003.png', 'Jalan Kebagusan IV RT 008 RW 04 No 53', 'Rizanis Aqshol Himam'),
(47, 3, 0, 13, 1200000, 1, 1200000, '085921410877', '2022-06-18 10:18:23', NULL, 0, 'IMG-62ada67a31bed4.69682890.png', 'Jalan Kebagusan IV RT 008 RW 04 No 53', 'Rizanis Aqshol Himam'),
(48, 13, 0, 13, 1200000, 1, 1200000, '123', '2022-06-18 11:40:48', NULL, 0, 'IMG-62adb9d11f7c07.17992294.png', 'Jl apa ajalah ga tau ', 'nami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tlp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_username`, `user_pass`, `user_address`, `user_email`, `user_tlp`) VALUES
(1, 'dummy ibra', 'dummy ibra', '275876e34cf609db118f3d84b799a790', 'Jalan Dummy Gang Dummy No XX RT XX RW XX KELURAHAN Dummy KECAMATAN Dummy KOTA Dummy TIMUR Dummy XXXXX', 'dummy_email@gmail.com', '+6212345678901'),
(2, 'ibra', 'ibra', 'ibra', 'ibra', 'dummy_email@gmail.com', '+6212345678901'),
(3, 'Rizanis Aqshol Himam', 'rizanis', '202cb962ac59075b964b07152d234b70', 'Jalan Kebagusan IV RT 008 RW 04 No 53', 'rizanis9823@gmail.com', '085921410877'),
(8, 'sanji', 'sanji', 'b4e7593827a4f433c04d3eb29e34e2b3', 'Jalan All Blue', 'sanji@gmail.com', '123456789'),
(12, 'zoro', 'zoro', 'eed83905a260b31bc5d254701999ee94', 'Jl Mihawk', 'zoro@gmail.com', '123'),
(13, 'nami', 'nami', '0f064e34f4c1703f93825f7dc4a61865', 'Jl apa ajalah ga tau ', 'nami@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indeks untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `adm_id` (`adm_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
