<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all('id','name','image','slug');
        return view('admin.brands.brands', compact('brands'));
    }

    public function store(){
        $data = request()->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:App\Models\Brand',
            'image'=> 'required',
        ], [
            'name.required'=>'Nombre obligatorio',
            'slug.required'=>'Slug obligatorio',
            'image.required'=>'Imagen requerida'
        ]);

        $Brand = new Brand($data);

        $Brand->image = Image::store(request(), 'brands');

        if($Brand->save()){
            return redirect()->back()->with('success', 'Agregado correctamente!');
        }
        return request();
    }

    public function update(){
        $data = request()->validate([
            'brand_id'=> 'required',
            'name'=> 'required',
            'slug'=> 'required',
            'image'=>'nullable|image'
        ]);

        $brand = Brand::findOrFail($data['brand_id']);        
        $brand->update( request()->only('name','slug') );

        if(isset($data['image'])){
            Image::erase($brand->image);
            $brand->image = Image::store(request(), 'brands');
        }
        $brand->save();
        return redirect()->back()->with('success', 'Agregado correctamente!');
    }

    public function getByAjax($id){  
        return Brand::findOrFail($id);
    }

    public function delete(Brand $brand){
        Image::erase($brand->image);
        $brand->delete();
        return redirect()->back()->with('success', '¡Operación Exitosa!');;
    }
}
