<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Products;
use App\Models\Carts;
use App\Models\Categories;
use App\Core\Request;
use App\Core\ValidateInput;
use App\Core\Upload;

class CartController extends BaseController
{
    private $_product;
    private $cat;
    private $_request;
    private $_validate;
    private $_cart;
    private $userId;
    public function __construct()
    {
        $this->cat = new Categories();
        $this->_product = new Products();
        $this->_request = new Request();
        $this->_validate = new ValidateInput();
        $this->_cart = new Carts();
        $this->userId = $_SESSION['user'][0]['id'];
    }
    public function cart()
    {
        $data = $this->_cart->showAllCart(['*'],['userId' => $this->userId],0);
        $this->render('cart', $data);
    }

    public function addCart()
    {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $product = $this->_product->selectProdById($product_id)[0];
        if(isset($product)){
            $this->_cart->addCart($product_id,$product['product_name'],$product['product_price'],$product['product_image'],$this->userId,$quantity);
        }
        $this->cart();
    }
    public function postCart()
    {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $description = $_POST['product_description'];
        $catId = (int)$_POST['cat_id'];

        $file_name = $_FILES['image']['name'];
        $file = $_FILES['image'];

        if ($this->_validate->isEmpty([$name, $price, $file_name, $description])) {
            $message = $this->_validate->getMessage('Không được bỏ trống');
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
                $message = $this->_validate->getMessage('Không được bỏ trống');
            }
        }
    }

    public function deleteCart()
    {
        $id = $this->_request->getParam('id');
        $this->_cart->deleteCart($id);
        header('Location: /cart');
    }
    
}
