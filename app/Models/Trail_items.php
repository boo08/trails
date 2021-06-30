<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trail;

class Trail_items extends Model
{
    use HasFactory;

    protected $table="trail_items";


    protected $fillable = [
        'trail_id',
        'date',
        'cost',
    ];
    public $timestamps = false;
    public function getTrails()
    {
        return $this->belongsTo(Trail::class, 'id', 'trail_id');
    }
}
