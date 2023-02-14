<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoCollection;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->all();
        return ProdutoCollection::collection($produtos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resposta = Produto::validateRequest($request,'create');
        if($resposta->getStatusCode()!=200)
            return $resposta;

        $this->produto->create($request->all());
        $resposta = response()->json('Registro Criado', 202);
        return $resposta;
    }

    /**
     * Display the specified resource.
     *
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return $produto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $resposta = Produto::validateRequest($request);
        if($resposta->getStatusCode()!=200)
            return $resposta;

        $produto->update($request->all());
        $resposta = response()->json('Registro atualizado', 200);
        return $resposta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        if($produto->delete())
        {
            return response()->json('Registro' . $produto->nome . 'excluído',200);
        }
    }
}
