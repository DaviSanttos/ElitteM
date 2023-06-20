<?php

namespace App\Models;

use CodeIgniter\Model;

class LoggModel extends Model
{
    protected $table            = 'logg';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['qtd','preco','fk_pedido','fk_material','projeto', 'fk_usuario'];


    public function getSaida($size){

        return $this->select("logg.qtd, logg.preco, logg.projeto, m.nome_material, f.nome_fornecedor, mc.nome_marca, c.nome_categoria, date_format(logg.datalog, '%d/%m/%Y') as dataS, us.nivel, logg.fk_usuario")
        ->join("materiais m", "m.id_material = logg.fk_material")
        ->join("fornecedores f", "m.fk_fornecedor = f.id_fornecedor")
        ->join("marcas mc", "m.fk_marca = mc.id_marca")
        ->join("categorias c", "m.fk_categoria = c.id_categoria")
        ->join("usuario us", "logg.fk_usuario = us.id_usuario")
        ->orderBy("logg.datalog DESC")
        ->paginate($size);
    }

}
