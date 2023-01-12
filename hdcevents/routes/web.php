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

//criei uma nova rota cujo URL é /contato e que retona a view contato (contato.blade.php). Lembrando que a url não precisa ser igual À view (não precisa ter o mesmo nome). Eu também posso retornar a mesma view para urls diferentes
Route::get('/contato', function () {
    return view('contato');
});


Route::get('/produtos', function () { 
    return view('products');
});

//estou pedindo o parâmetro obrigatório {id} que será copiado para a variável $id da function e então vou poder retonar o valor de id por  meio do array 
Route::get('/produtos/{id}', function ($id) { 
    return view('produtos', ['id' => $id]);
});

//a ? no parâmetro torna ele opcional. Se o usuario passar, ele sera retornado pra view, mas se o usuário não passar nenhum parâmetro, será passado $id = null (valor que eu defini como default) 
Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('produtos', ['id'=>$id]);
});

Route::get('/produtos_q', function () { 
    $busca = request('search'); //se tiver alguma chave com esse nome na URL, o valor dela sera jogado dentro da variável busca
    return view('produtos', ['busca'=>$busca]);
});
