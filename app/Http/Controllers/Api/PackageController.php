<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ResponseController;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Resources\Package as PackageResource;
use App\Http\Requests\PackageChecker;

class PackageController extends ResponseController
{
    public function getPackages(){
        $packages = Package::all();
        return $this->sendResponse(PackageResource::collection($packages),"Csomagok betöltve");

    }
    public function addPackage(PackageChecker $request) {
        $request->validated();
        $input = $request->all();

        $package = new Package;
        $package->package = $input["package"];
        $package->save();
        return $this->sendResponse($package, "Kiszerelés kiírva");
    }

    public function getPackageId($packageName){
        $package = Package::where("package",$packageName)->first();
        $id = $package->id;
        return $id; 
    }

    public function modifyPackage(PackageChecker $request) {
        $request->validated();
        $input = $request->all();

        $package = Package::find($input["id"]);
        $package->package = $input["package"];
        $package->save();
        return $this->sendResponse($package, "Kiszerelés módosítva");
    }

    public function deletePackage(Request $request) {
        $id=$request["id"];
        $package = Package::find($id);
        $package->delete();
        return $this->sendResponse($package, "Kiszerelés törölve");
    }

}
