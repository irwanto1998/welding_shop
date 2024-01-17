-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 14.22
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtokopekita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `username_admin` varchar(225) NOT NULL,
  `password_admin` varchar(225) NOT NULL,
  `gambar_admin` varchar(225) NOT NULL,
  `foto_ktp_admin` varchar(225) NOT NULL,
  `no_rek_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_telp`, `username_admin`, `password_admin`, `gambar_admin`, `foto_ktp_admin`, `no_rek_admin`) VALUES
(1, 'Super Admin', '+62895379407698', 'admin', 'admin', '589333.jpg', 'black-1072366_960_720.jpg', '911911911911');

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama_custom` varchar(255) NOT NULL,
  `ukuran_panjang` varchar(20) NOT NULL,
  `ukuran_lebar` varchar(20) NOT NULL,
  `deskripsi_custom` longtext NOT NULL,
  `rekening_penjual` varchar(50) NOT NULL,
  `gambar_custom` varchar(255) NOT NULL,
  `harga_custom` varchar(255) NOT NULL,
  `status_custom` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `tgl_custom` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dp` double NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `sisa_harga` varchar(255) NOT NULL,
  `status_barang` varchar(20) NOT NULL,
  `hasil_penjualan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `custom`
--

INSERT INTO `custom` (`id_custom`, `id_penjual`, `id_pembeli`, `nama_custom`, `ukuran_panjang`, `ukuran_lebar`, `deskripsi_custom`, `rekening_penjual`, `gambar_custom`, `harga_custom`, `status_custom`, `status_pembayaran`, `tgl_custom`, `dp`, `bukti_bayar`, `sisa_harga`, `status_barang`, `hasil_penjualan`) VALUES
(48, 3, 9, 'TERALIS', '2', '3', 'ppp', '', '589333.jpg', '', 'Selesai', 'Lunas', '2021-08-26 11:21:43', 0, '526887.jpg', '0', '', ''),
(57, 11, 7, 'PINTU HENDERSON', '6', '4', '<p>pppp</p>\r\n', '480901014539532', 'WhatsApp Image 2021-07-13 at 09.57.04.jpeg', '', 'Menunggu Konfirmasi', 'Belum Bayar', '2021-07-15 04:51:16', 0, '', '', '', ''),
(58, 11, 7, 'PINTU LAPIS', '3', '4', '<p>Untuk warna disesuaikan dengan ada pada gambar.</p>\r\n\r\n<p>Alamat : Jl. Rahadi Ismail</p>\r\n', '480901014539532', 'WhatsApp Image 2021-07-13 at 09.57.02.jpeg', '', 'Menunggu Konfirmasi', 'Belum Bayar', '2021-07-15 06:58:51', 0, '', '', '', ''),
(59, 11, 7, 'PINTU LAPIS', '6', '4', '<p>aiwudhi</p>\r\n', '480901014539532', 'WhatsApp Image 2021-07-13 at 09.57.02.jpeg', '', 'Menunggu Konfirmasi', 'Belum Bayar', '2021-07-15 07:53:16', 0, '', '', '', ''),
(61, 19, 9, 'Kompas + Sepeda', '2', '2', '<p>ijoawda</p>\r\n\r\n<p>dawjdoawkdpa</p>\r\n\r\n<p>dadlawm</p>\r\n', '123456', '431943.jpg', '400000', 'Selesai', 'Lunas', '2021-08-26 11:25:49', 0, '609604.jpg', '', 'Pesanan diterima', 'Sudah Dikirim'),
(62, 19, 9, 'Kompas + Sepeda', '20', '3', '<p>dawdawrawr</p>\r\n', '123456', 'Screenshot_2021-07-17-12-45-35-22.jpg', '', 'Menunggu Konfirmasi', 'Belum Bayar', '2021-08-29 21:49:49', 0, '', '', '', ''),
(63, 19, 9, 'Kompas + Sepeda', '2', '3', '<p>dawdawdaw</p>\r\n', '123456', 'Screenshot_2021-07-17-12-45-35-22.jpg', '', 'Menunggu Konfirmasi', 'Belum Bayar', '2021-08-30 11:30:39', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode_keranjang` char(5) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `status_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `parent_komentar_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_pengirim` varchar(20) NOT NULL,
  `nama_penjual` varchar(20) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `komentar` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_chat` enum('N','Y') NOT NULL,
  `status_penjual` varchar(20) NOT NULL,
  `hapus_drpembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `parent_komentar_id`, `id_produk`, `id_pembeli`, `id_penjual`, `nama_pengirim`, `nama_penjual`, `nama_produk`, `komentar`, `date`, `status_chat`, `status_penjual`, `hapus_drpembeli`) VALUES
(102, 0, 29, 9, 10, 'Dustin Tifani', '', 'Lemari', 'LLLLLLLLLLLL', '2021-06-26 01:18:53', 'N', '', 'Y'),
(103, 102, 29, 9, 10, '', 'Dopung', 'Lemari', 'L ??????????', '2021-06-26 01:19:09', 'Y', 'Y', ''),
(104, 0, 29, 9, 10, 'Dustin Tifani', '', 'Lemari', 'IYA LLLLLLLLLL', '2021-06-26 01:19:38', 'N', '', 'Y'),
(105, 104, 29, 9, 10, '', 'Dopung', 'Lemari', '????????', '2021-06-26 01:19:49', 'Y', 'Y', ''),
(109, 103, 29, 9, 10, '', 'Dopung', 'Lemari', 'kokoko ??', '2021-07-03 19:27:24', 'Y', 'N', ''),
(110, 0, 35, 7, 11, 'Riyan', '', 'PINTU HENDERSON', 'p', '2021-07-15 16:51:58', 'N', '', 'N'),
(111, 110, 35, 7, 11, '', 'JASA LAS', 'PINTU HENDERSON', '?', '2021-07-15 16:52:13', 'Y', 'Y', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `tlp_pembeli` varchar(15) NOT NULL,
  `alamat_pembeli` longtext NOT NULL,
  `email_pembeli` varchar(225) NOT NULL,
  `password_pembeli` varchar(225) NOT NULL,
  `gambar_pembeli` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `tlp_pembeli`, `alamat_pembeli`, `email_pembeli`, `password_pembeli`, `gambar_pembeli`) VALUES
(1, 'Junaidi', '08976754345', '<p>Jalan sisingamangaraja</p>\r\n', '123', '12345', 'user.jpg'),
(2, 'Eko prasetyo', '234545', 'wrterte', 'a@gmail.com', '12345', 'avatar04.png'),
(3, 'Ryan Praskito', '089765', 'sasasas', 'ryan', 'ryan', ''),
(5, 'Aku', '345345', 'rytyrtyrtyrtyrt', '675', '6756', ''),
(6, 'Novita', '089767564234', 'Jl.Karya Tani, Block M, No.32', 'novi@gmail.com', '12345', ''),
(7, 'Riyan', '085251087434', 'Jl.Rahadi Ismail', 'riyan@gmail.com', 'riyan21', ''),
(8, 'EKO', '623786793493', 'Ketapang KALBAR', 'eko@gmail.com', 'eko21', ''),
(9, 'Dustin Tifani', '08989898989', 'Jl. Merdeka', 'dustin@gmail.com', '123456', ''),
(10, 'Coki Pardede', '08787878', 'Jl. Merdeka', 'coki@gmail.com', '123456', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `nama_penjual` varchar(15) NOT NULL,
  `tlp_penjual` varchar(15) NOT NULL,
  `alamat_penjual` longtext NOT NULL,
  `email_penjual` varchar(225) NOT NULL,
  `password_penjual` varchar(225) NOT NULL,
  `status_pendaftaran` varchar(255) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `foto_ktp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama_penjual`, `tlp_penjual`, `alamat_penjual`, `email_penjual`, `password_penjual`, `status_pendaftaran`, `no_rek`, `foto_ktp`) VALUES
(3, 'BINTANG LAS', '+6281256735921', 'Ketapang, Kalimantan Barat', 'bintanglas21@gmail.com', 'bintanglas21', 'Terverifikasi', '71313840', ''),
(11, 'JASA LAS', '081345226066', 'Ketapang, Jl. Rahadi Ismail, Desa Padang', 'jasalas@gmail.com', 'jasalas21', 'Terverifikasi', '480901014539532', ''),
(12, 'POLITAP', '+6289529022798', 'Jl.Rahadi Ismail, RT/RW : 003/002, Kelurahan Tuan-Tuan, Kecamatan Benua Kayong, Ketapang, Kalimantan Barat.', 'politap@gmail.com', 'politap21', 'Terverifikasi', '3042018292', ''),
(19, 'Sukajan', '911', 'Jl.911', 'sukajan@gmail.com', 'suka12', 'Terverifikasi', '123456', 'wall palestin transformers.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `harga_produk` double NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `gambar_produk` varchar(225) NOT NULL,
  `gambar_produk_2` varchar(225) NOT NULL,
  `gambar_produk_3` varchar(225) NOT NULL,
  `no_rek_penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_penjual`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `gambar_produk_2`, `gambar_produk_3`, `no_rek_penjual`) VALUES
(8, 3, 'TERALIS', 250000, '<p>Teralis ini dibuat menggunakan bahan :</p>\r\n\r\n<p>-Beton 6</p>\r\n\r\n<p>-Besi Hollow/Besi Hitam</p>\r\n\r\n<p>Harga dari teralis ini di hitung per/Meter.</p>\r\n\r\n<p>Untuk info lebih lanjut segera hubungi kontak di bawah ini :</p>\r\n\r\n<p>Pemilik Bengkel : Syarif Suparman</p>\r\n\r\n<p>No.Telp/WA : +6285346344440</p>\r\n\r\n<p>Atau juga bisa menghubungi teknisi kami :</p>\r\n\r\n<p>Teknisi : Nizar Firdaus Fanani</p>\r\n\r\n<p>No.Telp : +62895363799699</p>\r\n', 'IMG_20210112_165035.jpg', 'WhatsApp Image 2021-07-13 at 09.40.34 (4).jpeg', 'WhatsApp Image 2021-07-13 at 09.40.34 (3).jpeg', '020801014414538'),
(9, 3, 'PINTU ROLLING DOOR', 650000, '<p>Pintu/Rolling Door ini dibuat menggunakan bahan :</p>\r\n\r\n<p>-Besi Strip</p>\r\n\r\n<p>-Besi UNP</p>\r\n\r\n<p>-Besi Join Plat</p>\r\n\r\n<p>-Besi Box/Profil</p>\r\n\r\n<p>-Beton 19</p>\r\n\r\n<p>-Besi Siku</p>\r\n\r\n<p>-Daun Pintu/Plat Pintu</p>\r\n\r\n<p>Harga dari Pintu/Rolling Door ini di hitung per/Meter.</p>\r\n\r\n<p>Untuk info lebih lanjut segera hubungi kontak di bawah ini :</p>\r\n\r\n<p>Pemilik Bengkel : Syarif Suparman</p>\r\n\r\n<p>No.Telp/WA : +6285346344440</p>\r\n\r\n<p>Atau juga bisa menghubungi teknisi kami :</p>\r\n\r\n<p>Teknisi : Nizar Firdaus Fanani</p>\r\n\r\n<p>No.Telp : +62895363799699</p>\r\n', 'IMG_20210112_170914.jpg', 'WhatsApp Image 2021-07-13 at 09.40.34 (2).jpeg', 'image.jfif', '71313840'),
(36, 11, 'PINTU LAPIS', 1200000, '<p>Pintu Lapis ini di buat menggunakan &nbsp;bahan:<br />\r\n-Hollow 40/40</p>\r\n\r\n<p>-Nako 12<br />\r\nHarga disesuaikan per/Meter.<br />\r\nUntuk info lebih lanjut segera hubungi kontak dibawah ini:<br />\r\nPemilik Bengkel: Bang Sis<br />\r\nNo.Telp : 081345226066</p>\r\n', 'WhatsApp Image 2021-07-13 at 09.57.02.jpeg', 'WhatsApp Image 2021-07-13 at 09.57.01 (1).jpeg', 'WhatsApp Image 2021-07-13 at 09.57.02 (1).jpeg', '480901014539532'),
(37, 11, 'LANDING TANGGA/PAGAR TANGGA', 500000, '<p>Pagar Tangga ini di buat menggunakan &nbsp;bahan:<br />\r\n-Hollow 40:40/Besi Hitam<br />\r\n-Pipa Stainless 2 in</p>\r\n\r\n<p>-Nako12<br />\r\nHarga disesuaikan per/Meter.<br />\r\nUntuk info lebih lanjut segera hubungi kontak dibawah ini:<br />\r\nPemilik Bengkel: Bang Sis<br />\r\nNo.Telp : 081345226066</p>\r\n', 'WhatsApp Image 2021-07-13 at 09.57.04 (1).jpeg', 'WhatsApp Image 2021-07-13 at 09.57.01.jpeg', 'WhatsApp Image 2021-07-13 at 09.57.06.jpeg', '480901014539532'),
(38, 11, 'POLDING GATE', 700000, '<p>Pagar Polding Gate ini di buat menggunakan &nbsp;bahan:</p>\r\n\r\n<p>-Besi Strip</p>\r\n\r\n<p>-Besi UNP</p>\r\n\r\n<p>-Besi Join Plat</p>\r\n\r\n<p>-Besi Box/Profil</p>\r\n\r\n<p>-Beton 19</p>\r\n\r\n<p>-Besi Siku</p>\r\n\r\n<p>-Daun Pintu/Plat Pintu<br />\r\nHarga disesuaikan per/Meter.<br />\r\nUntuk info lebih lanjut segera hubungi kontak dibawah ini:<br />\r\nPemilik Bengkel: Bang Sis<br />\r\nNo.Telp : 081345226066</p>\r\n', 'WhatsApp Image 2021-07-13 at 09.57.04.jpeg', 'WhatsApp Image 2021-07-13 at 09.57.05 (1).jpeg', 'WhatsApp Image 2021-07-13 at 09.57.05.jpeg', '480901014539532'),
(40, 19, 'Kompas + Sepeda', 100000, 'Barang terbuat dari besi', '431943.jpg', 'G.jpeg', 'black-1072366_960_720.jpg', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `kode_keranjang` char(5) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` varchar(100) NOT NULL,
  `no_rek_penjual` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(225) NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `hasil_penjualan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `kode_keranjang`, `id_pembeli`, `id_produk`, `banyak`, `harga`, `tgl_transaksi`, `status_transaksi`, `no_rek_penjual`, `bukti_pembayaran`, `status_barang`, `hasil_penjualan`) VALUES
(90, 'T0001', 7, 37, 2, 500000, '2021-08-26 01:20:23', 'Menunggu konfirmasi', '480901014539532', 'Belum Bayar', '', ''),
(92, 'T0002', 7, 38, 1, 700000, '2021-08-26 01:20:23', 'Menunggu konfirmasi', '480901014539532', 'Belum Bayar', '', ''),
(93, 'T0003', 7, 36, 1, 1200000, '2021-08-26 01:20:23', 'Menunggu konfirmasi', '480901014539532', 'Belum Bayar', '', ''),
(97, 'T0004', 9, 40, 1, 100000, '2021-08-26 06:09:40', 'Selesai', '123456', 'canadanaturecorner1920x1080wallpaper10144.jpg', 'Pesanan diterima', 'Sudah Dikirim');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
