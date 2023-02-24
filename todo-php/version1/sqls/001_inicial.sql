CREATE DATABASE todov1 COLLATE 'utf8_unicode_ci';

CREATE TABLE tarefas (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    prazo DATE NOT NULL,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;
