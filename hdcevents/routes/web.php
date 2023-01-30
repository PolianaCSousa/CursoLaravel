<?php

use Illuminate\Support\Facades\Route;

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

/*Com as rotas definimos a ponta inicial e final da aplicação, ou seja:
Ponta inicial: eu digo por onde o usuário acessa (URL)
Ponta final: eu retorno para o usuário o fim/resultado da manipulação dos dados (view resultante dessas manipulações)
Uma rota também pode retornar valores de variáveis por exemplo*/

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

Route::get('/events/{id}', [EventController::class, 'show']);



//criei uma nova rota cujo URL é /contato e que retona a view contato (contato.blade.php). Lembrando que a url não precisa ser igual À view (não precisa ter o mesmo nome). Eu também posso retornar a mesma view para urls diferentes
Route::get('/contato', function () {
    return view('contato');
});

