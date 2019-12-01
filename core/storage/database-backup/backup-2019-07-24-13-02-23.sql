

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admins VALUES("1","Alex Doe","admin","admin@gmail.com","1512757163.png","$2y$10$Eb23jDgZrN4wkxVIWmtnXuVQ2Ify3s.tOJ6rBVuY4GGp7MfXg/jKm","kzbjONV9q7oOjbjFEOjg4mqN5iAN6E1KW8HonIPOqwlpXUlR2TDqXKuxjn7i","","2017-12-08 04:24:59");
INSERT INTO admins VALUES("2","Lone Due","hellohasan","hellomrhasan@gmail.com","admin-default.png","$2y$10$Lt7tDwicG00iiqNxzqmiMuVzz85mPIpSfMCbFSbU9APlV9/sXpVoy","4BCUb00qx4beNFKCvAGqYbG96zcK5SAhRKwWkdNS1lxkFC6cbzRHzqIOq9AV","","2017-11-03 13:17:12");





CREATE TABLE IF NOT EXISTS `basic_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verify` tinyint(1) NOT NULL DEFAULT '0',
  `phone_verify` tinyint(1) NOT NULL DEFAULT '0',
  `google_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic` blob,
  `meta_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat` blob,
  `captcha_status` tinyint(1) NOT NULL DEFAULT '0',
  `captcha_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `captcha_site` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` blob NOT NULL,
  `terms` blob NOT NULL,
  `short_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` blob NOT NULL,
  `smsapi` blob NOT NULL,
  `copy_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO basic_settings VALUES("1","cryptoSignal","ff9900","+88-0197-444-7300","softwarezon@hotmail.com","Mirpur-2, Dhaka Bangladesh.","USD","$","1","1","<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3331687710743!2d90.36636621538977!3d23.806748892537406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f1d99d03%3A0xcd82050166bb03db!2sMirpur+10+Bus+Stopage!5e0!3m2!1sen!2sbd!4v1510782736980\" width=\"1350\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>","<script>\n  //Google Analytics scripts code here\n</script>","softwarezon,php scripts","This is description","<!--Start of Tawk.to Script-->\n<script>\n  //Live Script scripts code here\n</script>\n<!--End of Tawk.to Script-->","1","6LdLbDwUAAAAAAJxk9AAI0HkNDAN865s-TSEZNbj","6LdLbDwUAAAAAONd5PuyVZloSLxh3x86tirXpNGx","<div style=\"text-align: justify;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br style=\"margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div></div>","<div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" center;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0);\"><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>","About Company","What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page&nbsp;","<div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" center;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0);\"><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>","https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=SoftwareZON&SMSText={{message}}&GSM={{number}}&type=longSMS","2017 � All Copyright Reserved By <a href=\"http://softwarezon.com\" title=\"SoftwareZon\" target=\"_blank\">SOFTWAREZON</a>.","","2018-10-23 12:35:34");





CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO branches VALUES("1","Sabbirs","Uttarar","admins@gmail.coms","3489483","1","2019-07-07 13:36:10","2019-07-07 14:36:41","2019-07-07 14:36:41");
INSERT INTO branches VALUES("2","Mirpor","Mirpur,","admin@gmail.com","348948","1","2019-07-07 13:47:05","2019-07-07 13:47:05","");
INSERT INTO branches VALUES("3","Uttara","Uttara","hassan@gmail.com","348948","1","2019-07-07 16:33:28","2019-07-07 16:33:28","");





CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES("1","Cryipto","cryipto","1","2017-11-19 02:51:20","2017-12-08 19:14:57");
INSERT INTO categories VALUES("2","Forex","forex","1","2017-11-19 02:55:34","2017-11-27 13:18:25");
INSERT INTO categories VALUES("3","Bitcoin","bitcoin","1","2017-11-19 02:56:34","2017-11-27 13:18:39");
INSERT INTO categories VALUES("4","International","international","1","2017-11-19 02:57:01","2017-11-27 14:35:27");
INSERT INTO categories VALUES("5","Market","market","1","2017-11-27 14:35:46","2017-11-27 14:35:46");
INSERT INTO categories VALUES("6","Currency Exchange","currency-exchange","1","2017-11-27 14:36:11","2017-11-27 14:36:11");
INSERT INTO categories VALUES("7","Trading","trading","1","2017-11-27 14:36:29","2017-11-27 14:36:29");
INSERT INTO categories VALUES("8","Freelance","freelance","1","2017-11-27 14:37:29","2017-11-27 14:37:29");
INSERT INTO categories VALUES("9","Local Market","local-market","1","2017-11-27 14:38:22","2017-11-27 14:38:22");
INSERT INTO categories VALUES("10","Analysis","analysis","1","2017-11-27 14:38:42","2017-11-27 14:38:42");
INSERT INTO categories VALUES("11","LightCoin","lightcoin","1","2017-12-27 05:42:56","2017-12-27 05:42:56");





CREATE TABLE IF NOT EXISTS `database_backups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO database_backups VALUES("1","backup-2018-10-17-16-54-56.sql","2018-10-17 03:54:56","2018-10-17 03:54:56");
INSERT INTO database_backups VALUES("2","backup-2018-10-17-16-55-22.sql","2018-10-17 03:55:22","2018-10-17 03:55:22");
INSERT INTO database_backups VALUES("3","backup-2018-10-17-16-56-39.sql","2018-10-17 03:56:39","2018-10-17 03:56:39");
INSERT INTO database_backups VALUES("4","backup-2018-10-17-17-01-09.sql","2018-10-17 04:01:09","2018-10-17 04:01:09");
INSERT INTO database_backups VALUES("5","backup-2018-10-17-17-19-29.sql","2018-10-17 04:19:29","2018-10-17 04:19:29");
INSERT INTO database_backups VALUES("6","backup-2018-10-17-17-27-07.sql","2018-10-17 04:27:07","2018-10-17 04:27:07");





CREATE TABLE IF NOT EXISTS `email_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_status` tinyint(4) NOT NULL DEFAULT '0',
  `email_body` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO email_settings VALUES("1","smtp","hellomrhasan@gmail.com","Hasan Rahman","mail.cliquepede.com.br","587","comercial@cliquepede.com.br","anakarina@2018","tls","1","<p>&nbsp;</p>\n<div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\">\n<table style=\"border-collapse: collapse; table-layout: fixed; color: #b8b8b8; font-family: Ubuntu,sans-serif;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"preheader__snippet\" style=\"padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n<td class=\"preheader__webversion\" style=\"text-align: right; padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 0; width: 600px;\">\n<div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\">\n<div id=\"emb-email-header\" class=\"logo-left\" style=\"font-size: 0px !important; line-height: 0 !important;\" align=\"left\"><img style=\"height: auto; width: 100%; border: 0; max-width: 312px;\" src=\"https://i.imgur.com/GYloTas.png\" alt=\"\" width=\"312\" height=\"44\"></div>\n</div>\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"column\" style=\"padding: 0px; text-align: left; vertical-align: top; color: rgb(96, 102, 109); line-height: 21px; font-family: sans-serif; width: 600px;\">\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px; margin-top: 24px;\">\n<div style=\"line-height: 10px; font-size: 1px;\">&nbsp;</div>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\">\n<h2>Hi {{name}},</h2>\n<p><strong>{{message}}</strong></p>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\"><br></div>\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">\n<p class=\"size-14\" style=\"margin-top: 0px; margin-bottom: 0px; line-height: 21px;\"><font size=\"3\"><b>Thanks,</b></font><br> <strong style=\"font-size: 14px;\">{{site_title}}</strong></p>\n</div>\n</td>\n</tr>\n</tbody>\n</table><br>\n</div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div>\n<br>\n<br>\n<br>","","2018-10-15 04:55:06");





CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expenses VALUES("1","Mobile Bill","1000","1","2019-07-21 17:18:19","2019-07-21 17:18:19");





CREATE TABLE IF NOT EXISTS `fuel_mixes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fuel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_type1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_type2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO fuel_mixes VALUES("1","3","4","23","5","56","89.90","","0","2019-07-22 13:50:53","2019-07-22 13:50:53");
INSERT INTO fuel_mixes VALUES("4","3","4","12","5","44","67.08","","0","2019-07-22 13:55:56","2019-07-22 13:55:56");





CREATE TABLE IF NOT EXISTS `fuels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `store` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO fuels VALUES("3","Petroll","90","180","1","2019-07-15 11:25:49","2019-07-23 20:56:48");
INSERT INTO fuels VALUES("4","Dizel","120","50","1","2019-07-15 11:26:02","2019-07-23 20:57:09");
INSERT INTO fuels VALUES("5","Gas","85","76","1","","2019-07-23 20:57:28");





CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager-default.png',
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `managers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO managers VALUES("1","3","Sabbirss","3489484","adminss@gmail.com","1562497342.jpg","1562497342.jpg","Mirpurss.","1","$2y$10$QONiIps9OowwwfTLsdB8tORwJfAB8dRWnWmns95aJRb4zgDZEn2GK","","2019-07-07 15:44:39","2019-07-07 17:10:20","2019-07-07 17:10:20");
INSERT INTO managers VALUES("2","2","Mahadi","16234973","mahadi@gmail.com","1562492984.jpg","1562492985.jpg","Uttara","1","$2y$10$Md2mfNuwnhjxnRb/zmxoCum3o1N2jx.sT8/UoV37rgljqagCMmgyu","","2019-07-07 15:49:45","2019-07-21 14:28:26","");
INSERT INTO managers VALUES("3","3","Ayman","5423","Ayman@gmail.com","1562495701.png","1562495702.png","Mirput","1","$2y$10$upKhcZPt9xGPSTRbUW4pb.m4P2PAIbG0ookUWDnHgYyIl8CZ4HA6G","","2019-07-07 16:35:02","2019-07-07 16:35:02","");
INSERT INTO managers VALUES("4","2","Alhams","5423532","Alham@gmail.com","1562499242.jpg","1562499242.jpg","Bubt","1","$2y$10$OJjFLPD/LMNUpVKt0ZyZwe7KXpba3JCqqmREozKLc0vxpFiQNRWaO","","2019-07-07 17:17:55","2019-07-07 17:34:02","");





CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instragram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO members VALUES("1","Habiba Himu","You can relay on our amazing features list and also our customer services will be great experience.","member_1512838077.jpg","CEO","#","#","#","#","2017-12-09 02:40:54","2017-12-27 05:21:15");
INSERT INTO members VALUES("3","Pump_Dizzel","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978136.jpg","CEO, Softhouse","#","#","#","#","2017-12-10 23:42:18","2017-12-27 05:21:24");
INSERT INTO members VALUES("4","Harun Rahman","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978158.jpg","CEO, Softhouse","#","#","#","#","2017-12-10 23:42:38","2017-12-27 05:21:31");
INSERT INTO members VALUES("5","RFL Boss","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978178.jpg","CEO, Softhouse","#","#","#","#","2017-12-10 23:42:58","2017-12-27 05:21:38");





CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO menus VALUES("1","Menu 1","menu-1","<h2>What is Lorem Ipsum?<br></h2><div>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div>","2017-01-11 00:28:02","2017-11-26 17:56:05");
INSERT INTO menus VALUES("2","Menu 2","menu-2","<h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<div><br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions<br></div>","2017-11-18 15:19:01","2017-11-26 18:00:33");





CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("1","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("2","2014_10_12_100000_create_password_resets_table","1");
INSERT INTO migrations VALUES("3","2017_12_08_151246_create_admins_table","1");
INSERT INTO migrations VALUES("4","2017_11_18_053142_create_signals_table","2");
INSERT INTO migrations VALUES("5","2017_12_09_132848_create_user_signals_table","3");
INSERT INTO migrations VALUES("6","2017_12_09_163149_create_members_table","4");
INSERT INTO migrations VALUES("7","2017_12_09_183109_create_coupons_table","5");
INSERT INTO migrations VALUES("8","2017_11_21_041636_create_payment_logs_table","6");
INSERT INTO migrations VALUES("9","2017_12_26_004718_create_sections_table","7");
INSERT INTO migrations VALUES("10","2018_01_18_200823_create_staff_requests_table","8");
INSERT INTO migrations VALUES("12","2018_01_20_165412_create_submit_signals_table","9");
INSERT INTO migrations VALUES("13","2018_01_21_050221_create_signal_comments_table","10");
INSERT INTO migrations VALUES("14","2018_01_21_051810_create_signal_ratings_table","11");
INSERT INTO migrations VALUES("15","2018_10_14_020236_create_email_settings_table","12");
INSERT INTO migrations VALUES("16","2018_10_17_162713_create_database_backups_table","13");
INSERT INTO migrations VALUES("17","2019_07_06_155720_create_fuels_table","14");
INSERT INTO migrations VALUES("18","2019_07_07_125545_create_branches_table","15");
INSERT INTO migrations VALUES("19","2019_07_07_144259_create_managers_table","16");
INSERT INTO migrations VALUES("20","2019_07_08_003756_create_store_fuels_table","17");
INSERT INTO migrations VALUES("21","2019_07_15_111519_create_mixed_fuels_table","18");
INSERT INTO migrations VALUES("22","2019_07_21_131217_create_sellers_table","19");
INSERT INTO migrations VALUES("23","2019_07_21_163751_create_expenses_table","20");
INSERT INTO migrations VALUES("24","2019_07_22_134004_create_fuel_mixes_table","21");





CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO partners VALUES("1","RFL","partner_1512846249.png","2017-11-18 05:04:26","2017-12-09 05:04:09");
INSERT INTO partners VALUES("2","RFL","partner_1512846257.png","2017-11-18 05:04:37","2017-12-09 05:04:17");
INSERT INTO partners VALUES("3","RFL","partner_1512846264.png","2017-11-18 05:04:47","2017-12-09 05:04:24");
INSERT INTO partners VALUES("4","RFL","partner_1512846272.png","2017-11-18 05:04:54","2017-12-09 05:04:32");
INSERT INTO partners VALUES("5","RFL","partner_1512846214.png","2017-11-18 05:05:06","2017-12-09 05:03:35");





CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE IF NOT EXISTS `payment_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` tinyint(4) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` tinyint(1) NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` tinyint(1) NOT NULL,
  `coupon_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_acc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO payment_logs VALUES("7","8","4","oO7HwwJMugl6UPgS","200","200","0","Invalid","0","0","","","1","2017-12-13 06:24:45","2017-12-18 02:08:21");
INSERT INTO payment_logs VALUES("8","11","4","LL4IxdTJwEhUFtY4","99","99","0","Invalid","0","0","","","1","2017-12-13 07:00:58","2017-12-13 07:01:46");
INSERT INTO payment_logs VALUES("9","8","4","8QPKu8qTb1PeJf2C","129","129","0","Invalid","0","0","","","1","2017-12-18 08:53:15","2017-12-18 08:54:01");
INSERT INTO payment_logs VALUES("10","20","4","Fkxa10dJOx2p7bhi","129","129","0","Invalid","0","0","","","1","2017-12-18 11:06:17","2018-01-21 14:01:14");
INSERT INTO payment_logs VALUES("11","21","4","oj0yDLweiiHYzFrE","129","129","0","Invalid","0","0","","","0","2017-12-31 06:36:45","2017-12-31 07:10:33");
INSERT INTO payment_logs VALUES("12","20","5","YWy1TzyGJUc1cIM0","200","200","0","Invalid","0","0","","","0","2018-01-18 01:12:39","2018-01-18 01:12:39");





CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `val1` text COLLATE utf8_unicode_ci NOT NULL,
  `val2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `val3` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO payment_methods VALUES("1","PAYPAL","paypal_1511850437h3.png","1","admin@softwarezon.com","","","1","","2017-12-24 11:42:56");
INSERT INTO payment_methods VALUES("2","PERFECT MONEY","perfect_1511850445h4.png","1","U16298600","reg4e54h1grt1j","","1","","2017-12-24 10:43:20");
INSERT INTO payment_methods VALUES("3","BITCOIN - (BLOCKCHAIN)","btc_1511850456h5.png","1","382688a1-f034-45ab-9972-808f70b83ba8","xpub6DAmnCaQKkCAoHPvfCUsqNWLHSwHqRBnYYKD3YbwAk2jzDSfrEzhBCkGehUq7oqkwq1XZwcV74qJMrpaD95u3AgPzPjyoUyJnU6QwZtikhv","","1","","2018-01-09 13:24:07");
INSERT INTO payment_methods VALUES("4","STRIPE - (CARD)","stripe_1511858583h6.png","1","sk_test_aat3tzBCCXXBkS4sxY3M8A1B","pk_test_AU3G7doZ1sbdpJLj0NaozPBu","","1","","2018-01-09 13:23:56");
INSERT INTO payment_methods VALUES("5","SKRILL","skrill_1516266573h7.png","1","merchant-email@example.com","AU3G7doZ1sbdpJLj0NaozPBu","","1","2018-01-04 10:00:00","2018-01-18 01:09:33");
INSERT INTO payment_methods VALUES("6","CoinPayment","coin_1516266580h7.png","1","669e817074849967cad1ba0313ea8b3b","ba0313ea8b3b","http://localhost/softwarezon_signal_mod/coinpayment-ipn","1","","2018-01-18 01:09:40");





CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `fetured` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO posts VALUES("1","1","1","But I must explain to mistaken","but-i-must-explain-to-mistaken","kd8UqzYTO1Me8AaZZdAU.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","6","2017-11-19 03:36:45","2017-12-08 19:27:36");
INSERT INTO posts VALUES("2","1","1","\'Doing daily chores can help older women live longer\'","doing-daily-chores-can-help-older-women-live-longer","YGDdu0zhCnEHoJRSBzUB.jpg","as,adsasd,sadsad,asdsad","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","103","2017-11-19 03:38:08","2017-12-29 12:00:56");
INSERT INTO posts VALUES("3","1","1","What is Lorem Ipsum?","what-is-lorem-ipsum","AxkYblZe86xPIAkf43uS.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","0","1","4","2017-11-19 03:39:08","2018-10-13 12:24:11");
INSERT INTO posts VALUES("4","1","1","Where does it come from?","where-does-it-come-from","oRZu9uQR1ayT9PQpcQTb.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","23","2017-11-19 03:40:01","2017-12-29 12:34:47");
INSERT INTO posts VALUES("5","1","1","Bitcoin Price Tops $9,000","bitcoin-price-tops-9000","fUwGNqrLWmy5kCR4tmPk.png","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","8","2017-11-19 03:45:16","2017-12-29 12:00:39");
INSERT INTO posts VALUES("6","1","1","As Price Eyes $10,000, Bitcoin","as-price-eyes-10000-bitcoin","XJZ9mTzNjWhX7OQjQueL.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><div><br></div>","1","1","42","2017-11-19 03:46:19","2017-12-29 12:00:31");
INSERT INTO posts VALUES("7","1","3","1914 translation by H. Rackham","1914-translation-by-h-rackham","awiiUaeknABaPKZD51wT.jpg","sef,asd,aedwqr,wqerwqr,qwrdwqer","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><div><br></div>","1","0","4","2017-11-19 03:47:13","2017-12-29 12:00:24");
INSERT INTO posts VALUES("8","1","1","Bitcoin, Ether Prices Surge to Fresh All-Time Highs","bitcoin-ether-prices-surge-to-fresh-all-time-highs","VeSm5vEJ7AIBWe1rNYpt.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><div><br></div>","1","1","17","2017-11-19 03:48:19","2017-12-29 12:33:04");
INSERT INTO posts VALUES("9","1","3","$10,000 Today? Bitcoin Price Looks Primed to Break Barrier","10000-today-bitcoin-price-looks-primed-to-break-barrier","oPGyi2FhuhDlGfeRLCWS.jpg","softwarezon,softwarezon.com.","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","20","2017-11-26 18:03:19","2017-12-24 14:28:14");
INSERT INTO posts VALUES("10","1","3","$300 Billion: Bitcoin Price Boosts Crypto","300-billion-bitcoin-price-boosts-crypto","OqyocokyhwqhNzhE6MvX.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","34","2017-11-26 18:04:14","2017-12-29 12:32:49");
INSERT INTO posts VALUES("11","1","4","cumque nihil impedit quo minus id quod maxime","cumque-nihil-impedit-quo-minus-id-quod-maxime","sumhFnGGvS5WKQzo3T3v.jpg","ass,as,d,er,ert","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","0","3","2017-11-26 18:05:40","2017-12-24 14:27:54");
INSERT INTO posts VALUES("12","1","3","Bitcoin Price Tops $10,000 on Korean Exchanges","bitcoin-price-tops-10000-on-korean-exchanges","jK6aw4awklQnqvlOvAMp.png","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","16","2017-11-26 18:06:23","2017-12-08 19:28:52");
INSERT INTO posts VALUES("13","1","3","Sample Post With Featured Image","sample-post-with-featured-image","VrWkLuFW9Yep8T4R5SCK.jpg","hasan,softwarezon","What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>","0","1","7","2017-12-08 18:44:51","2018-10-13 12:19:40");





CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'seller.png',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sellers VALUES("1","2","Sabbirs","4124153246","admin@gmail.coms","seller.png","Uttaras","$2y$10$sbxBju/GFq8I.yDw8JoPSODwY6RHRegEOh5c/XbgH58pDcn7cn52u","1","2019-07-21 13:58:03","2019-07-21 15:32:45");
INSERT INTO sellers VALUES("3","2","Sabbir","0348948452","admin@gmail.com","seller.png","airput","$2y$10$UQP7E2b2ijYOzpt.CW52j.6duAbSG5KiWOqfDWX4baHQX7fPRoHga","1","2019-07-21 14:58:28","2019-07-21 14:58:28");





CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sliders VALUES("18","slider_1514150743.jpg","BitCoin","BitCoin e-Commerce here","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s","2017-12-24 13:25:44","2017-12-24 13:25:44");
INSERT INTO sliders VALUES("19","slider_1514150806.jpg","LiteCoin","BitCoin e-Commerce here","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s","2017-12-24 13:26:46","2017-12-24 13:26:46");





CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO socials VALUES("3","Facebook","<i class=\"fa fa-facebook\" aria-hidden=\"true\"></i>","https://www.facebook.com/softwarezon","2017-08-19 05:25:30","2017-12-01 01:44:54");
INSERT INTO socials VALUES("5","twitter","<i class=\"fa fa-twitter\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 05:29:52","2017-12-01 01:45:17");
INSERT INTO socials VALUES("6","linkedin","<i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 05:30:23","2017-12-01 01:45:23");
INSERT INTO socials VALUES("7","Google plus","<i class=\"fa fa-google-plus\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 05:32:35","2017-12-01 01:45:29");
INSERT INTO socials VALUES("8","Instragram","<i class=\"fa fa-instagram\" aria-hidden=\"true\"></i>","#","2017-12-08 14:38:45","2017-12-08 14:39:06");





CREATE TABLE IF NOT EXISTS `specialities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO specialities VALUES("2","Analytics","<i class=\"fa fa-line-chart speciality-fa\"></i>","<span style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" text-align:=\"\" center;\"=\"\">Duis autem vel eum iriure dolor in in vulputate velit esse molestie consequat.</span><br>","2017-11-23 10:40:49","2017-11-25 21:14:49");
INSERT INTO specialities VALUES("3","Comfort","<i class=\"fa fa-indent\"></i>","<span style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" text-align:=\"\" center;\"=\"\">Duis autem vel eum iriure dolor in in vulputate velit esse molestie consequat.</span><br>","2017-11-23 10:42:19","2017-11-25 21:13:16");
INSERT INTO specialities VALUES("4","Professional","<i class=\"fa fa-sliders\" aria-hidden=\"true\"></i>","<span style=\"color: rgb(112, 112, 112); font-family: Poppins, sans-serif; font-size: 15px;\">Pixel prefect design is our exprtize. We are looking for the wow!</span><br>","2017-12-10 23:36:34","2017-12-10 23:36:34");
INSERT INTO specialities VALUES("5","Experience","<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>","<span style=\"color: rgb(112, 112, 112); font-family: Poppins, sans-serif; font-size: 15px;\">Our clients is the target and the inspiration of our work! We care .</span><br>","2017-12-10 23:37:30","2017-12-10 23:37:30");
INSERT INTO specialities VALUES("6","Building","<i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i>","Our clients is the target and the inspiration of our work! We care","2017-12-10 23:38:12","2017-12-24 14:03:03");
INSERT INTO specialities VALUES("7","Awesome","<i class=\"fa fa-cogs\" aria-hidden=\"true\"></i>","<span style=\"color: rgb(141, 151, 173); font-family: Montserrat, sans-serif; font-size: 16px;\">Our clients is the target and the inspiration of our work! We care&nbsp;</span><br>","2017-12-10 23:39:14","2017-12-24 14:02:39");





CREATE TABLE IF NOT EXISTS `store_fuels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fuel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO store_fuels VALUES("10","4","50","0","2019-07-23 20:55:12","2019-07-23 20:55:12");
INSERT INTO store_fuels VALUES("11","3","80","0","2019-07-23 20:55:21","2019-07-23 20:55:21");
INSERT INTO store_fuels VALUES("12","5","76","0","2019-07-23 20:55:29","2019-07-23 20:55:29");
INSERT INTO store_fuels VALUES("13","3","100","0","2019-07-23 20:55:37","2019-07-23 20:55:37");





CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subscribes VALUES("1","admin@gmail.com","2017-11-23 12:32:56","2017-11-23 12:32:56");
INSERT INTO subscribes VALUES("2","admin@admin.com","2017-11-23 12:34:12","2017-11-23 12:34:12");





CREATE TABLE IF NOT EXISTS `transaction_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email_expire` datetime DEFAULT NULL,
  `phone_expire` datetime DEFAULT NULL,
  `expire_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_status` tinyint(1) NOT NULL DEFAULT '0',
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_status` tinyint(1) DEFAULT '0',
  `plan_id` int(11) NOT NULL,
  `plan_status` tinyint(1) NOT NULL DEFAULT '0',
  `coupon_status` tinyint(1) DEFAULT '0',
  `signal_status` tinyint(1) NOT NULL DEFAULT '0',
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("7","Staff Rahman","staff@gmail.com","01716199668088","","","","","$2y$10$7J5Z2bj9Gyd47/S8YLAA3unTrM0TrGJNT79wwlN1bLFCG7xbT1fh6","VTTXIR","0","","","1","0","","0","5","0","0","0","0","0","XOxpMXvQ34f6lE3aGYQF64h3tG5qnCb36FeRc85564V9CNfY7h0mN5BVHG2k","2017-12-10 07:14:56","2017-12-10 07:14:56");
INSERT INTO users VALUES("9","Habiba Himu","habiba@gmail.com","01716199668223","","","","","$2y$10$x4i8dvp82Pk7nVwUwq5ZnuKfsBdPnzpo4FVfSQ5qBYhJpBswMzZlq","V30BWS","0","","","2018-01-25 02:06:03","1","","1","2","1","0","0","0","0","ccgnZzQBSnEqXBOKgkHTZ8nXm1zgOkQS8vj9FNI6HqgQlqYEpSw8jxizbZZD","2017-12-10 10:06:49","2017-12-13 09:47:43");
INSERT INTO users VALUES("10","Staff Rahman","adminww@admin.com","01974473009944","","","","","$2y$10$C98tQwyMhx94C473eVr8XuqFbZyC0utXbe.mhJNQNZ9Wwp1RX7cgS","NE3IXI","0","","","2018-02-11 14:30:29","1","","1","3","0","0","0","0","1","o8sE763oQNIyIOIoqaJexank3OscnzKh7L5HpndfqcbxgPm7r5CWX5Xw1Y9O","2017-12-13 00:30:29","2018-01-21 14:11:40");
INSERT INTO users VALUES("11","Harun or Rasid","harun@gmail.com","017161996680999","","","","","$2y$10$uYD5b1TENEzzA.pTYVmOR.6ooTFqMVJ7KRDpjTHaQQWfmRFtmTuWW","MHBC7A","0","","","2018-02-11 21:01:45","1","96181","1","3","1","1","0","0","1","SCdbs7QsZljHdy9ScTMWn5kKectcDMPxC5b6ArA90xx5Djp5QDFu0jeZCyRU","2017-12-13 06:58:48","2017-12-13 09:44:46");
INSERT INTO users VALUES("12","Ruhul","ruhul@gmail.com","0899989991","","","","","$2y$10$5TtRVg218EqSuEvR01XyaeBI9kQ5z5SAbeC7vDUbdQ42wJzxYyheO","LXQJIL","0","","","2018-02-13 16:40:59","0","95402","0","3","0","0","0","0","0","","2017-12-15 02:40:59","2017-12-15 03:47:46");
INSERT INTO users VALUES("13","Hosen Mahmud","hosen@gmail.com","01716194545","","","","","$2y$10$J7TixFEIxuH.TOSVS0ydoO0njhKfG8B9iBTHnEk/FG4ttlOeYiHYC","GDYWES","0","","","2018-01-29 20:56:41","0","74023","0","2","0","0","0","0","0","","2017-12-15 06:56:41","2017-12-15 06:56:41");
INSERT INTO users VALUES("20","Staff Rahman","hellomrhasan@gmail.com","1974447300","3wtzC6vlGmjYh9hM","468822649","880","1514588488.jpg","$2y$10$XxmnF11ZCtQmg4AxoV/5heZy7dCHxrQV4RR/kIKHOaL9fUyfvS2ti","Y0Y58O","0","2018-01-22 04:15:13","2018-01-22 04:24:39","1","1","66602","1","5","1","1","1","0","0","syNwbZACzChCfklOuFqCCSgd8inTxa2RRZPQS3z6gVly8hgcfd13SN5dgLWj","2017-12-18 11:04:42","2018-01-21 14:31:45");
INSERT INTO users VALUES("21","Masud Rana","masud@gmail.com","1752369856","","","880","","$2y$10$a1vx0Wvb6hcUmJjvkkznKufjFwrKYo/62n1yhp0XpI9o0elS22erK","AFFKHK","0","2017-12-31 20:25:56","","2018-03-01 14:42:26","1","91163","1","5","0","0","0","0","0","ziVtnzfuv9MKIioZhXxwOCZJq4O1HC1CvGckMY8euAuvn05jVmFGnr5rLm6a","2017-12-31 00:42:26","2017-12-31 06:36:12");





CREATE TABLE IF NOT EXISTS `withdraw_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` tinyint(4) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO withdraw_logs VALUES("5","GINHURQ9FM0R","20","3","150","12","Email : hellomrhasan@gmail.com","1","2018-01-20 13:01:13","2018-01-20 14:10:51");
INSERT INTO withdraw_logs VALUES("6","W1DFTA5OLKX6","20","5","100","10","Payonner Email : hellomrhasan@gmail.com","2","2018-01-20 13:05:36","2018-01-20 13:10:24");
INSERT INTO withdraw_logs VALUES("7","FF1R5ZRTX7BE","20","3","100","12","hellomrhasan@gmail.com","1","2018-01-20 14:08:17","2018-01-20 14:09:27");
INSERT INTO withdraw_logs VALUES("8","TCVUUWSG23RC","20","5","100","10","Payonner Email : hellomrhasan@gmail.com","2","2018-01-21 14:29:23","2018-01-21 14:29:59");





CREATE TABLE IF NOT EXISTS `withdraw_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `withdraw_min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO withdraw_methods VALUES("2","Paypal","withdraw_method1515309919.png","7","100","200","10","1","2018-01-06 22:52:44","2018-01-06 23:25:19");
INSERT INTO withdraw_methods VALUES("3","Perfect Money","withdraw_method1515309951.png","7","100","200","12","1","2018-01-06 23:25:51","2018-01-06 23:25:51");
INSERT INTO withdraw_methods VALUES("4","BTC Wallet","withdraw_method1515309994.png","7","100","200","20","1","2018-01-06 23:26:34","2018-01-06 23:26:34");
INSERT INTO withdraw_methods VALUES("5","Payonner","withdraw_method1515853058.png","7","100","150","10","1","2018-01-13 06:17:39","2018-01-13 06:17:39");



