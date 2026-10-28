<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestJornada;
use App\Services\JornadaService; // Corregido: Usar el servicio de Jornada
 
class JornadaController extends Controller
{
    // Inyección de dependencia corregida a $jornadaService
    public function __construct(private JornadaService $jornadaService)
    {
    }
 
    public function index()
    {
        $registros = $this->jornadaService->getAll();
 
        return response()->json([
            'message' => "Se listaron las jornadas correctamente",
            'datos' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function almacenar(RequestJornada $request)
    {
        $registroJornada = $this->jornadaService->create($request->validated());
               
        return response()->json([
            'message' => 'La jornada se creó correctamente',
            'datosRegistrados' => $registroJornada // Corregido $registroRol a $registroJornada
        ], 201);
    }
 
    // Traer un registro por id
    public function mostrar(string $id)
    {
        $registro = $this->jornadaService->getById($id);
 
        // Corregido: 'si' por 'if', eliminada la coma sobrante y corregida la variable
        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'datos' => $registro // Corregido $registro en lugar de undefined
        ], 200);
    }
 
    // Actualizar un registro
    public function actualizar(RequestJornada $request, string $id) // Corregido: public function y RequestJornada
    {
        // Corregido: flecha '->' rota y método del servicio
        $registroActualizado = $this->jornadaService->update($id, $request->validated());
 
        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }
 
    // Eliminar un registro
    public function destruir(string $id) // Corregido: public function y 'string $id'
    {
        // Corregido: flecha '->'
        $validar = $this->jornadaService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        // Corregido: Se quitó un paréntesis sobrante en response()
        return response()->json([
            'message' => 'La jornada se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name) // Corregido: public function y 'string $name'
    {
        $registros = $this->jornadaService->findByName($name);
 
        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'datos' => $registros
        ], 200);
    }
}