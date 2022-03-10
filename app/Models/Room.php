<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'jumlah_kamar',
    ];

    public function facilitie()
    {
        return $this->hasMany(FacilitieRoom::class, 'room_id', 'id');
    }
}
