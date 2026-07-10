@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Usuários com Débitos</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Débito</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

        @forelse($users as $user)

            <tr>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    R$ {{ number_format($user->debit,2,',','.') }}
                </td>

                <td>

                    <form action="{{ route('users.clearDebit',$user) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <button class="btn btn-success">
                            Quitar multa
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4">
                    Nenhum usuário possui débitos.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection