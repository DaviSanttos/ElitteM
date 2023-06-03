<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoMaterialModel extends Model
{
    protected $table            = 'pedido_material';
    protected $primaryKey       = 'id_pedido_material';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ["fk_pedido", "fk_material" ,"preco"];

}
