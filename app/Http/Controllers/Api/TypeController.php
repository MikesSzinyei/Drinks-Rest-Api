<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Resources\Type as TypeResource;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Requests\TypeChecker;

class TypeController extends ResponseController
{
    public function getTypes(){
        $types = Type::all();
        return $this->sendResponse(TypeResource::collection($types),"Fajták betöltve");
    }
    
    public function getTypeId($typeName){
        $type = Type::where("type",$typeName)->first();
        $id = $type->id;
        return $id; 
    }

    public function addType(TypeChecker $request) {
        $request->validated();
        $input = $request->all();

        $type = new Type;
        $type->type = $input["type"];
        $type->save();
        return $this->sendResponse($type, "Tpíus kiírva");
    }

    public function modifyType(TypeChecker $request) {
        $request->validated();
        $input = $request->all();

        $type = Type::find($input["id"]);
        $type->type = $input["type"];
        $type->save();
        return $this->sendResponse($type, "Típus módosítva");
    }

    public function deleteType(Request $request) {
        $id=$request["id"];
        $type = Type::find($id);
        $type->delete();
        return $this->sendResponse($type, "Típus törölve");
    }

}
