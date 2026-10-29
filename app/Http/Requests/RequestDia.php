<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestDia extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $diaId = $this->route('dia') ?? $this->route('id'); // Obtiene el ID del parámetro de la ruta

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('dias', 'nombre')->ignore($diaId)
            ],
            'orden' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'between:1,255', // unsignedTinyInteger soporta valores de 0/1 a 255
                Rule::unique('dias', 'orden')->ignore($diaId)
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del día es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.max'      => 'El nombre no puede exceder los 20 caracteres.',
            'nombre.unique'   => 'Este día ya se encuentra registrado.',

            'orden.required' => 'El orden del día es obligatorio.',
            'orden.integer'  => 'El orden debe ser un número entero.',
            'orden.between'  => 'El orden debe ser un valor numérico entre 1 y 255.',
            'orden.unique'   => 'Este número de orden ya está asignado a otro día.',
        ];
    }
}