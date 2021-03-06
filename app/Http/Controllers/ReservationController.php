<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPlace;
use Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notReservable = EventPlace::where('is_reservable', 0)->get();
        $reservable = EventPlace::where('is_reservable', 1)->get();
        return view('reservation.index', compact('notReservable', 'reservable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->id);
        $event_place = EventPlace::find($request->id);
        // dd($request);
        if ($event_place->reserved == 1) {
            $event_place->reserved = 0;
            $event_place->user_id = null;
            $event_place->update();
        } else {
            $event_place->reserved = 1;
            $event_place->user_id = Auth::user()->id;
            $event_place->update();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateReservable(Request $request, $id) {
        $event_place = EventPlace::findOrFail($id);
        $event_place->is_reservable = $request->reservable;
        $event_place->update();
        
        return response()->json('Success', 200);
    }
}
