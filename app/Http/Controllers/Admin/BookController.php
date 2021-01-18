<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Illuminate\Http\Request;

class BookController extends CrudController
{
    use ListOperation, ShowOperation, CreateOperation, UpdateOperation, DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Book');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/books');
        $this->crud->setEntityNameStrings('книгу', 'книги');

        $books = Book::all();
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'label' => 'Имя',
                'name' => 'name',
            ],
            [
                'label' => 'Цена',
                'name' => 'price',
            ],
            [
                'label' => 'Автор',
                'name' => 'author',
                'type' => 'closure',
                'function' => function ($book) {
                    $res = '';
                    $authors = $book->authors;
                    foreach ($authors as $key => $author) {
                        $this->crud->getRoute();
                        $res .= '<a href="/'.config('backpack.base.route_prefix').'/authors/'.$author->id.'/show/">'.$author->name . '</a>, ';
                    }
                    $res = substr($res, 0, -2);
                    return $res;
                }
            ]
        ]);
    }

    public function setupCreateOperation()
    {

        //TODO:request
        //$this->crud->setValidation(TagCrudRequest::class);

        $this->crud->addFields([
            [
                'label' => 'Имя',
                'name' => 'name',
            ],
            [
                'label' => 'Цена',
                'name' => 'price',
            ],
            [
                'label' => 'Автор',
                'type' => 'relationship',
                'entity' => 'authors',
                'name' => 'authors',

            ],
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
