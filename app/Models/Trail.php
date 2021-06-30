<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trail_items;

class Trail extends Model
{
    use HasFactory;
    protected $table ='trail';
    protected $fillable = [
        'customer_id',
        'trail_to',
        'flying_from',
        'total_cost',
    ];

    public function getTrailsItems()
    {
        return $this->hasMany(Trail_items::class, 'trail_id', 'id');
    }
    
}
