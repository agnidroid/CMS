-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 09:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `user_name`) VALUES
(1, 'sangam2522000@gmail.com', 'aaaa1111#', 'abcd1234#'),
(2, 'sangam25220000@gmail.com', 'aaaa11111#', 'aaaa1111#'),
(3, 'z@gmail.com', 'zzzzzzzzz', 'Raj#'),
(4, 'aaa@gmail.com', 'Agni5403#', 'Raj##'),
(5, 'aa11@gmail.com', '11111111111', 'agni5403#'),
(6, 'agni@gmail.com', 'aaaaaaaaaa', 'agni5403##');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `post_id` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `email`, `comment_text`, `date`) VALUES
(11, 0, 'a@gmail.com', 'this is comment section', '2022-03-06'),
(23, 0, 'aa@gmail.com', 'hello world', '2022-03-06'),
(26, 4, 'agni7601083@gmail.com', 'ffff', '2022-03-07'),
(32, 10, 'aaa@gmail.com', 'hiiii', '2022-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `post_img` varchar(50) NOT NULL,
  `view` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `post_img`, `view`) VALUES
(2, 'learning css', '<p><strong><span style=\"font-size:12px\">hello world fghjfghkgfegf djhfhjfjhschd</span></strong></p>\r\n', 'md.png', 15),
(4, 'About College', '<p><strong>Content</strong> is <a href=\"https://en.wikipedia.org/wiki/Information\" title=\"Information\">information</a> produced and directed at an <a class=\"mw-redirect\" href=\"https://en.wikipedia.org/wiki/End-user\" title=\"End-user\">end-user</a> or <a href=\"https://en.wikipedia.org/wiki/Audience_analysis\" title=\"Audience analysis\">audience</a> in the sectors of publishing, art, and communication. Content is delivered via different <a href=\"https://en.wikipedia.org/wiki/Media_(communication)\" title=\"Media (communication)\">media</a>, including the <a href=\"https://en.wikipedia.org/wiki/Web_content\" title=\"Web content\">Internet</a>, cinema, television, radio, audio CDs, books and magazines, physical art, and during live events. Live events include speeches, conferences, and stage performances. Content within media focuses on the attention and how receptive the audience is to the content. Circulation brings the content to everyone and helps spread it to reach large audiences. It is a proce', 'Screenshot (6).png', 10),
(6, 'Our college', '<p><strong>Content</strong> is <a href=\"https://en.wikipedia.org/wiki/Information\" title=\"Information\">information</a> produced and directed at an <a class=\"mw-redirect\" href=\"https://en.wikipedia.org/wiki/End-user\" title=\"End-user\">end-user</a> or <a href=\"https://en.wikipedia.org/wiki/Audience_analysis\" title=\"Audience analysis\">audience</a> in the sectors of publishing, art, and communication. Content is delivered via different <a href=\"https://en.wikipedia.org/wiki/Media_(communication)\" title=\"Media (communication)\">media</a>, including the <a href=\"https://en.wikipedia.org/wiki/Web_content\" title=\"Web content\">Internet</a>, cinema, television, radio, audio CDs, books and magazines, physical art, and during live events. Live events include speeches, conferences, and stage performances. Content within media focuses on the attention and how receptive the audience is to the content. Circulation brings the content to everyone and helps spread it to reach large audiences. It is a proce', 'Screenshot (18).png', 0),
(10, ' About My Aurangabad', '<p><strong>Content</strong> is <a href=\"https://en.wikipedia.org/wiki/Information\" title=\"Information\">information</a> produced and directed at an <a class=\"mw-redirect\" href=\"https://en.wikipedia.org/wiki/End-user\" title=\"End-user\">end-user</a> or <a href=\"https://en.wikipedia.org/wiki/Audience_analysis\" title=\"Audience analysis\">audience</a> in the sectors of publishing, art, and communication. Content is delivered via different <a href=\"https://en.wikipedia.org/wiki/Media_(communication)\" title=\"Media (communication)\">media</a>, including the <a href=\"https://en.wikipedia.org/wiki/Web_content\" title=\"Web content\">Internet</a>, cinema, television, radio, audio CDs, books and magazines, physical art, and during live events. Live events include speeches, conferences, and stage performances. Content within media focuses on the attention and how receptive the audience is to the content. Circulation brings the content to everyone and helps spread it to reach large audiences. It is a proce', 'Screenshot (33).png', 20),
(14, ' About Jharkhand ', '<p>Jharkhand is a state in eastern India. It&#39;s known for its waterfalls, the elegant Jain temples of Parasnath Hill and the elephants and tigers of Betla National Park. The state capital of Ranchi is a gateway to the park. It features the 17th-century Jagannath Temple, a Hindu shrine and the Jharkhand War Memorial. Tagore Hill is a monument honoring Nobel Prize-winning author Rabindranath Tagore. ―&nbsp;Google</p>\r\n', 'facts-about-jharkhand-840x560.jpg', 1),
(15, 'Lion', '<p>The lion is a large cat of the genus Panthera native to Africa and India. It has a muscular, deep-chested body, short, rounded head, round ears, and a hairy tuft at the end of its tail. It is sexually dimorphic; adult male lions are larger than females and have a prominent mane</p>\r\n', 'lion.jpg', 0),
(16, 'about tiger', '<p>The tiger is the largest living cat species and a member of the genus Panthera. It is most recognisable for its dark vertical stripes on orange fur with a white underside. An apex predator, it primarily preys on ungulates such as deer and wild boar.</p>\r\n', 'tiger.jpg', 0),
(17, 'panda', '<p>The giant panda, also known as the panda bear, is a bear species endemic to China. It is characterised by its bold black-and-white coat and rotund body. The name &quot;giant panda&quot; is sometimes used to distinguish it from the red panda, a neighboring musteloid.</p>\r\n', 'panda.jpg', 2),
(18, 'Dog', '<p>The giant panda, also known as the panda bear, is a bear species endemic to China. It is characterised by its bold black-and-white coat and rotund body. The name &quot;giant panda&quot; is sometimes used to distinguish it from the red panda, a neighboring musteloid.</p>\r\n', 'dog.jpg', 1),
(19, 'Elephant', '<p>The giant panda, also known as the panda bear, is a bear species endemic to China. It is characterised by its bold black-and-white coat and rotund body. The name &quot;giant panda&quot; is sometimes used to distinguish it from the red panda, a neighboring musteloid.</p>\r\n', 'elephant.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
