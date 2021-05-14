@extends('layouts/main')

@section('title')
{{ $recipe ? $recipe['title'] : 'recipe not found' }}
@endsection

@section('head')
<link href='/css/recipes/show.css' rel='stylesheet'>
@endsection

@section('content')

@if(!$recipe)
recipe not found. <a href='/recipes'>Check out the other recipes...</a>
@else
<img class='pic' src='{{ $recipe->pic_url }}' alt='photo for {{ $recipe->title }}'>

<h1>{{ $recipe->title }}</h1>

<a href='{{ $recipe->source_url }}'>View recipe source...</a>

<p>The recipe yields {{ $recipe->yield }} servings<br>
    The Prep time for this recipe is {{ $recipe->prep_time }} minutes<br>
    The Cook time for this recipe is {{ $recipe->cook_time }} minutes<br>
    The total time for this recipe is {{ $recipe->total_time }} minutes<br>
    this meal is {{ $recipe->calorie }} calories per serving<br>
    This recipe was created by {{ $recipe->author }}</p>

<h3>Ingredients for this recipe:</h3>
<p> @foreach($ingredients as $ingredient)
    {{ $ingredient->foodName }}<br>
    @endforeach
</p>


<ul class='recipeActions'>
    <li><a href='/recipes/{{ $recipe->slug }}/edit'><i class="fa fa-edit"></i> Edit Recipe Info</a>
</ul>

@endif

@endsection
