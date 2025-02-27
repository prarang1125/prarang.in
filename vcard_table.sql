CREATE TABLE card (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id bigint(20) UNSIGNED DEFAULT NULL,
  ddress_id bigint(20) UNSIGNED DEFAULT NULL,
  category_id bigint(20) UNSIGNED DEFAULT NULL,
  city_id bigint(20) UNSIGNED DEFAULT NULL,
  color_code varchar(255) DEFAULT NULL,
  slug varchar(255) NOT NULL UNIQUE,
  ddhar_front varchar(255) DEFAULT NULL,
  ddhar_back varchar(255) DEFAULT NULL,
  	itle varchar(255) NOT NULL,
  subtitle varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (city_id) REFERENCES cities (id) ON DELETE CASCADE,
  FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE,
  FOREIGN KEY (ddress_id) REFERENCES ddress (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
