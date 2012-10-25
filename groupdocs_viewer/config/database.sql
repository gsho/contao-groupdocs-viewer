CREATE TABLE `tl_gdv` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `width` int(10) unsigned NOT NULL default '0',
  `height` int(10) unsigned NOT NULL default '0',
  `clientId` varchar(128) NOT NULL default '',
  `apiKey` varbinary(128) NOT NULL default '',
  `pid` int(10) NOT NULL default '0',
  `tstamp` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
