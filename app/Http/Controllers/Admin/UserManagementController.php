<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    // Função para verificar permissões
    private function checkRole($role)
    {
        if (Auth::user()->role !== $role) {
            abort(403, 'Acesso negado'); // Retorna erro 403 se o usuário não tiver a role correta
        }
    }

    public function permissoes()
    {
        $this->checkRole('admin'); // Verifica se o usuário é 'admin'

        $usuarios = User::all();
        return view('permissoes', compact('usuarios'));
    }

    public function atualizarPermissao(Request $request)
    {
        $this->checkRole('admin'); // Verifica se o usuário é 'admin'

        // Recupera os dados dos campos enviados do formulário
        $tipo = $request->input('tipo'); // Recebe o array de tipos
        $gestao_produtos = $request->input('gestao_produtos'); // Recebe o array de permissões de produtos
        $gestao_categorias = $request->input('gestao_categorias'); // Recebe o array de permissões de categorias
        $gestao_marcas = $request->input('gestao_marcas'); // Recebe o array de permissões de marcas

        // Para cada usuário, atualize suas permissões
        foreach ($tipo as $userId => $userTipo) {
            $user = User::find($userId);
            if ($user) {
                // Atualiza o tipo do usuário
                $user->tipo = $userTipo;

                // Atualiza as permissões específicas
                $user->gestao_produtos = $gestao_produtos[$userId] ?? 0;
                $user->gestao_categorias = $gestao_categorias[$userId] ?? 0;
                $user->gestao_marcas = $gestao_marcas[$userId] ?? 0;

                $user->save(); // Salva as alterações
            }
        }

        return redirect()->route('permissoes')->with('success', 'Permissões atualizadas com sucesso');
    }

        private function verificarPermissao($permissao)
    {
        $user = Auth::user();

        if ($permissao == 'produtos' && !$user->gestao_produtos) {
            abort(403, 'Você não tem permissão para acessar a gestão de produtos.');
        }

        if ($permissao == 'categorias' && !$user->gestao_categorias) {
            abort(403, 'Você não tem permissão para acessar a gestão de categorias.');
        }

        if ($permissao == 'marcas' && !$user->gestao_marcas) {
            abort(403, 'Você não tem permissão para acessar a gestão de marcas.');
        }
    }

    public function produtos()
    {
        $this->verificarPermissao('produtos'); // Verifica se o usuário tem permissão para acessar produtos
        return view('produtos');
    }

    public function categorias()
    {
        $this->verificarPermissao('categorias'); // Verifica se o usuário tem permissão para acessar categorias
        return view('categorias');
    }

    public function marcas()
    {
        $this->verificarPermissao('marcas'); // Verifica se o usuário tem permissão para acessar marcas
        return view('marcas');
    }



    public function index()
    {
        $usuarios = User::all();
        return view('usuarios', compact('usuarios'));
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'tipo'     => 'required|in:admin,comum',
        ]);

        // Criação de usuário
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'tipo'     => $request->tipo,
            'gestao_produtos' => $request->has('gestao_produtos') ? 1 : 0,
            'gestao_categorias' => $request->has('gestao_categorias') ? 1 : 0,
            'gestao_marcas' => $request->has('gestao_marcas') ? 1 : 0,
        ]);

        return back()->with('success', 'Usuário criado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuário deletado.');
    }
}


/*namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserManagementController extends Controller
{
    // Função para verificar permissões
    private function checkRole($role)
    {
        if (Auth::user()->role !== $role) {
            abort(403, 'Acesso negado'); // Retorna erro 403 se o usuário não tiver a role correta
        }
    }

    public function permissoes()
    {
        $this->checkRole('admin'); // Verifica se o usuário é 'admin'

        $usuarios = User::all();
        return view('permissoes', compact('usuarios'));
    }

    public function atualizarPermissao(User $user)
    {
        $this->checkRole('admin'); // Verifica se o usuário é 'admin'

        // Lógica para atualizar permissões do usuário
        $user->tipo = request()->tipo;
        $user->save();

        return redirect()->route('permissoes')->with('success', 'Permissão atualizada com sucesso');
    }
}


* namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function permissoes()
    {
        $usuarios = User::all();
        return view('permissoes', compact('usuarios'));
    }

    public function atualizarPermissao(Request $request, User $user)
    {
        $request->validate([
            'tipo' => 'required|in:admin,comum',
        ]);

        $user->tipo = $request->tipo;
        $user->save();

        return back()->with('success', 'Permissão atualizada.');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'tipo'     => 'required|in:admin,comum',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'tipo'     => $request->tipo,
        ]);

        return back()->with('success', 'Usuário criado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuário deletado.');
    }
}
 */