<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable=['nombre', 'logo', 'pais'];
    //vamos con las relaciones es 1:N es decir de una marca
    //tendremos muchos coches, en marccas pondremos
    public function coches(){
        return $this->hasMany(Coche::class);
    }
}
