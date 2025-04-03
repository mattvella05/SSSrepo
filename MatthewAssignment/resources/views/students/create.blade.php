@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
    <h1>Add New Student</h1>

    <form method="POST" action="{{ route('students.store') }}">
        @include('students._form')
        <button type="submit" class="btn btn-primary">Save Student</button>
    </form>
@endsection
