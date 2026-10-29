<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\RequestUsuario;
use App\Services\UsuarioService;
 
class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }
 
    public function index()
    {
        $registros = $this->usuarioService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los usuarios correctamente",
            'data' => $registros
        ], 200);
    }
 
    public function store(RequestUsuario $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());
               
        return response()->json([
            'message' => 'El usuario se creó correctamente',
            'datosRegistrados' => $registroUsuario
        ], 201);
    }
 
    public function show(int $id)
    {
        $registro = $this->usuarioService->getById($id);
 
        if (!$registro)
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
 
 
    public function update(RequestUsuario $request, int $id)
    {
        $registroActualizado = $this->usuarioService->update($id, $request->validated());
 
        if (!$registroActualizado)
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
 
    public function destroy(int $id)
    {
        $validar = $this->usuarioService->delete($id);
        if (!$validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El usuario se eliminó correctamente',
        ], 200);
    }
    
    public function findByCorreo(string $correo)
    {
        $registros = $this->usuarioService->findByCorreo($correo);
        if (count($registros) === 0)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese correo '.$correo
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el correo '.$correo,
            'data' => $registros,
        ], 200);
    }

    public function findByName(string $name)
    {
        $registros = $this->usuarioService->findByName($name);
        if (count($registros) === 0)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese nombre '.$name
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el nombre: '.$name,
            'data' => $registros,
        ], 200);
    }
 
    public function findByActive(string $activo)
    {
        $estadoActivo = filter_var($activo, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if ($estadoActivo === null) {
            return response()->json([
                'message' => 'El estado activo debe ser true, false, 1 o 0.',
            ], 422);
        }

        $registros = $this->usuarioService->findByActive($estadoActivo);
        if (count($registros) === 0)
        {
            return response()->json([
                'message' => 'No hay usuarios con el estado solicitado'
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontraron usuarios con el estado solicitado',
            'data' => $registros
        ], 200);
    }
}
 
 
