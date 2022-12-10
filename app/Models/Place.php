<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_place');
    }

    public function travelList() {
        return $this->hasMany(ListTravel::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'list_travels');
    }
}
