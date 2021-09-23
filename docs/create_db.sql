-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 23, 2017 alle 15:12
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoEshop`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `es_events`
--

CREATE TABLE `es_events` (
  `id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `createdate` date NOT NULL,
  `idprice` int(8) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `es_gallery`
--

CREATE TABLE `es_gallery` (
  `id` int(3) NOT NULL,
  `event` int(5) NOT NULL DEFAULT '0',
  `dirname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Struttura della tabella `es_images`
--

CREATE TABLE `es_images` (
  `id` int(10) NOT NULL,
  `gallery` int(3) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Struttura della tabella `es_prices`
--

CREATE TABLE `es_prices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `price1` decimal(9,2) NOT NULL,
  `price1sc` decimal(9,2) NOT NULL,
  `price2` decimal(9,2) NOT NULL,
  `price2sc` decimal(9,2) NOT NULL,
  `price3` decimal(9,2) NOT NULL,
  `price3sc` decimal(9,2) NOT NULL,
  `price4` decimal(9,2) NOT NULL,
  `price4sc` decimal(9,2) NOT NULL,
  `price5` decimal(9,2) NOT NULL,
  `price5sc` decimal(9,2) NOT NULL,
  `price6` decimal(9,2) NOT NULL,
  `price6sc` decimal(9,2) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `es_prices`
--

INSERT INTO `es_prices` (`id`, `name`, `note`, `price1`, `price1sc`, `price2`, `price2sc`, `price3`, `price3sc`, `price4`, `price4sc`, `price5`, `price5sc`, `price6`, `price6sc`, `active`) VALUES
(1, 'Standard', 'Lista prezzi standard', '5.00', '4.00', '3.50', '3.00', '4.00', '3.50', '5.00', '4.00', '6.00', '5.00', '10.00', '9.00', 1)

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `es_events`
--
ALTER TABLE `es_events`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `es_gallery`
--
ALTER TABLE `es_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `es_images`
--
ALTER TABLE `es_images`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `es_prices`
--
ALTER TABLE `es_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `es_events`
--
ALTER TABLE `es_events`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `es_gallery`
--
ALTER TABLE `es_gallery`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT per la tabella `es_images`
--
ALTER TABLE `es_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2560;
--
-- AUTO_INCREMENT per la tabella `es_prices`
--
ALTER TABLE `es_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
