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
}
