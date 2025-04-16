SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS db_pemilu;
USE db_pemilu;

CREATE TABLE `pemilih` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pemilih` (`id`, `nama`) VALUES
(10, 'a'),
(15, 'asa'),
(9, 'asaa'),
(26, 'asaasa'),
(17, 'asawq'),
(31, 'asda'),
(22, 'asdqwsa'),
(23, 'asdwq'),
(21, 'aszZx'),
(8, 'athaya'),
(13, 'ayam'),
(19, 'czxa'),
(24, 'dasda'),
(30, 'fre'),
(29, 'frte'),
(16, 'lo'),
(25, 'lpo'),
(12, 'saxa'),
(11, 'toru'),
(14, 'toru04'),
(20, 'vge'),
(28, 'wq21'),
(27, 'wqwq'),
(18, 'xaza');

CREATE TABLE `suara` (
  `id` int(11) NOT NULL,
  `id_pemilih` int(11) DEFAULT NULL,
  `calon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `suara` (`id`, `id_pemilih`, `calon`) VALUES
(8, 8, 'Athaya'),
(9, 9, 'Athaya'),
(10, 10, 'Athaya'),
(11, 11, 'Athaya'),
(12, 12, 'Athaya'),
(13, 13, 'Priadinata'),
(14, 14, 'Julianti'),
(15, 15, 'Priadinata'),
(16, 16, 'Muluq'),
(17, 17, 'Exka'),
(18, 18, 'Exka'),
(19, 19, 'Muluq'),
(20, 20, 'Athaya'),
(21, 21, 'Athaya'),
(22, 22, 'Athaya'),
(23, 23, 'Athaya'),
(24, 24, 'Priadinata'),
(25, 25, 'Exka'),
(26, 26, 'Julianti'),
(27, 27, 'Exka'),
(28, 28, 'Athaya'),
(29, 29, 'Muluq'),
(30, 30, 'Priadinata'),
(31, 31, 'Muluq');


ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemilih` (`id_pemilih`);

ALTER TABLE `pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `suara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `suara`
  ADD CONSTRAINT `suara_ibfk_1` FOREIGN KEY (`id_pemilih`) REFERENCES `pemilih` (`id`);
COMMIT;