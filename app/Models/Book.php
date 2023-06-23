<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['position', 'name', 'abbreviation', 'testament_id'];

    /**
     * Pega o testamento o livro pertence (relacionamento)
     */

     public function testament(){
        return $this->belongsTo(Testament::class);
     }

}
