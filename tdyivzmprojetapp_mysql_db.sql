-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : tdyivzmprojetapp.mysql.db
-- Généré le : mer. 31 mai 2023 à 10:30
-- Version du serveur : 5.7.42-log
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdyivzmprojetapp`
--
CREATE DATABASE IF NOT EXISTS `tdyivzmprojetapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tdyivzmprojetapp`;

-- --------------------------------------------------------

--
-- Structure de la table `alumni`
--

CREATE TABLE `alumni` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ecole` varchar(255) NOT NULL,
  `texte descriptif` text NOT NULL,
  `options_2eme_annee` varchar(255) NOT NULL,
  `options_3eme_annee` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `linkedIn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alumni`
--

INSERT INTO `alumni` (`id_user`, `nom`, `prenom`, `ecole`, `texte descriptif`, `options_2eme_annee`, `options_3eme_annee`, `mail`, `linkedIn`) VALUES
(2, 'Jules', 'Verne', 'IMT', 'Bonjour', 'PNUM', 'OPE', 'jules.vernes@gmail.com', 'julesvernes'),
(3, 'Jouany', 'Claire', 'IMT', 'Je suis interressÃ© par le dÃ©veloppement durable', 'TEE', 'TEE*', 'claire.mail', 'claire.linkedin'),
(5, 'Lola ', 'Montebrun ', 'IMT atlantique ', 'Depuis toute petite, jâ€™ai toujours aimÃ© les mathÃ©matiques et lâ€™informatique. Jâ€™ai Ã©tÃ© naturellement guidÃ©e vers le domaine de la finance. Je rÃªve de devenir un grand trader ', 'MCE', 'Dasci', 'Lola@gmail.com', 'Lola'),
(7, 'Hicham', '12', '', '', '', '', '', ''),
(8, 'Mehdi ', 'Eyoo', 'IMT atlantique ', 'Bbejerhehrv', 'Mce ', 'Dasci', 'Bnejebrhrbfbfbb', 'Njdjfjrbrhrb');

-- --------------------------------------------------------

--
-- Structure de la table `block_parcours`
--

CREATE TABLE `block_parcours` (
  `id_parcours` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_type_parcours` int(11) NOT NULL,
  `company` text,
  `time` text,
  `experience_title` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `block_parcours`
--

INSERT INTO `block_parcours` (`id_parcours`, `id_user`, `id_type_parcours`, `company`, `time`, `experience_title`, `description`) VALUES
(1, 3, 1, 'BDD', '1A', 'Membre actif', ''),
(2, 3, 2, '', '', '', ''),
(3, 3, 3, 'stage ouvrier', '1A', 'opÃ©ra de Paris', 'Pas trop de relation'),
(4, 4, 2, 'TC', '2A S4', 'Math applique', 'TC Ã  san diego'),
(5, 5, 1, 'Junior entreprise ', '1Ã¨re annÃ©e ', 'Communication ', 'Une annÃ©e riche en rebondissement '),
(6, 5, 2, 'Ã‰change aux Ã‰tats Unis ', '2eme semestre de 2 eme annÃ©e ', 'Marketing ', 'Bdjdbdbd'),
(7, 5, 3, '', '', '', ''),
(8, 6, 1, '', '', '', ''),
(9, 6, 2, '', '', '', ''),
(10, 6, 3, '', '', '', ''),
(11, 7, 1, '', '', '', ''),
(12, 7, 2, '', '', '', ''),
(13, 7, 3, '', '', '', ''),
(14, 8, 1, 'Nnb', 'bBbbbb', 'Bbbbb', 'Bbbbb'),
(15, 8, 2, '', '', '', ''),
(16, 8, 3, '', '', '', ''),
(17, 19, 1, '', '', '', ''),
(18, 19, 2, '', '', '', ''),
(19, 19, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id_domaine` int(11) NOT NULL,
  `nom_domaine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id_domaine`, `nom_domaine`) VALUES
(1, 'finance'),
(2, 'big_data'),
(3, 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `chemin`, `id_auteur`) VALUES
(1, 'uploads/64765f79998ee.pdf', 1),
(2, 'uploads/64765f86e9cf0.docx', 1),
(3, 'uploads/6476fdf1301f3.docx', 19);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_fichier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `message`, `id_destinataire`, `id_auteur`, `id_fichier`) VALUES
(1, 'Jules vernes t’a découvert l’Amerique ? ', 2, 5, NULL),
(2, 'Salut, camarade ! \r\nEst ce que tu as réussi à avoir la TAF MCE ? ', 3, 5, NULL),
(3, 'Non malheureusement non ! ', 3, 5, NULL),
(4, 'Salut camarade ! Est ce que tu as réussi à avoir la TAF MCE ? ', 1, 5, NULL),
(9, 'hello i am doing a Ted Talk \r\n', 2, 1, NULL),
(10, 'Mesdames et Messieurs,\r\n\r\nJe vous remercie d\'être ici aujourd\'hui. Nous nous rassemblons pour discuter d\'une question qui, bien qu\'elle puisse sembler légère à certains, revêt une signification profonde et de nombreuses implications pour notre économie, notre culture, et notre identité nationale : le chocolat.\r\n\r\nOui, le chocolat. Une douceur qui a voyagé à travers les âges, des civilisations anciennes d\'Amérique du Sud aux rues animées de nos villes modernes. Il incarne un plaisir universel, une source de réconfort et de joie qui transcende les barrières culturelles, sociales et politiques. Mais aujourd\'hui, nous n\'abordons pas seulement le chocolat en tant que friandise savoureuse. Nous parlons du chocolat en tant que symbole de notre économie, de notre patrimoine et de nos opportunités futures.\r\n\r\nLe chocolat représente l\'une des plus belles réussites de l\'agriculture et de l\'artisanat, la rencontre harmonieuse entre le naturel et le créatif. Derrière chaque carré de chocolat se cache une chaîne de production complexe, impliquant de nombreux acteurs : agriculteurs, transformateurs, artisans chocolatiers, commerçants. Il s\'agit d\'une industrie qui génère des emplois, qui stimule l\'innovation et qui, de surcroît, répand le bonheur.\r\n\r\nCependant, il est de notre devoir de reconnaitre les défis auxquels l\'industrie du chocolat est confrontée. Des questions comme la durabilité, l\'équité du commerce et les conditions de travail sont des sujets cruciaux qui nécessitent notre attention. Nous ne pouvons pas ignorer les dures réalités du changement climatique, qui menace les récoltes de cacao, ni l\'exploitation qui se produit trop souvent dans les fermes de cacao.\r\n\r\nIl est donc impératif pour nous de trouver un équilibre - un moyen de préserver et de soutenir notre amour du chocolat tout en veillant à ce que son impact sur notre planète et nos peuples soit positif et durable. Cela signifie promouvoir des pratiques agricoles durables, encourager le commerce équitable et assurer des conditions de travail décentes.\r\n\r\nC\'est un défi de taille, certes, mais c\'est un défi que nous devons relever ensemble. Car le chocolat est plus qu\'un simple aliment. C\'est une tradition, une passion, une source de fierté nationale. Il fait partie de notre héritage culturel, et c\'est à nous de veiller à ce qu\'il continue à faire partie de notre avenir.\r\n\r\nEnsemble, nous pouvons transformer l\'industrie du chocolat en un exemple de durabilité, d\'éthique et de réussite économique. En faisant cela, nous ne nous contentons pas de préserver notre amour pour le chocolat, mais nous créons aussi une société plus juste, plus verte et plus prospère.\r\n\r\nAlors, joignons nos efforts pour garantir un avenir doux et durable, un avenir où chaque carré de chocolat est le fruit d\'une production équitable, durable et respectueuse. C\'est notre mission, et c\'est un défi que je suis convaincu que nous pouvons relever ensemble.\r\n\r\nJe vous remercie.', 1, 17, NULL),
(11, 'test &lt;br&gt;test&lt;br/&gt;\r\ntest &lt;br&gt;test2&lt;/br&gt;', 1, 17, NULL),
(50, '', 2, 1, 1),
(51, '', 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `preferences_utilisateurs`
--

CREATE TABLE `preferences_utilisateurs` (
  `id_preferences` int(11) NOT NULL,
  `nucleaire` tinyint(4) DEFAULT NULL,
  `aeronautique` tinyint(4) DEFAULT NULL,
  `finance` tinyint(4) DEFAULT NULL,
  `conseil` tinyint(4) DEFAULT NULL,
  `informatique` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `preferences_utilisateurs`
--

INSERT INTO `preferences_utilisateurs` (`id_preferences`, `nucleaire`, `aeronautique`, `finance`, `conseil`, `informatique`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 1, 0),
(3, 1, 1, 1, 0, 0),
(4, 0, 1, 1, 1, 0),
(5, 1, 1, 1, 1, 0),
(6, 1, 1, 0, 0, 0),
(7, 1, 0, 1, 0, 0),
(8, 0, 1, 0, 1, 0),
(9, 1, 0, 1, 1, 0),
(10, 0, 0, 1, 1, 0),
(11, 1, 1, 0, 1, 0),
(12, 5, 5, 5, 5, 5),
(13, 7, 5, 5, 5, 5),
(14, 5, 7, 5, 5, 5),
(15, 5, 5, 9, 5, 5),
(16, 5, 5, 8, 10, 1),
(17, 5, 5, 8, 3, 1),
(18, 9, 5, 8, 3, 1),
(19, 5, 9, 5, 5, 5),
(20, 5, 5, 10, 10, 5),
(21, 5, 5, 10, 10, 8),
(22, 8, 5, 10, 10, 8),
(23, 0, 1, 3, 8, 10),
(24, 10, 1, 7, 7, 3),
(25, 9, 5, 5, 5, 5),
(26, 0, 10, 10, 0, 10),
(27, 10, 0, 10, 0, 0),
(28, 7, 10, 2, 2, 10),
(29, 9, 9, 2, 9, 2),
(30, 10, 1, 2, 6, 1),
(31, 1, 2, 9, 9, 10),
(32, 4, 4, 10, 10, 10),
(33, 0, 0, 10, 10, 10),
(34, 0, 0, 8, 8, 8),
(35, 10, 10, 10, 10, 10),
(36, 5, 5, 5, 5, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sous_domaines`
--

CREATE TABLE `sous_domaines` (
  `id` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `competences_necessaires` text,
  `taches_quotidiennes` text,
  `description_metier` text NOT NULL,
  `differences_avec` text NOT NULL,
  `quoi_retenir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_domaines`
--

INSERT INTO `sous_domaines` (`id`, `id_domaine`, `nom`, `competences_necessaires`, `taches_quotidiennes`, `description_metier`, `differences_avec`, `quoi_retenir`) VALUES
(1, 2, 'datanalyst', 'Gilles Venturi, enseignant-chercheur à l\'École des Mines de Saint-Étienne, qui énumère les compétences et les qualités requises pour travailler en tant que Data Analyst, dans un article publié sur le site Le Monde en 2018 :\r\n\r\nGilles Venturi, enseignant-chercheur à l\'École des Mines de Saint-Étienne, qui énumère les compétences et les qualités requises pour travailler en tant que Data Analyst, dans un article publié sur le site Le Monde en 2018 annonce que :\"Le Data Analyst doit posséder des compétences techniques en programmation et en statistique, ainsi qu\'une connaissance solide des outils de traitement de données. Il doit également être capable de comprendre les enjeux métier et les besoins des utilisateurs finaux, afin de leur fournir des données pertinentes et des analyses exploitables. Les qualités essentielles pour réussir dans ce métier incluent la curiosité, la rigueur, l\'esprit critique et la créativité. Le Data Analyst doit être capable de travailler en équipe et de communiquer clairement ses résultats et ses conclusions.\"', 'Clément Romet, Directeur Associé chez Ernst & Young, dans une interview pour Le Figaro en octobre 2019 annonce : \"Le quotidien d\'un data analyst est fait de croisements et d\'analyses de données. Il collecte, traite, analyse et restitue des données pour répondre aux besoins des utilisateurs internes ou externes. Il travaille sur des projets, souvent dans un contexte de transformation numérique. Il est chargé d\'élaborer des tableaux de bord, des rapports de suivi de performance, de réaliser des analyses statistiques et d\'accompagner les utilisateurs à comprendre leurs données.\"\r\nDe la même facon, Adrien Menielle, Data Analyst chez Voyages-Sncf, dans une interview pour JobTeaser en avril 2018 explique que :\"Le data analyst travaille sur toutes les données de l\'entreprise, pour aider les autres métiers à prendre les bonnes décisions. Ses tâches quotidiennes consistent à extraire, traiter et analyser des données, souvent en utilisant des logiciels spécifiques, pour fournir des informations exploitables aux décideurs de l\'entreprise. Il peut également travailler sur des projets spécifiques tels que des études de marché, des analyses de la concurrence ou des prévisions financières.\" \r\n', 'Cédric Villani, mathématicien et député français, dans son livre \"Donner un sens à l\'intelligence artificielle\" (2018), donne une définition du Big Data :\r\n\r\n\"Le Big Data désigne l\'ensemble des phénomènes associés à la numérisation, à la collecte et à l\'analyse massive de données. Les sources d\'informations sont nombreuses : données de géolocalisation, historiques de navigation sur Internet, informations de santé, comportements d\'achat, fréquentations de réseaux sociaux, contenus de mails et de messages, images, sons, etc. Les données sont produites en continu, en grande quantité et souvent en temps réel. Elles sont stockées dans des bases de données de plus en plus volumineuses, hébergées sur des serveurs informatiques de plus en plus puissants et interconnectés. La valeur ajoutée de ces données tient à leur diversité, leur volume et leur vélocité : on parle ainsi de données \"massives\", \"variées\" et \"rapides\". Leur traitement fait appel à des techniques d\'analyse de données sophistiquées, telles que les méthodes d\'apprentissage automatique ou d\'exploration de données, qui permettent de découvrir des relations cachées entre les variables, de prédire des comportements, de détecter des anomalies, de personnaliser des offres, etc. Le Big Data est donc un nouvel écosystème informationnel, où la donnée est une ressource fondamentale, où l\'analyse est une compétence clé, où la collaboration est essentielle et où la régulation est nécessaire.\"\r\n\r\nEmmanuelle Fouquart, Directrice de l\'École de la Data et de la Tech chez OpenClassrooms, donne une explication claire et concise du métier de Data Analyst lors d\'une interview pour le magazine Forbes en 2019 :\r\n\r\n\"Le Data Analyst est chargé d\'analyser les données de l\'entreprise pour en tirer des enseignements et des conclusions. Il collecte, modélise, traite et interprète les données pour aider les décideurs à prendre les bonnes décisions. Le Data Analyst doit savoir programmer, maîtriser les outils statistiques et avoir un esprit critique pour être en mesure d\'identifier les erreurs, les biais et les incohérences dans les données.\"\r\n', '« Les data analysts sont davantage axés sur la collecte et la préparation de données, ainsi que sur la création de tableaux de bord et de rapports pour aider à la prise de décision. Les data scientists, en revanche, passent plus de temps à effectuer des analyses statistiques avancées et à développer des modèles prédictifs et des algorithmes d\'apprentissage automatique pour résoudre des problèmes commerciaux complexes. En fin de compte, les deux rôles sont complémentaires et nécessaires pour transformer les données en connaissances exploitables. » - Arnaud Bresson, Responsable Data Science chez Mazars, et Marie-Laure Alves, Responsable Business Intelligence chez Société Générale.', 'Samir Loudni, professeur à l\'école IMT Atlantique conclut avec ces sages paroles : « En entreprise les DataScientist et DataAnalyste jouent un rôle clé et majeur dans une entreprise. En effet, leur travaux vont permettre aux decideurs de prendre des decisions strategiques au niveau du fonctionnement des entreprises. »\r\nUn mot de la fin : \" Si une personne souhaite s’orienter dans ce domaine là, elle doit suivre des études approfondies dans les maths appliqués (maitriser ainsi les modèles statitiques et prédictifs), comprendre et se perfectionner dans le machine learning et enfin matriser les outils informatiques comme python et R. Mais surtout je tiens à accentuer le fait que entre plusieurs profils à compétences scientifiques égales, je favoriserais celui qui aura des compétences humaines et sociales importantes. Car la différence entre un bon DataScientist/DataAnalyst et un excellent DataScientist/DataAnalyst réside dans sa curiosité et ses compétences en communication.\"'),
(2, 2, 'datascientist', '« Le data scientist est un profil hybride. Il doit être capable de maîtriser des compétences statistiques, informatiques et mathématiques, mais également des compétences en communication pour être capable de vulgariser les résultats de ses analyses auprès des différents acteurs de l\'entreprise. Enfin, il doit être capable de travailler en équipe et d\'avoir une vision globale de l\'entreprise pour pouvoir orienter ses analyses vers des problématiques stratégiques. » - Isabelle Hilali, Directrice Data Science et IA chez Sia Partners.\r\nCette citation a été donnée dans le cadre d\'un article sur les compétences nécessaires pour travailler en tant que data scientist publié sur le site internet de L\'Usine Digitale en février 2021.\r\n\r\n\r\n« Un bon DataScientist doit contribuer à l’élaboration des modèles prédictifs à partir des données, il doit donc avoir une expertise sur plusieurs domaines. Il doit avoir un niveau tres élevé en mathematique car il a devoir établir des modèles statistiques complexes. Les techniques de machine learning sont donc essentiels. Ainsi il doit avoir des compétences solide en informatique (en python, en R) car l’implémentation de ces modèles est aussi une tâche de DataScientist. De plus, il doit informatiquement pouvoir automatiser la visualisation de ces données pour avoir un rendu claire, exploitable, exhaustif et concis. Aussi il doit avoir une expertise métier dans le secteur dans lequel il travail. Un bon DataScientist n’élaborera de bons modèles que si il connait parfaitement le domaine dans lequel il travaille (Finance, Santé…) Enfin concernant les soft skills, il doit être curieux et avoir des compétences sociale en communication et relationnelles car il va devoir partager avec son équipe ses travaux. »\r\n\r\nCette citation a été donnée dans le cadre d’un interview avec Samir Loudni un professeur dans le département des DataScience dans l’école IMT Atlantique.\r\n\r\n', ' \"Au quotidien, un data scientist est amené à travailler sur différentes étapes d’un projet : de la collecte de données à la mise en place d’algorithmes de traitement, en passant par la modélisation statistique. Il peut également être amené à travailler sur des problématiques de prédiction, de classification ou encore de recommandation, en utilisant des techniques de machine learning ou de deep learning.\" \r\n- Damien Clauzel, Data Scientist chez Dataiku, lors d\'une interview pour le site Maddyness en janvier 2022\r\n', 'Cédric Villani, mathématicien et député français, dans son livre \"Donner un sens à l\'intelligence artificielle\" (2018), donne une définition du Big Data :\r\n\r\n\"Le Big Data désigne l\'ensemble des phénomènes associés à la numérisation, à la collecte et à l\'analyse massive de données. Les sources d\'informations sont nombreuses : données de géolocalisation, historiques de navigation sur Internet, informations de santé, comportements d\'achat, fréquentations de réseaux sociaux, contenus de mails et de messages, images, sons, etc. Les données sont produites en continu, en grande quantité et souvent en temps réel. Elles sont stockées dans des bases de données de plus en plus volumineuses, hébergées sur des serveurs informatiques de plus en plus puissants et interconnectés. La valeur ajoutée de ces données tient à leur diversité, leur volume et leur vélocité : on parle ainsi de données \"massives\", \"variées\" et \"rapides\". Leur traitement fait appel à des techniques d\'analyse de données sophistiquées, telles que les méthodes d\'apprentissage automatique ou d\'exploration de données, qui permettent de découvrir des relations cachées entre les variables, de prédire des comportements, de détecter des anomalies, de personnaliser des offres, etc. Le Big Data est donc un nouvel écosystème informationnel, où la donnée est une ressource fondamentale, où l\'analyse est une compétence clé, où la collaboration est essentielle et où la régulation est nécessaire.\"\r\n\r\n', '« Les data analysts sont davantage axés sur la collecte et la préparation de données, ainsi que sur la création de tableaux de bord et de rapports pour aider à la prise de décision. Les data scientists, en revanche, passent plus de temps à effectuer des analyses statistiques avancées et à développer des modèles prédictifs et des algorithmes d\'apprentissage automatique pour résoudre des problèmes commerciaux complexes. En fin de compte, les deux rôles sont complémentaires et nécessaires pour transformer les données en connaissances exploitables. » - Arnaud Bresson, Responsable Data Science chez Mazars, et Marie-Laure Alves, Responsable Business Intelligence chez Société Générale.\r\nCette citation a été donnée dans un article sur les métiers de la data publié sur le site internet de Welcome to the Jungle en février 2020.\r\n\r\n« En tant que data analyst, mon travail consiste principalement à collecter, nettoyer et organiser des données provenant de différentes sources, puis à les analyser pour en extraire des insights utiles pour l\'entreprise. Je suis également chargé de créer des rapports et des visualisations de données pour communiquer mes résultats aux autres membres de l\'équipe. Contrairement à un data scientist, mon travail est plus axé sur la collecte et la préparation de données plutôt que sur la création de modèles prédictifs. » - Lucie Dupont, Data Analyst chez L\'Oréal, dans une interview pour Le Journal du Net en septembre 2020.\r\n', 'Samir Loudni, professeur à l\'école IMT Atlantique conclut avec ces sages paroles : « En entreprise les DataScientist et DataAnalyste jouent un rôle clé et majeur dans une entreprise. En effet, leur travaux vont permettre aux decideurs de prendre des decisions strategiques au niveau du fonctionnement des entreprises. »\r\nUn mot de la fin : \" Si une personne souhaite s’orienter dans ce domaine là, elle doit suivre des études approfondies dans les maths appliqués (maitriser ainsi les modèles statitiques et prédictifs), comprendre et se perfectionner dans le machine learning et enfin matriser les outils informatiques comme python et R. Mais surtout je tiens à accentuer le fait que entre plusieurs profils à compétences scientifiques égales, je favoriserais celui qui aura des compétences humaines et sociales importantes. Car la différence entre un bon DataScientist/DataAnalyst et un excellent DataScientist/DataAnalyst réside dans sa curiosité et ses compétences en communication.\"'),
(3, 1, 'PE', 'Compétences du PE', 'Tâches quotidiennes du PE', '', '0', ''),
(5, 1, 'VC', '1.	Jean de La Rochebrochard, Associé chez Kima Ventures, un fonds de capital-risque français, a déclaré lors d\'une interview avec BFM Business en 2019 :\r\n« Pour réussir dans le capital-risque, il est essentiel de posséder une solide compréhension des modèles économiques et une connaissance approfondie des technologies émergentes. De plus, les compétences en analyse financière et en évaluation d\'entreprise sont primordiales pour évaluer les opportunités d\'investissement. Les investisseurs en capital-risque doivent également être capables de nouer et d\'entretenir des relations avec les entrepreneurs, les autres investisseurs et les acteurs clés du secteur. Enfin, la capacité à gérer le risque et à prendre des décisions d\'investissement éclairées dans un environnement incertain est une compétence cruciale dans notre métier. »\r\n	', 'Philippe Collombel, Associé chez Partech, un fonds de capital-risque international, a déclaré lors d\'une interview avec FrenchWeb en 2016 :          \n« Mon quotidien en tant qu\'investisseur en capital-risque implique beaucoup de rencontres avec des entrepreneurs pour évaluer de nouvelles opportunités d\'investissement, ainsi que le suivi des entreprises de notre portefeuille. Je participe également à des conférences et à des événements pour rester informé des tendances du marché et identifier de nouvelles idées innovantes. Une partie de mon travail consiste également à collaborer avec nos partenaires, les autres membres de l\'équipe et les experts du secteur pour analyser les dossiers, prendre des décisions d\'investissement et élaborer des stratégies pour accompagner nos entreprises dans leur croissance. »\n', 'Fanny Letier, cofondatrice de Geneo Capital Entrepreneur, un fonds de capital-risque français, a déclaré lors d\'une interview avec Les Echos en 2019 :\r\n\r\n\"Le capital-risque est une forme d\'investissement destinée à financer et accompagner des entreprises innovantes en phase de démarrage ou de croissance. Ces entreprises, souvent issues des secteurs technologiques, présentent un fort potentiel de développement, mais aussi des risques importants en raison de leur modèle économique encore en construction. En tant qu\'investisseurs en capital-risque, notre mission est de soutenir ces entreprises en leur fournissant des capitaux, mais également en les conseillant et en les aidant à surmonter les défis qu\'elles rencontrent dans leurs projets. Nous investissons dans ces entreprises avec l\'objectif de générer des rendements significatifs à long terme, tout en étant conscients que toutes ne réussiront pas. Le capital-risque joue un rôle clé dans le soutien à l\'innovation et à l\'entrepreneuriat, contribuant ainsi à la croissance économique et à la création d\'emplois.\"\r\n\r\nCette citation offre une perspective sur le rôle du capital-risque dans le financement et l\'accompagnement des entreprises innovantes en phase de démarrage ou de croissance, ainsi que sur son impact sur l\'économie et la création d\'emplois.\r\n', 'Dominique Gaillard, Managing Partner chez Investisseurs & Partenaires (I&P), une société de gestion de fonds de private equity et de venture capital, a déclaré lors d\'une interview avec Les Echos en 2020 :\n\n\n« Le private equity et le venture capital sont deux approches distinctes de l\'investissement en capital-investissement. Le private equity implique des investissements dans des entreprises plus matures et plus établies, généralement à un stade de croissance ou de maturité. Le venture capital, quant à lui, implique des investissements dans des entreprises en phase de démarrage, avec un fort potentiel de croissance, mais souvent plus risquées. Les investisseurs en venture capital ont besoin d\'une connaissance approfondie de leur secteur d\'activité et d\'une capacité à identifier les entreprises les plus prometteuses, tandis que les investisseurs en private equity doivent être en mesure d\'analyser en profondeur les entreprises cibles et d\'élaborer des plans d\'action pour maximiser la valeur de leurs investissements. »\n\n', ''),
(6, 1, 'Ingenieur Financier', NULL, NULL, '', '', ''),
(7, 1, 'M&A', NULL, NULL, '', '', ''),
(8, 1, 'Auditeur', NULL, NULL, '', '', ''),
(9, 1, 'Analyste Financier', NULL, NULL, '', '', ''),
(10, 3, 'cybersecurite', '- Dans l\'article \"Comment devenir expert en cybersécurité ?\", publié sur le site de l\'IMT Atlantique, le 24 février 2020. Frédéric Cuppens, Professeur à l\'IMT Atlantique et Responsable du Laboratoire de Cybersécurité, annonce que : \"Les compétences requises pour travailler dans la cybersécurité ont considérablement évolué ces dernières années, en raison de l\'augmentation du nombre et de la sophistication des cyberattaques. Les professionnels de la cybersécurité doivent avoir une solide compréhension des technologies de l\'information, de la cryptographie et des réseaux informatiques, ainsi que des compétences en analyse de données et en résolution de problèmes. Ils doivent également être capables de travailler en équipe, de communiquer efficacement avec les parties prenantes et de rester constamment à jour sur les nouvelles tendances et les nouvelles technologies.\"                                     \r\n\r\n- Dr. Matthieu-Paul Gauthier, Responsable de l\'équipe de recherche en sécurité informatique chez Thales. Source explique dans l\'article \"Comment se former à la cybersécurité ?\", publié sur le site de ZDNet, le 24 septembre 2019 que :\r\n\"Les compétences nécessaires pour travailler dans la cybersécurité incluent une connaissance approfondie des réseaux informatiques, des systèmes d\'exploitation, des langages de programmation et des outils de sécurité. Les professionnels de la cybersécurité doivent être capables d\'analyser les menaces potentielles et de mettre en place des mesures de sécurité pour protéger les systèmes informatiques. Ils doivent également être capables de travailler en équipe, de communiquer efficacement avec les autres parties prenantes et de gérer les projets de sécurité. Enfin, ils doivent être prêts à apprendre constamment et à rester à jour sur les nouvelles tendances et les nouvelles menaces en matière de sécurité.\" ', '- Dans l\'article \"Quotidien d\'un expert en cybersécurité\", publié sur le site de l\'IMT Atlantique, le 8 mars 2019\" Frédéric Cuppens, Professeur à l\'IMT Atlantique et Responsable du Laboratoire de Cybersécurité, nous fait part de son quotidien:\r\n‘’En tant que professeur et responsable d\'un laboratoire de cybersécurité, mon travail consiste à mener des recherches sur les nouvelles technologies de sécurité, à enseigner aux étudiants les compétences nécessaires pour travailler dans ce domaine et à travailler avec des entreprises et des organisations pour améliorer leur sécurité informatique. Mon quotidien est très diversifié, avec des tâches administratives, des cours et des projets de recherche en cours. Mais ce qui rend ce travail passionnant, c\'est de voir les résultats de nos recherches appliquées dans le monde réel pour améliorer la sécurité de l\'information.’’\r\n\r\n\r\n- Dans l\'article \"Quotidien d\'un expert en cybersécurité\", publié sur le site de 01net, le 7 mai 2020, Stéphane Nappo, responsable de la Cybersécurité chez OVHcloud, s\'exprime sur son quotidien :\r\n\r\n\"Mon travail consiste à protéger les systèmes informatiques de notre entreprise contre les cyberattaques. Pour cela, je passe une grande partie de mon temps à surveiller les réseaux et à analyser les comportements suspects, afin de détecter rapidement les attaques potentielles. J\'interviens également lorsqu\'un incident de sécurité se produit, en coordonnant les équipes techniques pour rétablir la sécurité des systèmes. Le quotidien d\'un expert en cybersécurité est très dynamique, avec de nouveaux défis qui se présentent chaque jour.\" \r\n\r\n\r\n- Pascal Tournoux, Consultant en Cybersécurité chez Wavestone. Source : Article \"Le quotidien d\'un consultant en cybersécurité\", publié sur le site de Studyrama, le 26 septembre 2018 : \r\n\"En tant que consultant en cybersécurité, mon travail consiste à aider nos clients à protéger leurs données et leurs systèmes informatiques contre les menaces potentielles. Cela peut inclure des audits de sécurité pour évaluer les vulnérabilités de leurs systèmes, des tests de pénétration pour simuler des attaques réelles et la mise en place de politiques de sécurité pour réduire les risques. Mon quotidien est très varié, avec des projets différents à chaque fois et des clients qui ont des besoins et des objectifs différents.\" \r\n\r\n\r\n\r\n- Karine Mazeau, Responsable de la Sécurité Informatique chez SNCF. Source : Article \"Quotidien d\'un expert en cybersécurité chez SNCF\", publié sur le site de L\'Usine Digitale, le 18 novembre 2020 :\r\n\r\n\"En tant que responsable de la sécurité informatique chez SNCF, mon travail consiste à protéger les données et les systèmes informatiques de l\'entreprise contre les menaces potentielles. Cela peut inclure la gestion des identités et des accès pour contrôler qui a accès aux données sensibles, la surveillance des réseaux pour détecter les comportements suspects et la formation des employés à la sécurité informatique pour réduire les risques humains. Mon quotidien est très varié, avec des défis différents à chaque fois et des projets en constante évolution.\" \r\n', '- Dr. Eric Filiol, Directeur de la Recherche et de l\'Innovation chez ESIEA. explique dans l\'article \"Comment devenir expert en cybersécurité ?\", publié sur le site de l\'ESIEA, le 2 novembre 2020 que :                                   \"Le métier de la cybersécurité consiste à protéger les systèmes informatiques, les réseaux et les données contre les cyberattaques. Les professionnels de la cybersécurité doivent être capables d\'analyser les menaces potentielles et de mettre en place des mesures de sécurité pour protéger les systèmes informatiques. Ils doivent également être capables de surveiller les réseaux et de détecter les comportements suspects pour prévenir les attaques avant qu\'elles ne se produisent. Les professionnels de la cybersécurité doivent être passionnés par leur travail et prêts à apprendre constamment, car les menaces en matière de sécurité évoluent rapidement.\" \r\n\r\n- Dans l\'article \"Cybersécurité : un métier d\'avenir\", publié sur le site de Le Monde Informatique, le 29 mars 2021, Romain Gueugneau, Professeur à l\'ESIEA et Expert en Cybersécurité, annonce que:    \r\n\r\n\"Le métier de la cybersécurité est essentiel dans notre société de plus en plus connectée. Les professionnels de la cybersécurité travaillent à protéger les systèmes informatiques et les réseaux contre les cyberattaques, en utilisant des outils et des techniques de sécurité avancés. Ils doivent être capables de comprendre les risques de sécurité potentiels et de mettre en place des mesures pour les prévenir. Ils doivent également être prêts à travailler sous pression et à résoudre rapidement les problèmes de sécurité qui surviennent. Le métier de la cybersécurité est dynamique et offre de nombreuses opportunités pour ceux qui cherchent un défi passionnant et stimulant.\" \r\n\r\n    \"Le métier de la cybersécurité est très diversifié, avec des rôles différents allant de la gestion de la sécurité informatique à la recherche sur les nouvelles technologies de sécurité. Les professionnels de la cybersécurité doivent être capables de comprendre les risques de sécurité potentiels et de mettre en place des mesures pour les prévenir. Ils doivent être prêts à travailler en équipe et à communiquer efficacement avec les autres parties prenantes pour assurer une sécurité efficace des systèmes informatiques. Le métier de la cybersécurité offre de nombreuses opportunités pour ceux qui cherchent un défi stimulant et qui sont prêts à apprendre constamment.\" - Dr. Aurélien Francillon, Professeur Associé à l\'Ecole Polytechnique Fédérale de Lausanne (EPFL). Source : Article \"Pourquoi la cybersécurité est un secteur porteur\", publié sur le site de l\'EPFL, le 9 avril 2019.', '', 'Le domaine de la cybersécurité est nouveau et en plein développement. Romaric Ludinard, Responsable pédagogique Mastère Spécialisé® Cybersécurité codélivré entre CentraleSupélec et IMT Atlantique explique que :\r\n \" C\'est un domaine qui nécessite une certaine curiosité et agilité. La participation à des CTF ou des activités du type RootMe ou HackTheBox est apprécié des recruteurs sur des profils techniques.\"\r\nEnifn, il conseille toutes personnes s\'intéressant au domaine de consulter les deux sites suivant :\r\n\r\n- https://www.ssi.gouv.fr/guide/panorama-des-metiers-de-la-cybersecurite/\r\n\r\n- https://www.ssi.gouv.fr/particulier/formations/secnumedu/formations-labellisees-secnumedu/\r\n\r\nLe premier énumère les métiers de la cybersécurité et le second les formations pour y accéder.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id_user`) VALUES
(1),
(17);

-- --------------------------------------------------------

--
-- Structure de la table `type_parcours`
--

CREATE TABLE `type_parcours` (
  `id_type_parcours` int(11) NOT NULL,
  `Titre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_parcours`
--

INSERT INTO `type_parcours` (`id_type_parcours`, `Titre`) VALUES
(1, 'Experience intra-IMT Atlantique'),
(2, 'Parcours Académique Hors-IMT Atlantique'),
(3, 'Parcours professionnelle Hors IMT Atlantique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` text NOT NULL,
  `user_preference` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_preference`) VALUES
(1, 'Lilian', '$2y$10$gdhPjGPVjLkEfiWXcXlcj.FLrOy5yhn7KoVKU7ZtyNRc86XvLNThS', 28),
(2, 'JulesVerne', '$2y$10$U9eiJg3I4eC6/aFpIdPF8.x5iT/ZxgEhnTZoPzfwMIMOU4D2X4I/.', 29),
(3, 'Claire', '$2y$10$VSKXHXS05D3fuSvdM1TATOspuZjDb0ackLgvTws/o8sffT144HErC', 30),
(4, 'Antoine ', '$2y$10$ZGQJAswoAO.SZFJ624pAC.fpAKJm5aTXYQZwelrGKCpmYTqqR64Ni', 31),
(5, 'Lola', '$2y$10$VtHZTPGurq9RzUA6tieIke4WgwQnr9ED3.Z1UBlyU2RV0Wd7en5qm', 32),
(7, 'Hicham', '$2y$10$YJLEmFqVWhdbJQ1f59NBiujUtZQrbcul3rrms6Cm1aFNKkiumfFqC', 34),
(8, 'Mehdi ', '$2y$10$xM9EK6mKu35wvhAYB24DxeuNwh136Be.k2LY6nY2IB3reLCbe5Lhu', 33),
(17, 'thomas', '$2y$10$g/UnvGeg2LcBcWzj18CbGOw4TeDM6smfsenjxHBvjj.BtWI/JiA0S', 35);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `block_parcours`
--
ALTER TABLE `block_parcours`
  ADD PRIMARY KEY (`id_parcours`),
  ADD KEY `id_type_parcours` (`id_type_parcours`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_ibfk_1` (`id_auteur`),
  ADD KEY `id_destinataire` (`id_destinataire`),
  ADD KEY `id_fichier` (`id_fichier`);

--
-- Index pour la table `preferences_utilisateurs`
--
ALTER TABLE `preferences_utilisateurs`
  ADD PRIMARY KEY (`id_preferences`);

--
-- Index pour la table `sous_domaines`
--
ALTER TABLE `sous_domaines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domaine` (`id_domaine`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `type_parcours`
--
ALTER TABLE `type_parcours`
  ADD UNIQUE KEY `id_type_parcours` (`id_type_parcours`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`user_preference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `block_parcours`
--
ALTER TABLE `block_parcours`
  MODIFY `id_parcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `id_domaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `preferences_utilisateurs`
--
ALTER TABLE `preferences_utilisateurs`
  MODIFY `id_preferences` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `sous_domaines`
--
ALTER TABLE `sous_domaines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `block_parcours`
--
ALTER TABLE `block_parcours`
  ADD CONSTRAINT `block_parcours_ibfk_1` FOREIGN KEY (`id_type_parcours`) REFERENCES `type_parcours` (`id_type_parcours`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_destinataire`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_domaines`
--
ALTER TABLE `sous_domaines`
  ADD CONSTRAINT `sous_domaines_ibfk_1` FOREIGN KEY (`id_domaine`) REFERENCES `domaines` (`id_domaine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_preference`) REFERENCES `preferences_utilisateurs` (`id_preferences`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
