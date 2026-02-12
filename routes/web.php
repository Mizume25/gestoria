<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
//use Laravel\Fortify\Features;

/*Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//SINTAXI:
/*
method: POST;PUT;GET;
remot path: raiz web donde quiere ir
Inertia: 'route','propos (pueden ser arrays)' -> name('home') //Nombre de la ruta

Route::"method" ('remot path',function (){
    return 'Inertia'::render('route',[])-> name('nombre Ruta')
})

*/

//Iniciar login normal
Route::get('/', [indexController::class, 'index'])->name('home'); 

require __DIR__.'/settings.php';
