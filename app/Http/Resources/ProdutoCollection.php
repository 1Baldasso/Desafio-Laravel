<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoCollection extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date = date_create($this->created_at);
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'valor' => $this->valor,
            'ativo' => $this->ativo,
            'estoque' => $this->estoque,
            'data' => date_format($date,'d/m/Y')
        ];
    }
}
