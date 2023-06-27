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



insert into usuario(nome_usuario, senha, nivel) values("user", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 0);
insert into usuario(nome_usuario, senha, nivel) values("adm", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 1);


insert into categorias(id_categoria, nome_categoria) values ("0", "Acabamentos");
insert into categorias(id_categoria, nome_categoria) values ("0", "Acessórios");
insert into categorias(id_categoria, nome_categoria) values ("0", "Insumos");
insert into categorias(id_categoria, nome_categoria) values ("0", "Chapas");

insert into marcas(id_marca, nome_marca) values ("0", "Rehau");
insert into marcas(id_marca, nome_marca) values ("0", "Proadec");
insert into marcas(id_marca, nome_marca) values ("0", "Perfilare");
insert into marcas(id_marca, nome_marca) values ("0", "Hafele");

insert into fornecedores(id_fornecedor, nome_fornecedor) values ("0", "Gmad");
insert into fornecedores(id_fornecedor, nome_fornecedor) values ("0", "Madeiranit");
insert into fornecedores(id_fornecedor, nome_fornecedor) values ("0", "Rometal");
insert into fornecedores(id_fornecedor, nome_fornecedor) values ("0", "JC Tintas");


insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "FITA BORDA CARVALHO ÉVORA 35MM 20M", 68.05, 1,1,1);
insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "FITA BORDA MINT 22MM 20M
", 45.24, 1,1,1);
insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "FITA BORDA FREIJÓ PURO - ESSENCIAL WOOD 22MM 20M", 48.02 , 1,1,1);
insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "FITA BORDA TEKA BIANCO RAVENA 65MM", 96.00 , 1,1,1);



insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", 'PARAFUSO FRANC 5/16" X 6 
', 1.60, 3,3,4);
insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "CORREDIÇA TEL. 550MM
", 24.50, 3,3,4);



insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "CHAPA MDF CANOVAS 6MM
", 184.00, 2,4,2);
insert into materiais(id_material, nome_material,preco,fk_fornecedor,fk_categoria,fk_marca) values ("0", "CHAPA MDF ATENNA 15MM", 386.22,2,4,2);