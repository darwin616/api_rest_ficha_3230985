<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $aprendizId = $this->route('aprendiz') ?? $this->route('id');

        return [
            'usuario_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id',
                Rule::unique('aprendices', 'usuario_id')->ignore($aprendizId, 'id')
            ],
            'ficha_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:fichas,id'
            ],
            'nombres' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:80'
            ],
            'apellidos' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:80'
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:150',
                Rule::unique('aprendices', 'correo')->ignore($aprendizId, 'id')
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'in:activo,retirado,aplazado'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.integer' => 'El usuario debe ser un número entero.',
            'usuario_id.exists' => 'El usuario seleccionado no existe en el sistema.',
            'usuario_id.unique' => 'Este usuario ya se encuentra registrado como aprendiz.',

            'ficha_id.required' => 'La ficha es obligatoria.',
            'ficha_id.integer' => 'La ficha debe ser un número entero.',
            'ficha_id.exists' => 'La ficha seleccionada no existe en el sistema.',

            'nombres.required' => 'Los nombres son obligatorios.',
            'nombres.string' => 'Los nombres deben ser texto.',
            'nombres.max' => 'Los nombres no pueden exceder los 80 caracteres.',

            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no pueden exceder los 80 caracteres.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede exceder los 150 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.in' => 'El estado debe ser: activo, retirado o aplazado.'
        ];
    }
}