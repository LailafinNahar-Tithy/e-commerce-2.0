@extends('admin.layout.master')
@section('title','Create Product')
@section('content')
<div class="container-fluid px-4">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products Create <a href="{{route('products.index')}}" class="btn btn-sm btn-outline-primary">List</a>
        </div>


    <div class="card-body">

        @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                  @endforeach
                </ul>
    </div>
        @endif

        <form action="{{route('products.store')}}" method="POST">
            @csrf

            <div class="form-floating mb-3 ">
                <input class="form-control" id="title" name="title" type="text" placeholder="Enter your product title" />
                <label for="title">Title</label>
            </div>


            <div class="form-floating mb-3">
                <input class="form-control" id="price" name="price" type="number" placeholder="enter price" />
                <label for="price">Price</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description" ></textarea>
                <label for="description">Description</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="is_active" value="1" type="checkbox" value="" id="isActive" checked>
                <label class="form-check-label" for="isActive">
                  Is Active
                </label>
              </div>

            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-center py-3">
        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
    </div>
</div>
</div>
@endsection
