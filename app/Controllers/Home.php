<?php

namespace App\Controllers;

require('razorpay-php/Razorpay.php');

use App\Models\Categories;
use App\Models\Slider;
use App\Models\HomeSlider;

use App\Models\Products;
use App\Models\Cart;
use App\Models\CommonModel;
use Razorpay\Api\Api;

// use Razorpay\Api\Errors\SignatureVerificationError;


class Home extends BaseController {

    public $data;
    public $common_model;
    public $session;
    public $session_id;
    public $cartModel;
    public $product_model;
    public $categories_model;

    public function __construct() {
        $this->session = \Config\Services::session();
        $this->session_id = session_id();
        $this->cartModel = new Cart();
        $this->categories_model = new Categories();
        $this->data["categories"] = $this->categories_model->findAll();
        $this->db = \Config\Database::connect();

        $this->common_model = new CommonModel();
        $this->data["pages"] = $this->common_model->common_get_all_nc("content");

        $this->data["cart_items"] = $this->common_model->common_get_all("cart", array("session_id" => $this->session_id));
        $this->data['cartCount'] = count($this->data["cart_items"]);

        define("KEYID", "rzp_test_jJrIR0JOz91MAi");
        define("KEYSECRET", "POabE8ENelyYyXRWyGhlrCWa");
    }

    public function index() {
        $model = new Categories();
        $this->data['categories'] = $model->findAll();
        $model = new Slider();
        $this->data['slider'] = $model->findAll();
        $model = new HomeSlider();
        $this->data['home_slider'] = $model->findAll();
        $model = new Products();
        $this->data['products'] = $model->findAll();
        $this->data['latest'] = $model->orderBy('product_id', 'desc')
                ->limit(10)
                ->findAll();
        return view('home/home', $this->data);
    }
    public function aboutus() {
        return view('home/about', $this->data);
    }

    public function contactus() {
        return view('home/contact', $this->data);
    }

    public function page($page_url = '') {
        $this->data["page_detail"] = $this->common_model->common_get_one("content", array("custom_url" => $page_url));

        return view('home/page', $this->data);
    }

    public function cat($cat_name = '') {
        $this->data["cat_name"] = $this->common_model->common_get_one("categories", array("url" => $cat_name));
        return view('home/cat', $this->data);
    }

//*********************** category and filter sectioin  ***********************/

public function category($url = '') {
    $category_detail = $this->common_model->common_get_one("categories", array("url" => $url));

    $parent_detail = $this->common_model->common_get_one("categories", array("id" => $category_detail["parent_id"]));

    $this->data["category_detail"] = $category_detail;
    $this->data["parent_detail"] = $parent_detail;
    $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
    $this->data["filter_categories"] = $this->common_model->common_query_all("SELECT categories.id, categories.name, count(*) as 'total_records' from categories INNER JOIN tbl_product on categories.id = tbl_product.product_category where categories.parent_id = '" . $category_detail["parent_id"] . "' group by categories.name order by categories.name asc");
    $this->data["filter_brands"] = $this->common_model->common_query_all("SELECT brand.name,brand.id, count(*) as 'total_records' from brand INNER JOIN tbl_product on brand.id = tbl_product.product_brand where tbl_product.product_category = '" . $category_detail["id"] . "' group by brand.name order by brand.name asc");
    $this->data["products"] = $this->common_model->common_get_all("tbl_product", array("product_category" => $category_detail["id"]));
    //dd($this->data);
    return view('home/category', $this->data);
}


public function brand($url = '') {
    $brand_detail = $this->common_model->common_get_one("brand", array("url" => $url));
    $this->data["brand_detail"] = $brand_detail;
    $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
    $this->data["filter_categories"] = $this->common_model->common_query_all("SELECT categories.name,categories.id,categories.url, count(*) as 'total_records' from categories INNER JOIN tbl_product on categories.id = tbl_product.product_category group by categories.name order by categories.name asc");
    $this->data["filter_brands"] = $this->common_model->common_query_all("SELECT brand.name,brand.id, count(*) as 'total_records' from brand INNER JOIN tbl_product on brand.id = tbl_product.product_brand group by brand.name order by brand.name asc");
    $this->data["products"] = $this->common_model->common_get_all("tbl_product", array("product_brand" => $brand_detail["id"]));
    return view('home/category', $this->data);
}

public function tag($tag_name = '') {
    $tag_products = array();
    $tag_detail = $this->common_model->common_get_one("tags", array("url" => $tag_name));
    $tag_id = $tag_detail["id"];
    $products = $this->common_model->common_query_all("select * from tbl_product where product_tags != ''");
    foreach ($products as $product) {
        $json_tags = json_decode($product["product_tags"]);
        if (is_array($json_tags)) {
            if (in_array($tag_id, $json_tags)) {
                $tag_products[] = $product;
            }
        }
    }
    $this->data["filter_categories"] = $this->common_model->common_query_all("SELECT categories.name,categories.id,categories.url, count(*) as 'total_records' from categories INNER JOIN tbl_product on categories.id = tbl_product.product_category group by categories.name order by categories.name asc");
    $this->data["show_products"] = $tag_products;
    $this->data["tag_detail"] = $tag_detail;
    $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
   return view('home/show_products', $this->data);
}

public function search() {
    $search = $this->request->getPost("q");
    $results = $this->common_model->common_query_all("select * from tbl_product where product_title like '%" . $search . "%'");
    $this->data["show_products"] = $results;
    $this->data["search"] = 'Search for "' . $search . '"';
    return view('home/show_products', $this->data);
}

public function family_filter() {
    $category_filter = "";
    if (!empty($_POST["category"])) {
        $category_filter = implode("','", $_POST["category"]);
    }
    $filter_brands = $this->common_model->common_query_all("SELECT brand.name,brand.id, count(*) as 'total_records' from brand INNER JOIN tbl_product on brand.id = tbl_product.product_brand where tbl_product.product_category IN('" . $category_filter . "') group by brand.name");

    $brands = array();
    foreach ($filter_brands as $row) {
        $brands[] = $row;
    }

    $response["brands"] = $brands;

    echo json_encode($response);
}

public function product_filter()
{
    try {
        $brand_ids = $this->request->getPost('brand');
        $category_ids = $this->request->getPost('category');
        $min_price = $this->request->getPost('min_price') ?: 0;
        $max_price = $this->request->getPost('max_price') ?: 999999;

        log_message('debug', 'Product Filter Inputs - Brands: ' . json_encode($brand_ids) . 
                    ', Categories: ' . json_encode($category_ids) . 
                    ', Min Price: ' . $min_price . 
                    ', Max Price: ' . $max_price);

        $builder = $this->db->table('tbl_product');
        $builder->select('product_id, product_title, product_url, product_price, product_mrp, product_image, product_category, product_brand');

        if (!empty($brand_ids) && is_array($brand_ids)) {
            $builder->whereIn('product_brand', $brand_ids);
        }
        if (!empty($category_ids) && is_array($category_ids)) {
            $builder->whereIn('product_category', $category_ids);
        }
        if ($min_price >= 0 && $max_price > 0) {
            $builder->where('product_price >=', $min_price);
            $builder->where('product_price <=', $max_price);
        }

        $products = $builder->get()->getResultArray();

        log_message('debug', 'Query: ' . $this->db->getLastQuery());
        log_message('debug', 'Products Found: ' . count($products));

        if (!empty($products)) {
            foreach ($products as $product) {
                $price = $product['product_price'];
                $mrp = $product['product_mrp'] ?? 0;
                $discount_percent = 0;

                if ($mrp > $price) {
                    $discount_percent = round((($mrp - $price) / $mrp) * 100);
                }

                echo '
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-product mb-30">
                        <div class="product-img">
                            <a href="' . base_url('product/' . $product['product_url']) . '">
                                <img src="' . base_url('assets/product/' . $product['product_image']) . '" alt="">
                            </a>';

                if ($discount_percent > 0) {
                    echo '<span class="descount-sticker">-' . $discount_percent . '%</span>';
                }

                echo '<span class="sticker">New</span>
                            <div class="product-action d-flex justify-content-between">
                                <a class="product-btn"  href="' . base_url("home/viewProduct/" . $product['product_url']) . '">Add to Cart</a>
                                <ul class="d-flex">
                                    <li><a href="#quick-view-modal-container" data-bs-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="' . base_url('product/' . $product['product_url']) . '">' . $product['product_title'] . '</a></h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h4 class="price">
                                <span class="new">₹' . number_format($price, 2) . '</span>';

                if ($discount_percent > 0) {
                    echo '<span class="old">₹' . number_format($mrp, 2) . '</span>';
                }

                echo '</h4>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="col-12 text-center"><h4>No products found.</h4></div>';
        }
    } catch (Exception $e) {
        log_message('error', 'Product Filter Error: ' . $e->getMessage());
        echo '<div class="col-12 text-center"><h4>Server error: ' . $e->getMessage() . '</h4></div>';
    }
}

// *********************** show All Products ******************
public function shop()
{
    $this->data["parent_detail"] = ["name" => "All Products"];
    $this->data["filter_categories"] = $this->common_model->common_query_all("SELECT categories.id, categories.name, COUNT(*) as 'total_records' FROM categories INNER JOIN tbl_product ON categories.id = tbl_product.product_category GROUP BY categories.id, categories.name ORDER BY categories.name ASC");
    $this->data["filter_brands"] = $this->common_model->common_query_all("SELECT brand.id, brand.name, COUNT(*) as 'total_records' FROM brand INNER JOIN tbl_product ON brand.id = tbl_product.product_brand GROUP BY brand.id, brand.name ORDER BY brand.name ASC");

    return view('home/shop', $this->data); // Ensure this matches your shop page file name
}


// ************* User section *************//

    public function registration() {
        return view('home/register', $this->data);
    }

    public function registerAction() {
        $result_check = $this->common_model->common_query_all("SELECT * FROM user WHERE email='" . $this->request->getPost("email") . "' OR phone = '" . $this->request->getPost("phone") . "'");
        if (empty($result_check)) {
            $signup = [
                "name" => $this->request->getPost("name"),
                "email" => strtolower((string) $this->request->getPost("email")),
                "password" => $this->request->getPost("password"),
                "phone" => $this->request->getPost("phone"),
                "google_location" => $this->request->getPost("location"),
            ];
            $this->common_model->common_insert("user", $signup);
            if (!$this->session) {
                $this->session = \Config\Services::session();
            }
            $this->session->setFlashdata("success", "Please check your inbox. Verify your account by clicking on the given link.");
            return redirect()->to("userlogin")->withInput();
//print_r($signup);
        } else {
            if (!$this->session) {
                $this->session = \Config\Services::session();
            }
            $this->session->setFlashdata("error", "User already exists.");
            return redirect()->to("home/registration")->withInput();
        }
    }

// **************** checkout section **************** //


    public function viewcheckout() {
        $this->session->set('coupan', "");
        $this->data["checkout_user"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));
        return view('home/checkout', $this->data);
    }

    public function checkout() {
        $this->session_id = session_id();
        $cartItems = $this->cartModel->where('session_id', $this->session_id)->findAll();
//        foreach ($cartItems as $item) {
//            if (isset($item["session_id"])) {
//                $this->cartModel->update($item["id"], ["customer_id" => $this->session->get("user_id")]);
//            }
//        }
        $this->data["checkout_user"] = [];
        if (count($cartItems) <= 0) {
            $session = session();
            $session->setFlashdata('error', 'Your Cart is Empty');
            return redirect()->to('home/carts')->withInput();
        } else {
            $this->session->set('coupan', "");
            $this->data["cart"] = $cartItems;
            if ($this->session->has("user_id")) {
                $this->data["checkout_user"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->session->get("user_id")));
            }
          
            return view('home/checkout', $this->data);
        }

//        if ($this->session->has("user_id")) {
//            $this->session_id = session_id();
//
//            
//        } else {
//            $this->session = \Config\Services::session();
//            $this->session->set("checkout_redirect", true);
//            return redirect()->to('userlogin');
//        }
    }

// ******************** Address and payment section **************//
    public function discountCoupon() {
        $my_coupon = $this->request->getPost("coupon");
        $this->session_id = session_id();
        $result = $this->common_model->common_get_one("discount_codes", array("code" => $my_coupon));
        $response = array();

        if (isset($result["id"])) {
            if (strtotime(date("Y-m-d")) <= $result["valid_to_date"]) {



                $totals = 0;
                $carts = $this->common_model->common_get_all("cart", array("session_id" => $this->session_id));
                if (count($carts) > 0) {
                    foreach ($carts as $cart) {
                        $item_price = (($cart["product_price"] + $cart["tax"]) * $cart["qty"]);
                        $totals = $totals + $item_price;
                    }
                }

                if ($totals < $result["cart_value"]) {
                    $response["query"] = "failed";
                    $response["message"] = "Cart total value should be Rs." . $result["cart_value"];
                    $response["result"] = "";
                } else {
                    $response["query"] = "success";
                    $response["message"] = "Apply";
                    $response["result"] = $result["amount"];
                }
            } else {
                $response["query"] = "failed";
                $response["message"] = "Coupon is expired";
                $response["result"] = "";
            }
        } else {
            $response["query"] = "failed";
            $response["message"] = "Please enter a valid coupon.";
            $response["result"] = "";
        }

        echo json_encode($response);
    }

    public function delete_cart() {
        $id = $this->request->getGet("cartId");
        $this->common_model->common_delete("cart", array("id" => $id));
        //$this->session->setFlashdata("alert_danger", "Cart item is deleted.");
        // if ($this->request->getPost("callback")) {
        //     redirect(str_replace("/index.php/", '', $this->request->getPost("callback")));
        // } else {

        return redirect()->to("home/carts");
    }

    public function shippingAddressAction() {
        $cartItems = $this->cartModel->where('session_id', $this->session_id)->findAll();
        foreach ($cartItems as $item) {
            if (isset($item["session_id"])) {
                $this->cartModel->update($item["id"], ["customer_id" => $this->session->get("user_id")]);
            }
        }
        $this->session->set("coupon", $this->request->getPost("my_coupon"));
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
// $this->session->setFlashdata("alert_success", "Shipping address is updated");
        if (isset($check_shipping_address["id"])) {
            $this->common_model->common_update("shipping_address", $shippingAddress, array("user_id" => $this->session->get("user_id")));
        } else {
            $shippingAddress["user_id"] = $this->session->get("user_id");
            $this->common_model->common_insert("shipping_address", $shippingAddress);
        }

        if ($this->request->getPost("payment_type") == "cashOnDelivery") {
            return redirect()->to("home/cashOnDelivery");
        } else {
            return redirect()->to("home/payment2");
        }
    }


    public function cashOnDelivery() {
        $order_no = "order-" . date("ymdHis");
        $tx_id = date("ymdHis");
    
        $carts = $this->common_model->common_get_all("cart", ["session_id" => $this->session_id]);
        $user_detail = $this->common_model->common_get_one("user", ["id" => $this->session->get("user_id")]);
        $shipping_address = $this->common_model->common_get_one("shipping_address", ["user_id" => $this->session->get("user_id")]);
        
        $totals = 0;
        $subtotal = 0;
        $tax_price = 0;
        $total_tax = 0;
        $total_discount = 0;
    
        $my_coupon = $this->session->get("coupon");
        if (!empty($my_coupon)) {
            $result_coupon = $this->common_model->common_get_one("discount_codes", ["code" => $my_coupon]);
            if (isset($result_coupon["amount"])) {
                $total_discount = $result_coupon["amount"];
            }
        }
    

        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $product_detail = $this->common_model->common_get_one("tbl_product", ["product_id" => $cart["product_id"]]);
    
                $order_items = [
                    "order_no" => $order_no,
                    "order_item_no" => $order_no . "-" . rand(1111, 9999),
                    "product_id" => $cart["product_id"],
                    "name" => $cart["product_title"],
                    "quantity" => $cart["qty"],
                    "price" => $cart["product_price"],
                    "write_up" => $cart["write_up"],
                    "discount" => "",
                    "tax" => $cart["tax"],
                    "selected_size" => $cart["size_name"],  
                    "img" => $cart["product_image"],
                    "user_id" => $cart["customer_id"],
                    "vendor_id" => $product_detail["vendor_id"],
                ];
    // echo "<pre>"; print_r($carts);die;
                $item_price = (($cart["product_price"] + $cart["tax"]) * $cart["qty"]);
                $subtotal += $item_price;
                $tax_price = ($cart["tax"]);
                $total_tax += $tax_price;
                $totals += $item_price;
    
                $order_items["total"] = $item_price;
                $this->common_model->common_insert("order_items", $order_items);
            }
    
            $totals -= $total_discount;
    
            $order = [
                "order_no" => $order_no,
                "user_id" => $this->session->get("user_id"),
                "tx_id" => $tx_id,
                "price" => $totals,
                "sub_total" => $subtotal,
                "total_tax" => $total_tax,
                "total_discount" => $total_discount,
                "updatedAt" => date("Y-m-d H:i:s"),
                "createdAt" => date("Y-m-d H:i:s"),
            ];
    
            $this->common_model->common_insert("orders", $order);
            $this->common_model->common_delete("cart", ["customer_id" => $this->session->get("user_id")]);
        }
    

        $payment_history = array();
        $payment_history["user_id"] = $this->session->get("user_id");
        $payment_history["ORDERID"] = $tx_id;
        $payment_history["PAYMENTMODE"] = "CashOnDelivery";
        $payment_history["STATUS"] = "TXN_STATUS";
        $payment_history["CURRENCY"] = "INR";
        $payment_history["TXNAMOUNT"] = $totals;
        $this->common_model->common_insert("payment_history", $payment_history);
    
        $this->common_model->common_update("orders", array("status" => 1), array("tx_id" => $tx_id));
    
        return redirect()->to("home/order_success/" . $tx_id);
    }
    

    public function order_success($order_id = '') {
        $this->data["payment_history"] = $this->common_model->common_get_one("payment_history", array("ORDERID" => $order_id));
        return view("home/order_complete", $this->data);
    }
    
    public function payment_success($order_id = '') {
        $this->data["payment_history"] = $this->common_model->common_get_one("payment_history", array("ORDERID" => $order_id));
        $this->session->setFlashdata("alert_success", "Payment successful.");
        return view("home/payment_success", $this->data);
    }

    public function payment() {
        $orderNo = "order-" . date("ymdHis");
        $txId = date("ymdHis");

        $carts = $this->common_model->common_get_all("cart", ["customer_id" => $this->session->get("user_id")]);
       
        $shippingAddress = $this->common_model->common_get_one("shipping_address", ["user_id" => $this->session->get("user_id")]);
        $totals = 0;
        $subtotal = 0;
        $taxPrice = 0;
        $totalTax = 0;
        $totalDiscount = 0;
// echo "<pre>";print_r($shippingAddress);die;
        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $productDetail = $this->common_model->common_get_one("tbl_product", ["product_id" => $cart["product_id"]]);

                $orderItems = [
                    "order_no" => $orderNo,
                    "order_item_no" => $orderNo . "-" . rand(1111, 9999),
                    "product_id" => $cart["product_id"],
                    "name" => $cart["product_title"],
                    "quantity" => $cart["qty"],
                    
                    "price" => $cart["product_price"],
                    "discount" => $cart["discount"],
                    "tax" => $cart["tax"],
                    "img" => $cart["product_image"],
                    "user_id" => $cart["customer_id"],
                    "vendor_id" => $productDetail["vendor_id"],
                    "selected_size" => $cart["selected_size"],
                ];
 // echo "<pre>";
        // print_r($carts);die;
                $itemPrice = ($cart["product_price"] + $cart["tax"]) * $cart["qty"];
                $subtotal += $itemPrice;
                $taxPrice = $cart["tax"];
                $totalTax += $taxPrice;
                $itemTotal = $itemPrice - $cart["discount"];
// $totalDiscount += $cart["discount"];
                $totals += $itemPrice;

                $orderItems["total"] = $itemTotal;
                $this->common_model->common_insert("order_items", $orderItems);
            }

            $order = [
                "order_no" => $orderNo,
                "user_id" => $this->session->get("user_id"),
                "tx_id" => $txId,
                "price" => $totals - $totalDiscount,
                "sub_total" => $subtotal,
                "total_tax" => $totalTax,
                "total_discount" => $totalDiscount,
                "updatedAt" => date("Y-m-d H:i:s"),
                "createdAt" => date("Y-m-d H:i:s"),
            ];
            $this->common_model->common_insert("orders", $order);

// Empty cart
            $this->common_model->common_delete("cart", ["customer_id" => $this->session->get("user_id")]);

            $email = trim($this->data["user_profile"]["email"]);

            $paytmParams = [
                'ORDER_ID' => $txId,
                'TXN_AMOUNT' => $totals,
                "CUST_ID" => $this->session->get("user_id"),
                "EMAIL" => !empty($email) ? $email : "",
                "MID" => PAYTM_MERCHANT_MID,
                "CHANNEL_ID" => PAYTM_CHANNEL_ID,
                "WEBSITE" => PAYTM_MERCHANT_WEBSITE,
                "CALLBACK_URL" => PAYTM_CALLBACK_URL,
                "INDUSTRY_TYPE_ID" => PAYTM_INDUSTRY_TYPE_ID,
            ];

            $paytmChecksum = $this->paytm->getChecksumFromArray($paytmParams, PAYTM_MERCHANT_KEY);
            $paytmParams["CHECKSUMHASH"] = $paytmChecksum;

            $transactionURL = PAYTM_TXN_URL;

            $this->data = [
                'paytmParams' => $paytmParams,
                'transactionURL' => $transactionURL,
            ];

            return view('home/payby_paytm', $this->data);
        }
    }

    public function payment2() {
        $order_no = "order-" . date("ymdHis");
        $tx_id = date("ymdHis");

        $carts = $this->common_model->common_get_all("cart", ["session_id" => $this->session_id]);
        $user_detail = $this->common_model->common_get_one("user", ["id" => $this->session->get("user_id")]);
        $shipping_address = $this->common_model->common_get_one("shipping_address", ["user_id" => $this->session->get("user_id")]);
        $totals = 0;
        $subtotal = 0;
        $tax_price = 0;
        $total_tax = 0;
        $total_discount = 0;

        $my_coupon = $this->session->get("coupon");

        if (!empty($my_coupon)) {
            $result_coupon = $this->common_model->common_get_one("discount_codes", ["code" => $my_coupon]);
            if (isset($result_coupon["amount"])) {
                $total_discount = $result_coupon["amount"];
            }
        }

        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $product_detail = $this->common_model->common_get_one("tbl_product", ["product_id" => $cart["product_id"]]);

                $order_items = [
                    "order_no" => $order_no,
                    "order_item_no" => $order_no . "-" . rand(1111, 9999),
                    "product_id" => $cart["product_id"],
                    "name" => $cart["product_title"],
                    "quantity" => $cart["qty"],
                    "price" => $cart["product_price"],
                    "write_up" => $cart["write_up"],
                    "discount" => "",
                    "tax" => $cart["tax"],
                    "img" => $cart["product_image"],
                    "user_id" => $cart["customer_id"],
                    "vendor_id" => $product_detail["vendor_id"],
                ];

                $item_price = (($cart["product_price"] + $cart["tax"]) * $cart["qty"]);
                $subtotal += $item_price;
                $tax_price = ($cart["tax"]);
                $total_tax += $tax_price;
                $totals += $item_price;

                $order_items["total"] = $item_price;
                $this->common_model->common_insert("order_items", $order_items);
            }

            $totals -= $total_discount;

            $order = [
                "order_no" => $order_no,
                "user_id" => $this->session->get("user_id"),
                "tx_id" => $tx_id,
                "price" => $totals,
                "sub_total" => $subtotal,
                "total_tax" => $total_tax,
                "total_discount" => $total_discount,
                "updatedAt" => date("Y-m-d H:i:s"),
                "createdAt" => date("Y-m-d H:i:s"),
            ];
            $this->common_model->common_insert("orders", $order);

// cart empty
            $this->common_model->common_delete("cart", ["customer_id" => $this->session->get("user_id")]);

// $email = trim($this->data["user_profile"]["email"]);
        }

        $api = new Api(KEYID, KEYSECRET);
        $displayCurrency = "INR";
        $orderData = [
            'receipt' => $order_no,
            'amount' => $totals * 100, // 2000 rupees in paise
            'currency' => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $this->session->set("razorpay_order_id", $razorpayOrderId);
        $this->session->set("order_no", $order_no);
        $this->session->set("tx_id", $tx_id);
        $this->session->set("order_amount", $totals);
        $displayAmount = $amount = $orderData['amount'];

        $checkout = 'manual';

        $data = [
            "key" => KEYID,
            "amount" => $amount,
            "name" => $user_detail["name"],
            "description" => "orders",
            "image" => "http://www.beaversportswear.in/includes/home/images/logos/logo4.png",
            "prefill" => [
                "name" => $user_detail["name"],
                "email" => $user_detail["email"],
                "contact" => "9999999999",
            ],
            "notes" => [
                "address" => $shipping_address["address"],
                "merchant_order_id" => $order_no,
            ],
            "theme" => [
                "color" => "#F37254"
            ],
            "order_id" => $razorpayOrderId,
        ];

        if ($displayCurrency !== 'INR') {
            $data['display_currency'] = $displayCurrency;
            $data['display_amount'] = $displayAmount;
        }

        $this->data["json"] = json_encode($data);

        return view("home/razorpay", $this->data);
    }

    // **************** view single product and show related products **********************
    public function viewProduct($productUrl) {
        $productModel = new Products();
        $productDetails = $productModel->productdetail($productUrl);
        //$id = $this->request->getPost("id");
        $productCategory = isset($productDetails['product_category']) ? $productDetails['product_category'] : null;

// Fetch related products based on the product category
        $relatedProducts = $productModel->relatedProduct($productDetails["id"], $productCategory);
        $this->data["product_images"] = $this->common_model->common_get_all("product_images", array("product_id" => $productDetails["product_id"]));
        $this->data["product_sizes"] = $this->common_model->common_get_all("product_sizes", array("product_id" => $productDetails["product_id"]));
        $this->data["product"] = $productDetails;
        $this->data["related"] = $relatedProducts;
        $this->data["wishlist_exist"] = $this->common_model->common_get_one("wishlist", array("product_id" => $productDetails["product_id"]));
        return view('home/singleproduct', $this->data);
        
    }
// ******************** cart Section ********************//

    public function carts() {
        $this->data['cart'] = $this->cartModel->viewCart($this->session_id);
        return view('home/cart', $this->data);
    }
  
    
    
    public function addToCart() {
        $this->session = \Config\Services::session();
        $session_id = session_id();
        $user_id = $this->session->get("user_id");
        $product_id = $this->request->getPost('product_id');

        $this->product_model = new Products();
        $product = $this->product_model->getProductPrice($product_id);
    
        $category_tax = $this->common_model->common_get_one("categories", array("id" => $product["product_category"]));

        $quantity = $this->request->getPost('qty');


        $cart = array();
        $product_price = 0;
        if ($product["tax_included"] == 0) {
            $tax = ($product["product_price"] * $category_tax["tax"]) / 100;
            $product_price = $product["product_price"] - $tax;
        } else {
            $tax = ($product["product_price"] * $category_tax["tax"]) / 100;
            $product_price = $product["product_price"];
        }


        $row_exist = $this->cartModel->where('product_id', $product_id)
                ->where('session_id', $session_id)
                ->first();

        if ($row_exist) {
            $quantity = $row_exist['qty'] + 1;
            $this->cartModel->update($row_exist['id'], ['qty' => $quantity]);
        } else {
            $data = [
                'session_id' => $session_id,
                'product_id' => $product["product_id"],
                'product_title' => $product["product_title"],
                'product_price' => $product_price,
                'product_image' => $product["product_image"],
                'tax' => $tax,
                'qty' => $quantity,
            ];
            if(isset($user_id)){
                $data['customer_id'] = $user_id;
            }

            $this->cartModel->insert($data);
        }
        
        return redirect()->to(base_url('home/carts'));
    }

   
    // public function update_cart($cart_id = '', $cart_qty = '') {
    //     $cart = $this->common_model->common_get_one("cart", array("id" => $cart_id));
    
    //     $this->product_model = new Products();
    //     $product = $this->product_model->getProductPrice($cart["product_id"]);
    
    //     // $product_size = $this->common_model->common_get_one('product_sizes', [
    //     //     'product_id' => $cart["product_id"],
    //     //     'size_name' => $cart["size_name"]
    //     // ]);
        
    //     if (!$product_size) {
    //         return redirect()->to(base_url('home/carts'))->with('error', 'Selected size is not available for this product.');
    //     }
        
    //     $category_tax = $this->common_model->common_get_one("categories", array("id" => $product["product_category"]));
    
    //     $cart = array();
        
    //     $product_price = $product_size["price"];
    //     $tax = 0;
        
    //     if ($product["tax_included"] == 0) {
    //         $tax = ($product_price * $category_tax["tax"]) / 100;
    //         $product_price = $product_price - $tax;  
    //     } else {
    //         $tax = ($product_price * $category_tax["tax"]) / 100;  
    //     }
    
    //     $cart["product_price"] = $product_price;
    //     $cart["tax"] = $tax;
    //     $cart["qty"] = $cart_qty;
    //     $this->common_model->common_update("cart", $cart, array("id" => $cart_id));
    
    //     return redirect()->to(base_url('home/carts'));
    // }
    
    
    public function update_cart($cart_id = '', $cart_qty = '') {
        $cart = $this->common_model->common_get_one("cart", array("id" => $cart_id));

        $this->product_model = new Products();
        $product = $this->product_model->getProductPrice($cart["product_id"]);
        $category_tax = $this->common_model->common_get_one("categories", array("id" => $product["product_category"]));
        $cart = array();
        $product_price = 0;
        if ($product["tax_included"] == 0) {
            $tax = ($product["product_price"] * $category_tax["tax"]) / 100;
            $product_price = $product["product_price"] - $tax;
        } else {
            $tax = ($product["product_price"] * $category_tax["tax"]) / 100;
            $product_price = $product["product_price"];
        }
        $cart["product_price"] = $product_price;
        $cart["tax"] = $tax;
        $cart["qty"] = $cart_qty;
        $this->common_model->common_update("cart", $cart, array("id" => $cart_id));
        return redirect()->to(base_url('home/carts'));
    }

// ********************* product section ******************//

    public function product($product_url = '') {
        $product_detail = $this->common_model->common_get_one("tbl_product", array("product_url" => $product_url));
        $category_detail = $this->common_model->common_get_one("categories", array("id" => $product_detail["product_category"]));
        $brand_detail = $this->common_model->common_get_one("brand", array("id" => $product_detail["product_brand"]));
        $product_sizes = $this->common_model->common_get_all("product_sizes", array("product_id" => $product_detail["product_id"]));

        $this->data["wishlist_exit"] = $this->common_model->common_get_one("wishlist", array("product_id" => $product_detail["product_id"]));
        $this->data["filter_categories"] = $this->common_model->common_query_all("SELECT categories.name,categories.id,categories.url, count(*) as 'total_records' from categories INNER JOIN tbl_product on categories.id = tbl_product.product_category group by categories.name order by categories.name asc");
        $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
        $this->data["category_detail"] = $category_detail;
        $this->data["product_detail"] = $product_detail;
        $this->data["brand_detail"] = $brand_detail;
        $this->data["product_sizes"] = $product_sizes;
        $this->data["recent_products"] = $this->common_model->common_query_all("select * from tbl_product where status='1' and product_category='" . $category_detail["id"] . "' and product_id !='" . $product_detail["product_id"] . "' order by product_id desc limit 3");
        $this->data["user_reviews"] = $this->common_model->common_get_all("product_reviews", array("product_id" => $product_detail["product_id"]));
        $this->data["product_images"] = $this->common_model->common_get_all("product_images", array("product_id" => $product_detail["product_id"]));
//$this->data["products"] = $this->common_model->common_get_all("tbl_product", array("product_category" => $category_detail["id"]));
        return view('home/product_detail', $this->data);
    }

    public function productbyid($product_id = '') {
        $product_detail = $this->common_model->common_get_one("tbl_product", array("product_id" => $product_id));
        return redirect()->to("home/viewProduct/" . $product_detail["product_url"]);
    }


// ***************** wishlist section ******************// 
public function addWishList() {

    if (!$this->session->get("user_id")) {
        $this->session->set("callback", "home/viewProduct/" . $this->request->getPost("product_url"));
        $this->session->setFlashdata('error', 'Please login first.');
        return redirect()->to("userlogin")->withInput();
    }
    $check_exist = $this->common_model->common_get_one("wishlist", array("product_id" => $this->request->getPost("id"), "customer_id" => $this->session->get("user_id")));
    $product_detail = $this->common_model->common_get_one("tbl_product", array("product_id" => $this->request->getPost("id")));
    if (!isset($check_exist["id"])) {

        $category_tax = $this->common_model->common_get_one("categories", array("id" => $product_detail["product_category"]));

        $img = "";
        $images = explode(",", $product_detail["product_image"]);
        if (count($images) > 1) {
            $img = $images[0];
        } else {

            $img = $product_detail["product_image"];
        }

        $tax = ($product_detail["product_price"] * $category_tax["tax"]) / 100;

        $wishlist = array();
        $wishlist["product_id"] = $this->request->getPost("id");
        $wishlist["product_title"] = $product_detail["product_title"];
        $wishlist["product_price"] = $product_detail["product_price"];
        $wishlist["tax"] = $tax;
        $wishlist["qty"] = 1;
        $wishlist["product_image"] = $img;
        $wishlist["customer_id"] = $this->session->get("user_id");
        $this->session->setFlashdata("alert_success", "Item is inserted.");
        $this->common_model->common_insert("wishlist", $wishlist);
    } else {
        $this->common_model->common_delete("wishlist", array("product_id" => $this->request->getPost("id"), "customer_id" => $this->session->get("user_id")));
        $this->session->setFlashdata("alert_danger", "Item is deleted.");
    }
   //echo json_encode(array("status" => "success", "url" => base_url("home/viewProduct/" . $product_detail["product_url"])));
    return redirect()->to("home/viewProduct/" . $product_detail["product_url"]);
}

}

?>