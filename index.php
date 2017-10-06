<?php
//Autoload
$loader = require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

//rotas Usuarios
$app->get('/usuarios/', function() use ($app){
	(new \controllers\Usuario($app))->list();
});

$app->get('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->view($id);
});

$app->post('/usuarios/', function() use ($app){
	(new \controllers\Usuario($app))->new();
});

$app->put('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->update($id);
});

$app->delete('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->delete($id);
});

//rotas Encomenda
$app->get('/encomendas/', function() use ($app){
	(new \controllers\Encomenda($app))->list();
});

$app->get('/encomendas/:id', function($id) use ($app){
	(new \controllers\Encomenda($app))->view($id);
});

$app->post('/encomendas/', function() use ($app){
	(new \controllers\Encomenda($app))->new();
});

$app->put('/encomendas/:id', function($id) use ($app){
	(new \controllers\Encomenda($app))->update($id);
});

$app->delete('/encomendas/:id', function($id) use ($app){
	(new \controllers\Encomenda($app))->delete($id);
});

//rotas Produto
$app->get('/produtos/', function() use ($app){
	(new \controllers\Produto($app))->list();
});

$app->get('/produtos/:id', function($id) use ($app){
	(new \controllers\Produto($app))->view($id);
});

$app->post('/produtos/', function() use ($app){
	(new \controllers\Produto($app))->new();
});

$app->put('/produtos/:id', function($id) use ($app){
	(new \controllers\Produto($app))->update($id);
});

$app->delete('/produtos/:id', function($id) use ($app){
	(new \controllers\Produto($app))->delete($id);
});

//rotas TipoProduto
$app->get('/tiposproduto/', function() use ($app){
	(new \controllers\TipoProduto($app))->list();
});

$app->get('/tiposproduto/:id', function($id) use ($app){
	(new \controllers\TipoProduto($app))->view($id);
});

$app->post('/tiposproduto/', function() use ($app){
	(new \controllers\TipoProduto($app))->new();
});

$app->put('/tiposproduto/:id', function($id) use ($app){
	(new \controllers\TipoProduto($app))->update($id);
});

$app->delete('/tiposproduto/:id', function($id) use ($app){
	(new \controllers\TipoProduto($app))->delete($id);
});

//rotas CategoriaProduto
$app->get('/categoriasproduto/', function() use ($app){
	(new \controllers\CategoriaProduto($app))->list();
});

$app->get('/categoriasproduto/:id', function($id) use ($app){
	(new \controllers\CategoriaProduto($app))->view($id);
});

$app->post('/categoriasproduto/', function() use ($app){
	(new \controllers\CategoriaProduto($app))->new();
});

$app->put('/categoriasproduto/:id', function($id) use ($app){
	(new \controllers\CategoriaProduto($app))->update($id);
});

$app->delete('/categoriasproduto/:id', function($id) use ($app){
	(new \controllers\CategoriaProduto($app))->delete($id);
});


//rotas Pagamento
$app->get('/pagamentos/', function() use ($app){
	(new \controllers\Pagamento($app))->list();
});

$app->get('/pagamentos/:id', function($id) use ($app){
	(new \controllers\Pagamento($app))->view($id);
});

$app->post('/pagamentos/', function() use ($app){
	(new \controllers\Pagamento($app))->new();
});

$app->put('/pagamentos/:id', function($id) use ($app){
	(new \controllers\Pagamento($app))->update($id);
});

$app->delete('/pagamentos/:id', function($id) use ($app){
	(new \controllers\Pagamento($app))->delete($id);
});

//rotas FormaPagamento
$app->get('/formaspagamento/', function() use ($app){
	(new \controllers\FormaPagamento($app))->list();
});

$app->get('/formaspagamento/:id', function($id) use ($app){
	(new \controllers\FormaPagamento($app))->view($id);
});

$app->post('/formaspagamento/', function() use ($app){
	(new \controllers\FormaPagamento($app))->new();
});

$app->put('/formaspagamento/:id', function($id) use ($app){
	(new \controllers\FormaPagamento($app))->update($id);
});

$app->delete('/formaspagamento/:id', function($id) use ($app){
	(new \controllers\FormaPagamento($app))->delete($id);
});

//rotas StatusEncomenda
$app->get('/statusencomenda/', function() use ($app){
	(new \controllers\StatusEncomenda($app))->list();
});

$app->get('/statusencomenda/:id', function($id) use ($app){
	(new \controllers\StatusEncomenda($app))->view($id);
});

$app->post('/statusencomenda/', function() use ($app){
	(new \controllers\StatusEncomenda($app))->new();
});

$app->put('/statusencomenda/:id', function($id) use ($app){
	(new \controllers\StatusEncomenda($app))->update($id);
});

$app->delete('/statusencomenda/:id', function($id) use ($app){
	(new \controllers\StatusEncomenda($app))->delete($id);
});

$app->run();
?>