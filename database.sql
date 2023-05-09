CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `comment` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
