# Autosaving  Form
## JavaScript sample für automatische Speicherung eins Formulars
Verwendet wird localStorage also ohne Server

## Test Database
In PGR Verfahren werden Daten im Datenbank gespeichert und wieder ausgelesen.

```
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `test`;

CREATE TABLE `form-test` (
  `test_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `farbe` int(11) NOT NULL,
  `sprache` char(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE USER 'test'@'localhost' IDENTIFIED VIA mysql_native_password USING 'test'`
GRANT SELECT,INSERT,UPDATE,DELETE ON `test`.`form-test` TO  'test'@'localhost'
```