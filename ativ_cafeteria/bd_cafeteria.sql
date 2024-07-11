CREATE DATABASE bd_cafeteria;
USE bd_cafeteria;

CREATE TABLE tb_produto(
Nome varchar(30) NOT NULL,
Preco NUMERIC(10,2) NOT NULL,
 PRIMARY KEY(Nome)
);

CREATE TABLE tb_pedido(
Codigo varchar(30) NOT NULL,
Quant_expresso NUMERIC(10,2),
Quant_capuccino NUMERIC(10,2),
Quant_salgado NUMERIC(10,2),
Quant_doce NUMERIC(10,2),
Total_pagar NUMERIC(10,2),
 PRIMARY KEY(Codigo)
);

INSERT INTO `tb_produto`(`Nome`, `Preco`) VALUES ('Expresso',2.50);
INSERT INTO `tb_produto`(`Nome`, `Preco`) VALUES ('Capuccino',4.00);
INSERT INTO `tb_produto`(`Nome`, `Preco`) VALUES ('Salgado',3.00);
INSERT INTO `tb_produto`(`Nome`, `Preco`) VALUES ('Doce',5.00);