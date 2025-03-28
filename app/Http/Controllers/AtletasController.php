<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use App\DTO\AtletaDTO;

class AtletasController extends Controller
{
    public function getAll() {
        // con ::with, hacemos lo mismo que con ::all pero añadimos la información del club asociado al atleta
        $atletas = Atleta::with('club')->get();
        $dtosAtletas = [];

        foreach ($atletas as $atleta){
            $dtosAtletas[] = new AtletaDTO($atleta);
        }
        
        if ($dtosAtletas) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Contenido mostrado correctamente';
            
            return $this->sendResponse($status, $cod, $mensaje, $dtosAtletas);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al acceder al contenido';
            
            return $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function getById($id){
            $atleta = Atleta::with('club')->find($id);

            if ($atleta) {
                $status = 'SUCCES';
                $cod = 200;
                $mensaje = 'Elemento mostrado correctamente';
                
                return $this->sendResponse($status, $cod, $mensaje, new AtletaDTO($atleta));
            } else {
                $status = 'NO SUCCES';
                $cod = 404;
                $mensaje = 'Error al acceder al elemento';
                
                return $this->sendResponse($status, $cod, $mensaje, null);
            }
    }

    public function getByClubId($id) {
        $atletas = Atleta::with('club')->where('id_club', $id)->get();
        $dtosAtletas = [];

        foreach ($atletas as $atleta) {
            $dtosAtletas[] = new AtletaDTO($atleta);
        }

        if ($dtosAtletas) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elementos del club mostrados correctamente';
            
            return $this->sendResponse($status, $cod, $mensaje, $dtosAtletas);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al acceder al ID del club. No encontrado.';
            
            return $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function create(Request $request){
        $atleta = Atleta::create($request->all());

        if ($atleta) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento creado correctamente';
            
            return $this->sendResponse($status, $cod, $mensaje, new AtletaDTO($atleta));
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al crear el elemento';
            
            return $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function update(Request $request, $id){
        $atleta = Atleta::find($id);

        if ($atleta) {
            $atleta->update($request->all());

            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento con ID '. $id . ' actualizado correctamente';
            
            return $this->sendResponse($status, $cod, $mensaje, new AtletaDTO($atleta));
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al actualizar el contenido';
            
            return $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function delete($id){
        $atleta = Atleta::find($id);

        if ($atleta) {
            $atleta->delete();

            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'El siguiente elemento se ha eliminado correctamente';
            
            return $this->sendResponse($status, $cod, $mensaje, new AtletaDTO($atleta));
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al eliminar el elemento';
            
            return $this->sendResponse($status, $cod, $mensaje, null);
        }
    }
        
    public function sendResponse($status, $cod, $mensaje, $data) {
        return response()->json([
            'status' => $status,
            'codigo' => $cod,
            'mensaje' => $mensaje,
            'data' => $data
        ], $cod);
    }
}
