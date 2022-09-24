
@extends('layouts.app')

@section('title','Products')
    

@section('content')



<div class="container" style="margin: 10px; padding:30px">
    <div class="row offset-3">
         <div class="col-md-10">
             <div class="card">
                 <div class="card-header">
                     <h1 class="text-center">Cart Page</h1>
                      @if (session('success'))
                          <span class="text-success">{{ session()->get('success') }}</span>
                      @endif
                    </div>
                    <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                          <th width="50%">#</th>
                          <th width="80%">Product</th>
                          <th width="80%">Price</th>
                          <th width="8%">qty</th>
                          <th width="22%">Subtotal</th>
                          <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $total = 0;
                    @endphp

                    @if (session('cart'))
                    
                    @foreach (session('cart') as $id => $product)

                    @php 
                        $subtotal = $product['price'] * $product['quantity'] ;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td><img src="{{ $product['image'] }}" 
                            alt="{{ $product['image'] }}" 
                            class="img-flude" 
                            width="150">
                          <span> {{ $product['name'] }} </span>
                        </td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{  $subtotal }}</td>
                        <td>
                            <a href="" class="btn  btn-danger btn-sm">X</a>
                        </td>
                    </tr>  
                    @endforeach                
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="{{ url('products') }}" class="btn btn-warning btn-sm">Continue Shopping</a></td>
                        <td colspan="2"></td>
                        <td><strong>Total=${{ $total }}</strong></td>
                    </tr>
                </tfoot>
            </table>
             </div>
           </div>  
      </div>
    </div>
</div>
    @endsection
