<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\Throwable;
use App\Models\Loja;
use App\Http\Resources\LojaResource;
use App\Http\Resources\LojaCollection;

class LojaController extends Controller
{

    private $loja;

    public function __construct(Loja $loja)
    {
        $this->loja = $loja;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lojas = $this->loja->all();
        return LojaCollection::collection($lojas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resposta = Loja::validateRequest($request,'create');
        if($resposta->getStatusCode()!=200)
            return $resposta;
        try
        {
            $this->loja->create($request->all());
            $resposta = response()->json('Registro Criado', 201);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $resposta = response()->json('Email já registrado', 400);
        }
        return $resposta;
    }

    /**
     * Display the specified resource.
     *
     * @param  Loja $loja
     * @return \Illuminate\Http\Response
     */
    public function show(Loja $loja)
    {
        return new LojaResource($loja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Loja $loja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loja $loja)
    {
        $resposta = Loja::validateRequest($request);
        if($resposta->getStatusCode()!=200)
            return $resposta;
        try
        {
            $loja->update($request->all());
            $resposta = response()->json('Registro atualizado', 202);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $resposta = response()->json('Email já registrado', 400);
        }
        return $resposta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Loja $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loja $loja)
    {
        if($loja->delete())
        {
            return response()->json('Registro' . $loja->nome . 'excluído',200);
        }
    }
}
