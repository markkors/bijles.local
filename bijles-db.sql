-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 13 dec 2021 om 10:52
-- Serverversie: 8.0.27
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bijles-db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `updated`) VALUES
(1, 'admin0', 'admin0', '2021-12-10 12:33:41'),
(2, 'admin1', 'admin1', '2021-12-04 14:37:49'),
(3, 'admin2', 'admin2', '2021-12-04 14:37:49'),
(4, 'admin3', 'admin3', '2021-12-04 14:37:49'),
(5, 'jan', 'password', '2021-12-10 13:34:13'),
(6, 'piet', 'password', '2021-12-10 13:39:25'),
(7, 'henk', '$2y$10$RqlzMZYVt9dshxV2WzbY/.eNqxRxYdh6OfyuC4wO5BAgvVdGcMDVC', '2021-12-10 13:45:32'),
(8, 'mark', '$2y$10$CbNnS2vaqI3erTfEqBZpT.GraAvW96jfhOxyiYHiIKHwK3AzyCZ1q', '2021-12-10 14:00:01');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
