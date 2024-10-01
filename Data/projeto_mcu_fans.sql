CREATE DATABASE projeto_mcu_fans;
USE projeto_mcu_fans;

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'mcu@admin.com',
  `senha` varchar(255) NOT NULL DEFAULT 'admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administradores` (`id`, `email`, `senha`) VALUES
(1, 'mcu@admin.com', 'admin123');

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `comentario` text,
  `data_avaliacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_lancamento` date NOT NULL,
  `diretor` varchar(100) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios_comuns` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;