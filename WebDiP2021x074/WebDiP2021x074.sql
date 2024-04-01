-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2022 at 12:25 AM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2021x074`
--

-- --------------------------------------------------------

--
-- Table structure for table `boja`
--

CREATE TABLE `boja` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boja`
--

INSERT INTO `boja` (`id`, `naziv`) VALUES
(1, 'Svjetlo smeda'),
(2, 'Tamno smeda'),
(3, 'Siva'),
(4, 'Krem'),
(5, 'Bijela'),
(6, 'Crvena'),
(7, 'Crno-smeda'),
(8, 'Crveno-smeda'),
(9, 'Zlatno-zuta'),
(10, 'Crni hrast');

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik_rada`
--

CREATE TABLE `dnevnik_rada` (
  `id` int(11) NOT NULL,
  `radnja` varchar(200) DEFAULT NULL,
  `upit` varchar(200) DEFAULT NULL,
  `datum_vrijeme` datetime NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `tip_radnje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dnevnik_rada`
--

INSERT INTO `dnevnik_rada` (`id`, `radnja`, `upit`, `datum_vrijeme`, `korisnik_id`, `tip_radnje_id`) VALUES
(1, 'Dodan novi proizvod', NULL, '2022-04-07 11:27:20', 4, 2),
(2, 'Ažuriranje popusta namještaja - kategorija: hodnik', NULL, '2022-05-04 09:09:29', 2, 2),
(3, 'Dodane nove slike za postojece proizvode', NULL, '2022-04-15 13:29:30', 2, 2),
(4, 'Dodan novi popust za odredene proizvode', NULL, '2022-05-10 10:20:37', 4, 2),
(5, 'Brisanje zapisa iz tablice boja', 'Id zapisa: 14', '2022-06-12 16:36:10', 2, 3),
(6, 'Upisivanje novog zapisa u tablicu boja', 'Id zapisa: 16', '2022-06-12 16:40:28', 2, 5),
(7, 'Ažuriranje zapisa iz tablice boja', 'Id zapisa: 16', '2022-06-12 16:40:39', 2, 4),
(8, 'Brisanje zapisa iz tablice boja', 'Id zapisa: 16', '2022-06-12 16:40:43', 2, 3),
(9, 'Upisivanje novog zapisa u tablicu vrsta_materijala', 'Id zapisa: 11', '2022-06-12 17:41:48', 2, 5),
(10, 'Ažuriranje zapisa iz tablice vrsta_materijala', 'Id zapisa: 11', '2022-06-12 17:41:54', 2, 4),
(11, 'Brisanje zapisa iz tablice vrsta_materijala', 'Id zapisa: 11', '2022-06-12 17:42:01', 2, 3),
(12, 'Ažuriranje zapisa iz tablice korisnik', 'Id zapisa: 7', '2022-06-13 10:35:00', 2, 4),
(13, 'Ažuriranje zapisa iz tablice korisnik', 'Id zapisa: 7', '2022-06-13 10:35:51', 2, 4),
(14, 'Brisanje zapisa iz tablice korisnik', 'Id zapisa: 7', '2022-06-13 10:36:10', 2, 3),
(15, 'Ažuriranje zapisa iz tablice korisnik', 'Id zapisa: 1', '2022-06-13 10:40:37', 2, 4),
(16, 'Ažuriranje zapisa iz tablice korisnik', 'Id zapisa: 10', '2022-06-13 10:41:28', 2, 4),
(17, 'Ažuriranje zapisa iz tablice kategorija_namjestaja', 'Id zapisa: 4', '2022-06-13 10:57:36', 2, 4),
(18, 'Ažuriranje zapisa iz tablice kategorija_namjestaja', 'Id zapisa: 4', '2022-06-13 10:57:42', 2, 4),
(19, 'Ažuriranje zapisa iz tablice kategorija_namjestaja', 'Id zapisa: 4', '2022-06-13 10:58:41', 2, 4),
(20, 'Ažuriranje zapisa iz tablice kategorija_namjestaja', 'Id zapisa: 4', '2022-06-13 10:58:48', 2, 4),
(21, 'Ažuriranje zapisa iz tablice korisnik', 'Id zapisa: 9', '2022-06-13 16:21:58', 2, 4),
(22, 'Uspješna odjava ', '2', '2022-06-13 16:27:03', 2, 1),
(24, 'Uspješna odjava ', '2', '2022-06-13 16:27:19', 2, 1),
(26, 'Uspješna odjava ', '2', '2022-06-13 16:29:52', 2, 1),
(27, 'Uspješna prijava ', '2', '2022-06-13 16:30:08', 2, 2),
(28, 'Uspješna odjava ', '2', '2022-06-13 17:18:13', 2, 1),
(29, 'Uspješna prijava ', '2', '2022-06-13 20:04:32', 2, 2),
(30, 'Uspješna odjava ', '2', '2022-06-13 20:07:25', 2, 1),
(31, 'Uspješna prijava ', '4', '2022-06-13 20:07:36', 4, 2),
(32, 'UspjeÅ¡na prijava ', '2', '2022-06-13 22:31:51', 2, 2),
(33, 'UspjeÅ¡na odjava ', '2', '2022-06-13 22:32:11', 2, 1),
(34, 'UspjeÅ¡na prijava ', '2', '2022-06-13 22:32:20', 2, 2),
(35, 'AÅ¾uriranje zapisa iz tablice korisnik', 'Id zapisa: 9', '2022-06-13 22:32:36', 2, 4),
(36, 'UspjeÅ¡na prijava ', '2', '2022-06-14 12:49:57', 2, 2),
(37, 'UspjeÅ¡na odjava ', '2', '2022-06-14 12:50:06', 2, 1),
(38, 'UspjeÅ¡na prijava ', '2', '2022-06-14 23:04:33', 2, 2),
(39, 'UspjeÅ¡na odjava ', '2', '2022-06-14 23:08:58', 2, 1),
(40, 'UspjeÅ¡na prijava ', '2', '2022-06-14 23:13:38', 2, 2),
(41, 'UspjeÅ¡na prijava ', '2', '2022-06-14 23:24:03', 2, 2),
(42, 'UspjeÅ¡na odjava ', '2', '2022-06-14 23:45:14', 2, 1),
(43, 'UspjeÅ¡na prijava ', '12', '2022-06-14 23:48:50', 12, 2),
(44, 'UspjeÅ¡na odjava ', '12', '2022-06-14 23:48:54', 12, 1),
(45, 'UspjeÅ¡na prijava ', '2', '2022-06-14 23:53:11', 2, 2),
(46, 'UspjeÅ¡na odjava ', '2', '2022-06-14 23:53:13', 2, 1),
(47, 'UspjeÅ¡na prijava ', '4', '2022-06-14 23:53:24', 4, 2),
(48, 'UspjeÅ¡na odjava ', '4', '2022-06-14 23:53:26', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija_namjestaja`
--

CREATE TABLE `kategorija_namjestaja` (
  `id` int(11) NOT NULL,
  `naziv` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorija_namjestaja`
--

INSERT INTO `kategorija_namjestaja` (`id`, `naziv`) VALUES
(1, 'Dnevni boravak'),
(2, 'Namjestaj za kuhinju'),
(3, 'Blagovaonica'),
(4, 'Spavaća soba'),
(5, 'Namjestaj za hodnik');

-- --------------------------------------------------------

--
-- Table structure for table `konfiguracija`
--

CREATE TABLE `konfiguracija` (
  `id` int(10) UNSIGNED NOT NULL,
  `trajanje_kolacica` int(11) DEFAULT NULL,
  `broj_redaka_po_stranici` int(11) DEFAULT NULL,
  `odrzavanje` int(11) DEFAULT NULL,
  `trajanje_sesije` int(11) DEFAULT NULL,
  `broj_neuspjesnih_prijava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfiguracija`
--

INSERT INTO `konfiguracija` (`id`, `trajanje_kolacica`, `broj_redaka_po_stranici`, `odrzavanje`, `trajanje_sesije`, `broj_neuspjesnih_prijava`) VALUES
(1, 172800, 5, 0, 3600, 3);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(45) DEFAULT NULL,
  `korisnicko_ime` varchar(30) DEFAULT NULL,
  `lozinka` varchar(45) DEFAULT NULL,
  `lozinka_256` char(64) DEFAULT NULL,
  `datum_rodenja` date DEFAULT NULL,
  `email_adresa` varchar(45) DEFAULT NULL,
  `broj_neispravnih_prijava` int(11) DEFAULT NULL,
  `datum_registracije` datetime DEFAULT NULL,
  `blokiran` tinyint(1) DEFAULT NULL,
  `aktivacijski_kod` varchar(20) DEFAULT NULL,
  `uvjeti_koristenja` varchar(45) DEFAULT NULL,
  `uloga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime_prezime`, `korisnicko_ime`, `lozinka`, `lozinka_256`, `datum_rodenja`, `email_adresa`, `broj_neispravnih_prijava`, `datum_registracije`, `blokiran`, `aktivacijski_kod`, `uvjeti_koristenja`, `uloga_id`) VALUES
(1, 'Pero Peric', 'pperic', 'pero123', 'e81b72ad6b7eff47a30dac338fb4126f8bd95914eb1cd42397aa0e725c261e29', '2000-04-29', 'peroper@gmail.com', 5, '2022-05-06 02:28:00', 0, 'lRNgy2A4lcI', NULL, 1),
(2, 'Ivo Ivic', 'ivoivic', 'Ivo999', 'ab089f6ac69c5644f25ed80c197b41f3523006ace4cfc42f4d67daeca6607416', '1991-11-28', 'ivic9@gmail.com', 0, '2022-03-07 08:12:43', 0, NULL, NULL, 1),
(3, 'Marko Markic', 'mmarkic', 'lozinka585', '9532731157ce1261f5164a3c2642765816d87b65d9eabaacc66879b9bc6a1fe8', '1999-02-09', 'marko127@gmail.com', 0, '2022-03-16 12:11:32', 0, NULL, NULL, 3),
(4, 'Ivana Lovric', 'ilovric', 'VPtmv4Rf', '46195920b7793b6a97e65142d7b2c5a47804c7609e5356218dac2bdb57547dac', '1995-10-05', 'ivanalovric4@gmail.com', 0, '2022-03-03 11:14:30', 0, NULL, NULL, 2),
(8, 'Mato Matic', 'mmatic', 'jVr8YbyG', '57267f32c4e7b490f4b6b317c94f57b71f8da27982e71ae9585ce10f006c75e6', '2022-06-18', '', 1, '2022-06-04 15:53:00', 0, 'fghfgh', '', 4),
(9, 'bfb', 'vbcv', 'jVr8YbyG', '57267f32c4e7b490f4b6b317c94f57b71f8da27982e71ae9585ce10f006c75e6', '2022-06-19', 'cvbp@gmail.com', 55, '2022-06-19 16:21:00', 0, 'dfgdfg', '', 4),
(10, 'sdfsdf', 'ivoivic1111', 'jVr8YbyG', '57267f32c4e7b490f4b6b317c94f57b71f8da27982e71ae9585ce10f006c75e6', '2022-06-10', 'sdf@edf.ht', 0, '2022-06-12 05:00:52', 0, 'nzVDcGCRqJ8nq9NMmhzn', NULL, 2),
(11, 'Ivan Horvat', 'ihorvat', 'jVr8YbyG', '57267f32c4e7b490f4b6b317c94f57b71f8da27982e71ae9585ce10f006c75e6', '2008-06-04', 'dt@foi.hr', 0, '2022-06-14 11:46:11', 1, 'h4k0Jbj2PXQ', NULL, 3),
(12, 'Ivan Horvat', 'tete', 'jVr8YbyG', '57267f32c4e7b490f4b6b317c94f57b71f8da27982e71ae9585ce10f006c75e6', '2009-02-26', 'gft@foi.hr', 0, '2022-06-14 11:48:33', 0, 'tR1hu48OtGQ', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_kategorijaNamjestaja`
--

CREATE TABLE `korisnik_kategorijaNamjestaja` (
  `kategorijaNamjestaja_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik_kategorijaNamjestaja`
--

INSERT INTO `korisnik_kategorijaNamjestaja` (`kategorijaNamjestaja_id`, `korisnik_id`) VALUES
(2, 1),
(3, 2),
(5, 3),
(1, 4),
(3, 4),
(4, 4),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `namjestaj`
--

CREATE TABLE `namjestaj` (
  `id` int(11) NOT NULL,
  `kategorija_namjestaja_id` int(11) NOT NULL,
  `naziv` varchar(75) NOT NULL,
  `cijena` decimal(10,2) NOT NULL,
  `status_dostupnosti` enum('dostupan','kupljen') NOT NULL,
  `sirina` int(11) NOT NULL,
  `duzina` int(11) NOT NULL,
  `visina` int(11) NOT NULL,
  `vrsta_materijala_id` int(11) NOT NULL,
  `boja_id` int(11) NOT NULL,
  `popust_id` int(11) DEFAULT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namjestaj`
--

INSERT INTO `namjestaj` (`id`, `kategorija_namjestaja_id`, `naziv`, `cijena`, `status_dostupnosti`, `sirina`, `duzina`, `visina`, `vrsta_materijala_id`, `boja_id`, `popust_id`, `korisnik_id`) VALUES
(1, 1, 'Garnitura za dnevnu sobu', '4999.00', 'dostupan', 150, 310, 100, 1, 3, NULL, 4),
(2, 1, 'Fotelja', '1199.00', 'dostupan', 73, 43, 66, 7, 4, NULL, 4),
(3, 4, 'Nocni ormaric', '349.00', 'dostupan', 30, 39, 54, 1, 1, NULL, 4),
(4, 3, 'Stolica - kozna', '599.00', 'dostupan', 43, 58, 96, 9, 6, 3, 2),
(5, 5, 'Garderobni ormar', '1299.00', 'kupljen', 58, 42, 195, 10, 7, 4, 4),
(6, 5, 'A3', '567.00', 'kupljen', 55, 66, 77, 10, 10, 5, 2),
(7, 5, '123123123', '123123.00', 'dostupan', 123, 123, 123, 10, 10, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `datum_vrijeme_isporuke` datetime NOT NULL,
  `kolicina` int(11) NOT NULL,
  `status` enum('u obradi','dostava u tijeku','narucen','isporucen') NOT NULL,
  `datum_kreiranja` datetime NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id`, `datum_vrijeme_isporuke`, `kolicina`, `status`, `datum_kreiranja`, `korisnik_id`) VALUES
(1, '2022-04-21 11:00:00', 3, 'dostava u tijeku', '2022-04-18 14:25:13', 1),
(2, '2022-05-30 13:20:30', 1, 'u obradi', '2022-05-29 09:17:58', 3),
(3, '2022-05-11 10:00:00', 2, 'narucen', '2022-05-09 17:22:38', 3),
(4, '2022-04-04 13:20:00', 4, 'isporucen', '2022-03-30 10:44:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba_namjestaj`
--

CREATE TABLE `narudzba_namjestaj` (
  `namjestaj_id` int(11) NOT NULL,
  `narudzba_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `narudzba_namjestaj`
--

INSERT INTO `narudzba_namjestaj` (`namjestaj_id`, `narudzba_id`) VALUES
(1, 1),
(3, 1),
(5, 2),
(4, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `popusti`
--

CREATE TABLE `popusti` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) DEFAULT NULL,
  `pocetak` date NOT NULL,
  `zavrsetak` date NOT NULL,
  `postotak_snizenja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `popusti`
--

INSERT INTO `popusti` (`id`, `naziv`, `pocetak`, `zavrsetak`, `postotak_snizenja`) VALUES
(1, 'Uskrsnji popust', '2022-04-11', '2022-04-16', 20),
(2, 'Redovni popust', '2022-04-19', '2022-04-21', 10),
(3, 'Vikend popust', '2022-04-28', '2022-04-30', 15),
(4, 'Sezonski popust', '2022-09-25', '2022-09-30', 25),
(5, 'Black friday popust', '2022-11-24', '2022-11-25', 70);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(11) NOT NULL,
  `lokacija` varchar(45) DEFAULT NULL,
  `opis` varchar(45) NOT NULL,
  `namjestaj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `lokacija`, `opis`, `namjestaj_id`) VALUES
(1, '6.jpg', 'Prednja strana garniture', 1),
(2, '5.jpg', 'Izgled stolice iz svih kuteva', 4),
(3, '4.webp', 'Nema slike za ovaj proizvod', 3),
(4, '3.webp', 'Simbolicna slika fotelje', 2),
(5, '2.png', 'Prednja strana ormara', 5),
(8, '1.jpg', '', 6),
(9, '6.jpg', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tip_radnje`
--

CREATE TABLE `tip_radnje` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_radnje`
--

INSERT INTO `tip_radnje` (`id`, `naziv`) VALUES
(1, 'Odjava'),
(2, 'Prijava'),
(3, 'Brisanje'),
(4, 'Azuriranje'),
(5, 'Dodavanje'),
(6, 'Blokiranje korisnika');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Registrirani korisnik'),
(4, 'Neregistrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_materijala`
--

CREATE TABLE `vrsta_materijala` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta_materijala`
--

INSERT INTO `vrsta_materijala` (`id`, `naziv`) VALUES
(1, 'Hrast'),
(2, 'Bukva'),
(3, 'Orah'),
(4, 'Javor'),
(5, 'Bor'),
(6, 'Ariš'),
(7, 'Trešnja'),
(8, 'Smreka'),
(9, 'Jasen'),
(10, 'Lipa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boja`
--
ALTER TABLE `boja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD PRIMARY KEY (`id`,`korisnik_id`,`tip_radnje_id`),
  ADD KEY `fk_dnevnik_rada_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_dnevnik_rada_tip_radnje1_idx` (`tip_radnje_id`);

--
-- Indexes for table `kategorija_namjestaja`
--
ALTER TABLE `kategorija_namjestaja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfiguracija`
--
ALTER TABLE `konfiguracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_korisnik_uloga_idx` (`uloga_id`);

--
-- Indexes for table `korisnik_kategorijaNamjestaja`
--
ALTER TABLE `korisnik_kategorijaNamjestaja`
  ADD PRIMARY KEY (`kategorijaNamjestaja_id`,`korisnik_id`),
  ADD KEY `fk_uloga_kategorija_namjestaja_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `namjestaj`
--
ALTER TABLE `namjestaj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_namjestaj_popusti1_idx` (`popust_id`),
  ADD KEY `fk_namjestaj_boja1_idx` (`boja_id`),
  ADD KEY `fk_namjestaj_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_namjestaj_kategorija_namjestaja1_idx` (`kategorija_namjestaja_id`),
  ADD KEY `fk_namjestaj_vrsta_materijala1_idx` (`vrsta_materijala_id`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_narudzba_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `narudzba_namjestaj`
--
ALTER TABLE `narudzba_namjestaj`
  ADD PRIMARY KEY (`namjestaj_id`,`narudzba_id`),
  ADD KEY `fk_table1_narudzba1_idx` (`narudzba_id`),
  ADD KEY `fk_narudzba_namjestaj_namjestaj1_idx` (`namjestaj_id`);

--
-- Indexes for table `popusti`
--
ALTER TABLE `popusti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_slike_namjestaj1_idx` (`namjestaj_id`);

--
-- Indexes for table `tip_radnje`
--
ALTER TABLE `tip_radnje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vrsta_materijala`
--
ALTER TABLE `vrsta_materijala`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boja`
--
ALTER TABLE `boja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `kategorija_namjestaja`
--
ALTER TABLE `kategorija_namjestaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfiguracija`
--
ALTER TABLE `konfiguracija`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `namjestaj`
--
ALTER TABLE `namjestaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `popusti`
--
ALTER TABLE `popusti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tip_radnje`
--
ALTER TABLE `tip_radnje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vrsta_materijala`
--
ALTER TABLE `vrsta_materijala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD CONSTRAINT `fk_dnevnik_rada_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `fk_dnevnik_rada_tip_radnje1` FOREIGN KEY (`tip_radnje_id`) REFERENCES `tip_radnje` (`id`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_uloga` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`);

--
-- Constraints for table `korisnik_kategorijaNamjestaja`
--
ALTER TABLE `korisnik_kategorijaNamjestaja`
  ADD CONSTRAINT `fk_uloga_kategorijaNamjestaja_kategorijaNamjestaja1` FOREIGN KEY (`kategorijaNamjestaja_id`) REFERENCES `kategorija_namjestaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uloga_kategorija_namjestaja_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `namjestaj`
--
ALTER TABLE `namjestaj`
  ADD CONSTRAINT `fk_namjestaj_boja1` FOREIGN KEY (`boja_id`) REFERENCES `boja` (`id`),
  ADD CONSTRAINT `fk_namjestaj_kategorija_namjestaja1` FOREIGN KEY (`kategorija_namjestaja_id`) REFERENCES `kategorija_namjestaja` (`id`),
  ADD CONSTRAINT `fk_namjestaj_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `fk_namjestaj_popusti1` FOREIGN KEY (`popust_id`) REFERENCES `popusti` (`id`),
  ADD CONSTRAINT `fk_namjestaj_vrsta_materijala1` FOREIGN KEY (`vrsta_materijala_id`) REFERENCES `vrsta_materijala` (`id`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `fk_narudzba_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `narudzba_namjestaj`
--
ALTER TABLE `narudzba_namjestaj`
  ADD CONSTRAINT `fk_narudzba_namjestaj_namjestaj1` FOREIGN KEY (`namjestaj_id`) REFERENCES `namjestaj` (`id`),
  ADD CONSTRAINT `fk_table1_narudzba1` FOREIGN KEY (`narudzba_id`) REFERENCES `narudzba` (`id`);

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `fk_slike_namjestaj1` FOREIGN KEY (`namjestaj_id`) REFERENCES `namjestaj` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
