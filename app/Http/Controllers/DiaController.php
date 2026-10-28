<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Service\DiaService;
use App\Http\Request\RequestDia;
 
class RolController extends Controller
{
    public function __construct(private DiaService $diaService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->diaService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los dias correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestDia $request)
    {
        $registroDia = $this->diaService->create($request->validated());
               
        return response()->json([
            'message' => 'El dia se creó correctamente',
            'datosRegistrados' => $registroDia
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->diaService->getById($id);
 
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
    public function update(diaService $request, string $id)
    {
        $registroActualizado = $this->diaService->update($id, $request->validated());
 
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
        $validar = $this->diaService->delete($id);
        if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El dia se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $registros = $this->diaService->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
    public function findByOrder(string $orden)
    {
        $registros = $this->diaService->findByOrder($name);
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 
}