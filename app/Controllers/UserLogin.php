<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Cart;
use App\Models\CommonModel;
use Razorpay\Api\Api;

class UserLogin extends BaseController {

    public $data;
    public $session_id;
    public $cartModel;
    public $session;
    public $common_model;

    public function __construct() {
        $this->session = \Config\Services::session();
        $this->session_id = session_id();
        $this->cartModel = new Cart();
        $this->session = \Config\Services::session();
        $this->session_id = session_id();

        $this->common_model = new CommonModel();
        $this->data["pages"] = $this->common_model->common_get_all_nc("content");

        $this->categories_model = new Categories();
        $this->data["categories"] = $this->categories_model->findAll();

        $this->cartModel = new Cart();
        $cartCount = $this->cartModel->countItems($this->session_id);
        $cart = $this->cartModel->viewCart($this->session_id);
        $subtotal = 0;
        foreach ($cart as $data) {
            $subtotal = $data['product_price'] * $data['qty'];
        }
        $this->data['cart'] = $cart;
        $this->data['subtotal'] = $subtotal;
        $this->data['cartCount'] = $cartCount;
    }

    public function index() {
        return view('home/signin', $this->data);
    }

    public function signinAction() {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        $model = new User();
        $result = $model->where($data)->first();
        if (isset($result["id"])) {
            $this->session = \config\services::session();
            $this->session->set("email", $result["email"]);
            $this->session->set("user_id", $result['id']);
            $this->session->set("password", $result["password"]);
            $this->session->set("username", $result['name']);
            $cart = $this->common_model->common_get_all("cart", array("session_id" => $this->session_id));
            
            foreach($cart as $carts){
                $carts['customer_id'] = $result['id'];
                $this->common_model->common_update("cart", $carts, array("session_id" => $this->session_id));
            }

            $redirectUrl = $this->request->getPost("checkout_redirect") ? 'home/checkout' : 'homedashboard';

            return redirect()->to($redirectUrl);
        } else {
            // Login failed
            $this->session = session();
            $this->session->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('userlogin')->withInput();
        }
    }

    public function ajaxSignin() {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        $model = new User();
        $result = $model->where($data)->first();
        if (isset($result["id"])) {
            $this->session = \config\services::session();
            $this->session->set("email", $result["email"]);
            $this->session->set("user_id", $result['id']);
            $this->session->set("password", $result["password"]);
            $this->session->set("username", $result['name']);

            $redirectUrl = $this->request->getPost("checkout_redirect") ? 'home/checkout' : 'homedashboard';

            echo json_encode(array("status" => "success", "url" => base_url($redirectUrl)));
        } else {

            echo json_encode(array("status" => "fail", "msg" => 'Invalid email or password'));
        }
    }

    public function logout() {
        $this->session = \config\services::session();
        $this->session->destroy();
        return redirect()->to('userlogin');
    }

}
