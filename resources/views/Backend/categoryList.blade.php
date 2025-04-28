@extends('Backend.master')
@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h2>Category list</h2>
                  <h1>{{count($cat)}}</h1>
                    <a class="btn btn-primary" href="{{route('cat.form')}}" >Create Category</a>
                <table class="table">
                <thead>

                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($cat as $cats)
                    <tr>
                    <th scope="row">{{$cats->id}}</th>
                    <td>{{$cats->name}}</td>
                    <td>{{$cats->descp}}</</td>
                    <td>
                        <a class="btn btn-warning" href="">edit</a>
                        <a class="btn btn-danger" href="{{route('cat.delete',$cats->id)}}">delete</a>
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