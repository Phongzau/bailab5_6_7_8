@extends('layouts.master')

@section('content')
    <h3>Edit Product</h3>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="">Preview</label> <br>
            <img width="130px" src="{{ Storage::url($product->image) }}" alt="">
        </div>
        <div class="form-group mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Quantity</label>
            <input type="number" min="0" name="quantity" value="{{ $product->quantity }}" class="form-control">
            @if ($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Description</label>
            <input type="text" name="description" value="{{ $product->description }}" class="form-control">
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="inputState">Category</label>
            <select id="inputState" name="category_id" class="form-control main-category">
                <option value="" hidden>Select</option>
                @foreach ($categories as $category)
                    <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Back</a>
@endsection
