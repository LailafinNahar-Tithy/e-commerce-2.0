@extends('admin.layout.master')
@section('title','Product List')
@section('content')

<div class="container-fluid px-4">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products <a href="{{route('products.index')}}" class="btn btn-sm btn-outline-primary">List</a>
        </div>
        <div class="card-body">
            <img src="{{ asset('./storage/images/' . $product->image) }}" class="card-img-top" alt="...">

           <h1>Title:{{$product->title}}</h1>
           <p>Price:{{$product->price}}</p>
           <p>Status:{{$product->is_active ? "Active" : 'Inactive'}}</p>
           <p>description:{{$product->description}}</p>
        </div>
    </div>
</div>
@endsection
