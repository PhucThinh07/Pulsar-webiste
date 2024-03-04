<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\Categories;
use App\Core\Request;
use App\Core\ValidateInput;
use App\Models\Products;

class CategoryController extends BaseController
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
    public function getCategory()
    {
        $cat = new Categories();
        $catList = $cat->viewCategories(['id', 'cat_name'], [], 0);
        $data = $catList;
        $this->render('admin/adminCategory', $data);
    }
    public function addCategory()
    {
        $data = [];
        $this->render('admin/adminAddCategory', $data);
    }
    public function postCategory()
    {
        $cat = new Categories();
        $cat_name = $_POST['cat_name'];

        if (!$this->_validate->isEmpty($cat_name)) {
            $addCat = $cat->addCategory($cat_name);
            if (isset($addCat)) {
                header("Location: /admin/category");
            } else {
                header("Location: /admin/add-category");
            }
        } else {
            $message = '<h4 class="text-danger">Vui lòng nhập tên danh mục !</h4>';
        };
        $data = [
            'cat_name' => $cat_name,
            'message' => $message,
        ];
        
        $this->render('admin/adminAddCategory', $data);
    }
    public function deleteCat($id)
    {
        $id = $this->_request->getParam('id');
        $this->cat->deleteCategories($id);
        header('location: /admin/category');
    }
    public function updateCat($id)
    {
        $id = $this->_request->getParam('id');
        $data = $this->cat->selectCatById(['*'], ['id' => $id], 1);
        $this->render('admin/adminUpdateCategory', $data);
    }
    public function postUpdateCat()
    {
        $id = (int)$_POST['id'] ?? '';
        $cat_name = $_POST['catName'] ?? '';
        $cat = new Categories();

        if (!$this->_validate->isEmpty($cat_name)) {
            $catUpdate = $cat->updateCategory($id, $cat_name);
            if (empty($updateCategory)) {
                header("Location: /admin/updatecat?id=" . $id);
            } else {
                header("Location: /admin/category");
            }
        } else {
            $message = '<h4 class="text-danger">Vui lòng nhập đầy đủ thông tin !</h4>';
        };
        $data = [
            'cat_name' => $cat_name,
            'message' => $message,
        ];
        $this->render('admin/adminUpdateCategory', $data);
    }
}
