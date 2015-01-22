-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 17 Janvier 2015 à 13:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog_smarty`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE IF NOT EXISTS `archives` (
  `id_article` int(11) NOT NULL,
  `date_sup` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `archives`
--

INSERT INTO `archives` (`id_article`, `date_sup`, `id_user`) VALUES
(18, '2015-01-11 23:58:37', 1),
(19, '2015-01-11 23:52:46', 1),
(20, '2015-01-11 23:52:12', 1),
(24, '2015-01-12 00:02:42', 1),
(25, '2015-01-12 00:03:53', 1),
(26, '2015-01-12 00:17:04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `vue` enum('0','1') NOT NULL,
  `a_m_s` enum('a','m','s') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `id_article`, `titre`, `vue`, `a_m_s`) VALUES
(1, 1, 'Ajout', '1', 'a'),
(2, 2, 'Ajout', '1', 'a'),
(3, 3, 'Ajout', '1', 'a'),
(4, 4, 'Ajout', '1', 'a'),
(5, 5, 'Ajout', '1', 'a'),
(6, 5, 'Modification', '1', 'm'),
(7, 6, 'Ajout', '1', 'a'),
(8, 6, 'Suppression', '1', 's'),
(9, 7, 'Ajout', '1', 'a'),
(10, 8, 'Ajout', '1', 'a'),
(11, 9, 'Ajout', '1', 'a'),
(12, 9, 'Suppression', '1', 's'),
(13, 8, 'Suppression', '1', 's'),
(14, 7, 'Suppression', '1', 's'),
(15, 10, 'Ajout', '1', 'a'),
(16, 11, 'Ajout', '1', 'a'),
(17, 11, 'Suppression', '1', 's'),
(18, 12, 'Ajout', '1', 'a'),
(19, 13, 'Ajout', '1', 'a'),
(20, 14, 'Ajout', '1', 'a'),
(21, 15, 'Ajout', '1', 'a'),
(22, 15, 'Suppression', '1', 's'),
(23, 14, 'Suppression', '1', 's'),
(24, 10, 'Suppression', '1', 's'),
(25, 13, 'Suppression', '1', 's'),
(26, 16, 'Ajout', '1', 'a'),
(27, 17, 'Ajout', '1', 'a'),
(28, 17, 'Suppression', '1', 's'),
(29, 16, 'Suppression', '1', 's'),
(30, 12, 'Suppression', '1', 's'),
(31, 5, 'Ajout', '1', 'a'),
(32, 18, 'Ajout', '1', 'a'),
(33, 19, 'Ajout', '1', 'a'),
(34, 20, 'Ajout', '1', 'a'),
(35, 20, 'Suppression', '1', 's'),
(36, 19, 'Suppression', '1', 's'),
(37, 18, 'Suppression', '1', 's'),
(38, 21, 'Ajout', '1', 'a'),
(39, 21, 'Suppression', '1', 's'),
(40, 22, 'Ajout', '1', 'a'),
(41, 22, 'Suppression', '1', 's'),
(42, 23, 'Ajout', '1', 'a'),
(43, 23, 'Suppression', '1', 's'),
(44, 24, 'Ajout', '1', 'a'),
(45, 24, 'Suppression', '1', 's'),
(46, 25, 'Ajout', '1', 'a'),
(47, 25, 'Suppression', '1', 's'),
(48, 26, 'Ajout', '1', 'a'),
(49, 26, 'Suppression', '1', 's'),
(50, 27, 'Ajout', '1', 'a'),
(51, 27, 'Modification', '1', 'm'),
(52, 27, 'Modification', '1', 'm'),
(53, 28, 'Ajout', '1', 'a'),
(54, 28, 'Modification', '1', 'm'),
(55, 28, 'Suppression', '1', 's'),
(56, 29, 'Ajout', '1', 'a'),
(57, 29, 'Modification', '1', 'm'),
(58, 30, 'Ajout', '1', 'a'),
(59, 31, 'Ajout', '1', 'a'),
(60, 32, 'Ajout', '1', 'a'),
(61, 33, 'Ajout', '1', 'a'),
(62, 33, 'Suppression', '1', 's'),
(63, 34, 'Ajout', '1', 'a'),
(64, 34, 'Suppression', '1', 's'),
(65, 35, 'Ajout', '1', 'a'),
(66, 36, 'Ajout', '1', 'a'),
(67, 36, 'Suppression', '1', 's'),
(68, 35, 'Suppression', '1', 's'),
(69, 32, 'Suppression', '1', 's'),
(70, 31, 'Suppression', '1', 's'),
(71, 37, 'Ajout', '1', 'a'),
(72, 38, 'Ajout', '1', 'a'),
(73, 39, 'Ajout', '1', 'a'),
(74, 40, 'Ajout', '1', 'a'),
(75, 41, 'Ajout', '1', 'a'),
(76, 42, 'Ajout', '1', 'a'),
(77, 42, 'Suppression', '1', 's'),
(78, 41, 'Suppression', '1', 's'),
(79, 40, 'Suppression', '1', 's'),
(80, 39, 'Suppression', '1', 's'),
(81, 38, 'Suppression', '1', 's'),
(82, 37, 'Suppression', '1', 's'),
(83, 43, 'Ajout', '1', 'a'),
(84, 44, 'Ajout', '1', 'a'),
(85, 45, 'Ajout', '1', 'a'),
(86, 46, 'Ajout', '1', 'a'),
(87, 46, 'Suppression', '1', 's'),
(88, 47, 'Ajout', '1', 'a'),
(89, 48, 'Ajout', '1', 'a'),
(90, 49, 'Ajout', '1', 'a'),
(91, 49, 'Suppression', '1', 's'),
(92, 48, 'Suppression', '1', 's'),
(93, 47, 'Suppression', '1', 's');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(255) DEFAULT 'NULL',
  `date_ajout` datetime NOT NULL,
  `date_modif` datetime DEFAULT NULL,
  `id_user_ajout` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_ajout` (`id_user_ajout`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `image`, `date_ajout`, `date_modif`, `id_user_ajout`) VALUES
(1, 'Article 1', 'Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.\r\n\r\nExcogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.\r\n\r\nQuare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.\r\n\r\nDein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia, mundo cognita civitas, cui non certaverit alia advecticiis ita adfluere copiis et internis, et Laodicia et Apamia itidemque Seleucia iam inde a primis auspiciis florentissimae.', 'assets/images/4svyf4.jpg', '2015-01-09 00:24:37', NULL, 1),
(2, 'Article 2', 'Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.\r\n\r\nExcogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.\r\n\r\nQuare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.\r\n\r\nDein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia, mundo cognita civitas, cui non certaverit alia advecticiis ita adfluere copiis et internis, et Laodicia et Apamia itidemque Seleucia iam inde a primis auspiciis florentissimae.', 'assets/images/9svoen.jpg', '2015-01-09 00:25:36', NULL, 1),
(3, 'Article 3', 'Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.\r\n\r\nExcogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.\r\n\r\nQuare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.\r\n\r\nDein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia, mundo cognita civitas, cui non certaverit alia advecticiis ita adfluere copiis et internis, et Laodicia et Apamia itidemque Seleucia iam inde a primis auspiciis florentissimae.', 'assets/images/10656463_961121753917495_122496390_n.jpg', '2015-01-09 00:26:04', NULL, 1),
(4, 'Article 4 ', 'Judo Jujitsu', 'assets/images/ff-judo-103242.jpg', '2015-01-09 00:27:04', NULL, 1),
(5, 'Je suis Charlie', 'Nous sommes tous charlie, je préfère mourir debout que vivre à genoux', 'assets/images/10917853_759873944065639_8372959626690184527_n.jpg', '2015-01-09 00:29:31', '2015-01-09 00:35:33', 1),
(27, 'gegerge', 'gegrgrgr', 'assets/images/', '2015-01-12 00:40:28', '2015-01-12 00:43:15', 1),
(29, 'frjoifjeroi', 'fofhezoifzehoi', 'assets/images/', '2015-01-13 14:14:42', '2015-01-13 14:16:23', 1),
(30, 'gergerg', 'gregreger', 'assets/images/ImgArticle1.png', '2015-01-15 13:38:52', NULL, 1),
(43, 'fzefez', 'fzefezfzefezez', 'assets/images/ImgArticle1.png', '2015-01-15 15:04:08', NULL, 1),
(44, 'fzefezfez', 'fzefezfezfez', 'assets/images/firefox.png', '2015-01-15 15:04:50', NULL, 2),
(45, '1ffzefez', 'fzefezzeffez', 'assets/images/ff-judo-103242.jpg', '2015-01-15 15:05:19', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `admin`) VALUES
(1, 'Westelynck', 'Jordan', 'chunlky@hotmail.fr', '123456', '1'),
(2, 'Azerty', 'Qwerty', 'azerty@hotmail.fr', '654321', '0'),
(5, 'Alouette', 'Gentille', 'dazdza@frefre.fr', '321654', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
