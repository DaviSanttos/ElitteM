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
        return view('controle',$dados);
    }
    // public function materiais()
    // {
    //     return view('materiais');
    // }
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
    // public function graficos()
    // {
    //     $pedidoModel = new PedidoModel();
    //     $results["valores"] = $pedidoModel->getCategoriaPreco();
    //     return $results;
    // }

      public function SaidaMes($mes)
    {
        $pedidoModel = new PedidoModel();
        $dados = $pedidoModel->getSaidaMes($mes);
        // print_r($dados);
        return json_encode($dados, JSON_UNESCAPED_UNICODE);
        // return redirect()->to(base_url("/controle"));
    }


    public function painel()
    {
        $pedidoModel = new PedidoModel();
        $results["valores"] = $pedidoModel->getCategoriaPreco();
        return view('painel',$results);
    }
    public function sair()
    {
        return view('login');
    }

    // Envio de dados para a view materiais.php
    public function indexMateriais()
    {
        $pedidoModel = new PedidoModel();
        $dados["materiais"] = $pedidoModel->getAllMateriais();
        $dados["real"] = $pedidoModel->getReais();


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

    public function buscar()
    {
        $pedidoModel = new PedidoModel();
        $dadosEnviados = $this->request->getPost();

        $dados = $pedidoModel->getAllMateriais($dadosEnviados["param"]);
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
        $projetoModel = new ProjetoModel();
        $cliente = $projetoModel->find($cli);

        $id_usuario =  session()->get('id_usuario');
        $pedido = $pedidoModel->find($id);

        $arrInLog = [
            'qtd' => $pedido["qtd"],
            'preco' => $pedido["preco"],
            'fk_pedido' => $pedido["id_pedido"],
            'fk_material' => $pedido["fk_material"],
            'projeto' => $cliente["nome_cliente"],
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
    $projetoModel = new ProjetoModel();
    $cliente = $projetoModel->find($cli);

    $id_usuario =  session()->get('id_usuario');

    $pedido = $pedidoModel->find($id);

    $arrInLog = [
        'qtd' => $pedido["qtd"] - $qtd,
        'preco' => $pedido["preco"],
        'fk_pedido' => $pedido["id_pedido"],
        'fk_material' => $pedido["fk_material"],
        'projeto' => $cliente["nome_cliente"],
        'fk_usuario' => $id_usuario
    ];

        $loggModel->save($arrInLog);
        
    if($qtd == '0'){
        $arrInLog = [
            'qtd' => $pedido["qtd"],
            'preco' => $pedido["preco"],
            'fk_pedido' => $pedido["id_pedido"],
            'fk_material' => $pedido["fk_material"],
            'projeto' => $cliente["nome_cliente"],
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
