<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Event;

class CalenderController extends Controller
{
    public function index() {
    	$events = Event::all();
    	$event_list = [];
    	foreach ($events as $event) {
    		$event_list[] = Calendar::event(
    			$event->name,
    			true,
    			new \DateTime($event->date_f),
    			new \DateTime($event->date_t. ' +1 day'),
    			$event->id
    		);
    	}
    	$calender_details = Calendar::addEvents($event_list);
    	return view('calender.index', compact('calender_details'));
    }
}
