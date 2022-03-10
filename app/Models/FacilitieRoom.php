<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilitieRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'room_id',
        'facilitie',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
