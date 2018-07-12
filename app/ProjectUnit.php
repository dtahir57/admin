<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ProjectUnit extends Model
{
    public function project_unit () {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
