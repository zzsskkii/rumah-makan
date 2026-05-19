<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
   protected $fillable = ['name'];

   public function student()
   {
       return $this->belongsTo(Menu::class);
   }
}

