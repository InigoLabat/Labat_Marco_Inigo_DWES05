<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    protected $table = 'atletas';
    protected $primaryKey = 'id_atleta';
    public $timestamps = true;

    protected $fillable = ['nombre', 'apellido', 'id_club', 'prueba', 'marca'];

    public function club()
    {
        return $this->belongsTo(Club::class, 'id_club');
    }
}
