-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Ne 24.Máj 2020, 17:58
-- Verzia serveru: 10.4.8-MariaDB
-- Verzia PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `volejbal`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `hala`
--

CREATE TABLE `hala` (
  `hala_id` int(11) NOT NULL,
  `nazov` varchar(35) NOT NULL,
  `mestoid` int(11) NOT NULL,
  `adresa` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `hala`
--

INSERT INTO `hala` (`hala_id`, `nazov`, `mestoid`, `adresa`) VALUES
(1, 'KAS. jedlika', 1, 'Sportová 176'),
(2, 'ZS Bernolakova', 3, 'Brzká 11'),
(3, 'sportova hala mladosť', 5, 'Brumeho 123'),
(4, 'SAPS', 2, 'Velká 01'),
(5, 'Action Park', 6, 'Gorkého 123'),
(6, 'DNV sport', 5, 'Zelená 1');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `hrac`
--

CREATE TABLE `hrac` (
  `hracid` int(11) NOT NULL,
  `meno` varchar(35) NOT NULL,
  `priezvisko` varchar(35) NOT NULL,
  `rok_narodenia` date NOT NULL,
  `cislo_registracie` varchar(25) NOT NULL,
  `foto` blob NOT NULL,
  `tim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `hrac`
--

INSERT INTO `hrac` (`hracid`, `meno`, `priezvisko`, `rok_narodenia`, `cislo_registracie`, `foto`, `tim_id`) VALUES
(1, 'Jozef', 'Milan', '1992-05-12', 'JM19920512', 0x61613365322d70696374757265312e6a7067, 1),
(2, 'Milan', 'Ferehvar', '2011-02-07', 'MF07022011', 0x35343066662d70696374322e6a7067, 0),
(3, 'Jan', 'Brumcl', '2006-02-17', 'JB17022006', 0x64623363612d70696374332e6a7067, 3),
(4, 'Peter', 'Hurhaj', '1987-05-29', 'PH29051987', 0x63376538372d70696374342e6a7067, 4),
(5, 'michal', 'Krchnak', '1995-05-11', 'MK11051995', 0x36346335642d70696374352e6a7067, 3);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ligy`
--

CREATE TABLE `ligy` (
  `ligaid` int(11) NOT NULL,
  `nazov` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `ligy`
--

INSERT INTO `ligy` (`ligaid`, `nazov`) VALUES
(1, 'SVF - I. volejbalová liga'),
(2, 'SVF - Extraliga'),
(3, 'SVF - II. volejbalová liga');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `mesto`
--

CREATE TABLE `mesto` (
  `mestoid` int(11) NOT NULL,
  `nazov` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `mesto`
--

INSERT INTO `mesto` (`mestoid`, `nazov`) VALUES
(1, 'Nitra'),
(2, 'Bratislava'),
(3, 'Nové Zámky'),
(4, 'Prešov'),
(5, 'Prievidza'),
(6, 'Senec'),
(7, 'Komárno'),
(8, 'Zvolen'),
(9, 'Poprad'),
(10, 'Banská Bystrica');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tim`
--

CREATE TABLE `tim` (
  `tim_id` int(11) NOT NULL,
  `nazov` varchar(35) NOT NULL,
  `vznik` date NOT NULL,
  `ligaid` int(11) NOT NULL,
  `halaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `tim`
--

INSERT INTO `tim` (`tim_id`, `nazov`, `vznik`, `ligaid`, `halaid`) VALUES
(1, 'VKP Bratislava', '1984-05-11', 1, 6),
(3, 'ŠK Komjatice', '1992-05-11', 1, 2),
(4, 'HIT Trnava', '1995-05-19', 2, 1),
(5, 'COP Trenčin', '1982-05-29', 1, 3),
(6, 'PDS Prievidza', '1985-08-16', 2, 4);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zapas`
--

CREATE TABLE `zapas` (
  `zapasid` int(11) NOT NULL,
  `tim_id1` int(11) NOT NULL,
  `tim_id2` int(11) NOT NULL,
  `halaid` int(11) NOT NULL,
  `datum_zapasu` date NOT NULL,
  `vysledok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `zapas`
--

INSERT INTO `zapas` (`zapasid`, `tim_id1`, `tim_id2`, `halaid`, `datum_zapasu`, `vysledok`) VALUES
(1, 4, 3, 1, '2020-05-22', '(3:0)'),
(2, 6, 6, 3, '2020-05-22', '(3:1)'),
(3, 6, 5, 4, '2020-05-21', ''),
(4, 3, 1, 5, '2020-05-07', ''),
(5, 3, 5, 3, '2020-06-24', '');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `hala`
--
ALTER TABLE `hala`
  ADD PRIMARY KEY (`hala_id`);

--
-- Indexy pre tabuľku `hrac`
--
ALTER TABLE `hrac`
  ADD PRIMARY KEY (`hracid`);

--
-- Indexy pre tabuľku `ligy`
--
ALTER TABLE `ligy`
  ADD PRIMARY KEY (`ligaid`);

--
-- Indexy pre tabuľku `mesto`
--
ALTER TABLE `mesto`
  ADD PRIMARY KEY (`mestoid`);

--
-- Indexy pre tabuľku `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`tim_id`);

--
-- Indexy pre tabuľku `zapas`
--
ALTER TABLE `zapas`
  ADD PRIMARY KEY (`zapasid`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `hala`
--
ALTER TABLE `hala`
  MODIFY `hala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `hrac`
--
ALTER TABLE `hrac`
  MODIFY `hracid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `ligy`
--
ALTER TABLE `ligy`
  MODIFY `ligaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pre tabuľku `mesto`
--
ALTER TABLE `mesto`
  MODIFY `mestoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `tim`
--
ALTER TABLE `tim`
  MODIFY `tim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `zapas`
--
ALTER TABLE `zapas`
  MODIFY `zapasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
