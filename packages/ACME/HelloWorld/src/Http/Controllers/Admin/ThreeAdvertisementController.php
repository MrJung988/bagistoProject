<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;

class ThreeAdvertisementController extends Controller
{
    public function index()
    {
        $images = HelloWorld::where('banner_type', 'three')->get();
        return view('helloworld::admin.three-advertisement', ['images'=> $images]);
    }

    public function addImage()
    {
        return view('helloworld::admin.add-images.threeImages');
    }

    public function storeThreeImage(Request $request)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'banner_title' => 'required',
            'image' => 'required',
            'banner_type' => '',
            'banner_hyperlink' => 'required',
        ]);

        
        if($request->hasFile('image')){
            $images = $request->image;
            $extension = $images->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            Image:: make($images)->save(public_path('images/advertisement_banner/ThreeAdsBanner/'.$filename));
        }

        $image = HelloWorld::create([
            'banner_title' => $request->banner_title,
            'image' => $filename,
            'banner_type' => $request->banner_type,
            'banner_hyperlink' => $request->banner_hyperlink,
        ]);
        if($image){
            return redirect()->route('helloworld.admin.three-advertisement');
        }else{
            return back();
        }
    }

    public function editImage($id)
    {
        $values = HelloWorld:: find($id);
        return view('helloworld::admin.edit-images.threeImages', ['values'=> $values]);
    }

    public function updateImage(Request $request, $id){
        $values = HelloWorld:: find($id);
            $values-> banner_title = $request->banner_title;
            $values-> image = $request->image;
            $values-> banner_type = $request->banner_type;
            $values-> banner_hyperlink = $request->banner_hyperlink;
            $values-> save();

            return redirect()->route('helloworld.admin.three-advertisement');
    }

    public function deleteImage($id){
        HelloWorld:: destroy($id);
        return redirect()->route('helloworld.admin.three-advertisement');
    }
}