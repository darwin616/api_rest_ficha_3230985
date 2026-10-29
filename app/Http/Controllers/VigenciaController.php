<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Requests;
use App\Services\VigenciaService;
use App\Http\Requests\RequestVigencia;
 
class VigenciaController extends Controller
{
    public function __construct(private VigenciaService $vigenciaService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->vigenciaService->getAll();
 
        return response()->json([
            'message'  => "Se listaron las vigencias correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestVigencia $request)
    {
        $registroVigencia = $this->vigenciaService->create($request->validated());
               
        return response()->json([
            'message' => 'La vigencia se creó correctamente',
            'datosRegistrados' => $registroVigencia
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->vigenciaService->getById($id);
 
        if(!$registro)
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
    public function update(RequestVigencia $request, string $id)
    {
        $registroActualizado = $this->vigenciaService->update($id, $request->validated());
 
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
        $validar = $this->vigenciaService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'La vigencia se eliminó correctamente',
        ], 200);
    }
 
 
}
 