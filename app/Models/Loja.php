<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Loja extends Model
{
    protected $table = 'lojas';
    protected $fillable = ['nome', 'email'];
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
    public static function validateRequest($request)
    {
        if(strlen($request->nome) > 40 || strlen($request->nome) < 3)
        {
            return response()->json('Nome deve ter mínimo 3 e no máximo 40 caracteres',500);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json($request->email . ' é um email inválido',500);
        }
        return response(200);
    }
}
