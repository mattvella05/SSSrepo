@extends('layouts.app')

@section('title', 'Colleges')

@section('content')
    <h1>Colleges</h1>

    <a href="{{ route('colleges.create') }}" class="btn btn-primary mb-3">Add New College</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    <a href="{{ route('colleges.index', array_merge(request()->query(), ['sort' => 'name'])) }}">
                        Name
                        @if(request('sort') === 'name')
                            ▲
                        @endif
                    </a>
                </th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colleges as $college)
                <tr>
                    <td>{{ $college->name }}</td>
                    <td>{{ $college->address }}</td>
                    <td>
                        <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($colleges->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No colleges found.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
