<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventPlace;

class Event extends Model
{
	/**
	 * [event_place description]
	 * @return [type] [description]
	 */
    public function event_place () {
    	return $this->belongsTo(EventPlace::class, 'event_id');
    }
}
