@section('title')
Project Two
@endsection
@extends('layouts/main')

@section('content')

@if(count($errors) > 0)
<ul class='alert alert-danger'>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form method='POST' action='/store'>
    <div>* Required fields</div>
    {{ csrf_field() }}

    <h2>Hyflex Pre-Class Checklist</h2>
    <fieldset>
        <label for='courseNumber'>
            *Course Number<br>
            <input type='text' name='courseNumber' id='courseNumber' placeholder=' 10.000' value='{{ old("courseNumber") }}'> </label>
    </fieldset>
    <fieldset>
        <label for='primaryContact'>
            *Primary Contact<br>
            <input type='text' name='primaryContact' id='primaryContact' placeholder='Erwin Schell' value='{{ old("primaryContact") }}'> </label>
    </fieldset>
    <h3>Screen Setup</h3>
    <fieldset>
        <label>
            Center Screen<br>
        </label>
        <input type='radio' id='contentCC' name='centerScreen' value='content' {{ ($centerScreen == 'content' or is_null($centerScreen)) ? 'checked' : '' }}>
        <label for='Content'>Content</label>
        <input type='radio' id='galleryViewCC' name='centerScreen' value='galleryView' {{ ($centerScreen == 'galleryView') ? 'checked' : '' }}>
        <label for='Gallery View'>Gallery View</label>
        <input type='radio' id='activeSpeakerCC' name='centerScreen' value='activeSpeaker' {{ ($centerScreen == 'activeSpeaker') ? 'checked' : '' }}>
        <label for='Active Speaker'>Active Speaker</label><br>

        <label>
            Side Screen<br>
        </label>
        <input type='radio' id='content2' name='sideScreen' value='content' {{ ($sideScreen == 'content') ? 'checked' : '' }}>
        <label for='Content'>Content</label>
        <input type='radio' id='galleryView2' name='sideScreen' value='galleryView' {{ ($sideScreen == 'galleryView') ? 'checked' : '' }}>
        <label for='Gallery View'>Gallery View</label>
        <input type='radio' id='activeSpeaker2' name='sideScreen' value='activeSpeaker' {{ ($sideScreen == 'activeSpeaker' or is_null($centerScreen)) ? 'checked' : '' }}>
        <label for='Active Speaker'>Active Speaker</label><br>

        <label>
            High Confidence Monitor<br>
        </label>
        <input type='radio' id='content3' name='confidence' value='content' {{ ($confidence == 'content' or is_null($confidence)) ? 'checked' : '' }}>
        <label for='Content'>Content</label>
        <input type='radio' id='galleryView3' name='confidence' value='galleryView' {{ ($confidence == 'galleryView') ? 'checked' : '' }}>
        <label for='Gallery View'>Gallery View</label>
        <input type='radio' id='activeSpeaker3' name='confidence' value='activeSpeaker' {{ ($confidence == 'activeSpeaker') ? 'checked' : '' }}>
        <label for='Active Speaker'>Active Speaker</label><br>

        <label>
            Floor Monitor<br>
        </label>
        <input type='radio' id='content4' name='floorMon' value='content' {{ ($floorMon == 'content') ? 'checked' : '' }}>
        <label for='Content'>Content</label>
        <input type='radio' id='galleryView4' name='floorMon' value='galleryView' {{ ($floorMon == 'galleryView' or is_null($floorMon)) ? 'checked' : '' }}>
        <label for='Gallery View'>Gallery View</label>
        <input type='radio' id='activeSpeaker4' name='floorMon' value='activeSpeaker' {{ ($floorMon == 'activeSpeaker') ? 'checked' : '' }}>
        <label for='Active Speaker'>Active Speaker</label><br>

        <label for='screenSetUpNotes'>Additional notes:</label><br>
        <textarea name='screenSetUpNotes' id='screenSetUpNotes' value='{{ old("screenSetUpNotes") }}'></textarea>
    </fieldset>

    <h3>Teaching Staff Locations</h3>

    <fieldset>
        <label>
            Faculty will be in:<br>
        </label>
        <input type='radio' id='mainRoom1' name='facultyLoc' value='mainRoom' {{ ($facultyLoc == 'mainRoom' or is_null($facultyLoc)) ? 'checked' : '' }}>
        <label for='mainRoom'>Main Room</label>
        <input type='radio' id='tandemRoom1' name='facultyLoc' value='tandemRoom' {{ ($facultyLoc == 'tandemRoom') ? 'checked' : '' }}>
        <label for='tandemRoom'>Tandem Room</label>
        <input type='radio' id='remote1' name='facultyLoc' value='remote' {{ ($facultyLoc == 'remote') ? 'checked' : '' }}>
        <label for='remote'>Remote</label><br>

        <label>
            TA's will be in:<br>
        </label>
        <input type='checkbox' id='mainRoomAssistant' name='mainRoomAssistant' value='{{ old("mainRoomAssistant") }}'>
        <label for='mainRoomAssistant'>Main Room</label>
        <input type='checkbox' id='tandemRoomAssistant' name='tandemRoomAssistant' value='{{ old("tandemRoomAssistant") }}'>
        <label for='tandemRoomAssistant'>Tandem Room</label>
        <input type='checkbox' id='remoteAssistant' name='remoteAssistant' value='{{ old("remoteAssistant") }}'>
        <label for='remoteAssistant'>Remote</label><br>

        <label>
            TA's Names<br>
        </label>
        <label for='assistantName1'>*
            <input type='text' name='assistantName1' id='assistantName1' value='{{ old("assistantName1") }}'> </label>
        <label for=' assistantName2'>
            <input type='text' name='assistantName2' id='assistantName2' value='{{ old("assistantName2") }}'> </label>
        <label for=' assistantName3'>
            <input type='text' name='assistantName3' id='assistantName3' value='{{ old("assistantName3") }}'> </label><br>

        <label for=' teachingStaffNotes'>Additional notes:</label><br>
        <textarea name='teachingStaffNotes' id='teachingStaffNotes' value='{{ old("teachingStaffNotes") }}'></textarea>

    </fieldset>
    <h3>Classroom Technology</h3>

    <fieldset>
        <input type='checkbox' id='localPresenter' name='localPresenter' value='{{ $localPresenter }}'>
        <label for='localPresenter'> Local presenter</label>
        <input type='checkbox' id='remotePresenter' name='remotePresenter' value='{{ $remotePresenter }}'>
        <label for='remotePresenter'> Remote Presenter</label>
        <input type='checkbox' id='defaultPresent' name='defaultPresent' value='{{ $defaultPresent }}'>
        <label for='defaultPresent'> Make this default</label><br>

        <label for='presenterTechNotes'>Additional notes:</label><br>
        <textarea name='presenterTechNotes' id='presenterTechNotes' value='{{ $presenterTechNotes }}'></textarea>

    </fieldset>
    <fieldset>
        <input type='checkbox' id='Wired' name='Wired' value='{{ $Wired }}'>
        <label for='Wired'> Wired</label>
        <input type='checkbox' id='Wireless' name='Wireless' value='{{ $Wireless }}'>
        <label for='Wireless'> Wireless</label>
        <input type='checkbox' id='defaultConnect' name='defaultConnect' value='{{ $defaultConnect }}'>
        <label for='defaultConnect'> Make this default</label><br>

        <label for='connectTechNotes'>Additional notes:</label><br>
        <textarea name='connectTechNotes' id='connectTechNotes' value='{{ $connectTechNotes }}'></textarea>
    </fieldset>

    <input type='submit' class='btn btn-primary' value='Submit'>

</form>

@if(!is_null($courseNumber))
<div>
    Course number is: {{$courseNumber}}
</div>

@endif
@endsection
