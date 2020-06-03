<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable=
       ['user_id','video_id','comment'];

       public function user()
    
       {
           return $this->belongsTo('App\Models\User');
       }
       public function video()
    
       {
           return $this->belongsTo('App\Models\Video');
       }
    
}
