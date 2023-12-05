<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PublicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $mensagem = $request->session()->get("mensagem");
    return view('welcome')->with(['message' => $mensagem]);
})->name('welcome');

Route::get('cadastra-usuario', [LoginController::class, 'getNewUserView'])->name('cadastra-usuario');
Route::get('participar-grupo/{id}', [GroupController::class, 'enterInGroup'])->name('participar-grupo');
Route::get('buscar', [PublicationController::class, 'filterByTerm'])->name('buscar');
Route::get('obter-dados-grupo/{id}', [GroupController::class, 'getGroupData'])->name('obter-dados-grupo');
Route::get('like-publicacao/{id}', [PublicationController::class, 'like'])->name('like-publicacao');
Route::get('minhas-publicacoes', [PublicationController::class, 'myPublications'])->name('minhas-publicacoes');
Route::get('publicacoes-curtidas', [PublicationController::class, 'likedPublications'])->name('publicacoes-curtidas');
Route::post('salva-usuario', [LoginController::class, 'storeUser'])->name('salva-usuario');
Route::post('login', [LoginController::class, 'validateUser'])->name('login');
Route::post('salva-grupo', [GroupController::class, 'createGroup'])->name('salva-grupo');
Route::post('salva-publicacao', [PublicationController::class, 'createPublication'])->name('salva-publicacao');
Route::post('criar-comentário', [PublicationController::class, 'createComment'])->name('criar-comentário');
Route::post('edita-grupo', [GroupController::class, 'editGroup'])->name('edita-grupo');
Route::delete('remove-publicacao/{id}', [PublicationController::class, 'deletePublication'])->name('remove-publicacao');
Route::delete('remove-grupo/{id}', [GroupController::class, 'deleteGroup'])->name('remove-grupo');
Route::get('logout', [LoginController::class, 'logOut'])->name('logout');
Route::get('grupos', [GroupController::class, 'listGroups'])->name('grupos');

Route::get('timeline', [TimelineController::class, 'listPublications'])->name('timeline');
