<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    use HasFactory;

    protected $table = 'quotations';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_date',
        'address',
        'message',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

