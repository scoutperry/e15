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
        
        
       //dd($request->all());

        return redirect('/recipes/create')->with(['flash-alert' => 'Your book was added!']);
        // returns http://e15p3.loc/recipes, "page expired"

    }

    public function show(Request $request, $slug)
    {
        $recipe = Recipe::findBySlug($slug);
        $ingredients = Ingredient::where('recipe_id',$recipe->id )->get();

            // foreach ($ingredients as $ingredient) {
            //     dump($ingredient->foodName);
            // }
    


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
//what is this for? am I using this for something?
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required'
        ]);



        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request->input('searchTerms', '');

        $searchResults = Book::where($searchType, 'LIKE', '%'.$searchTerms.'%')->get();

        return redirect('/')->with([
            'searchResults' => $searchResults
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
    
        # ======== Temporary code to explore $request ==========

        # Get all the properties and methods available in the $request object
        //dump($request); # Object of type Illuminate\Http\Request

        # Get the form data (array) from the $request object
        //dump($request->all()); # Equivalent of dump($_GET)
    
        # Get the form data from individual fields
        //dump($request->input('searchTerms'));
        //dump($request->input('searchType'));

        # Form data from individual fields can also be accessed via dynamic properties
        //dump($request->searchTerms);

        # Boolean to see if the request contains data for a particular field, checkboxes
        //dump($request->has('searchType'));
    
        # You can get more information about a request than just the data of the form, for example...
        //dump($request->path()); # "search"
        //dump($request->is('search')); # true
        //dump($request->is('books')); # false
        //dump($request->fullUrl()); # e.g. http://bookmark.loc search?searchTerms=Harry%20Potter&searchType=title
        //dump($request->method()); # GET
        //dump($request->isMethod('post')); # False

        # ======== End exploration of $request ========== 
    }

    public function edit(Request $request, $slug)
    {
        

    }
    public function update(Request $request, $slug)
    {


    }

    public function delete($slug){

    }
    
    public function destroy($slug){

    }

}