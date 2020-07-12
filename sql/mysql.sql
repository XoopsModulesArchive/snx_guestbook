CREATE TABLE `snx_guestbook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `site` tinytext NOT NULL,
  `icon` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `homepage` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `ip` tinytext NOT NULL,
  `country` tinytext NOT NULL,
  `city` tinytext NOT NULL,
  `accepted` char(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `date` (`date`)
) Type=MyISAM;

CREATE TABLE `snx_guestbook_config` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `epp` tinyint(3) unsigned NOT NULL default '0',
  `notify_email` varchar(255) NOT NULL default '',
  `moderate` char(1) NOT NULL default '',
  `date_format` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) Type=MyISAM;

INSERT INTO `xoops_snx_guestbook_config` VALUES (1, 5, '', '0', 'd-M-Y H:i:s');
