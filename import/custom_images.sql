-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_images`
--

 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_images`
--

INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(1, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/UnajncghMTZyNHfWjdchJYK5U7H7UWq8mSw2gh7t.jpg', NULL, '014f2711890559526a09e5a90b2ed0a9', NULL, 2, '2024-10-28 11:55:52', '2024-10-28 11:55:52');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(2, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/5aKJphKU4BthWGGO1U8sKqkAgKURF9ZI3Mna2zeS.jpg', 'chocolate cake', '1a9064a9d50863fd722401b02cdf8de1', NULL, 2, '2024-10-28 12:08:23', '2024-10-29 07:28:47');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(3, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/A70Rb9mW29e63lPYH54Gt6eODaxkSI9XnMJIGxbz.jpg', 'vanilla cake', 'b4296a84f8428e05d4d04d07710b536f', NULL, 2, '2024-10-28 12:10:43', '2024-10-29 06:50:06');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(4, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/Gec9hI70BlkvbjDg6KSUipy7lwCSgqfdqwAg2y0E.webp', 'chocolate cake', '852a44c1040c815720cb175cf1267e6f', NULL, 2, '2024-10-28 16:58:49', '2024-10-28 16:58:49');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(5, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/XuS6dBUzzPk1eCQW0fe5QnauUZJ9Uu6t4jyQa6Ah.webp', 'vanilla cake', '254cb76640738e298203188d554aacaa', NULL, 2, '2024-10-28 17:00:13', '2024-10-28 17:00:13');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(6, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/jGCVDfD0uImBfK0ySNEMIBo4ak5714TemVXGtcM0.jpg', 'a 2 layer very nice wedding cake', '716a541b92ce3e611ec5db096eed1e6e', NULL, 2, '2024-10-28 17:01:07', '2024-10-28 17:01:07');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(7, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/OmRvFcfDhC7tHpMsHu2C4LAWTZDAzEspVSGRJq8Y.webp', 'a 2 layer very nice wedding cake', 'cb7980c551f9022ae628825f6e8f1d42', NULL, 2, '2024-10-28 17:01:18', '2024-10-28 17:01:18');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(8, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/gI7nQzQPebQoAgTVH5aDshc3bd6tpHOTFIIkDsAl.webp', 'chocolate cake', '183b45dd19e92af0ed4ff19cd6dd024c', NULL, 2, '2024-10-28 17:17:22', '2024-10-28 17:17:22');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(9, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/iMpH4IFUNljD73AsMdKdpuRlWSYjSPugIBUkCHHR.jpg', 'a delicious strawberry cake', '2b42cf21ed466251e46234c6017c9614', NULL, 2, '2024-10-28 17:41:26', '2024-10-28 17:41:26');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(10, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/pJveF2DCaTJXORfZAdZrDMLB3GaooTKNrk7NZDio.webp', 'a delicious strawberry cake', '60844db4afa20d46e53cb352b2ce16ce', NULL, 2, '2024-10-28 17:42:03', '2024-10-28 17:42:03');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(11, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/WC2ZaMsll4XSxlRVP65TtnLP3SMt3lQI1hXiy8w6.webp', 'chocolate cake', '57f17d0e4df1e05e618efd89c4bedf34', NULL, 2, '2024-10-28 17:46:33', '2024-10-28 17:46:33');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(12, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/tINxrVLqnVRDXebdTvbz6cAsOPkuS1tmkdlorBFo.webp', 'chocolate cake', '19eb010aba84cc6cf857a0d596983be4', NULL, 2, '2024-10-28 17:49:05', '2024-10-28 17:49:05');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(13, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/LbAgVSKnDAkFXQsjRfofKyTOLsngDUVKcqOkG5NE.webp', 'chocolate cake', 'e9ee692a5b106a36f42b5e385bed4369', NULL, 2, '2024-10-28 17:52:15', '2024-10-28 17:52:15');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(14, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/1JDig32Cdvn2PHtJsw2friKQlBdLzDvezyl4UN9o.jpg', 'mocha cake', 'ad117a5949c47fba155442eaa64d1cf1', NULL, 2, '2024-10-28 17:54:56', '2024-10-28 17:54:56');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(15, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/m85Jo0Xp2zW6YnpSPAr7hsYJvCjLhA6jbmnu8w0j.webp', 'mocha cake', 'a48b710a6cba4840427c4e393e66caec', NULL, 2, '2024-10-28 17:55:10', '2024-10-28 17:55:10');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(16, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/keWTucyrTr8KKfHkD40AU6CpK2gtSgnJEH1KK9j6.jpg', 'banana cake', '20cdade8b49c135c70b0d46da458727c', NULL, 2, '2024-10-28 18:30:34', '2024-10-28 18:30:34');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(17, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/04inGoqh0FcjJBpKbOGA8UgQJpzsNFM77ynEIGch.webp', 'banana cake', '349a00ed074276600eb9858d815702ed', NULL, 2, '2024-10-28 18:44:25', '2024-10-28 18:44:25');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(18, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/bECWySwAjOpy6gqZIbX3kHhQcr8ZTW6tg3NNsyTH.webp', 'banana cake', '12bcdee2d5fca9dda4c6a9804eaf3d7c', NULL, 2, '2024-10-28 18:48:03', '2024-10-28 18:48:03');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(19, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/7ZB42j7VTY4uR2wdrUFpOGVXSVkHyuznkp1PkaT4.jpg', 'one last good cake for the day', '992b68339570a64e1386ed16239ffc83', NULL, 2, '2024-10-28 18:52:18', '2024-10-28 18:52:18');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(20, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/F9WrEBdNh4hFjWzR57cEtbiNjmVNZ0RvhV8h9KOi.webp', 'one last good cake for the day', '52d4879a7ac69e1e16d9560856c2f3ea', NULL, 2, '2024-10-28 18:53:40', '2024-10-28 18:53:40');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(21, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/8FjqeNFN8Ei9RU0jVjbnH1gIOEopBJrArAkUPC84.webp', 'chocolate cake', '966598a9787a5b0b05a72db9c8dd7365', NULL, 2, '2024-10-29 04:50:53', '2024-10-29 04:50:54');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(22, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/nKiamsRg7noWMhavo6TgN149YXakiGfkRZajYFzu.webp', 'vanilla cake', '150ee1cce5d8610d85ef700492b4d5b7', NULL, 2, '2024-10-29 06:08:18', '2024-10-29 06:08:19');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(23, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/Sz6r68dvgLOPD5IZf96d8VuvC3f4EtjZO6EhdIHT.webp', 'vanilla cake', '549a004c42d4bd954895b2f193dcbf3b', NULL, 2, '2024-10-29 06:12:50', '2024-10-29 06:12:52');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(24, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/DAD5OkZvMwefKGJXigEMfoqU7uwcaapJgLjiX2jN.webp', 'chocolate cake', '142cf0dd4b68f6eea2da3bf99f3b5ab3', NULL, 2, '2024-10-29 07:30:04', '2024-10-29 07:30:04');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(25, 'ai_generated', 'pollinations.ai', 'public/images/ai_generated/1EOOKYcF0SkRglEGSwSuUPE00TWyYBEDgYgwueM3.jpg', 'one last check cake', '2f76d69ed87d707887c0fca614f929ff', NULL, 2, '2024-10-29 07:35:30', '2024-10-29 07:35:30');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(26, 'ai_generated', 'AI_Horde', 'public/images/ai_generated/kdRFmGsey8KFXkSSYacMLuFcUMuURuRjPqzqDHNR.webp', 'one last check cake', '34c641b38f1b07cacda76c5f9b3f722b', NULL, 2, '2024-10-29 07:35:43', '2024-10-29 07:35:49');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(27, 'additional', NULL, 'public/images/additional/HOzP3MDLhKLvaY08DENVXxTiv2Tj1f2qj9DUJeT5.png', NULL, NULL, 5, 2, '2024-10-29 13:06:20', '2024-10-29 13:06:20');
INSERT INTO `custom_images` (`id`, `type`, `ai_name`, `path`, `prompt`, `hash`, `custom_order_id`, `user_id`, `created_at`, `updated_at`) VALUES(28, 'additional', NULL, 'public/images/additional/jcjl3pp44mSfJyCN81F8cHljtEcSU3wAdD9CIzjX.png', NULL, NULL, 5, 2, '2024-10-29 13:06:20', '2024-10-29 13:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_images`
--
ALTER TABLE `custom_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_images_hash_unique` (`hash`),
  ADD KEY `custom_images_custom_order_id_foreign` (`custom_order_id`),
  ADD KEY `custom_images_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_images`
--
ALTER TABLE `custom_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custom_images`
--
ALTER TABLE `custom_images`
  ADD CONSTRAINT `custom_images_custom_order_id_foreign` FOREIGN KEY (`custom_order_id`) REFERENCES `custom_orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `custom_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
