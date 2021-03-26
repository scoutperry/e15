<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class HyflexController extends Controller
{
    
     /*
    public function index()
    {

    }

    */

    public function store(Request $request) 
    {

        # Validate the request data
        # The `$request->validate` method takes an array of data 
        # where the keys are form inputs
        # and the values are validation rules to apply to those inputs
        $request->validate([
            'courseNumber'=>'required|digits:5',
            'primaryContact'=>'required|string',
            'centerScreen'=>'required',
            'sideScreen'=>'required',
            'confidence'=>'required',
            'floorMon'=>'required',
            'facultyLoc'=>'required',
            'assistantName1'=>'required|string',

        ]);
            # Get the form nput values (default to null if no values exist)
            $courseNumber = $request->input('courseNumber', null);
            $primaryContact = $request->input('primaryContact', null);
            $centerScreen = $request->input('centerScreen', null);
            $sideScreen = $request->input('sideScreen', null);
            $confidence = $request->input('confidence', null);
            $floorMon = $request->input('floorMon', null);
            $screenSetUpNotes = $request->input('screenSetUpNotes', null);        
            $facultyLoc = $request->input('facultyLoc', null);
            $mainRoomAssistant = $request->input('mainRoomAssistant', null);        
            $tandemRoomAssistant = $request->input('tandemRoomAssistant', null);
            $remoteAssistant = $request->input('remoteAssistant', null);
            $assistantName1 = $request->input('assistantName1', null);
            $assistantName2 = $request->input('assistantName2', null);
            $assistantName3 = $request->input('assistantName3', null);
            $teachingStaffNotes = $request->input('teachingStaffNotes', null);
            $localPresenter = $request->input('localPresenter', null);
            $remotePresenter = $request->input('remotePresenter', null);        
            $defaultPresent = $request->input('defaultPresent', null);
            $presenterTechNotes = $request->input('presenterTechNotes', null);        
            $Wired = $request->input('Wired', null);
            $Wireless = $request->input('Wireless', null);
            $defaultConnect = $request->input('defaultConnect', null);
            $connectTechNotes = $request->input('connectTechNotes', null);



        return redirect('/')->withInput([
            'courseNumber' => $courseNumber,
            'primaryContact' => $primaryContact,
            'centerScreen' => $centerScreen,
            'sideScreen' => $sideScreen,
            'confidence' => $confidence,
            'floorMon' => $floorMon,            
            'screenSetUpNotes' => $screenSetUpNotes,
            'facultyLoc' => $facultyLoc,
            'mainRoomAssistant' => $mainRoomAssistant,            
            'tandemRoomAssistant' => $tandemRoomAssistant,
            'remoteAssistant' => $remoteAssistant,
            'assistantName1' => $assistantName1,            
            'assistantName2' => $assistantName2,
            'assistantName3' => $assistantName3,
            'teachingStaffNotes' => $teachingStaffNotes,            
            'localPresenter' => $localPresenter,
            'remotePresenter' => $remotePresenter,
            'defaultPresent' => $defaultPresent,            
            'presenterTechNotes' => $presenterTechNotes,
            'Wired' => $Wired,
            'Wireless' => $Wireless,            
            'defaultConnect' => $defaultConnect,
            'connectTechNotes' => $connectTechNotes,
        ]);

        //dump($request->all());
    }
 

}