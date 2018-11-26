CREATE TABLE `placar`.`score` 
( `id` INT NOT NULL AUTO_INCREMENT ,
 `nome` VARCHAR(50) NOT NULL , `pontos` INT NOT NULL ,
 PRIMARY KEY (`id`)) 
ENGINE = MyISAM;

INSERT INTO `score`(`id`, `nome`, `pontos`) VALUES (1,'player1',0)

INSERT INTO `score`(`id`, `nome`, `pontos`) VALUES (2,'player2',0)