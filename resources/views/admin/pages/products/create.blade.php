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
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                        <label for="inputFirstName">First name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                        <label for="inputLastName">Last name</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                <label for="inputEmail">Email address</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                        <label for="inputPasswordConfirm">Confirm Password</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Create Account</a></div>
            </div>
        </form>
    </div>
    <div class="card-footer text-center py-3">
        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
    </div>
</div>
</div>
@endsection
