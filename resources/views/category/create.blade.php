@extends('layouts.master')

@section('content')
    <h3>Create Category</h3>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="">Description</label>
            <input type="text" name="description" value="{{ old('description') }}" class="form-control">
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('category.index') }}" class="btn btn-danger mt-3">Back</a>
@endsection
