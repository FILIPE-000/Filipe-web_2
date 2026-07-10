<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;

class BorrowingController extends Controller
{
public function store(Request $request, Book $book)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        
    ]);

    // Busca o usuário
$usuario = User::find($request->user_id);

// Verifica se o usuário possui débito pendente
if ($usuario->debit > 0) {
    return redirect()
        ->route('books.show', $book)
        ->with('error', 'Este usuário possui multas pendentes e não pode realizar novos empréstimos.');
}

    // Verifica se o livro já está emprestado
    $emprestimoAberto = Borrowing::where('book_id', $book->id)
        ->whereNull('returned_at')
        ->exists();

    if ($emprestimoAberto) {
        return redirect()
            ->route('books.show', $book)
            ->with('error', 'Este livro já está emprestado.');
    }

    // Conta quantos livros o usuário possui emprestados
    $quantidadeEmprestimos = Borrowing::where('user_id', $request->user_id)
        ->whereNull('returned_at')
        ->count();

    if ($quantidadeEmprestimos >= 5) {
        return redirect()
            ->route('books.show', $book)
            ->with('error', 'O usuário já possui 5 livros emprestados.');
    }

    Borrowing::create([
        'user_id' => $request->user_id,
        'book_id' => $book->id,
        'borrowed_at' => now(),
    ]);

    return redirect()
        ->route('books.show', $book)
        ->with('success', 'Empréstimo registrado com sucesso.');
}


public function returnBook(Borrowing $borrowing)
{
    // Data em que o livro foi emprestado
    $emprestimo = Carbon::parse($borrowing->borrowed_at);

    // Data atual (devolução)
    $devolucao = Carbon::now();

    // Quantidade de dias que o livro ficou emprestado
    $diasEmprestado = $emprestimo->diffInDays($devolucao);

    // Se passou do prazo de 15 dias, calcula a multa
    if ($diasEmprestado > 15) {

        // Dias de atraso
        $diasAtraso = $diasEmprestado - 15;

        // Multa: R$ 0,50 por dia
        $multa = $diasAtraso * 0.50;

        // Busca o usuário e soma a multa ao débito atual
        $usuario = User::find($borrowing->user_id);

        $usuario->debit += $multa;

        $usuario->save();
    }

    // Registra a devolução
    $borrowing->update([
        'returned_at' => now(),
    ]);

    return redirect()
        ->route('books.show', $borrowing->book_id)
        ->with('success', 'Devolução registrada com sucesso.');
}

public function userBorrowings(User $user)
{
    $borrowings = $user->books()->withPivot('borrowed_at', 'returned_at')->get();

    return view('users.borrowings', compact('user', 'borrowings'));
}


}
