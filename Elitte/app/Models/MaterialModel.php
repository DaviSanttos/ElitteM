<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table            = 'materiais';
    protected $primaryKey       = 'id_material';
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nome_material", "qtd_materia", "preco", "fk_fornecedor", "fk_categoria", "fk_marca", "fk_loc"];


    public function getMateriais($filtro = ""){

        $query = $this->db->query("SELECT M.id_material,M.nome_material, M.preco, M.qtd_material, F.nome_fornecedor, C.nome_categoria, MC.nome_marca FROM materiais M 
        INNER JOIN fornecedores F 
        ON M.fk_fornecedor = F.id_fornecedor
        INNER JOIN categorias C 
        on M.fk_categoria = C.id_categoria
        INNER JOIN marcas MC 
        ON M.fk_marca = MC.id_marca where M.nome_material LIKE '$filtro%'");
        return $results = $query->getResultArray();
    }

    public function saveAs($arr) {
        $builder = $this->db->table("tb_material");
        $builder->insert($arr);

        return true;
    }

    public function getPreco($id) {
        $query = $this->db->query("SELECT preco FROM materiais 
        where id_material = $id");

        return $query->getRow();
    }
}
