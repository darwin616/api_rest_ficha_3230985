<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TipoVinculacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        // Se ajusta el parámetro de la ruta según el recurso (ej. tipo_vinculacion o id)
        $tipoVinculacionId = $this->route('tipo_vinculacion') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40', // Ajustado al tamaño de la migración ($table->string("nombre", 40))
                Rule::unique('tipos_vinculacion', 'nombre')->ignore($tipoVinculacionId, 'id')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del tipo de vinculación es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 40 caracteres.',
            'nombre.unique' => 'Este tipo de vinculación ya está registrado.'
        ];
    }
}