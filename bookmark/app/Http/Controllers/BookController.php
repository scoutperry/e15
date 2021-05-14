<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Models\Author;


class BookController extends Controller
{
    /**
     * GET /books
     * Show all the books
     */
    public function index(Request $requests)
    {
        $books = Book::orderBy('title', 'ASC')->get();
        
        $newBooks = $books->sortByDesc('id')->take(3);  

        return view('books/index', ['books' => $books, 'newBooks' => $newBooks]);
    }

    public function create(Request $request) 
    {
        # Get data for authors in alphabetical order by last name
        $authors = Author::orderBy('last_name')->select(['id', 'first_name', 'last_name'])->get();
    
        return view('books.create', ['authors' => $authors]);
    }
   
/**
* POST /books
* Process the form for adding a new book
*/
    public function store(Request $request) 
    {

   # Validate the request data
   # The `$request->validate` method takes an array of data 
   # where the keys are form inputs
   # and the values are validation rules to apply to those inputs
   $request->validate([
       'title' => 'required|max:255',
       'slug' => 'required|unique:books,slug',
       'author_id' => 'required',
       'published_year' => 'required|digits: 4',
       'cover_url' => 'url',
       'info_url' => 'url',
       'purchase_url' => 'required|url',
       'description' => 'required|min:100'
   ]);

   $book = new Book();
   $book->title = $request->title;
   $book->slug = $request->slug;
   $book->author_id = $request->author_id;
   $book->published_year = $request->published_year;
   $book->cover_url = $request->cover_url;
   $book->info_url = $request->info_url;
   $book->purchase_url = $request->purchase_url;
   $book->description = $request->description;
   $book->save();

   return redirect('/books/create')->with(['flash-alert' => 'Your book was added!']);
   
    }

    /**
     * GET /books/{slug}
     * Show the details for an individual book
     */

    public function show(Request $request, $slug)
    {
        $book = Book::findBySlug($slug);

        //$book = Book::where('slug', '=', $slug)->first();
        if (!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }
        
        $onList = $book->users()->where('user_id', $request->user()->id)->count() >= 1;

        return view('books/show', [
            'book' => $book,
            'onList' => $onList

        ]);
        
    }

    /**
     * GET /search
    */
    public function search(Request $request)
    {

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
        
        $book = Book::findBySlug($slug);
        //$book = Book::where('slug', '=', $slug)->first();
        $authors = Author::orderBy('last_name')->select(['id', 'first_name', 'last_name'])->get();

        if(!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }

        return view('books/edit', ['book' => $book], ['authors' => $authors]);  
    }

    public function update(Request $request, $slug)
    {

        //dd($slug);
        $book = Book::findBySlug($slug);
        //$book = Book::where('slug', '=', $slug)->first();
        //dd($slug, $book->id);

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:books,slug,'.$book->id.'|alpha_dash',
            'author_id' => 'required',
            'published_year' => 'required|digits:4',
            'cover_url' => 'url',
            'info_url' => 'url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:255'
        ]);

        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->author_id = $request->author_id;
        $book->published_year = $request->published_year;
        $book->cover_url = $request->cover_url;
        $book->info_url = $request->info_url;
        $book->purchase_url = $request->purchase_url;
        $book->description = $request->description;
        $book->save();

        return redirect('/books/'.$slug.'/edit')->with(['flash-alert' => 'Your changes were saved']);
    }
//make findBySlug
public function delete($slug){
    $book = Book::findBySlug($slug);

    if(!$book){
        return redirect('/books')->with([
            'flash-alert' => 'Book not found'
        ]);
    }
    return view('books/delete', ['book' => $book]);
}

public function destroy($slug){
    $book = Book::findBySlug($slug);

    $book->users()->detach();

    $book->delete();

    return redirect('/books')->with([
        'flash-alert' => '"' .$book->title.'" was removed.'
    ]);
}


}