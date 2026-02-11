<?php

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
Route::get('/', function () {
    return Inertia::render('auth/login', [
        'canResetPassword' => true, 
        'canRegister' => true,      
        'status' => session('status'),
    ]);
})->name('home'); // <--- ESTO ES LO QUE FALTA

require __DIR__.'/settings.php';
