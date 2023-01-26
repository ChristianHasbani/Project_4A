-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 10:01 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_4a`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenge_level`
--

DROP TABLE IF EXISTS `challenge_level`;
CREATE TABLE IF NOT EXISTS `challenge_level` (
  `challenge_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_score_id` int(11) NOT NULL,
  `student_level_id` int(11) NOT NULL,
  `student_can_challenge` tinyint(4) DEFAULT NULL,
  `challenge_test_challenge_test_id` int(11) NOT NULL,
  PRIMARY KEY (`challenge_level_id`),
  KEY `fk_challenge_level_challenge_test1_idx` (`challenge_test_challenge_test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_test`
--

DROP TABLE IF EXISTS `challenge_test`;
CREATE TABLE IF NOT EXISTS `challenge_test` (
  `challenge_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_score` float DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`challenge_test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `example_phrase`
--

DROP TABLE IF EXISTS `example_phrase`;
CREATE TABLE IF NOT EXISTS `example_phrase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` varchar(100) DEFAULT NULL,
  `phrase_tense` varchar(45) DEFAULT NULL,
  `verb_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_example_phrase_verb1_idx` (`verb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `example_phrase`
--

INSERT INTO `example_phrase` (`id`, `phrase`, `phrase_tense`, `verb_id`) VALUES
(1, 'Tom was in New York yesterday.', 'Simple Past', 1),
(2, 'I\'ve been at this job for a long time.', 'Past Participle', 1),
(3, 'She\'ll be at the party next weekend.', 'Infinitive', 1),
(4, 'We beat the home team yesterday', 'Simple Past', 2),
(5, 'I\'ve never beaten Tom at chess.', 'Past Participle', 2),
(6, 'Do you think you could beat him?', 'Infinitive', 2),
(7, 'Jason has become an excellent doctor.', 'Past Participle', 3),
(8, 'I\'ll become your friend if you move here.', 'Infinitive', 3),
(9, 'The situation became a problem for Bob.', 'Simple Past', 3),
(10, 'They haven\'t begun the play yet.', 'Past Participle', 4),
(11, 'I began to work early this morning.', 'Simple Past', 4),
(12, 'She\'ll begin to explain in a moment.', 'Infinitive', 4),
(13, 'He bent the branch until it broke.', 'Simple Past', 5),
(14, 'The flag poll bends in the wind.', 'Infinitive', 5),
(15, 'I\'ve bent the nail in the board. ', 'Past Participle', 5),
(16, 'My boy has broken three windows this week!', 'Past Participle', 8),
(17, 'I broke that window last week.', 'Simple Past', 8),
(18, 'She usually breaks the egg over the sink. ', 'Infinitive', 8),
(19, 'Janice bought a new watch last week.', 'Simple Past', 11),
(20, 'I usually buy my vegetables at a country stand.', 'Infinitive', 11),
(21, 'He\'s bought more than 10 cars in his life. ', 'Past Participle', 11),
(22, 'We came home earlier yesterday.', 'Simple Past', 14),
(23, 'He comes to class on time every day.', 'Infinitive', 14),
(24, 'He\'s come across that song before. ', 'Past Participle', 14),
(25, 'How many pieces have you cut?', 'Past Participle', 16),
(26, 'I cut my finger on a glass yesterday.', 'Simple Past', 16),
(27, 'The boy never cuts his own steak.', 'Infinitive', 16),
(28, 'She drew a beautiful picture in class.', 'Simple Past', 18),
(29, 'Jackie has drawn a few clowns this week.', 'Past Participle', 18),
(30, 'She\'ll draw the money from the account tomorrow. ', 'Infinitive', 18),
(31, 'I was so thirsty I drank two bottles of water.', 'Simple Past', 19),
(32, 'Have you drunk any water yet?', 'Past Participle', 19),
(33, 'I\'ll drink something when I get there. ', 'Infinitive', 19),
(34, 'Have you ever driven across the U.S.?', 'Past Participle', 20),
(35, 'I drove to the basketball game after work.', 'Simple Past', 20),
(36, 'He\'s going to drive to the airport this evening. ', 'Infinitive', 20),
(37, 'We ate lunch early today.', 'Simple Past', 21),
(38, 'Have you eaten already?', 'Past Participle', 21),
(39, 'Where did you eat dinner yesterday?', 'Infinitive', 21),
(40, 'Have you found him yet?', 'Past Participle', 26),
(41, 'I found this book on that table over there.', 'Simple Past', 26),
(42, 'I\'ll find him, don\'t worry!', 'Infinitive', 26),
(43, 'Cheryl flew to Brazil last month.', 'Simple Past', 27),
(44, 'Have you ever flown around the world?', 'Past Participle', 27),
(45, 'He\'s going to fly a commercial airliner someday.', 'Infinitive', 27),
(46, 'Have you forgotten that you had an appointment?', 'Past Participle', 29),
(47, 'I forgot my pen at home. Can I borrow yours?', 'Simple Past', 29),
(48, 'You\'ll have forgotten by the time you get home.', 'Infinitive', 29),
(49, 'They gave us an early appointment.', 'Simple Past', 33),
(50, 'He\'s given up on trying to learn Japanese.', 'Past Participle', 33),
(51, 'I\'ll give you a call next week. ', 'Infinitive', 33),
(52, 'Have you ever gone on vacation alone?', 'Past Participle', 34),
(53, 'She\'s going to ride the bus to work today.', 'Infinitive', 34),
(54, 'I went to the party last week. ', 'Simple Past', 34),
(55, 'She grew up very poor.', 'Simple Past', 35),
(56, 'The plants have all grown.', 'Past Participle', 35),
(57, 'Did you grow that plant?', 'Infinitive', 35),
(58, 'I had some toast for breakfast.', 'Simple Past', 36),
(59, 'I\'ve had some extra free time this week.', 'Past Participle', 36),
(60, 'She\'ll have the package ready when you come. ', 'Infinitive', 36),
(61, 'He\'s hit me three times!', 'Past Participle', 39),
(62, 'Bob hit the ball out of the park last night.', 'Simple Past', 39),
(63, 'He usually hits his nine iron well.', 'Infinitive', 39),
(64, 'She held on tightly and entered the tunnel.', 'Simple Past', 40),
(65, 'I\'ve held her hand before.', 'Past Participle', 40),
(66, 'Hold on for a few more minutes. ', 'Infinitive', 40),
(67, 'Have you kept your word to Peter?', 'Past Participle', 42),
(68, 'John kept the door open for his mother.', 'Simple Past', 42),
(69, 'I\'ll keep your secret.', 'Infinitive', 42),
(70, 'I knew that once ...', 'Simple Past', 43),
(71, 'I\'ve known my best friend for more than 40 years.', 'Past Participle', 43),
(72, 'Peter will know the answer. ', 'Infinitive', 43),
(73, 'We left the book at home.', 'Simple Past', 44),
(74, 'He\'s left the house early this morning.', 'Past Participle', 44),
(75, 'We\'ll leave as soon as you get home. ', 'Infinitive', 44),
(76, 'I made the bed before I left.', 'Simple Past', 49),
(77, 'I\'ve made some tea. Would you like some?', 'Past Participle', 49),
(78, 'Will he make the meeting next week?', 'Infinitive', 49),
(79, 'Have you met Jack?', 'Past Participle', 51),
(80, 'We\'re going to meet at 3 o\'clock next week.', 'Infinitive', 51),
(81, 'He met his wife in Hawaii.', 'Simple Past', 51),
(82, 'He paid by credit card.', 'Simple Past', 52),
(83, 'I\'ll pay the bill and we can leave.', 'Infinitive', 52),
(84, 'Janet is paid by the hour. ', 'Past Participle', 52),
(85, 'She put on a CD and relaxed for the afternoon.', 'Simple Past', 53),
(86, 'I\'ve put in for a new job.', 'Past Participle', 53),
(87, 'She\'ll put him up for the night.', 'Infinitive', 53),
(88, 'Mary rode the bus to work.', 'Simple Past', 55),
(89, 'I\'ve ridden a bike all my life.', 'Past Participle', 55),
(90, 'She\'ll ride with Tim to the party. ', 'Infinitive', 55),
(91, 'I ran four miles yesterday.', 'Simple Past', 57),
(92, 'We\'ve run out of milk, so I\'ll go to the store.', 'Past Participle', 57),
(93, 'David usually runs two miles a day.', 'Infinitive', 57),
(94, 'Have you seen Angie yet?', 'Past Participle', 59),
(95, 'I saw the film last week.', 'Simple Past', 59),
(96, 'She\'s going to see her friend next weekend. ', 'Infinitive', 59);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `student_level` int(11) DEFAULT NULL,
  `avg_score_value` float DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `email_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `firstName`, `lastName`, `role`, `username`, `password`, `student_level`, `avg_score_value`) VALUES
(1, 'Christian', 'HASBANI', 'Student', 'ch088411', 'password', 1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `verb`
--

DROP TABLE IF EXISTS `verb`;
CREATE TABLE IF NOT EXISTS `verb` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID for each verb',
  `infinitive` varchar(45) DEFAULT NULL COMMENT 'infititive form of each verb\n',
  `simple_past` varchar(45) DEFAULT NULL,
  `past_participle` varchar(45) DEFAULT NULL COMMENT 'past participle of each verb',
  `verb_translation` varchar(45) DEFAULT NULL COMMENT 'translation of each verb in french\n',
  `difficulty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verb`
--

INSERT INTO `verb` (`id`, `infinitive`, `simple_past`, `past_participle`, `verb_translation`, `difficulty`) VALUES
(1, 'be', 'was/were', 'been', 'être', 1),
(2, 'beat', 'beat', 'beaten', 'battre', 2),
(3, 'become', 'became', 'become', 'devenir', 1),
(4, 'begin', 'began', 'begun', 'commencer', 1),
(5, 'bend', 'bent', 'bent', 'plier', 3),
(6, 'bite', 'bit', 'bitten', 'mordre', 2),
(7, 'blow', 'blew', 'blown', 'frapper', 2),
(8, 'break', 'broke', 'broken', 'casser', 1),
(9, 'bring', 'brought', 'brought', 'apporter', 1),
(10, 'build', 'built', 'built', 'construire', 1),
(11, 'buy', 'bought', 'bought', 'acheter', 1),
(12, 'catch', 'caught', 'caught', 'capture', 1),
(13, 'choose', 'chose', 'chosen', 'choisir', 2),
(14, 'come', 'came', 'come', 'viens', 1),
(15, 'cost', 'cost', 'cost', 'Coût', 1),
(16, 'cut', 'cut', 'cut', 'couper', 1),
(17, 'do', 'did', 'done', 'faire', 1),
(18, 'draw', 'drew', 'drawn', 'dessiner', 2),
(19, 'drink', 'drank', 'drunk', 'boire', 1),
(20, 'drive', 'drove', 'driven', ' conduire', 2),
(21, 'eat', 'ate', 'eaten', 'manger', 1),
(22, 'fall', 'fell', 'fallen', 'tombe', 1),
(23, 'feed', 'fed', 'fed', 'nourrir', 2),
(24, 'feel', 'felt', 'felt', 'ressentir', 1),
(25, 'fight', 'fought', 'fought', 'se battre', 2),
(26, 'find', 'found', 'found', 'trouver', 1),
(27, 'fly', 'flew', 'flown', 'voler', 2),
(28, 'forbid', 'forbade', 'forbidden', 'interdire', 3),
(29, 'forget', 'forgot', 'forgotten', 'Oubliez', 2),
(30, 'forgive', 'forgave', 'forgiven', 'pardonner', 3),
(31, 'freeze', 'froze', 'frozen', 'gel', 3),
(32, 'get', 'got', 'got', 'obtenir', 1),
(33, 'give', 'gave', 'given', 'donner', 1),
(34, 'go', 'went', 'gone', 'aller', 1),
(35, 'grow', 'grew', 'grown', 'grandir', 2),
(36, 'have', 'had', 'had', 'avoir', 1),
(37, 'hear', 'heard', 'heard', 'entendre', 1),
(38, 'hide', 'hid', 'hidden', 'cacher', 3),
(39, 'hit', 'hit', 'hit', 'frapper', 1),
(40, 'hold', 'held', 'held', 'tenir', 2),
(41, 'hurt', 'hurt', 'hurt', 'blesser', 3),
(42, 'keep', 'kept', 'kept', 'garder', 1),
(43, 'know', 'knew', 'known', 'connaître', 1),
(44, 'leave', 'left', 'left', 'laisser', 1),
(45, 'lend', 'lent', 'lent', 'prêter', 3),
(46, 'let', 'let', 'let', 'laisser', 2),
(47, 'light', 'lit', 'lit', 'éclairer', 3),
(48, 'lose', 'lost', 'lost', 'perdre', 1),
(49, 'make', 'made', 'made', 'Fabriquer', 1),
(50, 'mean', 'meant', 'meant', 'signifier', 3),
(51, 'meet', 'met', 'met', 'rencontrer', 2),
(52, 'pay', 'paid', 'paid', 'Payer', 1),
(53, 'put', 'put', 'put', 'mettre', 1),
(54, 'read', 'read', 'read', 'lire', 1),
(55, 'ride', 'rode', 'ridden', 'monter', 3),
(56, 'ring', 'rang', 'rung', 'appeller', 3),
(57, 'run', 'ran', 'run', 'courir', 1),
(58, 'say', 'said', 'said', 'dire', 1),
(59, 'see', 'saw', 'seen', 'voir', 1),
(60, 'sell', 'sold', 'sold', 'vendre', 2),
(61, 'send', 'sent', 'sent', 'envoyer', 3),
(62, 'set', 'set', 'set', 'Positionner', 3),
(63, 'shake', 'shook', 'shaken', 'secouer', 2),
(64, 'shine', 'shone', 'shone', 'briller', 3),
(65, 'shoot', 'shot', 'shot', 'tirer', 1),
(66, 'show', 'showed', 'shown', 'Afficher', 2),
(67, 'shrink', 'shrank', 'shrunk', 'rétrécir', 3),
(68, 'shut', 'shut', 'shut', 'fermer', 1),
(69, 'sing', 'sang', 'sung', 'chanter', 2),
(70, 'sit', 'sat', 'sat', 's\'asseoir', 1),
(71, 'sleep', 'slept', 'slept', 'dormir', 1),
(72, 'speak', 'spoke', 'spoken', 'parlez', 1),
(73, 'spend', 'spent', 'spent', 'passer', 3),
(74, 'split', 'split', 'split', 'diviser', 3),
(75, 'spoil', 'spoilt', 'spoilt', 'gâcher', 3),
(76, 'stand', 'stood', 'stood', 'supporter', 2),
(77, 'steal', 'stole', 'stolen', 'voler', 2),
(78, 'stick', 'stuck', 'stuck', 'coller', 3),
(79, 'swim', 'swam', 'swum', 'nager', 2),
(80, 'take', 'took', 'taken', 'prendre', 1),
(81, 'teach', 'taught', 'taught', 'enseigner', 2),
(82, 'tear', 'tore', 'torn', 'déchirer', 3),
(83, 'tell', 'told', 'told', 'dire', 1),
(84, 'think', 'thought', 'thought', 'penser', 1),
(85, 'throw', 'threw', 'thrown', 'jeter', 2),
(86, 'understand', 'understood', 'understood', 'comprendre', 1),
(87, 'wake', 'woke', 'woken', 'se réveiller', 1),
(88, 'wear', 'wore', 'worn', 'porter', 2),
(89, 'win', 'won', 'won', 'gagner', 1),
(90, 'write', 'wrote', 'written', 'écrire', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge_level`
--
ALTER TABLE `challenge_level`
  ADD CONSTRAINT `fk_challenge_level_challenge_test1` FOREIGN KEY (`challenge_test_challenge_test_id`) REFERENCES `challenge_test` (`challenge_test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `example_phrase`
--
ALTER TABLE `example_phrase`
  ADD CONSTRAINT `fk_example_phrase_verb1` FOREIGN KEY (`verb_id`) REFERENCES `verb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
