<?php

namespace App\Http\Controllers\Traits;

/**
 * CRUD
 */
trait Crud
{
    public $model = null;

    /**
     * get all items from table
     * @return array
     */
    public function getItems()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    /**
     * get an item from table
     * @param int $id
     * @return object
     */
    public function getItem( $id )
    {
        return $this->model->find( $id );
    }

    /**
     * insert an item into table
     * @param array $data
     * @return object
     */
    public function createItem( $data )
    {
        return $this->model->create( $data );
    }

    /**
     * update an item in table
     * @param int $id
     * @param array $data
     * @return bool true|false
     */
    public function updateItem( $id, $data )
    {
        return $this->model->where('id', $id)->update( $data );
    }

    /**
     * delete an item from table
     * @param int $id
     * @return bool true|false
     */
    public function deleteItem( $id )
    {
        return $this->model->destroy( $id );
    }
}
