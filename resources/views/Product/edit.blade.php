@extends('layouts.app')
@section('content')
<style>
body,
html {
    background-color:navajowhite;
}
#name{
    border: 2px solid black;
    border-radius: 11px;
    outline: none;
}
#desc{
    border: 2px solid black;
    border-radius: 11px;
    outline: none;

}

</style>

<div class="container">
<h3 class="title">Edit Product <a style="float: right; color:black;text-decoration:none ;" href="{{route('index')}}">Product List</a></h3>

<form action="{{route('update',$editproduct->id)}}" method="post" enctype="multipart/form-data">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1"><Strong>Product Name</Strong></label>
    <input type="text" id="name" value="{{$editproduct->name}}"class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><Strong>Product Price</Strong></label>
    <input type="text" id="price" value="{{$editproduct->price}}" class="form-control" name="price" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><Strong>Upload Image</Strong></label>
    <input type="file" id="image" class="form-control" name="image"><br>
    <img src="{{asset('uploads/product/'.$editproduct->image) }}" width="100px" height="75px" alt="Not loading">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><Strong>Description</Strong></label>
    <textarea class="form-control" id="desc" name="description" placeholder="Description">{{$editproduct->description}}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection 
