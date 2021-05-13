<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public function ingredients()
    {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Models\Ingredient');
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }
}