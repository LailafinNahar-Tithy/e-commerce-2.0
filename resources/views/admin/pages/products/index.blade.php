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
            Products
            <a href="{{route('products.create')}}" class="btn btn-sm btn-outline-primary">Add new</a>
            @can('product-trash-list')
            <a href="{{route('products.trash')}}" class="btn btn-sm btn-outline-primary">Trash_List</a>
            @endcan

            <a href="{{route('products.Pdf')}}" class="btn btn-sm btn-outline-success">PDF</a>



        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>

            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>status</th>
                        <th>Category</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product )
                    <tr>

                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->is_active}}</td>
                        <td>{{ optional($product->category)->title }}</td>
                        <td>

                            <a class="btn btn-sm btn-info" href="{{route('products.show',['id'=>$product->id])}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('products.edit',['id'=>$product->id])}}">Edit</a>


                                {{-- @can('delete-product') --}}

                                    <form action="{{route('products.destroy',['id'=>$product->id])}}" method="POST"  style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>

                                {{-- @endcan --}}


                        </td>

                    </tr>

                    @endforeach


                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
