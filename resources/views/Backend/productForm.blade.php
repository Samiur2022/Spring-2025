@extends('Backend.master')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 mt-3">
                <form action="{{route('pro.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input name="pro_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Category</label>
                        
                        <select name="cat_id" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input name="pro_decp" type="text" class="form-control" id="exampleInputPassword1" placeholder="Category Description">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Price</label>
                        <input name="product_price" type="number" min="10" class="form-control" id="exampleInputPassword1" placeholder="currency BDT">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Stock</label>
                        <input name="product_stock" type="number" min="20" class="form-control" id="exampleInputPassword1" placeholder="min 50">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Discount Price</label>
                        <input name="product_discount" type="number" min="20" class="form-control" id="exampleInputPassword1" placeholder="30">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">image upload</label>
                        <input name="product_image" type="file" class="form-control" id="exampleInputPassword1" placeholder="Category Description">
                    </div>
                   

                    
                    <button type="submit" class="btn btn-primary mt-1">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection