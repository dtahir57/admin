<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPlace;
use App\Event;
use Session;
use App\Http\Requests\EventPlaceRequest;

class EventPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_places = EventPlace::all();
        return view('event_place.index', compact('event_places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('event_place.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPlaceRequest $request)
    {
        $event_place = new EventPlace;
        $event_place->event_id = $request->event_id;
        $event_place->name = $request->name;
        $event_place->reserved_co = $request->reserved_co;
        $event_place->save();
        if ($event_place) {
            Session::flash('created', 'New Event Place Added Successfully');
            return redirect()->route('event_place.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event_place = EventPlace::findOrFail($id);
        $events = Event::all();
        return view('event_place.edit', compact('event_place', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventPlaceRequest $request, $id)
    {
        $event_place = EventPlace::find($id);
        $event_place->event_id = $request->event_id;
        $event_place->name = $request->name;
        $event_place->reserved_co = $request->reserved_co;
        $event_place->reserved = ($request->reserved)?1:0;
        $event_place->update();
        if ($event_place) {
            Session::flash('updated', 'Event Place Updated Successfully');
            return redirect()->route('event_place.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event_place = EventPlace::findOrFail($id);
        $event_place->delete();
        if ($event_place) {
            Session::flash('deleted', 'Event Place deleted Successfully!');
            return redirect()->route('event_place.index');
        }
    }
}
