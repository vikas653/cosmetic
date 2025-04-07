<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model {

    protected $db;

    public function __construct() {
        $this->db = db_connect();
    }

    //*********************** Common Methods **************************//

    public function common_insert($table_name, $data) {
        $this->db->table($table_name)->insert($data);
        return $this->db->insertID();
    }

    public function common_update($table_name, $data, $condition) {
        return $this->db->table($table_name)->update($data, $condition);
    }

    public function common_delete($table_name, $condition) {
        return $this->db->table($table_name)->delete($condition);
    }

    public function check_exist($table_name, $condition) {
        $result = $this->db->get_where($table_name, $condition)->num_rows();
        if ($result == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function common_get_one($table_name, $condition) {
        $query = $this->db->table($table_name)->where($condition)->get();
        return $query->getRowArray();
    }

    public function common_get_all($table_name, $condition) {
        $query = $this->db->table($table_name)->where($condition)->get();
        return $query->getResultArray();
    }

    public function common_get_all_nc($table_name) {
        $query = $this->db->table($table_name)->get();
        return $query->getResultArray();
    }

    public function getCategories($table_name) {
        $query = $this->db->query("select * from $table_name order by parent_id asc")->getResultArray();
        return $query;
    }

    public function common_num_rows($table_name) {
        $query = $this->db->table($table_name)->get();
        return $query->getNumRows();
    }

    public function common_condition_num_rows($table_name, $condition) {
        $query = $this->db->table($table_name)->where($condition)->get();
        return $query->getNumRows();
    }

    public function common_query_all($query) {
        $query = $this->db->query($query)->getResultArray();
        return $query;
    }

    public function common_query_one($query) {
        $query = $this->db->query($query)->getRowArray();
        return $query;
    }

    public function get_products_by_category($table, $category_id, $start, $limit) {
        return $this->db->query("select * from " . $table . " where category_id='$category_id' limit $start, $limit")->getResultArray();
    }

    public function get_products_main_category($id, $start, $limit) {
        return $this->db->query("select products.* from products inner join categories on products.category_id = categories.id where categories.parent_id = '" . $id . "' limit $start, $limit")->getResultArray();
    }

    public function common_query_get_last($table, $field) {
        $query = $this->db->query("select * from " . $table . " order by " . $field . " desc limit 1")->getRowArray();
        return $query;
    }

    public function common_query_num_rows($query) {
        $query = $this->db->query($query)->getNumRows();
        return $query;
    }


    // public function get_product_price($id) {
    //     $query = $this->db->get_where("tbl_product", array("product_id" => $id));
    //     return $query->row_array();
    // }


}
?>