<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ApiController extends Controller
{
    public function create(Request $request){
        $product=new product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        // $product->price=$request->input('image');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extenstion =$file->getClientOriginalExtension();
            $filename =time().'.'.$extenstion;
            $file->move('uploads/product/',$filename);
            $product->image=$filename;
        }

        // if($request->hasFile('image'))
        // {
        //     // $file = $request->file('image')->store('uploads/product/');
        //     $file = $request->file('image');
        //     $extenstion =$file->getClientOriginalExtension();
        //     $filename =time().'.'.$extenstion;
        //     $file->move('uploads/product/',$filename);
        //     $product->image=$filename;
        // }

        $product->save();
        return response()->json($product);
        // return ["result"=>"pass"];
        
    } 

    public function show()
    {
        $product=product::all();
        return response()->json($product);

    }

    public function sid($id)
    {
        $product = product::find($id);
        return response()->json($product);

    }

    public function update(Request $request,$id)
    {
        $product=product::find($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');

        if($request->hasFile('image'))
        {
            $destination='uploads/product/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion =$file->getClientOriginalExtension();
            $filename =time().'.'.$extenstion;
            $file->move('uploads/product/',$filename);
            $product->image=$filename;
        }

        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product=product::find($id);
        $product->delete();
        return response()->json($product);
    }
}
