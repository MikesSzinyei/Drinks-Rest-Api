<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Package extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "Csomagolás"=>$this->package
        ];
    }
}
