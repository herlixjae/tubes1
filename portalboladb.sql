-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 12:34 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portalboladb`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(40) NOT NULL,
  `post_id` varchar(10) NOT NULL,
  `komentar` longtext NOT NULL,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `post_id`, `komentar`, `c_date`) VALUES
(2, 'admin', '1', 'CIYUUUSSS ???', '2013-09-14 12:49:59'),
(3, 'heru', '1', 'wooooow GETOO', '2013-09-14 01:43:35'),
(4, 'heru', '2', 'GG dah', '2013-09-14 05:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu_data`
--

CREATE TABLE IF NOT EXISTS `menu_data` (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `id_menu_parent` varchar(10) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `link` longtext NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_location`
--

CREATE TABLE IF NOT EXISTS `menu_location` (
  `id_menu_location` int(10) NOT NULL,
  `nama_menu_location` varchar(40) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `idoptions` int(10) NOT NULL AUTO_INCREMENT,
  `options_name` varchar(40) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`idoptions`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`idoptions`, `options_name`, `value`) VALUES
(1, 'company_name', 'Portal Bola'),
(2, 'company_address', 'Jl. Aplikasi No. 133'),
(3, 'company_number', '09876554333'),
(5, 'feature_home_cat_2', '6'),
(6, 'feature_home_cat_3', '7'),
(7, 'feature_home_cat_4', '4'),
(9, 'fb_id', 'http://www.facebook.com/BonsaiTeknologiInformasi'),
(10, 'twitter_id', 'http://www.twitter.com/imrobot');

-- --------------------------------------------------------

--
-- Table structure for table `post_article`
--

CREATE TABLE IF NOT EXISTS `post_article` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `featurephoto` varchar(100) NOT NULL,
  `post_entry` longtext NOT NULL,
  `create_date` datetime NOT NULL,
  `hit` int(10) NOT NULL,
  `create_by` varchar(40) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `post_article`
--

INSERT INTO `post_article` (`post_id`, `id_cat`, `title`, `featurephoto`, `post_entry`, `create_date`, `hit`, `create_by`, `status`) VALUES
(1, '7', 'Uli Hoeness: Bayern Munich Hadapi Tugas Raksasa', '270026_heroa_1379077623.jpg', '<p><img alt="" src="/bolaportal/uploads/images/270026_heroa_1379077623.jpg" style="height:427px; width:615px" /></p>\r\n\r\n<p><strong>Sang presiden Bayern khawatir dengan peluang timnya untuk mempertahankan gelar Liga Champions</strong></p>\r\n\r\n<p>Sejak perubahan format menjadi Liga Champions pada musim 1992/93, belum ada satu klub yang mampu mempertahankan gelar juara. Presiden Bayern Munich Uli Hoeness mengakui tugas berat yang harus diemban timnya jika ingin mempertahankan trofi Si Kuping Besar.</p>\r\n\r\n<p>Di musim ini, Bayern tergabung di Grup D bersama Manchester City, CSKA Moscow, dan Viktoria Plzen. Hoeness pun menyadari, akan sangat sulit mengulangi kesuksesan mereka di Wembley pada bulan Mei lalu.</p>\r\n\r\n<p>&ldquo;Menggapai puncak tidaklah mudah, tapi ada satu hal lagi yang lebih sulit, yakni bertahan di puncak dalam kurun waktu lama. Tugas raksasa itu terbentang di depan pelatih dan klub ini,&rdquo; ujar Hoeness.</p>\r\n\r\n<p>Selain itu, Hoeness juga menyatakan sudah sangat yakin dengan perekrutan Pep Guardiola sebagai pelatih anyar mereka. Guardiola baru saja mempersembahkan Piala Super Eropa dengan mengalahkan Chelsea, tiga pekan silam.</p>\r\n\r\n<p>&ldquo;Saya 100 persen yakin bahwa kami membuat keputusan tepat dengan mendatangkan Pep Guardiola. Kita tentu telah melihat apa yang dia lakukan dalam pertandingan melawan Chelsea,&rdquo; pujinya.</p>\r\n', '2013-09-13 20:30:00', 75, 'admin', '1'),
(2, '6', 'Ada rahasia terkandung dalam aksi tendangan penalt', '315723_heroa_1379079644.jpg', '<p><img alt="" src="/bolaportal/uploads/images/315723_heroa_1379079644.jpg" style="height:430px; width:620px" /></p>\r\n\r\n<p>Mario Balotelli menjadi salah satu pemain yang andal dalam mengeksekusi penalti. Buktinya, dari 20 percobaan, 100 persen berujung gol.<br />\r\n<br />\r\nMantan penjaga gawang Italia, Milan dan Fiorentina, Giovanni Galli, pun menyatakan sudah mengetahui rahasia kesuksesan penalti Balotelli dengan mempelajari setiap tendangannya.<br />\r\n<br />\r\nTak hanya itu saja, jika ada kiper yang masih aktif dan mengetahui apa yang diketahui Galli, bukan tidak mungkin yang bersangkutan bisa mematahkan rekor Balotelli tersebut.<br />\r\n<br />\r\n&quot;Saya sudah mempelajari Balotelli dalam waktu yang lama. Saya sudah memerhatikan satu hal khusus,&quot; ungkap Galli kepada <em>Gazzetta dello Sport.</em><br />\r\n<br />\r\n&quot;Ketika dia melambatkan gerakan larinya, dia akan menendang bola ke satu sudut, dan ketika dia berlari, maka tendangannya akan mengarah ke sudut lainnya.&quot;<br />\r\n<br />\r\nGalli menambahkan tak ingin memberikan kemudahan kepada kiper lain untuk menebak rahasia tendangan penalti Balotelli dan bagaimana cara menangkalnya.<br />\r\n<br />\r\n&quot;Jika Anda ingin tahu, lihat saja sendiri 20 penalti yang sudah dilakukannya,&quot; ujar Galli.<br />\r\n<br />\r\nNamun, Galli yakin akan ada kiper yang bisa membendung tendangan Balotelli dan kemungkinan besar kiper tersebut adalah Manuel Neuer.<br />\r\n<br />\r\n&quot;Dia memiliki fisik yang besar. Dia bisa menjaga gawangnya dengan baik dan memiliki reaksi yang sempurna. Jika dia bisa bergerak ke arah yang benar, maka dia akan bisa membendung bola Balotelli,&quot; tandasnya.</p>\r\n', '2013-09-13 20:43:00', 20, 'admin', '1'),
(4, '4', 'Carlo Ancelotti Pastikan Gareth Bale Jalani Debut ', '316099_heroa_1379095933.jpg', '<p><img alt="" src="/bolaportal/uploads/images/316099_heroa_1379095933.jpg" style="height:430px; width:620px" /></p>\r\n\r\n<p>Carlo Ancelotti telah mengonfirmasi, Gareth Bale akan menjalani debutnya bersama Real Madrid pada akhir pekan ini dalam laga tandang melawan Villarreal. Meski belum dalam kondisi fit, pemain termahal di dunia itu diyakini Ancelotti akan mampu mengambil perannya dalam pekan keempat La Liga Spanyol itu.<br />\r\n<br />\r\n&ldquo;Bale akan terbang ke Villarreal dan akan bermain, meski saya masih belum tahu apakah ia akan bermain sejak awal atau bermain dari bangku cadangan,&rdquo; ujar Ancelotti dalam jumpa pers menjelang laga yang akan dilaksanakan di El Madrigal, markas Villarreal.<br />\r\n<br />\r\n&ldquo;Bale dan Cristiano Ronaldo adalah dua pemain hebat dan saya tak ragu mereka akan berkembang bersama-sama di tim. Yang paling saya sukai dari Bale adalah motivasi dan keinginannya untuk memberikan dampak di Madrid. Dia sangat bahagia dan rendah hati,&rdquo; puji sang pelatih.<br />\r\n<br />\r\nSelain itu, Ancelotti juga memastikan Iker Casillas untuk tampil sebagai penjaga gawang utama tatkala Madrid berhadapan dengan Galatasaray pada <em>matchday</em> perdana Liga Champions, tengah pekan mendatang.<br />\r\n<br />\r\n&ldquo;Selasa besok, Iker [Casillas] akan tampil sejak menit pertama. Mungkin ada opsi bahwa Diego Lopez bermain di La Liga, sedangkan Casillas di Copa del Rey,&rdquo; imbuh pelatih asal Italia ini.</p>\r\n', '2013-09-14 01:12:25', 1, 'heru', '1'),
(5, '4', 'Zinedine Zidane: Mesut Ozil Kurang Punya Daya Juan', '313396_heroa_1379098725.jpg', '<p><img alt="" src="/bolaportal/uploads/images/313396_heroa_1379098725.jpg" style="height:430px; width:620px" /></p>\r\n\r\n<p>Asisten pelatih Real Madrid Zinedine Zidane mengemukakan bahwa Mesut Ozil pergi dari klub karena ia kurang punya tekad untuk mempertahankan tempatnya di tim.</p>\r\n\r\n<p>Pemain internasional Jerman ini diperkenalkan ke hadapan publik London pada Kamis (12/9) setelah pindah dengan tebusan &euro;47 juta.</p>\r\n\r\n<p>Ozil sendiri pergi dari Madrid menyusul kedatangan Isco dan Gareth Bale.</p>\r\n\r\n<p>&quot;Ozil memilih pergi,&quot; ujarnya pada situs resmi klub. &quot;Ia adalah pemain bagus yang sudah memberi banyak hal maka kami berharap yang terbaik baginya.&quot;</p>\r\n\r\n<p>&quot;Ada pemain lain yang menanggapi [kedatangan Isco, dkk] dengan tekad untuk bersaing, namun tak semua bereaksi sama.&quot;</p>\r\n\r\n<p>&quot;[Angel] Di Maria merespon dengan baik dan berniat untuk berjuang.&quot;</p>\r\n', '2013-09-14 01:59:07', 1, 'heru', '1'),
(6, '4', 'Adriano: Tata Martino Setia Pada Filosofi Barcelon', '304823_heroa_1379099149.jpg', '<p><img alt="" src="/bolaportal/uploads/images/304823_heroa_1379099149.jpg" style="height:430px; width:620px" /></p>\r\n\r\n<p>Adriano menyebut pelatih anyar Barcelona Gerardo &lsquo;Tata&rsquo; Martino sama sekali tidak berkeinginan untuk filosofi bermain klub. Pelatih asal Argentina itu menggantikan Tito Vilanova yang mengundurkan diri karena masalah kesehatan.<br />\r\n<br />\r\nMeski Martino tak memiliki keterikatan apapun dengan Barcelona sebelumnya, Adriano yakin pelatihnya itu akan tetap mempertahankan taktik <em>tiki-taka</em> maupun <em>ball possession</em> seperti yang telah dilestarikan oleh pendahulunya itu.<br />\r\n<br />\r\n&ldquo;Tata tidak datang kemari untuk menggantikan sesuatu yang telah ada sebelumnya. Dia hanya ingin kami mengingat dan mengulangi apa yang telah kami lakukan sebelumnya, karena filosofi Barca tidak akan berubah,&rdquo; ungkap Adriano dalam konferensi pers.<br />\r\n<br />\r\nAdriano juga mengaku akan menerima instruksi apapun dari pelatihnya, meski ia harus memainkan posisi yang tidak terbiasa ia lakukan.<br />\r\n<br />\r\n&ldquo;Saya bisa bermain di berbagai posisi dan saya mungkin bisa main sebagai gelandang tengah jika diperlukan. Tata percaya pada saya. Jika saya diminta harus bermain sebagai bek kiri, bek kanan, atau sayap, saya siap melakukannya dengan baik,&rdquo; pungkas pemain berusia 28 tahun ini.</p>\r\n', '2013-09-14 02:06:09', 0, 'admin', '1'),
(7, '5', 'Asmir Begovic Sanjung Kualitas Edin Dzeko', '299862_heroa_1379099291.jpg', '<p><img alt="" src="/bolaportal/uploads/images/299862_heroa_1379099291.jpg" style="height:430px; width:620px" /></p>\r\n\r\n<p>Stoke City Asmir Begovic menyanjung kualitas yang dimiliki oleh striker Manchester City, Edin Dzeko.</p>\r\n\r\n<p>Begovic mengklaim striker asal Bosnia tersebut adalah salah satu dari tiga striker nomor sembilan terbaik di dunia. Ia berharap mampu meredam Dzeko dalam laga lanjutan Liga Primer Inggris akhir pekan nanti.</p>\r\n\r\n<p>&quot;Menurut saya, dia adalah salah satu dari tiga pemain bernomor punggung sembilan terbaik di dunia, bersama Radamel Falcao [Monaco] dan Robert Lewandowski [Borussia Dortmund]. Jadi dia adalah seseorang yang harus diwaspadai saat pertandingan,&quot; ungkap Begovic seperti yang dilansir laman resmi klub.</p>\r\n\r\n<p>&quot;Dia mencetak gol ke gawang saya terakhir kali bermain di Etihad Stadium, tetapi dia hanya mencetak satu gol di laga itu karena saya melakukan beberapa penyelamatan terhadap dia dalam beberapa tahun terakhir. Saya harap, saya dapat membuatnya tidak mencetak gol lagi di akhir pekan nanti.&quot;</p>\r\n', '2013-09-14 02:08:33', 1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id_cat` int(10) NOT NULL AUTO_INCREMENT,
  `nm_cat` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id_cat`, `nm_cat`) VALUES
(4, 'Liga Spanyol'),
(5, 'Liga Inggris'),
(6, 'Liga Itali'),
(7, 'Liga Jerman');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat_user` varchar(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(90) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `public_name` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(90) NOT NULL,
  `website` varchar(90) NOT NULL,
  `avatar` longtext NOT NULL,
  `banned` varchar(5) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id_user`, `id_cat_user`, `username`, `password`, `nama`, `public_name`, `alamat`, `telepon`, `jenis_kelamin`, `email`, `website`, `avatar`, `banned`, `last_login`) VALUES
(1, '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', '', '', '', '', '', '', '0', '2013-09-14 05:13:20'),
(2, '2', 'heru', 'a648ab9a3e32c5f3f6e9ddbd41c0530f', 'Heru Rahmat Akhnuari', 'heru', 'Jalan Padang IV', '082389288556', 'l', 'eyubalzary@gmail.com', 'http://www.ilmuprogrammer.com/', 'http://www.cute-factor.com/images/smilies/wanwan/1775465299wan.gif', '0', '2013-09-14 05:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_cat`
--

CREATE TABLE IF NOT EXISTS `user_cat` (
  `id_cat_user` int(10) NOT NULL AUTO_INCREMENT,
  `nm_cat_user` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cat_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Dumping data for table `user_cat`
--

INSERT INTO `user_cat` (`id_cat_user`, `nm_cat_user`) VALUES
(1, 'Administrator'),
(2, 'Publisher');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
