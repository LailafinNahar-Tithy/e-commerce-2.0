@extends('admin.layout.master')
@section('title','User List')
@section('content')

<div class="container-fluid px-4">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users


        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>

            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user )
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>


                            {{-- <a class="btn btn-sm btn-warning" href="{{route('products.edit',['id'=>$product->id])}}">Edit</a> --}}



                        </td>

                    </tr>

                    @endforeach


                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
