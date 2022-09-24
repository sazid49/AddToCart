
@extends('layouts.app')

@section('title','Products')
    

@section('content')

<div class="container" style="margin: 10px; padding:30px">
    <div class="row">
            <h1 class="text-center">Products</h1>
            <div class="card-deck m-2">
            @if (count($products) > 0)
             @foreach ($products as $product)
                  <div class="card">
                    <img src="{{ $product->image }}" alt="{{ $product->image }}" width="300">
                    <div class="card-header">
                        {{ $product->name }}
                        <span class="float-right">$ {{ $product->price }}</span>
                    </div>
                    <div class="card-body">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('addtocart', $product->id) }}" class="btn btn-success btn-block">Add To Cart</a>
                    </div>
                  </div> 
            @endforeach
            @endif 
        </div>
      </div>
   </div>
@endsection
