<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MyFirstMiddleware
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    //Manipulando Request
    public function handle(Request $request, Closure $next)
    {   
        if(!Auth::check()){
            // dd($this->users->get());
            return $next($request);
        } else {
            dd("Usuário não logado");
        }
    }


    // manipulando a resposta
    // public function handle(Request $request, Closure $next)
    // {
    //     $response = $next($request);

    //     if($this->users->count() === 10){
    //         return ($response);
    //     } else {
    //         dd("Diferente de 10 usuarios");
    //     }

    // }
}
