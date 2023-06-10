<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PaginaAdmin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Autenticacao::login');
$routes->post('/logar', 'Autenticacao::logar');
$routes->get('/sair', 'Autenticacao::sair');

$routes->group("", ['filter' => 'user'], function($routes){
$routes->get('', 'PaginaAdmin::index');
$routes->get('controle', 'PaginaAdmin::controle');
$routes->get('materiais', 'PaginaAdmin::indexMateriais');
$routes->post('materiais/pesquisar', 'PaginaAdmin::pesquisar');
$routes->get('projetoListagem', 'PaginaAdmin::listaProjetos');
// $routes->get('/projeto', 'PaginaAdmin::telaProjeto');
$routes->get('projeto/finalizarProjeto/(:num)', 'PaginaAdmin::finalizarProjeto/$1');
$routes->get('painel', 'PaginaAdmin::painel');
// $routes->get('graficos', 'PaginaAdmin::graficos');

// funcoes para entrada de materiais
$routes->get('salvar/(:num)/(:num)/(:num)', 'PaginaAdmin::salvarItem/$1/$2/$3');
$routes->get('remover/(:num)/(:num)', 'PaginaAdmin::removerItem/$1/$2');
$routes->post('buscar', 'PaginaAdmin::buscar');
$routes->get('subtrair/(:num)/(:num)/(:num)', 'PaginaAdmin::subtrairItem/$1/$2/$3');

// $routes->get('/login', 'PaginaAdmin::sair');
$routes->post('projetoListagem/novoCliente', 'PaginaAdmin::novoProjeto');
$routes->get('projeto/(:num)', "PaginaAdmin::telaProjeto/$1");
});

$routes->group("admin", ['filter' => 'admin'], function($routes){
    $routes->get('materiais', "Admin\Material::index");
    $routes->get('material/deletar/(:num)', "Admin\Material::deletar/$1");
    $routes->post('material/cadastrar', "Admin\Material::cadastrar");
    $routes->post('material/atualizar', "Admin\Material::atualizar");
    $routes->post('material/pesquisar', "Admin\Material::pesquisar");

    $routes->get('categoria', "Admin\Categoria::index");
    $routes->post('categoria/cadastrar', "Admin\Categoria::cadastrar");
    $routes->get('categoria/deletar/(:num)', "Admin\Categoria::deletar/$1d");
    $routes->post('categoria/atualizar', "Admin\Categoria::atualizar");

    $routes->get('marca', "Admin\Marca::index");
    $routes->post('marca/cadastrar', "Admin\Marca::cadastrar");
    $routes->get('marca/deletar/(:num)', "Admin\Marca::deletar/$1");
    $routes->post('marca/atualizar', "Admin\Marca::atualizar");

    $routes->get('fornecedor', "Admin\Fornecedor::index");
    $routes->post('fornecedor/cadastrar', "Admin\Fornecedor::cadastrar");
    $routes->get('fornecedor/deletar/(:num)', "Admin\Fornecedor::deletar/$1");
    $routes->post('fornecedor/atualizar', "Admin\Fornecedor::atualizar");

});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
