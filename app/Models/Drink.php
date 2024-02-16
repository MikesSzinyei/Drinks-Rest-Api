<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Package;

class Drink extends Model
{
    use HasFactory;
    
    protected $fillable =[
        "drink",
        "amount",
        "type_id",
        "package_id"
    ];
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
}
