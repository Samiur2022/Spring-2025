@extends('master')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                <form action="{{url('/category/store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">CateGory Name</label>
                        <input name="cat_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input name="cat_decp" type="text" class="form-control" id="exampleInputPassword1" placeholder="Category Description">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-1">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection