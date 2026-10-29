<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestModalidad extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $modalidadId = $this->route('modalidad') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:60',
                Rule::unique('modalidades', 'nombre')->ignore($modalidadId, 'id')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la modalidad es obligatorio.',
            'nombre.string' => 'El nombre de la modalidad debe ser texto.',
            'nombre.max' => 'El nombre de la modalidad no puede exceder los 60 caracteres.',
            'nombre.unique' => 'Esta modalidad ya se encuentra registrada.'
        ];
    }
}
