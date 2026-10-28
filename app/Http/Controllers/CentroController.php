<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CentroService;
use App\Request\RequestCentro;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private CentroService $centroService)//traer todos los registros - get
    {
    }

    public function index()
    {
        $registros = $this->centroService->getAll();

        return response()->json([
            'message' => "Se encontraron los centros correctamente",
            'data' => $registros
        ], 200);
    }
    

    public function store(RequestCentro $request)
    {
        $registroCentro = $this->centroService->create($request->validated());
               
        return response()->json([
            'message' => 'El centro se creó correctamente',
            'datosRegistrados' => $registroCentro
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->centroService->getById($id);
 
        if(!regitros)
        {
            return response()->json([
                'message' => 'Pa, no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se listó el registro correctamente',
            'data'=>$registro
        ], 200);
    }
 
    //Actualizar un registro
    public function update(RequestCentro $request, string $id)
    {
        $registroActualizado = $this->centroService->update($id, $request->validated());
 
              if(!registro)
        {
            return response()->json([
                'message' => 'Pa, no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se actualizó el registro correctamente',
            'data'=>$registroActualizado
        ], 200);
    }
 
    //Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->centroService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Pa, no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El centro se eliminó correctamente',
        ], 200);
    }
 
    public function findByNameOrCode(Request $request)
    {
        $registros = $this->centroService->findByNameOrCode($codigo, $nombre);
        
        return response()->json([
            'message' => 'Se listó correctamente por código o nombre',
            'data' => $registros
            ], 200);
    }

 public function findByRegion(string $region)
    {
        $registros = $this->centroService->findByRegion($region);

        return response()->json([
            'message' => 'Se listó correctamente por regional',
            'data' => $registros
        ], 200);
    }

    public function findByDireccion(string $direccion)
    {
        $registros = $this->centroService->findByDireccion($direccion);

        return response()->json([
            'message' => 'Se listó correctamente por dirección',
            'data' => $registros
        ], 200);
    }

}