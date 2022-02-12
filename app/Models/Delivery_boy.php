<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_boy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'password',
        'status',
        'added_on'
    ];
    protected $primaryKey = 'id';
}
