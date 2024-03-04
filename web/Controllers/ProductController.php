<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Products;
use App\Models\Categories;
use App\Core\Request;
use App\Core\ValidateInput;
use App\Core\Upload;

class ProductController extends BaseController
{
    private $_product;
    private $cat;
    private $_request;
    private $_validate;
    public function __construct()
    {
        $this->cat = new Categories();
        $this->_product = new Products();
        $this->_request = new Request();
        $this->_validate = new ValidateInput();
    }
    public function getMouse()
    {
        $pd = new Products();
        $cat = new Categories();
        $catList = $cat->viewCategories(['id', 'cat_name'], [], 0);
        $prod = new Products();
        $prodList = $prod->showAllProd(['id', 'product_name', 'product_price', 'product_image', 'product_description', 'cat_id'], [], 0);
        $data = [
            "categories" => $catList,
            "products" => $prodList
        ];
        $this->render('mouse', $data);
    }


    public function productClient()
    {
        $prodList = $this->_product->showAllProd(['id', 'product_name', 'product_price', 'product_image', 'product_description', 'cat_id'], [], 0);
        $data = $prodList;

        $this->render('mouse', $data);
    }
    public function getDetail()
    {
        $id = $this->_request->getParam('id');
        $catList = $this->cat->viewCategories(['id', 'cat_name'], [], 1);

        $data = [
            "cats" => $catList,
            "list" => $this->_product->showAllProd(['*'], ['id' => $id], 1)
        ];

        $this->render('detail', $data);
    }

    public function getProduct()
    {
        $prod = new Products();
        $prodList = $prod->showAllProd(['id', 'product_name', 'product_price', 'product_image', 'product_description', 'cat_id'], [], 0);
        $data = $prodList;

        $this->render('admin/adminProduct', $data);
    }
    public function addProduct()
    {
        $cat = new Categories();
        $catList = $cat->viewCategories(['id', 'cat_name'], [], 0);
        $data = [
            "cats" => $catList,
        ];

        $this->render('admin/adminAddProduct', $data);
    }
    public function postProduct()
    {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $description = $_POST['product_description'];
        $catId = (int)$_POST['cat_id'];
        $catList = $this->cat->viewCategories(['id', 'cat_name'], [], 0);
        $file_name = $_FILES['image']['name'];
        $file = $_FILES['image'];

        if ($this->_validate->isEmpty([$name, $price, $file_name, $description])) {
            $message = $this->_validate->getMessage('<h4 class="text-danger">Vui lòng nhập thông tin sản phẩm !</h4>');
        } else {
            $fileUpload = new Upload($file);
            if ($fileUpload->uploadFile()) {
                $addProd = $this->_product->addProd($name, $price, $fileUpload->getTargetFile(), $description, $catId);
                if (!empty($addProd)) {
                    header("Location: /admin");
                } else {
                    header("Location: /admin/add-product");
                }
            } else {
                $message = $this->_validate->getMessage('<h4 class="text-danger">Vui lòng chọn hình ảnh sản phẩm !</h4>');
            }
        }
        $data = [
            'cats' => $catList,
            'message' => $message
        ];
        
        $this->render('admin/adminAddProduct', $data);
    }

    public function updateProduct()
    {
        $cat = new Categories();
        $catList = $cat->viewCategories(['id', 'cat_name'], [], 0);
        $id = $this->_request->getParam('id');
        $data = [
            "cats" => $catList,
            "list" => $this->_product->showAllProd(['*'], ['id' => $id], 1)
        ];
        
        $this->render('admin/adminUpdateProduct', $data);
    }
    public function postUpdateProduct()
    {

        $prod = new Products();
        $id = $_POST['id'];
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $description = $_POST['product_description'];
        $catId = (int)$_POST['cat_id'] ?? 0;
        $file =  $_FILES['image'];
        $file_name = $_FILES['image']['name'];

        if ($this->_validate->isEmpty([$name, $price, $description])) {
            $message = $this->_validate->getMessage('Không được bỏ trống');
        } else {
            $fileUpload = new Upload($file);
            if ($fileUpload->uploadFile()) {
                $values = [
                    "product_name" => $name,
                    "product_price" => $price,
                    "product_image" => $fileUpload->getTargetFile(),
                    "product_description" => $description,
                    "cat_id" => $catId,
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->_product->updateProduct($id, $values);
            } else {
                $values = [
                    "product_name" => $name,
                    "product_price" => $price,
                    "product_description" => $description,
                    "cat_id" => $catId,
                    "updated_at" => date('Y-m-d H:i:s')
                ];
                $this->_product->updateProduct($id, $values);
            }
            header('Location: /admin');
        }
    }
    public function deleteProduct()
    {
        $id = $this->_request->getParam('id');
        $this->_product->deleteProduct($id);
        header('Location: /admin');
    }
}
