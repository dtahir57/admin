<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class EventPlace extends Model
{
	/**
	 * [events description]
	 * @return [type] [description]
	 */
    public function events () {
    	return $this->hasMany(Event::class, 'event_id');
    }
}
