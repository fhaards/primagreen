-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2021 pada 01.13
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
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) NOT NULL,
  `main_banner` text NOT NULL,
  `login_banner` text NOT NULL,
  `regist_banner` text NOT NULL,
  `contactus_banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `main_banner`, `login_banner`, `regist_banner`, `contactus_banner`) VALUES
(11, 'faff70f9ab8823bd4e78c1dfb5157f05.png', 'e761e57969bd6c1d5ece015c6fd8ae5a.png', 'd74371c9bdbd8d7a265c1ceabce86fae.jpg', '78dbed9a22bc3b20a26f513fcc94566c.jpg');

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
(1, '54584445563', 'Primagreen', '<h2 style=\"padding-left: 40px;\"><strong>What is Primagreen ?</strong></h2>\r\n<p style=\"text-align: justify; padding-left: 40px;\"><strong>Primagreen</strong> is a startup that tries to bring green space wherever you are. Both in Indonesia or other parts of the world. We start a business by bridging farmers who have crops or services but they don\'t get very good results.&nbsp;</p>\r\n<p style=\"text-align: justify; padding-left: 40px;\"><br />Our founders started out as a group of childhood friends that all had a passion for nature and the outdoors. Post college, they ended up becoming roommates. Turns out, having a home filled with plants was something they continued to have in common. Unfortunately, they found it difficult to find a place online to purchase houseplants that was easy to navigate and wasn&rsquo;t just geared to wholesale</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h2 style=\"padding-left: 40px;\"><strong>Why we do that?</strong></h2>\r\n<p style=\"padding-left: 40px;\">Because our focus is providing the socio-economy impact for many of our partners (farmers and job seeker).<br />The products we sell are tropical plants, cactus, succulent and landscape care<br />Primagreen bring green spaces for you!</p>', 'prima_green', '081317352815', '<p>Jl. Rawakalong Selatan No. 44 , Kecamatan Gn. Sindur, Bogor, Jawa Barat</p>', 'a9be88de089f15a51649d25f617401ce.png', '3358b15efc061104e8c1979f6c4367cd.ico');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(10) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date_add` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `question`, `answer`, `date_add`) VALUES
(1, 'Is this an online store, an offline store, a warehouse, or an office?', 'We are an online shop and have an offline store. We have a warehouse for stock and office supplies for our Staff and Customer Service. information about our store can be found on our contact page', '2021-01-15 02:36:58'),
(16, 'When will my order arrive?', 'We take great care in growing, packaging, and shipping your new plants so they’re ready to thrive in your home. This includes keeping them safe while they travel from the greenhouse to your doorstep.\r\n\r\nPlease Note: Due to the precautions we are taking in light of COVID-19 and an increased volume of orders, we are experiencing longer ship times than usual. Your order should ship within 3-4 weeks after being placed.', '2021-01-16 09:04:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id_favorite` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date_favorite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL,
  `nm_kurir` varchar(50) NOT NULL,
  `estimasi` int(10) NOT NULL,
  `harga_kurir` int(10) NOT NULL,
  `status_courier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nm_kurir`, `estimasi`, `harga_kurir`, `status_courier`) VALUES
(1, 'JNE REGULER', 3, 10000, 'Enabled'),
(2, 'JNE YES', 1, 20000, 'Enabled'),
(3, 'SICEPAT EXPRESS', 1, 25000, 'Enabled'),
(4, 'NINJA EXPRESS', 1, 23000, 'Enabled'),
(6, 'KILAT EXPRESS', 4, 6000, 'Disabled'),
(7, 'TESTING ', 1, 1000, 'Disabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msg_guest`
--

CREATE TABLE `msg_guest` (
  `id_msg` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `status_msg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `msg_guest`
--

INSERT INTO `msg_guest` (`id_msg`, `name`, `email`, `subject`, `msg`, `status_msg`) VALUES
(1, 'fhaards', 'm.fahmi37@gmail.com', 'tester', 'tester', 'UNREAD'),
(2, 'fahmi', 'm.fahmi37@gmail.com', 'tester 2', 'my order not updating status', 'UNREAD'),
(3, 'fahmi', 'm.fahmi37@gmail.com', 'tester 2', 'my order not updating status', 'UNREAD'),
(4, 'fahmi', 'm.fahmi37@gmail.com', 'tester 2', 'my order not updating status', 'UNREAD'),
(5, 'fahmi', 'm.fahmi37@gmail.com', 'tester 2', 'my order not updating status', 'UNREAD'),
(6, 'fahmi', 'm.fahmi@mial.com', 'asda', 'asdsadsad', 'UNREAD'),
(7, 'fahmi', 'm.fahmi@mial.com', 'asda', 'asdsadsad', 'UNREAD'),
(8, 'asdasd', 'sadas@mail.com', 'asdasd', 'asdasd', 'UNREAD'),
(9, 'asdasd', 'sadas@mail.com', 'asdasd', 'asdasd', 'UNREAD'),
(10, 'asdasd', 'sadas@mail.com', 'asdasd', 'asdasd', 'UNREAD'),
(11, 'fahmi', 'fahmi37@gmail.com', 'lalala', 'lalalala', 'UNREAD'),
(12, 'thisguest', 'test@mail.com', 'thistestguest', 'teetetetessss', 'UNREAD'),
(13, 'test', 'test@gmail.com', 'test', 'cust_test', 'UNREAD'),
(14, 'test', 'test@gmail.com', 'test', 'cust_test', 'UNREAD'),
(15, 'tested', 'tested@gmail.com', 'tested', 'tested', 'UNREAD'),
(16, 'asdasd', 'asdas@mail.com', 'asdasd', 'asdasdasd', 'UNREAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msg_user`
--

CREATE TABLE `msg_user` (
  `id_msg` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `status_msg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `msg_user`
--

INSERT INTO `msg_user` (`id_msg`, `id_user`, `subject`, `msg`, `status_msg`) VALUES
(1, 45, 'test', 'test1', 'UNREAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_pesan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `no_pemesanan` varchar(50) NOT NULL,
  `qty_pesan` int(2) NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `hrg_kurir` int(10) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `nama_t` text NOT NULL,
  `alamat_t` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_pesan`, `id_user`, `id_barang`, `no_pemesanan`, `qty_pesan`, `id_kurir`, `hrg_kurir`, `total_harga`, `tgl_pesan`, `nama_t`, `alamat_t`, `status`) VALUES
(132, 51, 69, 'MAMN2351027134TR', 1, 1, 10000, 290800, '2021-01-23 02:34:35', 'amril aziz', 'BUKIT DAGO A10 N09 , GUNUNG SINDUR ,  KABUPATEN BOGOR , JAWA BARAT . ZIP CODE : 16340', 'COMPLETE'),
(133, 49, 70, 'MNAC2349028946EE', 1, 3, 25000, 108200, '2021-01-23 02:46:12', 'Muhammad Fahmi', 'PERUMAHAN BUKIT DAGO A9-32  , GUNUNG SINDUR ,  KABUPATEN BOGOR , JAWA BARAT . ZIP CODE : 16340', 'PROCESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_sold`
--

CREATE TABLE `order_sold` (
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
  `tgl_pesan` datetime NOT NULL,
  `tgl_pnjl` datetime NOT NULL,
  `nama_t` text NOT NULL,
  `alamat_t` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_sold`
--

INSERT INTO `order_sold` (`id_penjualan`, `id_user`, `id_barang`, `no_pemesanan`, `qty_pesan`, `p_size`, `id_kurir`, `hrg_kurir`, `no_resi`, `total_harga`, `tgl_pesan`, `tgl_pnjl`, `nama_t`, `alamat_t`) VALUES
(60, 51, 69, 'MAMN2351027134TR', 1, '', 1, 10000, '9879955446', 290800, '2021-01-23 02:34:35', '2021-01-23 02:36:43', 'amril aziz', 'BUKIT DAGO A10 N09 , GUNUNG SINDUR ,  KABUPATEN BOGOR , JAWA BARAT . ZIP CODE : 16340');

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
(33, 'MAMN2351027134TR', 'jangan lama mas please', 'c1d0c7f69aaf8fd7d8b0109f19d5302c.jpg'),
(34, 'MNAC2349028946EE', 'Buru', '9eb735051163e6f4c3fd9bf219582585.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_barang` int(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `nm_barang_bot` varchar(100) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `size` varchar(100) NOT NULL,
  `size_desc` varchar(100) NOT NULL,
  `light` varchar(100) NOT NULL,
  `id_type` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL,
  `detail` text NOT NULL,
  `date_a` date NOT NULL,
  `product_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_barang`, `nm_barang`, `nm_barang_bot`, `sku`, `size`, `size_desc`, `light`, `id_type`, `harga`, `stok`, `gambar`, `gambar2`, `gambar3`, `detail`, `date_a`, `product_status`) VALUES
(69, 'Monstera', 'Monstera Deliciosa', '0050PLNTMON114', 'Extra Large', '26\"-32\" tall, 20\"-26\"', 'Medium', 1, 270000, 47, 'beef5231bd07532863b4035566967829.jpg', 'e2cdff198017e28f1fa72c965ea92d69.jpg', 'e7af25fd8df57596c72890001b4d1723.jpg', '<p>When placed in the right environment, Monsteras are easy to care for and fast-growing&mdash;so give it some space to spread out, make a statement, and thrive! As the Monstera grows, its leaves will develop long ribbons and holes, resembling swiss cheese, giving it a distinct, graphic appearance.</p>\r\n<p>This tropical plant originates from the tropical rainforests of southern Mexico and is extremely adaptable to indoor conditions. Monsteras love bright, indirect light, but will be happy under fluorescent lights as well. Monsteras are climbers, so as they grow, they will want to vine out. This impressive, wild plant is also tolerant of the occasional missed watering, making it an ideal addition for any home.</p>', '2020-12-14', '1'),
(70, 'Bromeliad Aechmea Pink', 'Aechmea fasciata ‘primera’', '0012PLNTBRO281', 'Extra Small', '15\"-20\" tall', 'Low', 1, 80000, 46, 'acb26019bc00703b5e85e6333de263eb.jpg', '60bd29d90875240bd2bcd5e0c3f50e29.jpg', 'default_img.jpg', '<p>Bromeliad Aechmea Pink is a unique, beautiful plant that features colorful, long-lasting blooms. This variety features silver-green leaves and pink blooms. These stunning plants will add a colorful and tropical splash to any space.</p>\r\n<p>Bromeliads are native to Brazil. In their native environments, they typically grow on trees as epiphytes. Because of this, they have minimal roots and absorb most of their nutrients through their foliage.</p>', '2020-12-14', '1'),
(71, 'Philodendron Brasil', 'Philodendron ‘brasil’', '0050PLNTPHI176', 'Medium', '10\"-14\" tall', 'Low', 1, 85000, 48, '22d1b63c93ff2852629e6ad4c9d1653f.jpg', '4a98542eb51148fa2b107cd08c3d2298.jpg', 'a1bdfc21d8d5ee19d813e6898920bbb8.jpg', '<p>The Philodendron Brasil is a fast-growing, easy, vining plant. Its graceful, heart-shaped leaves are dark green with yellow variegation in the center of the leaf. This full, trailing plant is perfect on top of bookshelves or in a plant hanger where its vines can &lsquo;spill&rsquo; out.</p>\r\n<p>The Philodendron Brazil is incredibly forgiving and will tolerate all kinds of neglect including low light, poor soil, and inconsistent watering. This is a great first-time houseplant or gift for anyone who wants to enjoy the natural beauty of plants without a lot of maintenance.</p>', '2020-12-14', '1'),
(72, 'Philodendron Xanadu', 'Philodendron Xanadu', '0065PLNTPHI258', 'Medium', '', 'Medium', 1, 98000, 0, 'e765ae733966f398580dff69955298eb.jpg', '4d36224841bcf07011ceee45e7fd362a.jpg', '4fdce8abc7e7c24b6d99f85a9e0ae664.jpg', '', '2020-12-14', '1'),
(73, 'Philodendron Heartleaf', 'Philodendron cordatum green', '0052PLNTPHI144', 'Small', '7\"-12\" tall', 'Low', 1, 64998, 49, '205a381fbd698c4a56893a3c6b6370f7.jpg', '57b7aa8779396b9c8d226aa16025dea5.jpg', '8ab8e9852512e276a22e455156345894.jpg', '<p>The Philodendron Heartleaf is a fast-growing, easy, vining plant. Its graceful, heart-shaped leaves are dark and glossy green in color but almost look transparent at times. Native to Africa and the Canary Islands, the Heartleaf can be grown as a trailer or climber. This full, trailing plant is perfect on top of bookshelves or in a plant hanger where its vines can &lsquo;spill&rsquo; out.</p>\r\n<p>The Philodendron Heartleaf is incredibly forgiving and will tolerate all kinds of neglect including low light, poor soil, and inconsistent watering. This is a great first-time houseplant or gift for anyone who wants to enjoy the natural beauty of plants without a lot of maintenance.</p>', '2020-12-14', '1'),
(74, 'Catnip', 'Nepeta cataria', '0023PLNTCAT114', 'Small', '', 'Medium', 6, 56000, 47, 'cbfb9ad2b1bc528f908a10d708341cb8.jpg', 'a7248b5485c63c55469753dfcc86361b.jpg', 'default_img.jpg', '<p>Catnip is a must-have for any cat owner. It can be given to your cat fresh or dried. Catnip is safe for cats in small amounts, but some cats may have adverse reactions especially in large amounts. If this is the first time you are giving your cat catnip, we suggest asking your vet first or starting with a very small amount.<br />Catnip can successfully be grown indoors in your kitchen or on a sunny windowsill, but can also be grown outdoors on a patio or balcony. It is also well-suited for container gardening.</p>\r\n<p><em>We cannot guarantee specific size specs as these plants are very fast-growing. After arrival, growth speed will vary depending on environmental conditions such as light, temperature, and how often you water and prune.</em></p>', '2020-12-14', '1'),
(75, 'Mints', 'Mentha', '0081PLNTMIN247', 'Small', '', 'Bright', 6, 55000, 50, '6a4052efcdef003c649ba7468b0211fe.jpg', '1687e577eff95d43da366aa12ff68f61.jpg', 'c3df2772de0574e3cd9ee444bce86e98.jpg', '<p>Mint is one of the easiest herbs to grow. Mint plants love full sun but will also grow in partial shade. Place it on a sunny windowsill in your home or on your patio, or in your garden in the summer. Use this refreshing herb to add a bit of minty freshness to any dish or cocktail. Perfect for a calming tea.</p>\r\n<p>We cannot guarantee specific size specs because these plants are very quick-growing. After arrival, growth will vary on your plant depending on environmental conditions such as light, temperature, how often you water, and how often you prune.</p>', '2020-12-14', '1'),
(76, 'Dragon Tree', 'Dracaena \'Song of India\'', '0078PLNTDRA250', 'Small', '6\"', 'Medium', 5, 150000, 46, 'e7ad56ef7777fe3e0e91e3095e820b92.jpg', 'b36be9615594e7a811bf805b6de805db.jpg', 'a17b247511b3df2e4b4ac5a93d4d0038.jpg', '<p>The Dracaena Plant has narrow smooth leaves with a bright yellow color. This hardy plant has yellow and green leaves that make for a great addition to any area. This Dracaena Song of India in a 4-inch pot is great for larger assortments or areas in your home or office near windows. Dracaenas compose of a large group of popular foliage plants. Most grow strongly upright with long variegated leaves with a large array of colors. Dracaenas grow well at average room temperatures and like ample light.</p>', '2020-12-14', '1'),
(77, 'Zebra Plant', 'Calathea \'Makoyana\'', '0019PLNTZEB129', 'Small', '', 'Medium', 5, 150000, 49, '59f8d2eb751985b62f8d8609269c99f3.jpg', '5d9bd1afa7a89952a3dd6488ca387acf.jpg', '6d379363cccf7876c40417e404113ccb.jpg', '<p>This Calathea Makoyana comes with soft green leaves with uniquely shaped shades. Like all calathea plants, the leaves adjust as the sun rotates throughout the day. Calathea Plants, native to tropical South and Central America, Africa, and the West Indies, are grown primarily for their beautiful, brightly colored, upright, oval leaves.&nbsp;</p>', '2020-12-14', '1');

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
(2, 'Up discount 25%', 'Disabled'),
(4, 'Up discount 50%', 'Disabled'),
(5, 'Easy Indoor Favorites', 'Enabled'),
(6, 'Pet-Friendly Plants', 'Enabled'),
(7, 'Low Light Favorites', 'Enabled'),
(8, 'Best Seller', 'Enabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_features_related`
--

CREATE TABLE `products_features_related` (
  `id_features_related` int(15) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_features` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products_features_related`
--

INSERT INTO `products_features_related` (`id_features_related`, `id_barang`, `id_features`) VALUES
(29, 103, 4),
(30, 103, 5),
(31, 103, 7),
(33, 70, 5),
(34, 71, 5),
(35, 72, 5),
(36, 73, 5),
(37, 74, 5),
(38, 75, 5),
(39, 76, 5),
(45, 77, 5),
(46, 77, 8),
(47, 69, 5),
(48, 69, 6),
(49, 69, 8),
(50, 105, 6),
(51, 107, 6);

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
(5, 'Tropical Indoor', 'Enabled'),
(6, 'Edible Garden', 'Enabled'),
(17, 'Succulents', 'Disabled'),
(19, 'Test', 'Disabled');

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
  `zip_code` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `status_a` int(2) NOT NULL,
  `join_date` datetime NOT NULL,
  `code` varchar(20) NOT NULL,
  `active` int(1) NOT NULL,
  `status_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `tlp`, `alamat`, `zip_code`, `username`, `password`, `level`, `status_a`, `join_date`, `code`, `active`, `status_user`) VALUES
(37, 'Administrator', 'primagreen@admin.com', '', '', '', 'admin', '$2y$10$dHSX3v3BZRWtz5Tt71ri1e2IWzRyLr0b0hkmxmJU4GbDy7TWDvxRu', 'admin', 2, '0000-00-00 00:00:00', '', 0, 0),
(49, 'Muhammad Fahmi', 'bagol37@gmail.com', '081317352815', 'PERUMAHAN BUKIT DAGO A9-32  , GUNUNG SINDUR ,  KABUPATEN BOGOR , JAWA BARAT . ZIP CODE : 16340', '16340', '', '$2y$10$oNGIkzlfYtzQNAvAZPjqB.F7GM.w0aeswhY1VkpHQMcZRqifbqKti', 'user', 2, '2021-01-22 00:14:54', '', 0, 1),
(50, 'Adityo Wardani', 'adityowardani@gmail.com', '', '', '', '', '$2y$10$5l1NLoPMEwRWal3Y6jc4ne8jnRkJGKhpoRqSYevW2qhO0b5DAI9QS', 'user', 2, '2021-01-23 00:48:45', '', 0, 0),
(51, 'amril aziz', 'amrielaziz@gmail.com', '081311664819', 'BUKIT DAGO A10 N09 , GUNUNG SINDUR ,  KABUPATEN BOGOR , JAWA BARAT . ZIP CODE : 16340', '16340', '', '$2y$10$GPaoz07MhQ.FfPqK5Xvce.2ZrMF9QdP2vkj84Xzz24wvonxtEBOMm', 'user', 2, '2021-01-23 02:31:53', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

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
-- Indeks untuk tabel `msg_guest`
--
ALTER TABLE `msg_guest`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indeks untuk tabel `msg_user`
--
ALTER TABLE `msg_user`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `order_sold`
--
ALTER TABLE `order_sold`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `pay_con`
--
ALTER TABLE `pay_con`
  ADD PRIMARY KEY (`id_pay`),
  ADD KEY `no_pemesanan` (`no_pemesanan`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `products_features`
--
ALTER TABLE `products_features`
  ADD PRIMARY KEY (`id_features`);

--
-- Indeks untuk tabel `products_features_related`
--
ALTER TABLE `products_features_related`
  ADD PRIMARY KEY (`id_features_related`);

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
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id_favorite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `msg_guest`
--
ALTER TABLE `msg_guest`
  MODIFY `id_msg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `msg_user`
--
ALTER TABLE `msg_user`
  MODIFY `id_msg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `order_sold`
--
ALTER TABLE `order_sold`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `pay_con`
--
ALTER TABLE `pay_con`
  MODIFY `id_pay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `products_features`
--
ALTER TABLE `products_features`
  MODIFY `id_features` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `products_features_related`
--
ALTER TABLE `products_features_related`
  MODIFY `id_features_related` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `products_type`
--
ALTER TABLE `products_type`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `products` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
