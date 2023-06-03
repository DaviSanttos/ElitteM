<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UsuarioModel extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome_usuario','senha','nivel'];

    public function logar($nome_usuario, $senha){
        $admin = $this->db->query("SELECT id_usuario, nome_usuario, senha 
            FROM usuario WHERE nome_usuario=?", [$nome_usuario])->getFirstRow("array");

        if(!$admin){
            throw new Exception("Senha incorreta ou usuário não encontrado");
        }

        if(!password_verify($senha, $admin["senha"])){
            throw new Exception("Senha incorreta ou usuário não encontrado");
        }

        return $admin["id_usuario"];

    }

    public function nivel($idUsuario){
        $admin = $this->db->query("SELECT nivel 
        FROM usuario WHERE id_usuario=?", [$idUsuario])->getFirstRow("array");

        return $admin["nivel"];
    }

    // inserts usuarios
    // insert into usuario(nome_usuario, senha, nivel) values("user", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 0);
    // insert into usuario(nome_usuario, senha, nivel) values("adm", "$2y$10$.wADUyVVO12LTvy789/GoObncLjcH8LJFs1Kb6KyLwMjuIPYxkMJK", 1);

}