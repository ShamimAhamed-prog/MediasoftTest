@extends('layouts.master')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="padding-top: 80px;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                    </div>
                                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                   
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="name" placeholder="Enter Product name...">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="price" placeholder="Enter Price...">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp" name="qty" placeholder="Enter Quantity...">
                                            @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control-file" accept="image/*" class="form-control form-control-user" id="exampleInputName" aria-describedby="nameHelp">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Add
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection