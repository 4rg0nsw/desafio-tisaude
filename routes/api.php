<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\{
    MedicoController,
    EspecialidadeController,
    ConsultaController,
    ProcedimentoController,
    PacienteController,
    PlanoSaudeController,
};

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});

Route::controller(MedicoController::class)->group(function () {
    Route::get('listmedico', 'index');
    Route::post('cadmedico', 'store');
    Route::get('medico/{id}', 'show');
    Route::put('medico/{id}', 'update');
    Route::delete('medico/{id}', 'destroy');
});

Route::controller(EspecialidadeController::class)->group(function () {
    Route::get('listespecialidade', 'index');
    Route::post('cadespecialidade', 'store');
    Route::get('especialidade/{id}', 'show');
    Route::put('especialidade/{id}', 'update');
    Route::delete('especialidade/{id}', 'destroy');
});

Route::controller(ConsultaController::class)->group(function () {
    Route::get('listconsulta', 'index');
    Route::post('cadconsulta', 'store');
    Route::get('consulta/{id}', 'show');
    Route::put('consulta/{id}', 'update');
    Route::delete('consulta/{id}', 'destroy');
});

Route::controller(ProcedimentoController::class)->group(function () {
    Route::get('listprocedimento', 'index');
    Route::post('cadprocedimento', 'store');
    Route::get('procedimento/{id}', 'show');
    Route::put('procedimento/{id}', 'update');
    Route::delete('procedimento/{id}', 'destroy');
});

Route::controller(PacienteController::class)->group(function () {
    Route::get('listpaciente', 'index');
    Route::post('cadpaciente', 'store');
    Route::get('paciente/{id}', 'show');
    Route::put('paciente/{id}', 'update');
    Route::delete('paciente/{id}', 'destroy');
});

Route::controller(PlanoSaudeController::class)->group(function () {
    Route::get('listplanosaude', 'index');
    Route::post('cadplanosaude', 'store');
    Route::get('planosaude/{id}', 'show');
    Route::put('planosaude/{id}', 'update');
    Route::delete('planosaude/{id}', 'destroy');
});

// Route::controller(PagamentoController::class)->group(function () {
//     Route::get('pagamentos', 'index');
//     Route::post('pagamento', 'store');
//     Route::get('pagamento/{id}', 'show');
//     Route::put('pagamento/{id}', 'update');
//     Route::delete('pagamento/{id}', 'destroy');
//     Route::get('cambio', 'cambio');
// });
