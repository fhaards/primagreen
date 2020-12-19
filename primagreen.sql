-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2020 pada 06.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primagreen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `nm_barang_bot` varchar(100) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `size` varchar(100) NOT NULL,
  `size_desc` varchar(100) NOT NULL,
  `light` varchar(100) NOT NULL,
  `id_features` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL,
  `detail` text NOT NULL,
  `date_a` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `nm_barang_bot`, `sku`, `size`, `size_desc`, `light`, `id_features`, `id_type`, `harga`, `stok`, `gambar`, `gambar2`, `gambar3`, `detail`, `date_a`) VALUES
(69, 'Monstera', 'Monstera Deliciosa', '0050PLNTMON114', 'Extra Large', '26\"-32\" tall, 20\"-26\"', 'Medium', 1, 1, 270000, 0, 'beef5231bd07532863b4035566967829.jpg', 'e2cdff198017e28f1fa72c965ea92d69.jpg', 'e7af25fd8df57596c72890001b4d1723.jpg', '<p>When placed in the right environment, Monsteras are easy to care for and fast-growing&mdash;so give it some space to spread out, make a statement, and thrive! As the Monstera grows, its leaves will develop long ribbons and holes, resembling swiss cheese, giving it a distinct, graphic appearance.</p>\r\n<p>This tropical plant originates from the tropical rainforests of southern Mexico and is extremely adaptable to indoor conditions. Monsteras love bright, indirect light, but will be happy under fluorescent lights as well. Monsteras are climbers, so as they grow, they will want to vine out. This impressive, wild plant is also tolerant of the occasional missed watering, making it an ideal addition for any home.</p>', '2020-12-14'),
(70, 'Bromeliad Aechmea Pink', 'Aechmea fasciata ‘primera’', '0012PLNTBRO281', 'Extra Small', '15\"-20\" tall', 'Low', 1, 1, 80000, 15, '5465bd6f4d8c9421548e8c56b33c0727.jpg', '4f71222e67ff9e83c1e9b62f9ba63560.jpg', 'default_img.jpg', '<p>Bromeliad Aechmea Pink is a unique, beautiful plant that features colorful, long-lasting blooms. This variety features silver-green leaves and pink blooms. These stunning plants will add a colorful and tropical splash to any space.</p>\r\n<p>Bromeliads are native to Brazil. In their native environments, they typically grow on trees as epiphytes. Because of this, they have minimal roots and absorb most of their nutrients through their foliage.</p>', '2020-12-14'),
(71, 'Philodendron Brasil', 'Philodendron ‘brasil’', '0050PLNTPHI176', 'Medium', '10\"-14\" tall', 'Low', 1, 1, 85000, 5, '22d1b63c93ff2852629e6ad4c9d1653f.jpg', '4a98542eb51148fa2b107cd08c3d2298.jpg', 'a1bdfc21d8d5ee19d813e6898920bbb8.jpg', '<p>The Philodendron Brasil is a fast-growing, easy, vining plant. Its graceful, heart-shaped leaves are dark green with yellow variegation in the center of the leaf. This full, trailing plant is perfect on top of bookshelves or in a plant hanger where its vines can &lsquo;spill&rsquo; out.</p>\r\n<p>The Philodendron Brazil is incredibly forgiving and will tolerate all kinds of neglect including low light, poor soil, and inconsistent watering. This is a great first-time houseplant or gift for anyone who wants to enjoy the natural beauty of plants without a lot of maintenance.</p>', '2020-12-14'),
(72, 'Philodendron Xanadu', 'Philodendron Xanadu', '0065PLNTPHI258', 'Medium', '', 'Medium', 1, 1, 98000, 5, 'e765ae733966f398580dff69955298eb.jpg', '4d36224841bcf07011ceee45e7fd362a.jpg', '4fdce8abc7e7c24b6d99f85a9e0ae664.jpg', '', '2020-12-14'),
(73, 'Philodendron Heartleaf', 'Philodendron cordatum green', '0052PLNTPHI144', 'Small', '7\"-12\" tall', 'Low', 1, 1, 64998, 15, '205a381fbd698c4a56893a3c6b6370f7.jpg', '57b7aa8779396b9c8d226aa16025dea5.jpg', '8ab8e9852512e276a22e455156345894.jpg', '<p>The Philodendron Heartleaf is a fast-growing, easy, vining plant. Its graceful, heart-shaped leaves are dark and glossy green in color but almost look transparent at times. Native to Africa and the Canary Islands, the Heartleaf can be grown as a trailer or climber. This full, trailing plant is perfect on top of bookshelves or in a plant hanger where its vines can &lsquo;spill&rsquo; out.</p>\r\n<p>The Philodendron Heartleaf is incredibly forgiving and will tolerate all kinds of neglect including low light, poor soil, and inconsistent watering. This is a great first-time houseplant or gift for anyone who wants to enjoy the natural beauty of plants without a lot of maintenance.</p>', '2020-12-14'),
(74, 'Catnip', 'Nepeta cataria', '0023PLNTCAT114', 'Small', '', 'Medium', 1, 6, 56000, 18, 'cbfb9ad2b1bc528f908a10d708341cb8.jpg', 'a7248b5485c63c55469753dfcc86361b.jpg', 'default_img.jpg', '<p>Catnip is a must-have for any cat owner. It can be given to your cat fresh or dried. Catnip is safe for cats in small amounts, but some cats may have adverse reactions especially in large amounts. If this is the first time you are giving your cat catnip, we suggest asking your vet first or starting with a very small amount.<br />Catnip can successfully be grown indoors in your kitchen or on a sunny windowsill, but can also be grown outdoors on a patio or balcony. It is also well-suited for container gardening.</p>\r\n<p><em>We cannot guarantee specific size specs as these plants are very fast-growing. After arrival, growth speed will vary depending on environmental conditions such as light, temperature, and how often you water and prune.</em></p>', '2020-12-14'),
(75, 'Mints', 'Mentha', '0081PLNTMIN247', 'Small', '', 'Bright', 1, 6, 55000, 6, '6a4052efcdef003c649ba7468b0211fe.jpg', '1687e577eff95d43da366aa12ff68f61.jpg', 'c3df2772de0574e3cd9ee444bce86e98.jpg', '<p>Mint is one of the easiest herbs to grow. Mint plants love full sun but will also grow in partial shade. Place it on a sunny windowsill in your home or on your patio, or in your garden in the summer. Use this refreshing herb to add a bit of minty freshness to any dish or cocktail. Perfect for a calming tea.</p>\r\n<p>We cannot guarantee specific size specs because these plants are very quick-growing. After arrival, growth will vary on your plant depending on environmental conditions such as light, temperature, how often you water, and how often you prune.</p>', '2020-12-14'),
(76, 'Dragon Tree', 'Dracaena \'Song of India\'', '0078PLNTDRA250', 'Small', '6\"', 'Medium', 1, 5, 150000, 6, 'e7ad56ef7777fe3e0e91e3095e820b92.jpg', 'b36be9615594e7a811bf805b6de805db.jpg', 'a17b247511b3df2e4b4ac5a93d4d0038.jpg', '<p>The Dracaena Plant has narrow smooth leaves with a bright yellow color. This hardy plant has yellow and green leaves that make for a great addition to any area. This Dracaena Song of India in a 4-inch pot is great for larger assortments or areas in your home or office near windows. Dracaenas compose of a large group of popular foliage plants. Most grow strongly upright with long variegated leaves with a large array of colors. Dracaenas grow well at average room temperatures and like ample light.</p>', '2020-12-14'),
(77, 'Zebra Plant', 'Calathea \'Makoyana\'', '0019PLNTZEB129', 'Small', '', 'Medium', 1, 5, 150000, 10, '59f8d2eb751985b62f8d8609269c99f3.jpg', '5d9bd1afa7a89952a3dd6488ca387acf.jpg', '6d379363cccf7876c40417e404113ccb.jpg', '<p>This Calathea Makoyana comes with soft green leaves with uniquely shaped shades. Like all calathea plants, the leaves adjust as the sun rotates throughout the day. Calathea Plants, native to tropical South and Central America, Africa, and the West Indies, are grown primarily for their beautiful, brightly colored, upright, oval leaves.&nbsp;</p>', '2020-12-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty_pesan` int(2) NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `total_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `unique_code` varchar(50) NOT NULL,
  `comp_nm` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `logo` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `unique_code`, `comp_nm`, `about`, `instagram`, `telp`, `address`, `logo`, `icon`) VALUES
(1, '54584445563', 'Primagreen', '<p style=\"text-align: justify;\"><strong>Primagreen</strong> is a startup that tries to bring green space wherever you are. Both in Indonesia or other parts of the world. We start a business by bridging farmers who have crops or services but they don\'t get very good results.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><br />Our founders started out as a group of childhood friends that all had a passion for nature and the outdoors. Post college, they ended up becoming roommates. Turns out, having a home filled with plants was something they continued to have in common. Unfortunately, they found it difficult to find a place online to purchase houseplants that was easy to navigate and wasn&rsquo;t just geared to wholesale</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h2><strong>Why we do that?</strong></h2>\r\n<p>&nbsp;</p>\r\n<p>Because our focus is providing the socio-economy impact for many of our partners (farmers and job seeker).<br />The products we sell are tropical plants, cactus, succulent and landscape care<br />Greenspaces.id bring green spaces for you!</p>', 'prima_green', '081317352815', '<p>Jl. Rawakalong Selatan No. 44 , Kecamatan Gn. Sindur, Bogor, Jawa Barat</p>', 'f092957bd7d1be5f7d7254305ee757be.png', '9bc61b749667c3e37746c1ce8aaeac6b.ico');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(10) NOT NULL,
  `nama_c` text NOT NULL,
  `email_c` text NOT NULL,
  `msg_c` text NOT NULL,
  `tgl` date NOT NULL,
  `time` time NOT NULL,
  `status_c` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `nama_c`, `email_c`, `msg_c`, `tgl`, `time`, `status_c`) VALUES
(8, 'Amril Aziz', 'amrielaziz@gmail.com', 'Terimakasih anda telah memakai wifi saya :)', '2019-07-01', '20:56:21', 2),
(9, 'Yori Aliffa D', 'djamilyorialiffa@gmail.com', 'Assalamualaikum', '2019-07-02', '12:59:28', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `username`, `password`, `level`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id_favorite` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date_favorite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL,
  `nm_kurir` varchar(50) NOT NULL,
  `estimasi` int(10) NOT NULL,
  `harga_kurir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nm_kurir`, `estimasi`, `harga_kurir`) VALUES
(1, 'JNE REGULER', 3, 10000),
(2, 'JNE YES', 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pay_con`
--

CREATE TABLE `pay_con` (
  `id_pay` int(10) NOT NULL,
  `no_pemesanan` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pay_con`
--

INSERT INTO `pay_con` (`id_pay`, `no_pemesanan`, `ket`, `gambar`) VALUES
(4, '7853997092619061128', 'yus', 'image.jpg'),
(5, '2957989852719060926', 'udah', 'contoh_transfer.jpg'),
(6, '5660297613019060423', 'bukti bank LINK', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(7, '4860991140119070359', 'Sudah ya potonya ;)', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(8, '8144419790219070855', 'sudah dikirim bukti tf nya :)', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(9, '2437266060219071155', 'sudah', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(10, '4015356360319070402', 'sudah ya bukti tf nya :)', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(11, '7836322090419071044', 'sudah uplod', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(12, '7575135490419070840', 'sudah saya kirim buktinya :)', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(13, '2304195780419070845', 'sudah yaaaaa', '1527432315_27-05-2018_photo6077615961109800996.jpg'),
(14, '1934818930519070755', 'sudah di poto', '1527432315_27-05-2018_photo6077615961109800996.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `no_pemesanan` varchar(50) NOT NULL,
  `qty_pesan` int(2) NOT NULL,
  `p_size` text NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `hrg_kurir` int(10) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `nama_t` text NOT NULL,
  `alamat_t` text NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_user`, `id_barang`, `no_pemesanan`, `qty_pesan`, `p_size`, `id_kurir`, `hrg_kurir`, `total_harga`, `tgl_pesan`, `nama_t`, `alamat_t`, `status`) VALUES
(46, 24, 62, '7930922190919070615', 1, '', 1, 10000, 800000, '2020-12-09', 'Gumilang Alam', 'Bukit Dago', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `no_pemesanan` varchar(50) NOT NULL,
  `qty_pesan` int(30) NOT NULL,
  `p_size` text NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `hrg_kurir` int(10) NOT NULL,
  `no_resi` text NOT NULL,
  `total_harga` int(20) NOT NULL,
  `tgl_pnjl` date NOT NULL,
  `nama_t` text NOT NULL,
  `alamat_t` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_features`
--

CREATE TABLE `products_features` (
  `id_features` int(10) NOT NULL,
  `nm_features` varchar(50) NOT NULL,
  `status_features` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products_features`
--

INSERT INTO `products_features` (`id_features`, `nm_features`, `status_features`) VALUES
(1, 'None', 'Enabled'),
(2, 'Up discount 25%', 'Disabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_type`
--

CREATE TABLE `products_type` (
  `id_type` int(10) NOT NULL,
  `nm_type` varchar(50) NOT NULL,
  `status_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products_type`
--

INSERT INTO `products_type` (`id_type`, `nm_type`, `status_type`) VALUES
(1, 'Indoor', 'Enabled'),
(2, 'Outdoor', 'Enabled'),
(5, 'Tropical Indoor', 'Disabled'),
(6, 'Edible Garden', 'Enabled'),
(17, 'Succulents', 'Enabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `status_a` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `tlp`, `alamat`, `username`, `password`, `level`, `status_a`) VALUES
(37, 'Administrator', 'primagreen@admin.com', '', '', 'admin', '$2y$10$9GpfUTdCIrSgDtcsD9TRkeW7eYUrrDOmOFTbeuOBEi8.Jdu/LaXJK', 'admin', 2),
(38, 'Example', 'user@user.com', '081317352815', 'Perumahan Bukit Dago A-9 No. 32, Rawakalong , Gn.Sindur , Bogor', 'user', '$2y$10$h4aI4fp3Ou.A0sjnnvuvIOaINRQB8VG2AIcy7g8kDLZA.ytbMjAh6', 'user', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pay_con`
--
ALTER TABLE `pay_con`
  ADD PRIMARY KEY (`id_pay`),
  ADD KEY `no_pemesanan` (`no_pemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `products_features`
--
ALTER TABLE `products_features`
  ADD PRIMARY KEY (`id_features`);

--
-- Indeks untuk tabel `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id_favorite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pay_con`
--
ALTER TABLE `pay_con`
  MODIFY `id_pay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `products_features`
--
ALTER TABLE `products_features`
  MODIFY `id_features` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products_type`
--
ALTER TABLE `products_type`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
