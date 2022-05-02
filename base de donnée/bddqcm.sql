-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 01 Mai 2022 à 20:58
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `login`, `password`, `nom`, `prenom`, `email`, `token`) VALUES
(1, 'Velgrynd', '$2y$12$Uj6DJ2mAex29KFoE3p2/W.SIPs7zu7tMaiphg6Vh4vYC5Rj27FEky', 'Luminous', 'Valentine', 'velgrynd@gmail.com', '20267b6527bfd28ff26518efa56e1a1c79b48ff31bc98fc7029245209c099cdd3976c5b6ff41cca08436aae7d9894bc48c328bcc7e3d6745bba4e0b2ddee6204');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `idEtudiant` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `motDePasse` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` text CHARACTER SET utf8 NOT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`idEtudiant`, `login`, `motDePasse`, `nom`, `prenom`, `email`, `token`, `admin`) VALUES
(5, 'tof', '1234', 'Gand', 'Christophe', 'gand.christophe@free.fr', '', NULL),
(6, 'lulu', '1234', 'Gand', 'Lucile', 'gand.lucile@bbox.fr', '', NULL),
(25, 'jhsdahjvas', '$2y$12$TBQG3tD/rEP0Yddl5KCmTe3uSvZH5PTOe2CU6Xx4Ts6lmgty.MgTm', 'dfszdfzd', 'zddzzd', 'velgkjbfkjhbvfufvgjhjvfhrynd@gmail.com', '176dfdc897ab5bef37aa2d68532a972a065a03d9aed498906b0a63fd6801c28c18fa15ac3aa0383b3c80dec79a9e6647b37d089e24b8fe0ffb62b697b6955710', NULL),
(26, 'testpseudo', '$2y$12$25WJGG1VmHt6TpBKKxaWquWfDkBfqsV5noEBos9FKWlklyuRUrVGq', 'testnom', 'testprenom', 'test@gmail.com', '917daeef05c0519ea10666d8782b2c21091aad6b874e9567b93b7670de43d082bb6b542c1a1c295408600c1c7b69cfd85904f5959b6e95fafc0c061c8e1f8b15', NULL),
(27, 'edzzedzde', '$2y$12$5bI/9u04w8WiMlKlHcBmBu9GLLIDic6bFGtA/q7ixW/3dRjTJH97a', 'zedzed', 'zeddz', 'jbajkhze@gmail.com', '52b13f8c76d315d63eebcd96baf37368e517f33bfeaa6c56414c94dc2920c65fcb639168f8537fe4089dc8ac4d70e7f6ad12547a696fa1c11ef4a0718d58e42e', NULL),
(28, ';,bjhb', '$2y$12$NLqJUL8ec0ylfMA23mskeeJvkQSFfJpuOe7cuBeg8ldH/M6qFGWVm', 'jhghjfv', 'jhgjcfhgfcdh', 'hvkj@gmail.com', '833810ee005685a800698f5601bdc45709fc7784dabe897c580e58c54f7eb5ccf83e55ca551d25ce577e949f68d7580650964a1e6d13c921415e3b77b1e1a35f', NULL),
(29, 'hgkjcghc', '$2y$12$JcU4sSfvjTffnS/rVaIVJefV3H/QLW8BPP8oHY0cT1MvuE1aifwoi', 'ghc', 'hchchchuychkgc', 'hchgchvc@gmail.com', '09c9ee2ebb1ec9bcb7b89b8ae44937c91568d2ce8492e5bdaabf45523243ef30bbb9656ae846d22b775b0a401cb97add2fb2ab6bf6f0f75a460aaba34862d7e2', NULL),
(30, 'hgcghcchfgcfh', '$2y$12$y6ExD4Mnc7K2YitUGgUQcO3.Q.G7JhgYecl/IWwfGEFaShAxWi15m', 'hcfchjcjjhcggh', 'hjgchjg', 'reg@gmail.com', '859f4832e6570d2a768fbfcd47d4ebc29852663e997e82ae716b1d770a42cc617acd3c387f6b687f54c88aa2faae6f4a3b8b9fdd0a9bb6da8c45382ccdc344d9', NULL),
(31, 'szzzffzfzzffz', '$2y$12$FZ/HiIDaO7R16jRBemkvtOtjaKfvHBbFUJQyNBK9gDYPUwiN9ib6q', 'jnfjhkgcfvhgjdxjghvcgj', 'cghhgchjchcghf', 'gcjhgfxujgx@gmail.com', 'e2291dd5420af30b1895550f1e995592205e6416b50bfa738d6e15899d51f94eb7a883281629c43610e865a3eeefe1df6a6d56d9b4410c8940e53f6d2314da6f', NULL),
(32, 'uyduukyf', '$2y$12$gqw4qKCJ68SRl61fCoDGr.6FR8kQqa0S0VWZ83KUsPvscaanSFtBW', 'fhg', 'hjgf', 'hjgcf@gmail.com', '9e071b4e71ac37fc1eeb88c189b4d618189a45560ef5ecd2a3ea68717f5125779eb6f7a974b92eab56bc36ff02f6e634119a7841fce5187b22f7c9fcf1c80965', NULL),
(33, 'hfgc', '$2y$12$3sDXj3ldcohXAJcXFgrU8O.Z/Krj9m.MQfzN/KHtrkOHPQE.OJbJu', 'jhgc', 'hvjg', 'hkvg@gmail.com', 'bd06d261ff4f75333cb807c6af1fddb798bbd5762780fdedc966d5a51ed4a21a2d6fe17a9b8d6d7359ade97e6d0fbb25cf00d09ba61e47cfd35e9d8a306ecde7', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `qcmfait`
--

CREATE TABLE `qcmfait` (
  `idEtudiant` int(11) NOT NULL,
  `idQuestionnaire` int(11) NOT NULL,
  `dateFait` varchar(10) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qcmfait`
--

INSERT INTO `qcmfait` (`idEtudiant`, `idQuestionnaire`, `dateFait`, `point`) VALUES
(8, 1, '07-04-2017', 4),
(8, 2, '07-01-2018', 0),
(8, 3, '2017-03-29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idQuestion` int(11) NOT NULL,
  `libelleQuestion` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `nbReponse` int(11) NOT NULL,
  `nbBonneReponse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`idQuestion`, `libelleQuestion`, `type`, `nbReponse`, `nbBonneReponse`) VALUES
(1, 'Quel est l\'âge de Rimuru après sa réincarnation ?', 1, 4, 1),
(2, 'Comment est appelé le conseil des 10 grands Roi-Démons après la mort de Clayman ?', 1, 4, 1),
(3, 'Quel personnage est le plus fort ?', 1, 4, 1),
(4, 'Qui est le plus intelligent ?', 1, 4, 3),
(5, 'Qui est l’entraîneur d\'Arsenal ?', 1, 4, 1),
(6, 'En quelle année Nantes a été champion de Fance ?', 1, 6, 4),
(7, 'Qui est le meilleur buteur de ligue 1 pour l\'année 2015-2016 ?', 1, 3, 1),
(8, 'Quelle est la hauteur de la tour Eiffel ?', 1, 3, 1),
(9, 'Qui a écrit l\'étranger ?', 1, 3, 1),
(10, 'Quelle est la capitale de la Roumanie ?', 1, 3, 1),
(19, 'Question1', 1, 4, 1),
(20, 'Question2', 1, 4, 1),
(21, 'Question3', 1, 4, 1),
(22, 'Question4', 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `libelleQuestionnaire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`idQuestionnaire`, `libelleQuestionnaire`) VALUES
(1, 'Quiz Anime'),
(2, 'Quiz Personnage'),
(3, 'Quiz Développement'),
(4, 'Questionnaire4');

-- --------------------------------------------------------

--
-- Structure de la table `questionquestionnaire`
--

CREATE TABLE `questionquestionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questionquestionnaire`
--

INSERT INTO `questionquestionnaire` (`idQuestionnaire`, `idQuestion`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `questionreponse`
--

CREATE TABLE `questionreponse` (
  `idQuestion` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `bonne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questionreponse`
--

INSERT INTO `questionreponse` (`idQuestion`, `idReponse`, `ordre`, `bonne`) VALUES
(1, 1, 1, 0),
(1, 2, 2, 1),
(1, 3, 3, 0),
(1, 4, 4, 0),
(2, 5, 1, 0),
(2, 6, 2, 1),
(2, 7, 3, 0),
(2, 8, 4, 0),
(3, 9, 1, 0),
(3, 10, 2, 1),
(3, 11, 3, 0),
(4, 12, 1, 1),
(4, 13, 2, 0),
(4, 14, 3, 1),
(4, 15, 4, 1),
(5, 16, 1, 0),
(5, 17, 2, 0),
(5, 18, 3, 1),
(5, 19, 4, 0),
(6, 20, 1, 0),
(6, 21, 2, 1),
(6, 22, 3, 1),
(6, 23, 4, 1),
(6, 24, 5, 0),
(6, 25, 6, 1),
(7, 26, 1, 1),
(7, 27, 2, 0),
(7, 28, 3, 0),
(8, 29, 1, 0),
(8, 30, 2, 1),
(8, 31, 3, 0),
(9, 32, 1, 0),
(9, 33, 2, 0),
(9, 34, 3, 1),
(10, 35, 1, 1),
(10, 36, 2, 0),
(10, 37, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `valeur` text NOT NULL,
  `cheminImage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `valeur`, `cheminImage`) VALUES
(1, '6 mois', ''),
(2, '2 ans', ''),
(3, '37 ans ', ''),
(4, '8000 ans', ''),
(5, 'Les 9 Grands Roi-Démons', ''),
(6, 'Les 10 Grands Roi-Démons', ''),
(7, 'Octagramme', ''),
(8, 'Les 7 Démons Étoilés', ''),
(9, 'Luminous Valentine', ''),
(10, 'Milim Nava ', ''),
(11, 'Guy Crimson', ''),
(12, 'Dagruel', ''),
(13, 'Limule', ''),
(14, 'Diablo', ''),
(15, 'Raphaël', ''),
(16, 'Joséphine, ange gardien', ''),
(17, 'Elie Baup', ''),
(18, 'Arsène Wenger', ''),
(19, 'José Mourinho', ''),
(20, '1964', ''),
(21, '1965', ''),
(22, '1980', ''),
(23, '1983', ''),
(24, '1986', ''),
(25, '1995', ''),
(26, 'Edinson Cavani', ''),
(27, 'Alexandre Lacazette', ''),
(28, 'Bafetimbi Gomis', ''),
(29, '320', ''),
(30, '324', ''),
(31, '328', ''),
(32, 'Victor Hugo', ''),
(33, 'Boris Vian', ''),
(34, 'Albert Camus', ''),
(35, 'Bucarest', ''),
(36, 'Budapest', ''),
(37, 'Sofia', ''),
(38, 'a', NULL),
(39, 'b', NULL),
(40, 'c', NULL),
(41, 'd', NULL),
(42, 'e', NULL),
(43, 'f', NULL),
(44, 'g', NULL),
(45, 'h', NULL),
(46, 'i', NULL),
(47, 'j', NULL),
(48, 'k', NULL),
(49, 'l', NULL),
(50, 'm', NULL),
(51, 'n', NULL),
(52, 'o', NULL),
(53, 'p', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD UNIQUE KEY `idEtudiant` (`idEtudiant`);

--
-- Index pour la table `qcmfait`
--
ALTER TABLE `qcmfait`
  ADD PRIMARY KEY (`idEtudiant`,`idQuestionnaire`),
  ADD KEY `idQuestionnaire` (`idQuestionnaire`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`idQuestionnaire`);

--
-- Index pour la table `questionquestionnaire`
--
ALTER TABLE `questionquestionnaire`
  ADD PRIMARY KEY (`idQuestionnaire`,`idQuestion`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Index pour la table `questionreponse`
--
ALTER TABLE `questionreponse`
  ADD PRIMARY KEY (`idQuestion`,`idReponse`),
  ADD KEY `idReponse` (`idReponse`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `idEtudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `qcmfait`
--
ALTER TABLE `qcmfait`
  ADD CONSTRAINT `qcmfait_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `qcmfait_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiants` (`idEtudiant`);

--
-- Contraintes pour la table `questionquestionnaire`
--
ALTER TABLE `questionquestionnaire`
  ADD CONSTRAINT `questionquestionnaire_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `questionquestionnaire_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `questionreponse`
--
ALTER TABLE `questionreponse`
  ADD CONSTRAINT `questionreponse_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`),
  ADD CONSTRAINT `questionreponse_ibfk_2` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`idReponse`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
