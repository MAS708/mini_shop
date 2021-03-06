@extends('layouts.layout')
@section('subtitle', 'Edit Product')
@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Form Edit product</h1>

                <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Insert Name" name="name" value="{{ $product->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Insert Price" name="price" value="{{ $product->price }}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Add Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" value="{{ $product->image }}">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <label for="label">Product Category</label>
                    <select name="product_category_id" class="form-control form-control-sm mb-2" id="label">

                        <!--option name="{{ $product->category->id }}">{{ $product->category->name }}</option-->

                        @foreach ($cat as $c)
                            <option id="{{ $c->id }}" name = "{{ $c->id }}" value = "{{ $c->id }}"
                            @if ($c->id === $product->category->id)
                            selected
                            @endif
                            >
                                {{ $c->name  }}
                            </option>
                        @endforeach>
                         @error('product_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </select>

                    <div class="form-group">
                        <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3">{{    $product->desc }}</textarea>
                        @error('desc')<div class="invalid-feedback">{{ $desc }}</div>@enderror
                      </div>


                    <button type="submit" class="btn btn-primary">Edit Data!</button>
                </form>

                </div>
            </div>
        </div>

@endsection
