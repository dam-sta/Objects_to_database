-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2023, 08:28
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `staszek`
--

create database if not exists staszek;

use staszek;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cechy`
--

CREATE TABLE `cechy` (
  `ID` int(11) NOT NULL,
  `CECHA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cechy`
--

INSERT INTO `cechy` (`ID`, `CECHA`) VALUES
(1, 'CECHA1'),
(2, 'CECHA2'),
(3, 'CECHA3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obiekty`
--

CREATE TABLE `obiekty` (
  `ID` int(11) NOT NULL,
  `NAZWA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obi_cechy`
--

CREATE TABLE `obi_cechy` (
  `ID_O` int(11) DEFAULT NULL,
  `ID_C` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cechy`
--
ALTER TABLE `cechy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `obiekty`
--
ALTER TABLE `obiekty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `obi_cechy`
--
ALTER TABLE `obi_cechy`
  ADD KEY `ID_O` (`ID_O`),
  ADD KEY `ID_C` (`ID_C`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `cechy`
--
ALTER TABLE `cechy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `obiekty`
--
ALTER TABLE `obiekty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `obi_cechy`
--
ALTER TABLE `obi_cechy`
  ADD CONSTRAINT `obi_cechy_ibfk_1` FOREIGN KEY (`ID_O`) REFERENCES `obiekty` (`ID`),
  ADD CONSTRAINT `obi_cechy_ibfk_2` FOREIGN KEY (`ID_C`) REFERENCES `cechy` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
