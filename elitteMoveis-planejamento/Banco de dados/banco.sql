CREATE DATABASE bd_estoque;
USE bd_estoque;

CREATE TABLE tb_material(
    id_material INT PRIMARY KEY AUTO_INCREMENT,
	qtd INT,
    nome_material VARCHAR(100),
    peco DECIMAL(10,2),
    descricao VARCHAR(100),
    fk_categoria INT,
    FOREIGN KEY (fk_categoria) REFERENCES tb_categoria(id_categoria)
);

CREATE TABLE tb_categoria(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(100)
);

CREATE TABLE tb_fornecedor(
    id_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
    nome_fornecedor VARCHAR(40)
);

CREATE TABLE tb_fornecedor_material(
    fk_fornecedor INT,
    fk_material INT,
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_fornecedor) REFERENCES tb_fornecedor(id_fornecedor)
);

CREATE TABLE tb_inventario(
    id_inventario INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(40),
	data_saida DATETIME,
	data_entrada DATETIME
);

CREATE TABLE tb_inventario_material(
    fk_inventario INT,
    fk_material INT, 
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_inventario) REFERENCES tb_inventario(id_inventario)
);

CREATE TABLE tb_marca(
    id_marca INT PRIMARY KEY AUTO_INCREMENT,
    nome_marca VARCHAR(40)
);

CREATE TABLE tb_marca_material(
    fk_marca INT,
    fk_material INT,
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_marca) REFERENCES tb_marca(id_marca)
);

CREATE TABLE tb_medida(
    id_medida INT PRIMARY KEY AUTO_INCREMENT,
    unidade_medida VARCHAR(40)
);

CREATE TABLE tb_medida_material(
    fk_medida INT,
    fk_material INT,
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_medida) REFERENCES tb_medida(id_medida)
);

CREATE TABLE tb_usuario(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(40),
    senha VARCHAR(30)   
);

CREATE TABLE tb_usuario_material(
    fk_usuario INT,
    fk_material INT,
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_usuario) REFERENCES tb_usuario(id_usuario)
);

CREATE TABLE tb_localizacao(
    id_localizacao INT PRIMARY KEY AUTO_INCREMENT,
    coluna VARCHAR(5),
    linha VARCHAR(5)   
);

CREATE TABLE tb_localizacao_material(
    fk_localizacao INT,
    fk_material INT,
    FOREIGN KEY (fk_material) REFERENCES tb_material(id_material),
    FOREIGN KEY (fk_localizacao) REFERENCES tb_localizacao(id_localizacao)
);