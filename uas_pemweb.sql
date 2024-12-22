CREATE TABLE IF NOT EXISTS `databio` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `job` varchar(50) DEFAULT '',
  `gender` varchar(50) DEFAULT '',
  `mt_browser` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mt_ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;