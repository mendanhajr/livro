@extends('layout.master')

@section('content')
    <h1>
        Livros
    </h1>

    <div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        Nome do livro:
                    </th>
                    <th>
                        Descrição do livro:
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($listLivros as $livro)
                    <tr>
                        <td>
                            {{$livro->txt_nome_livro}}
                        </td>
                        <td>
                            {{$livro->txt_descricao_livro}}
                        </td>
                        <td>
                            <a href="{{route('livros.edit', $livro->id)}}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form method="POST" action="/livros/{{$livro->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('livros.create')}}" class="btn btn-success">Cadastrar Livros</a>
        </div>
    </div>
@endsection
