-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.28-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database stand
CREATE DATABASE IF NOT EXISTS `stand` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `stand`;

-- Dump della struttura di tabella stand.stand
CREATE TABLE IF NOT EXISTS `stand` (
  `nome` char(50) NOT NULL,
  `portatore` char(50) NOT NULL,
  `potenza_distruttiva` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `velocità` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `raggio_d'azione` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `durezza` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `precisione` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `potenzialità` set('A','B','C','D','E','0','?','∞','dipende') NOT NULL,
  `debutto` set('3','4','5','6') NOT NULL,
  `immagine_user` char(50) DEFAULT NULL,
  `video` char(50) DEFAULT NULL,
  `immagine_stand` char(50) DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella stand.stand: ~107 rows (circa)
INSERT INTO `stand` (`nome`, `portatore`, `potenza_distruttiva`, `velocità`, `raggio_d'azione`, `durezza`, `precisione`, `potenzialità`, `debutto`, `immagine_user`, `video`, `immagine_stand`) VALUES
	('Achtung Baby', 'Shizuka Joestar', 'E', 'E', '0', 'A', 'E', 'A', '4', NULL, NULL, NULL),
	('Aerosmith', 'Narancia Ghirga', 'B', 'B', 'B', 'C', 'E', 'C', '5', NULL, NULL, NULL),
	('Anubis', 'Chaka', 'B', 'B', 'E', 'A', 'E', 'C', '3', '"C:\\Users\\Luigi\\Desktop\\video e immagini\\anubis_us', '"C:\\Users\\Luigi\\Desktop\\video e immagini\\anubis_vi', '"C:\\Users\\Luigi\\Desktop\\video e immagini\\anubis_st'),
	('Aqua Necklace', 'Anjuro "Angelo" Katagiri', 'C', 'C', 'A', 'A', 'C', 'E', '4', NULL, NULL, NULL),
	('Atom Heart Father', 'Yoshihiro Kira', 'E', 'E', '0', 'A', 'E', 'E', '4', NULL, NULL, NULL),
	('Atum', 'Telence T. D\'Arby', 'D', 'C', 'D', 'B', 'D', 'D', '3', '', '', NULL),
	('Baby Face', 'Melone', 'A', 'B', 'A', 'A', 'dipende', 'dipende', '5', NULL, NULL, NULL),
	('Bad Company', 'Keicho Nijimura', 'B', 'B', 'C', 'B', 'C', 'C', '4', NULL, NULL, NULL),
	('Bastet', 'Mariah', 'E', 'E', 'B', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Beach Boy', 'Pesci', 'C', 'B', 'B', 'C', 'C', 'A', '5', NULL, NULL, NULL),
	('Bites the Dust', 'Yoshikage Kira', 'B', 'B', 'A', 'A', 'D', 'A', '4', NULL, NULL, NULL),
	('Black Sabbath', 'Polpo', 'E', 'A', 'A', 'A', 'E', 'E', '5', NULL, NULL, NULL),
	('Bohemian Rhapsody', 'Ungalo', '0', '0', '∞', 'A', '0', '0', '6', NULL, NULL, NULL),
	('Boy II Man', 'Ken Oyanagi', 'C', 'B', 'C', 'A', 'C', 'C', '4', NULL, NULL, NULL),
	('Burning Down the House', 'Emporio Alnino', '0', '0', '0', '0', '0', '0', '6', NULL, NULL, NULL),
	('C-MOON', 'Enrico Pucci', '0', 'B', 'B', '?', '?', '?', '6', NULL, NULL, NULL),
	('Chariot Requiem', 'Jean Pierre Polnareff', 'E', 'E', 'A', 'A', 'E', 'A', '5', NULL, NULL, NULL),
	('Cheap Trick', 'Masazo Kinoto', 'E', 'E', 'E', 'A', 'E', 'E', '4', NULL, NULL, NULL),
	('Cinderella', 'Aya Tsuji', 'D', 'C', 'C', 'C', 'A', 'C', '4', NULL, NULL, NULL),
	('Clash', 'Squalo', 'D', 'A', 'B', 'A', 'A', 'C', '5', NULL, NULL, NULL),
	('Crazy Diamond', 'Josuke Higashikata', 'A', 'A', 'D', 'B', 'B', 'C', '4', NULL, NULL, NULL),
	('Cream', 'Vanilla Ice', 'B', 'B', 'D', 'C', 'C', 'D', '3', NULL, NULL, NULL),
	('Dark Blue Moon', 'Imposter Captain Tennille', 'C', 'C', 'C', 'B', 'C', 'D', '3', NULL, NULL, NULL),
	('Death Thirteen', 'Mannish Boy', 'C', 'C', 'E', 'B', 'D', 'B', '3', NULL, NULL, NULL),
	('Diver Down', 'Narciso Anasui', 'A', 'A', 'E', 'C', 'B', 'B', '6', NULL, NULL, NULL),
	('Dragon\'s Dream', 'Kenzou', '0', '0', '0', 'A', '0', '0', '6', NULL, NULL, NULL),
	('Earth Wind and Fire', 'Mikitaka Hazekura', 'C', 'C', '0', 'A', 'C', 'C', '4', NULL, NULL, NULL),
	('Ebony Devil', 'Devo the Cursed', 'D', 'D', 'A', 'B', 'D', 'B', '3', NULL, NULL, NULL),
	('Echoes (ACT1)', 'Koichi Hirose', 'E', 'E', 'B', 'B', 'C', 'A', '4', NULL, NULL, NULL),
	('Echoes (ACT2)', 'Koichi Hirose', 'C', 'D', 'B', 'B', 'C', 'A', '4', NULL, NULL, NULL),
	('Echoes (ACT3)', 'Koichi Hirose', 'B', 'B', 'C', 'B', 'C', 'A', '4', NULL, NULL, NULL),
	('Emperor', 'Hol Horse', 'B', 'B', 'B', 'C', 'E', 'E', '3', NULL, NULL, NULL),
	('Empress', 'Nena', 'C', 'E', 'A', 'A', 'D', 'D', '3', NULL, NULL, NULL),
	('Enigma', 'Terunosuke Miyamoto', 'E', 'E', 'C', 'A', 'C', 'C', '4', NULL, NULL, NULL),
	('Epitaph', 'Vinegar Doppio', '0', '0', '0', '0', '0', '0', '5', NULL, NULL, NULL),
	('Foo Fighters', 'F.F.', 'B', 'A', 'C', 'A', 'C', 'B', '6', NULL, NULL, NULL),
	('Geb', 'N\'Doul', 'C', 'B', 'A', 'B', 'D', 'D', '3', NULL, NULL, NULL),
	('Gold Experience', 'Giorno Giovanna', 'C', 'A', 'C', 'D', 'C', 'A', '5', NULL, NULL, NULL),
	('Gold Experience Requiem', 'Giorno Giovanna', '0', '0', '0', '0', '0', '0', '5', NULL, NULL, NULL),
	('Goo Goo Dolls', 'Gwess', 'D', 'C', 'B', 'D', 'B', 'B', '6', NULL, NULL, NULL),
	('Green Day', 'Cioccolata', 'A', 'C', 'A', 'A', 'E', 'A', '5', NULL, NULL, NULL),
	('Green, Green Grass of Home', 'The Green Baby', '?', '?', '?', '?', '?', '?', '6', NULL, NULL, NULL),
	('Hanged Man', 'J. Geil', 'C', 'A', 'A', 'B', 'D', 'D', '3', NULL, NULL, NULL),
	('Harvest', 'Shigekiyo "Shigechi" Yangu', 'E', 'B', 'A', 'A', 'E', 'C', '4', NULL, NULL, NULL),
	('Heaven\'s Door', 'Rohan Kishibe', 'D', 'B', 'B', 'B', 'C', 'A', '4', NULL, NULL, NULL),
	('Hermit Purple', 'Joseph Joestar', 'D', 'C', 'D', 'A', 'D', 'E', '3', NULL, NULL, NULL),
	('Hierophant Green', 'Noriaki Kakyoin', 'C', 'B', 'A', 'B', 'C', 'D', '3', NULL, NULL, NULL),
	('High Priestess', 'Midler', 'C', 'B', 'A', 'A', 'D', 'D', '3', NULL, NULL, NULL),
	('Highway Star', 'Yuya Fungami', 'C', 'B', 'A', 'A', 'E', 'C', '4', '(NULL)', NULL, NULL),
	('Highway to Hell', 'Thunder McQueen', 'C', 'C', 'A', 'C', 'C', 'C', '6', NULL, NULL, NULL),
	('Horus', 'Pet Shop', 'B', 'B', 'D', 'C', 'E', 'C', '3', NULL, NULL, NULL),
	('Jail House Lock', 'Miuccia Miuller', '0', 'C', 'B', 'A', '0', '0', '6', NULL, NULL, NULL),
	('Judgement', 'Cameo', 'B', 'B', 'C', 'B', 'D', 'D', '3', NULL, NULL, NULL),
	('Jumpin\' Jack Flash', 'Lang Rangler', 'B', 'C', 'B', 'A', 'D', 'E', '6', NULL, NULL, NULL),
	('Justice', 'Enya the Hag', 'D', 'E', 'A', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Khnum', 'Oingo', 'E', 'E', 'E', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Killer Queen', 'Yoshikage Kira', 'A', 'B', 'D', 'B', 'B', 'A', '4', NULL, NULL, NULL),
	('King Crimson', 'Diavolo', 'A', 'A', 'E', 'E', '?', '?', '5', NULL, NULL, NULL),
	('Kiss', 'Ermes Costello', 'A', 'A', 'A', 'A', 'C', 'A', '6', NULL, NULL, NULL),
	('Kraft Work', 'Sale', 'A', 'A', 'E', 'C', 'E', 'E', '5', NULL, NULL, NULL),
	('Limp Bizkit', 'Sports Maxx', '0', 'B', 'B', 'A', 'C', 'E', '6', NULL, NULL, NULL),
	('Little Feet', 'Formaggio', 'D', 'B', 'E', 'A', 'D', 'C', '5', NULL, NULL, NULL),
	('Love Deluxe', 'Yukako Yamagishi', 'B', 'B', 'C', 'A', 'E', 'B', '4', NULL, NULL, NULL),
	('Lovers', 'Steely Dan', 'E', 'D', 'A', 'A', 'D', 'E', '3', NULL, NULL, NULL),
	('Made in Heaven', 'Enrico Pucci', 'B', '∞', 'C', 'A', 'C', 'A', '6', NULL, NULL, NULL),
	('Magician\'s Red', 'Muhammad Avdol', 'B', 'B', 'C', 'B', 'C', 'D', '3', NULL, NULL, NULL),
	('Man in the Mirror', 'Illuso', 'C', 'C', 'B', 'D', 'C', 'E', '5', NULL, NULL, NULL),
	('Manhattan Transfer', 'Johngalli A.', 'E', 'E', 'A', 'A', 'A', 'C', '6', NULL, NULL, NULL),
	('Marilyn Manson', 'Miraschon', 'E', 'A', 'A', 'A', 'A', 'C', '6', NULL, NULL, NULL),
	('Metallica', 'Risotto Nero', 'C', 'C', 'C', 'A', 'C', 'C', '5', NULL, NULL, NULL),
	('Moody Blues', 'Leone Abbacchio', 'C', 'C', 'A', 'A', 'C', 'C', '5', NULL, NULL, NULL),
	('Mr.President', 'Coco Jumbo', 'E', 'E', 'E', 'A', 'E', 'E', '5', NULL, NULL, NULL),
	('Notorious B.I.G', 'Carne', 'A', '∞', '∞', '∞', 'E', 'A', '5', NULL, NULL, NULL),
	('Oasis', 'Secco', 'A', 'A', 'B', 'A', 'E', 'C', '5', NULL, NULL, NULL),
	('Osiris', 'Daniel J. D\'Arby', 'E', 'D', 'D', 'C', 'D', 'D', '3', NULL, NULL, NULL),
	('Pearl Jam', 'Tonio Trussardi', 'E', 'C', 'B', 'A', 'E', 'C', '4', NULL, NULL, NULL),
	('Planet Waves', 'Viviano Westwood', 'A', 'B', 'A', 'A', 'E', 'E', '6', NULL, NULL, NULL),
	('Purple Haze', 'Pannacotta Fugo', 'A', 'B', 'C', 'E', 'E', 'B', '5', NULL, NULL, NULL),
	('Ratt', 'Ratto', 'B', 'C', 'D', 'B', 'E', 'C', '4', NULL, NULL, NULL),
	('Red Hot Chili Pepper', 'Akira Otoishi', 'A', 'A', 'A', 'A', 'C', 'A', '4', NULL, NULL, NULL),
	('Rolling Stones', 'Scolippi', '0', 'B', 'A', 'A', 'E', '0', '5', NULL, NULL, NULL),
	('Sethan', 'Alessi', 'D', 'D', 'E', 'C', 'D', 'D', '3', NULL, NULL, NULL),
	('Sex Pistols', 'Guido Mista', 'E', 'C', 'B', 'A', 'A', 'B', '5', NULL, NULL, NULL),
	('Sheer Heart Attack', 'Yoshikage Kira', 'A', 'C', 'A', 'A', 'E', 'A', '4', NULL, NULL, NULL),
	('Silver Chariot', 'Jean Pierre Polnareff', 'C', 'A', 'C', 'B', 'B', 'C', '3', NULL, NULL, NULL),
	('Sky High', 'Rikiel', '0', '0', 'B', 'C', '0', '0', '6', NULL, NULL, NULL),
	('Soft Machine', 'Mario Zucchero', 'A', 'C', 'E', 'A', 'D', 'E', '5', NULL, NULL, NULL),
	('Spice Girl', 'Trish Una', 'A', 'A', 'C', 'B', 'D', 'C', '5', NULL, NULL, NULL),
	('Star Platinum', 'Jotaro Kujo', 'A', 'A', 'C', 'A', 'A', 'A', '3', NULL, NULL, NULL),
	('Sticky Fingers', 'Bruno Bucciarati', 'A', 'A', 'C', 'D', 'C', 'D', '5', NULL, NULL, NULL),
	('Stone Free', 'Jolyne Cujoh', 'A', 'B', 'C', 'A', 'C', 'A', '6', NULL, NULL, NULL),
	('Stray Cat', 'Gatto randagio', 'B', 'E', '0', 'A', 'E', 'C', '4', NULL, NULL, NULL),
	('Strength', 'Forever', 'B', 'D', 'D', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Sun', 'Arabia Fats', 'B', 'E', 'A', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Super Fly', 'Toyohiro Kanedaichi', 'E', 'E', '0', 'A', 'E', 'E', '4', NULL, NULL, NULL),
	('Surface', 'Toshikazu Hazamada', 'B', 'B', 'C', 'B', 'C', 'C', '4', NULL, NULL, NULL),
	('Survivor', 'Guccio', 'E', 'E', 'E', 'C', 'E', 'E', '6', NULL, NULL, NULL),
	('Talking Head', 'Tizzano', 'E', 'E', 'B', 'A', 'E', 'E', '5', NULL, NULL, NULL),
	('Tenore Sax', 'Kenny G.', 'E', 'E', 'D', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('The Fool', 'Iggy', 'B', 'C', 'D', 'C', 'D', 'C', '3', NULL, NULL, NULL),
	('The Grateful Dead', 'Prosciutto', 'B', 'E', 'B', 'A', 'E', 'C', '5', NULL, NULL, NULL),
	('The Hand', 'Okuyasu Nijimura', 'B', 'B', 'D', 'C', 'C', 'C', '4', '(NULL)', NULL, NULL),
	('The Lock', 'Tamami Kobayashi', 'E', 'E', 'A', 'A', 'E', 'E', '4', NULL, NULL, NULL),
	('The World', 'DIO', 'A', 'A', 'C', 'A', 'B', 'B', '3', NULL, NULL, NULL),
	('Tohth', 'Boingo', 'E', 'E', 'E', 'A', 'E', 'E', '3', NULL, NULL, NULL),
	('Tower of Gray', 'Gray Fly', 'E', 'A', 'A', 'C', 'E', 'E', '3', NULL, NULL, NULL),
	('Under World', 'Donatello Versus', '0', 'C', 'A', 'C', '0', '0', '6', NULL, NULL, NULL),
	('Weather Report', 'Weather', 'A', 'B', 'C', 'A', 'E', 'A', '6', NULL, NULL, NULL),
	('Wheel of Fortune', 'ZZ', 'B', 'D', 'D', 'A', 'E', 'D', '3', NULL, NULL, NULL),
	('White Album', 'Ghiaccio', 'A', 'C', 'C', 'A', 'E', 'E', '5', NULL, NULL, NULL),
	('Whitesnake', 'Enrico Pucci', '?', 'D', '?', 'A', '?', '?', '6', NULL, NULL, NULL),
	('Yellow Temperance', 'Rubber Soul', 'D', 'C', 'E', 'A', 'E', 'D', '3', NULL, NULL, NULL),
	('Yo-Yo Ma', 'D an G', 'C', 'D', 'A', 'A', 'D', 'C', '6', NULL, NULL, NULL);

-- Dump della struttura di tabella stand.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` char(50) NOT NULL,
  `password` char(50) DEFAULT NULL,
  `nome` char(50) DEFAULT NULL,
  `cognome` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella stand.user: ~0 rows (circa)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
