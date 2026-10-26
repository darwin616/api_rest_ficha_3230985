<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CentroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $centroId = $this->route('centro') ?? $this->route('id'); // centro/id

        return [
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('centros', 'codigo')->ignore($centroId, 'id')
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:150'
            ],
            'regional' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:120'
            ],
            'direccion' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:200'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'El código del centro es obligatorio.',
            'codigo.string' => 'El código debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 20 caracteres.',
            'codigo.unique' => 'Este código de centro ya está registrado.',

            'nombre.required' => 'El nombre del centro es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 150 caracteres.',

            'regional.required' => 'La regional es obligatoria.',
            'regional.string' => 'La regional debe ser texto.',
            'regional.max' => 'La regional no puede exceder los 120 caracteres.',

            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser texto.',
            'direccion.max' => 'La dirección no puede exceder los 200 caracteres.'
        ];
    }
}
