<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MaterialModel;
use App\Models\ProjetoModel;
use App\Models\PedidoModel;
use App\Models\PedidoMaterialModel;


class PaginaAdmin extends BaseController
{
    public function index()
    {
        return view('template');
    }
    public function controle()
    {
        return view('controle');
    }
    public function materiais()
    {
        return view('materiais');
    }
    public function listaProjetos()
    {
        $projetoModel = new ProjetoModel();
        $dados['projetos'] = $projetoModel->findall();
        return view('projetoListagem',$dados);
    }
    public function telaProjeto($id = 0)
    {
        $materialModel = new MaterialModel();
        $projetoModel = new ProjetoModel();
        $pedidoModel = new PedidoModel();
        $dados['cliente'] = $projetoModel->find($id);
        $dados["materiais"] = $materialModel->findAll();
        $dados['materiais_pedido'] = $pedidoModel->getMateriais($id);
        // print_r($dados['materiais_pedido']);
        return view('projeto',$dados);
    }
    public function graficos()
    {
        $categoriaModel = new CategoriaModel();
        $results = $categoriaModel->getCategoriaPreco();
        return json_encode($results, JSON_UNESCAPED_UNICODE);
    }

    public function painel()
    {
        return view('painel');
    }
    public function sair()
    {
        return view('login');
    }

    // Envio de dados para a view materiais.php
    public function indexMateriais()
    {
        $materialModel = new MaterialModel();
        $dados["materiais"] = $materialModel->findAll();
        $dados["todos"] = $materialModel->getMateriais();

        return view("materiais", $dados);
    }
    public function pesquisar()
    {
        $materialModel = new MaterialModel();
        $dadosEnviados = $this->request->getPost();

        $dados = $materialModel->getMateriais($dadosEnviados["param"]);
        return json_encode($dados, JSON_UNESCAPED_UNICODE);
    // ---------------------------------------------

    }
    // Funções da view projeto.php
    public function finalizarProjeto($id){
        $projetoModel = new ProjetoModel();
        if ($projetoModel->delete($id)) {
            return redirect()->to(base_url("/projetoListagem"));
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Erro ao remover");
        }
    }

    public function novoProjeto()
    {
        $projetoModel = new ProjetoModel();
        $dadosEnviados = $this->request->getPost();

        $projetoModel->save($dadosEnviados);

        $dados['projetos'] = $projetoModel->findall();
        // return view('projetoListagem',$dados);
        return redirect()->to(base_url("/projetoListagem"));
    }

    public function buscarItem($filtro){
        // $dadosEnviados = $this->request->getPost();

        // $dados = $materialModel->getMateriais($dadosEnviados["param"]);
        // return json_encode($dados, JSON_UNESCAPED_UNICODE);

        $materialModel = new MaterialModel();

            $materiais = $materialModel->getMateriais($filtro);
            return json_encode($materiais, JSON_UNESCAPED_UNICODE);
            // exit;
    }

    public function salvarItem($fk,$qtd,$cli){
        $materialModel = new MaterialModel();
        $pedidoModel = new PedidoModel();
        $pedido_materialModel = new PedidoMaterialModel();
        $idm = $materialModel->getPreco($fk);

        $arr = [
            'qtd' => $qtd,
            'fk_material' => $fk,
            'fk_projeto' => $cli,
            'preco' => $idm->preco
        ];
        $pedidoModel->insert($arr);
        $pedido_id = $pedidoModel->getInsertID();     
        
        $arr2 = [
            'fk_pedido' => $pedido_id,
            'fk_material' => $fk,
            'preco' => $idm->preco
        ];

        print_r($arr2);
        $pedido_materialModel->save($arr2);
    }

    public function removerItem($id,$cli){
        $pedidoModel = new PedidoModel();

        $pedidoModel->delete($id);

        return redirect()->to(base_url("projeto/$cli"));
    }
}
