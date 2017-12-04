-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 04 Décembre 2017 à 15:30
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `BookSymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfEntry` datetime NOT NULL,
  `releaseDate` datetime NOT NULL,
  `summarize` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `author`, `editor`, `dateOfEntry`, `releaseDate`, `summarize`, `status`, `title`, `picture_id`, `category_id`, `member_id`) VALUES
(1, 'Mark Twain', 'Ldp Jeunesse', '2017-11-30 14:17:00', '2015-02-01 00:00:00', 'Tom n\'aime rien tant que l\'école buissonnière, les expéditions avec ce voyou de Huck, la vie de pirates sur une île du Mississippi, sans oublier la petite Becky. Mais sa tante Polly ne voit pas cela d\'un très bon œil ! Et si elle savait que Tom et Huck, cachés dans un cimetière pendant une terrible nuit, ont vu tuer un homme.', 1, 'Les aventures de Tom Sawyer', 1, 1, NULL),
(2, 'Benoît Duteurtre', 'Roman (broché)', '2017-11-30 15:30:00', '2016-08-21 00:00:00', '"Ce livre est inspiré par la mort de ma mère. La disparition de nos proches souligne la double réalité de l\'âge adulte : tandis que nous courons à l\'abîme, le monde où nous avons grandi s\'efface lui aussi. Ces réflexions traversent un roman très libre, comique et mélancolique. L\'autobiographie s\'y conjugue à l\'essai et à la fiction pour cerner notre destin - et les joies qui éclairent cette fatalité"', 1, 'Livre pour adultes', 2, 2, NULL),
(3, 'Théâtre pour enfants', 'Théâtre pour enfants', '2017-12-01 10:27:00', '2012-04-02 00:00:00', 'Quand les livres s’ouvrent, ils laissent s’échapper une famille souris partie en pique-nique, un garçonnet qui dessine sur les murs de sa chambre, un hippopotame mélomane… Avec Mélo qui mène la danse de sa voix câline, Antonin et sa', 1, 'ET LES LIVRES S\'ANIMENT', 3, 4, NULL),
(4, 'Allan Kardec', 'Essai (poche)', '2017-12-01 10:48:00', '2015-03-01 00:00:00', 'Tables tournantes, oui-ja, alphabet spirite, écriture automatique, médiumnité... tous ces moyens nous permettent-ils vraiment de communiquer avec des esprits ? Allan Kardec s\'est posé cette question en allant à la rencontre de très grands médiums. D\'abord sceptique, il est très vite convaincu de la réalité de l\'au-delà. Ses observations minutieuses et ses nombreuses expériences lui ont prouvé que non seulement les esprits provoquent des phénomènes physiques parfois prodigieux, mais qu\'ils possèdent aussi une connaissance philosophique et spirituelle inestimable. Le livre des esprits contient les réponses des esprits à plus de mille questions sur Dieu, l\'univers, les anges, la réincarnation, les rêves, la télépathie, la prière, les guerres, les inégalités, la liberté, la justice, le suicide, l\'égoïsme, l\'amour, etc. Un livre fondamental pour les personnes en quête de spiritualité. Fermer', 1, 'Le livre des esprits', 4, 5, NULL),
(5, 'Guillaume LEDANOIS', 'Format Kindle', '2017-12-04 14:01:00', '2012-01-01 00:00:00', 'Ce petit livre numérique, dont vous êtes le héros, met en scène votre naufrage sur une île. Il se compose de plusieurs paragraphes numérotés. À la fin de chacun, vous devez choisir entre plusieurs possibilités et selon votre choix, vous êtes redirigé vers un nouveau paragraphe. Attention, chaque décision déterminera la tournure de votre histoire : si vous réussissez, ou non, à survivre à votre naufrage.', 1, 'LIVRE DONT VOUS ETES LE HEROS: L\'histoire de votre naufrage', 5, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Roman'),
(2, 'Roman'),
(4, 'Aventure'),
(5, 'Roman'),
(6, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `login` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `streetAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postalPost` int(11) NOT NULL,
  `registrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `name`, `age`, `login`, `streetAddress`, `city`, `postalPost`, `registrationDate`) VALUES
(1, 'Dehondt', 32, '14173H', '39 bis rue Emile Clainquart', 'Mouchin', 59310, '2017-12-01 15:46:15'),
(2, 'Montois', 27, '20934O', '39 bis rue Emile Clainquart', 'Mouchin', 59310, '2017-12-01 16:40:20'),
(3, 'chris', 32, '28118I', '68 bis rue sainte helene', 'saint andre', 59350, '2017-12-01 16:43:12'),
(4, 'Chris', 36, '49212C', '96 rue ethusc', 'lille', 59800, '2017-12-04 15:17:26');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `picture`
--

INSERT INTO `picture` (`id`, `url`, `alt`) VALUES
(1, 'Les-aventures-de-Tom-Sawyer.jpg', 'Les-aventures-de-Tom-Sawyer.jpg'),
(2, 'Livre-pour-adultes.jpg', 'Livre-pour-adultes.jpg'),
(3, 'ET-LES-LIVRES-S-ANIMENT.jpg', 'ET-LES-LIVRES-S-ANIMENT.jpg'),
(4, 'Le-livre-des-esprits.jpg', 'Le-livre-des-esprits.jpg'),
(5, '1436521384.jpeg', '1436521384.jpeg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CBE5A331EE45BDBF` (`picture_id`),
  ADD KEY `IDX_CBE5A33112469DE2` (`category_id`),
  ADD KEY `IDX_CBE5A3317597D3FE` (`member_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A33112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_CBE5A3317597D3FE` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `FK_CBE5A331EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
