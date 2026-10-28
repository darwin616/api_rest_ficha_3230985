<?php
 
namespace App\Http\Controllers;
 
use App\Services\UsuarioService;
use App\Http\Requests\RequestUsuario;
 
class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->usuarioService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los usuarios correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestUsuario $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());
               
        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registroUsuario
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->usuarioService->getById($id);
 
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
    public function update(RequestUsuario $request, string $id)
    {
        $registroActualizado = $this->usuarioService->update($id, $request->validated());
 
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
        $validar = $this->usuarioService->delete($id);
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
    
    public function findByCorreo(string $correo){
        $registros = $this->$usuarioService->findByCorreo($correo);
               if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese correo '.$correo
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el correo '.$correo,
        ], 200);

    }
    public function findByName(string $name)
    {
        $registros = $this->usuarioService->findByName($name);
               if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese nombre '.$name
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el nombre: '.$name,
        ], 200);

    }
 
    public function findByActive(boolean $activo){
        $registros = $this->$usuarioService->findByActive($activo);
               if(!validar)
        {
            return response()->json([
                'message' => 'No hay usuarios activos'
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontraron usuarios activos',
            'data' => $registros
        ], 200);
    }
}
 
 
