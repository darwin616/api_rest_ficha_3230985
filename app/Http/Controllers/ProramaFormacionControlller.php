<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProgramaFormacionServices;
use App\Http\Request\RequesProgramaFormacion;
 
class ProgramaFormacionController extends Controller
{
    public function __construct(private ProgramaFormacionService $programaformacionServices)
    {
    }
 
    // api/v1/programaformacion/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->ProgramaFormacionServices->getAll();
 
        return response()->json([
            'message'  => "Se creo el programaformacion",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestProgramaFormacion $request)
    {
        $registroProgramaFormacion = $this->ProgramaFormacionServices->create($request->validated());
               
        return response()->json([
            'message' => 'Se creo el programaformacion',
            'datosRegistrados' => $registroProgramaFormacion
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->programaformacionService->getById($id);
 
        if(!registroActulizado)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el registro correctamente',
            'data'=>$registro
        ], 200);
    }
 
 
    //Actualizar un registro
    public function update(RequestProgramaFormacion $request, string $id)
    {
        $registroActualizado = $this->programaformacionServices->update($id, $request->validated());
 
              if(!Validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
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
        $validar = $this->programaformacionServices->delete($id);
                      if(!registro)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El programaformacion se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $registros = $this->programaformacionServices->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 
}
 
