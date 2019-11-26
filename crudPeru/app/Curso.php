<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    /* public function cliente(){
        return $this->belongsTo(Cliente::class);
    } */

    public function clientes(){
        return  $this->belongsToMany(Cliente::class, 'curso_cliente');
    }
}
