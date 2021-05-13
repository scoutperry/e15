@extends('layouts/main')

@section('title')
All recipes
@endsection

@section('head')
<link href='/css/recipes/index.css' rel='stylesheet'>
@endsection

@section('content')

<h1>All Recipes</h1>

@if(count($recipes) == 0)
No recipes have been added yet...
@else


<div id='recipes'>
    @foreach($recipes as $recipe)
    <a class='recipe' href='/recipes/{{ $recipe->slug }}'>
        <h3>{{ $recipe['title'] }}</h3>
        <img class='cover' src='{{ $recipe->pic_url }}'>
    </a>
    </a>
    @endforeach
</div>
@endif

@endsection
