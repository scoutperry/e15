<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{   
    public function index()
    {
        # TODO: Query the database for all the books;
        return 'Here are all the books...';
    }
    
    /*public function show($title)
    {
    # TODO: Query the db where book title = $title
    return 'You are trying to view the book: '.$title;
    }

    public function show($title)
    {
        return view('books/show', [
            'title' => $title
        ]);
    }
}*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * GET /books
     * Show all the books
     */
    public function index()
    {
        // Hard-coded books for practice:
        // $books = [
        //     ['title' => 'War and Peace', 'author' => 'Leo Tolstoy'],
        //     ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald'],
        //     ['title' => 'I Know Why the Caged Bird Sings', 'author' => 'Maya Angelou'],
        // ];

        # Load our book data using PHP's file_get_contents
        # We specify our books.json file path using Laravel's database_path helper
        $bookData = file_get_contents(database_path('books.json'));
    
        # Convert the string of JSON text we loaded from books.json into an
        # array using PHP's built-in json_decode function
        $books = json_decode($bookData, true);

        # Alphabetize the books
        $books = Arr::sort($books, function ($value) {
            return $value['title'];
        });

        return view('books/index', ['books' => $books]);
    }

    /**
     * GET /books/{slug}
     * Show the details for an individual book
     */
    public function show($slug)
    {
        # Load our book data
        # TODO: This code is redundant with loading the books in the index method
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        # Narrow down our array of books
        $book = Arr::first($books, function ($value, $key) use ($slug) {
            return $key == $slug;
        });
        
        return view('books/show', [
            'book' => $book,
        ]);
    }

    /**
     * GET /search/{category}/{subcategory}
     */
   /**
     * GET /search
    */


    /**
     * GET /search
    */
    public function search(Request $request)
    {
        # Get the form nput values (default to null if no values exist)
        $searchTerms = $request->input('searchTerms', null);
        $searchType = $request->input('searchType', null);

        # Load our json book data and convert it to an array
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);
    
        # Do search
        $searchResults = [];
        foreach ($books as $slug => $book) {
            if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
                $searchResults[$slug] = $book;
            }
        }
    
        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'searchTerms' => $searchTerms,
            'searchType' => $searchType,
            'searchResults' => $searchResults
        ]);
    
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

    /**
     * GET /list
     */
    public function list()
    {
        # TODO
        return view('books/list');
    }
}