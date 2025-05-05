@extends('Backend.master')
@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Product list</h2>
                  <h1>{{count($product)}}</h1>
                    <a class="btn btn-primary" href="{{route('pro.form')}}" >Create Product</a>
                <table class="table">
                <thead>

                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Stock</th>
                    <th scope="col">Product Discount</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                  
                   
                @foreach($product as $products)
                    <tr>
                        <th scope="row">{{$products->id}}</th>
                        <td scope="row"><img src="{{'/upload/Products/'.$products->image}}" style="width:50px; height:40px" alt=""></td>
                        <td>{{$products->name}}</td>
                        <th scope="row">{{$products->category->name}}</th>
                        <th scope="row">{{$products->price}} BDT</th>
                        <th scope="row">{{$products->stock}}</th> 

                        @if($products->discount > 0)                      
                        <th scope="row">{{$products->discount}} BDT</th>
                        @else
                        <th scope="row" class="text-danger">No Discount</th>
                        @endif
                        
                        <td>{{$products->descp}}</</td>
                        <td>
                            <a class="btn btn-warning" href="">edit</a>
                            <a class="btn btn-danger" href="{{route('pro.delete',$products->id)}}">delete</a>
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
            {{$product->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection