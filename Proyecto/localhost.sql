-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2017 at 09:12 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2689058_sgviddb`
--
--CREATE DATABASE IF NOT EXISTS `id2689058_sgviddb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
--USE `id2689058_sgviddb`;

-- --------------------------------------------------------

--
-- Table structure for table `Acabado`
--

CREATE TABLE `Acabado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Acabado`
--

INSERT INTO `Acabado` (`id`, `nombre`) VALUES
(1, 'Metalico'),
(2, 'Rústico'),
(3, 'Satinado'),
(4, 'Mate'),
(5, 'Moderno'),
(6, 'Clásico');

-- --------------------------------------------------------

--
-- Table structure for table `AcabadoModelo`
--

CREATE TABLE `AcabadoModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idAcabado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `AcabadoModelo`
--

INSERT INTO `AcabadoModelo` (`idModelo`, `idAcabado`) VALUES
('H-0001', 1),
('H-0001', 3),
('H-0002', 2),
('H-0002', 4),
('H-0003', 3),
('H-0004', 4),
('H-0005', 2),
('H-0006', 4),
('H-0006', 5),
('H-0007', 5),
('H-0008', 1),
('H-0008', 5),
('H-0009', 6),
('H-0010', 5),
('H-0011', 2),
('H-0011', 3),
('H-0012', 5),
('H-0013', 4),
('H-0014', 5),
('H-0015', 1),
('H-0015', 5),
('H-0016', 3),
('H-0016', 5),
('H-0017', 3),
('H-0017', 4),
('H-0018', 6),
('H-0019', 3),
('H-0020', 3),
('H-0021', 3),
('H-0021', 4),
('H-0022', 1),
('H-0022', 5),
('H-0023', 1),
('H-0023', 5),
('H-0024', 3),
('H-0024', 5),
('H-0025', 4),
('H-0025', 5),
('H-0026', 3),
('H-0026', 5),
('H-0027', 1),
('H-0027', 4),
('H-0027', 5),
('O-0001', 1),
('O-0001', 3),
('O-0002', 2),
('O-0002', 4),
('O-0003', 3),
('O-0004', 4),
('O-0005', 4),
('O-0008', 3),
('O-0009', 5),
('O-0010', 5),
('O-0011', 5),
('O-0012', 4),
('O-0012', 5),
('O-0013', 3),
('O-0014', 4),
('O-0014', 6),
('O-0015', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Almacen`
--

CREATE TABLE `Almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `domicilio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Almacen`
--

INSERT INTO `Almacen` (`id`, `nombre`, `capacidad`, `domicilio`, `telefono`) VALUES
(1, 'Azcapotzalco', 300, 'Periférico Sur No. 4302 int. 201, Colonia Jardines del Pedregal, Delegación Coyoacán, Ciudad de México', '50048500'),
(2, 'Santa Maria la Ribera', 1000, 'cuarta cerrada de la sexta calle de nogal No. 10', '55413513'),
(3, 'Tolnahuac', 200, 'Prol. Lerdo 318 San Simón Tolnahuac', '55562515'),
(4, 'San Rafael', 400, 'Av. Ribera de San Cosme 66 San Rafael', '54726256'),
(5, 'Cuauhtemoc', 500, 'Calle Río Sena 71, Cuauhtémoc, 06500 Ciudad de México, CDMX', '57426264'),
(6, 'Guerrero', 300, 'Marte 78, Guerrero, 06300 Ciudad de México, CDMX', '56563154'),
(7, 'Roma', 100, 'Calle Zacatecas 149-D, Roma Nte., 06700 Ciudad de México, CDMX', '50135321'),
(8, 'Centro 1 Carranza', 400, 'Calle de Venustiano Carranza 63, Centro Histórico, Centro, 06000 Ciudad de México, CDMX', '57341363'),
(9, 'Centro 2 Madero', 100, 'Calle Francisco I. Madero 59, Centro Histórico, Centro, 06000 Cuauhtémoc, CDMX', '57343163'),
(10, 'Centro 3 Lázaro Cárdenas', 300, 'Eje Central Lázaro Cárdenas 9, Colonia Centro, Centro, 06000 Ciudad de México, CDMX', '57333163'),
(11, 'Lindavista', 1000, 'Avenida Montevideo 284, Gustavo A Madero, Lindavista, Lindavista Sur, 07300 Ciudad de México, CDMX', '56763498'),
(12, 'Polanco', 800, 'Francisco Petrarca 133, Polanco, Col. Irrigación, 11570 Ciudad de México, CDMX', '52036006'),
(13, 'Tlalpan', 100, 'Av de los Insurgentes Sur 3960, Tlalpan, 14000 Ciudad de México, CDMX', '59524791'),
(14, 'Casco de Santo Tomas', 100, 'Garambullo 35, Un Hogar Para Nosotros, 11330 Ciudad de México, CDMX', '54321214'),
(15, 'Hipódromo', 200, 'Campeche 374-362, Hipódromo, 06100 Ciudad de México, CDMX', '51526384');

-- --------------------------------------------------------

--
-- Table structure for table `Asesora`
--

CREATE TABLE `Asesora` (
  `idCliente` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `idAgente` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Categoria`
--

INSERT INTO `Categoria` (`id`, `nombre`) VALUES
(1, 'Hogar'),
(2, 'Oficina');

-- --------------------------------------------------------

--
-- Table structure for table `CategoriaModelo`
--

CREATE TABLE `CategoriaModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CategoriaModelo`
--

INSERT INTO `CategoriaModelo` (`idModelo`, `idCat`) VALUES
('H-0001', 1),
('H-0002', 1),
('H-0003', 1),
('H-0004', 1),
('H-0005', 1),
('H-0006', 1),
('H-0007', 1),
('H-0008', 1),
('H-0009', 1),
('H-0010', 1),
('H-0011', 1),
('H-0012', 1),
('H-0013', 1),
('H-0014', 1),
('H-0015', 1),
('H-0016', 1),
('H-0017', 1),
('H-0018', 1),
('H-0019', 2),
('H-0020', 2),
('H-0021', 1),
('H-0022', 1),
('H-0023', 1),
('H-0024', 1),
('H-0024', 2),
('H-0025', 1),
('H-0026', 1),
('H-0027', 2),
('O-0001', 2),
('O-0002', 2),
('O-0003', 2),
('O-0004', 2),
('O-0005', 2),
('O-0006', 2),
('O-0007', 2),
('O-0008', 1),
('O-0008', 2),
('O-0009', 1),
('O-0009', 2),
('O-0010', 2),
('O-0011', 2),
('O-0012', 2),
('O-0013', 1),
('O-0013', 2),
('O-0014', 2),
('O-0015', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`correo`, `nombre`, `password`, `telefono`, `notify`) VALUES
('afifi@icloud.com', 'Fritz Trimmer', 'b95c74c770a7e026b25e9e56b2dd006d', '9199309013', 0),
('aglassis@att.net', 'Tommie Milazzo', '607a4e48db6e48ea7300cc6e6ea3ea37', '4642995302', 0),
('alfred@att.net', 'Augustine Fargo', 'f81f428aace6e8425bf5d767521fb3b1', '3085479244', 0),
('amichalo@yahoo.ca', 'Joaquin Gaona', 'f080983a6179a67d5e5a2cbcee4a1816', '8662584991', 1),
('andale@outlook.com', 'Joshua Ziebarth', '7bb65e2c5184d888cd5c6d09cae35820', '2065231220', 1),
('aschmitz@me.com', 'Giovanni Marotta', 'e9ae0669ce0a76656285aac613817bc4', '9656617245', 1),
('aukjan@me.com', 'Mathilda Hultquist', 'fbe87345eaca8e59459dcd5976362620', '7096189527', 1),
('bahwi@mac.com', 'Fidelia Whittenberg', '42a14bff659798b0a041ae35d732cd6f', '4412361080', 1),
('baveja@me.com', 'Jospeh Godsey', '4033e7fa41279d6755fe442e9d5b3c73', '2855936062', 1),
('bdbrown@att.net', 'Wilbur Strouse', '1e31e77f309c891361f4a6b8f75b4acb', '2722260305', 1),
('bflong@yahoo.ca', 'Elliot Kuhlmann', 'c35ead6fcaf2dfd767260a39ba53c82b', '6254893014', 1),
('bmcmahon@yahoo.com', 'Eusebio Faulk', '039563488b51b957c9a08ac8b8c1d0a8', '9274548330', 0),
('boein@hotmail.com', 'Merri Alden', '251ca6e057d6036e6d55707fa17eb733', '7089463821', 1),
('bonmots@verizon.net', 'Charla Kingsley', 'a096a9ca7e0c2753ef453cc1dc8faa67', '9606332024', 0),
('brbarret@optonline.net', 'Larue Amell', '31699d153fe5252032727c91ebb0a5e3', '5082802550', 1),
('brickbat@hotmail.com', 'Colleen Heisler', '695562d17d7e1f8a0867c73da11782e5', '4762796702', 1),
('british@comcast.net', 'Vince Bold', '135cddecde87de62bdff6cf3f3e2680c', '5527556138', 1),
('burns@yahoo.ca', 'Donn Bury', '4ac6b95f6dce02bb0979a2d52b2266b6', '1084488295', 1),
('campware@yahoo.ca', 'Zada Helfrich', '09fbec095bd7c109e051d5dad97c3698', '2903885205', 0),
('chrisj@hotmail.com', 'Abraham Finkbeiner', 'ec2e44b07fdd7acf4f74bb855e65319e', '9628587053', 0),
('chunzi@msn.com', 'Franchesca Leonardo', '5fa9933f7950715040df89ec8989cc41', '4512961943', 0),
('cliffordj@gmail.com', 'Jarvis Sommerfield', '05a89c0231a751da28799a4a2a1921b3', '9652187748', 0),
('codex@live.com', 'Kay Heffernan', '2eacd1ef3b1cd280bcd22913c0a88a4b', '6585952772', 0),
('crusader@sbcglobal.net', 'Stanton Boden', 'c431c08642cc53d500385ef68d2c8215', '8422352554', 1),
('dalamb@mac.com', 'Apryl Biddle', '6fe86fc56074e751f0cb6774d9d4e8c8', '7812596095', 1),
('daniel.isai.oz@outlook.com', 'Daniel Isai', '60ffb53d7cc46e06921bf9c5f82f2bc3', '5535087941', 0),
('dgriffith@icloud.com', 'Lanora Lout', 'a2679bdc0e38657032dafd919d946233', '7965701049', 1),
('dgriffith@live.com', 'Alma Alexandra', 'bb8381edca8b13b38e02a6b8cd11b4c2', '1633675050', 1),
('dgriffith@verizon.net', 'Madalene Herdon', '0c07effd8a143b855ee8f325ad57fbaa', '6176212179', 0),
('dpitts@att.net', 'Charley Feld', 'bb96e7b6ca7c942536c59a818ae661cd', '7551199050', 0),
('earmstro@mac.com', 'Wilfred Nees', '31d39f9231b928bb7df5b8955b65fe94', '9316884056', 1),
('empathy@comcast.net', 'Korey Mast', '87d047aeb59c4c5c6928ba0d14b01e4f', '8647075205', 1),
('empathy@sbcglobal.net', 'Ma Butkovich', '1b589934287e9e47bdf532c5640029b3', '6465882656', 1),
('esasaki@hotmail.com', 'Mitchell Ritacco', 'cb1ac98d1ba166abdd19bc8fa7aff506', '3829516780', 0),
('eulerconther@hotmail.com', 'Euler Hernández', '25f9e794323b453885f5181f1b624d0b', '5528796479', 1),
('eve@evelyn.com', 'Eve', '8fbb8264c5040ec3ef3320336afa435a', '1234567890', 0),
('flaviog@att.net', 'Ashleigh Flippen', '9fd6ec6fd2b18030045d5956319d5676', '8015198465', 0),
('froodian@att.net', 'Ehtel Darrington', 'aac04150efe3ea030d74843881e3479f', '6863795728', 1),
('garyjb@msn.com', 'Gilbert Sanor', '09f221425be4e630c3f95d44bafd9231', '9244677079', 1),
('geekoid@aol.com', 'Nathanael Corner', '23d3323d601c68a6274280b270411491', '3404758066', 0),
('gknauss@me.com', 'Abdul Blish', 'cb54fb9db8a1e3b00ecbba037c4983da', '4117476467', 0),
('gomor@icloud.com', 'Karoline Turnipseed', '50235aa8fe4d840be9c5cf409bc0bcc5', '6288236613', 0),
('hachi@me.com', 'Millicent Ooten', 'd0093d88c6aabc52c025b49efff63142', '8058946761', 0),
('helger@verizon.net', 'Bethany Frasca', '098eeee49fc0b2dbf7da0a7ec0b4316b', '3064060188', 0),
('heroine@sbcglobal.net', 'Warner Kelton', 'bff5bd9a3bbb40924b145d672ba4939e', '7308699703', 1),
('hwestiii@gmail.com', 'Jarod Hay', 'a7fe63c8dce2f13876e8bdc7a712ba68', '1137664111', 1),
('hyper@yahoo.ca', 'Rocco Spillers', 'd4b9ce11edb8b51984f12d0164e493b9', '2476630839', 1),
('imightb@hotmail.com', 'Barney Woll', '6a25f18d28c6567d854b5c1e13947268', '1159241078', 0),
('intlprog@mac.com', 'Kathryne Richarson', 'e1ae8f9b3edc77d2bd97fffe88c6a408', '2611514710', 1),
('jdhedden@yahoo.com', 'Sherron Coberly', '4da82e2da897f3881e31dc8d19cb53e1', '4673878103', 0),
('jfmulder@gmail.com', 'Jenell Honig', '5f1573cfc4d94f356abfec58aced97d0', '6787094528', 1),
('jgmyers@optonline.net', 'Patrick Swofford', '93347689134d642076eb53274916d238', '6116994037', 0),
('jipsen@aol.com', 'Daryl Villalpando', '61c33f210a02bc5c96af0e8649b0a25e', '2881379339', 0),
('jipsen@comcast.net', 'Norris Parham', '7184e508d82694ca69d05ba1a5f8a14b', '1613109204', 1),
('jocelyn@sue.com', 'Jocelyn Sue', '669ffc150d1f875819183addfc842cab', '5545735519', 1),
('johndo@live.com', 'Brett Fluker', 'd7e3d2af168481302e19e24260f9334c', '7464906109', 1),
('jschauma@msn.com', 'Shayla Reber', '0978165d15caa80d81db3bb90e4f7b09', '2869967583', 0),
('kdawson@hotmail.com', 'Chung Kim', 'e5785b7b2d17ba96de819b336b45b445', '6427122096', 0),
('kdawson@mac.com', 'Elden Erne', '37c8754414cd844ae4ee7abc5a3d84a7', '7876638402', 1),
('kourai@aol.com', 'Tommy Hambrick', '5e80d32f30c7af903efab05087bedd94', '6562216755', 1),
('lstaf@verizon.net', 'Zulma Abasta', '6d2798c2fe034074ddb6421b5d62e245', '7534698243', 1),
('luebke@me.com', 'Isidro Damian', '21d4b79da67101f242fa76e1a4248164', '1239914492', 1),
('makarow@verizon.net', 'Tiera Gandee', '62f5f8eaa1aab78004ff36b30a4800dc', '4342091913', 1),
('mariana@gmail.com', 'Mariana Monroy Duarte', '02c6492cdf3cfbc430c909b8126c4f16', '5778909876', 1),
('mastinfo@att.net', 'Debby Fairbank', '1758cb96e1606b2e937963380946ebae', '5337378416', 1),
('matthijs@mac.com', 'Bernetta Osterman', '5fdb113cbad66feeb69f2a052c6d525f', '7729961675', 1),
('mcraigw@icloud.com', 'Mi Whitis', 'a477480d8c3ec447e1b2e43235fd732d', '1824511132', 1),
('mcraigw@me.com', 'Marcelo Maguire', 'd0fb9d00edc297ada9b7aa8276b9b2ac', '8574633645', 1),
('miltchev@icloud.com', 'Allen Rowlands', 'c2db9f14175f41033b6c22eb91a6d778', '3041796188', 0),
('monopole@verizon.net', 'Aurelio Pan', '67f27929f28733c265cf9a9ca28e57ea', '8887454788', 0),
('moonlapse@att.net', 'Merrill Duncan', 'c412f9155fd6f49105ae397a27221e1c', '1951825222', 1),
('msherr@att.net', 'Lanell Blan', 'd2dc37da3ad450df48952753e9d9e3f7', '6643517025', 0),
('nighthawk@icloud.com', 'Santos Whelchel', '1ae0edcc05dc5c1b2d1db5f0b082fe52', '6011424045', 0),
('noticias@outlook.com', 'Gil Kelleher', '28e6ab1a608987d01ba1871503b6d34b', '9427601782', 1),
('nweaver@att.net', 'Clinton Whelan', '194e1e9a1f30f2674509de76f709db7b', '1986396946', 0),
('overlord.lae@gmail.com', 'Eric', 'b3abf270ae3af08fed3e5508b8db6a8e', '5765765658', 0),
('ovprit@yahoo.ca', 'Albina Stoner', '42e61b6e760d05c764dddc98ec0a32c7', '4465656342', 0),
('parksh@aol.com', 'Weldon Boozer', '2667d7b511df28a4330dcc355da31d25', '1678107819', 0),
('pfitza@att.net', 'Jeff Eckles', 'ae602e13d470caaaae7753b9b769f53e', '5592916712', 0),
('pfitza@yahoo.ca', 'Hugh Sickels', '522818213e454402b6b4523d046652f1', '4564217663', 0),
('philb@optonline.net', 'Shaun Ottesen', '78013e4d4b9fff933b218d4462b9475b', '2944219607', 1),
('portscan@sbcglobal.net', 'Rod Brizendine', 'bf5f76286a085e99f4deaf906b69fd2b', '4876864091', 0),
('psichel@mac.com', 'Luther Mohney', 'd9dee4583fa93cae4887e438b9ad046e', '9724287045', 1),
('report@gmail.com', 'Gerry Mirelez', '358871dbe32ab8d6ec5cb00b0fc05226', '8956149876', 1),
('rgarton@outlook.com', 'Terrence Bradish', '8bc95aa3ffb686577229abb8556e24af', '6465450429', 1),
('rmcfarla@comcast.net', 'Royal Hara', 'c9438c20e940ffd438b08089b37b71ff', '6608410616', 0),
('rnelson@verizon.net', 'Yvonne Curry', 'ff8ba9ec9cf85f1c85ec769dffbd9395', '9992780247', 0),
('rsteiner@live.com', 'Johanne Stander', '31da636f5acf3d4a23eacb92e60280d0', '3523018353', 0),
('sabren@optonline.net', 'Duane Duet', 'f2684e47063b234350b5d10a9ad4074a', '2071310553', 1),
('sach@gmail.com', 'Sachiel Castillo Huitron', 'c1d1395c534a58662c9b792a26ff08b8', '5778234534', 0),
('saridder@mac.com', 'Noelle Polinsky', '4cf6199d8f258cd5b5913115e5011835', '5337533064', 1),
('seemant@mac.com', 'Ela Manke', '8ad7ae04ef67b21f0b91452c422c48a8', '7527155019', 0),
('skaufman@aol.com', 'Jeffry Jackman', 'f1f0e592ed56ad6337c142d4062bec32', '1727835096', 1),
('smcnabb@comcast.net', 'Yetta Tunnell', '00ee4073440aeca61590ea582a7bdd48', '5092648047', 1),
('specprog@icloud.com', 'Lewis Sly', 'e758665fbb2bcbc7c10612efa30e6ae9', '8588129040', 0),
('stern@aol.com', 'Dion Fisler', '3f9386ecd807c3141c6bacc71d0d9741', '8262112964', 1),
('sthomas@mac.com', 'Natashia Cahoon', 'fbbb285c301381bef8d1ac7a72fd3fd6', '6145478832', 0),
('szymansk@live.com', 'Neal Massman', 'cbcc5d4ba683b4aa61b19f5dbd46e22f', '3003165000', 0),
('szymansk@optonline.net', 'Chet Troxell', '4605210f236b0a407bf36a01476e3405', '8055513379', 0),
('tarreau@comcast.net', 'Demetria Putz', 'a4f541c6d08eba79f17d8c0d874c2f9a', '1818471198', 0),
('tbusch@hotmail.com', 'Homer Lesher', '52463b6e63ac8c6d3545e815f0162be5', '9452004683', 0),
('thaljef@yahoo.com', 'Hosea Mynatt', '54e3ccf655634ada06b1e7fc8631e8d4', '1235600163', 1),
('tmaek@comcast.net', 'Lewis Arora', 'cce949db212e0dd2f660dd2ad8bb7e66', '4412916270', 1),
('uncle@yahoo.ca', 'Venita Mahon', '08ed44a119527b0877ff6c4ffabb1cc1', '9914375375', 1),
('uraeus@outlook.com', 'Sammie Waugh', '25a9e85915e929eebccedccfe4d19802', '6822446033', 0),
('vmalik@icloud.com', 'Chauncey Kuether', '9adabf7a85cf586c4e853176ce0ab95a', '4928253722', 0),
('wortmanj@mac.com', 'Dale Brasil', '3112636f4e9feb3fad81895cea9591f0', '6128118147', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Compra`
--

CREATE TABLE `Compra` (
  `id` int(11) NOT NULL,
  `idCliente` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Compra`
--

INSERT INTO `Compra` (`id`, `idCliente`, `total`, `iva`, `fecha`) VALUES
(1, 'jocelyn@sue.com', 3177.99, 508.479, '2017-09-28'),
(2, 'eulerconther@hotmail.com', 10799, 1727.84, '2017-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `CompraMueble`
--

CREATE TABLE `CompraMueble` (
  `idCompra` int(11) NOT NULL,
  `idOperacion` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CompraMueble`
--

INSERT INTO `CompraMueble` (`idCompra`, `idOperacion`, `precio`, `descuento`) VALUES
(1, 6, 199.99, 0.11),
(1, 7, 300, 0),
(2, 23, 5470, 0.15),
(2, 24, 3000, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `Envio`
--

CREATE TABLE `Envio` (
  `idCompra` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `fechaEnt` date DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantMuebles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Envio`
--

INSERT INTO `Envio` (`idCompra`, `idAlmacen`, `fechaEnt`, `cp`, `dir`, `cantMuebles`) VALUES
(1, 1, NULL, '06900', 'ManuelGzl #82 - b205', 11),
(2, 1, NULL, '57700', 'Calle Mediterraneo #365 - p85', 1),
(2, 2, NULL, '57700', 'Calle Mediterraneo #365 - p85', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `Estado` (
  `estado` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GestionAlmacen`
--

CREATE TABLE `GestionAlmacen` (
  `idEncargado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Lote`
--

CREATE TABLE `Lote` (
  `lote` int(11) NOT NULL,
  `idModelo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaFab` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Lote`
--

INSERT INTO `Lote` (`lote`, `idModelo`, `fechaFab`, `cantidad`) VALUES
(1, 'H-0001', '0000-00-00', 50),
(2, 'H-0002', '0000-00-00', 50),
(5, 'H-0004', '2017-09-29', 20),
(6, 'H-0017', '2017-10-02', 50),
(7, 'H-0016', '2017-10-02', 230),
(8, 'H-0015', '2017-10-02', 400),
(9, 'H-0014', '2017-10-02', 30),
(10, 'H-0003', '2017-10-02', 5),
(11, 'H-0027', '2017-10-02', 200);

-- --------------------------------------------------------

--
-- Table structure for table `Material`
--

CREATE TABLE `Material` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Material`
--

INSERT INTO `Material` (`id`, `nombre`) VALUES
(1, 'Palo de Rosa'),
(2, 'Metal'),
(3, 'Pino'),
(4, 'Cedro'),
(5, 'Piel'),
(6, 'Vidrio'),
(7, 'Metal'),
(8, 'Algodon'),
(9, 'Plastico'),
(10, 'Seda');

-- --------------------------------------------------------

--
-- Table structure for table `MaterialModelo`
--

CREATE TABLE `MaterialModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idMaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MaterialModelo`
--

INSERT INTO `MaterialModelo` (`idModelo`, `idMaterial`) VALUES
('H-0001', 1),
('H-0001', 3),
('H-0002', 2),
('H-0002', 4),
('H-0003', 3),
('H-0004', 4),
('H-0005', 4),
('H-0006', 3),
('H-0007', 5),
('H-0008', 6),
('H-0008', 7),
('H-0009', 1),
('H-0010', 6),
('H-0010', 7),
('H-0011', 3),
('H-0012', 3),
('H-0014', 2),
('H-0014', 3),
('H-0014', 5),
('H-0014', 10),
('H-0015', 2),
('H-0015', 5),
('H-0015', 9),
('H-0015', 10),
('H-0016', 2),
('H-0016', 5),
('H-0016', 8),
('H-0016', 10),
('H-0017', 1),
('H-0017', 8),
('H-0017', 10),
('H-0018', 3),
('H-0018', 10),
('H-0019', 2),
('H-0019', 10),
('H-0020', 2),
('H-0020', 10),
('H-0021', 5),
('H-0021', 10),
('H-0022', 2),
('H-0022', 8),
('H-0022', 10),
('H-0023', 2),
('H-0023', 5),
('H-0024', 2),
('H-0024', 10),
('H-0025', 2),
('H-0025', 5),
('H-0026', 4),
('H-0026', 5),
('H-0026', 10),
('H-0027', 7),
('H-0027', 8),
('H-0027', 10),
('O-0001', 1),
('O-0001', 3),
('O-0002', 2),
('O-0002', 4),
('O-0003', 3),
('O-0004', 4),
('O-0005', 4),
('O-0006', 3),
('O-0006', 4),
('O-0008', 2),
('O-0008', 10),
('O-0009', 1),
('O-0009', 3),
('O-0009', 10),
('O-0010', 2),
('O-0010', 10),
('O-0011', 2),
('O-0011', 10),
('O-0012', 2),
('O-0012', 5),
('O-0013', 4),
('O-0013', 10),
('O-0014', 2),
('O-0014', 3),
('O-0014', 5),
('O-0015', 2),
('O-0015', 4),
('O-0015', 5),
('O-0015', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Modelo`
--

CREATE TABLE `Modelo` (
  `modelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimenAlto` float DEFAULT NULL,
  `dimenAncho` float DEFAULT NULL,
  `dimenProfun` float DEFAULT NULL,
  `descrip` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Modelo`
--

INSERT INTO `Modelo` (`modelo`, `nombre`, `foto`, `dimenAlto`, `dimenAncho`, `dimenProfun`, `descrip`, `precio`, `descuento`, `idEstado`) VALUES
('H-0001', 'poof clasico', 'H-0001.png', 1.2, 1, 1, 'poof clasico', 199.99, 0.11, NULL),
('H-0002', 'Librero Familiar', 'H-0002.png', 1, 2.3, 3, 'librero familiar', 300, 0, NULL),
('H-0003', 'Sofa-Cama', 'H-0003.png', 1, 2.8, 4, 'sofa cama', 2500, 0.25, NULL),
('H-0004', 'Litera', 'H-0004.png', 3, 3, 3.6, 'litera familiar', 3000, 0.5, NULL),
('H-0005', 'Closet cafe', 'H-0005.png', 1.2, 1, 1, 'Closet cafe de 10 puertas', 6250, 0, NULL),
('H-0006', 'Base de cama', 'H-0006.png', 1, 2.3, 3, 'Base de cama tipo box color cafe', 2222, 0, NULL),
('H-0007', 'Sillon individual', 'H-0007.png', 1, 2.8, 4, 'Sillon individual color gris', 1100, 0, NULL),
('H-0008', 'Mesa minimalista', 'H-0008.png', 3, 3, 3.6, 'Mesa minimalista de vidrio y metal', 3000, 0, NULL),
('H-0009', 'Banca blanca', 'H-0009.png', 0.9, 1, 1, 'Banca blanca con patas cafes', 900, 0, NULL),
('H-0010', 'Repisas de vidrio', 'H-0010.png', 1, 2, 2.8, 'Par de repisas de vidrio minimalistas', 10000, 0, NULL),
('H-0011', 'Ropero', 'H-0011.png', 1, 2.3, 4, 'Ropero cafe claro', 700, 0, NULL),
('H-0012', 'Silla de madera gris', 'H-0012.png', 1, 2.3, 4, 'Silla de madera con tela gris', 500, 0, NULL),
('H-0013', 'Buro gris', 'H-0013.png', 3, 4.1, 3, 'tipo moderno', 200, 0, NULL),
('H-0014', 'Sillon acord', 'H-0014.png', 0.9, 0.8, 0.8, 'Sillon acord de piel con patas metálicas importadas', 3000, 0.15, NULL),
('H-0015', 'Sillon bronx', 'H-0015.png', 0.9, 0.8, 0.8, 'Sillon bronx con elegante pata de madera y elegante respaldo capitonado con botón', 4845, 0.15, NULL),
('H-0016', 'Sillon expo', 'H-0016.png', 0.85, 1.15, 0.7, 'Sillon expo de tela curri con pata metálica importada', 5470, 0.15, NULL),
('H-0017', 'Sillon africa', 'H-0017.png', 0.9, 1.11, 0.8, 'Sillon africa mate de tela tipo nate extra duradera', 3595, 0.15, NULL),
('H-0018', 'Sillon retro', 'H-0018.png', 0.84, 1.2, 0.6, 'Sillon retro con tapizado blanco y patas de pino barnizadas', 4530, 0.15, NULL),
('H-0019', 'Sillon danika', 'H-0019.png', 0.8, 1, 0.6, 'Sillon danika tela nata y pata metálica importada', 3250, 0.15, NULL),
('H-0020', 'Sillon keisser', 'H-0020.png', 0.86, 1.45, 0.71, 'Sillon keisser tela nata y pata metálica importada', 4220, 0.15, NULL),
('H-0021', 'Sala esquina africa', 'H-0021.png', 1.23, 1.99, 3, 'Sala esquina africa extensa de tela nate o piel', 11490, 0.15, NULL),
('H-0022', 'Sala esquina  arlette', 'H-0022.png', 1.1, 1.99, 0.94, 'Sala esquina arlette replegable con recubrimeinto de tela y patas metálicas', 11125, 0.15, NULL),
('H-0023', 'Sala esquina Roche', 'H-0023.png', 1.3, 2.4, 2.1, 'Sala esquina Roche con recubrimiento de piel y patas metálicas', 14115, 0.15, NULL),
('H-0024', 'Sala esquina niza', 'H-0024.png', 0.75, 1.95, 2.36, 'Sala esquina niza, estilo moderno con tela nate y patas metálicas', 7800, 0.15, NULL),
('H-0025', 'Sala esquina calgary', 'H-0025.png', 0.8, 2.1, 2.8, 'Sala esquina calgary moderna, con recubrimiento de piel y patas metálicas', 15365, 0.15, NULL),
('H-0026', 'Sala esquina Sidney', 'H-0026.png', 0.8, 2.6, 1.65, 'Sala esquina sidney, con recubrimento de tela curri y patas de cedro importado', 15365, 0.15, NULL),
('H-0027', 'Sillon paris', 'H-0027.png', 1, 0.8, 0.7, 'Sillon paris moderno, con tela acabado mate y patas métalicas', 1200, 0.2, NULL),
('O-0001', 'Silla de oficina', 'O-0001.png', 0.9, 1, 1, 'silla', 1000, 0.15, NULL),
('O-0002', 'Escritorio', 'O-0002.png', 1, 2, 2.8, 'Escritorio', 1200, 0.2, NULL),
('O-0003', 'Buro oficina', 'O-0003.png', 1, 2.3, 4, 'Buro numero 2', 700, 0.6, NULL),
('O-0004', 'Repiza - Rack', 'O-0004.png', 3, 4.1, 3, 'Rack', 1000, 0.75, NULL),
('O-0005', 'Escritorio grande cafe', 'O-0005.png', 0.9, 1, 1, 'Escritorio cafe con blanco grande', 4000, 0, NULL),
('O-0006', 'Archiveros de madera', 'O-0006.png', 1, 2, 2.8, 'Trio de archiveros madera', 2000, 0, NULL),
('O-0007', 'Archiveros de metal', 'O-0007.png', 1, 2.3, 4, 'Trio de archiveros metal diferente tamaño', 1500, 0, NULL),
('O-0008', 'Sillon bazzo', 'O-0008.png', 0.69, 0.78, 0.59, 'Sillon bazzo satinado de tela con pata metálica cromada', 2375, 0.15, NULL),
('O-0009', 'Sillon liberty', 'O-0009.png', 0.7, 1.1, 0.6, 'Sillon liberty de tela nate con pata de madera laqueada', 4845, 0.15, NULL),
('O-0010', 'Sillon nite', 'O-0010.png', 0.75, 0.75, 0.5, 'Sillon nite de tela nate con pata metálica importada', 2080, 0.15, NULL),
('O-0011', 'Sillon niza', 'O-0011.png', 0.75, 0.75, 0.51, 'Sillon niza de tela nate con pata metálica importada', 2080, 0.15, NULL),
('O-0012', 'Sala esquina Arelab', 'O-0012.png', 1.4, 2.52, 1.22, 'Sala esquina Arelab con recubrimeinto de piel y patas metálicas', 7865, 0.15, NULL),
('O-0013', 'Sala esquina eduard', 'O-0013.png', 1.3, 2.35, 2.1, 'Sala esquina eduard recubrimiento de tela curri y con patas de cedro importado', 14115, 0.15, NULL),
('O-0014', 'Sala esquina Jazz', 'O-0014.png', 0.8, 1.9, 2.5, 'Sala esquina Jazz estilo clásico, con recubrimiento de piel y patas de pino', 9980, 0.15, NULL),
('O-0015', 'Sala esquina nite', 'O-0015.png', 0.75, 1.9, 2.35, 'Sala esquina nite con recubirmiento de tela nate satinada y patas mealicas', 7800, 0.15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Rotacion`
--

CREATE TABLE `Rotacion` (
  `operacion` int(11) NOT NULL,
  `idLote` int(11) DEFAULT NULL,
  `idAlmacen` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `motivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entrada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Rotacion`
--

INSERT INTO `Rotacion` (`operacion`, `idLote`, `idAlmacen`, `cantidad`, `fecha`, `motivo`, `entrada`) VALUES
(1, 1, 1, 20, '0000-00-00', 'Llegada de nuevos muebles al almacen', 1),
(2, 1, 1, 1, '0000-00-00', 'Siniestro: Dio un salto cuantico', 0),
(3, 2, 1, 10, '0000-00-00', 'Llegada de nuevos muebles al almacen', 1),
(4, 1, 2, 10, '2017-01-02', 'Llegada de nuevos muebles al almacen', 1),
(5, 1, 1, 2, '2017-01-02', 'Estos saltos cuanticos estan de moda', 0),
(6, 1, 1, 1, '2017-09-28', 'Compra de Muebles', 0),
(7, 2, 1, 10, '2017-09-28', 'Compra de Muebles', 0),
(12, 5, 1, 20, '2017-09-29', 'Llegada de nuevos muebles al almacen', 1),
(13, 6, 4, 25, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(14, 6, 1, 25, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(15, 7, 2, 100, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(16, 7, 5, 130, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(17, 8, 12, 120, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(18, 8, 14, 80, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(19, 8, 10, 200, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(20, 9, 4, 10, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(21, 9, 5, 20, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(22, 10, 7, 5, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(23, 7, 2, 2, '2017-10-02', 'Compra de Muebles', 0),
(24, 5, 1, 1, '2017-10-02', 'Compra de Muebles', 0),
(25, 11, 1, 80, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(26, 11, 6, 20, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1),
(27, 11, 11, 100, '2017-10-02', 'Llegada de nuevos muebles al almacen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Supervisa`
--

CREATE TABLE `Supervisa` (
  `gerente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fechaGestion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UsuarioEmpresa`
--

CREATE TABLE `UsuarioEmpresa` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UsuarioEmpresa`
--

INSERT INTO `UsuarioEmpresa` (`id`, `nombre`, `password`, `tipo`, `telefono`) VALUES
('ACCJ8506178B9', 'José Acosta Canto', 'toñotoño', 'E', '29876234'),
('ACMM8101023G0', 'Mireya Acevedo Manríquez', '12mire81', 'I', '57789089'),
('ACRH730423NP4', 'Horemo Acosta Rodriguez', 'rodriasc3', 'V', '12652487'),
('AGFH8103162H5', 'Hugo Aguilar Flores', 'hugoAgui3', 'V', '57766895'),
('AGFJ6807192D4', 'José Aguilar Fernandez', 'pepeagui78', 'E', '57789908'),
('AGLM8607280P2', 'Marcela Aguilar Loranca', 'marc456rg', 'E', '54467890'),
('AGLO7609195F4', 'Ofelia Aguilar Lemus', 'ofeag782', 'I', '57798765'),
('ALBD7909076F4', 'David Alvarado Barbosa', 'daveal789a', 'V', '57734526'),
('ALGH7909247B4', 'Hugo Alejo Guerrero', 'alehug897n', 'V', '57789034'),
('ALLG7608171G5', 'Genaro Alarcón López', 'loalar76', 'E', '57765439'),
('ALMV9004260J6', 'Veronica Álvarez Martínez', 'asde4gde', 'I', '54432678'),
('ALVS9106089J7', 'Salvador Álvarez Villanueva', 'sldewe536c', 'I', '58094327'),
('AQVG9203269H4', 'Gerardo Aquiles Villaseñor', 'gerry564ve3', 'I', '52345678'),
('ARSP9308296FC', 'Pedro Arroyo Soto', 'soto9308', 'V', '50897645'),
('ASLY90072307U', 'Yolanda Ascencio López', 'yolo983yb4', 'V', '57788765'),
('AYQM9407139J3', 'Mario Ayala Quijano', 'ayala827jb', 'I', '57790356'),
('BACR7706258I7', 'Rubén Baltazar Cedeño', 'balrub374g', 'E', '58923678'),
('BAFA9008072W3', 'Alberto Balderas Flores', 'albert4hd', 'V', '52345214'),
('BAFA9304269O9', 'Alfredo Barrera Flores', 'barreha8dg', 'E', '56897324'),
('BAGF7809120K7', 'Francisco Ballesteros González', 'fran974ge', 'E', '57793456'),
('BAMA8409137Y6', 'Alejandro Bautista Mejía', 'baumej8364g', 'V', '53456723'),
('BARA8907186H5', 'Arturo Banderas Rocha', 'artubeal47eg', 'V', '57723567'),
('BLVN9012257H4', 'Nidia Blanco Velasco', 'blanco87gb', 'I', '57234567'),
('BOSA9211284R7', 'Andrés Bolaños Sánchez', 'andybola8ebe', 'E', '56678945'),
('BRAA9005128H2', 'Ariel Briseño Arias', 'aribri38yh', 'E', '57732456'),
('BUGM9303037G4', 'Monica Bustamante Guerrero', 'busmon8ase', 'E', '57723456'),
('CABA4311135L5', 'Antonio Campos Bonilla', 'campoboni78', 'I', '25617283'),
('CACJ9304287H3', 'Jorge Campos Campos', 'jorgecam09', 'I', '22334567'),
('CACM9002127F3', 'Marco Cárdenas Cornejo', 'marie89hrb', 'V', '23435678'),
('CACV9009098I9', 'Veronica Camacho Cárdenas', 'veronomi9', 'V', '52345267'),
('CAFE9405237H2', 'Erick Cano Figueroa', 'erican36', 'V', '24456789'),
('CAGE8709128G3', 'Ernesto Cárdenas Gómez', 'ernejorg2ed', 'E', '24679809'),
('CAGM8512301G1', 'Mario Castañón Gutiérrez', 'geoi4irgb', 'E', '52345678'),
('CAGO8709238J2', 'Olga Casillas Gutiérrez', 'olga79h4', 'I', '22334512'),
('CAHS9101309J6', 'Sachiel Castillo Huitron', 'sach30', 'C', '59236523'),
('CALD9102237F3', 'Deni Castro López', 'denicas6384h', 'I', '57908234'),
('CALE9012250K2', 'Enrique Castillo López', 'enricast6474', 'I', '57709834'),
('CAMG9209284B3', 'Gonzalo Carrera Molina', 'carre97gh430', 'E', '56890234'),
('CAPE9105269V3', 'Edgar Castañeda Pérez', 'edga683he', 'V', '10098976'),
('CAPP8903235F3', 'Patricia Cadena Palacios', 'paty789jj', 'V', '57723456'),
('CARD7809239C3', 'David Castillo Ruiz', 'david83hmru', 'E', '54367892'),
('CARJ7012241D4', 'Juan Castillo Reyes', 'contrajuan2', 'I', '57783414'),
('CASA8809298C3', 'Antonio Cardona Salazar', 'anton90car', 'V', '24096753'),
('CASD8909284H7', 'Diana Carrera Santiago', 'dian8eugd', 'I', '58987654'),
('CAVD9202279D3', 'Daniela Caballero Valle', 'valle903ub', 'I', '57789087'),
('DEAC540225112', 'Cesar Deras Almodova', 'der8as', 'V', '58902351'),
('DFC19970719H2', 'David FloresT Casanova', 'Linkmar', 'C', '55666193'),
('DIFA040428SV5', 'Antonio Diaz Flores', 'anto98sg3', 'E', '15762390'),
('DOAI7708170P6', 'Irma Dorantes Aguilar', 'ida23d', 'E', '56687908'),
('DUDG6906231D3', 'Gonzalo Duarte Dominguez', 'gdd34', 'E', '57345678'),
('DULM7506261D3', 'Monica Duarte López', 'contramoni26', 'V', '57734567'),
('GAAA8407180J9', 'Alí García Altamirano', 'aligarc563a', 'V', '58897654'),
('GAGA7306086U8', 'Alberto Galindo Guerrero', 'galin98s', 'I', '89356723'),
('GOMB3003113S5', 'Beatriz Gomez Morales', 'gomo563', 'E', '53890324'),
('GORG9908142L8', 'Gabriela Gomez Reyes', 'rey67gab', 'I', '57897543'),
('GUMP7209181S3', 'Paulina Gutierrez Montes', 'pauguti34', 'E', '57742567'),
('HECC6502205H8', 'Celia Hernandez Chairez', 'celis982', 'V', '22331514'),
('HECE770830MU8', 'Euler Hernandez Contreras', 'eulercon', 'C', '22331009'),
('HEDJ681129UT4', 'Jaime Arturo Hernadez Davila', 'dave23ha', 'V', '53467892'),
('HEMH63032513A', 'Humberto Hernandez Morales', 'mohe8uya', 'E', '90546782'),
('JIAS9102288I9', 'Sandra Jiménez Ayala', 'sandra8374j', 'I', '54678902'),
('JILN7405022M7', 'Norma Jiménez López', 'norma0205', 'I', '57734567'),
('LIEA6501297U7', 'Arturo Limones Estevane', 'limoart', 'V', '23564537'),
('LOCF7302155HH', 'Faustino Lopez Canales', 'lopesfas5', 'V', '23451232'),
('LOPP8006241H0', 'Pedro López Placencia', 'pedroOk2', 'V', '57785467'),
('LOTJ6908199S4', 'Jorge Lozano Triana', 'lozaterb', 'V', '46789201'),
('LUAI6010164T3', 'Ivon Luna Aguilar', 'lunaivo098', 'E', '51243576'),
('MACA8302287U5', 'Ana Martínez Castillo', 'anamar73y4', 'E', '22116789'),
('MAMJ6010407LQ6', 'Jesus Genaro Martinez Meza', 'memshao3', 'I', '54367829'),
('MEAF9101308J0', 'Felipe Medellín Álvarez', 'feperfc647', 'I', '57704562'),
('MEAO8912249I8', 'Oscar Mendoza Alvarado', 'osqu56Ias', 'I', '57709843'),
('MEMA400613QW2', 'Antonio Mendoza Martinez', 'mendo8h2', 'I', '55348923'),
('MOPC770108M9A', 'Carlos Morales Perez', 'carl9035a', 'E', '56349812'),
('OEZD970313HDF', 'Daniel Isai Ortega Zuñiga', 'hotomail1', 'C', '5535087941'),
('PARE530110E57', 'Elda Agustina Parra Rodriguez', 'eld62ij', 'V', '32567189'),
('PARG640611L45', 'Gilberto Padilla Rocha', 'gil98dfe', 'E', '57790112'),
('PEAF7908238H6', 'Fredy Pérez Aguilar', 'fredpe5678I', 'E', '57789076'),
('PECJ9101237YH', 'Jorge Pérez Camacho', 'camaper67', 'V', '22331090'),
('PEGA241023IE3', 'Angelina Perez Garcia', 'angepo8hd', 'E', '22443678'),
('PEGE500711M57', 'Estanislao Perales Garay', 'pelare6sh', 'I', '23451278'),
('PLDG7309201G5', 'Gustavo Placencia Duarte', 'tavoOk1', 'I', '57764536'),
('RACV7904279J2', 'Vanessa Ramírez Castillo', 'vanem087h', 'V', '23908765'),
('RAEG570210MQ9', 'Gaspar Ramirez Estrada', 'estrad56', 'E', '12780990'),
('REJG9409166M2', 'Gabriela Reyes Jimenez', 'gabrey94', 'C', '57790345'),
('REPG8309207H5', 'Gustavo Reyes Placencia', 'gus56', 'I', '57890234'),
('REPK8208193F4', 'Karla Reyes Pacheco', 'karla1908', 'V', '57790661'),
('RIHA4003228X3', 'Alberto Rivas Hernandez', 'riva56s', 'C', '90876523'),
('RIMA4003228X3', 'Angel Rivas Martinez', 'rivas78ij', 'I', '22889015'),
('ROAA6411012FA', 'Abel Rodriguez Aguilar', 'abel98d4h', 'E', '57342906'),
('ROAF550717R25', 'Federico Rodriguez Andrade', 'andrase5', 'V', '98346512'),
('RUAC8305092H7', 'Carolina Ruiz Acevedo', 'caro90ruiz', 'E', '57763452'),
('SAAC560304V15', 'Cristobal Ivan Salinas Aranda', 'arabd5363', 'E', '20912453'),
('SAAM9205277C6', 'Manuel Sandoval Arreola', 'manusan84h', 'I', '52896754'),
('SAHE681107IE2', 'Ernesto Sanchez Hernandez', 'ernes673hs', 'V', '17891263'),
('SAHG660806CY9', 'Gloria Sanchez Hernandez', 'glori56', 'V', '55332214'),
('SAMG7112054E7', 'Gustavo Sanchez Murillo', 'gussan43', 'I', '22445578'),
('SEDC781104L82', 'Carlos Alberto Serrano Delgado', 'serradel3', 'E', '56890234'),
('SICL9101189J2', 'Lucia Silva Cárdenas', 'silluc9023d', 'V', '22337834'),
('TOBJ7904262D3', 'Jaime Torres Bodet', 'jaimetorr4', 'I', '57743567'),
('TOCJ700113IC1', 'Javier Torres Campos', 'catoja783', 'V', '44278923'),
('TOSF850108M67', 'Francisco Torres Soriano', 'franto98', 'E', '21378945'),
('VABM8709169I6', 'Miguel Vázquez Bautista', 'vazmih7gev', 'I', '57723456'),
('VIJJ8910284A3', 'Javier Villaseñor Jimenez', 'vijiuie7a', 'E', '54678239'),
('ZAGM671225FP3', 'Martha Zavala Gallo', 'zavamart67', 'E', '10235167');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acabado`
--
ALTER TABLE `Acabado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `AcabadoModelo`
--
ALTER TABLE `AcabadoModelo`
  ADD PRIMARY KEY (`idModelo`,`idAcabado`),
  ADD KEY `idAcabado` (`idAcabado`);

--
-- Indexes for table `Almacen`
--
ALTER TABLE `Almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Asesora`
--
ALTER TABLE `Asesora`
  ADD PRIMARY KEY (`idCliente`,`idAgente`),
  ADD KEY `idAgente` (`idAgente`);

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CategoriaModelo`
--
ALTER TABLE `CategoriaModelo`
  ADD PRIMARY KEY (`idModelo`,`idCat`),
  ADD KEY `idCat` (`idCat`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`correo`);

--
-- Indexes for table `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indexes for table `CompraMueble`
--
ALTER TABLE `CompraMueble`
  ADD PRIMARY KEY (`idCompra`,`idOperacion`),
  ADD KEY `idOperacion` (`idOperacion`);

--
-- Indexes for table `Envio`
--
ALTER TABLE `Envio`
  ADD PRIMARY KEY (`idCompra`,`idAlmacen`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`estado`);

--
-- Indexes for table `GestionAlmacen`
--
ALTER TABLE `GestionAlmacen`
  ADD PRIMARY KEY (`idEncargado`,`idAlmacen`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `Lote`
--
ALTER TABLE `Lote`
  ADD PRIMARY KEY (`lote`),
  ADD KEY `idModelo` (`idModelo`);

--
-- Indexes for table `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MaterialModelo`
--
ALTER TABLE `MaterialModelo`
  ADD PRIMARY KEY (`idModelo`,`idMaterial`),
  ADD KEY `idMaterial` (`idMaterial`);

--
-- Indexes for table `Modelo`
--
ALTER TABLE `Modelo`
  ADD PRIMARY KEY (`modelo`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indexes for table `Rotacion`
--
ALTER TABLE `Rotacion`
  ADD PRIMARY KEY (`operacion`),
  ADD KEY `idLote` (`idLote`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `Supervisa`
--
ALTER TABLE `Supervisa`
  ADD KEY `gerente` (`gerente`),
  ADD KEY `encargado` (`encargado`);

--
-- Indexes for table `UsuarioEmpresa`
--
ALTER TABLE `UsuarioEmpresa`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AcabadoModelo`
--
ALTER TABLE `AcabadoModelo`
  ADD CONSTRAINT `AcabadoModelo_ibfk_1` FOREIGN KEY (`idModelo`) REFERENCES `Modelo` (`modelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AcabadoModelo_ibfk_2` FOREIGN KEY (`idAcabado`) REFERENCES `Acabado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Asesora`
--
ALTER TABLE `Asesora`
  ADD CONSTRAINT `Asesora_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Asesora_ibfk_2` FOREIGN KEY (`idAgente`) REFERENCES `UsuarioEmpresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CategoriaModelo`
--
ALTER TABLE `CategoriaModelo`
  ADD CONSTRAINT `CategoriaModelo_ibfk_1` FOREIGN KEY (`idModelo`) REFERENCES `Modelo` (`modelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CategoriaModelo_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `Categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Compra`
--
ALTER TABLE `Compra`
  ADD CONSTRAINT `Compra_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CompraMueble`
--
ALTER TABLE `CompraMueble`
  ADD CONSTRAINT `CompraMueble_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `Compra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CompraMueble_ibfk_2` FOREIGN KEY (`idOperacion`) REFERENCES `Rotacion` (`operacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Envio`
--
ALTER TABLE `Envio`
  ADD CONSTRAINT `Envio_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `Compra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Envio_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `Almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `GestionAlmacen`
--
ALTER TABLE `GestionAlmacen`
  ADD CONSTRAINT `GestionAlmacen_ibfk_1` FOREIGN KEY (`idEncargado`) REFERENCES `UsuarioEmpresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GestionAlmacen_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `Almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Lote`
--
ALTER TABLE `Lote`
  ADD CONSTRAINT `Lote_ibfk_1` FOREIGN KEY (`idModelo`) REFERENCES `Modelo` (`modelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MaterialModelo`
--
ALTER TABLE `MaterialModelo`
  ADD CONSTRAINT `MaterialModelo_ibfk_1` FOREIGN KEY (`idModelo`) REFERENCES `Modelo` (`modelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MaterialModelo_ibfk_2` FOREIGN KEY (`idMaterial`) REFERENCES `Material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Modelo`
--
ALTER TABLE `Modelo`
  ADD CONSTRAINT `Modelo_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `Estado` (`estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Rotacion`
--
ALTER TABLE `Rotacion`
  ADD CONSTRAINT `Rotacion_ibfk_1` FOREIGN KEY (`idLote`) REFERENCES `Lote` (`lote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Rotacion_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `Almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Supervisa`
--
ALTER TABLE `Supervisa`
  ADD CONSTRAINT `Supervisa_ibfk_1` FOREIGN KEY (`gerente`) REFERENCES `UsuarioEmpresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Supervisa_ibfk_2` FOREIGN KEY (`encargado`) REFERENCES `UsuarioEmpresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
