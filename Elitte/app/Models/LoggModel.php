<?php

namespace App\Models;

use CodeIgniter\Model;

class LoggModel extends Model
{
    protected $table            = 'logg';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['qtd','preco','fk_pedido','fk_material','projeto', 'fk_usuario'];
}
