<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdemServicoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.home');
})->name('site.home');
Route::get('/site-about', function () {
    return view('site.about');
})->name('site.about');
Route::get('/site-panel', function () {
    return view('site.control_panel');
})->name('site.control_panel');
Route::get('/configuracoes', function () {
    return view('site.configuracoes');
})->name('site.configuracoes');

//Route::get('/', function () {
//return view('auth.login');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');

//Marca
Route::middleware('auth')->resource('/marca', 'App\Http\Controllers\MarcaController');


//fornecedor
Route::middleware('auth')->resource('/fornecedor', 'App\Http\Controllers\FornecedorController');

//produto
Route::middleware('auth')->resource('/produto', 'App\Http\Controllers\ProdutoController');

//equipamento
Route::middleware('auth')->resource('/equipamento', 'App\Http\Controllers\EquipamentoController');

//ordem de serviço
Route::middleware('auth')->resource('/ordem-servico', 'App\Http\Controllers\OrdemServicoController');

//ordem de serviço rota de pesquisas
Route::middleware('auth')->post('/filtro-os', [App\Http\Controllers\OrdemServicoController::class, 'index']);

//ordem de produção

Route::middleware('auth')->resource('/ordem-producao', 'App\Http\Controllers\OrdemProducaoController');

//entrada de produto
Route::middleware('auth')->resource('/entrada-produto', 'App\Http\Controllers\EntradaProdutoController');

Route::middleware('auth')->get(
    'produto_fornecedor/create',
    'App\Http\Controllers\ProdutoFornecedorController@create'
)->name('produto-fornecedor.create');

//produto-fornecedor
Route::middleware('auth')->post(
    'produto_fornecedor/store',
    'App\Http\Controllers\ProdutoFornecedorController@store'
)->name('produto-fornecedor.store');

Route::middleware('auth')->post(
    'produto_fornecedor/show',
    'App\Http\Controllers\ProdutoFornecedorController@show'
)->name('produto-fornecedor.show');

Route::middleware('auth')->delete(
    'produto_fornecedor/{produtoFornecedor}/{fornecedor}',
    'App\Http\Controllers\ProdutoFornecedorController@destroy'
)->name('produto-fornecedor.destroy');

Route::middleware('auth')->post(
    'produto_fornecedor/store/{fornecedor}',
    'App\Http\Controllers\ProdutoFornecedorController@store'
)->name('produto-fornecedor.store');

//recursos-ordem-producao
Route::middleware('auth')->post(
    'recursos-producao/store/{ordem_producao}',
    'App\Http\Controllers\RecursosProducaoController@store'
)->name('recursos-producao.store');

Route::middleware('auth')->post(
    'parada-equipamento/store/{ordem_producao}',
    'App\Http\Controllers\ParadaEquipamentoController@store'
)->name('parada-equipamento.store');

//busca o horimetro inicial de Ordem de produção via ajax
Route::middleware('auth')->get(
    'utils/get-horimetro-inicial',
    'App\Http\Controllers\UtilsController@getHorimetroInicial'
)->name('utils.get-horimetro-inicial');

//busca o horimetro inicial de recursos de produção via ajax.
Route::middleware('auth')->get(
    'utils/get-horimetro-inicial-recursos',
    'App\Http\Controllers\UtilsController@getHorimetroInicialRecursos'
)->name('utils.get-horimetro-inicial-recursos');
//busca ultimo registro de ordem de serviço ajax.
Route::middleware('auth')->get(
    'utils/get-last-id-os',
    'App\Http\Controllers\UtilsController@getLastIdOs'
)->name('get-last-id-os');

//busca ordem se serviços todas.
Route::middleware('auth')->get(
    'utils/get-todas-os',
    'App\Http\Controllers\UtilsController@getTodasOs'
)->name('get-todas-os');
//busca empresas
Route::middleware('auth')->post('/Empresas-filtro', [App\Http\Controllers\EmpresasController::class, 'index']);
Route::middleware('auth')->resource('/empresas', 'App\Http\Controllers\EmpresasController');
//Filtro Produtos
Route::middleware('auth')->post('/Produtos-filtro', [App\Http\Controllers\ProdutoController::class, 'index']);
//Rota saida de produtos
Route::middleware('auth')->resource('/Saida-produto', 'App\Http\Controllers\SaidaProdutoController');
Route::middleware('auth')->resource('/mostra-produto', 'App\Http\Controllers\SaidaProdutoController');
//Rota estoque de produtos
Route::middleware('auth')->resource('/Estoque-produto', 'App\Http\Controllers\EstoqueProdutoController');
//Rota pecas equipamentos
Route::middleware('auth')->resource('/Peca-equipamento', 'App\Http\Controllers\PecaEquipamentoController');
//Rota pedidos de compra
Route::middleware('auth')->resource('/pedido-compra', 'App\Http\Controllers\PedidoCompraController');
//Rota filtro pedido de entrada
Route::middleware('auth')->post('/Produtos-filtro', [App\Http\Controllers\EntradaProdutoController::class, 'index']);
//Rota pedidos de saida
Route::middleware('auth')->resource('/pedido-saida', 'App\Http\Controllers\PedidosSaidaController');
//Rota pedidos de saida
Route::middleware('auth')->resource('/pedido-saida-lista', 'App\Http\Controllers\PedidoSaidaListaController');
//Rota control panel
Route::middleware('auth')->resource('/control-panel', 'App\Http\Controllers\ControlPanelController');
//Rota Busca produto para dicionar item a pedidos
Route::middleware('auth')->resource('/item-produto', 'App\Http\Controllers\ItemProdutoController');
//Filtro Produtos item
Route::middleware('auth')->post('/item-produto-filtro', [App\Http\Controllers\ItemProdutoController::class, 'index']);
