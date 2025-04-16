@extends('master')
@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h2>Product list</h2>
                  <h1>{{count($product)}}</h1>
                    <a class="btn btn-primary" href="{{route('pro.form')}}" >Create Product</a>
                <table class="table">
                <thead>

                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($product as $products)
                    <tr>
                    <th scope="row">{{$products->id}}</th>
                    <td>{{$products->name}}</td>
                    <td>{{$products->descp}}</</td>
                    <td>
                        <a class="btn btn-warning" href="">edit</a>
                        <a class="btn btn-danger" href="{{route('pro.delete',$products->id)}}">delete</a>
                    </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection