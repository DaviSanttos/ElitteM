<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MaterialModel;
use App\Models\CategoriaModel;
use App\Models\FornecedorModel;
use App\Models\MarcaModel;
use PHPUnit\Framework\Constraint\JsonMatches;

class Material extends BaseController
{
    public function index()
    {
        $marcaModel = new MarcaModel();
        $fornecedorModel = new FornecedorModel();
        $categoriaModel = new CategoriaModel();
        $materialModel = new MaterialModel();

        $dados["marcas"] = $marcaModel->findAll();
        $dados["fornecedores"] = $fornecedorModel->findAll();
        $dados["categorias"] = $categoriaModel->findAll();
        $dados["materiais"] = $materialModel->findAll();
        $dados["todos"] = $materialModel->getMateriais();


        return view("admin/materiais", $dados);
    }


    public function cadastrar()
    {
        $modelMaterial = new MaterialModel();
        $dadosEnviados = $this->request->getPost();

        if($dadosEnviados["nome_material"] == ""){
            session()->setFlashdata("tipo", "warning");
            session()->setFlashdata("mensagem", "Material não pode ser cadastrado");
            return redirect()->to(base_url("/admin/Material"));
        }

        if ($modelMaterial->save($dadosEnviados)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem", "Material cadastrado com sucesso");
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Erro ao cadastrar o Material");
        }
        return redirect()->to(base_url("/admin/Material"));
    }

    public function deletar($id)
    {
        $materialModel = new MaterialModel();
        if ($materialModel->delete($id)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem", "Material removido com sucesso");
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Erro ao remover");
        }
        return redirect()->to(base_url("/admin/Material"));
    }

    public function atualizar()
    {
        $materialModel = new MaterialModel();
        $dadosAtualizados = $this->request->getPost();
        $id = $dadosAtualizados["id_material"];

        if ($materialModel->update($id, $dadosAtualizados)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem", "Material alterado com sucesso");
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Erro ao alterar");
        }
        return redirect()->to(base_url("/admin/Material"));
    }

    public function pesquisar()
    {
        $materialModel = new MaterialModel();
        $dadosEnviados = $this->request->getPost();

        $dados = $materialModel->getMateriais($dadosEnviados["param"]);
        return json_encode($dados, JSON_UNESCAPED_UNICODE);
    }
}
?>