-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 01:03 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysystem`
--
CREATE DATABASE IF NOT EXISTS `librarysystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `librarysystem`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `address`, `phone`) VALUES
(4, 'Prince Harry, The Duke of Sussex', '123 Test address', '317-555-5555'),
(5, 'John Grisham', '123 Test street', '317-555-5555'),
(6, 'Stephen King', 'N/A', 'N/A'),
(7, 'Jordan Moore', 'N/A', 'N/A'),
(8, 'Colleen Hoover', 'N/A', 'N/A'),
(10, 'Test Author 123', '123', '3175555555');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `genre` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `copies` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Cost` float NOT NULL,
  `Descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `genre`, `author_id`, `publisher_id`, `copies`, `ISBN`, `Cost`, `Descr`) VALUES
(2, 'The Boys from Biloxi', 'Mystery', 5, 5, 1, 385548923, 14.12, '#1 NEW YORK\r\nTIMES BESTSELLER • Two families. One courtroom showdown. • John Grisham’s most\r\ngripping thriller yet. • “A legal literary legend.” —USA Today\r\n \r\nJohn Grisham\r\nreturns to Mississippi with the riveting story of two sons of immigrant families\r\nwho grow up as friends, but ultimately find themselves on opposite sides of the\r\nlaw. Grisham’s trademark twists and turns will keep you tearing through the pages\r\nuntil the stunning conclusion.\r\n\r\nFor most of the last hundred years, Biloxi\r\nwas known for its beaches, resorts, and seafood industry. But it had a darker side.\r\nIt was also notorious for corruption and vice, everything from gambling,\r\nprostitution, bootleg liquor, and drugs to contract killings. The vice was\r\ncontrolled by small cabal of mobsters, many of them rumored to be members of the\r\nDixie Mafia.\r\n \r\nKeith Rudy and Hugh Malco grew up in Biloxi in the sixties and\r\nwere childhood friends, as well as Little League all-stars. But as teenagers, their\r\nlives took them in different directions. Keith’s father became a legendary\r\nprosecutor, determined to “clean up the Coast.” Hugh’s father became the “Boss” of\r\nBiloxi’s criminal underground. Keith went to law school and followed in his\r\nfather’s footsteps. Hugh preferred the nightlife and worked in his father’s clubs.\r\nThe two families were headed for a showdown, one that would happen in a courtroom.\r\nr\n \r\nLife itself hangs in the balance in The Boys from Biloxi, a sweeping saga\r\nrich with history and with a large cast of unforgettable characters.'),
(3, 'Verity', 'testGenre', 8, 6, 1, 1538724731, 11.42, 'Lowen Ashleigh is a\r\nstruggling writer on the brink of financial ruin when she accepts the job offer of\r\na lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has\r\nhired Lowen to complete the remaining books in a successful series his injured wife\r\nis unable to finish.\r\n \r\nLowen arrives at the Crawford home, ready to sort\r\nthrough years of Verity’s notes and outlines, hoping to find enough material to get\r\nher started. What Lowen doesn’t expect to uncover in the chaotic office is an\r\nunfinished autobiography Verity never intended for anyone to read. Page after page\r\nof bone-chilling admissions, including Verity&#39;s recollection of the night her\r\nfamily was forever altered.\r\n \r\nLowen decides to keep the manuscript hidden\r\nfrom Jeremy, knowing its contents could devastate the already grieving father. But\r\nas Lowen’s feelings for Jeremy begin to intensify, she recognizes all the ways she\r\ncould benefit if he were to read his wife’s words. After all, no matter how devoted\r\nJeremy is to his injured wife, a truth this horrifying would make it impossible for\r\nhim to continue loving her.'),
(4, 'Interesting Facts For Curious Minds', 'Horror', 7, 7, 1, 887680026, 13.65, 'Interesting Facts For Curious Minds gives you the answer to all\r\nthese and many, many more questions that I know have crossed your mind from time to\r\ntime. This book is divided into 63 chapters by topic for your convenience, bringing\r\nyou a nice mix of science, history, pop culture, and all sorts of stuff in between.\r\nEach chapter contains 25 concise yet engaging factoids that are sure to make you\r\nthink and at times laugh.\r\nHow you read this book is entirely up to you. I’m sure\r\nmost of you will read it cover to cover at some point, but when you’re with friends\r\nand family you can pick the chapters out that most appeal to all of you.\r\n\r\r\nnHowever you read this book, I guarantee you’ll find it one of the best '),
(5, 'Fairy Tale', 'Science Fiction', 6, 8, 1, 1668002175, 14.56, 'Charlie Reade\r\nlooks like a regular high school kid, great at baseball and football, a decent\r\nstudent. But he carries a heavy load. His mom was killed in a hit-and-run accident\r\nwhen he was ten, and grief drove his dad to drink. Charlie learned how to take care\r\nof himself—and his dad. When Charlie is seventeen, he meets a dog named Radar and\r\nher aging master, Howard Bowditch, a recluse in a big house at the top of a big\r\nhill, with a locked shed in the backyard. Sometimes strange sounds emerge from it.\r\nr\n\r\nCharlie starts doing jobs for Mr. Bowditch and loses his heart to Radar.\r\nThen, when Bowditch dies, he leaves Charlie a cassette tape telling a story no one\r\nwould believe. What Bowditch knows, and has kept secret all his long life, is that\r\ninside the shed is a portal to another world.\r\n\r\nKing’s storytelling in Fairy\r\nTale soars. This is a magnificent and terrifying tale in which good is pitted\r\nagainst overwhelming evil, and a heroic boy—and his dog—must lead the battle.\r\n\r\nr\nEarly in the Pandemic, King asked himself: “What could you write that would make\r\nyou happy?”\r\n\r\n“As if my imagination had been waiting for the question to be\r\nasked, I saw a vast deserted city—deserted but alive. I saw the empty streets, the\r\nhaunted buildings, a gargoyle head lying overturned in the street. I saw smashed\r\nstatues (of what I didn’t know, but I eventually found out). I saw a huge,\r\nsprawling palace with glass towers so high their tips pierced the clouds. Those\r\nimages released the story I wanted to tell.” \r\n'),
(12, 'Spare', 'Biographies', 4, 4, 4, 593593804, 23.12, 'It was one of the most\r\nsearing images of the twentieth century: two young boys, two princes, walking\r\nbehind their mother’s coffin as the world watched in sorrow—and horror. As Diana,\r\nPrincess of Wales, was laid to rest, billions wondered what the princes must be\r\nthinking and feeling—and how their lives would play out from that point on.'),
(14, 'Test Book', 'Test Genre', 4, 4, 4, 1234567980, 24.99, 'This is a test\r\ndescription'),
(15, 'Test Book', 'Test Genre', 7, 8, 0, 584758596, 5.54, 'This is a test book to\r\nshow the out of stock availability.');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `loan_dt` date NOT NULL,
  `due_dt` date NOT NULL,
  `cost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `user_id`, `book_id`, `loan_dt`, `due_dt`, `cost`) VALUES
(1, 'phpuser', 2, '2022-12-11', '2022-12-11', '14.12'),
(2, 'phpuser', 3, '2022-12-11', '2022-12-11', '11.42'),
(3, 'phpuser', 2, '2022-12-11', '2022-12-25', '14.12'),
(4, 'phpuser', 3, '2022-12-11', '2022-12-25', '11.42'),
(5, 'swilson', 2, '2022-12-11', '2022-12-25', '14.12'),
(6, 'swilson', 3, '2022-12-11', '2022-12-25', '11.42'),
(7, 'swilson', 2, '2022-12-11', '2022-12-25', '14.12'),
(8, 'testuser2', 3, '2022-12-11', '2022-12-25', '11.42'),
(9, 'testuser2', 14, '2022-12-11', '2022-12-25', '24.99');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locaiton_id` int(11) NOT NULL,
  `street_num` int(11) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissions_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `title`) VALUES
(1, 'user'),
(2, 'employee'),
(3, 'manager'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `address`, `phone`) VALUES
(4, 'Random House', 'N/A', 'N/A'),
(5, 'Doubleday', 'N/A', 'N/A'),
(6, 'Grand Central Publishing', 'N/A', 'N/A'),
(7, 'Red Panda Press', 'N/A', 'N/A'),
(8, 'Scribner', 'N/A', 'N/A'),
(9, 'Test Publisher', '123 Main St', '5555555555');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `street_num` int(11) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `permissions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login_id`, `first_name`, `last_name`, `passwd`, `street_num`, `street_name`, `city`, `state`, `zip`, `permissions_id`) VALUES
(1, 'swilson', 'sean', 'wilson', 'password', 1234, 'fake street', 'fake', 'NY', 40417, 4),
(3, 'supermario123', 'super', 'mario', '', 123, 'test st', 'test', 'IN', 46874, 4),
(4, 'jaredbrown123', 'jared', 'brown', 'password123', 123, 'test st', 'Indianapolis', 'IN', 46202, 4),
(5, 'PennyJenny', 'Pennelope', 'Styles', 'LolliRolli', 64123, 'Drowney', 'Bricksburg', 'MN', 39182, 1),
(6, 'swilson123', 'Sean', 'Wilson', '', 123, 'Test Street', 'Test', 'IN', 46241, 4),
(8, 'testuser', 'test', 'user', '', 123, 'street name', 'city', 'IN', 46226, 1),
(9, 'testuser3', 'user', 'user', 'password', 123, 'Test Street', 'TEst', 'CT', 48245, 1),
(10, 'testuser2', 'Test', 'User', 'password', 123, 'Test Street', 'TEst', 'CT', 48245, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locaiton_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locaiton_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
