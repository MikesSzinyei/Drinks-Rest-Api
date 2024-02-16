<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ResponseController;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Resources\Package as PackageResource;

class PackageController extends ResponseController
{
    public function getPackages(){
        $packages = Package::all();
        return $this->sendResponse(PackageResource::collection($packages),"Csomagok betöltve");

    }
    public function getPackageId($packageName){
        $package = Package::where("package",$packageName)->first();
        $id = $package->id;
        return $id; 
    }
}
