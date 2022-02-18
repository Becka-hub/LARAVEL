-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 30 mai 2021 à 20:43
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, '6ème', NULL, NULL),
(2, '5ème', NULL, NULL),
(3, '4ème', NULL, NULL),
(4, '3ème', NULL, NULL),
(5, 'Seconde', NULL, NULL),
(6, 'Premiere', NULL, NULL),
(7, 'Términale', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `classe_id`, `created_at`, `updated_at`) VALUES
(1, 'Wintheiser', 'Ruben', 2, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(3, 'Vandervort', 'Avery', 6, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(4, 'Shields', 'Makenzie', 1, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(6, 'Pouros', 'Keenan', 2, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(7, 'Gusikowski', 'Alivia', 2, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(8, 'Vandervort', 'Gay', 3, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(10, 'Swift', 'Kylie', 7, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(11, 'Labadie', 'Russell', 1, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(12, 'Konopelski', 'Rudy', 1, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(13, 'Hoppe', 'Alyce', 1, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(14, 'Gerlach', 'Carmela', 5, '2021-05-29 14:31:08', '2021-05-29 14:31:08'),
(15, 'Funk', 'Moreno', 6, '2021-05-29 14:31:09', '2021-05-30 12:48:35'),
(16, 'Simonis', 'Elenor', 2, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(17, 'Hermann', 'Tyree', 2, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(18, 'Jerde', 'Ladarius', 3, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(19, 'Rosenbaum', 'Jefferey', 1, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(20, 'Wisozk', 'Maeve', 3, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(21, 'Yost', 'Genevieve', 5, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(22, 'Streich', 'Hardy', 3, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(23, 'Johns', 'Brooklyn', 4, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(24, 'Hill', 'Dangelo', 4, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(25, 'Jenkins', 'Arlene', 3, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(27, 'Wuckert', 'Sarah', 1, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(29, 'Pfannerstill', 'Lottie', 7, '2021-05-29 14:31:09', '2021-05-29 14:31:09'),
(31, 'Rakotondratsimba', 'Maminiaina', 5, '2021-05-30 10:12:03', '2021-05-30 10:12:03'),
(32, 'Rafara', 'Mandimby', 2, '2021-05-30 10:21:41', '2021-05-30 10:21:41'),
(33, 'Rajean', 'Marie', 5, '2021-05-30 12:18:07', '2021-05-30 12:18:07');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_29_151914_create_classes_table', 1),
(5, '2021_05_29_152640_create_etudiants_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiants_classe_id_foreign` (`classe_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
