<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table            = 'pedido';
    protected $primaryKey       = 'id_pedido';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ["qtd","fk_material","fk_projeto", "preco","fk_usuario"];


    public function getMateriais($id){
        $query = $this->db->query("SELECT p.id_pedido, p.qtd , p.preco, m.nome_material, nome_fornecedor, mc.nome_marca, nome_categoria from pedido p 
        inner join materiais m 
        on p.fk_material = m.id_material 
        inner join fornecedores f 
        on m.fk_fornecedor = f.id_fornecedor
        inner join marcas mc 
        on m.fk_marca = mc.id_marca
        inner join categorias c
        on m.fk_categoria = c.id_categoria where p.fk_projeto = $id");

        return $results = $query->getResultArray();
    }



    public function getSaidaMes($mes){
        $query = $this->db->query("SELECT l.qtd, l.preco,l.projeto, m.nome_material,f.nome_fornecedor, mc.nome_marca, c.nome_categoria, date_format(l.datalog, '%d/%m/%Y') as dataS, us.nivel, l.fk_usuario from logg l
        inner join materiais m 
        on l.fk_material = m.id_material
        inner join fornecedores f 
        on m.fk_fornecedor = f.id_fornecedor 
        inner join marcas mc 
        on m.fk_marca = mc.id_marca 
        inner join categorias c
        on m.fk_categoria = c.id_categoria 
        inner join usuario us
        on l.fk_usuario = us.id_usuario where l.datalog like '$mes%' order by l.datalog desc");

        return $results = $query->getResultArray();
    }


    public function getAllMateriais($filtro = ""){
        $query = $this->db->query("SELECT sum(p.preco*p.qtd) 'total', sum(p.qtd) 'qtd', m.nome_material,f.nome_fornecedor, mc.nome_marca, c.nome_categoria from pedido p
        inner join materiais m
        on p.fk_material = m.id_material 
        inner join fornecedores f 
        on m.fk_fornecedor = f.id_fornecedor 
        inner join marcas mc 
        on m.fk_marca = mc.id_marca
        inner join categorias c
        on m.fk_categoria = c.id_categoria  
        where M.nome_material LIKE '$filtro%'
        group by p.fk_material");

        return $results = $query->getResultArray();
    }

    public function getCategoriaPreco(){
        $query = $this->db->query("SELECT sum(p.preco*p.qtd) 'preco', c.nome_categoria from pedido p
        inner join materiais m
        on p.fk_material = m.id_material
        inner join categorias c 
        on m.fk_categoria = c.id_categoria
        group by c.nome_categoria order by SUM(p.preco*p.qtd) DESC");
        
        return $results = $query->getResultArray();
}

public function getReais(){
    $query = $this->db->query("SELECT sum(preco*qtd) 'real' from pedido");
    
    return $query->getRow();
}


}
