<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent ;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'menu', 'address', 'ratings', 'photo_1', 'photo_2', 'photo_3', 'price'];

    // app/Models/Restaurant.php

public function bookings()
{
    return $this->hasMany(Booking::class);
}

    
}
