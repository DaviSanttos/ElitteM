<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table            = 'pedido';
    protected $primaryKey       = 'id_pedido';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ["qtd","fk_material","fk_projeto", "preco"];


    public function getMateriais($id){
        $query = $this->db->query("SELECT sum(p.qtd) 'qtd', p.preco, m.nome_material, nome_fornecedor, mc.nome_marca, nome_categoria from pedido p 
        inner join materiais m 
        on p.fk_material = m.id_material 
        inner join fornecedores f 
        on m.fk_fornecedor = f.id_fornecedor
        inner join marcas mc 
        on m.fk_marca = mc.id_marca
        inner join categorias c
        on m.fk_categoria = c.id_categoria where p.fk_projeto = $id group by m.id_material ");

        return $results = $query->getResultArray();
    }

}
