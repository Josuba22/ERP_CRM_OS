<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OportunidadeController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\CotacaoController;

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
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/criar', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/{produto}/editar', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');
Route::get('/fornecedores/criar', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/fornecedores', [FornecedorController::class, 'store'])->name('fornecedores.store');
Route::get('/fornecedores/{fornecedor}', [FornecedorController::class, 'show'])->name('fornecedores.show');
Route::get('/fornecedores/{fornecedor}/editar', [FornecedorController::class, 'edit'])->name('fornecedores.edit');
Route::put('/fornecedores/{fornecedor}', [FornecedorController::class, 'update'])->name('fornecedores.update');
Route::delete('/fornecedores/{fornecedor}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');

Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/criar', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/{funcionario}', [FuncionarioController::class, 'show'])->name('funcionarios.show');
Route::get('/funcionarios/{funcionario}/editar', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{funcionario}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::delete('/funcionarios/{funcionario}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/vendas/criar', [VendaController::class, 'create'])->name('vendas.create');
Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
Route::get('/vendas/{venda}', [VendaController::class, 'show'])->name('vendas.show');
Route::get('/vendas/{venda}/editar', [VendaController::class, 'edit'])->name('vendas.edit');
Route::put('/vendas/{venda}', [VendaController::class, 'update'])->name('vendas.update');
Route::delete('/vendas/{venda}', [VendaController::class, 'destroy'])->name('vendas.destroy');

Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
Route::get('/servicos/criar', [ServicoController::class, 'create'])->name('servicos.create');
Route::post('/servicos', [ServicoController::class, 'store'])->name('servicos.store');
Route::get('/servicos/{servico}', [ServicoController::class, 'show'])->name('servicos.show');
Route::get('/servicos/{servico}/editar', [ServicoController::class, 'edit'])->name('servicos.edit');
Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
Route::delete('/servicos/{servico}', [ServicoController::class, 'destroy'])->name('servicos.destroy');

// Rota para o Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para a Gestão de Estoque
Route::get('/estoque/baixo', [EstoqueController::class, 'estoqueBaixo'])->name('estoque.baixo');
// Adicione outras rotas para gestão de estoque conforme necessário

// Rotas do CRM
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
Route::get('/leads/criar', [LeadController::class, 'create'])->name('leads.create');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
Route::get('/leads/{lead}/editar', [LeadController::class, 'edit'])->name('leads.edit');
Route::put('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');
Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');

Route::get('/oportunidades', [OportunidadeController::class, 'index'])->name('oportunidades.index');
Route::get('/oportunidades/criar', [OportunidadeController::class, 'create'])->name('oportunidades.create');
Route::post('/oportunidades', [OportunidadeController::class, 'store'])->name('oportunidades.store');
Route::get('/oportunidades/{oportunidade}', [OportunidadeController::class, 'show'])->name('oportunidades.show');
Route::get('/oportunidades/{oportunidade}/editar', [OportunidadeController::class, 'edit'])->name('oportunidades.edit');
Route::put('/oportunidades/{oportunidade}', [OportunidadeController::class, 'update'])->name('oportunidades.update');
Route::delete('/oportunidades/{oportunidade}', [OportunidadeController::class, 'destroy'])->name('oportunidades.destroy');

Route::get('/atividades', [AtividadeController::class, 'index'])->name('atividades.index');
Route::get('/atividades/criar', [AtividadeController::class, 'create'])->name('atividades.create');
Route::post('/atividades', [AtividadeController::class, 'store'])->name('atividades.store');
Route::get('/atividades/{atividade}', [AtividadeController::class, 'show'])->name('atividades.show');
Route::get('/atividades/{atividade}/editar', [AtividadeController::class, 'edit'])->name('atividades.edit');
Route::put('/atividades/{atividade}', [AtividadeController::class, 'update'])->name('atividades.update');
Route::delete('/atividades/{atividade}', [AtividadeController::class, 'destroy'])->name('atividades.destroy');


// Rotas para Orçamentos
Route::get('/cotacoes', [CotacaoController::class, 'index'])->name('cotacoes.index');
Route::get('/cotacoes/criar', [CotacaoController::class, 'create'])->name('cotacoes.create');
Route::post('/cotacoes', [CotacaoController::class, 'store'])->name('cotacoes.store');
Route::get('/cotacoes/{cotacao}', [CotacaoController::class, 'show'])->name('cotacoes.show');
Route::get('/cotacoes/{cotacao}/editar', [CotacaoController::class, 'edit'])->name('cotacoes.edit');
Route::put('/cotacoes/{cotacao}', [CotacaoController::class, 'update'])->name('cotacoes.update');
Route::delete('/cotacoes/{cotacao}', [CotacaoController::class, 'destroy'])->name('cotacoes.destroy');
Route::get('/cotacoes/{cotacao}/pdf', [CotacaoController::class, 'downloadPdf'])->name('cotacoes.pdf');
Route::get('/cotacoes/{cotacao}/excel', [CotacaoController::class, 'downloadExcel'])->name('cotacoes.excel');


// Rotas para Relatórios (opcional)
// Adicione rotas para relatórios de vendas, produtos, comissões, etc.

// Rotas para Autenticação (opcional)
// Utilize as rotas de autenticação padrão do Laravel ou personalize conforme necessário

// Rotas para Autorização (opcional)
// Implemente rotas para autorização de acesso a recursos específicos