<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'product', 'merchant_inv', 'recipient_address', 'recipient_name', 'recipient_phone', 'pickup_address', 'pickup_type', 'zone', 'package_id'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function reschedule()
    {
        return $this->hasMany(Reschedule::class);
    }
}
