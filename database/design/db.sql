-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Users'
-- 
-- ---

DROP TABLE IF EXISTS `Users`;
		
CREATE TABLE `Users` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` CHAR NULL DEFAULT NULL,
  `surname` CHAR NULL DEFAULT NULL,
  `lastname` INTEGER NULL DEFAULT NULL,
  `email` INTEGER NULL DEFAULT NULL,
  `password` INTEGER NULL DEFAULT NULL,
  `email_status` INTEGER NULL DEFAULT NULL,
  `vk_id` INTEGER NULL DEFAULT NULL,
  `image` INTEGER NULL DEFAULT NULL,
  `phone_number` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'users_rating'
-- 
-- ---

DROP TABLE IF EXISTS `users_rating`;
		
CREATE TABLE `users_rating` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `user_id_foreign` INTEGER NULL DEFAULT NULL,
  `rating` INTEGER NULL DEFAULT NULL,
  `user_from_id` INTEGER NULL DEFAULT NULL,
  `user_from_id_foreign` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car_rating'
-- 
-- ---

DROP TABLE IF EXISTS `car_rating`;
		
CREATE TABLE `car_rating` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `car_id` INTEGER NULL DEFAULT NULL,
  `car_id_foreign` INTEGER NULL DEFAULT NULL,
  `rating` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car_body_type'
-- 
-- ---

DROP TABLE IF EXISTS `car_body_type`;
		
CREATE TABLE `car_body_type` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `type_name` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car_model'
-- 
-- ---

DROP TABLE IF EXISTS `car_model`;
		
CREATE TABLE `car_model` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `model_name` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car_mark'
-- 
-- ---

DROP TABLE IF EXISTS `car_mark`;
		
CREATE TABLE `car_mark` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `mark_name` INTEGER NULL DEFAULT NULL,
  `model_id` INTEGER NULL DEFAULT NULL,
  `car_model_id_foreign` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car'
-- 
-- ---

DROP TABLE IF EXISTS `car`;
		
CREATE TABLE `car` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `user_id_foreign` INTEGER NULL DEFAULT NULL,
  `car_body_type_id` INTEGER NULL DEFAULT NULL,
  `car_body_type_id_foreign` INTEGER NULL DEFAULT NULL,
  `car_model_id` INTEGER NULL DEFAULT NULL,
  `car_model_id_foreign` INTEGER NULL DEFAULT NULL,
  `image` INTEGER NULL DEFAULT NULL,
  `driving_experience` INTEGER NULL DEFAULT NULL,
  `car_number` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'trip'
-- 
-- ---

DROP TABLE IF EXISTS `trip`;
		
CREATE TABLE `trip` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `driver_id` INTEGER NULL DEFAULT NULL,
  `driver_id_foreign` INTEGER NULL DEFAULT NULL,
  `where_from` INTEGER NULL DEFAULT NULL,
  `where_to` INTEGER NULL DEFAULT NULL,
  `date_time` INTEGER NULL DEFAULT NULL,
  `free_places` INTEGER NULL DEFAULT NULL,
  `price` INTEGER NULL DEFAULT NULL,
  `distance` INTEGER NULL DEFAULT NULL,
  `duration` INTEGER NULL DEFAULT NULL,
  `no_more_than_two_passengers` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'passengers'
-- 
-- ---

DROP TABLE IF EXISTS `passengers`;
		
CREATE TABLE `passengers` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `user_id_foreign` INTEGER NULL DEFAULT NULL,
  `trip_id` INTEGER NULL DEFAULT NULL,
  `trip_id_foreign` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'preferences'
-- 
-- ---

DROP TABLE IF EXISTS `preferences`;
		
CREATE TABLE `preferences` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `user_id_foreign` INTEGER NULL DEFAULT NULL,
  `talk` INTEGER NULL DEFAULT NULL,
  `smoke` INTEGER NULL DEFAULT NULL,
  `animal` INTEGER NULL DEFAULT NULL,
  `music` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'car_comments'
-- 
-- ---

DROP TABLE IF EXISTS `car_comments`;
		
CREATE TABLE `car_comments` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `car_id` INTEGER NULL DEFAULT NULL,
  `car_id_foreign` INTEGER NULL DEFAULT NULL,
  `text` INTEGER NULL DEFAULT NULL,
  `user_from_id` INTEGER NULL DEFAULT NULL,
  `user_from_id_foreign` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'users_comment'
-- 
-- ---

DROP TABLE IF EXISTS `users_comment`;
		
CREATE TABLE `users_comment` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `user_id_foreign` INTEGER NULL DEFAULT NULL,
  `text` INTEGER NULL DEFAULT NULL,
  `user_from_id` INTEGER NULL DEFAULT NULL,
  `user_from_id_foreign` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `users_rating` ADD FOREIGN KEY (user_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `users_rating` ADD FOREIGN KEY (user_from_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `car_rating` ADD FOREIGN KEY (car_id_foreign) REFERENCES `car` (`id`);
ALTER TABLE `car_mark` ADD FOREIGN KEY (car_model_id_foreign) REFERENCES `car_model` (`id`);
ALTER TABLE `car` ADD FOREIGN KEY (user_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `car` ADD FOREIGN KEY (car_body_type_id_foreign) REFERENCES `car_body_type` (`id`);
ALTER TABLE `car` ADD FOREIGN KEY (car_model_id_foreign) REFERENCES `car_model` (`id`);
ALTER TABLE `trip` ADD FOREIGN KEY (driver_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `passengers` ADD FOREIGN KEY (user_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `passengers` ADD FOREIGN KEY (trip_id_foreign) REFERENCES `trip` (`id`);
ALTER TABLE `preferences` ADD FOREIGN KEY (user_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `car_comments` ADD FOREIGN KEY (car_id_foreign) REFERENCES `car` (`id`);
ALTER TABLE `car_comments` ADD FOREIGN KEY (user_from_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `users_comment` ADD FOREIGN KEY (user_id_foreign) REFERENCES `Users` (`id`);
ALTER TABLE `users_comment` ADD FOREIGN KEY (user_from_id_foreign) REFERENCES `Users` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `users_rating` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car_rating` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car_body_type` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car_model` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car_mark` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `trip` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `passengers` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `preferences` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `car_comments` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `users_comment` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Users` (`id`,`name`,`surname`,`lastname`,`email`,`password`,`email_status`,`vk_id`,`image`,`phone_number`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `users_rating` (`id`,`user_id`,`user_id_foreign`,`rating`,`user_from_id`,`user_from_id_foreign`) VALUES
-- ('','','','','','');
-- INSERT INTO `car_rating` (`id`,`car_id`,`car_id_foreign`,`rating`) VALUES
-- ('','','','');
-- INSERT INTO `car_body_type` (`id`,`type_name`) VALUES
-- ('','');
-- INSERT INTO `car_model` (`id`,`model_name`) VALUES
-- ('','');
-- INSERT INTO `car_mark` (`id`,`mark_name`,`model_id`,`car_model_id_foreign`) VALUES
-- ('','','','');
-- INSERT INTO `car` (`id`,`user_id`,`user_id_foreign`,`car_body_type_id`,`car_body_type_id_foreign`,`car_model_id`,`car_model_id_foreign`,`image`,`driving_experience`,`car_number`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `trip` (`id`,`driver_id`,`driver_id_foreign`,`where_from`,`where_to`,`date_time`,`free_places`,`price`,`distance`,`duration`,`no_more_than_two_passengers`) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO `passengers` (`id`,`user_id`,`user_id_foreign`,`trip_id`,`trip_id_foreign`) VALUES
-- ('','','','','');
-- INSERT INTO `preferences` (`id`,`user_id`,`user_id_foreign`,`talk`,`smoke`,`animal`,`music`) VALUES
-- ('','','','','','','');
-- INSERT INTO `car_comments` (`id`,`car_id`,`car_id_foreign`,`text`,`user_from_id`,`user_from_id_foreign`) VALUES
-- ('','','','','','');
-- INSERT INTO `users_comment` (`id`,`user_id`,`user_id_foreign`,`text`,`user_from_id`,`user_from_id_foreign`) VALUES
-- ('','','','','','');