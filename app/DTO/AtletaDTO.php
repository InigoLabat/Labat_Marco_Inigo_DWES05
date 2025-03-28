<?php
namespace App\DTO;

use App\Models\Atleta;
use JsonSerializable;

class AtletaDTO implements JsonSerializable {

    private $nombre;
    private $apellido;
    private $prueba;
    private $marca;
    private $nombre_club;

    public function __construct(Atleta $atleta)
    {
        $this->nombre = $atleta->nombre;
        $this->apellido = $atleta->apellido;
        $this->prueba = $atleta->prueba;
        $this->marca = $atleta->marca;
        $this->nombre_club = $atleta->club->nombre_club;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get the value of prueba
     */
    public function getPrueba()
    {
        return $this->prueba;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Get the value of nombre_club
     */
    public function getNombreClub()
    {
        return $this->nombre_club;
    }

}