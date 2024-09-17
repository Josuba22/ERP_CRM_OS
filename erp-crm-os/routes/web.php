<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\QuoteController;

/*
|--------------------------------------------------------------------------
| Rotas Web
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| contém o grupo de middleware "web". Agora crie algo incrível!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas do ERP
Route::resource('produtos', ProdutoController::class);
Route::resource('customers', CustomerController::class);
Route::resource('fornecedores', FornecedorController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('vendas', VendaController::class);
Route::resource('servicos', ServicoController::class);

// Rota para o Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para a Gestão de Estoque
Route::get('/stock/low', [EstoqueController::class, 'lowStock'])->name('stock.low');
// Adicione outras rotas para gestão de estoque conforme necessário

// Rotas do CRM
Route::resource('leads', LeadController::class);
Route::resource('opportunities', OpportunityController::class);
Route::resource('activities', ActivityController::class);

// Rotas para Orçamentos
Route::resource('quotes', QuoteController::class);
Route::get('/quotes/{quote}/pdf', [QuoteController::class, 'downloadPdf'])->name('quotes.pdf');
Route::get('/quotes/{quote}/excel', [QuoteController::class, 'downloadExcel'])->name('quotes.excel');

// Rotas para Relatórios (opcional)
// Adicione rotas para relatórios de vendas, produtos, comissões, etc.

// Rotas para Autenticação (opcional)
// Utilize as rotas de autenticação padrão do Laravel ou personalize conforme necessário

// Rotas para Autorização (opcional)
// Implemente rotas para autorização de acesso a recursos específicos
