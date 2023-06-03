<?php

namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model
{
        protected $table            = 'marcas';
        protected $primaryKey       = 'id_marca';
        protected $useAutoIncrement = true;

        protected $allowedFields = ["nome_marca"];
}