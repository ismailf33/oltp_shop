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
public function add_Product($_post , $_file){
$productName= $this->fm->validation($_post['productName']);
$catId = $this->fm->validation($_post['catId']);
$brandId = $this->fm->validation($_post['brandId']);
$body = $this->fm->validation($_post['body']);
$price = $this->fm->validation($_post['price']);
$type = $this->fm->validation($_post['type']);
//mysqli_part
$productName = mysqli_real_escape_string($this->db->link , $productName);
$catId = mysqli_real_escape_string($this->db->link , $catId);
$brandId = mysqli_real_escape_string($this->db->link , $brandId);
$body = mysqli_real_escape_string($this->db->link , $body);
$price = mysqli_real_escape_string($this->db->link , $price);
$type = mysqli_real_escape_string($this->db->link , $type);
//image validation
$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_file['image']['name'];
$file_size = $_file['image']['size'];
$file_temp = $_file['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "upload/".$unique_image;
if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" ){
    $msg = "<span class='error'>Field must not be empty !</span>";
    return $msg;
}
else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query  = "INSERT INTO tbl_product(productName ,catId ,brandId, body, price, image, type) Values('$productName','$catId','$brandId','$body','$price','$uploaded_image' ,'$type')";
    $result = $this->db->insert($query);
    if($result){
    $msg = "<span class='success'>Product Inserted Successfully .</span>";
    return $msg;
    }else{
    $msg = "<span class='error'> Product Not Inserted !</span>";
    return $msg;   
    }    
    }
}
//end brackets  
}
