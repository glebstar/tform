CREATE TABLE `user` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(10) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `firstname` VARCHAR(30) DEFAULT '',
    `lastname` VARCHAR(30) DEFAULT '',
    `photo` VARCHAR(3) DEFAULT '',
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;