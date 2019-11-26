<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    /* public function cursos(){
        return $this->hasMany(Curso::class);
    } */

    public function cursos(){
        return $this->belongsToMany(Curso::class, 'curso_cliente')->withPivot('emitido', 'vencimiento', 'codigo');
    }
}
