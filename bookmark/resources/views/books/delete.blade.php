@extends('layouts/main')

@section('title')
Confirm Deletion: {{ $book->title }}
@endsection

@section('content')

<h1>Confirm Deletion</h1>

<p>Are you sure you want to delete <strong>{{ $book->title }}</strong>?</p>

<form method='POST' action='/books/{{ $book->slug }}'>
    {{ method_field('delete') }}
    {{ csrf_field() }}

    <button type='submit'>Yes, delete book</button>
</form>

<p><a href='/books/{{ $book->slug }}'>No, don't delete</a></p>

@endsection
