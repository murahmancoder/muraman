-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 11:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muraman`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug_judul` varchar(255) NOT NULL,
  `status` enum('Publish','Draft') NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `meta_title` varchar(150) NOT NULL,
  `meta_keywords` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_user`, `id_kategori`, `judul`, `slug_judul`, `status`, `tanggal_post`, `penulis`, `content`, `gambar`, `meta_title`, `meta_keywords`) VALUES
(21, 1, 16, 'Memulai Belajar dengan Membuat Game Sederhana', 'Memulai-Belajar-dengan-Membuat-Game-Sederhana', 'Publish', '2020-12-20 13:40:10', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'game.png', 'Games', 'Games, Sederhana, Pemula'),
(22, 1, 18, 'Belajar Cara Membuat Website Bagi Pemula', 'Belajar-Cara-Membuat-Website-Bagi-Pemula', 'Publish', '2020-12-20 13:43:50', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', '05-thumbnail.jpg', 'website', 'website, pemula, belajar'),
(23, 1, 18, 'Cara Merawat Smartphone dan Laptop Biar Awet', 'Cara-Merawat-Smartphone-dan-Laptop-Biar-Awet', 'Publish', '2020-12-20 13:45:25', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', '04-thumbnail.jpg', 'Inovasi', 'smartphone,laptop,merawat'),
(24, 1, 18, 'Belajar Desain Vektor', 'Belajar-Desain-Vektor', 'Publish', '2020-12-20 13:46:25', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'submarine.png', 'desain', 'vektor,desain'),
(25, 1, 16, 'Belajar Dasar Pemrograman Website', 'Belajar-Dasar-Pemrograman-Website', 'Publish', '2020-12-20 13:48:19', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'scott-graham-5fNmWej4tAA-unsplash.jpg', 'Website', 'Belajar,Dasar pemrograman'),
(26, 1, 17, 'Ukuran Lapangan Sepak Bola', 'Ukuran-Lapangan-Sepak-Bola', 'Publish', '2020-12-20 13:49:18', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'alex-motoc-7NhFrPxlgM8-unsplash.jpg', 'sport', 'Olahraga'),
(27, 1, 16, 'Mahir 1 tahun Belajar Pemrograman Website', 'Mahir-1-tahun-Belajar-Pemrograman-Website', 'Publish', '2020-12-20 13:50:24', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'markus-winkler-Xr1Lwph6eGI-unsplash.jpg', 'Pemrograman Web', 'Belajar Website'),
(28, 1, 17, 'Daftar Juara Piala Dunia', 'Daftar-Juara-Piala-Dunia', 'Publish', '2020-12-20 13:51:14', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'fauzan-saari-cjYQBSKDSII-unsplash.jpg', 'Piala Dunia', 'Piala Dunia'),
(29, 1, 17, 'Jenis Cedera Dalam Olahraga Dan Cara Mengatasinya', 'Jenis-Cedera-Dalam-Olahraga-Dan-Cara-Mengatasinya', 'Publish', '2020-12-20 13:52:18', 'AdminBaru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu eros condimentum, aliquet est sit amet, mattis elit. Donec vitae eleifend massa. Phasellus laoreet vestibulum leo. Aliquam nec mollis nisl. Maecenas varius aliquam ipsum, a sagittis neque hendrerit eu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra massa vitae odio tincidunt semper. Praesent suscipit, leo in faucibus tempor, sem elit tempor sapien, sit amet viverra justo metus sit amet libero. Maecenas quam elit, ultrices sit amet tortor a, rhoncus tincidunt tortor. In bibendum nec urna ac sodales. Curabitur tempor lectus eu leo aliquet, non luctus tortor vehicula. Pellentesque sodales ante ac massa pulvinar dignissim. Pellentesque purus purus, convallis non purus id, venenatis vulputate mauris. Morbi consectetur porta turpis, facilisis egestas dolor tincidunt ac. Donec vitae tortor at nunc lacinia venenatis. Nam in eleifend lectus.</p>\r\n\r\n<p>Sed vehicula vel mauris lobortis pulvinar. Curabitur sollicitudin neque in faucibus ultricies. Vivamus varius lectus id neque sagittis, vel bibendum mauris pharetra. Nam consequat elit quis neque viverra, eget pulvinar arcu tristique. Pellentesque accumsan leo sem, id ullamcorper elit dignissim sed. Phasellus quis tellus ligula. Cras vel enim varius, semper urna eget, aliquam nisi. Maecenas posuere erat sed justo eleifend lobortis. Aenean maximus, felis a venenatis mattis, velit quam malesuada lacus, quis egestas risus nunc at urna. Proin quis ligula sit amet nisi rhoncus dignissim eget vel elit. Etiam eget mollis mi.</p>\r\n\r\n<p>Aenean lorem quam, cursus nec leo et, faucibus hendrerit ligula. Praesent et justo molestie, fermentum nibh ullamcorper, condimentum odio. Sed sit amet orci sagittis, fermentum neque nec, pharetra ex. Nunc in purus ultrices, condimentum est eu, egestas lectus. Integer molestie hendrerit neque, vel porttitor massa pellentesque vitae. Nullam eget libero vel sem accumsan pharetra vel id arcu. Nulla convallis tortor nec erat vehicula, in ullamcorper dolor rhoncus. Aliquam tincidunt mattis eros ac lacinia. Proin ipsum metus, mollis ut augue at, finibus accumsan nisi. Sed luctus in diam sit amet eleifend. Curabitur semper rhoncus ante, a interdum sem tristique sit amet. Nunc porta tempor tempor. Maecenas ac fermentum nibh.</p>\r\n\r\n<p>In sit amet vestibulum felis. Donec nec felis ac nibh posuere feugiat. Aliquam pulvinar nunc lectus, et cursus ligula facilisis sed. Aliquam vel blandit dolor. Donec sodales leo tortor, sit amet tincidunt turpis varius ac. Suspendisse a volutpat dolor, ut aliquam ante. Mauris sit amet eros elit. Vivamus dui elit, hendrerit ut ultricies id, faucibus vitae mauris. Suspendisse rutrum aliquet enim non laoreet. In rutrum est eu mauris fermentum, consectetur bibendum ipsum tempor. Donec ante elit, tempor id faucibus ut, placerat ut mi. Donec rhoncus quam dolor, eget condimentum ipsum ornare placerat.</p>\r\n\r\n<p>Suspendisse feugiat turpis a elit commodo, id posuere ante suscipit. Curabitur suscipit lacus ut elit pulvinar, et congue est luctus. Sed tempor condimentum accumsan. Nullam id congue diam. Vestibulum ullamcorper quam nec scelerisque cursus. Phasellus mollis risus quis nulla pretium molestie. Nulla posuere vehicula augue a ullamcorper. Donec interdum, elit quis tincidunt pharetra, arcu lorem fringilla urna, sit amet auctor mi leo in dui. Nunc egestas, mauris vitae pharetra viverra, diam arcu eleifend libero, a consectetur lorem enim a erat.</p>\r\n', 'jannik-skorna-mY2ZHBU6GRk-unsplash.jpg', 'Olahraga', 'Cedera, Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` enum('ON','OFF') NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner`, `link`, `status`, `gambar`) VALUES
(4, 'Samsung A3', 'http://localhost/muraman/toko/barang/Samsung-A3-A300H', 'ON', 'banner2.png'),
(5, 'Iphone 6', 'http://localhost/muraman/toko/barang/Apple-Iphone-6', 'ON', 'banner1.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `slug_barang` varchar(100) NOT NULL,
  `penjual` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori_barang`, `id_user`, `barang`, `harga`, `berat`, `slug_barang`, `penjual`, `stok`, `tanggal_post`, `gambar`, `deskripsi`, `status`) VALUES
(16, 6, 1, 'Canon Eos 750D Kit 18-55mm IS STM', 10100000, 1000, 'Canon-Eos-750D-Kit-18-55mm-IS-STM', 'AdminBaru', 8, '2020-12-20 14:06:16', 'canon-eos-750d.png', '<p>orem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(17, 6, 1, 'Nikon D5200 Lensa Kit 18-55mm', 6000000, 2000, 'Nikon-D5200-Lensa-Kit-18-55mm', 'AdminBaru', 6, '2020-12-20 14:02:53', 'nikon-d5200.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(18, 5, 1, 'LG LED TV 32 - 32LF520A', 3000000, 5000, 'LG-LED-TV-32-32LF520A', 'AdminBaru', 11, '2020-12-21 02:02:33', 'lg-led-tv32-32LF520A.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'ON'),
(19, 7, 1, 'Apple Iphone 6', 11000000, 1500, 'Apple-Iphone-6', 'AdminBaru', 9, '2020-12-20 14:05:37', 'iphone-6-silver.png', '<p>Layar 4,7&quot;, 128GB Memori</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(20, 7, 1, 'Samsung A3 A300H', 2750000, 1000, 'Samsung-A3-A300H', 'AdminBaru', 5, '2020-12-20 14:07:24', 'Samsung_Galaxy-A3.png', '<p>Layar 4.5&quot;, 16GB Memori</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(21, 5, 1, 'LG LED TV 32LF550A', 4500000, 10000, 'LG-LED-TV-32LF550A', 'AdminBaru', 5, '2020-12-21 02:01:02', 'lg-32-led-tv-32LF550A.png', '<p>Layar 32&quot;, Triple XD Engine</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa</p>\r\n', 'ON'),
(22, 7, 1, 'Mi 4i', 3000000, 1000, 'Mi-4i', 'AdminBaru', 3, '2020-12-20 14:09:34', 'mi-4i.png', '<p>Layar 5&quot;, 16GB Memori</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(23, 6, 1, 'Nikon D3200 Lensa Kit VR II 18-55mm', 5000000, 5000, 'Nikon-D3200-Lensa-Kit-VR-II-18-55mm', 'AdminBaru', 9, '2020-12-20 14:10:47', 'nikon-d52001.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON'),
(24, 7, 1, 'Samsung Galaxy Note 3', 7000000, 1000, 'Samsung-Galaxy-Note-3', 'AdminBaru', 14, '2020-12-20 14:13:34', 'samsung-galaxy-note-3.png', '<p>Layar 5.7&quot;, 16GB Memori</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>\r\n', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_barang`, `nama_barang`, `qty`, `harga`) VALUES
(21, 24, 'Samsung Galaxy Note 3', 1, 7000000),
(22, 17, 'Nikon D5200 Lensa Kit 18-55mm', 1, 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `kategori`, `slug_kategori`, `keterangan`, `urutan`, `gambar`) VALUES
(16, 'Pemrograman', 'pemrograman', 'Web Programming', 1, 'program.jpg'),
(17, 'Sports', 'sports', 'Sepak Bola', 2, 'sports.jpg'),
(18, 'Inovasi', 'inovasi', 'Teknologi', 3, 'lamp.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `kategori_brg` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `kategori_brg`, `slug_kategori`, `urutan`, `status`) VALUES
(5, 'Televisi', 'televisi', 1, 'ON'),
(6, 'Kamera', 'kamera', 2, 'ON'),
(7, 'Smartphone', 'smartphone', 3, 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_wa` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `google_maps` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `metatext` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `no_wa`, `alamat`, `fb`, `ig`, `google_maps`, `icon`, `tanggal`, `metatext`, `keywords`) VALUES
(1, 1, 'MURAMAN', 'WEBSITE CI CMS', 'admin@gmail.com', '08777776768', 'SUKABUMI, JABAR, INDONESIA', 'http://facebook.com/admin.com', 'http://instagram.com/rahmanmuh_', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7643442484264!2d106.93190411414477!3d-6.918751869638725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e683633fcd15215:0x261f558445241e0c!2sUniversitas Muhammadiyah Sukabumi!5e0!3m2!1sid!2sid!4v1608466346945!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"', 'Artboard1.png', '2021-07-05 11:21:46', 'CI CMS', 'CICMS');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_pesanan`, `nama`, `no_rekening`, `tanggal`) VALUES
(3, 21, 'BRI - Pelanggan1', '11111111', '2020-12-20'),
(5, 22, '1234567 - CS', '123455667', '2020-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`, `status`) VALUES
(3, 'Jakarta', '17000', 'ON'),
(4, 'Bandung', '11000', 'ON'),
(5, 'Sukabumi', '15000', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama`, `rekening`, `no_rekening`, `status`) VALUES
(3, 'ABCDE', 'BCA - SAYA', '1234567', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `metode_bayar` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_pesanan` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nama_pembeli`, `no_telp`, `alamat`, `metode_bayar`, `tarif`, `total_bayar`, `total_berat`, `tanggal`, `status_pesanan`) VALUES
(21, 10, 'pelanggan1', '0897878787', 'Kp Sukaraja', 3, 17000, 7017000, 1000, '2020-12-21 01:20:52', 2),
(22, 10, 'pelanggan1', '09876543', 'Kp. Galing', 3, 17000, 6017000, 2000, '2020-12-21 01:35:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Super Admin','Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `tanggal`, `password`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-07-04 10:50:45', '$2y$10$6x4RFB90BqFfLGV4JJxj2OYbym0rRHBJugG3FTY9FUst2fLXuZ6ri', 'Super Admin'),
(10, 'pelanggan1', 'pelanggan@gmail.com', '2021-07-04 18:26:05', '$2y$10$e7l.JyduLChUaHQ.uojK7er58NGGn/IPElPdKkn68zkFmtA8mfy9m', 'User'),
(12, 'Pelanggan2', 'pelanggan2@gmail.com', '2021-07-05 11:28:18', '$2y$10$vDEbWDSSUJwrebgXESvgm.4IGKeq95.XJRbMUTSX1d5SE387kqWkW', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id_visitor` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `id_artikel`, `judul`, `penulis`, `views`) VALUES
(13, 21, 'Memulai Belajar dengan Membuat Game Sederhana', 'AdminBaru', 2),
(14, 22, 'Belajar Cara Membuat Website Bagi Pemula', 'AdminBaru', 3),
(15, 23, 'Cara Merawat Smartphone dan Laptop Biar Awet', 'AdminBaru', 1),
(16, 24, 'Belajar Desain Vektor', 'AdminBaru', 1),
(17, 25, 'Belajar Dasar Pemrograman Website', 'AdminBaru', 1),
(18, 27, 'Mahir 1 tahun Belajar Pemrograman Website', 'AdminBaru', 1),
(19, 28, 'Daftar Juara Piala Dunia', 'AdminBaru', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_user` (`id_user`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD CONSTRAINT `konfigurasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
