<?php

namespace App\Http\Requests;




use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id');

        return [
            'rol_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id'
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:150'
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:150',
                Rule::unique('usuarios', 'correo')->ignore($usuarioId, 'id')
            ],
            'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8'
            ],
            'activo' => [
                $isUpdate ? 'sometimes' : 'required',
                'boolean'
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'rol_id.required' => 'El rol es obligatorio.',
            'rol_id.integer' => 'El rol debe ser un número entero.',
            'rol_id.exists' => 'El rol seleccionado no existe en el sistema.',

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 150 caracteres.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede exceder los 150 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'activo.required' => 'El estado activo es obligatorio.',
            'activo.boolean' => 'El campo activo debe ser verdadero o falso.'
        ];
    }
}
