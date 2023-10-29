-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 07:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `disc` varchar(500) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 4,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `due` date NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`) VALUES
(1, 'mss@gmail.com', 'Asur@123', 'Asur', 'Raj'),
(2, 'Omi@gmail.com', 'Aku@123', 'Omkar', 'Akkubattin'),
(3, 'Demo@gmail.com', 'Dem@123', 'Demo', 'Check'),
(35, 'akubattino11@gmail.com', '$2y$10$soXIcFtotut/fai0JEnEeOssKYcMUcMHIlE0a1pl3QA9m.xePm92G', 'OMKAR', 'AKUBATTIN');

-- --------------------------------------------------------

--
-- Table structure for table `web_info`
--

CREATE TABLE `web_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `disc` varchar(250) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_info`
--

INSERT INTO `web_info` (`id`, `name`, `disc`, `img`) VALUES
(1, 'Planner', '', 0x52494646c608000057454250565038580a00000008000000d80000d800005650382040080000d02f009d012ad900d9003e954a9e482322a1937a7c84340944f1b770b948736d6ed1cf9f8cfe6d8fa71df9c7f46f920f519fa57fe4fab1f4b3ffc9e887f977fa9f580f4fffe47d403f6bfaddbd003a583f743f6e7da375447ce5da0f933d652512e18ec5e5590f764caab19a9793fa293a89489c8888888888888888888888888888608c679792b651f2bbf10c20e80ccc2a1ffcfa40928a14834088886083780b55a4e86f8e6cc2e2b6b9f42cc56c819a58e14719174a6b9ef4fe7958a0aa6ee464b06c0f7501e10754578cfe3d45122e44e42cdd87a27f26eb6972c456e00fdbbe151c5a06599c3fafaa7f6ccddf34d3b5d26a0a241b38bc570b459685d9450329059e73be0ddf997283426e14d8c4114fa8b2aae53e1c56246a48c27978ca7289b9547de4ceef3ff57ac85c5ea0d51c86a9469fb89c9e2ceb0edf348289256c72e8eab33386874df1e2326e9ad840eef9ddcf9d9e60251b55db49530e400c5f447fdf0c93a05d5e924d61be4b4dae768974da97698926b3333333333333333333333333300000feff05c8000001de6e0949e5f20b8e7cb4fc1678228a312cab6763420ed6ac1b4d6ea21d79fe817e36c05c1d28aacb183a9e5e41d294b77e7d7d75483fd308a2b42409f71af607af04a703a7bc7733f01a272770fbb2a80c959e0423dca738939f50adb84de3d60e3c5a1f999aa75645323c167b66f029da1d81acff6879cc333561db93895d5840dfc042bfb4a61c0639f5bf09d6c30042d8245f911faf4970f3889ec2e98ad3d4c116bd3274fea6979bffdadd7016317a96dd27b69c319d04974815480e5f14b162da3f26aedee32eb9944ae75578e0ae057595c6a0724e4ba54d2a3d9ca2fafd9d6b6fdfa58305bb596dd1b841a95a5aa1ffcda2f1406f930000eb756afc20d7f66d1bd527f86555a0f0116f638cb5b88e061b0460488aba7372066714efcf7f9de86259dd42e7588e728925051cda010853e5b79971f1620f8cc1d3ef4733e02b617cd9dedc88dc970d707d323b060d61ed9d2c8abbcf1d28af19c2ace4832a5e40b39ea9e0fd6cad89d9cbc219f7cc3d8092648bb1c355ee989239ecdeb31df23196165c21eea4ab5f89d4798df8093b94f4bdbca088b4a23ef5bbcdd6f4fbd94ca96b9c5840b570d024bff0e0cd481560909b744a2a3dc0c04f17fa7df4059a083e3246ae6c5cdeafc783a90e05f5f2c961616d3fe857efd6fd2310abffb208bfceba0ca64ed0ad1eef72a607ebfe7868429248e297580a13cd40446c43ff6185185dab529a72a8442c9a6c2c3875b5619930dd1f0e10be4d805f0fdd6637ad39fa4f39e732acc26cc51378e8b9547d1d67f0905a8e089731748825eedf8e1b0d83ab4bac3b0ad552f4db1fc934838e70b4e6faa01037ed79fd3f7ffc9193f85ae41c1dfd163f0b9048c3b365fd423e3a239dfd5a7851105d5f5ef68d016ff935cc0e8dbf53db913b71575b2ef197eb713e65083b1192a64cc82c77d490e03a3f66e87e0b9dbd6bfb084b461b4a2bb89b9f86cd75136f26c2cac70196554a01a4ff6743dc884a8156644dd10ad05184796ba55b4cc215e0adf13b87eba11d13c45a6700acbbd4a77d97830a16aa5e12eddd6fef905e5d9b5bd0275181f02dbc4f316650c11418755f376d2c53e30e647128e772e39b541258123ad8acff8b822a3b503e8c0fbfb1ce56fb838ef08d854408154749eb6b86147e0059a4de21cff162695961c0512b39555e4ff062d7ab5b594f5fc2b409046df61a3edc4801b628c65b08680b7e1067adc2931a2456d7023b25029aa6f0928c3f17fcfee24cda6e76b7b8e088de627bcca0512fbe7862ef12e84c9c8c8fa5b94e52b452bfc8acf0bda6df2e9448ec5e5a5b783546e1571ef33ae8d45c08c7882938047706195ef18b3016c06780b714127691bbb3ab367ec0512012b8a1c51647c93e5f3bb63d523eb0933f7bfe99fb81441478960cb297fd231e9876eec54141c1cdbf0e3a4358a7469a249e75db3b737e5a4e63477e9ebd3bd4f84f4338d2ab2faf48e05e4638b4b7c87ae4ebc473957e27ea7181ef0e3922acf0ddc2430ef9b63ed02c43c8bce1de0f10e7a1f8ff49c40de4255e07b56b4991fee1d98a79116088a9262d40259ce63fac356c4b238393f66db6d09c40b0fd6669d1f45d4f7449ebe2115e1fb514fee9937aa0ad29399a2887e75ef6474c9d75f3b4bf2597bba952ac54a11dc63fb513d11684995370da0a8159ca1bcfc5df0d2700d89642abc56c14b1a0808e4e0c33bfc90fc9bdd809ee29da863661d872416eeae2135b46f827d791bbee634be853abe370dba4326ef9371c0b407f266357ca5f0ae560a633a33aaf3047dff7529bbf566eb05ef0cfb0cdedc9089a6e00cf4fe8e0c53fd36ad98886c6b2b33f8b98dccea7170bc8fc7e48589440ceb17a7f4972565bca057b8c004788c133f8ade2c2ca55aa3c340bc8dc2a9ad66a07b74610663bea1f942a087ab050ca53230cf0451cce4a6f514b067dcabe349276375be33d3a4a30a525222d5fb2a8da18fedfef4c17c9f7becfeb9afa1d1b4842060875e1e37b6a10bab425e275b775bb6a2d9f345f2a7729d01136348f086f5b0c2e01499d2e8cfb87b93ffa72bbde568344162bc3e806ebbcfc6a980ea2fd8629265c5038a0f9bd7a184617d27fbd7debdf78a175604aa39d9deba64b1a31060fd5cd6435222a85a4d50b57f58bf5cb112265b7c52b45598ebc23ee578b6b2c574842aba2c66c6f102212fe6a995fd2e18258d4659e1f35cf7cbc22882e2736b871d1f900fc8ddd262642c5ee334732363ca5b0bd033a7f3ef88b91db5e64a01150850836ed36cc38612ac6c232356b3fbe377e54ec093a001e7fac78a943fc7ed18828866b1bb80e3cc5ce55caf19dc81798782c53a1a2e6e065e68630b426f555d5e462a2de82c8cf69703774413acdedd2b2b36600000000000000455849465f00000049492a0008000000010069870400010000001a00000000000000010086920700320000002c000000000000004153434949000000312e37322e362d32334c2d544336554a4a324b49414653465441514f495551483551364d4d2e302e322d3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `web_info`
--
ALTER TABLE `web_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `web_info`
--
ALTER TABLE `web_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
