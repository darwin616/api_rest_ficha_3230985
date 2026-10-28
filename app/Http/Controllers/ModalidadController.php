<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Services\ModalidadServices;
use App\Http\Requests\RequestModalidad;
 
class RolController extends Controller
{
    public function __construct(private ModalidadService $modalidadService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->modalidadService->getAll();
 
        return response()->json([
            'message'  => "Se listo la modalidad correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestModalidad $request)
    {
        $registroModalidad = $this->modalidadService->create($request->validated());
               
        return response()->json([
            'message' => 'La modalidad se creó correctamente',
            'datosRegistrados' => $registroModalidad
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->modalidadService->getById($id);
 
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
    public function update(RequestModalidad $request, string $id)
    {
        $registroActualizado = $this->modalidadService->update($id, $request->validated());
 
              if(!registroActualizado)
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
        $validar = $this->modalidadService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'La modalidad se eliminó correctamente',
        ], 200);
    }
}
 
 


public function findByName(string $name)
    {
        $registros = $this->rolService->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 