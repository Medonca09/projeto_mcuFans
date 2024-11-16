create database novo_banco_mcufans;
use novo_banco_mcufans;

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'mcu@admin.com',
  `senha` varchar(255) NOT NULL DEFAULT 'admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administradores` (`id`, `email`, `senha`) VALUES
(1, 'mcu@admin.com', 'admin123');

-- Tabela Usuários Comuns
CREATE TABLE `usuarios_comuns` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela Filmes
CREATE TABLE `filmes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  `data_lancamento` DATE NOT NULL,
  `diretor` VARCHAR(100) NOT NULL,
  `genero` VARCHAR(100) DEFAULT NULL,
  `imagem` VARCHAR(255) DEFAULT NULL,
  `data_adicao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela Avaliações
CREATE TABLE `avaliacoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `id_filme` INT(11) NOT NULL,
  `nota` INT(11) NOT NULL,
  `comentario` TEXT,
  `data_avaliacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios_comuns`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`id_filme`) REFERENCES `filmes`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
