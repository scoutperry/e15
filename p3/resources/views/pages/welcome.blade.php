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
</p>

{{-- <form method='GET' action='/search'>

    <h2></h2>

    <fieldset>
        <label for='searchYield1'>* First Recipe:</label>
        <select name='searchYield1' id='searchYield1'>
            <option value=''>Choose one...</option>
            @foreach($recipes as $recipe)
            <option value='{{ $recipe->id }}'>{{ $recipe->title}}</option>
@endforeach
</select>
@include('includes.error-field', ['fieldName' => 'recipe_id'])

<label for='searchYield2'>* Second Recipe:</label>
<select name='searchYield2' id='searchYield2'>
    <option value=''>Choose one...</option>
    @foreach($recipes as $recipe)
    <option value='{{ $recipe->id }}'>{{ $recipe->title}}</option>
    @endforeach
</select>
@include('includes.error-field', ['fieldName' => 'recipe_id'])


</fieldset>

<fieldset>
    <label for='searchYield3'>Optional Third Recipe:</label>
    <select name='searchYield3' id='searchYield1'>
        <option value=''>Choose one...</option>
        @foreach($recipes as $recipe)
        <option value='{{ $recipe->id }}'>{{ $recipe->title}}</option>
        @endforeach
    </select>

    <label for='searchYield2'>Optional Forth Recipe:</label>
    <select name='searchYield2' id='searchYield2'>
        <option value=''>Choose one...</option>
        @foreach($recipes as $recipe)
        <option value='{{ $recipe->id }}'>{{ $recipe->title}}</option>
        @endforeach
    </select>

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

@if(!is_null($searchYield1))
@if(count($searchResults) == 0)
<div class='results alert alert-warning'>
    No results found.
</div>
@else
<div class='results alert alert-primary'>

    {{ count($searchResults) }}
    {{ Str::plural('Result', count($searchResults)) }}:

    <ul>
        @foreach($searchResults as $slug => $recipe)
        <li><a href='/recipes/{{ $slug }}'> {{ $recipe['title']   }}</a></li>
        @endforeach
    </ul>
</div>
@endif
@endif --}}


@endsection
