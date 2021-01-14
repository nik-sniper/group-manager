<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupRequest;
use App\Models\Groups\Group;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GroupCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GroupCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Group::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/group');
        CRUD::setEntityNameStrings('группу', 'группы');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Название'
            ],
            [
                'name' => 'provider',
                'label' => 'Платформа',
                'type' => 'select_from_array',
                'options' => Group::LIST_GROUP,
            ],
            [
                'name' => 'provider_id',
                'label' => 'ID в системе поставщика'
            ],
            [
                'name' => 'slug',
                'label' => 'Slug'
            ],
            [
                'name' => 'category',
                'label' => 'Категория'
            ],
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GroupRequest::class);

        //CRUD::setFromDb(); // fields

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Название'
            ],
            [
                'name' => 'provider',
                'label' => 'Платформа',
                'type' => 'select_from_array',
                'options' => Group::LIST_GROUP,
            ],
            [
                'name' => 'provider_id',
                'label' => 'ID в системе поставщика'
            ],
            [
                'name' => 'slug',
                'label' => 'Slug'
            ],
            [
                'name' => 'category',
                'label' => 'Категория'
            ],
            [
                'name' => 'meta',
                'label' => 'Доп. данные',
                'type' => 'table'
            ]
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
