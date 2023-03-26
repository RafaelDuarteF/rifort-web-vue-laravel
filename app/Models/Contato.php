<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'assunto', 'mensagem'];

    public function rules() {
        return [
            'email' => 'email|required',
            'assunto' => 'required|min:5|max:200',
            'mensagem' => 'required|min:20|max:2000',
        ];
    }
    public function feedback() {
        return [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'min' => 'O campo :attribute precisa ter ao menos :min caracteres!',
            'max' => 'O campo :attribute precisa ter até :max caracteres!',
            'email' => 'O e-mail informado é inválido!'
        ];
    }
}
