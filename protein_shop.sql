--
-- Database: `protein_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Myprotein'),
(2, 'Atleticore'),
(3, 'Everlast'),
(4, 'Multipower'),
(5, 'Optimum Nutrition'),
(6, 'QNT'),
(7, 'Sci-Muscle'),
(8, 'Twinlab'),
(9, 'Scitec Nutrition'),
(10, 'BSN');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `items`, `expire_date`, `paid`) VALUES
(1, '[{"id":true,"size":"5000 g","quantity":3}]', '2017-09-02 22:04:09', 0),
(2, '[{"id":true,"size":"1000 g","quantity":5},{"id":false,"size":"2500 g","quantity":4}]', '2017-09-03 15:38:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Proteini', 0),
(2, 'Vitamini', 0),
(3, 'Povećanje mišićne mase', 0),
(4, 'Odjeća i obuća', 0),
(5, 'Fitness sprave i oprema', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `date`, `rating`) VALUES
(15, 'anonymous', 1, 'gwergqg qg rg', '2017-08-04', 4),
(16, 'Ivan', 1, 'comment', '0000-00-00', 0),
(17, 'Ivan', 1, 'comment', '0000-00-00', 0),
(18, 'Ivan', 1, 'comment', '0000-00-00', 0),
(19, 'Ivan', 1, 'comment', '0000-00-00', 0),
(20, 'Ivan', 1, 'wqedqwdfq', '2017-08-04', 2),
(21, 'Ivan', 2, 'valja, prvo masa', '2017-08-04', 5),
(22, 'Ivan', 2, 'more more', '2017-08-04', 1),
(23, 'Ivan', 3, 'daaaaaaaaaa', '2017-08-04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `size1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL DEFAULT '5',
  `reviews` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `brand`, `categories`, `image`, `description`, `featured`, `size1`, `size2`, `size3`, `stars`, `reviews`) VALUES
(1, 'Impact Whey Protein', '299.99', 1, '1', '/masa/images/impact-whey.jpg', '<p>Impact Whey Protein® je proizveden korištenjem prvoklasnog koncentrata proteina sirutke i sadrži 82 % proteinskog sastava. Ako tražite proizvod omjera vrhunske kvalitete i vrijednosti te izvrsnog okusa, na pravom ste mjestu.</p>\n                        <p>Impact Whey Protein®  je bogat izvor koncentrata proteina sirutke iz vegetarijanskog slatkog sira, direktno od vodećih svjetskih proizvođača sirutke. Time što sadrži najvišu biološku vrijednost (BV), višu od bilo kojeg drugog proteina, koncentrat proteina sirutke ima visoku razinu esencijalnih i ne - esencijalnih aminokiselina. Proizvodni proces koristi jedinstvenu kombinaciju tehnologije membranske filtracije i sušenja pri niskoj temperaturi i pritisku. To osigurava precizno odvajanje i koncentraciju proteina te očuvanje prirodne funkcije i visokih prehrambenih vrijednosti čime jamčimo vrhunsku kvalitetu koncentrata proteina sirutke.</p>\n                        <p>Naš Impact Whey Protein® pruža preko 82 g proteina na 100 g praha (suha osnova), sadrži nizak udio laktoze i bogat je kalcijem. Izvrstan je izvor esencijalnih aminokiselina i sadrži najviše proporcije BCAA koje možemo naći u prirodnom proteinu. Sljedivost je ključni dio našeg procesa praćenja kvalitete, a kako bismo ga održali na razini, surađujemo sa vodećim svjetskim proizvođačima sirutke, što osigurava kompletnost znanja i povjerenje u proizvodni proces.</p>\n                        <p>Frakcije proteina su: 44 % Beta lactoglobulin, 17 % Alpha lactalbumin, 1.5 % Bovine serum albumin, 8 % Immunoglobulin G, 0.5 % Lactoferrin, 26 % Glycomacropeptide.</p>\n                        <p><strong>Ključne prednosti:</strong></p>\n                        <ul>\n                            <li><p>Bogat ključnim aminokiselinama</p></li>\n                            <li><p>Doprinosi normalnoj funkciji mišićnog i koštanog sustava</p></li>\n                            <li><p>Smatra se u potpunosti kompletnim proteinom</p></li>\n                        </ul>\n                        <p><strong>Upotreba:</strong> Umiješajte 1 serviranje (25g) u 250 - 350 ml vode ili malomasnog mlijeka. Koristiti 1-3 puta dnevno ili prema potrebi.</p>\n                        <p>Preporučene dnevne doze ne smiju se prekoračiti. Dodatak prehrani nije nadomjestak ili zamjena uravnoteženoj prehrani.</p>', 1, '1000 g', '2500 g', '5000 g', 5, 15),
(2, 'Hidrolized Whey', '499.99', 9, '1', '/masa/images/hydrolyzed_whey_2kg-scitec-500x500.jpg', 'wewsgbarhbhnaer', 1, '', '', '', 4, 12),
(3, 'Delicious Whey Protein', '199.99', 6, '1', '/masa/images/qnt.jpg', 'bla bla bla', 1, '', '', '', 4, 31),
(4, 'Protein Whey', '399.99', 5, '1', '/masa/images/protein-whey.jpg', 'blablabla', 1, '', '', '', 3, 6),
(5, 'Syntha 6 Edge', '449.99', 7, '1', '/masa/images/syntha.jpg', 'bla', 1, '', '', '', 4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_last` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_uid` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_pwd` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'Antonio', 'Falak', 'falak001@gmail.com', 'afalak', '$2y$10$vZTNT95ZcMAgAOtZzGKsBeBWRrgvUDEu.W09hCb237VWnRbFVDK5y'),
(2, 'Ines', 'Prespa', 'prespa89@gmail.com', 'Nesi', '$2y$10$YtxdLdRm7ZdMBBdCnnq9I.6vdm9bzW53rt89q08HYCF3wNPvacyuG'),
(3, 'Ivan', 'Horvat', 'ihorvat@gmail.com', 'Ivan', '$2y$10$wxhIYn7/4jCd8Zz4ROLTTOyHSyAnvpHq5d8L5zC76RroeuqpJcS0i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
