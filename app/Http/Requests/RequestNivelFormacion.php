<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestNivelFormacion extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $nivelFormacionId = $this->route('nivel_formacion')
            ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:60',
                Rule::unique('niveles_formacion', 'nombre')
                    ->ignore($nivelFormacionId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del nivel de formación es obligatorio.',
            'nombre.string' => 'El nombre del nivel de formación debe ser texto.',
            'nombre.max' => 'El nombre del nivel de formación no puede exceder los 60 caracteres.',
            'nombre.unique' => 'Este nivel de formación ya está registrado.',
        ];
    }
}


