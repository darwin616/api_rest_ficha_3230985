<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RequestInstructor extends FormRequest
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
        $instructorId = $this->route('instructor') ?? $this->route('id'); 

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:80'
            ],
            'apellidos' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:80'
            ],
            'telefono' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('instructores', 'telefono')->ignore($instructorId)
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:150',
                Rule::unique('instructores', 'correo')->ignore($instructorId)
            ],
            'usuario_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id'
            ],
            'centro_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:centros,id'
            ],
            'tipo_vinculacion_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:tipos_vinculacion,id'
            ],
            'especialidades_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:especialidades,id'
            ],
            'competencia_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:competencias,id'
            ],
            'activo' => [
                $isUpdate ? 'sometimes' : 'required',
                'boolean'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 80 caracteres.',

            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no pueden exceder los 80 caracteres.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede exceder los 150 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',

            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.integer' => 'El identificador de usuario debe ser numérico.',
            'usuario_id.exists' => 'El usuario seleccionado no existe en el sistema.',

            'centro_id.required' => 'El centro es obligatorio.',
            'centro_id.integer' => 'El identificador del centro debe ser numérico.',
            'centro_id.exists' => 'El centro seleccionado no existe en el sistema.',

            'tipo_vinculacion_id.required' => 'El tipo de vinculación es obligatorio.',
            'tipo_vinculacion_id.integer' => 'El identificador del tipo de vinculación debe ser numérico.',
            'tipo_vinculacion_id.exists' => 'El tipo de vinculación seleccionado no existe.',

            'especialidades_id.required' => 'La especialidad es obligatoria.',
            'especialidades_id.integer' => 'El identificador de la especialidad debe ser numérico.',
            'especialidades_id.exists' => 'La especialidad seleccionada no existe.',

            'competencia_id.required' => 'La competencia es obligatoria.',
            'competencia_id.integer' => 'El identificador de la competencia debe ser numérico.',
            'competencia_id.exists' => 'La competencia seleccionada no existe.',

            'activo.required' => 'El estado activo es obligatorio.',
            'activo.boolean' => 'El estado activo debe ser verdadero o falso.'
        ];
    }
}

