<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmbienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $ambienteId = $this->route('ambiente') ?? $this->route('id'); // ambiente/id

        return [
            'centro_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:centros,id'
            ],
            'especialidad_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:especialidades,id'
            ],
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('ambientes', 'codigo')->ignore($ambienteId, 'id')
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:120'
            ],
            'tipo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'capacidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'activo' => [
                $isUpdate ? 'sometimes' : 'required',
                'boolean'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'centro_id.required' => 'El centro de formación es obligatorio.',
            'centro_id.integer' => 'El identificador del centro debe ser un número entero.',
            'centro_id.exists' => 'El centro seleccionado no existe en el sistema.',

            'especialidad_id.required' => 'La especialidad es obligatoria.',
            'especialidad_id.integer' => 'El identificador de la especialidad debe ser un número entero.',
            'especialidad_id.exists' => 'La especialidad seleccionada no existe en el sistema.',

            'codigo.required' => 'El código del ambiente es obligatorio.',
            'codigo.string' => 'El código debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 20 caracteres.',
            'codigo.unique' => 'Este código de ambiente ya está registrado.',

            'nombre.required' => 'El nombre del ambiente es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 120 caracteres.',

            'tipo.required' => 'El tipo de ambiente es obligatorio.',
            'tipo.string' => 'El tipo debe ser texto.',
            'tipo.max' => 'El tipo no puede exceder los 30 caracteres.',

            'capacidad.required' => 'La capacidad es obligatoria.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser al menos de 1.',

            'activo.required' => 'El estado activo es obligatorio.',
            'activo.boolean' => 'El campo activo debe ser verdadero o falso.'
        ];
    }
}