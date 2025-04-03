@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <h1>Edit Student</h1>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')

        @include('students._form')

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
@endsection
