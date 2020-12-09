-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2020 at 03:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(6) NOT NULL,
  `surface` smallint(6) NOT NULL,
  `prix` double NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`id`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Loue joli appartement de type T3', '1 Rue Bienvenu', 'Lyon', 69006, 90, 1100, 'apart1.jpg', 'location', 'Spacieux et luimineux 2 chambres et une piece commune, proche toutes commodites. 1100E charges comprises, colocation possible. Honoraires a la charge du locataire.'),
(2, 'Appartement T2 43m² Meublé Bien équipé', '19bis Cours Vitton', 'Lyon', 69006, 43, 630, 'apart2.jpg', 'location', 'Dans un immeuble calme et bien entretenu. Proche métro Croix Paquet. Agréable T2 4e avec Ascenseur 2 pièces meublé d\'environ 43m² composé d\'une entrée, séjour, espace salle à manger, cuisine équipée et  aménagée, une chambre, salle de bains.   Chauffage et eau chaude collective.'),
(3, 'Studio 1 pièce 20 m²', '5 Grande Rue de la Guillotiere', 'Lyon', 69007, 20, 565, 'studio1.jpg', 'location', 'Studio meublé et équipé - Métro Jean Jaurès / quartier Gerland\r\n\r\nOffre Flash : frais de dossier offerts pour tout début de bail avant le 31 décembre 2020 !!\r\n\r\nLa résidence étudiante LE UP se situe au coeur du quartier de Gerland, riche de grands espaces verts, de sites majeurs et de bâtiments historiques aux architectures remarquables (Stade de Gerland, Halle Tony Garnier...). Les nombreux commerces et infrastructures de loisirs aux alentours, les transports en commun (métro et tramway à quelques ...'),
(6, 'Studio 20m2 Gorge de loup', '553 Avenue du Marechal Leclerc', 'Lyon', 69009, 20, 550, 'studio2.jpg', 'location', 'Studio meublé 20m2  Métro Gorge de Loup\r\n2ème étage avec ascenseur + interphone\r\nEntrée, placard, cuisine équipée, salle de bain, chauffage individuel\r\nLibre de suite et direct propriétaire\r\nLoyer 550€ charges comprises'),
(7, 'T3 avec terrasse', '272 rue Paul Bert', 'Lyon', 69003, 58, 973, 'apart3.jpg', 'location', 'Au 272, rue Paul Bert - Proximité bus et commerces - Dans un immeuble de 2016 - Au 5ème étage avec ascenseur, beau T3, de 58.70 m², comprenant une entrée, un séjour avec cuisine ouverte aménagée et semi-équipée (meubles + hotte), deux chambres, une salle de bain et un WC. Terrasse de 40.85 m² et balcon de 3.50 m². Chauffage individuel à gaz. Garage au sous-sol. Libre le 21/12/2020.\r\n\r\nLoyer hors charges: 883.68 euros - Provision pour charges: 90.00 euros (avec régularisation annuelle)- Soit un loyer charges comprises de: 973.68 euros - Dépôt de garantie: 883.00 euros - Honoraires de location à la charge du locataire TTC: 763.10 euros (soit 13 euros / m²) dont état des lieux d\'entrée TTC: 176.10 euros ( soit 3 euros / m²).'),
(8, 'Appartement T2 Quai de Saone', '99 Quai de la Saone', 'Lyon', 69009, 49, 830, 'apart4.jpg', '', 'Particulier loue T2 Grande Rue de Saint Rambert dans propriété de caractère, 3ème étage, belle vue sur terrasse-jardin et la Saône, face à l\'Ile Barbe. \r\n\r\nAppartement calme et lumineux avec des prestations de qualité :\r\nIsolation soignée, \r\nFenêtres double vitrage, \r\nSéjour avec cuisine aménagée (plaque vitro céramique, combiné réfrigérateur / congélateur, four à micro ondes...),\r\nChambre, \r\nSdb avec douche à l\'italienne, meuble vasque et WC,\r\nChauffage électrique avec radiateurs fonte ductile Noirot, \r\nInterphone, \r\nFibre optique, \r\nParking vélo. \r\n\r\nBus 31, 40 et 43 station métro Vaise à 10 minutes; Vélo\'v; \r\nCharme des bords de Saône, \r\nEsprit village au pied des monts d\'Or, \r\nTous commerces de proximité.\r\n\r\nDisponible de suite. \r\n\r\nLoyer : 830 € charges comprises\r\nDépôt de garantie : 815 €\r\nMontant des charges : 15€ / mois \r\nPas de frais d\'agence, ni d\'honoraires.  \r\nGaranties financières demandées. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
