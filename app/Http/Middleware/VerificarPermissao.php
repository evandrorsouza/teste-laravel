<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificarPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permissao
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissao)
    {
        $user = Auth::user();

        // Verifique se o usuário tem a permissão para acessar a página
        if (($permissao == 'produtos' && !$user->gestao_produtos) ||
            ($permissao == 'categorias' && !$user->gestao_categorias) ||
            ($permissao == 'marcas' && !$user->gestao_marcas)) {
            
            abort(403, 'Você não tem permissão para acessar esta página.');
        }

        return $next($request);
    }
}

