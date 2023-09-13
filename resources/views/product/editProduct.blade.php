@extends('layouts.master')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 80px;">
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Product</h1>
                    </div>
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Use method('PUT') to indicate a PUT request --}}
                        
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="name" placeholder="Enter Product name..." value="{{ $product->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="price" placeholder="Enter Price..." value="{{ $product->price }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="qty" placeholder="Enter Quantity..." value="{{ $product->qty }}">
                            @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Update
                        </button>
                        <hr>
                    </form>
                    <hr>
                </div>
            </div>
            <!-- ... -->
        </div>
    </div>
</div>
@endsection
