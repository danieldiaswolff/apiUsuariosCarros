<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class Usuarios extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $fillable = ['nome', 'email', 'senha'];
    protected $hidden = ['senha', 'deleted_at', 'created_at', 'updated_at'];


    public function rules(Request $request)
    {
        return  [
            'nome' => 'required|min:3|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $request->id,
            'senha' => 'required|min:6|max:255',
        ];
    }


    public array $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 255 caracteres',
        'email.required' => 'O campo email é obrigatório',
        'email.email' => 'O campo email deve ser um email válido',
        'email.unique' => 'O email informado já está cadastrado',
        'senha.required' => 'O campo senha é obrigatório',
        'senha.min' => 'O campo senha deve ter no mínimo 6 caracteres',
        'senha.max' => 'O campo senha deve ter no máximo 255 caracteres',
    ];

    public function carros()
    {
        return $this->hasMany(Carros::class, 'usuario_id');
    }
}
