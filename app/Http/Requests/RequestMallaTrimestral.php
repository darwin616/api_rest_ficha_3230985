<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MallaTrimestralRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'programa_formacion_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:programas_formacion,id'
            ],
            'trimestre_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:trimestres,id'
            ],
            'resultado_aprendizaje_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:resultados_aprendizaje,id'
            ],
            'horas_programadas' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'orden' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'programa_formacion_id.required' => 'El programa de formación es obligatorio.',
            'programa_formacion_id.integer' => 'El programa de formación debe ser un número entero.',
            'programa_formacion_id.exists' => 'El programa de formación seleccionado no existe.',

            'trimestre_id.required' => 'El trimestre es obligatorio.',
            'trimestre_id.integer' => 'El trimestre debe ser un número entero.',
            'trimestre_id.exists' => 'El trimestre seleccionado no existe.',

            'resultado_aprendizaje_id.required' => 'El resultado de aprendizaje es obligatorio.',
            'resultado_aprendizaje_id.integer' => 'El resultado de aprendizaje debe ser un número entero.',
            'resultado_aprendizaje_id.exists' => 'El resultado de aprendizaje seleccionado no existe.',

            'horas_programadas.required' => 'Las horas programadas son obligatorias.',
            'horas_programadas.integer' => 'Las horas programadas deben ser un número entero.',
            'horas_programadas.min' => 'Las horas programadas deben ser como mínimo 1.',

            'orden.required' => 'El orden es obligatorio.',
            'orden.string' => 'El orden debe ser texto.',
            'orden.max' => 'El orden no puede exceder los 20 caracteres.'
        ];
    }
}
