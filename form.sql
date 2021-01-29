SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `form` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `form`;

DROP TABLE IF EXISTS `domande`;
CREATE TABLE `domande` (
  `IDDOMANDA` int(11) NOT NULL,
  `TESTO` varchar(250) NOT NULL,
  `OPZIONI` varchar(250) NOT NULL,
  `CORRETTA` int(11) NOT NULL,
  `PUNTEGGIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `domande` (`IDDOMANDA`, `TESTO`, `OPZIONI`, `CORRETTA`, `PUNTEGGIO`) VALUES
(1, 'Da quante ossa è formato lo scheletro umano?', '123;206;178;200', 2, 1),
(2, 'Quale funzione svolge l’apparato cardiocircolatorio?', 'Trasporta il sangue in tutto il corpo;Sorregge e protegge il nostro corpo;Permette la riproduzione', 1, 1),
(3, 'I muscoli sono collegati alle ossa tramite:', 'Cartilagini;Nervi;Tendini', 3, 1);

DROP TABLE IF EXISTS `studenti`;
CREATE TABLE `studenti` (
  `IDSTUDENTE` int(11) NOT NULL,
  `COGNOME` varchar(20) DEFAULT NULL,
  `NOME` varchar(20) DEFAULT NULL,
  `COMUNE` varchar(20) DEFAULT NULL,
  `CLASSE` varchar(20) DEFAULT NULL,
  `Punteggio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `domande`
  ADD PRIMARY KEY (`IDDOMANDA`);

ALTER TABLE `studenti`
  ADD PRIMARY KEY (`IDSTUDENTE`);


ALTER TABLE `domande`
  MODIFY `IDDOMANDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `studenti`
  MODIFY `IDSTUDENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
