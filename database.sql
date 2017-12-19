-- ----------------------------
--  Table structure for `pp_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `pp_sessions`;
CREATE TABLE `pp_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pp_settings`
-- ----------------------------
DROP TABLE IF EXISTS `pp_settings`;
CREATE TABLE `pp_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `emails_per_hour` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `pp_settings`
-- ----------------------------
BEGIN;
INSERT INTO `pp_settings` VALUES ('1', '300');
COMMIT;

-- ----------------------------
--  Table structure for `pp_creditors`
-- ----------------------------
DROP TABLE IF EXISTS `pp_creditors`;
CREATE TABLE `pp_job_seekers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `sts` enum('active','blocked','pending') NOT NULL DEFAULT 'active',
  `first_login_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `slug` varchar(155) DEFAULT NULL,
  `ip_address` varchar(40) DEFAULT NULL,
  `old_id` int(11) DEFAULT NULL,
  `flag` varchar(10) DEFAULT NULL,
  `queue_email_sts` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;