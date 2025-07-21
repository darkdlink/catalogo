<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        $categorias = Categoria::all();
        
        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function apiIndex(Request $request)
    {
        $query = Produto::with('categoria');

        if ($request->has('nome') && !empty($request->nome)) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('categoria_id') && !empty($request->categoria_id)) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $produtos = $query->get();

        return response()->json($produtos);
    }
}