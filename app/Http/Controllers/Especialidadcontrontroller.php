<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Service\RolServices;
use App\Http\Request\RequestRol;
 
class RolController extends Controller
{
    public function __construct(private EspecialidadServices $EspecialidadServices)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->EspecialidadServices->getAll();
 
        return response()->json([
            'message'  => "Se listaron las especialidades correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestRol $request)
    {
        $registroEspeecialidad = $this->EspecialidadServices->create($request->validated());
               
        return response()->json([
            'message' => 'La especialidad se creò correctamente',
            'datosRegistrados' => $registroEspecialidad
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->EspecialidadServices->getById($id);
 
        if(!registro)
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
    public function update(RequestRol $request, string $id)
    {
        $registroActualizado = $this->EspecialidadServices->update($id, $request->validated());
 
              if(!registro)
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
        $validar = $this->EspecialidadServices->delete($id);
                      if(!registro)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'La especialidad se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $registros = $this->rolService->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 
}
 
 
