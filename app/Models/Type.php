<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drink;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        "type"
    ];

    public function drink()
    {
        return $this->hasMany(Drink::class);
    }
}
