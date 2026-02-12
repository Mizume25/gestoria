<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
class indexController extends Controller
{   
    //Primera pàgina  Default
    public function index()
    {
        return Inertia::render('auth/login', [
            'canResetPassword' => true,
            'canRegister' => true,
            'status' => session('status'),
        ]);
    }

    
}
