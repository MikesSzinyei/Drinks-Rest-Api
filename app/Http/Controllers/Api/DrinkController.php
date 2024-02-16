<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Drink;
Use App\Http\Resources\Drink as DrinkResource;
Use App\Http\Controllers\Api\ResponseController;
Use App\Http\Controllers\Api\TypeController;
Use App\Http\Controllers\Api\PackageController;
use App\Http\Requests\DrinkAddChecker;

class DrinkController extends ResponseController
{
    public function getDrinks(){

        $drinks= Drink::with("type","package")->get();
        return $this->sendResponse(DrinkResource::collection($drinks),"Italok betöltve");
    }
    public function getDrink(Request $request){
        $name= $request["drink"];
        $drink = Drink::where("drink",$name)->first();

        if(is_null($drink)){
            return $this->sendError("Null","Nincs ilyen ital");
        }
        return $this->sendResponse(DrinkResource::make($drink),"$name megtalálva");
    }

    public function newDrink(DrinkAddChecker $request){
        $request->validated();
        $input=$request->all();

        $drink= new Drink;
        $drink->drink=$input["drink"];
        $drink->amount=$input["amount"];
        $drink->type_id=(new TypeController)->getTypeId($input["type"]);
        $drink->package_id=(new PackageController)->getPackageId($input["package"]);

        $drink->save();
        return $this->sendResponse($drink,"Ital kiírva");
    }

    public function modifyDrink(DrinkAddChecker $request){
        $request->validated();
        $input = $request->all();
        $id=$input["id"];

        $drink= Drink::find($id);
        $drink->drink=$input["drink"];
        $drink->amount=$input["amount"];
        $drink->type_id=(new TypeController)->getTypeId($input["type"]);
        $drink->package_id=(new PackageController)->getPackageId($input["package"]);

        $drink->save();
        return $this->sendResponse($drink,"Ital kírva.");
    }

    public function deleteDrink(Request $request){
         $id = $request["id"];

         $drink = DRink::find($id);
         $drink->delete();
         return $this->sendResponse ($drink, "Ital törölve");
    }
}