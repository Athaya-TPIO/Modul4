SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS db_survei;
USE db_survei;

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `pilihan` enum('A','B','C','D','E') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `survey` (`id`, `nama`, `usia`, `pilihan`) VALUES
(1, 'athaya', 1, 'A'),
(2, 'athaya', 2, 'A'),
(3, 'athaya', 12, 'C'),
(4, 'Astahsa', 12, 'C'),
(5, 'asdas', 12, 'A'),
(6, 'asdas', 12, 'D'),
(7, 'asdas', 12, 'B'),
(8, 'athaya', 2, 'B'),
(9, 'toru', 2, 'E'),
(10, 'Andi Saputra', 18, 'B'),
(11, 'Rina Kusuma', 21, 'A'),
(12, 'Budi Santoso', 25, 'D'),
(13, 'Sari Melati', 22, 'C'),
(14, 'Dedi Gunawan', 19, 'E'),
(15, 'Nina Lestari', 17, 'A'),
(16, 'Agus Riyadi', 23, 'B'),
(17, 'Lia Permata', 24, 'D'),
(18, 'Rico Haryanto', 20, 'E'),
(19, 'Wulan Cahya', 18, 'C'),
(20, 'athaya', 17, 'B'),
(21, 'athaya', 18, 'B'),
(22, 'asa', 14, 'B'),
(23, 'athaya', 20, 'A'),
(24, 'athaya', 54, 'C');

ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;