<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
        protected $table            = 'categorias';
        protected $primaryKey       = 'id_categoria';
        protected $useAutoIncrement = true;

        protected $allowedFields = ["nome_categoria"];

        public function getCategoriaPreco(){
                $query = $this->db->query("SELECT C.nome_categoria,SUM(m.preco) as 'preco' from categorias c 
                inner join materiais m 
                on c.id_categoria = fk_categoria group by c.nome_categoria order by SUM(M.preco) DESC");
                return $results = $query->getResultArray();
        }
}