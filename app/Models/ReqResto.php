<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqResto extends Model
{
    use HasFactory;

    protected $fillable = ['resto_name', 'description', 'menu', 'address', 'ratings', 'price', 'username', 'email', 'password' ];

}
