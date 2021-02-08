/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `criado` timestamp NULL DEFAULT NULL,
  `atualizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `veiculos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `versao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preco` double(10,2) NOT NULL,
  `localidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `criado` timestamp NULL DEFAULT NULL,
  `atualizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `agendamentos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,  
  `veiculo_id` bigint(20) unsigned NOT NULL,  
  `dia` date NOT NULL,
  `horario` time DEFAULT NULL,
  `criado` timestamp NULL DEFAULT NULL,
  `atualizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamentos_usuario_id_foreign` (`usuario_id`),
  KEY `agendamentos_veiculo_id_foreign` (`veiculo_id`),
  CONSTRAINT `agendamentos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `agendamentos_veiculo_id_foreign` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- INSERT usuarios
INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `senha`, `criado`, `atualizado`) VALUES
(1, 'marcelo', '11111111', 'marcelo@email.com', '123456', '2021-02-07 10:00:00', '2021-02-07 11:00:00');
INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `senha`, `criado`, `atualizado`) VALUES
(2, 'patricia', '22222222', 'patricia@email.com', '123456', '2021-02-07 10:00:00', '2021-02-07 11:00:00');

-- INSERT veiculos
INSERT INTO `veiculos` (`id`, `marca`, `modelo`, `versao`, `preco`, `localidade`, `imagem`, `criado`, `atualizado`) VALUES
(1, 'Fiate', 'Uno', '1.0', 10000.00, 'AV Brasil', '/images/1.jpg', '2021-02-08 01:18:49', '2021-02-08 01:18:49');
INSERT INTO `veiculos` (`id`, `marca`, `modelo`, `versao`, `preco`, `localidade`, `imagem`, `criado`, `atualizado`) VALUES
(2, 'Chevrolet', 'Prisma', '1.4', 15500.50, 'AV Paulista', '/images/2.jpg', '2021-02-08 01:21:03', '2021-02-08 01:21:03');

-- INSERT agendamentos
INSERT INTO `agendamentos` (`id`, `usuario_id`, `veiculo_id`, `dia`, `horario`, `criado`, `atualizado`) VALUES 
(1, 1, 1, '2021-02-08', '10:00:00', '2021-02-07 10:00:00', '2021-02-07 11:00:00');
INSERT INTO `agendamentos` (`id`, `usuario_id`, `veiculo_id`, `dia`, `horario`, `criado`, `atualizado`) VALUES 
(2, 1, 2, '2021-02-09', '11:00:00', '2021-02-07 10:00:00', '2021-02-07 11:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;