@extends('layout.master')

@section('content')
<h1>
    Cadastrar Livros
</h1>
<form method="POST" action="/livros">
    @csrf
    <label>
        Nome do Livro:
        <input type="text" name="txt_nome_livro">
    </label>
    <label>
        Descrição do Livro:
        <input type="text" name="txt_descricao_livro">
    </label>
    <button type="submit">Salvar</button>
</form>
@endsection
