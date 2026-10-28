
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EspecialidadRequest extends FormRequest
{
  
     */
    public function authorize(): bool
    {
        return true;
    }


     * @return array<string,
     
    public function rules(): array
    {
        $especialidad = $this->route('especialidad');
        $id = is_object($especialidad) ? $especialidad->getKey() : $especialidad;

        return [
            'nombre' => [
                'required',
                'string',
                'max:120',
            ],
            'descripcion' => ['nullable', 'string', 'max:255'],
        ];
    }

     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'descripcion' => 'descripción',
        ];
    }


     * @return array<string, string>
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la especialidad es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los 120 caracteres.',
            'nombre.unique' => 'Ya existe una especialidad con ese nombre.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
        ];
    }
}