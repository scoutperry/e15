<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * GET /
     */
    public function index()
    {
        return view('pages/welcome');
    }

    /**
     * GET /support
     */
    public function support()
    {
        return view('pages/support');
    }
    /**
     * GET /
    * Display the application welcome page with a search feature
    */
    public function welcome()
    {
        # If there is data stored in the session as the results of doing a search
        # that data will be extracted from the session and passed to the view
        # to display the results
        return view('pages/welcome')->with([
            'searchTerms' => session('searchTerms', null),
            'searchType' => session('searchType', null),
            'searchResults' => session('searchResults', null)
        ]);
    }
}