-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 02 déc. 2023 à 07:56
-- Version du serveur : 10.5.22-MariaDB-cll-lve
-- Version de PHP : 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c2225573c_softlogis`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `numero_bon_commande` varchar(255) DEFAULT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `marque_uuid` varchar(255) DEFAULT NULL,
  `categorie_uuid` varchar(255) DEFAULT NULL,
  `model_uuid` varchar(255) DEFAULT NULL,
  `famille_uuid` varchar(255) DEFAULT NULL,
  `source_uuid` varchar(255) DEFAULT NULL,
  `entrepot_uuid` varchar(255) DEFAULT NULL,
  `status` enum('enFabrication','sortiUsine','enExpedition','arriverAuPod','stocked','expEnCours','delivered') NOT NULL DEFAULT 'enFabrication',
  `packaging` enum('roro','container') DEFAULT NULL,
  `poid_tonne` int(11) DEFAULT NULL,
  `hauteur` int(11) DEFAULT NULL,
  `largeur` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  `price_unitaire` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `uuid`, `code`, `numero_bon_commande`, `numero_serie`, `description`, `image`, `marque_uuid`, `categorie_uuid`, `model_uuid`, `famille_uuid`, `source_uuid`, `entrepot_uuid`, `status`, `packaging`, `poid_tonne`, `hauteur`, `largeur`, `volume`, `longueur`, `price_unitaire`, `etat`, `created_at`, `updated_at`) VALUES
(1, '1b067d5c-90d9-11ee-b9d1-0242ac120002', 'Article-00010', 'M3BLV00', 'M7800690', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'delivered', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(2, '1b067fe6-90d9-11ee-b9d1-0242ac120002', 'Article-00011', 'M3BLW00', 'M7800691', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'stocked', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(3, '1b0680f4-90d9-11ee-b9d1-0242ac120002', 'Article-00012', 'N/A', 'CNN23SED0208', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'delivered', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(4, '1b0681f8-90d9-11ee-b9d1-0242ac120002', 'Article-00013', 'N/D', 'CNN23SED0209', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'stocked', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(5, '1b0682fc-90d9-11ee-b9d1-0242ac120002', 'Article-00014', '1001241366', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'stocked', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(6, '1b068482-90d9-11ee-b9d1-0242ac120002', 'Article-00015', 'VGMXV', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(7, '1b0687ac-90d9-11ee-b9d1-0242ac120002', 'Article-00016', 'VGMZH', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'stocked', 'roro', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(8, '1b0688a6-90d9-11ee-b9d1-0242ac120002', 'Article-00017', 'VGMZJ', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(9, '1b06898c-90d9-11ee-b9d1-0242ac120002', 'Article-00018', 'VGMZF', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(10, '1b068a86-90d9-11ee-b9d1-0242ac120002', 'Article-00019', 'VGMZG', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(11, '1b068b76-90d9-11ee-b9d1-0242ac120002', 'Article-00020', 'VGLQL', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(12, '1b068c5c-90d9-11ee-b9d1-0242ac120002', 'Article-00021', 'VGLCR', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(13, '1b068d42-90d9-11ee-b9d1-0242ac120002', 'Article-00022', 'VGLDB', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(14, '1b068e32-90d9-11ee-b9d1-0242ac120002', 'Article-00023', 'VGLDC', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(15, '1b06935a-90d9-11ee-b9d1-0242ac120002', 'Article-00024', 'VGLCS', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(16, '1b069472-90d9-11ee-b9d1-0242ac120002', 'Article-00025', 'VGLCT', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(17, '1b0695a8-90d9-11ee-b9d1-0242ac120002', 'Article-00026', 'VGKZG', 'GTY01871', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(18, '1b06968e-90d9-11ee-b9d1-0242ac120002', 'Article-00027', 'VGKZH', 'GTY01872', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(19, '1b069774-90d9-11ee-b9d1-0242ac120002', 'Article-00028', 'VGKZK', 'LX905250', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(20, '1b06985a-90d9-11ee-b9d1-0242ac120002', 'Article-00029', 'VGKYY', 'LX905249', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(21, '1b069940-90d9-11ee-b9d1-0242ac120002', 'Article-00030', 'VGKZQ', 'LX905247', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(22, '1b069a26-90d9-11ee-b9d1-0242ac120002', 'Article-00031', 'VGKTB', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(23, '1b069fd0-90d9-11ee-b9d1-0242ac120002', 'Article-00032', 'VGKTC', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(24, '1b06a0ca-90d9-11ee-b9d1-0242ac120002', 'Article-00033', 'VGKTK', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(25, '1b06a1ba-90d9-11ee-b9d1-0242ac120002', 'Article-00034', 'VGKLZ', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(26, '1b06a2a0-90d9-11ee-b9d1-0242ac120002', 'Article-00035', 'VGKTW', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(27, '1b06a39a-90d9-11ee-b9d1-0242ac120002', 'Article-00036', 'VGKTD', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(28, '1b06a4a8-90d9-11ee-b9d1-0242ac120002', 'Article-00037', 'VGKTF', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(29, '1b06a598-90d9-11ee-b9d1-0242ac120002', 'Article-00038', 'VGKTX', 'N/A', NULL, NULL, NULL, NULL, 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'cd27aa6b-cd59-4a51-aee0-fac31eb9ee4d', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(30, '1b06a9e4-90d9-11ee-b9d1-0242ac120002', 'Article-00039', 'VGKTG', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e2', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e2', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(31, '1b06aaf2-90d9-11ee-b9d1-0242ac120002', 'Article-00040', 'VGKTH', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e3', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e3', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(32, '1b06acd2-90d9-11ee-b9d1-0242ac120002', 'Article-00041', 'VGKTJ', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e4', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e4', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(33, '1b06ade0-90d9-11ee-b9d1-0242ac120002', 'Article-00042', 'VGKSY', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e5', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e5', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(34, '1b06aee4-90d9-11ee-b9d1-0242ac120002', 'Article-00043', 'VGKSZ', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e6', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e6', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(35, '1b06affc-90d9-11ee-b9d1-0242ac120002', 'Article-00044', 'VGKPX', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e7', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e7', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(36, '1b06b128-90d9-11ee-b9d1-0242ac120002', 'Article-00045', 'VGKNV', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e8', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e8', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(37, '1b06b24a-90d9-11ee-b9d1-0242ac120002', 'Article-00046', 'VGKNW', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e9', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e9', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(38, '1b06b830-90d9-11ee-b9d1-0242ac120002', 'Article-00047', 'VGKNX', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e10', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e10', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(39, '1b06b984-90d9-11ee-b9d1-0242ac120002', 'Article-00048', 'VGKPT', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e11', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e11', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(40, 'ce01ec6c-90d8-11ee-b9d1-0242ac120002', 'Article-00049', 'VGKPC', 'GBY16365', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e12', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e12', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(41, 'ce01ee38-90d8-11ee-b9d1-0242ac120002', 'Article-00050', 'VGKPD', 'GBY16368', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e13', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e13', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(42, 'ce01f0c2-90d8-11ee-b9d1-0242ac120002', 'Article-00051', 'VGKPF', 'GBY16367', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e14', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e14', NULL, 'delivered', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(43, 'ce01f2fc-90d8-11ee-b9d1-0242ac120002', 'Article-00052', 'VGKPG', 'GBY16366', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e15', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e15', NULL, 'delivered', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(44, 'ce01f888-90d8-11ee-b9d1-0242ac120002', 'Article-00053', 'VGKPH', 'GBY16363', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e16', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e16', NULL, 'delivered', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(45, 'ce01fc52-90d8-11ee-b9d1-0242ac120002', 'Article-00054', 'VGKPJ', 'GBY16364', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e17', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e17', NULL, 'delivered', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(46, 'ce02cc5e-90d8-11ee-b9d1-0242ac120002', 'Article-00055', 'VGKPL', 'GBY16369', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e18', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e18', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(47, 'ce02d0b4-90d8-11ee-b9d1-0242ac120002', 'Article-00056', 'VGKPM', 'GBY16371', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e19', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e19', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(48, 'ce02d3de-90d8-11ee-b9d1-0242ac120002', 'Article-00057', 'VGKPN', 'GBY16372', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e20', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e20', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(49, 'ce02d53c-90d8-11ee-b9d1-0242ac120002', 'Article-00058', 'VGKPP', 'GBY16370', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e21', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e21', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(50, 'ce02d9b0-90d8-11ee-b9d1-0242ac120002', 'Article-00059', 'VGKPQ', 'GBY16373', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e22', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e22', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(51, 'ce02dc76-90d8-11ee-b9d1-0242ac120002', 'Article-00060', 'VGKLX', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e23', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e23', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(52, 'ce02dda2-90d8-11ee-b9d1-0242ac120002', 'Article-00061', 'VGKQC', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e24', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e24', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(53, 'ce02dec4-90d8-11ee-b9d1-0242ac120002', 'Article-00062', 'VGKNP', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e25', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e25', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(54, 'ce02dfdc-90d8-11ee-b9d1-0242ac120002', 'Article-00063', 'VGKQN', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e26', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e26', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(55, 'ce02e3c4-90d8-11ee-b9d1-0242ac120002', 'Article-00064', 'VGKQP', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e27', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e27', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(56, 'ce02e522-90d8-11ee-b9d1-0242ac120002', 'Article-00065', 'VGKMS', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e28', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e28', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(57, 'ce02e64e-90d8-11ee-b9d1-0242ac120002', 'Article-00066', 'VGKMT', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e29', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e29', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(58, 'ce02e7f2-90d8-11ee-b9d1-0242ac120002', 'Article-00067', 'VGKPR', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e30', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e30', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(59, 'ce02e928-90d8-11ee-b9d1-0242ac120002', 'Article-00068', 'VGKNR', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e31', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e31', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(60, 'ce02ec7a-90d8-11ee-b9d1-0242ac120002', 'Article-00069', 'VGKNS', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e32', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e32', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(61, 'ce02edce-90d8-11ee-b9d1-0242ac120002', 'Article-00070', 'VGKPY', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e33', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e33', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(62, 'ce02eef0-90d8-11ee-b9d1-0242ac120002', 'Article-00071', 'VGKLY', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e34', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e34', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(63, 'ce02f01c-90d8-11ee-b9d1-0242ac120002', 'Article-00072', 'VGKPZ', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e35', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e35', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(64, 'ce02f120-90d8-11ee-b9d1-0242ac120002', 'Article-00073', 'VGKQD', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e36', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e36', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(65, 'ce02f274-90d8-11ee-b9d1-0242ac120002', 'Article-00074', 'VGKQF', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e37', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e37', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(66, 'ce02f67a-90d8-11ee-b9d1-0242ac120002', 'Article-00075', 'VGKQG', 'N/A', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e38', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e38', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(67, 'ce02f896-90d8-11ee-b9d1-0242ac120002', 'Article-00076', 'VGKDV', 'GB800646', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e39', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e39', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(68, '09affa20-90dd-11ee-b9d1-0242ac120002', 'Article-00077', '1001918924', 'MAN00000T01113441', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e40', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e40', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(69, '09affd7c-90dd-11ee-b9d1-0242ac120002', 'Article-00078', '1001917520', 'TEP0840PC01107442', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e41', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e41', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(70, '09afff5c-90dd-11ee-b9d1-0242ac120002', 'Article-00079', '1001917522', 'TEP0840PE01107447', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e42', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e42', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(71, '09b000ec-90dd-11ee-b9d1-0242ac120002', 'Article-00080', 'H4QRZ', 'S9R01794', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e43', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e43', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(72, '09b007e0-90dd-11ee-b9d1-0242ac120002', 'Article-00081', 'L2HMR', 'S9R02107', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e44', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e44', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(73, '09b00970-90dd-11ee-b9d1-0242ac120002', 'Article-00082', 'L8NHQ', 'S8Z00357', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e45', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e45', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(74, '09b00a9c-90dd-11ee-b9d1-0242ac120002', 'Article-00083', 'M0FPK', 'S8Z00358', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e46', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e46', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(75, '09b00bdc-90dd-11ee-b9d1-0242ac120002', 'Article-00084', 'M0FPL', 'S8Z00359', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e47', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e47', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(76, '09b00cfe-90dd-11ee-b9d1-0242ac120002', 'Article-00085', 'M1NWP', '3D303538', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e48', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e48', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(77, '09b00e2a-90dd-11ee-b9d1-0242ac120002', 'Article-00086', 'M1NZP', 'SL705409', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e49', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e49', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(78, '09b00f42-90dd-11ee-b9d1-0242ac120002', 'Article-00087', 'M1PMK', 'S9R02229', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e50', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e50', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(79, '09b01064-90dd-11ee-b9d1-0242ac120002', 'Article-00088', 'M1RGD', '3D303621', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e51', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e51', NULL, 'arriverAuPod', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(80, '09b014ce-90dd-11ee-b9d1-0242ac120002', 'Article-00089', 'M1RGF', '3D303622', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e52', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e52', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(81, '09b01604-90dd-11ee-b9d1-0242ac120002', 'Article-00090', 'M1RGN', ' SL705414', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e53', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e53', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(82, '09b0173a-90dd-11ee-b9d1-0242ac120002', 'Article-00091', 'M1RGP', 'SL705415', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e54', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e54', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(83, '09b0185c-90dd-11ee-b9d1-0242ac120002', 'Article-00092', 'M1RKK', 'S9R02238', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e55', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e55', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(84, '09b01ad2-90dd-11ee-b9d1-0242ac120002', 'Article-00093', 'M4GBG', 'CH900566', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e56', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e56', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(85, '09b01c26-90dd-11ee-b9d1-0242ac120002', 'Article-00094', 'M3RSZ00', 'MS200308', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e57', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e57', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(86, '09b01d52-90dd-11ee-b9d1-0242ac120002', 'Article-00095', 'M3RTB00', 'MS200309', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e58', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e58', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(87, '09b01e6a-90dd-11ee-b9d1-0242ac120002', 'Article-00096', 'M3RTC00', 'MS200311', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e59', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e59', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(88, '09b02234-90dd-11ee-b9d1-0242ac120002', 'Article-00097', 'M3RTF00', 'B7L00829', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e60', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e60', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(89, '09b02360-90dd-11ee-b9d1-0242ac120002', 'Article-00098', 'M3RTG00', 'B7L00828', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e61', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e61', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(90, '09b0246e-90dd-11ee-b9d1-0242ac120002', 'Article-00099', 'M5MWG00', 'M5K07521', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e62', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e62', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(91, '09b02586-90dd-11ee-b9d1-0242ac120002', 'Article-00100', '1001793435', 'MAN00000V00897231', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e63', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e63', NULL, 'expEnCours', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(92, '09b0268a-90dd-11ee-b9d1-0242ac120002', 'Article-00101', '1001790540', 'MAN00000P00897224', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e64', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e64', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(93, '09b0278e-90dd-11ee-b9d1-0242ac120002', 'Article-00102', '1001790467', 'MAN00000J00897226', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e65', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e65', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(94, '09b028a6-90dd-11ee-b9d1-0242ac120002', 'Article-00103', '1001790469', 'MAN00000K00897225', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e66', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e66', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(95, '09b02c2a-90dd-11ee-b9d1-0242ac120002', 'Article-00104', '1001790503', 'MAN00000A00897215', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e67', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e67', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(96, '09b02d4c-90dd-11ee-b9d1-0242ac120002', 'Article-00105', '1001790504', 'MAN00000V00897214', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e68', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e68', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(97, '09b02e64-90dd-11ee-b9d1-0242ac120002', 'Article-00106', '1001790429', 'MAN00000E00897218', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e69', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e69', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(98, '09b02fcc-90dd-11ee-b9d1-0242ac120002', 'Article-00107', '1001790426', 'MAN00000H00897220', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e70', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e70', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(99, '09b030e4-90dd-11ee-b9d1-0242ac120002', 'Article-00108', '1001790428', 'MAN00000C00897219', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e71', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e71', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(100, '09b031fc-90dd-11ee-b9d1-0242ac120002', 'Article-00109', '1001790534', 'MAN00000J00897212', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e72', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e72', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(101, '09b03314-90dd-11ee-b9d1-0242ac120002', 'Article-00110', '1001790533', 'MAN00000K00897211', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e73', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e73', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(102, '09b0342c-90dd-11ee-b9d1-0242ac120002', 'Article-00111', '1001790463', 'MAN00000C00897227', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e74', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e74', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(103, '09b03936-90dd-11ee-b9d1-0242ac120002', 'Article-00112', 'M1LSL', 'XPC00875', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e75', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e75', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(104, '09b03a76-90dd-11ee-b9d1-0242ac120002', 'Article-00113', 'M1LVJ', 'XPC00871', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e76', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e76', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(105, '09b03b8e-90dd-11ee-b9d1-0242ac120002', 'Article-00114', 'yt8751', '11101Z_QC', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e77', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e77', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(106, '09b03cb0-90dd-11ee-b9d1-0242ac120002', 'Article-00115', 'cccc', '11784F02MCAT', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e78', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e78', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04'),
(107, '09b03dd2-90dd-11ee-b9d1-0242ac120002', 'Article-00116', '9zaqqq', 'S9R02231', NULL, NULL, NULL, NULL, '618cabe1-1940-492e-997f-4c39560cd1e79', '052b5f16-a172-4136-a4fe-dff41dd93dcc', '618cabe1-1940-492e-997f-4c39560cd1e79', NULL, 'stocked', 'container', NULL, NULL, NULL, NULL, NULL, NULL, 'actif', '2023-12-02 05:53:04', '2023-12-02 05:53:04');

-- --------------------------------------------------------

--
-- Structure de la table `article_families`
--

CREATE TABLE `article_families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_families`
--

INSERT INTO `article_families` (`id`, `uuid`, `code`, `libelle`, `color`, `description`, `etat`, `created_at`, `updated_at`) VALUES
(1, '052b5f16-a172-4136-a4fe-dff41dd93dcc', 'AF-00001', 'Perle Hydraulique', '#000000', NULL, 'actif', '2023-12-02 05:51:59', '2023-12-02 05:51:59');

-- --------------------------------------------------------

--
-- Structure de la table `article_models`
--

CREATE TABLE `article_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` enum('client','transitaire','transporteur','organisation') DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `voie_transport` varchar(20) DEFAULT NULL,
  `contact_one_name` varchar(255) DEFAULT NULL,
  `contact_one_lastName` varchar(255) DEFAULT NULL,
  `contact_one_email` varchar(255) DEFAULT NULL,
  `contact_two_name` varchar(255) DEFAULT NULL,
  `contact_two_lastName` varchar(255) DEFAULT NULL,
  `contact_two_email` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `note` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrepots`
--

CREATE TABLE `entrepots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `emplacement` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expeditions`
--

CREATE TABLE `expeditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `num_exp` varchar(255) DEFAULT NULL,
  `incoterm` text DEFAULT NULL,
  `lieu_liv` varchar(255) DEFAULT NULL,
  `date_liv` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_validate_doc` date DEFAULT NULL,
  `date_transit` date DEFAULT NULL,
  `date_transport` date DEFAULT NULL,
  `date_destockage` date DEFAULT NULL,
  `statut` enum('draft','started','startedDoc','odTransit','odTransport','outStock','wait_exp','livered') NOT NULL DEFAULT 'draft',
  `client_uuid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expedition_products`
--

CREATE TABLE `expedition_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `famille_uuid` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `expedition_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expedition__files`
--

CREATE TABLE `expedition__files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `expedition_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `statut` enum('waiting','refused','validate') DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `exp_transports`
--

CREATE TABLE `exp_transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `voie_exp` varchar(255) DEFAULT NULL,
  `transporteur_uuid` varchar(255) DEFAULT NULL,
  `expedition_uuid` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date_transport` date DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ex_transite_files`
--

CREATE TABLE `ex_transite_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `transite_uuid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ex_transits`
--

CREATE TABLE `ex_transits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `expedition_uuid` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `transitaire_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ex_transport_files`
--

CREATE TABLE `ex_transport_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `transport_uuid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `facturations`
--

CREATE TABLE `facturations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT 'actif',
  `statut` enum('reccording','good_pay','payed','cancel') NOT NULL DEFAULT 'reccording',
  `numFacture` varchar(255) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `typeFacture` varchar(255) DEFAULT NULL,
  `transitaire_uuid` varchar(255) DEFAULT NULL,
  `montantHtDouane` int(11) DEFAULT NULL,
  `tvaDouane` int(11) DEFAULT NULL,
  `montantTtcDouane` int(11) DEFAULT NULL,
  `montantHtAmat` int(11) DEFAULT NULL,
  `tvaAmat` int(11) DEFAULT NULL,
  `montantTtcAmat` int(11) DEFAULT NULL,
  `montantHtAccor` int(11) DEFAULT NULL,
  `tvaAccor` int(11) DEFAULT NULL,
  `montantTtcAccor` int(11) DEFAULT NULL,
  `montantHtPres` int(11) DEFAULT NULL,
  `tvaPres` int(11) DEFAULT NULL,
  `montantTtcPres` int(11) DEFAULT NULL,
  `montantHtAutre` int(11) DEFAULT NULL,
  `tvaAutre` int(11) DEFAULT NULL,
  `montantTtcAutre` int(11) DEFAULT NULL,
  `montantTotalHtTransit` int(11) DEFAULT 0,
  `montantTotalTtcTransit` int(11) DEFAULT 0,
  `TotalTvaTransit` int(11) DEFAULT 0,
  `transporteur_uuid` varchar(255) DEFAULT NULL,
  `montantHtTpPres` int(11) DEFAULT NULL,
  `tvaTpPres` int(11) DEFAULT NULL,
  `montantTtcTpPres` int(11) DEFAULT NULL,
  `montantHtTpAutr` int(11) DEFAULT NULL,
  `tvaTpAutr` int(11) DEFAULT NULL,
  `montantTtcTpAutr` int(11) DEFAULT 0,
  `montantTotalHtTransport` int(11) DEFAULT 0,
  `montantTotalTtcTransport` int(11) DEFAULT 0,
  `TotalTvaTransport` int(11) DEFAULT 0,
  `facture_original` varchar(255) DEFAULT NULL,
  `user_create` varchar(255) DEFAULT NULL,
  `user_payed` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `livraison_files`
--

CREATE TABLE `livraison_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_15_043922_create_permission_tables', 1),
(7, '2023_09_16_185401_create_companies_table', 1),
(8, '2023_09_17_005015_add_uuid_company_to_users', 1),
(9, '2023_09_17_160031_create_articles_table', 1),
(10, '2023_09_17_221613_create_categories_table', 1),
(11, '2023_09_18_103425_create_marques_table', 1),
(12, '2023_09_18_121154_create_sources_table', 1),
(13, '2023_09_27_174653_create_sourcings_table', 1),
(14, '2023_09_30_155644_create_sourcing_files_table', 1),
(15, '2023_09_30_180150_create_sourcing_products_table', 1),
(16, '2023_10_03_041602_create_documents_table', 1),
(17, '2023_10_15_195609_create_od_transites_table', 1),
(18, '2023_10_25_093655_create_od_files_table', 1),
(19, '2023_10_25_133712_create_od_livraisons_table', 1),
(20, '2023_10_26_085654_create_livraison_files_table', 1),
(21, '2023_10_30_133303_create_stock_updates_table', 1),
(22, '2023_10_30_235324_create_entrepots_table', 1),
(23, '2023_11_01_233450_create_expeditions_table', 1),
(24, '2023_11_02_104342_create_expedition_products_table', 1),
(25, '2023_11_02_110151_create_expedition__files_table', 1),
(26, '2023_11_03_023806_create_facturations_table', 1),
(27, '2023_11_06_233140_create_ex_transits_table', 1),
(28, '2023_11_07_102612_create_ex_transite_files_table', 1),
(29, '2023_11_07_154041_create_exp_transports_table', 1),
(30, '2023_11_08_105402_create_ex_transport_files_table', 1),
(31, '2023_11_14_104617_create_article_models_table', 1),
(32, '2023_11_14_113140_create_article_families_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `od_files`
--

CREATE TABLE `od_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `od_transite_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `od_livraisons`
--

CREATE TABLE `od_livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `note` longtext DEFAULT NULL,
  `transporteur_uuid` varchar(255) DEFAULT NULL,
  `date_livraison` varchar(255) DEFAULT NULL,
  `lieu_livraison` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `sourcing_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `od_transites`
--

CREATE TABLE `od_transites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `note` text DEFAULT NULL,
  `transitaire_uuid` varchar(255) DEFAULT NULL,
  `sourcing_uuid` varchar(255) DEFAULT NULL,
  `receive_doc` varchar(255) NOT NULL DEFAULT 'Off',
  `receive_date` date DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sources`
--

CREATE TABLE `sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sourcings`
--

CREATE TABLE `sourcings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `statut` enum('draft','started','validateDoc','odTransit','odlivraison','stocked') NOT NULL DEFAULT 'draft',
  `id_navire` varchar(255) DEFAULT NULL,
  `info_navire` longtext DEFAULT NULL,
  `date_arriver` varchar(255) DEFAULT NULL,
  `date_depart` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `date_receivFactCom` date DEFAULT NULL,
  `is_receivFactCom` varchar(255) NOT NULL DEFAULT 'false',
  `tostarted_by` varchar(255) DEFAULT NULL,
  `tostarted_date` varchar(255) DEFAULT NULL,
  `startValidate_by` varchar(255) DEFAULT NULL,
  `startValidate_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sourcing_files`
--

CREATE TABLE `sourcing_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `sourcing_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `statut` enum('waiting','refused','validate') DEFAULT NULL,
  `uuid_validator` varchar(255) DEFAULT NULL,
  `date_validation` varchar(255) DEFAULT NULL,
  `uuid_reject` varchar(255) DEFAULT NULL,
  `date_reject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sourcing_products`
--

CREATE TABLE `sourcing_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `famille_uuid` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `is_received` tinyint(1) NOT NULL DEFAULT 0,
  `sourcing_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_updates`
--

CREATE TABLE `stock_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `mouvement` varchar(255) NOT NULL DEFAULT 'In',
  `file` varchar(255) DEFAULT NULL,
  `conformity` varchar(255) NOT NULL DEFAULT 'indefinie',
  `note` longtext DEFAULT NULL,
  `conformityOut` varchar(255) NOT NULL DEFAULT 'null',
  `noteOut` longtext DEFAULT NULL,
  `entrepot_uuid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `type` enum('0','1','2') NOT NULL DEFAULT '2',
  `avatar` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'actif',
  `id_role` varchar(255) DEFAULT NULL,
  `last_connection` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid_company` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `uuid`, `code`, `name`, `lastname`, `email`, `phone`, `type`, `avatar`, `etat`, `id_role`, `last_connection`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `uuid_company`) VALUES
(1, '835ef631-bc08-41ed-aa24-80d1683e8d76', 'COL-00001', 'Admin', 'Illimitis', 'admin@illimitis.ci', '0789078557', '0', NULL, 'actif', NULL, NULL, '$2y$10$wVoZ5O/1eF84hqImE9yz2uE3uCLujjasmD8k5QsgSEx50C92WEbhe', NULL, NULL, '2023-12-02 05:51:29', '2023-12-02 05:51:29', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_uuid_index` (`uuid`);

--
-- Index pour la table `article_families`
--
ALTER TABLE `article_families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_families_uuid_index` (`uuid`);

--
-- Index pour la table `article_models`
--
ALTER TABLE `article_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_models_uuid_index` (`uuid`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_uuid_index` (`uuid`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_uuid_index` (`uuid`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_uuid_index` (`uuid`);

--
-- Index pour la table `entrepots`
--
ALTER TABLE `entrepots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entrepots_uuid_unique` (`uuid`);

--
-- Index pour la table `expeditions`
--
ALTER TABLE `expeditions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expeditions_uuid_unique` (`uuid`);

--
-- Index pour la table `expedition_products`
--
ALTER TABLE `expedition_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expedition_products_expedition_id_foreign` (`expedition_id`),
  ADD KEY `expedition_products_product_id_foreign` (`product_id`);

--
-- Index pour la table `expedition__files`
--
ALTER TABLE `expedition__files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expedition__files_expedition_id_foreign` (`expedition_id`),
  ADD KEY `expedition__files_uuid_index` (`uuid`);

--
-- Index pour la table `exp_transports`
--
ALTER TABLE `exp_transports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exp_transports_uuid_index` (`uuid`);

--
-- Index pour la table `ex_transite_files`
--
ALTER TABLE `ex_transite_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ex_transite_files_uuid_index` (`uuid`);

--
-- Index pour la table `ex_transits`
--
ALTER TABLE `ex_transits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ex_transits_uuid_index` (`uuid`);

--
-- Index pour la table `ex_transport_files`
--
ALTER TABLE `ex_transport_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ex_transport_files_uuid_index` (`uuid`);

--
-- Index pour la table `facturations`
--
ALTER TABLE `facturations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `livraison_files`
--
ALTER TABLE `livraison_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livraison_files_livraison_id_foreign` (`livraison_id`),
  ADD KEY `livraison_files_uuid_index` (`uuid`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marques_uuid_index` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `od_files`
--
ALTER TABLE `od_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `od_files_od_transite_id_foreign` (`od_transite_id`),
  ADD KEY `od_files_uuid_index` (`uuid`);

--
-- Index pour la table `od_livraisons`
--
ALTER TABLE `od_livraisons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `od_livraisons_code_unique` (`code`),
  ADD KEY `od_livraisons_uuid_index` (`uuid`);

--
-- Index pour la table `od_transites`
--
ALTER TABLE `od_transites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `od_transites_uuid_index` (`uuid`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sources_uuid_index` (`uuid`);

--
-- Index pour la table `sourcings`
--
ALTER TABLE `sourcings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourcings_uuid_index` (`uuid`);

--
-- Index pour la table `sourcing_files`
--
ALTER TABLE `sourcing_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourcing_files_sourcing_id_foreign` (`sourcing_id`),
  ADD KEY `sourcing_files_uuid_index` (`uuid`);

--
-- Index pour la table `sourcing_products`
--
ALTER TABLE `sourcing_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourcing_products_sourcing_id_foreign` (`sourcing_id`),
  ADD KEY `sourcing_products_product_id_foreign` (`product_id`);

--
-- Index pour la table `stock_updates`
--
ALTER TABLE `stock_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_updates_product_id_foreign` (`product_id`),
  ADD KEY `stock_updates_user_id_foreign` (`user_id`),
  ADD KEY `stock_updates_uuid_index` (`uuid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_uuid_index` (`uuid`),
  ADD KEY `users_uuid_company_index` (`uuid_company`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `article_families`
--
ALTER TABLE `article_families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article_models`
--
ALTER TABLE `article_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entrepots`
--
ALTER TABLE `entrepots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `expeditions`
--
ALTER TABLE `expeditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `expedition_products`
--
ALTER TABLE `expedition_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `expedition__files`
--
ALTER TABLE `expedition__files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exp_transports`
--
ALTER TABLE `exp_transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ex_transite_files`
--
ALTER TABLE `ex_transite_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ex_transits`
--
ALTER TABLE `ex_transits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ex_transport_files`
--
ALTER TABLE `ex_transport_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `facturations`
--
ALTER TABLE `facturations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraison_files`
--
ALTER TABLE `livraison_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `od_files`
--
ALTER TABLE `od_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `od_livraisons`
--
ALTER TABLE `od_livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `od_transites`
--
ALTER TABLE `od_transites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sourcings`
--
ALTER TABLE `sourcings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sourcing_files`
--
ALTER TABLE `sourcing_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sourcing_products`
--
ALTER TABLE `sourcing_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_updates`
--
ALTER TABLE `stock_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `expedition_products`
--
ALTER TABLE `expedition_products`
  ADD CONSTRAINT `expedition_products_expedition_id_foreign` FOREIGN KEY (`expedition_id`) REFERENCES `expeditions` (`id`),
  ADD CONSTRAINT `expedition_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `expedition__files`
--
ALTER TABLE `expedition__files`
  ADD CONSTRAINT `expedition__files_expedition_id_foreign` FOREIGN KEY (`expedition_id`) REFERENCES `expeditions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `livraison_files`
--
ALTER TABLE `livraison_files`
  ADD CONSTRAINT `livraison_files_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `od_livraisons` (`id`);

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `od_files`
--
ALTER TABLE `od_files`
  ADD CONSTRAINT `od_files_od_transite_id_foreign` FOREIGN KEY (`od_transite_id`) REFERENCES `od_transites` (`id`);

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sourcing_files`
--
ALTER TABLE `sourcing_files`
  ADD CONSTRAINT `sourcing_files_sourcing_id_foreign` FOREIGN KEY (`sourcing_id`) REFERENCES `sourcings` (`id`);

--
-- Contraintes pour la table `sourcing_products`
--
ALTER TABLE `sourcing_products`
  ADD CONSTRAINT `sourcing_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `sourcing_products_sourcing_id_foreign` FOREIGN KEY (`sourcing_id`) REFERENCES `sourcings` (`id`);

--
-- Contraintes pour la table `stock_updates`
--
ALTER TABLE `stock_updates`
  ADD CONSTRAINT `stock_updates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `stock_updates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
