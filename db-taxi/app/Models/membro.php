<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membro extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'numeroTel',
        'placa_carro',
        'idade',
        'cpf',
        'admin_posto',
        'posto_id_posto',
    ];
    public function posto()
    {
        return $this->belongsTo(posto::class, 'id_posto');
    }
}
