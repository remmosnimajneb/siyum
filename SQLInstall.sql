CREATE DATABASE IF NOT EXISTS `siyum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siyum`;

-- --------------------------------------------------------

--
-- Table structure for table `mishna`
--

CREATE TABLE `mishna` (
  `RowID` int(9) NOT NULL,
  `SiyumID` int(9) NOT NULL,
  `volumeName` varchar(140) NOT NULL,
  `status` int(9) DEFAULT '0',
  `name` varchar(140) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mishna`
--

INSERT INTO `mishna` (`RowID`, `SiyumID`, `volumeName`, `status`, `name`, `email`) VALUES
(1, 1, 'Seder Zeraim', 5, NULL, NULL),
(2, 1, 'Brachot (9)', 0, NULL, NULL),
(3, 1, 'Peah (8)', 0, NULL, NULL),
(4, 1, 'Dmai (7)', 0, NULL, NULL),
(5, 1, 'Kilayim (9)', 0, NULL, NULL),
(6, 1, 'Shviit (1 0)', 0, NULL, NULL),
(7, 1, 'Trumot (11)', 0, NULL, NULL),
(8, 1, 'Maasrot (5)', 0, NULL, NULL),
(9, 1, 'Maasar Sheni (5)', 0, NULL, NULL),
(10, 1, 'Challa (4)', 0, NULL, NULL),
(11, 1, 'Orlah (3)', 0, NULL, NULL),
(12, 1, 'Bikkurim (4)', 0, NULL, NULL),
(13, 1, 'Seder Moed', 5, NULL, NULL),
(14, 1, 'Shabbat (24)', 0, NULL, NULL),
(15, 1, 'Eiruvin (1 0)', 0, NULL, NULL),
(16, 1, 'Pesachim (1 0)', 0, NULL, NULL),
(17, 1, 'Shekalim (8)', 0, NULL, NULL),
(18, 1, 'Yuma (8)', 0, NULL, NULL),
(19, 1, 'Sukkah (5)', 0, NULL, NULL),
(20, 1, 'Beitzah (5)', 0, NULL, NULL),
(21, 1, 'Rosh Hashana (4)', 0, NULL, NULL),
(22, 1, 'Taanit (4)', 0, NULL, NULL),
(23, 1, 'Megillah (4)', 0, NULL, NULL),
(24, 1, 'Moed Katan (3)', 0, NULL, NULL),
(25, 1, 'Chagigah (3)', 0, NULL, NULL),
(26, 1, 'Seder Nashim', 5, NULL, NULL),
(27, 1, 'Yevamot (16)', 0, NULL, NULL),
(28, 1, 'Ketubos (13)', 0, NULL, NULL),
(29, 1, 'Nedarim (11)', 0, NULL, NULL),
(30, 1, 'Nazir (9)', 0, NULL, NULL),
(31, 1, 'Sotah (9)', 0, NULL, NULL),
(32, 1, 'Gittin (9)', 0, NULL, NULL),
(33, 1, 'Kiddushin (4)', 0, NULL, NULL),
(34, 1, 'Seder Nezikin', 5, NULL, NULL),
(35, 1, 'Bava Kama (1 0)', 0, NULL, NULL),
(36, 1, 'Bava Metzia (1 0)', 0, NULL, NULL),
(37, 1, 'Bava Basra (1 0)', 0, NULL, NULL),
(38, 1, 'Sanhedrin (11)', 0, NULL, NULL),
(39, 1, 'Maakot (3)', 0, NULL, NULL),
(40, 1, 'Shevuot (8)', 0, NULL, NULL),
(41, 1, 'Ediyot (8)', 0, NULL, NULL),
(42, 1, 'Avodah Zarah (5)', 0, NULL, NULL),
(43, 1, 'Avot (6)', 0, NULL, NULL),
(44, 1, 'Seder Kedushin', 5, NULL, NULL),
(45, 1, 'Horiyot (3)', 0, NULL, NULL),
(46, 1, 'Zevachim (14)', 0, NULL, NULL),
(47, 1, 'Menachot (13)', 0, NULL, NULL),
(48, 1, 'Chulin (12)', 0, NULL, NULL),
(49, 1, 'Bechorotm (9)', 0, NULL, NULL),
(50, 1, 'Arakhin (9)', 0, NULL, NULL),
(51, 1, 'Tmurah (7)', 0, NULL, NULL),
(52, 1, 'Krisus (6)', 0, NULL, NULL),
(53, 1, 'Meilah (6)', 0, NULL, NULL),
(54, 1, 'Tomid (7)', 0, NULL, NULL),
(55, 1, 'Middot (5)', 0, NULL, NULL),
(56, 1, 'Kinim (3)', 0, NULL, NULL),
(57, 1, 'Seder Taharos', 5, NULL, NULL),
(58, 1, 'Keilim (30)', 0, NULL, NULL),
(59, 1, 'Oholot (18)', 0, NULL, NULL),
(60, 1, 'Negoim (14)', 0, NULL, NULL),
(61, 1, 'Poroh (12)', 0, NULL, NULL),
(62, 1, 'Taharot (10)', 0, NULL, NULL),
(63, 1, 'Mikvaot (10)', 0, NULL, NULL),
(64, 1, 'Niddah (10)', 0, NULL, NULL),
(65, 1, 'Machshirin (6)', 0, NULL, NULL),
(66, 1, 'Zavim (5)', 0, NULL, NULL),
(67, 1, 'Tvul Yom (4)', 0, NULL, NULL),
(68, 1, 'Yadayim (4)', 0, NULL, NULL),
(69, 1, 'Uktzin (3)', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `OptionID` int(9) NOT NULL,
  `OptValue` varchar(120) NOT NULL,
  `OptKey` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`OptionID`, `OptValue`, `OptKey`) VALUES
(1, 'HomepageID', '1');

-- --------------------------------------------------------

--
-- Table structure for table `siyums`
--

CREATE TABLE `siyums` (
  `SiyumID` int(9) NOT NULL,
  `siyumName` varchar(180) NOT NULL,
  `siyumType` varchar(180) NOT NULL,
  `siyumFor` varchar(180) NOT NULL,
  `siyumEndDate` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siyums`
--

INSERT INTO `siyums` (`SiyumID`, `siyumName`, `siyumType`, `siyumFor`, `siyumEndDate`) VALUES
(1, 'Siyum Example', 'mishna', 'Example', '01/01/2999');

-- --------------------------------------------------------

--
-- Table structure for table `talmud`
--

CREATE TABLE `talmud` (
  `RowID` int(9) NOT NULL,
  `SiyumID` int(9) NOT NULL,
  `volumeName` varchar(140) NOT NULL,
  `status` int(9) NOT NULL,
  `name` varchar(140) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanach`
--

CREATE TABLE `tanach` (
  `RowID` int(9) NOT NULL,
  `SiyumID` int(9) NOT NULL,
  `volumeName` varchar(140) NOT NULL,
  `status` int(9) NOT NULL,
  `name` varchar(140) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mishna`
--
ALTER TABLE `mishna`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`OptionID`);

--
-- Indexes for table `siyums`
--
ALTER TABLE `siyums`
  ADD PRIMARY KEY (`SiyumID`);

--
-- Indexes for table `talmud`
--
ALTER TABLE `talmud`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `tanach`
--
ALTER TABLE `tanach`
  ADD PRIMARY KEY (`RowID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mishna`
--
ALTER TABLE `mishna`
  MODIFY `RowID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `OptionID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siyums`
--
ALTER TABLE `siyums`
  MODIFY `SiyumID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `talmud`
--
ALTER TABLE `talmud`
  MODIFY `RowID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanach`
--
ALTER TABLE `tanach`
  MODIFY `RowID` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;
