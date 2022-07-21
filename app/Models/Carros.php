<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carros extends Model
{
    use SoftDeletes;
    protected $table = 'carros';
    protected $fillable = ['marca', 'modelo', 'ano', 'cor', 'placa', 'usuario_id'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];


    public function rules()
    {
        return  [
            'marca' => 'required|min:3|max:255',
            'modelo' => 'required|min:3|max:255',
            'ano' => 'required|min:4|max:4',
            'cor' => 'required|min:3|max:255',
            'placa' => 'required|min:7|max:7'
        ];
    }

    public array $messages = [
        'marca.required' => 'O campo marca é obrigatório',
        'marca.min' => 'O campo marca deve ter no mínimo 3 caracteres',
        'marca.max' => 'O campo marca deve ter no máximo 255 caracteres',
        'modelo.required' => 'O campo modelo é obrigatório',
        'modelo.min' => 'O campo modelo deve ter no mínimo 3 caracteres',
        'modelo.max' => 'O campo modelo deve ter no máximo 255 caracteres',
        'ano.required' => 'O campo ano é obrigatório',
        'ano.min' => 'O campo ano deve ter no mínimo 4 caracteres',
        'ano.max' => 'O campo ano deve ter no máximo 4 caracteres',
        'cor.required' => 'O campo cor é obrigatório',
        'cor.min' => 'O campo cor deve ter no mínimo 3 caracteres',
        'cor.max' => 'O campo cor deve ter no máximo 255 caracteres',
        'placa.required' => 'O campo placa é obrigatório',
        'placa.min' => 'O campo placa deve ter no mínimo 7 caracteres',
        'placa.max' => 'O campo placa deve ter no máximo 7 caracteres',
        'usuario_id.required' => 'O campo usuário é obrigatório',
        'usuario_id.min' => 'O campo usuário deve ter no mínimo 1 caracteres',
        'usuario_id.max' => 'O campo usuário deve ter no máximo 255 caracteres',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}
