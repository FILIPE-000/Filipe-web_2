<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name','adress'];

    public function Books(){
        return $this -> hasMany(Book::class);
    }
}
