<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Ingredient;



class RecipeController extends Controller
{
    public function index(Request $requests)
    {
        $recipes = Recipe::orderBy('title', 'ASC')->get();
        
        return view('recipes/index', ['recipes' => $recipes,]);
    }

    public function create(Request $request) 
    {

        return view('recipes.create');

    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'pic_url' => 'url',
            'source_url' => 'required|url',
            'author' => 'required',
            'yield' => 'required|numeric',
            'prep_time' => 'numeric',
            'cook_time' => 'numeric',
            'total_time' => 'numeric',
        ]);
        $recipe->title = $request->title;
        $recipe->slug = $request->slug;
        $recipe->pic_url = $request->pic_url;
        $recipe->source_url = $request->source_url;
        $recipe->author = $request->author;
        $recipe->yield = $request->yield;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->total_time = $request->total_time;
        $recipe->save();

        return redirect('/recipes/create')->with(['flash-alert' => 'Your book was added!']);
        // returns http://e15p3.loc/recipes, "page expired"

    }

    public function show(Request $request, $slug)
    {
        $recipe = Recipe::findBySlug($slug);
        $ingredients = Ingredient::where('recipe_id',$recipe->id )->get();

        if (!$recipe) {

            return redirect('/recipes')->with(['flash-alert' => 'Recipe not found.']);
        }
        //$onList = $recipe->users()->where('user_id', $request->user()->id)->count() >= 1;

        return view('recipes/show', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,

            //'onList' => $onList

        ]);
        
    }

    public function search(Request $request)
    {
        // $request->validate([
        //     'searchTerms' => 'required',
        //     'searchType' => 'required'
        // ]);

        // $searchType = $request->input('searchType', 'title');
        // $searchTerms = $request->input('searchTerms', '');

        // $searchResults = Book::where($searchType, 'LIKE', '%'.$searchTerms.'%')->get();

        $recipes = Recipe::orderBy('title')->select(['id', 'title'])->get();




        return redirect('/')->with([
            
            'recipes' => $recipes
        ])->withInput();
        // # Get the form nput values (default to null if no values exist)
        // $searchTerms = $request->input('searchTerms', null);
        // $searchType = $request->input('searchType', null);

        // # Load our json book data and convert it to an array
        // $bookData = file_get_contents(database_path('books.json'));
        // $books = json_decode($bookData, true);
    
        // # Do search
        // $searchResults = [];
        // foreach ($books as $slug => $book) {
        //     if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
        //         $searchResults[$slug] = $book;
        //     }
        // }
    
        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        // return redirect('/')->with([
        //     'searchTerms' => $searchTerms,
        //     'searchType' => $searchType,
        //     'searchResults' => $searchResults
        // ]);

    }

    public function edit(Request $request, $slug)
    {
        {
        
            $recipe = Recipe::findBySlug($slug);
            // $authors = Author::orderBy('last_name')->select(['id', 'first_name', 'last_name'])->get();
    
            if(!$recipe) {
                return redirect('/recipes')->with(['flash-alert' => 'Recipe not found.']);
            }
    
            return view('recipes/edit', ['recipe' => $recipe]);  
            // , ['authors' => $authors]
        }

    }
    public function update(Request $request, $slug)
    {
            $recipe = Recipe::findBySlug($slug);
                
            $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'pic_url' => 'url',
                'source_url' => 'required|url',
                'author' => 'required',
                'yield' => 'required|numeric',
                'prep_time' => 'numeric',
                'cook_time' => 'numeric',
                'total_time' => 'numeric',
            ]);

            $recipe->title = $request->title;
            $recipe->slug = $request->slug;
            $recipe->pic_url = $request->pic_url;
            $recipe->source_url = $request->source_url;
            $recipe->author = $request->author;
            $recipe->yield = $request->yield;
            $recipe->prep_time = $request->prep_time;
            $recipe->cook_time = $request->cook_time;
            $recipe->total_time = $request->total_time;
            $recipe->save();
    
            return redirect('/recipes/'.$slug.'/edit')->with(['flash-alert' => 'Your changes were saved']);

    }

    public function delete($slug){

    }
    
    public function destroy($slug){

    }

}