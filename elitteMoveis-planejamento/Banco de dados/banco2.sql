CREATE DATABASE bd_estoque2;
USE bd_estoque2;

CREATE TABLE fornecedores(
    id_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
    nome_fornecedor VARCHAR(200)
);

CREATE TABLE marcas(
    id_marca INT PRIMARY KEY AUTO_INCREMENT,
    nome_marca VARCHAR(200)
);

CREATE TABLE categorias(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome_categoria VARCHAR(200)
);

CREATE TABLE usuario(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(200),
    senha VARCHAR(72),
    nivel INT
);

CREATE TABLE localizacao(
    coluna VARCHAR(4),
    linha VARCHAR(4)
);

CREATE TABLE materiais(
    id_material INT PRIMARY KEY AUTO_INCREMENT,
    nome_material VARCHAR(200),
    qtd_material INT,
    preco FLOAT(10,2),
    fk_fornecedor INT,
    fk_categoria INT,
    fk_marca INT,
    fk_loc INT,

    FOREIGN KEY(fk_fornecedor) REFERENCES fonecedores(id_fornecedor),
    FOREIGN KEY(fk_fornecedor) REFERENCES categorias(id_categoria),
    FOREIGN KEY(fk_fornecedor) REFERENCES marcas(id_marca),
    FOREIGN KEY(fk_fornecedor) REFERENCES localizacao(id_loc)
);

CREATE TABLE pedido(
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    qtd INT,
    data_entrada timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    fk_material INT,
    fk_projeto INT,
    preco INT,
    fk_usuario INT,
    FOREIGN KEY(fk_projeto) REFERENCES projetos(id_projeto),
    FOREIGN KEY(fk_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE pedido_material(
    fk_pedido INT,
    fk_material INT,
    preco INT,
    qtd INT,
    FOREIGN KEY (fk_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (fk_material) REFERENCES materiais(id_material)
);

CREATE TABLE cliente(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(50)
);

CREATE TABLE log(
    id INT PRIMARY KEY AUTO_INCREMENT,
    qtd INT,
    preco INT,
    datalog timestamp NULL DEFAULT CURRENT_TIMESTAMP
);


-- delimiter $
-- create trigger trg_cadped
-- after delete on pedido
-- for each row
-- begin
-- 	insert into log (qtd, preco)
--     values (concat(old.qtd,old.preco));
-- end$
-- delimiter ;

insert into usuario(nome_usuario, senha, nivel) values("user", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 0);
insert into usuario(nome_usuario, senha, nivel) values("adm", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 1);

