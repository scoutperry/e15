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
{{-- if statements needed for nullable values, ingredient form below. requires if statements --}}

<h3>Ingredients for this recipe:</h3>
<p> @foreach($ingredients as $ingredient)
    {{ $ingredient->foodName }}<br>
    @endforeach
</p>

{{-- {{dd($ingredients)}} --}}

{{-- <label for='name'>* Ingredient</label>
<input type='text' name='name' id='name' value=' {{ old("name") }} '>
@include('includes/error-field', ['fieldName' => 'name'])

<label for='recipe_id'>* Recipe</label>
<select name='recipe_id' id='recipe_id'>
    <option value=''>Choose one...</option>
    @foreach($recipes as $recipe)
    <option value='{{ $recipe->id }}'>{{ $recipe->title}}</option>
    @endforeach
</select>
@include('includes.error-field', ['fieldName' => 'recipe_id']) --}}


{{-- Dunno if I want this list stuff. we'll see --}}
{{-- <ul class='recipeActions'>
    @if($onList)
    <li>
        @include('includes/remove-from-list')
    </li>
    @else
    <li>
        <a class='btn btn-primary' href='/list/{{ $recipe->slug }}/add'>Add to your list</a>
@endif
<li><a href='/recipes/{{ $recipe->slug }}/edit'><i class="fa fa-edit"></i> Edit</a>
<li><a href='/recipes/{{ $recipe->slug }}/delete'><i class="fa fa-trash"></i> Delete</a>
    </ul> --}}

    @endif

    @endsection
