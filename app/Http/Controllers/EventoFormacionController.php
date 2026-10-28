<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Services\EventoFormacionServices;
use App\Http\Requests\RequestEventoFormacion;
 
class RolController extends Controller
{
    public function __construct(private EventoFormacionService $eventoformacionService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->eventoformacionService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los eventos correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestEventoFormacion $request)
    {
        $registroEventoFormacion = $this->eventoformacionService->create($request->validated());
               
        return response()->json([
            'message' => 'El evento se creó correctamente',
            'datosRegistrados' => $registroEventoFormacion
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->EventoformacionService->getById($id);
 
        if(!registro)
        {
            return response()->json([
                'message' => 'Manito no se encontró el evento con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el evento correctamente',
            'data'=>$registro
        ], 200);
    }
 
 
    //Actualizar un registro
    public function update(RequestEventoFormaion $request, string $id)
    {
        $registroActualizado = $this->EventoformacionService->update($id, $request->validated());
 
              if(!registroActualizado)
        {
            return response()->json([
                'message' => 'Manito no se encontró el evento con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se actualizó el evento correctamente',
            'data'=>$registroActualizado
        ], 200);
    }
 
    //Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->EventoformacionService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el evento con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El evento se eliminó correctamente',
        ], 200);
    }
 
    public function findByHour(int $horaInicio, int $horaFin)
    {
     $registro = $this->EventoFormacionService->findByHour($horaInicio, $horaFin);

        if(!$registro)
        {
            return response()->json([
                'message'=> `no se encontraron horas registradas del evento`,
                'data'=>$registro
            ],404);
        }
        return response()->json([
            'message' =>'se encontraron las horas correctamente',
            'data'=>$registro
        ], 200);
     }
     public function findByDay(int $diaId)
     {
        $registro = $this->EventoFormacionService->findByDay($diaId);
        return response()->json([
            'message'=>'dia guardado correctamente',
            'data'=>$registro
        ],200);
     }
     public function findByDate(carbon $fechaInicio, carbon $fechaFin )
    {
     $registro = $this->EventoFormacionService->findByHour($fechaInicio, $fechaFin);

        if(!$registro)
        {
            return response()->json([
                'message'=> `no se encontraron fechas registradas del evento`,
                'data'=>$registro
            ],404);
        }
        return response()->json([
            'message' =>'se encontraron las fechas correctamente',
            'data'=>$registro
        ], 200);
     }
}
 