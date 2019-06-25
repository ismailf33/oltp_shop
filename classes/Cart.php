<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
ob_start(); /*it is working as a personal assistant who sent just important message */
class Cart{
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
public function add_cart($quantity ,$id){
$quantity = $this->fm->validation($quantity);
//mysqli_part
$quantity = mysqli_real_escape_string($this->db->link , $quantity);
$productId = mysqli_real_escape_string($this->db->link , $id);
$sId = session_id();
$squery = "SELECT * FROM  tbl_product WHERE productId='$productId'";
$result = $this->db->select($squery)->fetch_assoc();
$productName = $result['productName'];
$price = $result['price'];
$image = $result['image'];
$query = "INSERT INTO tbl_cart (sId, productId, productName, price, quantity, image) 
VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
$result =  $this->db->insert($query);
        if($result){
               header('Location: cart.php');
               // echo "<script>window.location = 'cart.php';</script>";
        }else{
               header('Location: 404.php');
               // echo "<script>window.location = '404.php';</script>";
        }
}

//end brackets
}
?>