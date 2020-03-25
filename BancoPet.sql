-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para petshop
CREATE DATABASE IF NOT EXISTS `petshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `petshop`;

-- Copiando estrutura para tabela petshop.animal
CREATE TABLE IF NOT EXISTS `animal` (
  `idanimal` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  `idcliente` int(11) DEFAULT 0,
  `idtipo` int(11) DEFAULT NULL,
  `descricao` tinytext DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idanimal`),
  KEY `idcliente` (`idcliente`),
  KEY `idtipo` (`idtipo`),
  CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE,
  CONSTRAINT `idtipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo_animal` (`idtipo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.animal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.consulta
CREATE TABLE IF NOT EXISTS `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idveterinario` int(11) DEFAULT NULL,
  `idanimal` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `idstatus` int(11) DEFAULT 0,
  `data_registro` datetime DEFAULT NULL,
  `observacoes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `idveterinario` (`idveterinario`),
  KEY `idanimal` (`idanimal`),
  KEY `idstatus` (`idstatus`),
  CONSTRAINT `idanimal` FOREIGN KEY (`idanimal`) REFERENCES `animal` (`idanimal`) ON DELETE CASCADE,
  CONSTRAINT `idstatus` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE CASCADE,
  CONSTRAINT `idveterinario` FOREIGN KEY (`idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.status
CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL DEFAULT 0,
  `nome_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.status: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`idstatus`, `nome_status`) VALUES
	(1, 'Pendente'),
	(2, 'Concluída'),
	(3, 'Cancelada');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.tipo_animal
CREATE TABLE IF NOT EXISTS `tipo_animal` (
  `idtipo` int(11) NOT NULL,
  `nome_tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.tipo_animal: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_animal` DISABLE KEYS */;
INSERT INTO `tipo_animal` (`idtipo`, `nome_tipo`) VALUES
	(1, 'Cachorro'),
	(2, 'Gato');
/*!40000 ALTER TABLE `tipo_animal` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuario`, `senha`, `idusuario`) VALUES
	('admin', 'admin123', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.vacina_animal
CREATE TABLE IF NOT EXISTS `vacina_animal` (
  `idvacina` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_veterinario` int(11) DEFAULT NULL,
  `id_animal` int(11) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`idvacina`),
  KEY `id_veterinario` (`id_veterinario`),
  KEY `id_animal` (`id_animal`),
  CONSTRAINT `id_animal` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`idanimal`) ON DELETE CASCADE,
  CONSTRAINT `id_veterinario` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.vacina_animal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vacina_animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacina_animal` ENABLE KEYS */;

-- Copiando estrutura para tabela petshop.veterinario
CREATE TABLE IF NOT EXISTS `veterinario` (
  `idveterinario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  PRIMARY KEY (`idveterinario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela petshop.veterinario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `veterinario` DISABLE KEYS */;
/*!40000 ALTER TABLE `veterinario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
