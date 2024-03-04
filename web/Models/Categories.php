<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\DeleteException;

/**
 * Summary of Posts
 */
class Categories extends BaseModel
{

    // ghi đè method và cả (thuộc tính) của class cha
    protected $table = "category";

    public function addCategory($cat_name)
    {
        $data = [
            'cat_name' => $cat_name,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return $this->createData($this->table, $data);
    }

    public function updateCategory($id, $cat_name)
    {
        $data = [
            'cat_name' => $cat_name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $conditions = [
            'id' => $id,
        ];

        return $this->updateData($this->table, $data, $conditions);
    }

    /**
     * Summary of deletePost
     * @param int $id
     * @throws DeleteException
     * @return void
     */
    // public function deleteCategories($id)
    // {
    //     try {
    //         if (!is_integer($id)) {
    //             throw new DeleteException();
    //         }

    //         $conditions = [
    //             'id' => $id,
    //         ];

    //         return $this->deleteData($this->table, $conditions);
    //     } catch (DeleteException $e) {
    //         // xử lý 1 cái gì đó mượt mà hơn
    //         echo $e->getCustomMessage();
    //     }
    // }

    public function deleteCategories($id){
        $conditions = [
            'id' => $id,
        ];
        return $this->deleteData($this->table,$conditions);
    }

    public function viewCategories( $fields, $conditions, $limit)
    {
        return $this->readData($this->table, $fields, $conditions, $limit);
    }

    public function selectCatById($fields, $condisions, $limit)
    {
        return $this->readData($this->table, $fields, $condisions, $limit);
    }
}