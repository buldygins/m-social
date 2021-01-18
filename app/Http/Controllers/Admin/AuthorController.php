<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Illuminate\Http\Request;

class AuthorController extends CrudController
{
    use ListOperation, ShowOperation, CreateOperation, UpdateOperation, DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Author');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/authors');
        $this->crud->setEntityNameStrings('автора', 'авторы');
    }

    public function setupListOperation(){
        $this->crud->setColumns([
            [
                'label' => 'Имя',
                'name' => 'name',
            ],
        ]);
    }

    public function setupCreateOperation(){

        //TODO:request
        //$this->crud->setValidation(TagCrudRequest::class);

        $this->crud->addFields([
            [
                'label' => 'Имя',
                'name' => 'name',
            ],
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
