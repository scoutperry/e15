@extends('layouts/main')

@section('content')

@if(Auth::user())
<h2 dusk='welcome-heading'>
    Hello {{ Auth::user()->name }}!
</h2>
@else
<a href='/register' dusk='register-link'>Register now...</a>
@endif

<p id='welcome-paragraph' dusk='welcome-paragraph'>
    Welcome to Bookmark&mdash; an online book journal that lets you track and share a history of books you’ve read.
</p>

<form method='GET' action='/search'>

    <h2>Search for a book to add to your list</h2>

    <fieldset>
        <label for='searchTerms'>
            Search terms:
            <input type='text' name='searchTerms' id='searchTerms' value='{{ $searchTerms }}'> </label>
    </fieldset>

    <fieldset>
        <label>
            Search type:
        </label>
        <input type='radio' name='searchType' id='title' value='title' {{ ($searchType == 'title' or is_null($searchType)) ? 'checked' : '' }}>
        <label for='title'> Title</label>

        <input type='radio' name='searchType' id='author' value='author' {{ ($searchType == 'author') ? 'checked' : '' }}>
        <label for='author'> Author</label>

    </fieldset>

    <input type='submit' class='btn btn-primary' value='Search'>

    @if(count($errors) > 0)
    <ul class='alert alert-danger'>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

</form>

@if(!is_null($searchResults))
@if(count($searchResults) == 0)
<div class='results alert alert-warning'>
    No results found.
</div>
@else
<div class='results alert alert-primary'>

    {{ count($searchResults) }}
    {{ Str::plural('Result', count($searchResults)) }}:

    <ul>
        @foreach($searchResults as $slug => $book)
        <li><a href='/books/{{ $slug }}'> {{ $book['title']   }}</a></li>
        @endforeach
    </ul>
</div>
@endif
@endif

@endsection
