<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Services\AprendizService;
use App\Http\Requests\RequestAprendiz;
 
class AprendizController extends Controller
{
    public function __construct(private AprendizService $aprendizService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->aprendizService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los aprendices correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(AprendizService $request)
    {
        $registroAprendiz = $this->aprendizService->create($request->validated());
               
        return response()->json([
            'message' => 'El raprendiz se creó correctamente',
            'datosRegistrados' => $registroAprendiz
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->aprendizService->getById($id);
 
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
    public function update(RequestAprendiz $request, string $id)
    {
        $registroActualizado = $this->aprendizService->update($id, $request->validated());
 
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
        $validar = $this->aprendizService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El aprendiz se eliminó correctamente',
        ], 200);
    }
 
    public function findByEmail(string $name)
    {
        $registros = $this->aprendizService->findByEmail($email);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 
}
 
 