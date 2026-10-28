<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestProgramaFormacion extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $programaId = $this->route('programa_formacion') ?? $this->route('id'); 

        return [
            'centro_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:centros,id'
            ],
            'nivel_formacion_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:niveles_formacion,id'
            ],
            'modalidad_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:modalidades,id'
            ],
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('programas_formacion', 'codigo')->ignore($programaId)
            ],
            'version' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10'
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:200'
            ],
            'duracion_horas' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'activo' => [
                $isUpdate ? 'sometimes' : 'required',
                'boolean'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'centro_id.required' => 'El centro es obligatorio.',
            'centro_id.integer' => 'El identificador del centro debe ser numérico.',
            'centro_id.exists' => 'El centro seleccionado no existe en el sistema.',

            'nivel_formacion_id.required' => 'El nivel de formación es obligatorio.',
            'nivel_formacion_id.integer' => 'El identificador del nivel de formación debe ser numérico.',
            'nivel_formacion_id.exists' => 'El nivel de formación seleccionado no existe.',

            'modalidad_id.required' => 'La modalidad es obligatoria.',
            'modalidad_id.integer' => 'El identificador de la modalidad debe ser numérico.',
            'modalidad_id.exists' => 'La modalidad seleccionada no existe.',

            'codigo.required' => 'El código del programa es obligatorio.',
            'codigo.string' => 'El código debe ser una cadena de texto.',
            'codigo.max' => 'El código no puede exceder los 20 caracteres.',
            'codigo.unique' => 'Este código de programa ya se encuentra registrado.',

            'version.required' => 'La versión es obligatoria.',
            'version.string' => 'La versión debe ser texto.',
            'version.max' => 'La versión no puede exceder los 10 caracteres.',

            'nombre.required' => 'El nombre del programa es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 200 caracteres.',

            'duracion_horas.required' => 'La duración en horas es obligatoria.',
            'duracion_horas.integer' => 'La duración en horas debe ser un número entero.',
            'duracion_horas.min' => 'La duración en horas debe ser al menos 1.',

            'activo.required' => 'El estado activo es obligatorio.',
            'activo.boolean' => 'El estado activo debe ser verdadero o falso.'
        ];
    }
}
