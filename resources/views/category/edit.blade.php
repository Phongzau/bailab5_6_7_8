@extends('layouts.master')

@section('content')
    <h3>Edit Category</h3>
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Description</label>
            <input type="text" name="description" value="{{ $category->description }}" class="form-control">
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
                <option value="1" {{ $category->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $category->status == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('category.index') }}" class="btn btn-danger mt-3">Back</a>
@endsection
