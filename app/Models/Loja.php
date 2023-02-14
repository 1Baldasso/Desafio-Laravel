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
        if(strlen($request->nome) > 60)
        {
            return response()->json('Nome deve ter no máximo 60 caracteres',500);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json($request->email . ' é um email inválido',500);
        }
        return response(200);
    }
}
