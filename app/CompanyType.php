<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class CompanyType extends Model
{
	/**
	 * [companies description]
	 * @return [type] [description]
	 */
    public function companies () {
    	return $this->hasMany(Company::class, 'company_type_id');
    }
}
