<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
     use HasFactory;

     protected $table = 'authors';

     protected $fillable = ['AU_NOME','AU_ANIVERSARIO','AU_EMAIL'];

     public function Books(){
        return $this ->hasMany(Book::class);
     }
}
