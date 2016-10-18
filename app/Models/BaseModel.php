<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    // create accessors for created_at and updated_at so they will be converted from UT to loal time
    public function getCreatedAtAttribute($value) {
    	$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
    }

    public function getUpdatedAtAttribute($value) {
    	$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago') ;
    }
}
