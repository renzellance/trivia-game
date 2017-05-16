-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2017 at 09:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trivia-quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(11) NOT NULL,
  `takerID` int(11) NOT NULL,
  `q1Answer` varchar(1) NOT NULL,
  `q2Answer` varchar(1) NOT NULL,
  `q3Answer` varchar(1) NOT NULL,
  `q4Answer` varchar(1) NOT NULL,
  `q5Answer` varchar(1) NOT NULL,
  `q6Answer` varchar(1) NOT NULL,
  `q7Answer` varchar(1) NOT NULL,
  `q8Answer` varchar(1) NOT NULL,
  `q9Answer` varchar(1) NOT NULL,
  `q10Answer` varchar(1) NOT NULL,
  `q11Answer` varchar(1) NOT NULL,
  `q12Answer` varchar(1) NOT NULL,
  `q13Answer` varchar(1) NOT NULL,
  `q14Answer` varchar(1) NOT NULL,
  `q15Answer` varchar(1) NOT NULL,
  `q16Answer` varchar(1) NOT NULL,
  `q17Answer` varchar(1) NOT NULL,
  `q18Answer` varchar(1) NOT NULL,
  `q19Answer` varchar(1) NOT NULL,
  `q20Answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `OptionA` varchar(100) NOT NULL,
  `OptionB` varchar(100) NOT NULL,
  `OptionC` varchar(100) NOT NULL,
  `OptionD` varchar(100) NOT NULL,
  `correct` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `question`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `correct`) VALUES
(1, 'What does Renzel like to do during his free time?', 'Play video games', 'Do extreme sports', 'Weightlift in the gym', 'Sulk in bed all day depressed while thinking about how pointless life is', 'A'),
(2, 'What vegetable doesn''t Renzel eat?', 'Broccoli', 'Cucumber', 'Cabbage', 'He eats anything', 'B'),
(3, 'What is Renzel''s morning beverage of choice?', 'Coffee', 'Tea', 'Orange Juice', 'Water', 'A'),
(4, 'What is Renzel''s favourite band?', 'Radiohead', 'Oasis', 'The Killers', 'The Arctic Monkeys', 'D'),
(5, 'What instrument can Renzel play?', 'Violin', 'Piano', 'Guitar', 'Trombone', 'C'),
(6, 'How many hours of sleep does Renzel need to function properly?', '6 hours', '7 hours', '8 hours', 'SLEEP IS FOR THE WEAK', 'B'),
(7, 'What is Renzel''s all-time favourite game?', 'Ragnarok Online', 'Warcraft III', 'Pokemon', 'The Elder Scrolls V: Skyrim', 'A'),
(8, 'What was Renzel''s childhood dream?', 'To be an astronaut', 'To rule the world', 'To be an inventor', 'To be a shinobi from the Leaf Village who will become the next hokage', 'C'),
(9, 'What does Renzel fear most?', 'Being alone', 'Falling off a great height', 'Inevitable death and the oblivion that follows it', 'Running out of food', 'C'),
(10, 'Who does Renzel believe in the most?', 'God', 'Celebrities', 'Politicians', 'Himself', 'D'),
(11, 'What is Renzel''s favourite fast food place?', 'McDonald''s', 'Jollibee', 'KFC', 'Burger King', 'C'),
(12, 'How many times has Renzel gone out of the country?', '1', '2', '3', '4', 'A'),
(13, 'Which social media channel does Renzel use most?', 'Facebook', 'Twitter', 'Instagram', 'Snapchat', 'A'),
(14, 'Which of these best describes Renzel''s OCD level?', '"You missed a space, but that''s okay."', '"You missed a space! Check your work again."', '"You missed a space! I''ll fix it myself!"', '"YOU ARE LITERALLY HURTING ME BY MISSING A SPACE! THE WORLD IS FALLING APART!"', 'D'),
(15, 'When selecting a product to purchase, what does Renzel take into consideration the most?', 'Quantity', 'Quality', 'Price', 'Location', 'B'),
(16, 'What is Renzel''s favourite color?', 'Blue', 'Black', 'Purple', 'Grey', 'C'),
(17, 'What is Renzel''s preferred browser?', 'Mozilla Firefox', 'Mozilla Waterfox', 'Google Chrome', 'Microsoft Edge', 'B'),
(18, 'What is Renzel''s preferred text editor for coding?', 'Visual Studio Code', 'Notepad++', 'Sublime Text', 'Atom', 'A'),
(19, 'There is a 10:00 AM meeting, what time does Renzel usually arrive?', '9:55 AM', '10:00 AM', '10:30 AM', '12:00 PM', 'A'),
(20, 'What is the name of Renzel''s girlfriend?', 'Cecilia', 'Jenny', 'Delilah', 'Samantha', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `takers`
--

CREATE TABLE `takers` (
  `takerID` int(11) NOT NULL,
  `takerLastName` varchar(50) NOT NULL,
  `takerFirstName` varchar(50) NOT NULL,
  `takerEmail` varchar(254) NOT NULL,
  `takerScore` int(11) NOT NULL,
  `dateTaken` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `takers`
--
ALTER TABLE `takers`
  ADD PRIMARY KEY (`takerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `takers`
--
ALTER TABLE `takers`
  MODIFY `takerID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
