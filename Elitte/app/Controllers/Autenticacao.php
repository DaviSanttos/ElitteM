<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use Exception;

class Autenticacao extends BaseController
{
   public function login() {
       
       if(session()->has("id_usuario")){
           return redirect()->to(base_url("/materiais"));
        }
        return view("login");
    }
    
    public function sair(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("/"));
    }
   public function logar() {
    try {
        $nome_usuario = $this->request->getPost("nome_usuario");
        $senha = $this->request->getPost("senha");
        $usuarioModel = new UsuarioModel();
        $idUsuario = $usuarioModel->logar($nome_usuario,$senha);
        $nivel = $usuarioModel->nivel($idUsuario);
        session()->set("id_usuario", $idUsuario);
        session()->set("nivel", $nivel);
        // echo $_SESSION["nivel"];
        echo session()->get('nivel');
        return redirect()->to(base_url("/materiais"));
    }catch (Exception $erro) {
        session()->setFlashdata("tipo", "danger");
        session()->setFlashdata("aviso-login", $erro->getMessage());
        return redirect()->to(base_url("/"));
    }
}

}