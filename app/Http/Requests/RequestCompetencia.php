<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCompetencia extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $competenciaId = $this->route('competencia') ?? $this->route('id');

        return [
            'programa_formacion_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:programas_formacion,id',
            ],

            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('competencias', 'codigo')->ignore($competenciaId),
            ],

            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255',
            ],

            'horas' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'programa_formacion_id.required' => 'El programa de formación es obligatorio.',
            'programa_formacion_id.integer' => 'El identificador del programa de formación debe ser un número entero.',
            'programa_formacion_id.exists' => 'El programa de formación seleccionado no existe.',

            'codigo.required' => 'El código de la competencia es obligatorio.',
            'codigo.string' => 'El código de la competencia debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 20 caracteres.',
            'codigo.unique' => 'Este código de competencia ya está registrado.',

            'nombre.required' => 'El nombre de la competencia es obligatorio.',
            'nombre.string' => 'El nombre de la competencia debe ser texto.',
            'nombre.max' => 'El nombre de la competencia no puede exceder los 255 caracteres.',

            'horas.required' => 'La cantidad de horas es obligatoria.',
            'horas.integer' => 'La cantidad de horas debe ser un número entero.',
            'horas.min' => 'La cantidad de horas no puede ser negativa.',
        ];
    }
}