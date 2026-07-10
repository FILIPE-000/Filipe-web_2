@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Editor(a)</h1>

    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">password</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="password" value="{{ old('password') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="publisher_id" class="form-label">ID</label>
            <input type="number" class="form-control @error('publisher_id')
            is-invalid @enderror" id="publisher_id" name="publisher_id" required>
            @error('publisher_id')
                <div class="invalid-feedback">
                 {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Salvar
        </button>
        <a href="{{ route('publishers.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </form>
</div>
@endsection