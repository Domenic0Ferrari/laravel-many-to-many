@extends('admin.layouts.base')

@section('contents')

<h1 class="text-center">{{ $type->name }}</h1>
<p class="text-center">{{ $type->description }}</p>

<h2 class="text-center">Progetti in this type</h2>
{{-- 
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($type->projects as $project)
        <tr>
            <th scope="row">{{ $project->id }}</th>
            <td><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></td>
        </tr>
        @endforeach
    </tbody>
  </table> --}}
  
<ul>
    @foreach ($type->projects as $project)

    <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        
    @endforeach
</ul>
@endsection