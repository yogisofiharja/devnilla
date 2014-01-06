CREATE TABLE IF NOT EXISTS `outbox` (
  `id_outbox` int(11) NOT NULL AUTO_INCREMENT,
  `id_contact` int(11) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_outbox`)
) 