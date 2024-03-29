<?php

namespace App\Models;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];

    public function user(){
        return $this->belongsTo(User::class)->where('role', 'admin');
     }
    public function events(){
        return $this->hasMany(Event::class);
     }

}
