<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Includes extends Model
{
    use HasFactory;

    protected $table = 'includes';

    protected $fillable = [
        'service_id',
        'items_id',
    ];

    public $timestamps = false;

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function item()
    {
        return $this->belongsTo(Items::class, 'items_id');
    }
}
