@extends('layouts/main')

@section('title')
Add a book
@endsection

@section('content')

<h1>Add a book</h1>

<p>Want to add a book to your list that isn’t in our library? Not a problem- you can add it here!</p>

<form method='POST' action='/books'>
    <div class='details'>* Required fields</div>
    {{ csrf_field() }}

    <label for='title'>* Title</label>
    <input type='text' name='title' id='title' value=' {{ old("title") }} '>
    @include('includes/error-field', ['fieldName' => 'title'])

    <label for='slug'>* Short URL</label>
    <div class='details'>
        This is a unique URL identifier for the book, containing only alphanumeric characters and dashes.
        <br>It’s suggested that the slug be based on the book title, e.g. a good slug for the book <em>“War and Peace”</em> would be <em>“war-and-peace”</em>.
    </div>
    <input type='text' name='slug' id='slug' value='{{ old("slug") }}'>
    @include('includes/error-field', ['fieldName' => 'slug'])

    <label for='author_id'>* Author</label>
    <select name='author_id' id='author_id'>
        <option value=''>Choose one...</option>
        @foreach($authors as $author)
        {{-- <option value='{{ $author->id }}' {{ (old('author_id') == $author->id) ? 'selected' : '' }}>{{ $author->first_name.' '.$author->last_name }}</option> --}}
        <option value='{{ $author->id }}'>{{ $author->first_name.' '.$author->last_name }}</option>
        @endforeach
    </select>
    @include('includes.error-field', ['fieldName' => 'author_id'])


    <label for='published_year'>* Published Year (YYYY)</label>
    <input type='text' name='published_year' id='published_year' value='{{ old("published_year") }}'>
    @include('includes/error-field', ['fieldName' => 'published_year'])

    <label for='cover_url'>Cover URL</label>
    <input type='text' name='cover_url' id='cover_url' value='{{ old("cover_url", "http://") }}'>

    <label for='info_url'>* Wikipedia URL</label>
    <input type='text' name='info_url' id='info_url' value='{{ old("info_url", "http://") }}'>
    @include('includes/error-field', ['fieldName' => 'info_url'])

    <label for='purchase_url'>* Purchase URL </label>
    <input type='text' name='purchase_url' id='purchase_url' value='{{ old("purchase_url", "http://") }}'>
    @include('includes/error-field', ['fieldName' => 'purchase_url'])

    <label for='description'>Description</label>
    <textarea name='description'>{{ old('description') }}</textarea>

    <button type='submit'>Add Book</button>

</form>
@endsection
