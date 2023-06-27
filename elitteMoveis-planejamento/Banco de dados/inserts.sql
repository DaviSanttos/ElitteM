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