<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','Author_id','Category_id'
    ,'Publisher_id','Publisher_year'];

    public function Author(){
        return $this -> belongsTo(Author::class);
    }
    public function Category(){
        return $this -> belongsTo(Category::class);
    }
    public function Publisher(){
        return $this -> belongsTo(Publisher::class);
    }
}
