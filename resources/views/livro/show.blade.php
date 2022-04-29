@extends('layout.master')

@section('content')
    <h1>
        Livros
    </h1>

    <div>
        <div>
            <table>
                <thead>
                <tr>
                    <td>
                        Nome do livro:
                    </td>
                    <td>
                        Descrição do livro:
                    </td>
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
                            <a href="{{route('livros.edit', $livro->id)}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('livros.create')}}">Cadastrar Livros</a>
        </div>
    </div>
@endsection
