<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VigenciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $vigenciaId = $this->route('vigencia') ?? $this->route('id');

        return [
            'anio' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1900',
                'max:9999',
                Rule::unique('vigencias', 'anio')->ignore($vigenciaId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'anio.required' => 'El año es obligatorio.',
            'anio.integer' => 'El año debe ser un número entero.',
            'anio.min' => 'El año debe ser igual o superior a 1900.',
            'anio.max' => 'El año no puede ser superior a 9999.',
            'anio.unique' => 'Este año ya está registrado.',
        ];
    }
}