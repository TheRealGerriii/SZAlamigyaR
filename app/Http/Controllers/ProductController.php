<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends BaseController{

    public function index() {
        
        $product = Product::all();
        return $this->sendResponse(ProductResource::collection($product), "Sikeres kiiratás!");
    }
    public function store(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
            "name" => "required",
            "price" => "required",
            "material" => "required",
            "manufactured" => "required"
        ]);

        if( $validator->fails() ){
            return $this->sendError($validator->errors());
        }
        $product = Product::create($input);
        
        return $this->sendResponse(new ProductResource($product), "Sikeres Tárolás!"); 
    }
    public function show($id){
        $product = Product::find($id);
        if( is_null($product)){
            return $this->sendError("Nincs ilyen termék");
        }
        return $this->sendResponse(new ProductResource($product), "Termék betöltve");
    }
    public function update(Request $request, Product $product ) {
        $input = $request->all();
        $validator = Validator::make($input, [
            "name" => "required",
            "price" => "required",
            "material" => "required",
            "manufactured" => "required"
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $product->name = $input["name"];
        $product->price = $input["price"];
        $product->material = $input["material"];
        $product->manufactured = $input["manufactured"];
        $product->save();
        return $this->sendResponse(new ProductResource($product), "Sikeres adatmódosítás!");
    }
    public function destroy($id){
        
        Product::destroy($id);
        return $this->sendResponse([], "Termék sikeresen törölve!");
    }
    public function search($name) {

        $product = Product::where('name', 'like', '%'.$name.'%')->get();
        if(count($product)==0){
            return $this->sendError("Sikertelen keresés!");
        }
        return $this->sendResponse($product, "Sikeres keresés!");
    }
    public function filter($material) {
        $product = Product::where('material', '=', $material)->get();
        if(count($product)==0){
            return $this->sendError("Nincs ilyen anyag!");
        }
        return $this->sendResponse($product, "Van ilyen anyag!");
    }
}