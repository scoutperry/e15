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
            'courseNumber' => session('courseNumber', null),
            'primaryContact' => session('primaryContact', null),
            'centerScreen' => session('centerScreen', null),
            'sideScreen' => session('sideScreen', null),
            'confidence' => session('confidence', null),
            'floorMon' => session('floorMon', null),
            'screenSetUpNotes' => session('screenSetUpNotes', null),
            'facultyLoc' => session('facultyLoc', null),
            'mainRoomAssistant' => session('mainRoomAssistant', null),
            'tandemRoomAssistant' => session('tandemRoomAssistant', null),
            'remoteAssistant' => session('remoteAssistant', null),
            'assistantName1' => session('assistantName1', null),
            'assistantName2' => session('assistantName2', null),
            'assistantName3' => session('assistantName3', null),
            'teachingStaffNotes' => session('teachingStaffNotes', null),
            'localPresenter' => session('localPresenter', null),
            'remotePresenter' => session('remotePresenter', null),
            'defaultPresent' => session('defaultPresent', null),
            'presenterTechNotes' => session('presenterTechNotes', null),
            'Wired' => session('Wired', null),
            'Wireless' => session('Wireless', null),
            'defaultConnect' => session('defaultConnect', null),
            'connectTechNotes' => session('connectTechNotes', null),
        ]);
    }
}