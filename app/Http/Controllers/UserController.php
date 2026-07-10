<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:admin,bibliotecario,cliente',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    // Lista usuários com débito
    public function debits()
    {
        $users = User::where('debit', '>', 0)->get();

        return view('users.debits', compact('users'));
    }

    // Zera o débito do usuário
    public function clearDebit(User $user)
    {
        $user->update([
            'debit' => 0,
        ]);

        return redirect()
            ->route('users.debits')
            ->with('success', 'Multa quitada com sucesso.');
    }
}