@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<style>
    body{
        background-color:navajowhite;
    }
    .table-striped{
        
        border-left:3px solid black;
        border-right:3px solid black;
        border-bottom:3px solid black;

    }

    .thclass{
        border-top:3px solid black;
        border-bottom:3px solid black;
        border:3px solid black;
    }


</style>
<div class="container">
<h3 class="title">Product List<a style="text-decoration:none;" href="{{route('create')}}"> +</a></h3>
<table class="table table-striped">
  <thead class="thclass">
  <tr>
  <th>Sr.no</th>
  <th>Name</th>
  <th>Price</th>
  <th>Description</th>
  <th>Image</th>
  </tr>
  </thead>
  <tbody class="tdclass">
  @foreach($products as $productvalue)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$productvalue->name}}</td>
  <td>{{$productvalue->price}}</td>
  <td>{{$productvalue->description}}</td>
  {{-- <td>{{$productvalue->image}}</td> --}}
  <td><img src="{{asset('uploads/product/'.$productvalue->image)}}" width="100px" height="70px" alt="image not showing"></td>

  <td>
  <a class="btn btn-info btn-sm" href="{{route('edit',$productvalue->id)}}">Edit</a>
  <form style="display:inline;" action="{{route('delete',$productvalue->id)}}" method="post">
  @csrf()
  @method('delete')
  <button class="btn btn-danger btn-sm" type="submit">Delete</button>
  </form>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>

@endsection