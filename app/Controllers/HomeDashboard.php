<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Orders;

class HomeDashboard extends BaseController {

    public $common_model;
    public $session;
    public $data;
    public $session_id;
    public $cartModel;
    public $categories_model;

    public function __construct() {

        $this->session = \Config\Services::session();
        $this->common_model = new CommonModel();

        $this->data["page_root"] = "homedashboard";
        $this->session_id = session_id();

        $this->common_model = new CommonModel();
        $this->data["pages"] = $this->common_model->common_get_all_nc("content");

        $this->categories_model = new Categories();
        $this->data["categories"] = $this->categories_model->findAll();

        $this->data["user_profile"] = $this->common_model->common_get_one("user", array("id" => $this->session->get("user_id")));

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
        if ($this->session->get("email")) {
            
        } else {
            $redirectUrl = base_url('userlogin');
            header('Location: ' . $redirectUrl);
            exit();
        }
    }

    public function index() {
        return view('home/common_dashboard', $this->data);
    }

    function orders() {
        $table = new Orders();
        $user_id = $this->session->get("user_id");
        $orders = $table->table('orders')
                        ->where('user_id', $user_id)
                        ->orderBy('order_id', 'desc')
                        ->get();
        $this->data["orders"] = $orders->getResultArray();
        return view('home/common_orders', $this->data);
    }

    public function ordersDetails($order_no = '') {
        $this->data["order_details"] = $this->common_model->common_get_one("orders", array("order_no" => $order_no));
        $this->data["customer_info"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));
        $this->data["order_item_details"] = $this->common_model->common_get_all("order_items", array("order_no" => $order_no));
        return view('home/common_order_items', $this->data);
    }

    public function deleteOrder($order_no = '') {
        $this->common_model->common_delete("orders", array("order_no" => $order_no));
        $this->common_model->common_delete("order_items", array("order_no" => $order_no));
        $this->session->setFlashdata("alert_danger", "Record deleted!");
        return redirect()->to("homedashboard/orders");
    }
    
    function userdetails() {
        $this->data["shipping_address"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));
       return view('home/common_user_details', $this->data);
    }

    function usereditprofile() {
        $this->data["checkout_user"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));
        return view('home/common_user_edit_profile', $this->data);
    }

    function wishlist() {
        $this->data["products"] = $this->common_model->common_get_all("wishlist", array("customer_id" => $this->session->get("user_id")));
        return view('home/common_wishlist', $this->data);
    }


    public function updateShippingAddress() {
        $check_shipping_address = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));

        $shippingAddress["first_name"] = $this->request->getPost("first_name");
        $shippingAddress["last_name"] = $this->request->getPost("last_name");
        $shippingAddress["company"] = $this->request->getPost("company");
        $shippingAddress["address"] = $this->request->getPost("address");

        $shippingAddress["district"] = $this->request->getPost("district");
        $shippingAddress["pincode"] = $this->request->getPost("pincode");
        $shippingAddress["state"] = $this->request->getPost("state");


        if ($this->request->getPost("same_data")) {
            $shippingAddress["billing_first_name"] = $this->request->getPost("first_name");
            $shippingAddress["billing_last_name"] = $this->request->getPost("last_name");
            $shippingAddress["billing_address"] = $this->request->getPost("address");

            $shippingAddress["billing_district"] = $this->request->getPost("district");
            $shippingAddress["billing_pincode"] = $this->request->getPost("pincode");
            $shippingAddress["billing_state"] = $this->request->getPost("state");
        } else {
            $shippingAddress["billing_first_name"] = $this->request->getPost("billing_first_name");
            $shippingAddress["billing_last_name"] = $this->request->getPost("billing_last_name");
            $shippingAddress["billing_address"] = $this->request->getPost("billing_address");

            $shippingAddress["billing_district"] = $this->request->getPost("billing_district");
            $shippingAddress["billing_pincode"] = $this->request->getPost("billing_pincode");
            $shippingAddress["billing_state"] = $this->request->getPost("billing_state");
        }
        $shippingAddress["same_data"] = $this->request->getPost("same_data");
        $shippingAddress["phone"] = $this->request->getPost("phone");
        $this->session->setFlashdata("alert_success", "Shipping address is updated");
        if (isset($check_shipping_address["id"])) {
            $this->common_model->common_update("shipping_address", $shippingAddress, array("user_id" => $this->session->get("user_id")));
        } else {
            $shippingAddress["user_id"] = $this->session->get("user_id");
            $this->common_model->common_insert("shipping_address", $shippingAddress);
        }
        return redirect()->to("homedashboard/userdetails");
    }

}
