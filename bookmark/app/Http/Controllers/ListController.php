<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ListController extends Controller{
/**
* GET /list
*/
    public function show(Request $request)
        {
        # Note how in sortByDesc we specify `pivot.created_at` to get
        # the created_at value for the *relationship*, not the book itselfc
        $books = $request->user()->books->sortByDesc('pivot.created_at');

        return view('list/show', ['books' => $books]);
        }

    /**
    * GET /list/{slug}/add
    */
    public function add(Request $request, $slug)
    {
    $book = Book::findBySlug($slug);

    # TODO: Handle case where book isn’t found for the given slug

    return view('list/add', ['book' => $book]);
    }

    /**
    * POST /list/{slug}/save
    */
    public function save(Request $request, $slug)
    {
        # TODO: Validate incoming data, making sure they entered a note

        $book = Book::findBySlug($slug);

        # Add book to user's list
        # (i.e. create a new row in the book_user table)
        $request->user()->books()->save($book, ['notes' => $request->notes]);

        return redirect('/list')->with([
            'flash-alert' => 'The book ' .$book->title. ' was added to your list.'
        ]);
    }

    public function update(Request $request, $slug)
    {
    $book = Book::findBySlug($slug);
    $user = $request->user();

    $book = $user->books()->where('books.id', $book->id)->first();

    $book->pivot->notes = $request->notes;
    $book->pivot->save();

return redirect('/list')->with([
    'flash-alert' => 'Your note for' .$book->title. ' was updated'
]);
    }
    
    public function destroy(Request $request, $slug)
    {
        $book = $request->user()->books()->where('slug', $slug)->first();

        $book->pivot->delete();

        return redirect($request->headers->get('referer'))->with([
            'flash-alert' => 'The book'. $book->title . ' was removed from your list'
            ]);
    }

}