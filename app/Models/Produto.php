<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome','valor','ativo','estoque','loja_id'];
    
    public function loja()
    {
        return $this.belongsTo(Loja::class);
    }

    public static function validateRequest($request)
    {
        if(strlen($request->nome) > 60 || strlen($request->nome) < 3)
        {
            return response()->json('Nome deve ter mínimo 3 e no máximo 60 caracteres',500);
        }
        if(strlen($request->valor) > 6 || strlen($request->valor) < 2)
        {
            return response()->json($request->valor . ' deve ter entre 2 e 6 números',500);
        }
        return response(200);
    }
}
