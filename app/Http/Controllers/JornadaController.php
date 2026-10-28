<?php
 
namespace App\Http\Controllers ;

use Illuminate\Http\Request;
use App\Http\Requests\RequestJornada;
use App\Services\JornadaService ;
 
class JornadaController extends Controller
{
public function __construct(private RolJornadaServices $rolJornadaServices)
    {
    }
 
    
public function index()
    {
        $registros = $this->jornadaService->getAll();
 
        return response()->json([
            'message' => "Se listaron los roles correctamente",
            'datos' => $registros
        ], 200 );
    }
 
    // Crear un registro
public function almacenar(RequestJornada $request)
    {
        $registroRol = $this- >rolJornadalServices->create($request->validated());
               
        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registroRol
        ], 201 );
    }
 
   //Traer un registro por id
función     pública mostrar( cadena $id)
    {
        $registroActualizado = $this- >$rolJornadaServices->getById($id);
 
        si(! $registroActualizado )
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404 );
        }
 
        return response()->json([
            'message' =>'se listó el registro correctamente',
            'datos'=>$registro
        ], 200 );
    }
 
 
    //Actualizar un registro
función     pública actualizar( RequestRol $request, string $id)
    {
        $registroActualizado = $this- >rolJornadaServices->update($id, $request->validated());
 
              si(! registro )
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404 );
        }
 
       return response()->json([
            'message' =>'se actualizó el registro correctamente',
            'data'=>$registroActualizado
        ], 200 );
    }
 
    //Eliminar un registro
función     pública destruir( cadena $id)
    {
        $validar = $this- >rolJornadaServices->delete($id);
                      si(! $validar )
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404 );
        }
 
        return response())->json([
            'message' =>'El rol se eliminó correctamente',
        ], 200 );
    }
 
función     pública findByName( cadena $name)
    {
        $registros = $this- >rolJornadaServices->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'datos' => $registros
        ], 200 );
    }
 
}
 