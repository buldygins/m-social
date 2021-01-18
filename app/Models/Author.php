<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use CrudTrait;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
