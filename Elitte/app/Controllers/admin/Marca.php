<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\MarcaModel;

class Marca extends BaseController {
    public function index(){
        $marcaModel = new MarcaModel();
        $dados["marcas"] = $marcaModel->findAll(); 

        return view("admin/marcas",$dados);
    }

    public function cadastrar(){
        $marcaModel = new MarcaModel();
        $dadosEnviados = $this->request->getPost();

        if($dadosEnviados["nome_marca"] == ""){
            session()->setFlashdata("tipo", "warning");
            session()->setFlashdata("mensagem", "Marca não pode ser cadastrada");
            return redirect()->to(base_url("/admin/Marca"));
        }

        if($marcaModel->save($dadosEnviados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Marca cadastadrada com sucesso");
        }else{
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem","Erro ao cadastrar a Marca");
        }
        return redirect()->to(base_url("/admin/Marca"));
    }

    public function deletar($id)
    {
        $marcaModel = new MarcaModel();
        if($marcaModel->delete($id)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Marca removida com sucesso");
        } else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao remover");
        }
        return redirect()->to(base_url("/admin/Marca"));
    }

    public function atualizar(){
        $marcaModel = new MarcaModel();
        $dadosAtualizados = $this->request->getPost();
        $id = $dadosAtualizados["id_marca"];

        if($marcaModel->update($id,$dadosAtualizados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Marca alterada com sucesso");
        }else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao alterar");
        }
        return redirect()->to(base_url("/admin/Marca"));
    }
}
?>