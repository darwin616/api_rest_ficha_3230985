<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EspecialidadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        
        // Captura el ID dependiendo de cómo nombres tu parámetro en la ruta (ej. especialidad o id)
        $especialidadId = $this->route('especialidad') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:120',
                Rule::unique('especialidades', 'nombre')->ignore($especialidadId)
            ],
            'descripcion' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la especialidad es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.max'      => 'El nombre no puede exceder los 120 caracteres.',
            'nombre.unique'   => 'Ya existe una especialidad registrada con este nombre.',

            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'    => 'La descripción no puede exceder los 255 caracteres.'
        ];
    }
}