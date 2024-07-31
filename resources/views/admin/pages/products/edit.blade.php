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

        <form action="{{route('products.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-floating mb-3 ">
                {{-- //<select id="category_id" name="catagory_id" class="form-control"> --}}
                        <select id="category_id" name="category_id" class="form-control">

                        <option value="">Select Category</option>

                        @foreach ($categories as $categoryId => $categorytitle)

                        <option value="{{$categoryId}}" @if ($product->category_id==$categoryId ) selected

                        @endif>{{$categorytitle}} </option>
                        {{-- <option value="{{ $categoryId }}" {{ old('category_id', $selectedCategory) == $categoryId ? 'selected' : '' }}>{{$categorytitle}} </option> --}}

                        @endforeach

                    </select>
                    <label for="category_id">Category</label>

                    @error('category_id')
                       <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            <div class="form-floating mb-3 ">
                <input class="form-control" id="title" name="title" type="text" placeholder="Enter your product title" value="{{old('title',$product->title)}}" />
                <label for="title">Title</label>
            </div>
                @error('title')
                   <div class="alert alert-danger">{{$message}}</div>
                @enderror

            <div class="form-floating mb-3">
                <input class="form-control" id="price" name="price" type="number" placeholder="enter price" value="{{old('price',$product->price)}}" />
                <label for="price">Price</label>
            </div>
            @error('price')
                   <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description" value="{{old('description',$product->description)}}"></textarea>
                <label for="description">Description</label>
            </div>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <img src="{{ asset('./storage/images/' . $product->image) }}" class="card-img-top" alt="...">

            <div class="form-floating mb-3">
                <input type="file" class="form-control" accept="image/*" name="image" id="image" accept="image/*">
                <label for="image">Upload Image</label>
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="color">Color</label>
            @foreach ($colors as $colorId=>$colorName)

            <div class="form-check">
                <input class="form-check-input" name="color_id[]" value="{{$colorId}}" type="checkbox"  id="{{$colorId}}"
                @if (in_array($colorId, $selectedColors))
                           checked
                        @endif >


                <label class="form-check-label" for="{{$colorId}}"> {{$colorName}} </label>
            </div>
            @endforeach



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
