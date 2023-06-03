<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFiltro implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null)    {
        // if(session()->get("nivel") != "1"){
        //     return redirect()->to(base_url("/"));
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)   {
        if(session()->get("nivel") != "1"){
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Somente usuários permitidos tem acesso");
            return redirect()->to(base_url("/"));
        }
    }
}