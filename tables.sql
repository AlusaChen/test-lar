-- admin
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255)  NOT NULL,
  `password` varchar(60)  NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `meta_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `mkey` varchar(255)  NOT NULL,
  `mvalue` LONGTEXT NULL ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_key` (`admin_id`, `mkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- post
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` int(10) UNSIGNED NOT NULL ,
  `title` varchar(255) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `thumb_img` VARCHAR(255) NULL DEFAULT '' COMMENT '缩略图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `meta_post` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `mkey` varchar(255)  NOT NULL,
  `mvalue` LONGTEXT NULL ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_key` (`post_id`, `mkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- terms
CREATE TABLE IF NOT EXISTS `terms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(100)  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `cname` varchar(255)  NOT NULL,
  `desc` TEXT NULL ,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- relations
CREATE TABLE IF NOT EXISTS `relations` (
  `object_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY `object_term` (`object_id`, `term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
