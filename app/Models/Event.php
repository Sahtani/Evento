<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

protected $fillable=['title','description','image','date','location','category_id','user_id','nbr','price','mode'];
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
