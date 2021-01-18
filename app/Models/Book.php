<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use CrudTrait;

    public $timestamps = false;
    protected $fillable = ['name','price'];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function set_price($price){
        return $this->price = $price * 100;
    }

    public function get_price(){
        return $this->price / 100;
    }
}
