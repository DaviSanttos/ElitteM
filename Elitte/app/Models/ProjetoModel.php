<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetoModel extends Model
{
    protected $table            = 'cliente';
    protected $primaryKey       = 'id_cliente';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nome_cliente', ''];

    // public function getPedidos(){
    //     $query = $this->db->query("SELECT nome_cliente FROM cliente");
    //     return $results = $query->getResultArray();
    // }

}

?>