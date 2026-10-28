<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JornadaRequest;
use App\Services\JornadaService;
 
class JornadaController extends Controller
{
    public function __construct(private JornadaService $jornadaService)
    {
    }
 
    public function index()
    {
        $records = $this->jornadaService->getAll();
 
        return response()->json([
            'message' => 'Jornadas retrieved successfully',
            'data' => $records
        ], 200);
    }
 
    // Create a new record
    public function store(JornadaRequest $request)
    {
        $jornadaRecord = $this->jornadaService->create($request->validated());
               
        return response()->json([
            'message' => 'Jornada created successfully',
            'registeredData' => $jornadaRecord
        ], 201);
    }
 
    // Fetch a record by ID
    public function show(string $id)
    {
        $record = $this->jornadaService->getById($id);
 
        if (!$record) {
            return response()->json([
                'message' => 'Record not found with the provided ID'
            ], 404);
        }
 
        return response()->json([
            'message' => 'Record retrieved successfully',
            'data' => $record
        ], 200);
    }
 
    // Update a record
    public function update(JornadaRequest $request, string $id)
    {
        $updatedRecord = $this->jornadaService->update($id, $request->validated());
 
        if (!$updatedRecord) {
            return response()->json([
                'message' => 'Record not found with the provided ID'
            ], 404);
        }
 
        return response()->json([
            'message' => 'Record updated successfully',
            'data' => $updatedRecord
        ], 200);
    }
 
    // Delete a record
    public function destroy(string $id)
    {
        $deleted = $this->jornadaService->delete($id);

        if (!$deleted) {
            return response()->json([
                'message' => 'Record not found with the provided ID'
            ], 404);
        }
 
        return response()->json([
            'message' => 'Jornada deleted successfully',
        ], 200);
    }
 
    public function findByName(string $name)
    {
        $records = $this->jornadaService->findByName($name);
 
        return response()->json([
            'message' => 'Records retrieved successfully by name',
            'data' => $records
        ], 200);
    }
}