-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 07:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `origin` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `origin`, `description`, `image`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'McLaren', 'England', 'McLaren Racing Limited is a British motor racing team based at the McLaren Technology Centre, Woking, Surrey, England', '20200620121822.png', '1963-09-02', '2020-06-20 12:18:22', '2020-06-20 05:18:22'),
(2, 'Ferrari', 'Italy', 'Ferrari is an Italian-Dutch luxury sports car manufacturer based in Maranello. Founded by Enzo Ferrari in 1939 out of Alfa Romeo\'s race division as Auto Avio Costruzioni, the company built its first car in 1940.', '20200620121915.png', '1940-01-01', '2020-06-20 12:19:15', '2020-06-20 05:19:15'),
(5, 'Porsche', 'Germany', 'Dr.-Ing. h.c. F. Porsche AG, usually shortened to Porsche AG , is a German automobile manufacturer specializing in high-performance sports cars, SUVs and sedans. The headquarters of Porsche AG is in Stuttgart, and is owned by Volkswagen AG, a controlling stake of which is owned by Porsche Automobil Holding SE. Porsche\'s current lineup includes the 718 Boxster/Cayman, 911, Panamera, Macan, Cayenne and Taycan.', '20200620124111.png', '2020-01-01', '2020-06-20 05:41:11', '2020-06-20 05:41:11'),
(6, 'Rolls Royce', 'England', 'Rolls-Royce Motor Cars Limited is a British luxury automobile maker. A wholly owned subsidiary of German group BMW, it was established in 1998 after BMW was licensed the rights to the Rolls-Royce brand name and logo from Rolls-Royce plc and acquired the rights to the Spirit of Ecstasy and Rolls-Royce grill shape trademarks from Volkswagen AG. Rolls-Royce Motor Cars Limited operates from purpose-built administrative and production facilities opened in 2003 across from the historic Goodwood Circuit in Goodwood, West Sussex, England, United Kingdom. Rolls-Royce Motors Cars Limited is the exclusive manufacturer of Rolls-Royce branded motor cars since 2003.', '20200620125733.png', '1998-01-03', '2020-06-20 05:57:33', '2020-06-20 05:57:33'),
(7, 'Koenigsegg', 'Sweeden', 'The company was founded in 1994 in Sweden by Christian von Koenigsegg, with the intention of producing a \"world-class\" sports car. Many years of development and testing led to the CC8S, the company\'s first street-legal production car which was introduced in 2002.  In 2006, Koenigsegg began production of the CCX, which uses an engine created in-house especially for the car. The goal was to develop a car homologated for use worldwide, particularly the United States whose strict regulations didn\'t allow the import of earlier Koenigsegg models.', '20200620125925.png', '1994-01-01', '2020-06-20 05:59:25', '2020-06-20 05:59:25'),
(8, 'Lamborghini', 'Italy', 'Automobili Lamborghini S.p.A. is an Italian brand and manufacturer of luxury sports cars and SUVs based in Sant\'Agata Bolognese. The company is owned by the Volkswagen Group through its subsidiary Audi.\r\n\r\nFerruccio Lamborghini, an Italian manufacturing magnate, founded Automobili Ferruccio Lamborghini S.p.A. in 1963 to compete with established marques, including Ferrari. The company was noted for using a rear mid-engine, rear-wheel drive. Lamborghini grew rapidly during its first decade, but sales plunged in the wake of the 1973 worldwide financial downturn and the oil crisis. The firm\'s ownership changed three times after 1973, including a bankruptcy in 1978. American Chrysler Corporation took control of Lamborghini in 1987 and sold it to Malaysian investment group Mycom Setdco and Indonesian group V\'Power Corporation in 1994. In 1998, Mycom Setdco and V\'Power sold Lamborghini to the Volkswagen Group where it was placed under the control of the group\'s Audi division.', '20200620130043.png', '1963-01-01', '2020-06-20 06:00:43', '2020-06-20 06:00:43'),
(9, 'Bugatti', 'French', 'Automobiles Ettore Bugatti was a French car manufacturer of high-performance automobiles, founded in 1909 in the then-German city of Molsheim, Alsace by the Italian-born industrial designer Ettore Bugatti. The cars were known for their design beauty and for their many race victories.', '20200621003846.png', '1963-01-01', '2020-06-21 00:40:02', '2020-06-20 17:40:02'),
(10, 'Mercedes-Benz', 'Germany', 'Mercedes-Benz is a German global automobile marque and a division of Daimler AG. Mercedes-Benz is known for luxury vehicles, vans, trucks, buses, coaches and ambulances. The headquarters is in Stuttgart, Baden-Württemberg. The name first appeared in 1926 under Daimler-Benz.', '20200624025831.png', '1926-01-01', '2020-06-23 19:58:31', '2020-06-23 19:58:31'),
(11, 'Toyota', 'Japan', 'Toyota is a car from japan', '20200704024710.png', '1980-01-01', '2020-07-04 02:47:10', '2020-07-03 19:47:10'),
(12, 'Subaru', 'Japan', 'Subaru is the automobile manufacturing division of Japanese transportation conglomerate Subaru Corporation, the twenty-second largest automaker by production worldwide in 2012. Subaru cars are known for their use of a boxer engine layout in most vehicles above 1500 cc', '20200704173310.png', '1953-05-15', '2020-07-04 10:33:10', '2020-07-04 10:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `top_speed` int(11) DEFAULT NULL,
  `horse_power` int(11) DEFAULT NULL,
  `torque` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `id_brand`, `description`, `top_speed`, `horse_power`, `torque`, `image`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'McLAREN P1™', 1, 'The McLaren F1 redefined the very concept of the supercar when it was launched in 1993.\r\nIts spiritual successor, the P1™, would do the same 20 years later.', 350, 916, 900, '20200620121928.jpg', '2013-01-10', '2020-06-27 03:32:09', '2020-06-20 05:19:28'),
(2, 'Ferrari 458 Italia', 2, 'The Ferrari 458 Italia has garnered over 30 international awards in its career. It added two further plaudits to that collection at the International Engine of the Year Awards when its V8 was voted “Best Performance Engine” and “Best Engine Above 4 Litres”. The success being enjoyed by the 458 Italia with both critics and public alike crosses all borders', 202, 562, 398, '20200620121954.jpg', '2009-01-01', '2020-06-20 12:19:54', '2020-06-20 05:19:54'),
(5, 'McLaren Senna', 1, 'The McLAREN Senna is the personification of McLAREN’s DNA at its most extreme, creating the purest connection between car and driver.\r\n\r\nIt is the most track-focused road car we have ever built, and it will set the fastest lap times of any McLaren to date. That is what has driven us to build a track car that is unashamedly without compromise. One that is legalised for road use, but not sanitised to suit it. Nothing else matters but to deliver the most intense driving experience around a circuit.\r\n\r\nInspired by one of McLaren’s greatest racing drivers, the McLaren Senna is utterly dedicated to allowing the driver to be the best they can possibly be.', 335, 800, 800, '20200620122246.jpg', '2018-01-01', '2020-06-20 12:23:36', '2020-06-20 05:23:36'),
(6, 'Enzo Ferrari', 2, 'Over the years Ferrari has introduced a series of supercars which have represented the very pinnacle of the company’s technological achievements transferred to its road cars. These include the GTO, F40 and F50. This family of extreme performance cars was joined in 2002 by the Enzo Ferrari, which was the expression of the latest Formula 1 technology and know-how.', 330, 651, 657, '20200620123552.jpg', '2004-01-01', '2020-06-20 05:35:52', '2020-06-20 05:35:52'),
(7, 'McLaren 720s Spider', 1, 'The 720S Spider is a perfect example of this. It’s a car that delivers the best of both worlds… a convertible supercar that’s every bit as thrilling as the Coupe. That means the same nerve-tingling rush, now available with the roof down.\r\n\r\nThis is a car for those who see more… who look beyond convention and seek out the extraordinary. The 720S Spider is a full-throttle supercar with a retractable roof – all in one beautifully honed package.\r\n\r\nKombinierter Verbrauch: 12.2 l/100km (23.2 mpg) | CO2-Emissionen Kombiniert: 276g/km*', 341, 720, 770, '20200620123803.jpg', '2017-07-03', '2020-06-20 05:38:03', '2020-06-20 05:38:03'),
(8, '911 GT3 RS', 5, 'For the new 911 GT3 RS, the specs read as follows: naturally aspirated engine, 4.0-litre displacement, high-revving concept. A maximum power output of 383 kW (520 hp) – 20 hp higher than that of the predecessor model. Maximum torque 470 Nm, i.e. 10 Nm more than before.', 312, 520, 346, '20200620124332.jpg', '2019-01-01', '2020-06-20 12:49:24', '2020-06-20 05:49:24'),
(9, 'Rolls Royce Ghost', 6, 'The Rolls-Royce Ghost is a luxury car manufactured by Rolls-Royce Motor Cars. The \"Ghost\" nameplate, named in honour of the Silver Ghost, a car first produced in 1906, was announced in April 2009 at the Auto Shanghai show. During development, the Ghost was known as the \"RR04\". Designed as a smaller, \"more measured, more realistic car\" than the Phantom, aiming for a lower price category for Rolls-Royce models, the retail price is around £170,000. The production model was officially unveiled at the 2009 Frankfurt Motor Show. The Ghost Extended Wheelbase was introduced in 2011.', 155, 563, 575, '20200621051118.jpeg', '2009-01-01', '2020-06-21 05:11:18', '2020-06-20 22:11:18'),
(10, 'Koenigsegg Gemera', 7, 'Ultimate performance has belonged to the world of two-seaters with very limited luggage space – until now. The Gemera is the world’s first Mega-GT and Koenigsegg’s first four-seater. Extreme megacar meets spacious interior and ultimate environmental consciousness.', 400, 1677, 600, '20200620130934.jpg', '2020-01-01', '2020-06-20 06:09:34', '2020-06-20 06:09:34'),
(11, 'Aventador SVJ Roadster', 8, 'Limited to a mere 800 examples, the SVJ Roadster is the most iconic form of the Aventador family. \r\n\r\nIts Lamborghini aerodynamics represent the most futuristic ever designed: the ALA 2.0 system and aero-vectoring ensure the minimum drag on straightaways and the optimal aerodynamic load when cornering. The 770 hp naturally aspirated V12 engine inspires awe.', 350, 770, 720, '20200620131237.jpg', '2020-01-01', '2020-06-20 06:12:37', '2020-06-20 06:12:37'),
(12, 'McLaren F1', 1, 'The McLaren F1 is a sports car designed and manufactured by British automobile manufacturer McLaren Cars, and powered by the BMW S70/2 V12 engine. Originally a concept conceived by Gordon Murray, he convinced Ron Dennis to back the project and engaged Peter Stevens to design the exterior and interior of the car. On 31 March 1998, the XP5 prototype with a modified rev limiter set the Guinness World Record for the world\'s fastest production car, reaching 240.1 mph (386.4 km/h),[2] surpassing the modified Jaguar XJ220\'s 217.1 mph (349 km/h) record from 1992.', 240, 618, 479, '20200621051157.jpg', '1963-09-02', '2020-06-27 03:32:09', '2020-06-21 00:00:25'),
(13, 'Ferrari LaFerrari', 2, 'LaFerrari, project name F150 and unofficially referred to as the Ferrari LaFerrari, is a limited production hybrid sports car built by Italian automotive manufacturer Ferrari. LaFerrari means \"The Ferrari\" in Italian and some other Romance languages, in the sense that it is the \"definitive\" Ferrari.\r\n\r\nThe sports car is the last Ferrari model with a mid-mounted 12-cylinder engine.', 372, 950, 970, '20200620131738.jpg', '2013-06-01', '2020-06-20 06:17:38', '2020-06-20 06:17:38'),
(14, 'Chiron', 9, 'The Bugatti Chiron is a mid-engine two-seater sports car developed and manufactured in Molsheim, France by French automobile manufacturer Bugatti Automobiles S.A.S.. The successor to the Bugatti Veyron, the Chiron was first shown at the Geneva Motor Show on 1 March 2016.', 420, 1500, 1180, '20200621004146.jpg', '2016-03-01', '2020-06-21 00:41:59', '2020-06-20 17:41:59'),
(15, 'Mercedes Benz AMG sl63', 10, 'With the Mercedes-AMG SL 63, AMG underscores once more its determination to make the most of everything – every moment, every meter. Let yourself be inspired by the confident power development, the exceptional driving dynamics, and the beauty and elegance of a pure-bred sports car, which already makes clear what it is created for: driving performance.', 300, 585, 900, '20200624030502.jpg', '2013-01-01', '2020-06-23 20:05:02', '2020-06-23 20:05:02'),
(16, 'Toyota Supra', 11, 'The Toyota Supra is a sports car and grand tourer manufactured by Toyota Motor Corporation beginning in 1978. The initial four generations of the Supra were produced from 1978 to 2002. The fifth generation has been produced since March 2019 and went on sale in May 2019.', 200, 500, 450, '20200704024923.jpg', '1978-01-01', '2020-07-03 19:49:23', '2020-07-03 19:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_car`, `id_user`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Best Car EVER!', '2020-06-20 02:07:21', '2020-06-20 09:08:29'),
(9, 10, 1, 'CANT WAIT FOR IT!', '2020-06-21 07:00:35', '2020-06-21 14:00:35'),
(13, 10, 2, 'test', '2020-06-22 04:16:05', '2020-06-22 11:16:05'),
(14, 10, 4, 'it should be good!', '2020-06-22 04:52:25', '2020-06-22 11:52:31'),
(15, 11, 22, 'Cool car!', '2020-07-04 10:39:02', '2020-07-04 17:39:02'),
(16, 8, 22, 'Fast Car!', '2020-07-04 10:39:14', '2020-07-04 17:39:14'),
(17, 14, 20, 'Fastest car ever!', '2020-07-04 10:39:39', '2020-07-04 17:39:39'),
(18, 6, 20, 'LEGEND!', '2020-07-04 10:40:03', '2020-07-04 17:40:03'),
(19, 15, 18, 'Amazing CAR!', '2020-07-04 10:41:02', '2020-07-04 17:41:02'),
(20, 2, 18, 'Nice CAR!', '2020-07-04 10:41:25', '2020-07-04 17:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL COMMENT '0=admin, 1=visitor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `birth_date`, `photo`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', '$2y$10$IfgF7WcDC6k/HyaJOznIEejZAaSu0SiCjI1DIaeWiF0luZG0BT/FS', 'admin@car_review.com', 'Admin', '0000-00-00', NULL, '2020-06-20 02:53:54', NULL, 0),
(2, 'Eztyfoe', '$2y$10$IfgF7WcDC6k/HyaJOznIEejZAaSu0SiCjI1DIaeWiF0luZG0BT/FS', 'ibrahim170297@gmail.com', 'Ibrahim Musa Adi', '2020-01-01', NULL, '2020-06-19 21:20:32', '2020-06-19 21:20:32', 1),
(4, 'Ibrahim', '$2y$10$4dJuSLctBcTXIW72BA2Itud52SjpVULI2oJGokidz9fD9pLn5T2cK', 'ibrahim.170297@gmail.com', 'Ibrahim', '2020-01-01', NULL, '2020-06-22 04:31:34', '2020-06-22 04:31:34', 1),
(5, 'musa', '$2y$10$r2rh4yR3b4nuLdcE2.1OKewYwfF7nEiEClDQn01Px22QytfQJ.p1K', 'musa@gmail.com', 'Musa', '2020-01-01', 'C:\\xampp\\tmp\\php4ABA.tmp', '2020-06-23 19:55:04', '2020-06-23 19:55:04', 1),
(17, 'adi', '$2y$10$VTBXX1nFebidGKbSJlaBuugXxn9AmjszEi6/s3c0qNElE4YQN7mtS', 'adi@gmail.com', 'Adi', '1997-01-01', NULL, '2020-06-24 06:52:17', '2020-06-24 06:52:17', 1),
(18, 'adi123', '$2y$10$feV0i/IZosh7kAtWRDTVteK3AZ9rGXL16uQgMqAiStILAKnBG/ajW', 'adi123@gmail.com', 'Adi', '1997-01-01', NULL, '2020-07-03 19:51:25', '2020-07-03 19:51:25', 1),
(19, 'bibbo', '$2y$10$AZJQPKMJ6w/0JtRiVzYL3esHfM1k30DWNw56s.K4uIBL7F5njwpiW', 'bibbo170297@gmail.com', 'Bibbo', '1998-01-01', NULL, '2020-07-04 10:35:00', '2020-07-04 10:35:00', 1),
(20, 'bibbo17_', '$2y$10$VSPLGHOftgAeoeCva8yh8ucpAJMADe1QK4CnT3WZnNX6IpktJ2g6.', 'bibbo17@gmail.com', 'Bibbo', '1990-01-01', NULL, '2020-07-04 10:36:22', '2020-07-04 10:36:22', 1),
(21, 'musa_adi', '$2y$10$ZINnOxpLVf9OR7wOFFgZiOEq/EcKSEB6ZJ4JJppuYf0lkSv1zTjGm', 'musa_adi@gmail.com', 'Musa Adi', '1997-01-01', NULL, '2020-07-04 10:37:04', '2020-07-04 10:37:04', 1),
(22, 'ibrahim_musa', '$2y$10$LMnWRkti.voPysGs3ZE84.cKbyBuJqpbSmLXqX2jAx8BHsjWj5fHy', 'ibrahim_musa@gmail.com', 'Ibrahim Musa', '1997-01-01', NULL, '2020-07-04 10:37:34', '2020-07-04 10:37:34', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand_foreign` (`id_brand`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_car_foreign` (`id_car`),
  ADD KEY `id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `id_car_foreign` FOREIGN KEY (`id_car`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
