-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 12:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `cours_title` varchar(255) NOT NULL,
  `lecturer_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `lecturer_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `lecturer_id`, `full_name`, `email`, `phone_number`, `password`, `created_at`, `updated_at`) VALUES
(1, '17/0017', 'Mgbe Emmanuel ', 'emmamgbe@gmail.com', '07046978421', '$2y$10$Ji59tmIiqi1jQ4KO2dLcz.zo/F/bUQxEDTZ6JCy2QrHPtNkh4L9xa', '2025-04-05 14:32:43', '2025-04-05 22:38:30'),
(2, '18/0018', 'Awoniyi Amos', 'amostox99@gmail.com', '09044555763', '$2y$10$ikj/ibMX2aKl.XGOYAMvreq2uki5Yw6mOYDSqd/XzfiEzOkQdBl.6', '2025-04-07 21:43:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_id` varchar(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `correct_option` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_text`, `option_1`, `option_2`, `option_3`, `correct_option`) VALUES
(46, 'bugst212-2', 'How many hours in a day?', '8', '21', '22', '24'),
(47, 'bugst212-2', 'How many days are there in a \"week\"?', '20', '\"21\"', '22', '7'),
(48, 'bugst212-2', 'How do you get inputs in C++?', '\"cout\"', 'stream', 'ech', 'cin'),
(49, 'bugst212-2', 'what is 4 to the power of 3?', '84', '72', '68', '64'),
(50, 'bugst212-2', 'What is the last day of the week in french?', 'lundi', 'vendredi', 'dimanche', 'samedi'),
(51, 'mth201-2', 'What is the output of 5 + 5?', '8', '21', '9', '10'),
(52, 'mth201-2', 'what is 10 square?', '90', '80', '75', '100'),
(53, 'mth201-2', 'what is the value of root -16?', '3i', '4.5i', '4', '4i'),
(54, 'mth201-2', 'what is 17 squared?', '279', '348', '259', '289'),
(55, 'mth201-2', 'What is 70 - 8?', '61', '63', '72', '62'),
(56, 'bugst220-2', 'What does sophia mean?', 'love', 'joy', 'reasoning', 'wisdom'),
(57, 'bugst220-2', 'philosophy originated in what year?', '600BC', '1100AD', '700BC', '690BC'),
(58, 'bugst220-2', 'Who is the father of modernism?', 'Aristotle', 'Thales', 'Francis Bacon', 'Rene Descartes'),
(59, 'bugst220-2', 'When does the medieval era start?', '1400AD', '1130AD', '100AD', '1100AD'),
(60, 'bugst220-2', 'Who said that logic is the money of the mind?', 'Jean Paul Satre', 'Aristotle', 'Maclntyre', 'Karl Marx'),
(61, 'bugst220-2', 'What acitvity of a philosopher involves setting standards?', 'analysing', 'penetration', 'comprehensiveness', 'prescribing'),
(62, 'bugst220-2', 'Trumpeter of positivism?', 'Friedrich Nietztiche', 'Rene Descartes', 'John Lock', 'August comte'),
(63, 'bugst220-2', 'Who believe that God is an absentee landlord?', 'Theist', 'Pantheist', 'Athiest', 'Deist'),
(64, 'bugst220-2', 'Absolute truth is that which is?', 'prefect and eternal', 'beginning and end', 'modern and concrete', 'eternal and universal'),
(65, 'bugst220-2', 'Logic law of identity states that?', 'A proposition is always true when proven', 'A proposition can be true and true', 'A proposition can not be true and untrue', 'If a proposition is true, then it is true'),
(66, 'bugst220-2', 'How many forms of categorical syllogism?', '64', '255', '72', '256'),
(67, 'bugst220-2', 'Logic plays the role that money plays in  political economy?', 'Francis Bacon', 'Rene Descartes', 'John Locke', 'Maclntyre'),
(68, 'bugst220-2', 'What year did Aristotle die?', '323BC', '323AD', '347BC', '322BC'),
(69, 'bugst220-2', 'Who wrote the Summa Theologica?', 'Aristotle', 'Thales of Miletus', 'Karl Max', 'Thomas Aquinas'),
(70, 'bugst220-2', 'When did Aristotle\'s teacher die?', '322BC', '422BC', '323AD', '347BC'),
(71, 'bugst220-2', 'What school of thought focuses on human senses?', 'neo-scholaticism', 'existentialism', 'rationalism', 'empiricism'),
(72, 'bugst220-2', 'father of rationalism?', 'Aristotle', 'baruch spinoza', 'francis bacon', 'Rene Descartes'),
(73, 'bugst220-2', 'what year did the trumpeter of neo-scholaticism die?', '1315', '1371', '1225', '1274'),
(74, 'bugst220-2', 'the mind is like a tabular rasa?', 'john lok', 'johne lock', 'john lock', 'john locke'),
(75, 'bugst220-2', 'what school of thought focus on practical things?', 'rationalism', 'empiricism', 'existentialism', 'pragmatism'),
(76, 'bugst220-2', 'which stement is true?', 'i do not remember', 'form can not stand on it\'s own', 'matter can stand on it\'s own', 'form exist without matter'),
(77, 'bugst220-2', 'who was the trumpeter of new science?', 'thales', 'edward drinker', 'baruch spinoza', 'francis bacon'),
(78, 'bugst220-2', 'what day did thales predict the eclipse will be?', 'may 1, 590', 'march 26, 585', 'may 23, 535', 'may 28, 585'),
(79, 'bugst220-2', 'who said knowledge is power?', 'maclyntyle', 'rene descartes', 'john locke', 'francis bacon'),
(80, 'bugst220-2', 'who was the pioneer of pragmatism?', 'edward jasper', 'john foster', 'willam james', 'charles pierce'),
(81, 'bugst220-2', 'all cows are herbivores, this is an example of ?', 'particular negative', 'particular affirmation', 'universal negative', 'universal affirmation'),
(82, 'bugst220-2', 'the original statement being converted is called?', 'converse', 'optus cardium', 'opus moneus', 'convertend'),
(83, 'bugst220-2', 'a major term is that which is?', 'the predicate of the major premise', 'the predicate of the minor premise', 'the subject of the conclusion', 'the predicate of the conclusion'),
(84, 'bugst220-2', 'the major downside to inductive reasoning is?', 'invalid speculations', 'faulty reasoning', 'lack of proof', 'hasty generalisations'),
(85, 'bugst220-2', 'no nigerians are canadians, example of?', 'universal affirmation', 'i do not remember', 'particular statement', 'universal negative'),
(86, 'bugst220-2', 'a statement which the truth of its premises is intended to guarantee the truth of its conclusion is?', 'inductive argument', 'deductive reasoning', 'inductive reasoning', 'deductive argument'),
(87, 'bugst220-2', 'the father of logic?', 'thales of miletus', 'socrates', 'plato', 'aristotle'),
(88, 'bugst220-2', 'the rule of excluded middle states that?', 'if a proposition is true, then it is true', 'a proposition can be true and untrue', 'a proposition can be false is proven', 'a proposition can either be true or false'),
(89, 'bugst220-2', 'what year was karl max born?', '1765', '1843', '1883', '1818'),
(90, 'bugst220-2', 'a professional doubter is a ?', 'rationalist', 'idealist', 'scholar', 'skeptist');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `matric_no` varchar(7) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'offline',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `matric_no`, `full_name`, `email`, `department`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, '23/0068', 'Richard Chibuike', 'franklinrichard2007@gmail.ng', 'software engineering', '$2y$10$D9Ygzb6VXpobN.NWz6S5A.MioSTtnw4qWvUzBkvYAxe.T9OFzeiCW', 'online', '2025-04-05 14:26:35', '2025-04-08 22:50:09'),
(2, '23/1259', 'akanbi-bello busayomi', 'akblilvine@gmail.com', 'computer science', '$2y$10$wPht3EojEJ7sl2VptFWak.OOQ5QTIip0Rd9QOeiUjrJxhiHIfTWZe', 'online', '2025-04-07 20:11:24', '2025-04-14 18:43:55'),
(3, '23/2610', 'Oluwatimilehin Akinosho', 'Oluwatimilehinkazeem@gmail.com', 'computer science', '$2y$10$MRefaEdzuejhqBi5gHhVS.QlRvGYo3WGC8XDFkIIiIQplsHDh4bA6', 'online', '2025-04-07 20:22:51', '2025-04-14 18:53:09'),
(4, '23/0143', 'ezekiel-hart dew', 'ezekielhartdew@gmail.com', 'software engineering', '$2y$10$dxoaVZsnof/tyl.dNJIVwe1RAskFouWBlihFC/0TwvUjpMe2qstvW', 'offline', '2025-04-07 20:36:33', '2025-04-07 20:45:43'),
(6, '23/0172', 'Wariowei Waj', 'waj@gmail.com', 'software engineering', '$2y$10$AMmZXgAX765MJqKhsV198.deKdDsM2eGTFOmuqnYNKeilv.jKIO5C', 'online', '2025-04-14 17:57:46', '2025-04-14 17:57:55'),
(7, '23/0015', 'Bahago Jason', 'jt@gmail.com', 'software engineering', '$2y$10$tXwySjE9BKX3rliRGTqaPuFqi8KR8fUvi/YuOOtDBdPrRk7CCRX6C', 'online', '2025-04-14 18:02:36', '2025-04-14 18:02:46'),
(8, '23/0035', 'Next Chinex', 'chinex@gmail.com', 'software engineering', '$2y$10$b6y7KqiYmE0.bNTKY7o3vuI3GxFib1NP2RkOmFIk9d06vVlpXweEa', 'online', '2025-04-14 18:07:16', '2025-04-14 18:07:28'),
(9, '23/0275', 'Nzekwe Melie', 'melie@gmail.com', 'software engineering', '$2y$10$HoBGGN8jAvtTdXk.cXx.vOSENc9VbnAcOhMRzMtSdqlJ4z6UMrAXm', 'online', '2025-04-14 18:12:17', '2025-04-14 18:12:30'),
(10, '23/0114', 'Ola-davies Tooyosi', 'toyosi@gmail.com', 'software engineering', '$2y$10$dXZD/qpuoYZYbD3TdlwIn..Mdw.XcU362fXEp6lU5LNzwrQY1X1OG', 'online', '2025-04-14 18:17:22', '2025-04-14 18:17:38'),
(11, '23/1287', 'Akinneye Bright', 'bright@gmail.com', 'computer science', '$2y$10$73/4k19jsSyNxdgcMxnIsOpZONzNCsG8oMSdv9oi5N9yER.eKuH3K', 'online', '2025-04-14 18:57:44', '2025-04-14 18:57:57'),
(12, '23/0032', 'Onikosi Emmanuel', 'emma@gmail.com', 'software engineering', '$2y$10$cJmdn37r/nYxwC.1n0692./dqmotS5d0JAgZIeZfHCTQMiRrRwXYS', 'online', '2025-04-14 20:02:40', '2025-04-14 20:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_tests`
--

CREATE TABLE `student_tests` (
  `id` int(11) NOT NULL,
  `student_id` varchar(7) NOT NULL,
  `test_id` varchar(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `score` decimal(10,2) NOT NULL,
  `date_taken` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tests`
--

INSERT INTO `student_tests` (`id`, `student_id`, `test_id`, `correct_answers`, `score`, `date_taken`) VALUES
(32, '23/0068', 'bugst212-2', 2, 66.67, '2025-04-08 22:03:21'),
(34, '23/0172', 'bugst220-2', 8, 53.33, '2025-04-14 18:01:30'),
(35, '23/0015', 'bugst220-2', 7, 46.67, '2025-04-14 18:06:15'),
(36, '23/0035', 'bugst220-2', 4, 26.67, '2025-04-14 18:10:34'),
(37, '23/0275', 'bugst220-2', 9, 60.00, '2025-04-14 18:15:27'),
(38, '23/0114', 'bugst212-2', 1, 33.33, '2025-04-14 18:18:13'),
(39, '23/0114', 'bugst220-2', 4, 26.67, '2025-04-14 18:21:14'),
(43, '23/1287', 'bugst220-2', 5, 33.33, '2025-04-14 19:01:11'),
(46, '23/0032', 'bugst220-2', 8, 26.67, '2025-04-14 20:14:39'),
(47, '23/1259', 'bugst220-2', 21, 70.00, '2025-04-14 20:51:42'),
(48, '23/2610', 'bugst220-2', 22, 73.33, '2025-04-14 20:59:08'),
(50, '23/0068', 'bugst220-2', 20, 66.67, '2025-04-15 18:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_id` varchar(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `question_count` int(11) NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `lecturer_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_id`, `course_code`, `course_title`, `duration`, `question_count`, `is_published`, `created_at`, `updated_at`, `lecturer_id`) VALUES
(16, 'bugst212-2', 'bugst212', 'General knowledge', 2, 3, 1, '2025-04-08 21:18:48', '2025-04-08 21:18:48', '17/0017'),
(17, 'mth201-2', 'mth201', 'Introduction to Mathematics', 1, 5, 1, '2025-04-08 22:49:37', '2025-04-08 22:49:37', '17/0017'),
(18, 'bugst220-2', 'bugst220', 'Philosophy of Science', 7, 30, 1, '2025-04-14 19:53:36', '2025-04-14 19:53:36', '17/0017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturer_id` (`lecturer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matric_no` (`matric_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_tests`
--
ALTER TABLE `student_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_id` (`test_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_tests`
--
ALTER TABLE `student_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`lecturer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_tests`
--
ALTER TABLE `student_tests`
  ADD CONSTRAINT `student_tests_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_tests_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`matric_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`lecturer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
