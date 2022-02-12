<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_name',
        'dish_detail',
        'dish_image',
        'dish_status',
    ];
    protected $primaryKey = 'id';

    function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
