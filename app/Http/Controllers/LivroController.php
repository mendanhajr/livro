<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listLivros = Livro::all();

        return view('livro.show', ['listLivros' => $listLivros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('livro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try{
            Livro::create([
               'txt_nome_livro' =>$request->txt_nome_livro,
               'txt_descricao_livro' =>$request->txt_descricao_livro
            ]);

            return redirect()->route('livros.index');

        }catch (\Exception $e){

            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $livro = Livro::find($id);

        return view('livro.edit', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $livro = Livro::find($id);
            $livro->txt_nome_livro = $request->txt_nome_livro;
            $livro->txt_descricao_livro = $request->txt_descricao_livro;
            $livro->save();

            return redirect()->route('livros.index');

        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $livro = Livro::find($id);
            $livro->delete();

            return redirect()->route('livros.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
