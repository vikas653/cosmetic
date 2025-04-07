<?php

namespace App\Controllers;

use App\Models\CommonModel;


class Dashboard extends BaseController {    

    public $common_model;
    public $session;

      public function __construct() {
     
        $session = \Config\Services::session();
        $this->common_model = new CommonModel();
        $this->data["page_root"] = "dashboard";

        if ($session->get("username")) {
            
        } else {
            header('Location: ' . base_url());
            exit();
        }
      }

    public function index() {
        $this->data["page_name"] = "dashboard";
        $this->data["page"] = "dashboard";
        $this->data["total_orders"] = $this->common_model->common_num_rows("orders");
        $this->data["total_users"] = $this->common_model->common_num_rows("user");
        $this->data["total_products"] = $this->common_model->common_num_rows("tbl_product");
        $this->data["total_categories"] = $this->common_model->common_num_rows("categories");
        return view('admin/home', $this->data);
    }

    public function profile() {
        $this->data["page_name"] = "dashboard";
        $this->data["page"] = "profile";
        $this->data["admin_detail"] = $this->common_model->common_get_one("admin", array("id" => 1));
        return view('admin/profile', $this->data);
    }

    public function updateProfile() {
        $record = array();
        $record["username"] = $this->request->getPost("username");
        $record["password"] = base64_encode($this->request->getPost("password"));

        $this->common_model->common_update("admin", $record, array("id" => 1));
        return redirect()->to("dashboard/profile");
    }

    public function socialmedia() {
        $this->data["page_name"] = "dashboard";
        $this->data["page"] = "social_media";
        $this->data["social_media"] = $this->common_model->common_get_one("settings", array("id" => 1));
        return view('admin/social_media', $this->data);
    }

    public function socialMediaUpdate() {
        $record = array();
        $record["facebook"] = $this->request->getPost("facebook");
        $record["twitter"] = $this->request->getPost("twitter");
        $record["google-plus"] = $this->request->getPost("google-plus");
        $record["instagram"] = $this->request->getPost("instagram");
        $record["pinterest"] = $this->request->getPost("pinterest");
        $record["discount_cart_limit"] = $this->request->getPost("discount_cart_limit");
        // if (isset($_FILES["file"]["name"])) {
        //     $imgext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        //     if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
        //         $rand_name = "banner1_" . date("YmdHis") . rand(1111, 9999);
        //         $record["home_banner1"] = $rand_name . "." . $imgext;
        //         move_uploaded_file($_FILES["file"]["tmp_name"], "assets/banners/" . $rand_name . "." . $imgext);
        //     }
        // }
        
        if (isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])) {
            $imgext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg") {
                $rand_name = "category_" . date("YmdHis") . rand(1111, 9999);
                $record["home_banner1"]= $rand_name . "." . $imgext;
                move_uploaded_file($_FILES["file"]["tmp_name"], "assets/banners/" . $rand_name . "." . $imgext);
            }
        }


        if (isset($_FILES["file2"]["name"])) {
            $imgext = pathinfo($_FILES["file2"]["name"], PATHINFO_EXTENSION);
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
                $rand_name = "banner2_" . date("YmdHis") . rand(1111, 9999);
                $record["home_banner2"] = $rand_name . "." . $imgext;
                move_uploaded_file($_FILES["file2"]["tmp_name"], "assets/banners/" . $rand_name . "." . $imgext);
            }
        }


        $this->common_model->common_update("settings", $record, array("id" => 1));
        return redirect()->to("dashboard/socialmedia");
    }

    public function homeSlider() {
        $this->data["page_name"] = "slider";
        $this->data["home_sliders"] = $this->common_model->common_get_all_nc("home_slider");
        return view('admin/home_slider', $this->data);
    }

    public function addHomeSliderAction() {
        $image = "";
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
            $rand_name = "slider_" . date("Y-m-dH-i-s") . rand(0000, 9999);
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/home_slider/" . $rand_name . "." . $imgext);

            $image = $rand_name . "." . $imgext;
            $add = "assets/home_slider/" . $rand_name . "." . $imgext; //for thumbnail
            ///////// Start the thumbnail generation//////////////
            $n_width =800;          // Fix the width of the thumb nail images
            $n_height = 320;         // Fix the height of the thumb nail imaage


            $tsrc = "assets/home_slider/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
            ////////////// Starting of GIF thumb nail creation ///////////
            if (@$_FILES['img']['type'] == "image/gif") {
                $im = ImageCreateFromGIF($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);                  // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                if (function_exists("imagegif")) {
                    Header("Content-type: image/gif");
                    ImageGIF($newimage, $tsrc);
                }
                chmod("$tsrc", 0777);
            }

            ////////////// starting of JPG thumb nail creation //////////
            if ($_FILES['img']['type'] == "image/jpeg") {
                $im = ImageCreateFromJPEG($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }

            ////////////// starting of png thumb nail creation //////////
            if ($_FILES['img']['type'] == "image/png") {
                $im = imagecreatefrompng($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }
        }

        $records["img"] = $image;
        $records["platform"] = $this->request->getPost("platform");
        $records["name"] = $this->request->getPost("name");

        $this->common_model->common_insert("home_slider", $records);
        // $this->session->set_flashdata("alert_success", "Record inserted");
        return redirect()->to("dashboard/homeSlider");
    }
    public function deleteHomeSlider($id = '') {
        $this->common_model->common_delete("home_slider", array("id" => $id));
        // $this->session->set_flashdata("alert_danger", "Record deleted");
        return redirect()->to("dashboard/homeSlider");
    }
    public function slider() {
        $this->data["page_name"] = "slider";
        $this->data["slider"] = $this->common_model->common_get_all_nc("slider");
        return view('admin/slider', $this->data);
    }
    public function addSliderAction() {
        $image = "";
        $imgext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
            $rand_name = "slider_" . date("Y-m-dH-i-s") . rand(0000, 9999);
            move_uploaded_file($_FILES["image"]["tmp_name"], "assets/slider/" . $rand_name . "." . $imgext);

            $image = $rand_name . "." . $imgext;
            $add = "assets/slider/" . $rand_name . "." . $imgext; //for thumbnail
            ///////// Start the thumbnail generation//////////////
            $n_width =300;          // Fix the width of the thumb nail images
            $n_height = 75;         // Fix the height of the thumb nail imaage


            $tsrc = "assets/slider/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
            ////////////// Starting of GIF thumb nail creation ///////////
            if (@$_FILES['image']['type'] == "image/gif") {
                $im = ImageCreateFromGIF($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);                  // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                if (function_exists("imagegif")) {
                    Header("Content-type: image/gif");
                    ImageGIF($newimage, $tsrc);
                }
                chmod("$tsrc", 0777);
            }

            ////////////// starting of JPG thumb nail creation //////////
            if ($_FILES['image']['type'] == "image/jpeg") {
                $im = ImageCreateFromJPEG($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }

            ////////////// starting of png thumb nail creation //////////
            if ($_FILES['image']['type'] == "image/png") {
                $im = imagecreatefrompng($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }
        }

        $records["image"] = $image;
        $records["name"] = $this->request->getPost("name");

        $this->common_model->common_insert("slider", $records);
        // $this->session->set_flashdata("alert_success", "Record inserted");
        return redirect()->to("dashboard/slider");
    }


  

    public function categories() {
        $this->data["page_name"] = "category";
        $this->data["category"] = $this->common_model->common_get_all_nc("categories");
        return view('admin/category', $this->data);
    }

    public function addCategoryAction() {
        $result = $this->common_model->common_get_one("categories", array("name" => $this->request->getPost("category_name")));
        if (!isset($result["id"])) {
            $records = array();
            $records["name"] = $this->request->getPost("category_name");
            $records["url"] = $this->url($this->request->getPost("category_name"));
            $records["parent_id"] = $this->request->getPost("parent_id");

            $image = "";
            $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
                $rand_name = "category_" . date("Y-m-dH-i-s") . rand(0000, 9999);
                move_uploaded_file($_FILES["img"]["tmp_name"], "assets/categories/" . $rand_name . "." . $imgext);

                $image = $rand_name . "." . $imgext;
                $add = "assets/categories/" . $rand_name . "." . $imgext; //for thumbnail
                ///////// Start the thumbnail generation//////////////
                $n_width = 800;          // Fix the width of the thumb nail images
                $n_height = 320;         // Fix the height of the thumb nail imaage


                $tsrc = "assets/categories/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
                ////////////// Starting of GIF thumb nail creation ///////////
                if (@$_FILES['img']['type'] == "image/gif") {
                    $im = ImageCreateFromGIF($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);                  // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    if (function_exists("imagegif")) {
                        Header("Content-type: image/gif");
                        ImageGIF($newimage, $tsrc);
                    }
                    chmod("$tsrc", 0777);
                }

                ////////////// starting of JPG thumb nail creation //////////
                if ($_FILES['img']['type'] == "image/jpeg") {
                    $im = ImageCreateFromJPEG($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);             // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    ImageJpeg($newimage, $tsrc);
                    chmod("$tsrc", 0777);
                }

                ////////////// starting of png thumb nail creation //////////
                if ($_FILES['img']['type'] == "image/png") {
                    $im = imagecreatefrompng($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);             // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    ImageJpeg($newimage, $tsrc);
                    chmod("$tsrc", 0777);
                }
            }

            $records["image"] = $image;
            $records["created_by"] = 0;

            $this->common_model->common_insert("categories", $records);

            // $this->session->set_flashdata("alert_success", "Record Inserted");
        } else {
            // $this->session->set_flashdata("alert_danger", "Record already exist");
        }
        return redirect()->to("dashboard/categories");
    }

    public function deleteCategory($id = '') {
        if (!empty($id)) {
            $this->common_model->common_delete("categories", array("id" => $id));
            // $this->session->set_flashdata("alert_danger", "Record deleted");
        }
        return redirect()->to("dashboard/categories");
    }

    public function editCategoryAction() {
        $records = array();
        $records["name"] = $this->request->getPost("category_name");
        $records["url"] = $this->url($this->request->getPost("category_name"));
        $records["parent_id"] = $this->request->getPost("parent_id");

        $image = "";
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
            $rand_name = "category_" . date("Y-m-dH-i-s") . rand(0000, 9999);
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/categories/" . $rand_name . "." . $imgext);

            $image = $rand_name . "." . $imgext;
            $add = "assets/categories/" . $rand_name . "." . $imgext; //for thumbnail
            ///////// Start the thumbnail generation//////////////
            $n_width = 800;          // Fix the width of the thumb nail images
            $n_height = 320;         // Fix the height of the thumb nail imaage


            $tsrc = "assets/categories/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
            ////////////// Starting of GIF thumb nail creation ///////////
            if (@$_FILES['img']['type'] == "image/gif") {
                $im = ImageCreateFromGIF($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);                  // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                if (function_exists("imagegif")) {
                    Header("Content-type: image/gif");
                    ImageGIF($newimage, $tsrc);
                }
                chmod("$tsrc", 0777);
            }

            ////////////// starting of JPG thumb nail creation //////////
            if ($_FILES['img']['type'] == "image/jpeg") {
                $im = ImageCreateFromJPEG($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }

            ////////////// starting of png thumb nail creation //////////
            if ($_FILES['img']['type'] == "image/png") {
                $im = imagecreatefrompng($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }
        }

        $records["image"] = $image;
        $records["created_by"] = 0;

        $this->common_model->common_update("categories", $records, array("id" => $this->request->getPost("category_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/categories");
    }

    public function brand() {
        $this->data["page_name"] = "brand";
        $this->data["brand"] = $this->common_model->common_get_all_nc("brand");
        return view('admin/brand', $this->data);
    }

    public function addBrandAction() {
        $result = $this->common_model->common_get_one("brand", array("name" => $this->request->getPost("brand_name")));
        if (!isset($result["id"])) {
            $records = array();
            $records["name"] = $this->request->getPost("brand_name");
            $records["url"] = $this->url($this->request->getPost("brand_name"));
            $image = "";
            $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
                $rand_name = "brand_" . date("Y-m-dH-i-s") . rand(0000, 9999);
                move_uploaded_file($_FILES["img"]["tmp_name"], "assets/brands/" . $rand_name . "." . $imgext);

                $image = $rand_name . "." . $imgext;
                $add = "assets/brands/" . $rand_name . "." . $imgext; //for thumbnail
                ///////// Start the thumbnail generation//////////////
                $n_width = 800;          // Fix the width of the thumb nail images
                $n_height = 320;         // Fix the height of the thumb nail imaage


                $tsrc = "assets/brands/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
                ////////////// Starting of GIF thumb nail creation ///////////
                if (@$_FILES['img']['type'] == "image/gif") {
                    $im = ImageCreateFromGIF($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);                  // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    if (function_exists("imagegif")) {
                        Header("Content-type: image/gif");
                        ImageGIF($newimage, $tsrc);
                    }
                    chmod("$tsrc", 0777);
                }

                ////////////// starting of JPG thumb nail creation //////////
                if ($_FILES['img']['type'] == "image/jpeg") {
                    $im = ImageCreateFromJPEG($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);             // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    ImageJpeg($newimage, $tsrc);
                    chmod("$tsrc", 0777);
                }

                ////////////// starting of png thumb nail creation //////////
                if ($_FILES['img']['type'] == "image/png") {
                    $im = ImageCreateFromPNG($add);
                    $width = ImageSx($im);              // Original picture width is stored
                    $height = ImageSy($im);             // Original picture height is stored
                    $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                    $newimage = imagecreatetruecolor($n_width, $n_height);
                    imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                    ImageJpeg($newimage, $tsrc);
                    chmod("$tsrc", 0777);
                }
            }

            $records["image"] = $image;

            $this->common_model->common_insert("brand", $records);

            // $this->session->set_flashdata("alert_success", "Record Inserted");
        } else {
            // $this->session->set_flashdata("alert_danger", "Record already exist");
        }
        return redirect()->to("dashboard/brand");
    }

    public function deleteBrand($id = '') {
        if (!empty($id)) {
            $this->common_model->common_delete("brand", array("id" => $id));
            // $this->session->set_flashdata("alert_danger", "Record deleted");
        }
        return redirect()->to("dashboard/brand");
    }

    public function editBrandAction() {
        $records = array();
        $records["name"] = $this->request->getPost("brand_name");
        $records["url"] = $this->url($this->request->getPost("brand_name"));
        $image = "";
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
            $rand_name = "brand_" . date("Y-m-dH-i-s") . rand(0000, 9999);
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/brands/" . $rand_name . "." . $imgext);

            $image = $rand_name . "." . $imgext;
            $add = "assets/brands/" . $rand_name . "." . $imgext; //for thumbnail
            ///////// Start the thumbnail generation//////////////
            $n_width = 800;          // Fix the width of the thumb nail images
            $n_height = 320;         // Fix the height of the thumb nail imaage


            $tsrc = "assets/brands/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
            ////////////// Starting of GIF thumb nail creation ///////////
            if (@$_FILES['img']['type'] == "image/gif") {
                $im = ImageCreateFromGIF($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);                  // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                if (function_exists("imagegif")) {
                    Header("Content-type: image/gif");
                    ImageGIF($newimage, $tsrc);
                }
                chmod("$tsrc", 0777);
            }

            // starting of JPG thumb nail creation //
            if ($_FILES['img']['type'] == "image/jpeg") {
                $imgData = file_get_contents($add);
                $im = imagecreatefromstring($imgData);
                
                $width = imagesx($im); // Original picture width is stored
                $height = imagesy($im); // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imagecopyresized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                imagejpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }


            ////////////// starting of png thumb nail creation //////////
            if ($_FILES['img']['type'] == "image/png") {
                $im = imagecreatefrompng($add);
                $width = ImageSx($im);              // Original picture width is stored
                $height = ImageSy($im);             // Original picture height is stored
                $n_height = ($n_width / $width) * $height; // Add this line to maintain aspect ratio
                $newimage = imagecreatetruecolor($n_width, $n_height);
                imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
                ImageJpeg($newimage, $tsrc);
                chmod("$tsrc", 0777);
            }
             $records["image"] = $image;
        }
       

        $this->common_model->common_update("brand", $records, array("id" => $this->request->getPost("brand_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/brand");
    }

    public function url($string) {

        $string = preg_replace('!\s+!', ' ', trim(strtolower($string)));
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function products() {

        $this->data["page_name"] = "products";

        if (isset($_GET["category"])) {
            $query = "select * from tbl_product where status=1";

            if (!empty($_GET["category"])) {
                if ($_GET["category"] != "all")
                    $query .= " and product_category='" . $_GET["category"] . "'";
            }

            $this->data["products"] = $this->common_model->common_query_all($query);
        }

        $this->data["shop_categories"] = $this->common_model->common_get_all_nc("categories");
        return view('admin/products', $this->data);
    }


    
    
        // public function products()
        // {
        //     $data["page_name"] = "products";
    
        //     if ($this->request->getGet("category")) {
        //         $query = $this->common_model->table("tbl_product")
        //             ->where("status", 1);
    
        //         $category = $this->request->getGet("category");
        //         if (!empty($category) && $category !== "all") {
        //             $query->where("product_category", $category);
        //         }
    
        //         $data["products"] = $query->get()->getResult();
        //     }
    
        //     $data["shop_categories"] = $this->common_model->common_get_all_nc("categories");
    
        //     return view('admin/products', $data);
        // }
    
    

    public function addProduct() {
        $this->data["page_name"] = "products";
        $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
        $this->data["brands"] = $this->common_model->common_get_all_nc("brand");
        $this->data["categories"] = $this->common_model->common_query_all("select * from categories");
        return view('admin/add_product', $this->data);
    }

    public function addProductAction() {
        $product = array();

        $image = "";
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
            $rand_name = "product_" . date("Y-m-dH-i-s") . rand(0000, 9999);
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/product/" . $rand_name . "." . $imgext);

            $image = $rand_name . "." . $imgext;
            $add = "assets/product/" . $rand_name . "." . $imgext; //for thumbnail
            ///////// Start the thumbnail generation//////////////
            $n_width = 600;          // Fix the width of the thumb nail images
            $n_height = 600;         // Fix the height of the thumb nail imaage


            $tsrc = "assets/product/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
            $this->createThumbnail($add, $tsrc, $n_width, $n_height, 'transparent');
        }
        $add_product_tags = array();
        foreach ($_POST["product_tags"] as $product_tag) {
            $add_product_tags[] = $product_tag;
        }
        if (empty($add_product_tags)) {
            $add_product_tags = "";
        }
        

        $product["product_image"] = $image;
        $product["product_title"] = $this->request->getPost("product_title");
        $product["product_url"] = $this->url($this->request->getPost("product_title"));
        $product["product_description"] = $this->request->getPost("description");
        $product["product_short_des"] = $this->request->getPost("product_short_des");
        $product["tax_included"] = $this->request->getPost("tax_included");
        $product["product_price"] = $this->request->getPost("product_price");
        $product["product_mrp"] = $this->request->getPost("product_mrp");
        $product["product_quantity"] = $this->request->getPost("product_quantity");
        $product["product_category"] = $this->request->getPost("product_category");
        $product["product_brand"] = $this->request->getPost("product_brand");
        $product["in_trending"] = $this->request->getPost("in_trending");
        $product["product_tags"] = json_encode($add_product_tags);
        $product["vendor_id"] = 1;
        $product["status"] = 1;
        $product["published_date"] = date("Y-m-d H:i:s");
        // $this->session->set_flashdata("alert_danger", "Record inserted");
        $this->common_model->common_insert("tbl_product", $product);
        return redirect()->to("dashboard/products");
    }

    public function editProduct($product_id = '') {
        $this->data["page_name"] = "products";
        $this->data["brands"] = $this->common_model->common_get_all_nc("brand");
        $this->data["product_sizes"] = $this->common_model->common_get_all("product_sizes", array("product_id" => $product_id));
        $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
        $this->data["categories"] = $this->common_model->common_query_all("select * from categories");
        $this->data["product_detail"] = $this->common_model->common_get_one("tbl_product", array("product_id" => $product_id));
        $this->data["product_images"] = $this->common_model->common_get_all("product_images", array("product_id" => $product_id));
        return view('admin/edit_product', $this->data);
    }

    public function addProductImageAction() {
        $product = array();
        $product["product_id"] = $this->request->getPost("product_id");
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if (!empty($_FILES["img"]["name"])) {
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
                $rand_name = "product_" . date("Y-m-dH-i-s") . rand(00, 99);
                move_uploaded_file($_FILES["img"]["tmp_name"], "assets/product/" . $rand_name . "." . $imgext);

                $image = $rand_name . "." . $imgext;
                $add = "assets/product/" . $rand_name . "." . $imgext; //for thumbnail
                ///////// Start the thumbnail generation//////////////
                $n_width = 600;          // Fix the width of the thumb nail images
                $n_height = 600;         // Fix the height of the thumb nail imaage


                $tsrc = "assets/product/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
                ////////////// Starting of GIF thumb nail creation ///////////
                $this->createThumbnail($add, $tsrc, $n_width, $n_height, 'transparent');
            }
            $product["product_image"] = $image;


            $this->common_model->common_insert("product_images", $product);

            return redirect()->to("dashboard/editProduct/" . $this->request->getPost("product_id"));
        }
    }

    public function deleteProductImage() {
        $id = $this->request->getPost("image_id");
        $result = $this->common_model->common_delete("product_images", array("id" => $id));
        if ($result) {
            echo "yes";
        } else {
            echo "no";
        }
    }

    public function addProductSizeAction() {
        
        $product = array();
        // echo "<pre>";
        // print_r($product);die;
        $product["product_id"] = $this->request->getPost("product_id");
        $product["size_name"] = $this->request->getPost("size_name");
        $product["price"] = $this->request->getPost("price");

        $this->common_model->common_insert("product_sizes", $product);

        return redirect()->to("dashboard/editProduct/" . $this->request->getPost("product_id"));
    }

    public function delProductSize($id = '', $product_id = '') {

        $this->common_model->common_delete("product_sizes", array("id" => $id));

        return redirect()->to("dashboard/editProduct/" . $product_id);
    }

    public function editProductAction() {
        $product = array();

        $image = "";
        $imgext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if (!empty($_FILES["img"]["name"])) {
            if ($imgext == "jpg" || $imgext == "png" || $imgext == "jpeg" || $imgext == "gif") {
                $rand_name = "product_" . date("Y-m-dH-i-s") . rand(00, 99);
                move_uploaded_file($_FILES["img"]["tmp_name"], "assets/product/" . $rand_name . "." . $imgext);

                $image = $rand_name . "." . $imgext;
                $add = "assets/product/" . $rand_name . "." . $imgext; //for thumbnail
                ///////// Start the thumbnail generation//////////////
                $n_width = 600;          // Fix the width of the thumb nail images
                $n_height = 600;         // Fix the height of the thumb nail imaage


                $tsrc = "assets/product/thimg/" . $rand_name . "." . $imgext;   // Path where thumb nail image will be stored
                ////////////// Starting of GIF thumb nail creation ///////////
                $this->createThumbnail($add, $tsrc, $n_width, $n_height, 'transparent');
            }
            $product["product_image"] = $image;
        } else {
            $product["product_image"] = $_POST["cur_img"];
        }

        $edit_product_tags = array();
        foreach ($_POST["product_tags"] as $product_tag) {
            $edit_product_tags[] = $product_tag;
        }

        if (empty($edit_product_tags)) {
            $edit_product_tags = "";
        }

        $product["product_title"] = $this->request->getPost("product_title");
        $product["product_url"] = $this->url($this->request->getPost("product_title"));
        $product["product_short_des"] = $this->request->getPost("product_short_des");
        $product["product_description"] = $this->request->getPost("description");
        $product["tax_included"] = $this->request->getPost("tax_included");
        $product["product_price"] = $this->request->getPost("product_price");
        $product["product_mrp"] = $this->request->getPost("product_mrp");
        $product["product_quantity"] = $this->request->getPost("product_quantity");
        $product["product_category"] = $this->request->getPost("product_category");
        $product["product_brand"] = $this->request->getPost("product_brand");
        $product["in_trending"] = $this->request->getPost("in_trending");
        $product["product_tags"] = json_encode($edit_product_tags);
        // $this->session->set_flashdata("alert_success", "Record updated");
        $this->common_model->common_update("tbl_product", $product, array("product_id" => $this->request->getPost("product_id")));
        return redirect()->to("dashboard/products?category=" . $this->request->getPost("product_category"));
    }

    public function deleteProduct($product_id = '', $category_id = '') {
        $this->common_model->common_delete("tbl_product", array("product_id" => $product_id));
        // $this->session->set_flashdata("alert_danger", "Record deleted");
        return redirect()->to("dashboard/products?category=" . $category_id);
    }

    public function orders($page = '', $order_by = null) {
        if (empty($page)) {
            $page = 0;
        }
        $this->data["page_name"] = "orders";
        $this->data['orders'] = $this->common_model->common_query_all("select orders.*, user.name as 'user_name',user.phone from orders inner join user on orders.user_id = user.id");
        return view('admin/orders', $this->data);
    }

    public function orderDetail($order_no = '') {
        $this->data["order_details"] = $this->common_model->common_get_one("orders", array("order_no" => $order_no));
        $this->data["customer_info"] = $this->common_model->common_get_one("shipping_address", array("user_id" => $this->data["order_details"]["user_id"]));
        $this->data["order_item_details"] = $this->common_model->common_get_all("order_items", array("order_no" => $order_no));
        return view('admin/order_items', $this->data);
    }

    public function addTrackingAction() {
        $record = array();
        $record["courier_name"] = $this->request->getPost("courier_name");
        $record["tracking_id"] = $this->request->getPost("tracking_id");

        $this->common_model->common_update("orders", $record, array("order_no" => $this->request->getPost("order_no")));

        return redirect()->to("dashboard/orders");
    }
    
     public function orderUpdatesAction() {
        $record = array();
        $record["merchant_status"] = $this->request->getPost("merchant_status");
       

        $this->common_model->common_update("orders", $record, array("order_no" => $this->request->getPost("order_no")));

        return redirect()->to("dashboard/orders");
    }

    public function getProductInfo($id) {

        return $this->common_model->common_get_one("tbl_product", array("product_id" => $id));
    }

    public function discounts() {

        $this->data["page_name"] = "discounts";
        $this->data['discountCodes'] = $this->common_model->common_get_all_nc("discount_codes");
        return view('admin/discounts', $this->data);
    }

    public function addDiscount() {
        $record = array();
        $record["code"] = $this->request->getPost("code");
        $record["type"] = $this->request->getPost("type");
        $record["amount"] = $this->request->getPost("amount");
        $record["valid_from_date"] = strtotime($this->request->getPost("valid_from_date"));
        $record["valid_to_date"] = strtotime($this->request->getPost("valid_to_date"));
        $record["status"] = 1;

        $this->common_model->common_insert("discount_codes", $record);
        return redirect()->to("dashboard/discounts");
    }

    public function updateDiscount() {
        $record = array();

        $record["amount"] = $this->request->getPost("amount");
        $record["cart_value"] = $this->request->getPost("cart_value");
        $record["valid_to_date"] = strtotime($this->request->getPost("valid_to_date"));
        $record["status"] = 1;

        $this->common_model->common_update("discount_codes", $record, array("id"));
        return redirect()->to("dashboard/discounts");
    }

    public function deleteDiscount($id = '') {
        $this->common_model->common_delete("discount_codes", array("id" => $id));
        return redirect()->to("dashboard/discounts");
    }

    public function pages() {
        $this->data["pages"] = $this->common_model->common_get_all_nc("content");
        return view('admin/pages', $this->data);
    }

    public function add_page() {
        return view('admin/add_page', $this->data);
    }

    public function add_page_action() {
        $content = array();
        $content["col_id"] = $this->request->getPost("col_id");
        $content["row_id"] = $this->request->getPost("row_id");
        $content["custom_url"] = $this->url($this->request->getPost("heading"));
        $content["target"] = $this->request->getPost("target");
        $content["heading"] = $this->request->getPost("heading");
        $content["introtext"] = $this->request->getPost("introtext");
        $content["seo_data"] = $this->request->getPost("seo_data");
        $this->common_model->common_insert("content", $content);
        return redirect()->to("dashboard/pages");
    }

    public function edit_page() {
        $this->data["page"] = $this->common_model->common_get_one("content", array("id" => $this->request->getGet("id")));
        return view('admin/edit_page', $this->data);
    }

    public function edit_page_action() {
        $content = array();
        $content["col_id"] = $this->request->getPost("col_id");
        $content["row_id"] = $this->request->getPost("row_id");
        $content["custom_url"] = $this->url($this->request->getPost("heading"));
        $content["target"] = $this->request->getPost("target");
        $content["heading"] = $this->request->getPost("heading");
        $content["introtext"] = $this->request->getPost("introtext");
        $content["seo_data"] = $this->request->getPost("seo_data");
        $this->common_model->common_update("content", $content, array("id" => $this->request->getPost("page_id")));
        return redirect()->to("dashboard/pages");
    }

    public function delete_page() {
        $id = $this->request->getGet("id");
        $this->common_model->common_delete("content", array("id" => $id));
        return redirect()->to("dashboard/pages");
    }

    public function users() {
        $this->data["users"] = $this->common_model->common_get_all("user", array("user_type" => 0));
        return view('admin/users', $this->data);
    }

    public function sellers() {
        $this->data["sellers"] = $this->common_model->common_get_all("user", array("user_type" => 1, "activation" => 1));
        return view('admin/sellers', $this->data);
    }

    public function reviewSeller($user_id = '') {
        $this->data["seller_detail"] = $this->common_model->common_get_one("user", array("id" => $user_id));
        return view('admin/seller_review', $this->data);
    }

    public function reviewSellerAction() {
        $this->common_model->common_update("user", array("seller_activation" => $this->request->getPost("status")), array("id" => $this->request->getPost("user_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/sellers");
    }

    public function professionals() {
        $this->data["professionals"] = $this->common_model->common_get_all("user", array("user_type" => 2));
        return view('admin/professionals', $this->data);
    }

    public function reviewProfessional($user_id = '') {
        $this->data["professional_detail"] = $this->common_model->common_get_one("user", array("id" => $user_id));
        return view('admin/professional_review', $this->data);
    }

    public function reviewProfessionalAction() {
        $this->common_model->common_update("user", array("professional_activation" => $this->request->getPost("status")), array("id" => $this->request->getPost("user_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/professionals");
    }

    public function partner() {
        $this->data["page_name"] = "brand";
        $this->data["parnters"] = $this->common_model->common_get_all_nc("partners");
        return view('admin/partner', $this->data);
    }

    public function addPartnerAction() {
        $result = $this->common_model->common_get_one("partners", array("partner_name" => $this->request->getPost("partner_name")));
        if (!isset($result["id"])) {
            $records = array();
            $records["partner_name"] = $this->request->getPost("partner_name");


            $this->common_model->common_insert("partners", $records);

            // $this->session->set_flashdata("alert_success", "Record Inserted");
        } else {
            // $this->session->set_flashdata("alert_danger", "Record already exist");
        }
        return redirect()->to("dashboard/partner");
    }

    public function deletePartner($id = '') {
        if (!empty($id)) {
            $this->common_model->common_delete("partner", array("id" => $id));
            // $this->session->set_flashdata("alert_danger", "Record deleted");
        }
        return redirect()->to("dashboard/partner");
    }

    public function editPartnerAction() {
        $records = array();
        $records["partner_name"] = $this->request->getPost("partner_name");


        $this->common_model->common_update("partners", $records, array("id" => $this->request->getPost("partner_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/partner");
    }

    public function tags() {
        $this->data["page_name"] = "tag";
        $this->data["tags"] = $this->common_model->common_get_all_nc("tags");
        return view('admin/tags', $this->data);
    }

    public function addTagAction() {
        $result = $this->common_model->common_get_one("tags", array("tag_name" => $this->request->getPost("tag_name")));
        if (!isset($result["id"])) {
            $records = array();
            $records["tag_name"] = $this->request->getPost("tag_name");
            $records["url"] = $this->url($this->request->getPost("tag_name"));

            $this->common_model->common_insert("tags", $records);

            // $this->session->set_flashdata("alert_success", "Record Inserted");
        } else {
            // $this->session->set_flashdata("alert_danger", "Record already exist");
        }
        return redirect()->to("dashboard/tags");
    }

    public function deleteTag($id = '') {
        if (!empty($id)) {
            $this->common_model->common_delete("tags", array("id" => $id));
            // $this->session->set_flashdata("alert_danger", "Record deleted");
        }
        return redirect()->to("dashboard/tags");
    }

    public function editTagAction() {
        $records = array();
        $records["tag_name"] = $this->request->getPost("tag_name");
        $records["url"] = $this->url($this->request->getPost("tag_name"));

        $this->common_model->common_update("tags", $records, array("id" => $this->request->getPost("tag_id")));
        // $this->session->set_flashdata("alert_success", "Record updated");
        return redirect()->to("dashboard/tags");
    }

    function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background = false) {
        list($original_width, $original_height, $original_type) = getimagesize($filepath);
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);
        if ($original_type === 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        } else if ($original_type === 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } else if ($original_type === 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        } else {
            return false;
        }
        $old_image = $imgcreatefrom($filepath);
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); // creates new image, but with a black background
        // figuring out the color for the background
        if (is_array($background) && count($background) === 3) {
            list($red, $green, $blue) = $background;
            $color = imagecolorallocate($new_image, $red, $green, $blue);
            imagefill($new_image, 0, 0, $color);
            // apply transparent background only if is a png image
        } else if ($background === 'transparent' && $original_type === 3) {
            imagesavealpha($new_image, TRUE);
            $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagefill($new_image, 0, 0, $color);
        }
        imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        $imgt($new_image, $thumbpath);
        return file_exists($thumbpath);
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to("admin/login");
    }

}
