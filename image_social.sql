CREATE TABLE `users` (
  `id` int(255) auto_increment not null,
  `role` varchar(20) not null,
  `name` varchar(100) not null,
  `surname` varchar(200) not null,
  `nick` varchar(100) not null,
  `email` varchar(255) not null,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) not null,
  `image` varchar(255) not null,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) NOT NULL,
   CONSTRAINT pk_users PRIMARY KEY(id),
   CONSTRAINT uq_email UNIQUE(email)
) ENGINE=InnoDb;

CREATE TABLE `images` (
  `id` int(255) auto_increment NOT NULL,
  `user_id` int(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  CONSTRAINT pk_images PRIMARY KEY(id),
  CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB;


CREATE TABLE `comments` (
  `id` int(255) auto_increment NOT NULL,
  `user_id` int(255) NOT NULL,
  `image_id` int(255) NOT NULL,
  `content` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  CONSTRAINT pk_comments PRIMARY KEY(id),
  CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
  CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
) ENGINE=InnoDB;

CREATE TABLE `likes` (
  `id` int(255) auto_increment NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  CONSTRAINT pk_likes PRIMARY KEY(id),
  CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
  CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
) ENGINE=InnoDB;


CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


INSERT INTO `users` 
(`id`, `role`, `name`, `surname`, `nick`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) 
VALUES
(1, 'user', 'admin', 'Hebles', 'programer', 'admin@admin.com', NULL, '$2y$10$wUxzq32ZLwNLLwfrvn/YR.AoCnUY5dqb5b..ZcIIU5dq7lzOm.uaW', '1750343202avatar.jpg', '', '2025-06-19 09:27:22', '2025-06-19 12:26:44');


INSERT INTO `images` (`id`, `user_id`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '1750345830tlou.gif', 'Gif The Last of Us', '2025-06-19 15:10:30', '2025-06-19 15:10:30'),
(2, 1, '1750346959sevilla.jpg', 'Sevilla :)', '2025-06-19 15:29:19', '2025-06-19 16:07:45');





INSERT INTO `likes` (`id`, `user_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-06-19 16:21:42', '2025-06-19 16:21:42');



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);





ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);


ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);


ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);


ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;



ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

