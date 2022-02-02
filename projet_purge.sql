-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2021 at 04:23 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_purge`
--

-- --------------------------------------------------------

--
-- Table structure for table `calibres`
--

CREATE TABLE `calibres` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calibres`
--

INSERT INTO `calibres` (`id`, `libelle`, `created`) VALUES
(4, '5.56 mm', '2021-03-15 16:34:19'),
(5, '7mm', '2021-03-15 16:34:19'),
(6, '7,62 mm', '2021-03-15 16:34:59'),
(7, '9 mm', '2021-03-15 16:34:59'),
(8, '11,43 mm', '2021-03-15 16:35:23'),
(9, '12,7 mm', '2021-03-15 16:35:23'),
(10, '18,5 mm', '2021-03-15 16:35:42'),
(11, '19,7 mm', '2021-03-15 16:35:42'),
(12, 'Non définie', '2021-03-17 12:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gunz`
--

CREATE TABLE `gunz` (
  `id_gun` int(11) NOT NULL,
  `proprietaire` varchar(20) NOT NULL,
  `arme` varchar(20) NOT NULL,
  `poids` varchar(11) NOT NULL,
  `origine` varchar(15) NOT NULL,
  `drapeau` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gunz`
--

INSERT INTO `gunz` (`id_gun`, `proprietaire`, `arme`, `poids`, `origine`, `drapeau`, `image`, `description`, `created`, `id_cal`) VALUES
(13, 'Chris Kyle', 'AK-47', '4,3 kg', 'Russe', 'russie.png', 'ak1.jpg', 'L\'AK-47 (en russe : Автомат Калашникова, « Avtomat Kalachnikova » modèle 1947) est un fusil d\'assaut conçu par l\'ingénieur soviétique Mikhaïl Kalachnikov. L\'AK-47 est le premier modèle d\'une vaste famille de fusils d\'assaut, dont le modèle le plus répandu est l\'AKM.', '2021-03-15 16:44:04', 6),
(16, 'Paul McCartney', 'Ruger AR556', '3,60 Kg', 'Etats-Unis', 'eu.webp', 'ruger_ar556.jpg', 'L’AR-15 est le fusil semi-automatique ayant donné naissance au fusil et carabine militaire M16 et son dérivé allégé, le M-4.\r\nL\'AR-15 originel automatique est différent de la version civile, le CAR-15, fabriqué par Colt sous licence et uniquement semi-automatique.\r\nLa société ArmaLite a développé la première version du fusil, qu\'elle a ensuite vendu à la société Colt. À partir de 1963, le nom AR-15 définit les fusils semi-automatiques et fusils automatiques dérivés du fusil d\'assaut vendus par Colt (nom complet CAR-15). À partir des années 1980, son fabricant la décline en AR-15 Carbine puis Colt Sporter Lighweight, issues des carabines militaires Colt Commando et M4. Les lettres « AR » font non pas référence à assault rifle, « fusil d\'assaut », mais aux deux premières lettres d\'ArmaLite.', '2021-03-16 11:16:16', 4),
(21, 'Melanchon Rodriguez', 'PA35', '0,840 Kg', 'Française', 'fr.gif', 'P1020419MAC1935RM.jpg', 'Arme adoptée en 1937 sous l\'appellation de pistolet automatique de 7,65 mm long modèle 1935 S en même temps que le PA Mle 1935A avec qui elle ne partage en définitive que la munition, aucune pièces n\'étant interchangeables, pas même les chargeurs.\r\nLa production du PA 35S débuta de façon limitée et au jour de l\'armistice en juin 1940 seulement 1404 exemplaires avaient été livrés. L\'occupant l\'adopta probablement tout comme le PA 35A, référencé lui en tant que Pistole 625 (f), mais il ne semble pas que le PA 35S est reçu de nomenclature &quot;allemande&quot;.', '2021-03-16 17:38:53', 5),
(22, 'Velik Johnson', 'Beretta M1931', '0,945 Kg', 'Italie', 'italie.png', 'pistolet-45-mm-co2-umarex-beretta-92-noir-36-joules.jpg', 'Beretta est connu pour le large choix de ses produits, qui comprend des fusils à canons superposés, à canons juxtaposés, des carabines et fusils de chasse, des fusils d\'assaut, des pistolets mitrailleurs, des revolvers simple et double action, des pistolets etc. Les produits Beretta ont la réputation d\'être bien faits, fiables et durables.\r\n\r\nLa compagnie mère Beretta Holding possède aussi Beretta USA, Benelli Armi S.p.A., Franchi, SAKO, Stoeger, Tikka et Uberti.\r\n\r\nEn 1918, le Beretta 1918 était le deuxième pistolet mitrailleur à être utilisé par l\'armée italienne.\r\n\r\nBeretta est également célèbre pour le pistolet Beretta 92FS chambré 9 mm Parabellum. Il a été adopté par un grand nombre de forces armées de premier plan, à commencer par l\'armée américaine en 1985 au cours d\'un processus de sélection controversé. Il y est déployé sous la dénomination de M9 en remplacement du Colt M1911 en service depuis près de 90 ans. L\'une des conditions de l\'accord original était que les 500 000 pistolets commandés devaient être produits sur le territoire national. L\'usine Beretta USA à Accokeek dans le Maryland a donc fabriqué les pistolets à partir de matériaux bruts pour l\'armée, la police et les marchés civils. À la suite de cette commande, le Beretta 92 a été choisi par de nombreuses forces armées et de police, notamment l\'armée française.', '2021-03-17 11:48:33', 7),
(23, 'Tupac Bogota', 'Colt M1911', '1,271 Kg', 'Etats-Unis', 'eu.webp', '1280px-1911A1-JH01.jpg', 'Le M1911 (aussi appelé Automatic Colt Pistol [ACP] ou Colt 45) est un pistolet semi-automatique à platine simple action, avec un chargement par recul. Il a été le pistolet des Forces armées des États-Unis pendant 74 ans, de 1911 à 1985. Les modèles civils et la plupart des modèles livrés aux forces américaines étaient fabriqués par la Colt\'s Patent Fire Arms Manufacturing Company, à Hartford, dans le Connecticut. Le M1911 est une des rares armes à avoir été utilisées massivement lors des deux guerres mondiales.', '2021-03-17 11:50:41', 8),
(24, 'Roff Top', '.50 BMG', '14,100 Kg', 'Etats-Unis', 'eu.webp', 'ST9005-2.jpg', 'La .50 BMG présente une capacité de pénétration, une portée et une précision supérieures aux munitions des mitrailleuses moyennes et légères. Essentiellement tirée depuis la Browning M2, elle a été conservée comme munition standard pour les armées de l\'OTAN. De nombreuses versions ont été développées, balle blindée standard, perforante, traçante, incendiaire et même sous-calibrée avec un sabot détachable.\r\nLa Russie et les pays de l\'ex-pacte de Varsovie possèdent quant à eux les mitrailleuses DShK et NVS 12.7 Utes en calibre 12,7 × 108 mm dont les performances sont comparables à la KPV chambrée en 14,5 mm qui présente une puissance nettement supérieure à la .50 BMG.', '2021-03-17 11:54:31', 9),
(25, 'Tovarich Bratva', 'P90', '3 Kg', 'Belgique', 'belg.png', 'P90--.png', 'Le FN P90 (pour « Fabrique Nationale Projet 90 ») est un pistolet mitrailleur de conception belge fabriqué par la FN Herstal.\r\nCette arme présente des caractéristiques techniques novatrices par rapport aux autres fusils d\'assaut, notamment sa petite taille et sa très forte cadence de tir.\r\nLe P90 est utilisé par les armées et forces de polices de plus de 40 pays, dont l\'Autriche, le Brésil, le Canada, la France, la Grèce, l\'Inde, la Malaisie, la Pologne et les États-Unis1.\r\nBien que développé et vendu initialement en tant que Arme de défense personnelle (PDW), il peut être considéré comme un pistolet-mitrailleur ou un fusil d\'assaut compact2.', '2021-03-17 11:57:07', 7),
(26, 'Heckler Kotch', 'HK MP7', '1,100 Kg', 'Allemagne', 'germ.webp', 'mp7.png', 'Le MP7 est un pistolet-mitrailleur répondant au principe d’Advanced Personal Defense Weapon (APDW) qui vise à combler le fossé entre le pistolet-mitrailleur conventionnel et le fusil d\'assaut. Les PDW sont destinés à doter les troupes qui ne sont pas directement employées dans les combats d’une capacité de riposte significative. Les officiers, équipages de chars ou servants d’artillerie n’ont pas besoin de s’encombrer d’un fusil d’assaut mais doivent néanmoins pouvoir faire face à une attaque inopinée et défaire des adversaires équipés de vestes pare-éclats en mesure de stopper une munition d’arme de poing.\r\n\r\nLe MP7 est la réponse fournie par Heckler &amp; Koch à cette demande. Il s’agit de la deuxième arme mise en production répondant à cet impératif, le premier étant le FN P90 de la FN Herstal. L’idée est de proposer une arme légère tirant une munition spécifique de petit calibre ayant une vitesse à la bouche élevée. Le MP7 tire ainsi une munition originale dont la dernière version est dotée d’un projectile en acier de 4,6 millimètres pour une masse de 2 grammes sortant du canon à 720 mètres par seconde qui est en mesure de perforer un casque ou un gilet pare-balles jusqu’à une distance d’au moins 200 mètres. Lors d’une présentation effectuée en 2003, la munition aurait perforé la protection standardisée CRISAT (constituée de vingt plis de kevlar derrière une plaque d’1,6 mm de titane) à la distance de 300 mètres, ce qui représente le triple du requis OTAN de l’époque3.', '2021-03-17 11:59:24', 7),
(27, 'Lebras Douille', 'SPAS 12', '4,4 kg', 'Italie', 'italie.png', 'spas.jpg', 'Le SPAS 12 est un fusil de combat rapproché semi-automatique à gaz, fabriqué par la société italienne Franchi.\r\nCette arme est restée populaire, surtout au cinéma, grâce à son aspect impressionnant et dissuasif, mais bien moins dans la Police et les unités spéciales.\r\nEn effet, elle souffre d\'une certaine complexité mécanique, d\'un poids élevé et présente donc un désavantage tactique ; c\'est aussi une arme onéreuse. Les fusils à pompe ou semi-auto de type Benelli M3 Super 90 et ses variantes, plus simples d’utilisation et plus légères, sont plus appréciées par les forces de Police, les unités spéciales, les armées, et ce dans de nombreux pays.\r\nLe SPAS 12, est classé en France en catégorie B (achat et détention soumis à autorisation préfectorale) à cause de son système à répétition semi-automatique et de son nombre de cartouche.', '2021-03-17 12:03:51', 9),
(28, 'Senseï Hayman', 'Katana', '1,300 Kg', 'Japon', 'japan.jpg', 'katana.JPG', 'Le katana (刀 ou かたな?) est un sabre (arme blanche courbe à un seul tranchant) de plus de 60 cm. Par extension, le terme katana sert souvent à désigner l\'ensemble des sabres japonais (tachi, uchigatana, etc.).\r\nSymbole de la caste des samouraïs, le katana est une arme de taille (dont on utilise le tranchant) et d\'estoc (dont on utilise la pointe). Il est porté glissé dans la ceinture, tranchant dirigé vers le haut à la ceinture du côté gauche (vers le bas aussi si le porteur est un cavalier). L\'ensemble wakizashi-katana s\'appelle le daishō.\r\nDurant certaines périodes plus calmes de l\'histoire japonaise, le katana avait plus un rôle d\'arme d\'apparat que d\'arme réelle. Sa production dépasse celle du tachi pendant l\'époque de Muromachi (après 1392).', '2021-03-17 12:10:19', 12);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `pass`, `role`, `created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-03-10 13:31:12'),
(2, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, '2021-03-10 13:32:41'),
(3, 'user2', '7e58d63b60197ceb55a1c487989a3720', 3, '2021-03-16 08:42:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibres`
--
ALTER TABLE `calibres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `gunz`
--
ALTER TABLE `gunz`
  ADD PRIMARY KEY (`id_gun`),
  ADD KEY `foreign_key` (`id_cal`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calibres`
--
ALTER TABLE `calibres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gunz`
--
ALTER TABLE `gunz`
  MODIFY `id_gun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gunz`
--
ALTER TABLE `gunz`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`id_cal`) REFERENCES `calibres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
