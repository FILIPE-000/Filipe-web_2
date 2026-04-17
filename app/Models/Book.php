<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = ['title','author_id','category_id'
    ,'publisher_id','publisher_year'];

    public function author(){
        return $this -> belongsTo(author::class);
    }
    public function category(){
        return $this -> belongsTo(category::class);
    }
    public function publisher(){
        return $this -> belongsTo(publisher::class);
    }
}
