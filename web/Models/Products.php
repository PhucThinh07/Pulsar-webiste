<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\DeleteException;
/**
 * Summary of Posts
 */
class Products extends BaseModel
{

    protected $table = "products";

    public function addProduct($title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return $this->createData($this->table, $data);
    }

    public function addProd ($name,$price,$image,$description,$catId){
        $data = [
            "product_name" => $name,
            "product_price" => $price,
            "product_image" => $image,
            "product_description" => $description,
            "cat_id" => $catId,
            "created_at" => date('Y-m-d H:i:s')
        ];

        return $this->createData($this->table, $data);
    }

    public function deleteProd($id)
    {
        try {
            if (!is_integer($id)) {
                throw new DeleteException();
            }

            $conditions = [
                'id' => $id,
            ];

            return $this->deleteData($this->table, $conditions);
        } catch (DeleteException $e) {
            // xử lý 1 cái gì đó mượt mà hơn
            echo $e->getCustomMessage();
        }
    }


    public function viewProduct($id, $fields, $conditions, $limit)
    {
        return $this->readData($this->table, $fields, $conditions, $limit);
    }


    public function showAllProd($fields,$condisions, $limit){
        return $this->readData($this->table,$fields,$condisions, $limit);
    }

    public function selectProdById($id)
    {   
        $fields = [
            "id",
            "product_name",
            "product_price",
            "product_image",
            "product_description",
            "cat_id",
        ];
        $conditions = [
            "id" => $id,
        ];
        
        return $this->readData($this->table, $fields, $conditions, 1);
    }
    public function deleteProduct($id){
        $conditions = [
            'id' => $id,
        ];
        return $this->deleteData($this->table,$conditions);
    }

    public function updateProduct($id,$value){
        $conditions = [
            'id' => $id,
        ];
        return $this->updateData($this->table,$value,$conditions);
    }
}