@extends('layouts.master')

@section('content')
<h2>Quản lý danh mục</h2>
    <a href="{{ route('category.create') }}"><button class="btn btn-primary">+ Create</button></a>
    <table class="table table-striped table-hover">
        <thead>
            <th>STT</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($categories as $index => $item)
                <tr class="">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        @if ($item->status == 1)
                            <label class='custom-switch mt-2'>
                                <input type='checkbox' data-id='{{ $item->id }}' checked name='custom-switch-checkbox'
                                    class='custom-switch-input change-status'>
                                <span class='custom-switch-indicator'></span>
                            </label>
                        @else
                            <label class='custom-switch mt-2'>
                                <input type='checkbox' data-id='{{ $item->id }}' name='custom-switch-checkbox'
                                    class='custom-switch-input change-status'>
                                <span class='custom-switch-indicator'></span>
                            </label>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('category.edit', $item->id) }}"><button class="btn btn-primary">Edit</button></a>
                        <a class="delete-item" href="{{ route('category.destroy', $item->id) }}"><button
                                class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: "{{ route('category.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
