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


CREATE TABLE materiais(
    id_material INT PRIMARY KEY AUTO_INCREMENT,
    nome_material VARCHAR(200),
    qtd_material INT,
    preco FLOAT(10,2),
    fk_fornecedor INT,
    fk_categoria INT,
    fk_marca INT,

    FOREIGN KEY(fk_fornecedor) REFERENCES fonecedores(id_fornecedor),
    FOREIGN KEY(fk_fornecedor) REFERENCES categorias(id_categoria),
    FOREIGN KEY(fk_fornecedor) REFERENCES marcas(id_marca)
);

CREATE TABLE pedido(
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    qtd INT,
    data_entrada timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    fk_material INT,
    fk_projeto INT,
    preco INT,
    fk_usuario INT,
    FOREIGN KEY(fk_projeto) REFERENCES cliente(id_cliente),
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

CREATE TABLE logg(
    id INT PRIMARY KEY AUTO_INCREMENT,
    qtd INT,
    preco INT,
    fk_pedido INT,
    fk_material INT,
    projeto VARCHAR(100),
    fk_usuario INT,
    datalog timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (fk_material) REFERENCES material(id_material),
    FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario)
);



