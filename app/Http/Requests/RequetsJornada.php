
<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
 
class RequestJornada extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $jornadaId = $this->route('jornada') ?? $this->route('id'); 
 
        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40', // Ajustado a 40 según tu migración
                Rule::unique('jornadas', 'nombre')->ignore($jornadaId, 'id')
            ],
            'hora_inicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i' // O 'H:i:s' si manejas segundos
            ],
            'hora_fin' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i',
                'after:hora_inicio' // Asegura que la hora de fin sea posterior a la de inicio
            ]
        ];
    }
 
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 40 caracteres.',
            'nombre.unique' => 'Este nombre de jornada ya está registrado.',
 
            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' => 'El formato de la hora de inicio no es válido (ej. HH:MM).',
 
            'hora_fin.required' => 'La hora de fin es obligatoria.',
            'hora_fin.date_format' => 'El formato de la hora de fin no es válido (ej. HH:MM).',
            'hora_fin.after' => 'La hora de fin debe ser posterior a la hora de inicio.'
        ];
    }
}