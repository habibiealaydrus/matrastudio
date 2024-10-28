-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 04:38 AM
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
-- Database: `matrastudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `title_blog` varchar(255) NOT NULL,
  `article_blog` longtext NOT NULL,
  `pic1` varchar(255) DEFAULT NULL,
  `pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_project` varchar(255) NOT NULL,
  `name_client` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `main_pic` varchar(255) NOT NULL,
  `grid_pic` varchar(255) NOT NULL,
  `article` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `designer` varchar(255) DEFAULT NULL,
  `energy_savings` varchar(255) DEFAULT NULL,
  `water_savings` varchar(255) DEFAULT NULL,
  `carbon_reduction` varchar(255) DEFAULT NULL,
  `embodied_energy` varchar(255) DEFAULT NULL,
  `basic_design` varchar(255) DEFAULT NULL,
  `main_contractor` varchar(255) DEFAULT NULL,
  `architecht_build` varchar(255) DEFAULT NULL,
  `architecht` varchar(255) DEFAULT NULL,
  `sustainability_team` longtext DEFAULT NULL,
  `team_arsitektur` longtext DEFAULT NULL,
  `struktur` varchar(255) DEFAULT NULL,
  `mep` varchar(255) DEFAULT NULL,
  `qs` varchar(255) DEFAULT NULL,
  `design_team` longtext DEFAULT NULL,
  `collaborators` longtext DEFAULT NULL,
  `fabrication_team` longtext DEFAULT NULL,
  `publication` varchar(255) DEFAULT NULL,
  `pic1` varchar(255) NOT NULL,
  `name_pic1` varchar(255) DEFAULT NULL,
  `pic2` varchar(255) NOT NULL,
  `name_pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `name_pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `name_pic4` varchar(255) DEFAULT NULL,
  `pic5` varchar(255) DEFAULT NULL,
  `name_pic5` varchar(255) DEFAULT NULL,
  `pic6` varchar(255) DEFAULT NULL,
  `name_pic6` varchar(255) DEFAULT NULL,
  `pic7` varchar(255) DEFAULT NULL,
  `name_pic7` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `type_project`, `name_client`, `project_name`, `main_pic`, `grid_pic`, `article`, `location`, `year`, `status`, `designer`, `energy_savings`, `water_savings`, `carbon_reduction`, `embodied_energy`, `basic_design`, `main_contractor`, `architecht_build`, `architecht`, `sustainability_team`, `team_arsitektur`, `struktur`, `mep`, `qs`, `design_team`, `collaborators`, `fabrication_team`, `publication`, `pic1`, `name_pic1`, `pic2`, `name_pic2`, `pic3`, `name_pic3`, `pic4`, `name_pic4`, `pic5`, `name_pic5`, `pic6`, `name_pic6`, `pic7`, `name_pic7`, `created_at`, `updated_at`) VALUES
(1, 'Installation', 'Jakarta Architecture Festival', 'PLASTI(C)ITY TREE', 'PLASTI(C)ITY TREE main pic.jpg', 'PLASTI(C)ITY TREE grid pic.jpg', '<p><span style=\"color:rgb(35,31,32);\">Plasti(c)ity Tree adalah simbolisasi transisi Jakarta sebagai ibu kota Indonesia sekarang menuju Ibu Kota Nusantara di masa depan. Seperti sebuah pohon yang terus bertumbuh, Jakarta akan terus berkembang dan harus beradaptasi menghadapi tantangan di masa depan. Kemampuan beradaptasi ini, jadi metafora plasticity atau plastisitas, yaitu kemampuan suatu material untuk mengalami perubahan bentuk tanpa mengalami kerusakan.</span></p><p style=\"text-align:justify;\"><span style=\"color:rgb(35,31,32);\">Penerapannya diaplikasikan pada bentuk instalasi yang menyerupai bentuk pohon dengan menggunakan geometri yang dinamis. Instalasi ini berbahan limbah plastik yang didaur ulang sebagai kampanye gerakan ramah lingkungan. Menggunakan 200kg plastik bekas yang didaur ulang menjadi lembaran LDPE, lembaran LDPE ini kemudian dimodeling secara parametrik dan difabrikasi digital menggunakan lasercut. Instalasi terdiri dari 12 komponen yang disambung secara interlocking, membuat semua panel menjadi satu kesatuan yang utuh.</span></p>', 'Jakarta Architecture Festival 2023 Lobby Autograph Tower, Thamrin 9', '2023', 'Completed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><span style=\"color:rgb(35,31,32);\">Rizki Tridamayanti Siregar</span></p><p><span style=\"color:rgb(35,31,32);\">Yasser Hafizs</span></p><p><span style=\"color:rgb(35,31,32);\">Erika Angelina</span></p><p><span style=\"color:rgb(35,31,32);\">Alvioletta Geraldine</span></p>', '<p><span style=\"color:rgb(35,31,32);\"><strong>Universitas Multimedia Nusantara</strong></span></p><p><span style=\"color:rgb(35,31,32);\"><strong>Mortier</strong></span></p><p><span style=\"color:rgb(35,31,32);\"><strong>Yayasan Wings Peduli</strong></span></p>', '<p><span style=\"color:rgb(35,31,32);\">Arsitektur UMN + Lab Fabrikasi UMN</span></p>', '<p><span style=\"color:rgb(35,31,32);\">plasticity.matrastudio.com</span></p>', 'PLASTI(C)ITY TREE pic1.jpg', 'Top View', 'PLASTI(C)ITY TREE pic2.jpg', 'Design Development', 'PLASTI(C)ITY TREE pic3.jpg', 'Before and After Installment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 19:04:26', '2024-10-14 19:04:26'),
(2, 'Sustainability', 'PT. Alien Bangun Nusantara', 'Mesjid Negara IKN', 'Mesjid Negara IKN main pic.png', 'Mesjid Negara IKN grid pic.jpg', '<p>Masjid Negara IKN, as depicted in the image, embodies a harmonious blend of modern architectural design and sustainable green building principles. The mosque\'s fluid, organic structure, characterized by its sweeping curves and dome, integrates seamlessly with the surrounding natural landscape, reflecting a commitment to environmental sustainability. The mosque features extensive green spaces, strategic water elements, and thoughtful use of natural lighting, which reduces the need for artificial energy. Additionally, the tower beside the mosque is designed to evoke a futuristic yet environmentally conscious aesthetic, possibly incorporating renewable energy technologies such as solar panels. The integration of greenery on various levels of the building further enhances its eco-friendliness, providing natural cooling, promoting biodiversity, and creating a serene atmosphere for worshippers. Overall, Masjid Negara IKN stands as a symbol of sustainability, representing the future of eco-conscious religious architecture in the heart of the new capital city.</p>', 'Ibukota Nusantara', '2024', 'BGH Utama-On Going', NULL, NULL, NULL, NULL, NULL, 'I Nyoman Nuarta', 'KSO Adhi & Hutama Karya', NULL, NULL, '<p><span style=\"color:rgb(35,31,32);\">Rizki Tridamayanti Siregar</span></p><p><span style=\"color:rgb(35,31,32);\">Yasser Hafizs</span></p><p><span style=\"color:rgb(35,31,32);\">Jonathan Alvar</span></p><p><span style=\"color:rgb(35,31,32);\">Riezki Fernanda</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mesjid Negara IKN pic1.png', 'Ground View', 'Mesjid Negara IKN pic2.png', 'Radiation Envelope', 'Mesjid Negara IKN pic3.png', 'Light Simulation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 19:15:18', '2024-10-14 19:15:18'),
(4, 'Architecture', 'Pemerintah Kota Tangerang Selatan', 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN', 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN main pic.jpg', 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN grid pic.jpg', '<p>Terinspirasi dari Blandongan, ruang depan pada rumah masyarakat Betawi Ora Tangerang Selatan yang merupakan tempat menerima tamu dan berkumpul. Bundaran Maruga dengan lokasinya yang strategis di pintu gerbang pusat pemerintahan kota Tangerang Selatan, mengangkat tema “Blandongan Kota” yang merupakan ruang publik penerima kota, tempat masyarakat bertemu, berinteraksi dengan alam serta mengenal budaya dan kesenian kota Tangerang Selatan.&nbsp;</p><p style=\"text-align:justify;\">“Blandongan Kota” terdiri dari kumpulan program penunjang aktivitas masyarakat kota yang dihubungkan dengan skybridge yang ramah terhadap pejalan kaki dan pesepeda. Selain berfungsi sebagai jembatan penyeberangan pedestrian, alur sirkulasi skybridge yang mengalir menstimulasi pengguna untuk mengeksplorasi titik-titik program aktivitas didalamnya, dengan menghadirkan pemandangan sudut kota yang berbeda disepanjang jalur sirkulasi.</p>', 'Serua, Kecamatan Ciputat, Kota Tangerang Selatan, Banten', '2022', 'Pemenang 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><span style=\"color:rgb(35,31,32);\">Rizki Tridamayanti Siregar</span></p><p><span style=\"color:rgb(35,31,32);\">Yasser Hafizs</span></p><p><span style=\"color:rgb(35,31,32);\">Sy. Hafizh Fariansyah</span></p><p><span style=\"color:rgb(35,31,32);\">M. Zulkifli</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN pic1.jpg', 'Aerial View', 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN pic2.jpg', 'Aerial View 2', 'SAYEMBARA DESAIN KAWASAN BUNDARAN MARUGA TANGERANG SELATAN pic3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 19:28:24', '2024-10-14 19:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pic_event` varchar(255) NOT NULL,
  `thumbnail_event` varchar(255) NOT NULL,
  `title_event` varchar(255) NOT NULL,
  `article_event` longtext NOT NULL,
  `location_event` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_gender` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_inquiry` varchar(255) NOT NULL,
  `phone` double NOT NULL,
  `post_code` double NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `type_project` varchar(255) NOT NULL,
  `subject_inquiry` varchar(255) NOT NULL,
  `message_inquiry` varchar(255) NOT NULL,
  `project_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(236, '2014_10_12_000000_create_users_table', 1),
(237, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(238, '2019_08_19_000000_create_failed_jobs_table', 1),
(239, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(240, '2024_08_14_070941_create_features_table', 1),
(241, '2024_08_14_071136_create_clients_table', 1),
(242, '2024_08_14_072956_create_socialmedia_table', 1),
(243, '2024_08_14_073515_create_messages_table', 1),
(244, '2024_08_20_023147_create_news_table', 1),
(245, '2024_08_20_075156_create_blogs_table', 1),
(246, '2024_08_21_015559_create_events_table', 1),
(247, '2024_08_21_075030_create_pesans_table', 1),
(248, '2024_08_22_025208_create_inquiries_table', 1),
(249, '2024_09_04_102641_create_projectclients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_pic` varchar(255) NOT NULL,
  `headline_news` varchar(255) NOT NULL,
  `article_news` longtext NOT NULL,
  `logo_news` varchar(255) NOT NULL,
  `link_berita` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectclients`
--

CREATE TABLE `projectclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectclient_name` varchar(255) NOT NULL,
  `projectclient_img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_socialmedia` varchar(255) NOT NULL,
  `image_socialmedia` varchar(255) NOT NULL,
  `link_socialmedia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@matrastudio.com', NULL, '$2y$10$f8Y/rJ8rtVf7wkpdNdCRL.5ei1abSotLrxrO/IScWkVM/C9nbq1qu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectclients`
--
ALTER TABLE `projectclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectclients`
--
ALTER TABLE `projectclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
