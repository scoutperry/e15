@extends('layouts/main')

@section('title')
Add a recipe
@endsection

@section('content')

<h1>Add a recipe</h1>

<p></p>

<form method='POST' action='/recipes'>
    <div class='details'>* Required fields</div>
    {{ csrf_field() }}

    <label for='title'>* Title</label>
    <input type='text' name='title' id='title' value=' {{ old("title") }} '>
    @include('includes/error-field', ['fieldName' => 'title'])<br>

    <label for='slug'>* Short URL</label>
    <div class='details'>
        This is a unique URL identifier for the recipe, containing only alphanumeric characters and dashes.
        <br>It’s suggested that the slug be based on the recipe title, e.g. a good slug for the recipe <em>“Rice and Beans”</em> would be <em>rice-and-beans</em>.
    </div>
    <input type='text' name='slug' id='slug' value='{{ old("slug") }}'>
    @include('includes/error-field', ['fieldName' => 'slug'])<br>

    <label for='pic_url'>pic_url URL</label>
    <input type='text' name='pic_url' id='pic_url' value='{{ old("pic_url", "http://") }}'><br>

    <label for='source_url'>* source_url URL</label>
    <input type='text' name='source_url' id='source_url' value='{{ old("source_url", "http://") }}'><br>
    @include('includes/error-field', ['fieldName' => 'source_url'])<br>

    <label for='author'>* author</label>
    <input type='text' name='author' id='author' value=' {{ old("author") }} '>
    @include('includes/error-field', ['fieldName' => 'author'])<br>

    <label for='yield'>* yield</label>
    <input type='text' name='yield' id='yield' value='{{ old("yield") }}'>
    @include('includes/error-field', ['fieldName' => 'yield'])<br>

    <label for='calorie'>calorie</label>
    <input type='text' name='calorie' id='calorie' value='{{ old("calorie") }}'><br>

    <label for='prep_time'> prep_time</label>
    <input type='text' name='prep_time' id='prep_time' value='{{ old("prep_time") }}'><br>

    <label for='cook_time'> cook_time</label>
    <input type='text' name='cook_time' id='cook_time' value='{{ old("cook_time") }}'><br>

    <label for='total_time'> total_time</label>
    <input type='total_time' name='total_time' id='total_time' value='{{ old("total_time") }}'><br>

    <button type='submit'>Add Recipe</button>

</form>
@endsection
