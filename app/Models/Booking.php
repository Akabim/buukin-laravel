<?php

namespace App\Models;
use App\Models\Resto;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['status'];


    public function restaurant()
{
    return $this->belongsTo(Resto::class, 'restaurant_id');
}

}
