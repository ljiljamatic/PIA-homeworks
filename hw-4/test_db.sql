-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 04:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `year` int(55) NOT NULL,
  `production` varchar(55) NOT NULL,
  `runtime` int(55) NOT NULL,
  `imdb_rating` float NOT NULL,
  `directors` varchar(255) NOT NULL,
  `scenarist` varchar(255) NOT NULL,
  `stars` varchar(500) NOT NULL,
  `genres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image_url`, `year`, `production`, `runtime`, `imdb_rating`, `directors`, `scenarist`, `stars`, `genres`) VALUES
(38, 'The Heat', 'An uptight FBI Special Agent is paired with a foul-mouthed Boston cop to take down a ruthless drug lord.', 'TheHeat.jpg', 2013, 'Jefferson Sage', 117, 0, 'Paul Feig', 'Katie Dippold', 'Sandra Bullock, Michael McDonald, Melissa McCarthy', 'Action, Comedy, Crime'),
(50, 'Miss Congeniality', 'An F.B.I. Agent must go undercover in the Miss United States beauty pageant to prevent a group from bombing the event.', 'MissCongeniality.jpg', 2000, 'Peter Larkin', 109, 0, 'Donald Petrie', 'Marc Lawrence', 'Sandra Bullock, Michael Caine, Benjamin Bratt', 'Action, Comedy, Crime'),
(52, 'Legally Blonde', 'Elle Woods, a fashionable sorority queen, is dumped by her boyfriend. She decides to follow him to law school. While she is there, she figures out that there is more to her than just looks.', 'LegallyBlonde.jpg', 2001, 'Missy Stewart', 96, 0, 'Robert Luketic', 'Amanda Brown', 'Reese Witherspoon, Luke Wilson, Selma Blair', 'Comedy, Romance'),
(54, 'Judas and the Black Messiah', 'The story of Fred Hampton, Chairman of the Illinois Black Panther Party, and his fateful betrayal by FBI informant William O Neal.', 'Judas.jpg', 2021, 'Sam Lisenco', 126, 0, 'Shaka King', 'Will Berson', 'Daniel Kaluuya, LaKeith Stanfield, Jesse Plemons', 'Biography, Drama, History'),
(55, 'Howling II: Stirba - Werewolf Bitch', 'A man discovers that his sister was a werewolf, and helps an investigator track down a gang of the monsters through the United States and eastern Europe.', 'Howling.jpg', 1985, 'Karel Vacek', 91, 0, 'Philippe Mora', 'Gary Brandner', 'Christopher Lee, Annie McEnroe, Reb Brown', 'Horror'),
(58, 'Harry Potter and the Goblet of Fire', 'Harry Potter finds himself competing in a hazardous tournament between rival schools of magic, but he is distracted by recurring nightmares.', 'HarryPotter.jpg', 2005, 'Stuart Craig', 157, 0, 'Mike Newell', 'Steve Kloves', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'Adventure'),
(59, 'Bambi', 'The story of a young deer growing up in the forest.', 'Bambi.jpg', 1942, 'Walt Disney', 70, 0, 'James Algar, Samuel Armstrong', 'Felix Salten', 'Hardie Albright, Stan Alexander, Bobette Audrey', 'Animation, Drama'),
(60, 'Captain Marvel', 'Carol Danvers becomes one of the most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.', 'Marvel.jpg', 2019, 'Andy Nicholson', 123, 0, 'Anna Boden, Ryan Fleck', 'Anna Boden', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn', 'Action, Adventure, Sci-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `rating_system`
--

CREATE TABLE `rating_system` (
  `id` int(11) NOT NULL,
  `rating_title` varchar(100) NOT NULL,
  `rating_user` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_system`
--

INSERT INTO `rating_system` (`id`, `rating_title`, `rating_user`, `rate`) VALUES
(8, 'Miss Congeniality', 'ljiljana', 10),
(9, 'The Heat', 'bojana', 4),
(10, 'The Heat', 'ljiljana', 1),
(11, 'The Heat', 'nikola', 3),
(12, 'Miss Congeniality', 'nikola', 10),
(13, 'The Heat', 'milica', 4),
(14, 'Miss Congeniality', 'milica', 10),
(15, 'Judas and the Black Messiah', 'ljiljana', 10),
(16, 'Legally Blonde', 'ljiljana', 1),
(17, 'Harry Potter and the Goblet of Fire', 'ljiljana', 10),
(18, 'Howling II: Stirba - Werewolf Bitch', 'ljiljana', 7),
(19, 'Captain Marvel', 'ljiljana', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `email`, `admin`) VALUES
(22, 'danijela', 'danijela', 'Danijela', 'danijela@gmail.com', 'admin'),
(23, 'novica', 'novica', 'Novica', 'novica@gmail.com', 'admin'),
(26, 'nikola', 'nikola', 'Nikola', 'nikola@gmail.com', ''),
(27, 'bojana', 'bojana', 'Bojana', 'bojana@gmail.com', ''),
(28, 'ljiljana', 'ljiljana', 'Ljiljana', 'ljiljamatic99@gmail.com', ''),
(29, 'milica', 'milica', 'Milica', 'milica@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `rating_system`
--
ALTER TABLE `rating_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rating_system`
--
ALTER TABLE `rating_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
