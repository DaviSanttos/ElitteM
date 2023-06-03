<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\CategoriaModel;

class Categoria extends BaseController {
    public function index(){
        $categoriaModel = new CategoriaModel();
        $dados["categorias"] = $categoriaModel->findAll();
        return view("admin/categorias", $dados);
    }


    public function cadastrar(){
        $categoriaModel = new CategoriaModel();
        $dadosEnviados = $this->request->getPost();

        if($dadosEnviados["nome_categoria"] == ""){
            session()->setFlashdata("tipo", "warning");
            session()->setFlashdata("mensagem", "Categoria não pode ser cadastrada");
            return redirect()->to(base_url("/admin/Categoria"));
        }

        if($categoriaModel->save($dadosEnviados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Categoria cadastadrada com sucesso");
        }else{
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem","Erro ao cadastrar a Categoria");
        }
        return redirect()->to(base_url("/admin/Categoria"));
    }

    public function deletar($id)
    {
        $categoriaModel = new categoriaModel();
        if($categoriaModel->delete($id)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Categoria removida com sucesso");
        } else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao remover");
        }
        return redirect()->to(base_url("/admin/Categoria"));
    }

    public function atualizar(){
        $categoriaModel = new CategoriaModel();
        $dadosAtualizados = $this->request->getPost();
        print_r($dadosAtualizados);
        $id = $dadosAtualizados["id_categoria"];

        if($categoriaModel->update($id,$dadosAtualizados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Categoria alterada com sucesso");
        }else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao alterar");
        }
        return redirect()->to(base_url("/admin/Categoria"));
    }
}
?>