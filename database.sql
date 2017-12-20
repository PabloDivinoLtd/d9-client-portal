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
CREATE TABLE `pp_creditors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `dated` datetime NOT NULL,
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

-- ----------------------------
--  Table structure for `pp_email_content`
-- ----------------------------
DROP TABLE IF EXISTS `pp_email_content`;
CREATE TABLE `pp_email_content` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` varchar(155) DEFAULT NULL,
  `from_name` varchar(155) DEFAULT NULL,
  `content` text,
  `from_email` varchar(90) DEFAULT NULL,
  `subject` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `pp_email_content`
-- ----------------------------
BEGIN;
INSERT INTO `pp_email_content` VALUES ('1', 'Forgot Password', 'MNO Jobs', '<style type=\"text/css\">\n				.txt {\n						font-family: Arial, Helvetica, sans-serif;\n						font-size: 13px; color:#000000;\n					}\n				</style>\n<p class=\"txt\">Thank you  for contacting Member Support. Your account information is listed below: </p>\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" class=\"txt\">\n  <tr>\n    <td width=\"17\" height=\"19\"><p>&nbsp;</p></td>\n    <td width=\"159\" height=\"25\" align=\"right\"><strong>Login Page:&nbsp;&nbsp;</strong></td>\n    <td width=\"424\" align=\"left\"><a href=\"{SITE_URL}/login\">{SITE_URL}/login</a></td>\n  </tr>\n  <tr>\n    <td height=\"19\">&nbsp;</td>\n    <td height=\"25\" align=\"right\"><strong>Your Username:&nbsp;&nbsp;</strong></td>\n    <td align=\"left\">{USERNAME}</td>\n  </tr>\n  <tr>\n    <td height=\"19\"><p>&nbsp;</p></td>\n    <td height=\"25\" align=\"right\"><strong>Your Password:&nbsp;&nbsp;</strong></td>\n    <td align=\"left\">{PASSWORD}</td>\n  </tr>\n</table>\n\n<p class=\"txt\">Thank you,</p>', 'eduxmax@gmail.com', 'Password Recovery'),
('2', 'Creditors Signup', 'Creditors Signup Successful', '<style type=\"text/css\">p {font-family: Arial, Helvetica, sans-serif; font-size: 13px; color:#000000;}</style>\n\n  <p>{CREDITOR_NAME}:</p>\n  <p>Thank you for joining us. Please note your profile details for future record.</p>\n  <p>Username: {USERNAME}<br>\n    Password: {PASSWORD}</p>\n  \n  <p>Regards</p>', 'eduxmax@gmail.com', 'Jobs website');
COMMIT;
