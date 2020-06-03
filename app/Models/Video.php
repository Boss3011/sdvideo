<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable =[
    'name',
    'des',
    'meta_keywords',
    'meta_des',
    'youtube',
    'published',
    'user_id',
    'cat_id',
    'image'

    ];
    public function user()
    
       {
           return $this->belongsTo('App\Models\User', 'user_id');
       }
       public function cat()
    
       {
           return $this->belongsTo('App\Models\Category', 'cat_id');
       }
       public function myvideos()
    
       {
           return $this->belongsToMany('App\Models\Myvideo', 'myvideos_videos');
       }
       
           public function comments()
           {
               return $this->hasMany('App\Models\Comments');
           }
    
       public function tags()
    
       {
           return $this->belongsToMany('App\Models\Tag', 'tags_videos');
       }
     public function scopePublished(){
         return $this->where('published',1);
     }       
    
}
