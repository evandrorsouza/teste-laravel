<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Exibe o tipo no log (opcional para teste)
        // \Log::info('Tipo do usuário logado: ' . $user->tipo);

        if (!in_array($user->tipo, $roles)) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}

