<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FichaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $fichaId = $this->route('ficha') ?? $this->route('id'); // ficha/id

        return [
            'centro_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:centros,id'
            ],
            'programa_formacion_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:programas_formacion,id'
            ],
            'jornada_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:jornadas,id'
            ],
            'numero' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('fichas', 'numero')->ignore($fichaId, 'id')
            ],
            'fecha_inicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],
            'fecha_fin' => [
                $isUpdate ? 'sometimes' : 'required',
                'date',
                'after_or_equal:fecha_inicio'
            ],
            'cupo' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            // Centro
            'centro_id.required' => 'El centro de formación es obligatorio.',
            'centro_id.integer' => 'El centro debe ser un identificador válido.',
            'centro_id.exists' => 'El centro seleccionado no existe en la base de datos.',

            // Programa de formación
            'programa_formacion_id.required' => 'El programa de formación es obligatorio.',
            'programa_formacion_id.integer' => 'El programa de formación debe ser un identificador válido.',
            'programa_formacion_id.exists' => 'El programa de formación seleccionado no existe.',

            // Jornada
            'jornada_id.required' => 'La jornada es obligatoria.',
            'jornada_id.integer' => 'La jornada debe ser un identificador válido.',
            'jornada_id.exists' => 'La jornada seleccionada no existe.',

            // Número
            'numero.required' => 'El número de ficha es obligatorio.',
            'numero.string' => 'El número de ficha debe ser texto.',
            'numero.max' => 'El número de ficha no puede exceder los 20 caracteres.',
            'numero.unique' => 'Este número de ficha ya se encuentra registrado.',

            // Fechas
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',

            // Cupo
            'cupo.required' => 'El cupo es obligatorio.',
            'cupo.integer' => 'El cupo debe ser un número entero.',
            'cupo.min' => 'El cupo debe ser de al menos 1 persona.',

            // Estado
            'estado.required' => 'El estado de la ficha es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 30 caracteres.'
        ];
    }
}