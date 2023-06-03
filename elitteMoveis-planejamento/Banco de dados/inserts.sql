-- categoria

insert into tb_categoria (id_categoria, descricao) values (1, 'et ultrices posuere cubilia');
insert into tb_categoria (id_categoria, descricao) values (2, 'augue a suscipit nulla elit');
insert into tb_categoria (id_categoria, descricao) values (3, 'nisl ut volutpat sapien arcu');
insert into tb_categoria (id_categoria, descricao) values (4, 'quam pharetra magna ac consequat');
insert into tb_categoria (id_categoria, descricao) values (5, 'pellentesque quisque porta volutpat erat');
insert into tb_categoria (id_categoria, descricao) values (6, 'enim in tempor');
insert into tb_categoria (id_categoria, descricao) values (7, 'ligula in lacus curabitur at');
insert into tb_categoria (id_categoria, descricao) values (8, 'ipsum primis in');
insert into tb_categoria (id_categoria, descricao) values (9, 'diam id ornare');
insert into tb_categoria (id_categoria, descricao) values (10, 'sem duis aliquam');
insert into tb_categoria (id_categoria, descricao) values (11, 'quis lectus suspendisse potenti in');
insert into tb_categoria (id_categoria, descricao) values (12, 'habitasse platea dictumst morbi');
insert into tb_categoria (id_categoria, descricao) values (13, 'ac consequat metus');
insert into tb_categoria (id_categoria, descricao) values (14, 'ipsum dolor sit amet consectetuer');
insert into tb_categoria (id_categoria, descricao) values (15, 'suspendisse ornare consequat lectus');
insert into tb_categoria (id_categoria, descricao) values (16, 'euismod scelerisque quam turpis');
insert into tb_categoria (id_categoria, descricao) values (17, 'blandit non interdum');
insert into tb_categoria (id_categoria, descricao) values (18, 'at ipsum ac tellus');
insert into tb_categoria (id_categoria, descricao) values (19, 'nam congue risus semper porta');
insert into tb_categoria (id_categoria, descricao) values (20, 'ornare consequat lectus in est');


-- fornecedor
insert into tb_fornecedor (id_fornecedor, nome_fornecedor) values (1, 'Flipstorm');
insert into tb_fornecedor (id_fornecedor, nome_fornecedor) values (2, 'Edgeclub');
insert into tb_fornecedor (id_fornecedor, nome_fornecedor) values (3, 'Blogtags');
insert into tb_fornecedor (id_fornecedor, nome_fornecedor) values (4, 'Realcube');
insert into tb_fornecedor (id_fornecedor, nome_fornecedor) values (5, 'Oyope');


--inventario
insert into tb_inventario (id_inventario, nome_cliente) values (1, 'Fina');
insert into tb_inventario (id_inventario, nome_cliente) values (2, 'Georgiana');
insert into tb_inventario (id_inventario, nome_cliente) values (3, 'Catherina');

-- marca

insert into tb_marca (id_marca, nome_marca) values (1, 'Balistreri Inc');
insert into tb_marca (id_marca, nome_marca) values (2, 'Kutch-Larkin');
insert into tb_marca (id_marca, nome_marca) values (3, 'Schimmel, Von and Hills');
insert into tb_marca (id_marca, nome_marca) values (4, 'McClure, Greenholt and Rath');

-- material

insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (1, 'eget tempus vel', 'Steel', 27.29, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (2, 'dapibus at diam', 'Granite', 34.19, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (3, 'ac consequat metus', 'Vinyl', 21.94, 2);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (4, 'morbi a ipsum', 'Brass', 9.92, 3);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (5, 'sit amet eleifend', 'Stone', 19.5, 3);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (6, 'faucibus accumsan odio', 'Glass', 30.15, 2);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (7, 'vestibulum ac est', 'Brass', 34.48, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (8, 'ante vestibulum ante', 'Rubber', 24.25, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (9, 'tincidunt nulla mollis', 'Steel', 2.46, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (10, 'id luctus nec', 'Rubber', 49.29, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (11, 'commodo placerat praesent', 'Aluminum', 46.39, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (12, 'molestie hendrerit at', 'Aluminum', 44.38, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (13, 'ante ipsum primis', 'Brass', 24.77, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (14, 'luctus et ultrices', 'Plastic', 7.03, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (15, 'duis bibendum morbi', 'Stone', 30.68, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (16, 'ac tellus semper', 'Vinyl', 28.95, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (17, 'elementum ligula vehicula', 'Granite', 25.08, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (18, 'mattis nibh ligula', 'Rubber', 1.12, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (19, 'quis lectus suspendisse', 'Stone', 21.54, 1);
insert into tb_material (id_material, descricao, nome_material, peco, fk_categoria) values (20, 'vestibulum ante ipsum', 'Stone', 24.9, 1);

-- tb_fornecedor_material

insert into tb_fornecedor_material(fk_fornecedor,fk_material) values(1,1);
insert into tb_fornecedor_material(fk_fornecedor,fk_material) values(1,2);
insert into tb_fornecedor_material(fk_fornecedor,fk_material) values(1,3);

insert into tb_marca_material(fk_marca,fk_material) values(3,1);
insert into tb_marca_material(fk_marca,fk_material) values(1,3);
insert into tb_marca_material(fk_marca,fk_material) values(2,2);


-- tb_marca_material

insert into tb_marca_material(fk_marca,fk_material) values(3,1);
insert into tb_marca_material(fk_marca,fk_material) values(1,3);
insert into tb_marca_material(fk_marca,fk_material) values(2,2);



consultas 


SELECT M.nome_material "nome material", F.nome_fornecedor "nome fornecedor" FROM tb_material M 
inner join tb_fornecedor_material FM 
on M.id_material = FM.fk_material 
inner join tb_fornecedor F 
on FM.fk_fornecedor = F.id_fornecedor
inner join tb_categoria TC 
on M.fk_categoria = TC.id_categoria
inner join tb_marca_material MM
on M.id_material = MM.fk_material 
inner join tb_marca MC
on MM.fk_marca = MC.id_marca; 

