<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\Actividad;
use App\Models\Carpeta;
use App\Models\Image;

class Tarea extends Model
{
    use HasFactory;

    //Muchas tareas son asignadas a muchos alumnos
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_tarea', 'id', 'user_id');
    }

    //UNA TAREA POSEE MUCHAS ACTIVIDADES
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }

    //UNA TAREA PERTENECE A UNA SOLA CARPETA
    public function carpeta()
    {
        return $this->belongsTo(Carpeta::class);
    }


}