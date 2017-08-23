-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 03:59 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobclickdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `body` text,
  `date` datetime DEFAULT NULL,
  `imageurl` text,
  `usertype` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `post_id`, `body`, `date`, `imageurl`, `usertype`) VALUES
(132, 'cats', 241, 'Hellooooo', '2016-12-10 10:28:29', 'uploads/01-cat-wants-to-tell-you-laptop.jpg', 'Worker'),
(131, 'cats', 233, 'hello', '2016-12-10 09:20:06', 'uploads/01-cat-wants-to-tell-you-laptop.jpg', 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `body` text,
  `rating` float DEFAULT NULL,
  `imageurl` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `date`, `category`, `body`, `rating`, `imageurl`) VALUES
(123, 'alfonso', 'First post', '2016-12-24 04:13:14', 'Software Developers', 'yoyoyo join me ....', 0, ''),
(124, 'alfonso', 'Second post!!', '2016-12-29 07:18:13', 'Software Developers', 'yoyoyoyoyoyoyoyoyoyoy', 0, ''),
(125, 'alfonso', 'third post', '2016-12-12 00:00:00', 'Nurses', 'fgsefgsegsehse', 0, ''),
(233, 'alfonso', 'Civil War', '2016-12-05 00:00:00', 'Software Developers', 'The American Civil War was a civil war in the United States fought from 1861 to 1865. The Union faced secessionists in eleven Southern states grouped together as the Confederate States of America. The Union won the war, which remains the bloodiest in U.S. history.\r\nAmong the 34 U.S. states in January 1861, seven Southern slave states individually declared their secession from the U.S. and formed the Confederate States of America. War broke out in April 1861 when Confederates attacked the U.S. fortress Fort Sumter. The Confederacy grew to include eleven states; it claimed two more states and several western territories. The Confederacy was never diplomatically recognized by any foreign country. The states that remained loyal including border states where slavery was legal, were known as the Union or the North. The war ended with the surrender of all the Confederate armies and the collapse of Confederate government in spring 1865.\r\nThe war had its origin in the factious issue of slavery, especially the extension of slavery into the western territories. Four years of intense combat left 620,000 to 750,000 soldiers dead, a higher number than the American military deaths of World War I and World War II combined, and destroyed much of the South\'s infrastructure. The Confederacy collapsed and slavery was abolished in the entire country. The Reconstruction Era (1863–1877) overlapped and followed the war, with its fitful process of restoring national unity, strengthening the national government, and granting civil rights to the freed slaves.', 10, ''),
(234, 'alfonso', 'Part Time Web Developers', '2016-12-09 16:49:42', 'Software Developers', 'Looking for Part time Web developers to work on my website.', NULL, 'uploads/baked-italian-meatballs-tsri.jpg'),
(235, 'alfonso', 'Software Engineers Help!!!', '2016-12-09 16:51:10', 'Software Developers', 'Sample post...', NULL, 'uploads/baked-italian-meatballs-tsri.jpg'),
(236, 'alfonso', 'Software Engineers Help!!!', '2016-12-09 16:51:37', 'Software Developers', 'Sample post...', NULL, 'uploads/baked-italian-meatballs-tsri.jpg'),
(237, 'alfonso', 'Electrical Engineer (Full-Time)', '2016-12-09 17:44:47', 'Electrical and Electronics Engineers', 'Electrical engineers are well-paid for their work. The Bureau of Labor Statistics reports the median annual wage for electrical engineers was $91,410 in 2014. Engineers working in oil and gas extraction or wireless telecommunications earn particularly high salaries. The top 10 percent of all electrical engineers can earn more than $143,000 a year and engineers in the bottom 10 percent can expect to earn an average of $60,000 annually.The highest earners are located in California, Alaska, Massachusetts, the District of Columbia and Washington state. The map below shows details of the 10th, 50th, and 90th percentile earners for each state.', NULL, 'uploads/baked-italian-meatballs-tsri.jpg'),
(238, 'tester', 'looking for job', '2016-12-09 19:59:06', 'Heavy Vehicle Service Technicians', 'xcgsgsg', NULL, ''),
(239, 'tester', 'looking for job', '2016-12-09 19:59:14', 'Heavy Vehicle Service Technicians', 'xcgsgsg', NULL, ''),
(240, 'tester', 'adfasdf', '2016-12-09 20:00:08', 'adsfasdf', 'xcgsgsg', NULL, ''),
(241, 'tester', 'adfasdf', '2016-12-09 20:00:55', 'adsfasdf', 'xcgsgsg', NULL, ''),
(242, 'tester', ';;;:::::::::::;;;;;;;;;;;::::::::::::', '2016-12-09 20:08:32', ';;;:::::::::::;;;;;;;;;;;::::::::::::', ';;;:::::::::::;;;;;;;;;;;::::::::::::', NULL, 'uploads/a946aaf68bf697a3bf678dcee0f68495.png'),
(243, 'tester', 'getRequestString', '2016-12-09 20:10:00', 'getRequestString', 'xcgsgsg', NULL, 'uploads/a946aaf68bf697a3bf678dcee0f68495.png'),
(244, 'jules9', 'Junior Developer Needed', '2016-12-10 05:30:24', 'Computer Occupations', 'This is the body of my post', NULL, 'http://localhost/uploads/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `usertype` varchar(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `aboutme` text,
  `skills` text,
  `imageurl` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `email`, `age`, `dob`, `phonenumber`, `firstname`, `lastname`, `aboutme`, `skills`, `imageurl`) VALUES
(82, 'alfonso', 'rayo', 'Recruiter', 'alfonsorayo222@gmail.com', 25, '1991-12-02', '3474638884', 'Alfonso', 'Rayo', 'Computer science major at the College of Staten Island.\r\nI spent most of my time programming video games, websites and other crap. My favorite color is blue and I like food.... W/E', ' C++, C#, Java, Javascript, HTML, CSS, PHP, Python, MYSQL, Object Oriented Programming, Software Engineering, Classical Guitar, and Eating.  ', 'uploads/alfonso.jpg'),
(83, 'user', 'name', 'Worker', 'username@gmail.com', NULL, NULL, '3474638884', 'User', 'Name', NULL, NULL, NULL),
(94, 'sas', 'asas', 'Worker', 'asas@butts', NULL, NULL, '1234567890', '2112', '2112', NULL, NULL, 'uploads/default.png'),
(93, 'cats', 'cats', 'Worker', 'cats@hotmail.com', 0, NULL, '1231231234', 'Cat', 'Johnson', 'Meow', 'Meow tho..  lolo ', 'uploads/01-cat-wants-to-tell-you-laptop.jpg'),
(91, 'spaghettit', 'meatballs', 'Worker', 'food@hotmail.com', NULL, NULL, '1234567890', 'sphagetti', 'Meatballs', NULL, NULL, 'http://localhost/uploads/default.png'),
(92, 'jules9', 'cuchifrito', 'Recruiter', 'julie123@yahoo.com', NULL, NULL, '7181234567', 'julie', 'napoli', NULL, NULL, 'uploads/images.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
