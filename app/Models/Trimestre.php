
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trimestre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "trimestres";

    protected $fillable = [
        'vigencia_id',
        'numero',
        'nombre',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function vigencia(): BelongsTo
    {
        return $this->belongsTo(Vigencia::class, 'vigencia_id', 'id');
    }
}
