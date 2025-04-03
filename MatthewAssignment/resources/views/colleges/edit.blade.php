@extends('layouts.app')

@section('title', 'Edit College')

@section('content')
    <h1>Edit College</h1>

    <form method="POST" action="{{ route('colleges.update', $college->id) }}">
        @csrf
        @method('PUT')

        @include('colleges._form')

        <button type="submit" class="btn btn-primary">Update College</button>
    </form>
@endsection
