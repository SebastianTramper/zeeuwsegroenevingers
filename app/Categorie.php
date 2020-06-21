<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name','image'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts(){
       return $this->hasMany(Posts::class,"categorie_id","id");
    }
}
