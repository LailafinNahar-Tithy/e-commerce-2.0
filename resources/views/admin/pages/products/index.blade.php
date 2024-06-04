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
            Products <a href="{{route('products.create')}}" class="btn btn-sm btn-outline-primary">Add new</a>
        </div>
        <div class="card-body">
            <table id="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>status</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product )
                    <tr>
                        <td></td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->is_active}}</td>

                    </tr>

                    @endforeach


                </tbody>
            </table>
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</div>
@endsection
