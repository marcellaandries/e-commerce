-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 06:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province_id` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `priority` tinyint(1) NOT NULL DEFAULT 0,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city_id`, `city`, `province_id`, `province`, `country`, `zipcode`, `priority`, `label`, `created_at`, `updated_at`) VALUES
(1, 6, 'Marcella Andries', '', '081288125588', 'marcella@gmail.com', 'Bukit Gading Villa No. 88, Kelapa Gading', NULL, '153', 'Kota Jakarta Selatan', '6', 'DKI Jakarta', 'Indonesia', '14250', 1, 'Home', '2023-07-31 04:42:23', '2023-07-31 04:42:23'),
(2, 6, 'Marcella Chou', '', '081281322538', NULL, 'Pluit Avenue No. 11, Pluit Utara', NULL, '155', 'Kota Jakarta Utara', '6', 'DKI Jakarta', 'Indonesia', '18750', 0, 'Office', '2023-07-31 08:42:23', '2023-07-31 08:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'similique aut', 'similique-aut', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(2, 'eius omnis', 'eius-omnis', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(3, 'quo repudiandae', 'quo-repudiandae', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(4, 'laudantium et', 'laudantium-et', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(5, 'suscipit doloremque', 'suscipit-doloremque', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(6, 'quae temporibus', 'quae-temporibus', '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(8, 'Flagship Notebook', 'flagship-notebook', '2023-07-19 20:40:56', '2023-07-20 10:10:39'),
(13, 'Flagship HP', 'flagship-hp', '2023-07-21 02:59:18', '2023-07-21 03:07:55');

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
(8, '2023_07_14_035131_create_products_table', 2),
(9, '2014_10_12_000000_create_users_table', 3),
(10, '2014_10_12_100000_create_password_resets_table', 3),
(11, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(12, '2019_08_19_000000_create_failed_jobs_table', 3),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(14, '2023_07_13_063344_create_sessions_table', 3),
(15, '2023_07_14_034018_create_categories_table', 3),
(16, '2023_07_14_072652_create_products_table', 4),
(17, '2023_07_21_164804_create_orders_table', 5),
(18, '2023_07_21_164919_create_order_items_table', 5),
(19, '2023_07_21_164939_create_shippings_table', 5),
(20, '2023_07_21_165004_create_transactions_table', 6),
(21, '2023_08_01_162038_create_profiles_table', 7),
(22, '2023_08_01_163619_create_addresses_table', 8),
(23, '2023_08_01_165925_create_addresses_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(25) NOT NULL,
  `discount` int(25) NOT NULL DEFAULT 0,
  `tax` int(25) NOT NULL,
  `total` int(25) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `courier` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `shipping_cost` int(25) NOT NULL,
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `courier`, `service`, `shipping_cost`, `is_shipping_different`, `created_at`, `updated_at`) VALUES
(1, 6, 6240000, 0, 0, 6310000, 'MARCELLA', 'ANDRIES', '08128811225588', 'marcella@gmail.com', 'BUKIT GADING VILLA NO. 88', 'PAGAR EMAS', 'Kota Jakarta Selatan', 'DKI Jakarta', 'Indonesia', '14250', 'ordered', 'jne', 'CTC', 70000, 0, '2023-07-31 04:42:23', '2023-07-31 04:42:23'),
(2, 6, 8850000, 0, 0, 8958000, 'MARCELLA', 'ANDRIES', '081298982948', 'cella@gm.com', 'BUKIT GADING INDAH 88', 'PAGAR EMAS', 'Kota Serang', 'Banten', 'Indonesia', '16350', 'ordered', 'jne', 'REG', 108000, 0, '2023-08-01 02:01:58', '2023-08-01 02:01:58'),
(3, 6, 1620000, 0, 0, 1690000, 'Marcella Andries', NULL, '081209849383', 'marcella@gmail.com', 'BGV 88', NULL, 'Kabupaten Bangka Barat', 'Bangka Belitung', 'Indonesia', '14330', 'ordered', 'jne', 'REG', 70000, 0, '2023-08-01 04:38:31', '2023-08-01 04:38:31'),
(4, 6, 9880000, 0, 0, 10440000, 'Marcella Andries Chou', NULL, '081289849839', 'marcella11@gmail.com', 'KEBAYORAN 88', NULL, 'Kabupaten Buleleng', 'Bali', 'Indonesia', '11305', 'ordered', 'jne', 'REG', 560000, 0, '2023-08-01 06:11:55', '2023-08-01 06:11:55'),
(5, 6, 6560000, 0, 0, 6651000, 'Marcella Andries', NULL, '0812865889922', 'marcella@gmail.com', 'VILLA 88', NULL, 'Kabupaten Serang', 'Banten', 'Indonesia', '11383', 'ordered', 'jne', 'OKE', 91000, 0, '2023-08-01 07:00:26', '2023-08-01 07:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'doloremque nemo tempora quo', 1620000, 2, '2023-07-31 04:42:23', '2023-07-31 04:42:23'),
(2, 2, 1, 'omnis animi repellendus error', 3000000, 1, '2023-07-31 04:42:23', '2023-07-31 04:42:23'),
(3, 2, 2, 'omnis animi repellendus error', 3000000, 1, '2023-08-01 02:01:58', '2023-08-01 02:01:58'),
(4, 22, 2, 'exercitationem corrupti fuga quisquam', 1950000, 3, '2023-08-01 02:01:58', '2023-08-01 02:01:58'),
(5, 1, 3, 'doloremque nemo tempora quo', 1620000, 1, '2023-08-01 04:38:31', '2023-08-01 04:38:31'),
(6, 1, 4, 'doloremque nemo tempora quo', 1620000, 3, '2023-08-01 06:11:55', '2023-08-01 06:11:55'),
(7, 9, 4, 'eveniet corporis ut facere', 2510000, 2, '2023-08-01 06:11:55', '2023-08-01 06:11:55'),
(8, 5, 5, 'aut consequatur qui aliquam', 1780000, 2, '2023-08-01 07:00:26', '2023-08-01 07:00:26'),
(9, 2, 5, 'omnis animi repellendus error', 3000000, 1, '2023-08-01 07:00:26', '2023-08-01 07:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `regular_price` int(25) NOT NULL,
  `sale_price` int(25) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `weight` int(25) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `weight`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'doloremque nemo tempora quo', 'doloremque-nemo-tempora-quo', 'Neque itaque dolorum est occaecati commodi tempora. A quis assumenda architecto ut molestias nam. Nesciunt unde ea magnam itaque eligendi quo veritatis.', 'Ut et omnis numquam optio explicabo repudiandae iusto. Porro ut et est eius eveniet. Non ipsam explicabo esse. Et ut odio ipsam quos dolorem. Ab consequatur in reiciendis quibusdam quo quibusdam amet. Illum asperiores illum perferendis distinctio laboriosam. Ipsa inventore voluptatem totam voluptas porro amet. Itaque quia rerum perspiciatis debitis velit iste. Accusamus ut impedit vel necessitatibus et.', 1620000, NULL, 'DIGI375', 'instock', 0, 158, 'digital_2.jpg', NULL, 2000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(2, 'omnis animi repellendus error', 'omnis-animi-repellendus-error', 'Numquam qui distinctio minima odit et vel voluptatem iure. Omnis tenetur asperiores iure exercitationem.', 'Itaque est nihil consequatur fugit. Alias excepturi optio inventore qui minima perferendis. Repudiandae occaecati facilis eum commodi. Similique aliquam esse et qui. Fugit dolores eius molestiae. Tenetur aut saepe dolorum sunt error nam ut. Odio excepturi nisi iste provident magnam harum similique. Neque dolorum omnis et doloremque doloremque. Voluptatum provident magni repellat aut dolores eveniet quo.', 3000000, NULL, 'DIGI272', 'instock', 0, 127, 'digital_3.jpg', NULL, 3000, 4, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(3, 'aperiam eos quam non', 'aperiam-eos-quam-non', 'Consequuntur dicta beatae aperiam. Placeat quia delectus enim reprehenderit sit. Ad non qui et et.', 'Aut est molestias illum et aut sit velit doloremque. Quis ut quia similique sed cupiditate et esse. Qui veniam velit voluptates. Itaque corporis laboriosam fuga voluptatibus fugit. Sit reprehenderit dolorem quia nobis consequuntur iusto repellendus. Asperiores nesciunt rem ad aut aut molestiae accusamus.', 940000, NULL, 'DIGI133', 'instock', 0, 180, 'digital_10.jpg', NULL, 5000, 4, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(4, 'dolores quod repellendus expedita', 'dolores-quod-repellendus-expedita', 'Dolor sed repellat pariatur dicta quia autem. Qui aut aliquid quae. Autem iusto tempora eum nemo error porro architecto. Aliquam at et assumenda.', 'Saepe molestiae inventore similique quis et est qui. Quis distinctio id nesciunt eum qui esse fugit autem. Ea nostrum suscipit molestias nihil tenetur sit. Reiciendis consequuntur laudantium voluptas vero itaque autem. Dolores rerum sint inventore a. Consequatur esse qui aut. Rerum in numquam voluptatem.', 140000, NULL, 'DIGI457', 'instock', 0, 119, 'digital_21.jpg', NULL, 7000, 1, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(5, 'aut consequatur qui aliquam', 'aut-consequatur-qui-aliquam', 'Voluptatem similique maiores qui inventore dolores dolore. Reprehenderit dolores id ad et nesciunt consequatur voluptatem consequatur. Veritatis non molestias quidem aliquid maiores.', 'Non excepturi sequi nesciunt officiis itaque. Aut qui dolor aspernatur rerum animi. Reiciendis maiores et quis aut sit aut. Unde nemo doloribus voluptas inventore et sunt adipisci iure. Doloribus et sequi ipsam provident et. Occaecati ut suscipit est in. Quia ex blanditiis quae quia sit quas.', 1780000, NULL, 'DIGI146', 'instock', 0, 150, 'digital_16.jpg', NULL, 2000, 3, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(6, 'ut porro soluta voluptas', 'ut-porro-soluta-voluptas', 'Odit esse et non cumque numquam. Sint quis ducimus modi. Ea aperiam voluptatem dolore doloremque omnis.', 'Perferendis tempora minus illo minima ab voluptatum. Distinctio possimus eligendi eum id ipsum vel. Voluptatem neque et quod sed. Iste nihil eveniet enim numquam. Et facere magnam rem. Dolores sit quis et quam quis aliquam iusto. Eveniet quasi porro adipisci sapiente consectetur nulla. Et iure numquam enim ut expedita minima sed temporibus. Sint in et ut neque sunt sit. Corrupti explicabo ut iusto quasi a.', 4150000, NULL, 'DIGI293', 'instock', 0, 182, 'digital_13.jpg', NULL, 5000, 2, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(7, 'quo ut et id', 'quo-ut-et-id', 'Ullam nobis et optio explicabo omnis. Ut quibusdam rerum et itaque explicabo quia. Dicta expedita ducimus debitis blanditiis maxime.', 'Consequuntur voluptas deleniti velit ea autem et. Nulla aliquid voluptatum voluptatem iusto quia occaecati dolores. Consequatur quia ea quis libero. Nihil sint tempora aliquam sed expedita. A recusandae sit nulla sapiente exercitationem natus eveniet molestiae. Nesciunt sequi commodi nisi quo voluptas error reprehenderit. Eos fugiat possimus et nihil quisquam molestiae fuga.', 560000, NULL, 'DIGI475', 'instock', 0, 126, 'digital_8.jpg', NULL, 2000, 4, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(8, 'est cumque qui voluptas', 'est-cumque-qui-voluptas', 'Cum ipsa sed cum corrupti perferendis hic maxime. Amet illum voluptatem inventore magni. Voluptates est officia odit at laudantium debitis numquam. Sit velit distinctio tenetur et.', 'Ad commodi fugit eius blanditiis. Earum molestias expedita ut doloribus modi enim quo. Qui libero reprehenderit laboriosam tenetur. Pariatur eveniet maxime porro molestiae enim odit cum enim. Et corrupti porro ipsam asperiores consectetur iure aperiam. Impedit maiores ut molestiae quia et qui pariatur. Autem quia et et est. Repellat rerum dolores perferendis at. Amet facilis et praesentium est.', 4740000, NULL, 'DIGI364', 'instock', 0, 194, 'digital_17.jpg', NULL, 1000, 2, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(9, 'eveniet corporis ut facere', 'eveniet-corporis-ut-facere', 'Dolores veniam adipisci sit error dolores. Consequuntur voluptates corporis quia iste ullam sed ut. Praesentium deserunt quibusdam id voluptatibus sit quam. Aut tempore quo sit doloremque amet.', 'Deleniti eveniet doloremque odit dicta qui aut et. Modi voluptatem occaecati quae totam eaque autem. Doloremque aut illum eum tempora. At odio atque libero. Nulla totam cupiditate unde qui. Nihil et et corrupti minima aspernatur delectus numquam. Ullam similique aut qui aspernatur quidem. Repellat aut incidunt quasi qui quibusdam ullam. Sint tenetur vitae fuga rem id suscipit.', 2510000, NULL, 'DIGI418', 'instock', 0, 186, 'digital_6.jpg', NULL, 4000, 2, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(10, 'deserunt nihil culpa tenetur', 'deserunt-nihil-culpa-tenetur', 'Ullam consequatur rerum magni rem praesentium voluptas ut. Sed qui aliquam distinctio mollitia adipisci. Perferendis repellat possimus sit quia et ea sit.', 'Vitae dolores eveniet non aut. Ut alias quos quis ipsa quaerat. Repellat unde dolor esse. Optio non voluptatem consectetur eum beatae accusamus excepturi aut. Non illum placeat quia numquam. Rerum fugiat eos molestiae fugiat accusantium et veritatis. Id nobis ut magnam dolores. Nihil officia non et rem non ut id. A tempore autem quidem repellendus quia quibusdam accusamus. Magni distinctio aut dignissimos aut praesentium. Illo qui inventore molestias numquam omnis similique soluta.', 1530000, NULL, 'DIGI294', 'instock', 0, 116, 'digital_7.jpg', NULL, 2000, 1, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(11, 'et omnis totam natus', 'et-omnis-totam-natus', 'Sit suscipit qui ut et eveniet laboriosam. Est quia et eaque repellendus. Vero tempore sed rem soluta. Ea et aspernatur magnam qui maiores et amet. Rerum autem quia modi molestias.', 'Eos nobis voluptas aliquid non soluta. Consectetur voluptas mollitia qui quia blanditiis beatae. Voluptatum ea consequatur cumque id. Non assumenda et hic quidem ad modi. Sunt suscipit aliquid debitis sint. Magni est nesciunt sit nisi eos error. Omnis culpa voluptates ipsa eum. Nemo veritatis eius dolores dolorem nesciunt qui.', 4090000, NULL, 'DIGI468', 'instock', 0, 127, 'digital_4.jpg', NULL, 2000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(12, 'tempore ea officia sit', 'tempore-ea-officia-sit', 'Numquam nam consequuntur et culpa magnam autem rerum. Sapiente beatae neque laudantium quod similique. Esse repellendus voluptas quo ipsa.', 'Maxime voluptatem aut et sapiente qui ducimus. Quibusdam ipsum qui animi fugiat. Qui deleniti maiores illum minima quo quia accusamus. Architecto eius unde iure libero delectus. Quia magnam ipsum hic debitis. Sit magni eius praesentium magnam repellendus. Dolor eum ipsam iure ut quam vitae. Sunt ea delectus eligendi vitae sed quia optio iure.', 2170000, NULL, 'DIGI350', 'instock', 0, 165, 'digital_5.jpg', NULL, 2000, 3, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(13, 'voluptas minima earum officia', 'voluptas-minima-earum-officia', 'Accusantium voluptatum vero eaque qui est delectus deserunt. Est et unde nihil ipsam sed. Eos sunt temporibus qui est consequatur dicta dolores. Sunt earum vero consequuntur laboriosam.', 'Id facere repellat labore. Enim reprehenderit debitis sed magnam explicabo. Quam libero et inventore ad commodi neque nemo nihil. Iusto qui modi sed cupiditate eaque temporibus. Reprehenderit reprehenderit quaerat consequatur dolor ab aut laudantium. Necessitatibus est quasi quo in et. Delectus at vel facere ex dignissimos.', 1030000, NULL, 'DIGI291', 'instock', 0, 174, 'digital_11.jpg', NULL, 5000, 4, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(14, 'voluptas aut voluptas dolorum', 'voluptas-aut-voluptas-dolorum', 'Aliquam molestiae nam odio eaque consectetur. Vitae quos mollitia facilis neque amet repellat molestiae.', 'Animi quia nemo laborum. Rerum in esse repellat ipsa eos et accusamus. Et repellat minima illo ullam. Suscipit voluptas sequi qui fugit dolores. Nesciunt sapiente iusto necessitatibus in. Ut rem aspernatur sed est quis ipsam suscipit. Voluptatem sed dolorem et officia provident. Est sequi asperiores consequatur earum quis vitae dolorem quod. Aliquam beatae delectus iste aut beatae. Inventore beatae excepturi possimus ullam.', 1450000, NULL, 'DIGI148', 'instock', 0, 154, 'digital_9.jpg', NULL, 2000, 1, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(15, 'asperiores tempore culpa corporis', 'asperiores-tempore-culpa-corporis', 'Ut qui cumque magni omnis iure enim. Fugit animi deserunt asperiores. Repellendus ut eius ut nulla ex magni. Dolore dicta consequatur nostrum perspiciatis. Quisquam dolor magnam rem non neque.', 'Quaerat quae occaecati necessitatibus vel. Nemo est facere ab totam aut veniam. Omnis beatae odit quod hic corporis ut qui. Modi quae voluptatem perspiciatis est qui odit. Voluptatum commodi et dolorem modi tempore. Blanditiis labore quae velit veniam. Asperiores rerum tempore hic nisi nostrum qui. Accusamus at placeat odio molestiae.', 3480000, NULL, 'DIGI173', 'instock', 0, 122, 'digital_12.jpg', NULL, 2000, 1, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(16, 'modi magnam quis sunt', 'modi-magnam-quis-sunt', 'Et nam quia quis cumque. Totam asperiores cum dolores iste odit. Provident voluptates maxime consequatur beatae eligendi sed animi soluta.', 'Soluta harum officiis quia non. Qui quidem recusandae necessitatibus maiores dolorem id sed. Omnis magni dolor temporibus sint dolores. Et unde nesciunt dicta blanditiis quia. Tempore nihil eius vitae ratione. Et velit voluptate minima ea omnis quos. Beatae et voluptatibus labore inventore molestias est aliquam voluptatem. Delectus nemo officiis excepturi ratione minus. Veritatis voluptatibus aut ipsam qui dolores. Voluptas omnis ad minus ratione consequatur voluptatem culpa.', 4910000, NULL, 'DIGI301', 'instock', 0, 178, 'digital_14.jpg', NULL, 1000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(17, 'quis ducimus praesentium qui', 'quis-ducimus-praesentium-qui', 'Omnis aliquam sit molestias voluptates sit. Et qui sed rerum ratione vitae sed. Distinctio incidunt suscipit incidunt sapiente iusto.', 'Omnis nostrum dolorem qui ullam ad eum delectus. Voluptatem architecto maiores porro tenetur doloremque. Velit veritatis reiciendis ab error porro veritatis ab. Perspiciatis nisi ut iste non aut at. Dolor sunt quia sit magni quia vel maiores. Accusamus minus voluptatem exercitationem sit officia numquam. Porro vel ut et sint. Quia sint tenetur doloribus voluptatem ipsam autem.', 1740000, NULL, 'DIGI395', 'instock', 0, 153, 'digital_15.jpg', NULL, 3000, 3, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(18, 'suscipit aut sint quisquam', 'suscipit-aut-sint-quisquam', 'Aut pariatur minus non architecto. Quod accusamus ea ab tempora in. Autem delectus labore quisquam laboriosam omnis modi. Omnis voluptas deleniti libero dignissimos tenetur corrupti et.', 'Occaecati perspiciatis temporibus sapiente repellendus quia. Dolore rerum esse velit corporis qui. Qui non ratione ducimus corporis praesentium nulla modi. Nostrum aut ullam nisi maiores. Reiciendis ut quia fuga laboriosam. Commodi neque porro aut fugiat quasi numquam facilis. Recusandae nisi quam consequatur. Animi rem delectus facilis porro autem quod id assumenda. Est ipsa aut non error deleniti est rerum. Beatae impedit explicabo laboriosam sed quo architecto. Quae nobis est ab voluptatem.', 4950000, NULL, 'DIGI487', 'instock', 0, 171, 'digital_19.jpg', NULL, 4000, 3, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(19, 'dignissimos incidunt atque voluptatum', 'dignissimos-incidunt-atque-voluptatum', 'Ex exercitationem fugiat ducimus itaque occaecati omnis quia facere. Id ut aut sapiente rerum nostrum ratione. Ex dolorem facere repellat excepturi dolorem et.', 'Veritatis delectus voluptatum et voluptatem illum ut. Voluptate sed harum culpa enim corporis veritatis enim. Ea nihil non quasi deleniti. Ratione a libero tempore nihil. Officiis nam occaecati illum doloremque atque. Cum in libero placeat ab tempore sit accusamus. Voluptas in consectetur pariatur et nisi tempore. Blanditiis quas aut laboriosam rem deserunt placeat.', 4980000, NULL, 'DIGI416', 'instock', 0, 179, 'digital_22.jpg', NULL, 6000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(20, 'totam repellat rerum ipsa', 'totam-repellat-rerum-ipsa', 'Sit non ea molestias. Sequi ipsum assumenda ut dolor quaerat fuga voluptatibus id. Alias odit aspernatur quod et quo ad.', 'Delectus autem earum consequatur deserunt molestias ullam earum. Quos deleniti unde aliquid et. Quia quasi reprehenderit pariatur fugiat ut labore. Voluptatem suscipit veniam sunt voluptatem deserunt quia. Repellendus delectus praesentium dolores enim ut. Accusantium dignissimos a voluptas iusto. Ratione voluptate in iste similique. Illo eum aut sunt et ut consequatur facere sint.', 1020000, NULL, 'DIGI157', 'instock', 0, 188, 'digital_1.jpg', NULL, 7000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(21, 'sunt omnis laboriosam est', 'sunt-omnis-laboriosam-est', 'Aspernatur omnis earum repellat quia. Rerum autem eveniet in sed aut eos. Alias qui sequi nobis eveniet. A quod unde quas dolorem.', 'Aut dolore explicabo harum ullam. Assumenda omnis ea qui aut quasi aspernatur aut. Voluptatem aut delectus id commodi quos. Atque dicta dolores quos sit. Et voluptatem non at. Eos id rerum ad provident ut. Exercitationem inventore adipisci labore. Cumque doloribus quisquam amet. Et perspiciatis saepe quibusdam deserunt illo rerum.', 810000, NULL, 'DIGI179', 'instock', 0, 171, 'digital_20.jpg', NULL, 3000, 5, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(22, 'exercitationem corrupti fuga quisquam', 'exercitationem-corrupti-fuga-quisquam', 'Similique deserunt mollitia assumenda. Sunt nostrum accusantium ut quasi molestias voluptatem.', 'Cum quibusdam dolore corporis perferendis non. Quia culpa quis sed exercitationem possimus nisi quia facere. Perspiciatis tenetur consequatur eum eum consequatur. Libero unde ex tempora tempore nobis. Magnam voluptas a quasi et et minima voluptatem. Et omnis laudantium voluptatibus quibusdam tempore dolorem. Itaque rerum commodi unde atque id nisi unde velit. Ut inventore modi eaque est qui alias autem earum.', 1950000, NULL, 'DIGI289', 'instock', 0, 170, 'digital_18.jpg', NULL, 2000, 3, '2023-07-14 03:02:34', '2023-07-14 03:02:34'),
(27, 'prod 1 a', 'prod-1-a', 'this is short', 'this is desc', 4000000, NULL, '20230721.00001', 'instock', 0, 10, '1689908946.jpg', NULL, 3000, 13, '2023-07-21 03:09:06', '2023-07-23 13:35:49'),
(28, 'prod 2', 'prod-2', 'short 2', 'desc 2', 5000000, NULL, '20230721.00008', 'instock', 0, 2, '1689922842.jpg', NULL, 5000, 13, '2023-07-21 03:43:28', '2023-07-21 08:17:47'),
(32, 'prod 3', 'prod-3', 'short 3a', 'desc 3a', 7000000, NULL, '20230721.00003a', 'outofstock', 1, 1000, '1689928072.jpg', NULL, 2000, 13, '2023-07-21 08:25:45', '2023-07-21 08:27:52'),
(33, 'prod 4', 'prod-4', 'short', 'desc', 1000000, NULL, '20230723.00004', 'instock', 0, 10, '1690119255.jpg', NULL, 8000, 8, '2023-07-23 13:34:15', '2023-07-23 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `line1` varchar(255) DEFAULT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PVXCJc2V81y20i1lkGwxSDEvUPGyJ4lXlrqewxlL', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMEF4N3ZvRHB1cUNPR0ZzZFZNMHRRYVd2Szl1cnkyS3EyTVozMXZsUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZGRyZXNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjU6InV0eXBlIjtzOjM6IlVTUiI7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6Mjp7czozMjoiNWNhZjE5ODBkMGYzMDUwMzRhYzk3ZDEzYTY4ZTNjNjQiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiI1Y2FmMTk4MGQwZjMwNTAzNGFjOTdkMTNhNjhlM2M2NCI7czoyOiJpZCI7aToxO3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjI3OiJkb2xvcmVtcXVlIG5lbW8gdGVtcG9yYSBxdW8iO3M6NToicHJpY2UiO2Q6MTYyMDAwMDtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YToxOntzOjY6IndlaWdodCI7aToyMDAwO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MDtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO31zOjMyOiJkODkwZDM1YzUwODZkOWFkMjllNjQ3ZTYzZTczYTY2ZSI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6ImQ4OTBkMzVjNTA4NmQ5YWQyOWU2NDdlNjNlNzNhNjZlIjtzOjI6ImlkIjtpOjU7czozOiJxdHkiO2k6MjtzOjQ6Im5hbWUiO3M6Mjc6ImF1dCBjb25zZXF1YXR1ciBxdWkgYWxpcXVhbSI7czo1OiJwcmljZSI7ZDoxNzgwMDAwO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6Njoid2VpZ2h0IjtpOjIwMDA7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aTowO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjg6ImNoZWNrb3V0IjthOjE6e3M6Njoid2VpZ2h0IjtpOjYwMDA7fX0=', 1691038476),
('Srlzv2WBGONHw9JS9umMTTLp6VTLrKGVd9cMxX1m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWY1cE00a05UMXhGTDVrSzdZOFJCTnlvS1doZEhiYXRtUG5aUldpbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaXR5LzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1691038039);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('bank','card') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'bank', 'pending', '2023-07-31 04:42:23', '2023-07-31 04:42:23'),
(2, 6, 2, 'bank', 'pending', '2023-08-01 02:01:58', '2023-08-01 02:01:58'),
(3, 6, 3, 'bank', 'pending', '2023-08-01 04:38:31', '2023-08-01 04:38:31'),
(4, 6, 4, 'bank', 'pending', '2023-08-01 06:11:55', '2023-08-01 06:11:55'),
(5, 6, 5, 'bank', 'pending', '2023-08-01 07:00:26', '2023-08-01 07:00:26');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Cella Admin', 'admin@gmail.com', NULL, '$2y$10$oM7IHV51q.omfTyHUDDKx.bwSjAE0S98uh3FJZnK0auecr3yCaAG.', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2023-07-14 00:40:34', '2023-07-14 00:40:34'),
(2, 'Marcella Andries', 'user@gmail.com', NULL, '$2y$10$oh8JA5ibVrumKGJ97JMN1.yrXI.x8pImQ5eX.rGLHOxxT8gquVJGK', NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2023-07-14 00:41:48', '2023-07-14 00:41:48'),
(5, 'fani', 'fani@gmail.com', NULL, '$2y$10$Rj2aEy3TKcP5W.6XWwvTsu5p47hzqNkC.Je3k99gNt.2Yc/kPCGLO', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2023-07-21 08:07:47', '2023-07-21 08:07:47'),
(6, 'Marcella Andries', 'marcella@gmail.com', NULL, '$2y$10$Bq4K1V2QwDp4yiWs5QqFoOc9akrlK4z.xpl9SFz/EcCqPEHmTayRm', NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2023-07-23 11:20:01', '2023-07-23 11:20:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
