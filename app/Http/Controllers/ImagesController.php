<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = [
            'image_alt' => $request->image_alt,
            'belongs_to' => $request->belongs_to,
            'gallery_id' => $request->gallery_id,
            'gallery_type' => $request->gallery_type,
            'sort_order' => $request->sort_order,
        ];

        $image = Image::upload($request, $options);

        if(!$image){
            return response(['message'=> 'Error', 'data' => request()]);
        }

        return response(['message'=> 'success', 'data' => $image],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update($belongs_to = 'boats')
    {
        $oldImage = Image::findOrFail(request('image_id'));
        
        Image::erase($oldImage->image_src);
        
        $newImage = Image::store(request(), $belongs_to);

        $oldImage->image_src = $newImage;
        $oldImage->image_alt = request()->image_alt;

        $oldImage->save();  

        return $newImage;
    }

    public function storeOrUpdate(){
        $oldImage = Image::find(request('image_id')); 

        if($oldImage)  $this->update(request('belongs_to'));
        else $this->store(request());

        return redirect()->back()->with(['success' => 'Imagen Actualizada']);
    }

    public function destroy($image_id)
    {
        $image = Image::find($image_id);
        if($image){
            Image::erase($image->image_src);
            $image->delete();
            redirect()->back()->with(['success' => 'Imagen eliminada']);
        }
        return redirect()->back()->withErrors(['message' => 'Imagen no se pudo eliminar']);
    }
}
