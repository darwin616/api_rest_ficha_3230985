
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventoFormacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        $eventoId = $this->route('evento') ?? $this->route('id');

        return [
            'programacion_trimestral_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:programaciones_trimestrales,id'
            ],

            'resultado_aprendizaje_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:resultados_aprendizaje,id'
            ],

            'instructor_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:instructores,id'
            ],

            'ambiente_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:ambientes,id'
            ],

            'dia_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:dias,id'
            ],

            'hora_inicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i'
            ],

            'hora_fin' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i',
                'after:hora_inicio'
            ],

            'fecha_inicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:Y-m-d'
            ],

            'fecha_fin' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:Y-m-d',
                'after_or_equal:fecha_inicio'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'programacion_trimestral_id.required' =>
                'La programación trimestral es obligatoria.',
            'programacion_trimestral_id.integer' =>
                'La programación trimestral debe ser un número entero.',
            'programacion_trimestral_id.exists' =>
                'La programación trimestral seleccionada no existe.',

            'resultado_aprendizaje_id.required' =>
                'El resultado de aprendizaje es obligatorio.',
            'resultado_aprendizaje_id.integer' =>
                'El resultado de aprendizaje debe ser un número entero.',
            'resultado_aprendizaje_id.exists' =>
                'El resultado de aprendizaje seleccionado no existe.',

            'instructor_id.required' =>
                'El instructor es obligatorio.',
            'instructor_id.integer' =>
                'El instructor debe ser un número entero.',
            'instructor_id.exists' =>
                'El instructor seleccionado no existe.',

            'ambiente_id.required' =>
                'El ambiente de formación es obligatorio.',
            'ambiente_id.integer' =>
                'El ambiente debe ser un número entero.',
            'ambiente_id.exists' =>
                'El ambiente seleccionado no existe.',

            'dia_id.required' =>
                'El día es obligatorio.',
            'dia_id.integer' =>
                'El día debe ser un número entero.',
            'dia_id.exists' =>
                'El día seleccionado no existe.',

            'hora_inicio.required' =>
                'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' =>
                'La hora de inicio debe tener el formato HH:MM.',

            'hora_fin.required' =>
                'La hora de finalización es obligatoria.',
            'hora_fin.date_format' =>
                'La hora de finalización debe tener el formato HH:MM.',
            'hora_fin.after' =>
                'La hora de finalización debe ser posterior a la hora de inicio.',

            'fecha_inicio.required' =>
                'La fecha de inicio es obligatoria.',
            'fecha_inicio.date_format' =>
                'La fecha de inicio debe tener el formato AAAA-MM-DD.',

            'fecha_fin.required' =>
                'La fecha de finalización es obligatoria.',
            'fecha_fin.date_format' =>
                'La fecha de finalización debe tener el formato AAAA-MM-DD.',
            'fecha_fin.after_or_equal' =>
                'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
        ];
    }
}