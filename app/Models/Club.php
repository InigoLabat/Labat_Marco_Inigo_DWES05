<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubes';
    protected $primaryKey = 'id_club';
    public $timestamps = true;

    protected $fillable = ['nombre_club', 'ciudad', 'fundacion'];

    public function atletas()
    {
        return $this->hasMany(Atleta::class, 'id_club');
    }
}
