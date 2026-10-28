<?php
 
namespace App\Http\Controllers;

use App\Service\InstuctorServices;
use App\Http\Request\RequestInstructor;
 
class InstructorController extends Controller
{
    public function __construct(private InstructorService $instructorService)
    {
    }
    //200 ok/201 se creo/400 error de validacion/404 no encontrado/500 error del servidor
    // api/v1/instructor/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->instructorService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los instructores correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestInstructor $request)
    {
        $registroInstructor = $this->instructorService->create($request->validated());
               
        return response()->json([
            'message' => 'El instructor se creó correctamente',
            'datosRegistrados' => $registroInstructor
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->instructorService->getById($id);
 
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
    public function update(RequestInstructor $request, string $id)
    {
        $registroActualizado = $this->instructorService->update($id, $request->validated());
 
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
        $validar = $this->instructorService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El instructor se eliminó correctamente',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $registros = $this->instructorService->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
    // Buscar instructores por Centro
    public function findByCentro(string $centroId)
    {
        $registros = $this->instructorService->findByCentro($centroId);
        return response()->json(['data' => $registros], 200);
    }

    // Buscar instructores por Especialidad
    public function findByEspecialidad(string $especialidadId)
    {
        $registros = $this->instructorService->findByEspecialidad($especialidadId);
        return response()->json(['data' => $registros], 200);
    }
    
    // Buscar por Usuario
    public function findByUsuario(string $usuarioId)
    {
        $registros = $this->instructorService->findByUsuario($usuarioId);
        
        return response()->json([
            'message' => 'Instructores filtrados por usuario',
            'data' => $registros
        ], 200);
    }

    // Buscar por Competencia
    public function findByCompetencia(string $competenciaId)
    {
        $registros = $this->instructorService->findByCompetencia($competenciaId);
        
        return response()->json([
            'message' => 'Instructores filtrados por competencia',
            'data' => $registros
        ], 200);
    }

    // Buscar por Tipo de Vinculación
    public function findByTipoVinculacion(string $tipoVinculacionId)
    {
        $registros = $this->instructorService->findByTipoVinculacion($tipoVinculacionId);
        
        return response()->json([
            'message' => 'Instructores filtrados por tipo de vinculación',
            'data' => $registros
        ], 200);
    }
    // Buscar por Correo (retorna 1 solo registro porque es unique)
    public function findByCorreo(string $correo)
    {
        $registro = $this->instructorService->findByCorreo($correo);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró ningún instructor con ese correo'
            ], 404);
        }

        return response()->json([
            'message' => 'Instructor encontrado por correo',
            'data' => $registro
        ], 200);
    }

    // Buscar por Apellidos 
    // (Útil si quieres buscar solo por apellidos, separado del findByName)
    public function findByApellidos(string $apellidos)
    {
        $registros = $this->instructorService->findByApellidos($apellidos);

        return response()->json([
            'message' => 'Búsqueda por apellidos completada',
            'data' => $registros
        ], 200);
    }
}

 
 