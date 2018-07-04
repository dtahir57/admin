<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CompanyType;

class Company extends Model
{
	/**
	 * [company_type description]
	 * @return [type] [description]
	 */
    public function company_type () {
    	return $this->belongsTo(CompanyType::class, 'company_type_id');
    }
}
