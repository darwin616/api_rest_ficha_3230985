<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTrimestre extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'vigencia_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:vigencias,id'
            ],

            'numero' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
                'max:255'
            ],

            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40'
            ],

            'fecha_inicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],

            'fecha_fin' => [
                $isUpdate ? 'sometimes' : 'required',
                'date',
                'after_or_equal:fecha_inicio'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'vigencia_id.required' => 'La vigencia es obligatoria.',
            'vigencia_id.integer' => 'La vigencia debe ser un número entero.',
            'vigencia_id.exists' => 'La vigencia seleccionada no existe.',

            'numero.required' => 'El número del trimestre es obligatorio.',
            'numero.integer' => 'El número del trimestre debe ser un número entero.',
            'numero.min' => 'El número del trimestre no puede ser menor que 0.',
            'numero.max' => 'El número del trimestre no puede ser mayor que 255.',

            'nombre.required' => 'El nombre del trimestre es obligatorio.',
            'nombre.string' => 'El nombre del trimestre debe ser texto.',
            'nombre.max' => 'El nombre del trimestre no puede exceder los 40 caracteres.',

            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',

            'fecha_fin.required' => 'La fecha de finalización es obligatoria.',
            'fecha_fin.date' => 'La fecha de finalización debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.'
        ];
    }
}
