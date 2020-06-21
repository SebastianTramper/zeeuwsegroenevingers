<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'text','excerpt', 'slug','image','categorie_id','seizoen_id'];

   public function categorie(){
       return $this->belongsTo(Categorie::class);
   }
}
