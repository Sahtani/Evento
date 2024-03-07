<?php

namespace App\Models;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
protected $fillable=['user_id','event_id','status'];
    public function user(){
        return $this->belongsTo(User::class)->where('role', 'user');
         
     }
    public function reservation(){
        return $this->belongsTo(Event::class);
         
     }
}
