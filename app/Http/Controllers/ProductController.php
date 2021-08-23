<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::all();
        return view('Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new product;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extenstion =$file->getClientOriginalExtension();
            $filename =time().'.'.$extenstion;
            $file->move('uploads/product/',$filename);
            $product->image=$filename;
        }

        $product->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editproduct = product::find($id);
        return view('Product.edit',compact('editproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product=product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;

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

        $product->update();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=product::find($id);
        $destination='uploads/product/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $product->delete();
        return redirect()->back();
    }
}
