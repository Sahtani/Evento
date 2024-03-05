<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function resevations(){
        return $this->hasMany(Reservation::class);
        
    }
    public function category(){
       return $this->belongsTo(Category::class);
        
    }
    public function user(){
        return $this->belongsTo(User::class)->where('role', 'organizator');
         
     }
}
