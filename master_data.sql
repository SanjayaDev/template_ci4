INSERT INTO `users_status` (`id`, `user_status`) VALUES
	(1, 'Active'),
	(2, 'Non Active');

INSERT INTO `divisions` (`id`, `division`) VALUES
	(1, 'System Administrator'),
	(2, 'Internal');

INSERT INTO `access_levels` (`id`, `division_id`, `level`, `level_name`) VALUES
	(1, 1, 100, 'Super Admin'),
	(2, 2, 95, 'Owner');

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `password`, `phone`, `user_status_id`, `access_id`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'sanjaya', 'Mohammad Ricky Sanjaya', 'me@ricky-sanjaya.my.id', '$2y$10$D1ia/Ad4MHhHroJAqxDJ6OHEYxQsUISUOlcFJR3VkSqcMH5dYNQ9a', NULL, 1, 1, NULL, '2021-10-08 22:15:14', NULL);