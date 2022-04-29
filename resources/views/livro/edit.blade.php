<h1>
    Editar Livro
</h1>

<form method="POST" action="/livros/{{$livro->id}}">
    @csrf
    @method('PUT')
    <label>
        Nome do Livro:
        <input type="text" name="txt_nome_livro" value="{{$livro->txt_nome_livro}}">
    </label>
    <label>
        Descrição do Livro:
        <input type="text" name="txt_descricao_livro" value="{{$livro->txt_descricao_livro}}">
    </label>
    <button type="submit">Salvar</button>
</form>
