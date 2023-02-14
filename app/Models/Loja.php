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
}
