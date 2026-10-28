<?php

namespace App\Http\Controllers;
 
use App\Service\MallaTrimestralServices;
use App\Http\Request\RequestMallaTrimestral;

class MallaTrimestralController extends Controller
{
    public function __construct(private MallaTrimestralService $mallaTrimestralService)
    {
    }

    public function index()
    {
        $registros = $this->mallaTrimestralService->getAll();

        return response()->json([
            'message' => "Se listaron las mallas trimestrales correctamente",
            'data'    => $registros
        ], 200);
    }

    public function store(MallaTrimestralRequest $request)
    {
        $registroMalla = $this->mallaTrimestralService->create($request->validated());
               
        return response()->json([
            'message'          => 'La malla trimestral se creó correctamente',
            'datosRegistrados' => $registroMalla
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->mallaTrimestralService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data'    => $registro
        ], 200);
    }

    public function update(MallaTrimestralRequest $request, string $id)
    {
        $registroActualizado = $this->mallaTrimestralService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data'    => $registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->mallaTrimestralService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La malla trimestral se eliminó correctamente',
        ], 200);
    }

    public function findByPrograma(int $programa_formacion_id)
    {
        $programas = $this->mallaTrimestralService->findByPrograma($programa_formacion_id);
        
        return response()->json([
            'message' => 'Estos son todos los registros del programa de formación',
            'data'    => $programas
        ], 200);
    }

    public function findByTrimestre(int $trimestre_id)
    {
        $trimestres = $this->mallaTrimestralService->findByTrimestre($trimestre_id);
        
        return response()->json([
            'message' => 'Estos son todos los registros de trimestres',
            'data'    => $trimestres
        ], 200);
    }

    public function findByResultado(int $resultado_aprendizaje_id)
    {
        $resultados = $this->mallaTrimestralService->findByResultado($resultado_aprendizaje_id);
        
        return response()->json([
            'message' => 'Estos son todos los registros de los resultados de aprendizaje',
            'data'    => $resultados
        ], 200);
    }
    
    public function findByHora(int $horas_programadas)
    {
        $horas = $this->mallaTrimestralService->findByHora($horas_programadas);
        
        return response()->json([
            'message' => 'Estas son todas las horas programadas',
            'data'    => $horas
        ], 200);
    }

    public function findByOrden(string $orden)
    {
        $ordenRegistros = $this->mallaTrimestralService->findByOrden($orden);
        
        return response()->json([
            'message' => 'Estos son todos los registros ordenados',
            'data'    => $ordenRegistros
        ], 200);
    }
}