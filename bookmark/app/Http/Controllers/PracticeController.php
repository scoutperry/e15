<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class PracticeController extends Controller
{
    
    public function practice19()
{
    # As an example, grab a user we know has books on their list
    $user = User::where('email', '=', 'jill@harvard.edu')->first();

    # Grab the first book on their list
    $book = $user->books()->first();

    # Delete the relationship
    $book->pivot->delete();

    # Confirm it worked
    return 'Delete complete. Check the `book_user` table to confirm.';
}
    public function practice18()
    {
        # As an example, grab a user we know has books on their list
        $user = User::where('email', '=', 'jill@harvard.edu')->first();
    
        # Grab the first book on their list
        $book = $user->books()->first();
    
        # Update and save the notes for this relationship
        $book->pivot->notes = "New note...";
        $book->pivot->save();
    
        # Confirm it worked
        return 'Update complete. Check the `book_user` table to confirm.';
    }
    
    public function practice17()
    {
        # As an example, grab a user we know has books on their list
        $user = User::where('email', '=', 'jill@harvard.edu')->first();
    
        # Grab the first book on their list
        $book = $user->books()->first();
    
        # Delete the relationship
        $book->pivot->delete();
    
        # Confirm it worked
        return 'Delete complete. Check the `book_user` table to confirm.';
    }

    public function practice16()
    {
        # Eager load users to reduce number of queries
        # (Suggestion: Try this without the `with` and watch how it greatly increases the number of queries)
        $books = Book::with('users')->get();
    
        foreach ($books as $book) {
             if ($book->users->count() == 0) {
                dump($book->title . ' is not on any user’s list');
            } else {
                dump($book->title . ' is on the following user’s lists:');
    
                foreach ($book->users as $user) {
                    dump($user->email);
                }
            }
        }
    }

    public function practice15()
    {
        $user = User::where('email', '=', 'jamal@harvard.edu')->first();
        $book = Book::where('title', '=', 'The Martian')->first();

        $user->books()->save($book);
        # Note how we can treate the `books` relationship as a dynamic propert ($user->books)

        }
    
    public function practice14()
    {
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        dump($user->name.' has the following books on their list: ');

        # Note how we can treate the `books` relationship as a dynamic propert ($user->books)
        foreach ($user->books as $book) {
            dump($book->title);
        }
    }

    public function practice4()
    {
        $book = Book::where('author', '=', 'Dr. Seuss')->get();
        $book->delete();
        dump('Book deleted.');
    }

    public function practice3()
    {
        $book = new Book();
        $books = $book->where('title', 'LIKE', '%Harry Potter%')->get();
    
        if ($books->isEmpty()) {
            dump('No matches found');
        } else {
            foreach ($books as $book) {
                dump($book->title);
            }
        }
    }

    public function practice2()
    {
        # Instantiate a new Book Model object
        $book = new Book();

        # Set the properties
        # Note how each property corresponds to a column in the table
        $book->slug = 'the-martian';
        $book->title = 'The Martian';
        $book->author = 'Anthony Weir';
        $book->published_year = 2011;
        $book->cover_url = 'https://hes-bookmark.s3.amazonaws.com/the-martian.jpg';
        $book->info_url = 'https://en.wikipedia.org/wiki/The_Martian_(Weir_novel)';
        $book->purchase_url = 'https://www.barnesandnoble.com/w/the-martian-andy-weir/1114993828';
        $book->description = 'The Martian is a 2011 science fiction novel written by Andy Weir. It was his debut novel under his own name. It was originally self-published in 2011; Crown Publishing purchased the rights and re-released it in 2014. The story follows an American astronaut, Mark Watney, as he becomes stranded alone on Mars in the year 2035 and must improvise in order to survive.';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $book->save();

        dump('Added: ' . $book->title);
    }

    /**
     * First practice example
     * GET /practice/1
     */
    public function practice1()
    {
        dump('This is the first example.');
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://e15bookmark.loc/practice => Shows a listing of all practice routes
     * http://e15bookmark.loc/practice/1 => Invokes practice1
     * http://e15bookmark.loc/practice/5 => Invokes practice5
     * http://e15bookmark.loc/practice/999 => 404 not found
     */
    public function index($n = null)
    {
        $methods = [];

        # Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        } # If no `n` is specified, show index of all available methods
        else {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        }
    }
}