<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FornecedorModel;

class Fornecedor extends BaseController {
    public function index(){
        $fornecedorModel = new FornecedorModel();
        $dados["fornecedores"] = $fornecedorModel->findAll();

        return view("admin/fornecedores", $dados);
    }

    public function cadastrar(){
        $fornecedorModel = new FornecedorModel();
        $dadosEnviados = $this->request->getPost();

        if($dadosEnviados["nome_fornecedor"] == ""){
            session()->setFlashdata("tipo", "warning");
            session()->setFlashdata("mensagem", "Fornecedor não pode ser cadastrado");
            return redirect()->to(base_url("/admin/Fornecedor"));
        }

        if($fornecedorModel->save($dadosEnviados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Fornecedor cadastadrado com sucesso");
        }else{
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem","Erro ao cadastrar o Fornecedor");
        }
        return redirect()->to(base_url("/admin/Fornecedor"));
    }

    public function deletar($id)
    {
        $fornecedorModel = new FornecedorModel();
        if($fornecedorModel->delete($id)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Fornecedor removido com sucesso");
        } else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao remover");
        }
        return redirect()->to(base_url("/admin/Fornecedor"));
    }

    public function atualizar(){
        $fornecedorModel = new FornecedorModel();
        $dadosAtualizados = $this->request->getPost();
        $id = $dadosAtualizados["id_fornecedor"];

        if($fornecedorModel->update($id,$dadosAtualizados)){
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem","Fornecedor alterado com sucesso");
        }else {
            session()->setFlashdata("tipo","danger");
            session()->setFlashdata("mensagem","Erro ao alterar");
        }
        return redirect()->to(base_url("/admin/Fornecedor"));
    }
}
?>