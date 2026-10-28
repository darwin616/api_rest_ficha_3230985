<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Services\RolServices;
use App\Http\Requests\RequestRol;
 
class RolController extends Controller
{
    public function __construct(private RolService $rolService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->rolService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los roles correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestRol $request)
    {
        $registroRol = $this->rolService->create($request->validated());
               
        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registroRol
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->rolService->getById($id);
 
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
        $registroActualizado = $this->rolService->update($id, $request->validated());
 
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
        $validar = $this->rolService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El rol se eliminó correctamente',
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
 
    public function findByDescription(string $description)
    {
        $registros = $this->rolService->findByDescription($description);
        
        return reponse()->json([
            'menssage' => 'Se listó correctamente por descripción',
            'data' => $registros
        ], 200);
    }
}