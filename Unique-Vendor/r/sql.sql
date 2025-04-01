CREATE TABLE IF NOT EXISTS `invoicify_settings` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`keywords` varchar(255) NOT NULL,
	`url` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `invoicify_users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`usern` varchar(255) NOT NULL,
	`passwd` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `invoicify_items` (
	`id` varchar(255) NOT NULL,
	`invoice_id` varchar(255) NOT NULL,
	`buyer_email` varchar(255) NOT NULL,
	`currency` varchar(255) NOT NULL,
	`seller_name` varchar(255) NOT NULL,
	`seller_link` varchar(255) NOT NULL,
	`seller_email` varchar(255) NOT NULL,
	`invoice_type` varchar(255) NOT NULL,
	`item_name` varchar(255) NOT NULL,
	`item_quantity` varchar(255) NOT NULL,
	`item_price` varchar(255) NOT NULL,
	`discount` varchar(255) NOT NULL,
	`thank_you` varchar(255) NOT NULL,
	`idate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;