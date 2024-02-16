<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Drink extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->id,
            "Italnév"=>$this->drink,
            "Mennyiség"=>$this->amount,
            "Típus"=>$this->type->type,
            "Kiszerelés"=>$this->package->package,
        ];
    }
}
