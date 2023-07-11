@extends('admin.layouts.base')

@section('contents')
<h1 class="text-center mt-3 mb-3">Types</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
            <th scope="row">{{ $type->id }}</th>
            <td>{{ $type->name }}</td>
            <td>
                <a href="{{ route('admin.types.show', ['type' => $type]) }}" class="btn btn-primary">View</a>
                {{-- <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-warning">Edit</a>
                <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $categori->id }}">
                    Delete
                </button> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>  
@endsection