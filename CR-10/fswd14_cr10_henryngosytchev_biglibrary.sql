-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 06:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd14_cr10_henryngosytchev_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr10_henryngosytchev_biglibrary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fswd14_cr10_HenryNgoSytchev_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `type` enum('Book','CD','DVD') DEFAULT NULL,
  `author_first_name` varchar(20) DEFAULT NULL,
  `author_last_name` varchar(30) DEFAULT NULL,
  `publisher_name` varchar(50) DEFAULT NULL,
  `publisher_address` varchar(100) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `status` enum('available','reserved') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `title`, `picture`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `ISBN`, `status`) VALUES
(1, 'Everything Is F*cked: A Book About Hope\r\n', 'book_about_hope.jpg', '\"Ever wonder why greater connectivity seems to make everyone just hate each other more? Ever wonder why the news always seems so depressing? Ever wonder why people are seemingly becoming more anxious and miserable despite life getting easier?\r\n\r\nWell, buckle up bitches, Uncle Mark is taking you for another ride. Just like The Subtle Art of Not Giving a F*ck questioned our conventional wisdom on what makes us happy, Everything is F*cked: A Book About Hope questions our assumptions on what makes life worth living.\r\n\r\nSo what are you waiting for, order the damn thing below!\"\r\n', 'Book', 'Mark', 'Manson', 'Harper Collins', 'New York, USA\r\n', '2011-05-14', '10-0062888439', 'reserved'),
(2, 'The Subtle Art of Not Giving a F*ck: A Counterintuitive Approach to Living a Good Life\r\n', 'subtle_art.jpg', 'Finding something important and meaningful in your life is the most productive use of your time and energy. This is true because every life has problems associated with it and finding meaning in your life will help you sustain the effort needed to overcome the particular problems you face. Thus, we can say that the key to living a good life is not giving a fuck about more things, but rather, giving a fuck only about the things that align with your personal values.\r\n', 'Book', 'Mark', 'Manson', 'Harper Collins', 'New York, USA', '2016-09-13', '10-0062457713\n', 'available'),
(3, 'The World of Yesterday\r\n', 'world_of_yesterday.jpg', 'Written as both a recollection of the past and a warning for future generations, The World of Yesterday recalls the golden age of literary Vienna—its seeming permanence, its promise, and its devastating fall.\n\nSurrounded by the leading literary lights of the epoch, Stefan Zweig draws a vivid and intimate account of his life and travels through Vienna, Paris, Berlin, and London, touching on the very heart of European culture. His passionate, evocative prose paints a stunning portrait of an era that danced brilliantly on the edge of extinction.\n\nThis new translation by award-winning Anthea Bell captures the spirit of Zweig’s writing in arguably his most revealing work.\n', 'Book', 'Stefan ', 'Zweig', '\"University of Nebraska Press \"', 'Lincoln, USA\r\n', '2009-05-14', '10-0803226616\n', 'available'),
(4, 'Congo: The Epic History of a People\r\n', 'congo.jpg', 'From the beginnings of the slave trade through colonization, the struggle for independence, Mobutu\'s brutal three decades of rule, and the civil war that has raged from 1996 to the present day, Congo: The Epic History of a People traces the history of one of the most devastated nations in the world. Esteemed scholar David Van Reybrouck balances hundreds of interviews with a diverse range of Congolese with meticulous historical research to construct a multidimensional portrait of a nation and its people.\r\n', 'Book', 'David', 'Van Reybrouck', 'Ecco', 'Manhattan, USA\r\n', '2014-03-25', '10-0062200119\n', 'available'),
(5, 'Psychology of Crowds\r\n', 'psychology_of_crowds.jpg', 'Epic in scope yet eminently readable, both penetrating and deeply moving, Congo—a finalist for the Cundill Prize—takes a deeply humane approach to political history, focusing squarely on the Congolese perspective, and returns a nation\'s history to its people.\r\n', 'Book', 'Gustave', 'LeBon', 'Sparkling Books', 'Hampshire, UK\r\n', '2009-10-05', '10-1907230084\n\n', 'reserved'),
(6, 'Sapiens: A Brief History of Humankind\r\n', 'sapiens.jpg', 'One hundred thousand years ago, at least six different species of humans inhabited Earth. Yet today there is only one—homo sapiens. What happened to the others? And what may happen to us? Sapiens integrates history and science to reconsider accepted narratives, connect past developments with contemporary concerns, and examine specific events within the context of larger ideas.\r\n', 'Book', 'Yuval Noah', 'Harari', 'Harper', 'New York, USA\r\n', '2015-02-10', '10-9780061097\n', 'available'),
(7, 'THA BLUE CARPET TREATMENT\r\n', 'snoop.jpg', 'Blue Side of the American Story in the Streets Rapped by Snoop Dogg', 'CD', 'Calvin', 'Cordozar Broadus Jr.', 'Geffen Records', 'Santa Monica, USA\r\n', '2006-01-01', '1293808929', 'available'),
(8, 'Eminem Show', 'eminem.jpg', '\"Curtains Up\r\nWhite America\r\nBusiness\r\nCleanin Out My Closet\r\nSquare Dance\r\nThe Kiss\r\nSoldier\r\nSay Goodbye Hollywood\r\nDrips\r\nWithout Me\r\nPaul Rosenberg\r\nSing for the Moment\r\nSuperman\r\nHailie\'s Song\r\nSteve Berman\r\nWhen the Music Stops\r\nSay What You Say\r\n\'Till I Collapse\r\nMy Dad\'s Gone Crazy\r\nCurtains Close\"\r\n', 'CD', 'Marshal Bruce', 'Mathers III', ' Aftermath Entertainment', 'Santa Monica, USA\r\n', '2002-05-26', '1238098490', 'available'),
(9, 'Thriller 25th Anniversary\r\n', 'jackson.jpg', '\"01. Wanna Be Startin\' Somethin\'\r\n02. Baby Be Mine\r\n03. The Girl Is Mine Feat. Paul McCartney\r\n04. Thriller\r\n05. Beat It\r\n06. Billie Jean\r\n07. Human Nature\r\n08. P.Y.T. (Pretty Young Thing)\r\n09. The Lady In My Life\r\n10. Vincent Price Except From \"\"Thriller\"\" Voice-Over Session\r\n\r\nPreviously Unreleased Tracks For 25th Anniversary Edition\r\n\r\n11. The Girl Is Mine 2008 Feat. Will.I.Am\r\n12. P.Y.T. (Pretty Young Thing) 2008 Feat. Will.I.Am\r\n13. Wanna Be Startin\' Somethin\' 2008 Feat. Akon\r\n14. Beat It 2008 Feat. Fergie\r\n15. Billie Jean 2008 Kanye West Mix\r\n16. For All Time (Unreleased Track From Original Thriller Sessions)\"\r\n', 'CD', 'Michael', 'Jackson', 'Sony BMG Music Entertainment', 'New York, USA\r\n', '2009-04-29', '1209809839', 'reserved'),
(10, 'At the Speed of Life\r\n', 'xzibit.jpg', 'Best of Tracks from XZibit', 'CD', 'Alvin Nathaniel', 'Joiner', 'Geffen Records', 'New York, USA\r\n', '1996-10-15', '1209839333', 'available'),
(11, 'Better Dayz\r\n', 'tupac.jpg', 'Ultimate Releases of Posmortum 2Pac Creations', 'CD', 'Tupac Amaru', 'Shakur', 'Death Row Records', 'Beverly Hills, USA\r\n', '2002-11-26', '1236363638', 'reserved'),
(15, 'Schindlers Liste\r\n', 'schindlers_list.jpg', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.\r\n', 'DVD', 'Steven', 'Spielberg', 'Universal Pictures', 'Universal City, USA\r\n', '1992-01-01', '10-0062181439', 'reserved'),
(16, 'Ip Man\r\n', 'ipman.jpg', 'During the Japanese invasion of China, a wealthy martial artist is forced to leave his home when his city is occupied. With little means of providing for themselves, Ip Man and the remaining members of the city must find a way to survive.\r\n', 'DVD', 'Wilson', 'Yip', 'Well Go USA Intertainment', 'Plano, USA\r\n', '2008-07-25', '10-9098789722', 'available'),
(17, 'The Last Dance\r\n', 'the_last_dance.jpg', 'Charting the rise of the 1990\'s Chicago Bulls, led by Michael Jordan, one of the most notable dynasties in sports history.\r\n', 'DVD', 'Michael', 'Jordan', 'ESPN Films', 'Bristol, USA\r\n', '2020-06-15', '10-098989894', 'reserved'),
(18, 'Ratatouille\r\n', 'ratatouille.jpg', 'When a rat named Remy gets washed away from his family, he ends up in Paris and goes into Gusteau\'s restaurant and meets a garbage boy named Linguini. A bunch of other chefs give him credit and give him a cooking job after thinking he made a soup delicious. Then Linguini takes Remy to the restaurant the next day. And Remy ends up controlling Linguini by pulling his hair. Can Remy be a great chef? and can Gusteau\'s be the greatest restaurant in Paris?\r\n', 'DVD', 'Jan', 'Pinkava', 'Warner Brothers Entertainment Inc.', 'Burbank, USA\r\n', '2007-05-24', '10-4441422212', 'available'),
(19, 'The Green Mile\r\n', 'green_mile.jpg', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.\r\n', 'DVD', 'Frank', 'Darabont', 'Warner Brothers Entertainment Inc.', 'Burbank, USA\r\n', '1999-12-24', '10-0000657489', 'available'),
(25, 'szcsc', 'media.png', 'cSczcsz', 'CD', 'Henry', 'Ngo-Sytchev', '', 'Dresdnerstrasse 49/5, Top 16', '0000-00-00', 'zcszc', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
