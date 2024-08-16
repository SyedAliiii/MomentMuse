<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';
    
    protected $fillable = [
        'title',
        'currency_code',
        'price',
        'image',
        'description'
    ];

    public function items()
    {
        return $this->belongsToMany(Items::class, 'includes', 'service_id', 'items_id');
    }
}
