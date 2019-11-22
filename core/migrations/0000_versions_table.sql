-- Migration versions --
CREATE TABLE IF NOT EXISTS `versions` (
    `id` int(10) unsigned not null auto_increment,
    `name` varchar(255) not null,
    `created` timestamp default current_timestamp,
    primary key (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;