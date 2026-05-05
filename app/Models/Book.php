<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['BO_TITULO','id','id'
    ,'id','Publisher_year'];

    public function Author(){
        return $this -> belongsTo(Author::class);
    }
    public function Category(){
        return $this -> belongsTo(Category::class);
    }
    public function Publisher(){
        return $this -> belongsTo(Publisher::class);
    }
    public function users(){
        return $this->belongsToMany(User::class, 'borrowings')
        ->withPivot('borrowed_at', 'returned_at')
        ->withTimestamps();
    }
}