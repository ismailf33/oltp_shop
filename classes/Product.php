<?php
include_once "../lib/Database.php";
include_once "../helpers/Format.php";

class Product{
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
public function add_Product($_POST , $_FILES){
$productName= $this->fm->validation($_POST['productName']);
$catId = $this->fm->validation($_POST['catId']);
$brandId = $this->fm->validation($_POST['brandId']);
$body = $this->fm->validation($_POST['body']);
$price = $this->fm->validation($_POST['price']);
$type = $this->fm->validation($_POST['type']);
//mysqli_part
$productName = mysqli_real_escape_string($this->db->link , $productName);
$catId = mysqli_real_escape_string($this->db->link , $catId);
$brandId = mysqli_real_escape_string($this->db->link , $brandId);
$body = mysqli_real_escape_string($this->db->link , $body);
$price = mysqli_real_escape_string($this->db->link , $price);
$type = mysqli_real_escape_string($this->db->link , $type);
/*
if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" ){
    $msg = "Category must not be empty .";
    return $msg;
}else{
    $query  = "INSERT INTO tbl_category(catName) Values('$catName')";
    $result = $this->db->insert($query); 
    if($result){
    $catadd_msg = "<span class='success'>Category Inserted Successfully .</span>";
    return $catadd_msg;
    }else{
    $catadd_msg = "Category Not Inserted .";
    return $catadd_msg;   
    }    
    }
}
*/
//end brackets  
}
