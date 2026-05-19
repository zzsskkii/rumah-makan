<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'category_id', 'price'];

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}