<?php

namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
        protected $table            = 'fornecedores';
        protected $primaryKey       = 'id_fornecedor';
        protected $useAutoIncrement = true;

        protected $allowedFields = ["nome_fornecedor"];
}