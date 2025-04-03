@extends('layouts.app')

@section('title', 'Add New College')

@section('content')
    <h1>Add New College</h1>

    <form method="POST" action="{{ route('colleges.store') }}">
        @include('colleges._form')
        <button type="submit" class="btn btn-primary">Save College</button>
    </form>
@endsection
