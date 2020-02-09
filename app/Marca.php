<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Coche;
class Marca extends Model
{
    protected $fillable=['nombre', 'logo', 'pais'];
    //vamos con las relaciones es 1:N es decir de una marca
    //tendremos muchos coches, en marccas pondremos
    public function coches(){
        return $this->hasMany(Coche::class);
    
    }

    public function scopePais($query, $v){
        if(!isset($v)){
            return $query->where('pais', 'like','%');
        }
        if($v=='%'){
            return $query->where('pais','like', $v);
        }
        return $query->where('pais', $v);
    }
}
