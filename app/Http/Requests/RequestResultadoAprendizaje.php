<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResultadoAprendizajeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        
        // Captura el ID dependiendo de cómo nombres tu parámetro en la ruta (ej. resultado_aprendizaje, resultadoAprendizaje o id)
        $resultadoId = $this->route('resultado_aprendizaje') ?? $this->route('resultadoAprendizaje') ?? $this->route('id');

        return [
            'competencias_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:competencias,id' // Valida que la competencia exista en la base de datos
            ],
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('resultados_aprendizaje', 'codigo')->ignore($resultadoId)
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string' // Es text en la migración, por lo que no requiere límite estricto de caracteres
            ],
            'horas' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0' // Asegura que no se ingresen horas negativas
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'competencias_id.required' => 'La competencia asociada es obligatoria.',
            'competencias_id.integer'  => 'El identificador de la competencia debe ser un número entero.',
            'competencias_id.exists'   => 'La competencia seleccionada no existe en el sistema.',

            'codigo.required' => 'El código del resultado de aprendizaje es obligatorio.',
            'codigo.string'   => 'El código debe ser texto.',
            'codigo.max'      => 'El código no puede exceder los 20 caracteres.',
            'codigo.unique'   => 'Este código de resultado de aprendizaje ya está registrado.',

            'nombre.required' => 'El nombre del resultado de aprendizaje es obligatorio.',
            'nombre.string'   => 'El nombre debe ser texto.',

            'horas.required' => 'El número de horas es obligatorio.',
            'horas.integer'  => 'Las horas deben ser un número entero.',
            'horas.min'      => 'El número de horas no puede ser menor a 0.'
        ];
    }
}