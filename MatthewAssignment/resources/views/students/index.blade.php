@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>

    <!-- Filter dropdown -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <select name="college" class="form-select" onchange="this.form.submit()">
            <option value="">All Colleges</option>
            @foreach($colleges as $college)
                <option value="{{ $college->id }}" {{ request('college') == $college->id ? 'selected' : '' }}>
                    {{ $college->name }}
                </option>
            @endforeach
        </select>
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->college->name }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
