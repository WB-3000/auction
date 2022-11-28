<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = ['user_id', 'name', 'description'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'lot_categories')->withPivot( 'category_id');
    }
}
