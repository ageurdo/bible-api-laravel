<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testament extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * PEgar todos os livros vinculados
     */

    // Apenas dizendo que o testamento possui muitos livros, 
    // o Eloquente (orm) procura na tablea de livros a chave 
    // estrangeira que segue o padrão definido em convenção: 
    // testament_id para criar o relacionamento

     public function books(){
        return $this->hasMany(Book::class);
     }
}
