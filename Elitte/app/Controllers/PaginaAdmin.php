<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MaterialModel;
use App\Models\ProjetoModel;
use App\Models\PedidoModel;
use App\Models\PedidoMaterialModel;
use App\Models\LoggModel;


class PaginaAdmin extends BaseController
{
    public function index()
    {
        return view('template');
    }
    public function controle()
    {
        $pedidoModel = new PedidoModel;
        $dados['materiaisS'] = $pedidoModel->getSaida();
        // echo "<pre>";
        // print_r($dados);
        // echo "<pre>";
        // exit;
        return view('controle',$dados);
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
        // $id_usuario =  session()->get('id_usuario');
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
        $id_usuario =  session()->get('id_usuario');
        $pedido = $pedidoModel->find($id);

        $arrInLog = [
            'qtd' => $pedido["qtd"],
            'preco' => $pedido["preco"],
            'fk_pedido' => $pedido["id_pedido"],
            'fk_material' => $pedido["fk_material"],
            'fk_projeto' => $pedido["fk_projeto"],
            'fk_usuario' => $id_usuario
        ];

        $loggModel = new LoggModel();
        $loggModel->save($arrInLog);

        $pedidoModel->delete($id);

        return redirect()->to(base_url("projeto/$cli"));
    }

    public function subtrairItem($id,$qtd,$cli){
    $pedidoModel = new PedidoModel();
    $loggModel = new LoggModel();

    $id_usuario =  session()->get('id_usuario');

    $pedido = $pedidoModel->find($id);

    $arrInLog = [
        'qtd' => $pedido["qtd"] - $qtd,
        'preco' => $pedido["preco"],
        'fk_pedido' => $pedido["id_pedido"],
        'fk_material' => $pedido["fk_material"],
        'fk_projeto' => $pedido["fk_projeto"],
        'fk_usuario' => $id_usuario
    ];

        $loggModel->save($arrInLog);
        
    if($qtd == '0'){
        $arrInLog = [
            'qtd' => $pedido["qtd"],
            'preco' => $pedido["preco"],
            'fk_pedido' => $pedido["id_pedido"],
            'fk_material' => $pedido["fk_material"],
            'fk_projeto' => $pedido["fk_projeto"],
            'fk_usuario' => $id_usuario
        ];

        $loggModel->save($arrInLog);

        $pedidoModel->delete($id);
    }

    $arrAtualizado = [
        'id_pedido' => $id,
        'qtd' => $qtd
    ];

    $pedidoModel->save($arrAtualizado);
    
    return redirect()->to(base_url("projeto/$cli"));
    }

}
