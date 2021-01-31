<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reschedule extends Model
{
    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }
}
