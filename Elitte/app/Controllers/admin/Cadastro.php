<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
// use App\Models\MaterialModel;

class Cadastro extends BaseController
{
    public function index()
    {
        // $materialModel = new MaterialModel();
        // $dados["materiais"] = $materialModel->getMateriais();
        // $dados["marcas"] = $materialModel->findAll();
        return view("admin/cadastro");
    }

    // public function cadastrar(){ 
    //     $modelMaterial = new MaterialModel();
    //     $dadosEnviados = $this->request->getPost();
    //     echo "<pre>";
    //     print_r($dadosEnviados);
    //     echo "<pre>";
    //     if($modelMaterial->saveAs($dadosEnviados)){
    //         return "sucesso";
    //         // session()->setFlashdata("tipo", "success");
    //         // session()->setFlashdata("mensagem","Item cadastadro com sucesso");
    //     }else{
    //         return "Erro";
    //         // session()->setFlashdata("tipo","danger");
    //         // session()->setFlashdata("mensagem","Erro ao cadastrar");
    //     }
    //     // return redirect()->to("/admin/ca");
    // }
}
?>