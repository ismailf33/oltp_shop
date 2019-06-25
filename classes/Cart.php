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
$equery = "SELECT * FROM  tbl_cart WHERE productId='$productId' AND sId='$sId'";
$eresult = $this->db->select($equery);
if($quantity<=0){
     $msg = "<span class='error'>please input positive valid quantity number ! </span>";
     return $msg;  
}else if($eresult){
       $uquery = "UPDATE tbl_cart
       SET
       quantity ='$quantity'
       WHERE productId='$productId' ";
       $result = $this->db->update($uquery);
       header("location:cart.php");
}else{
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
}
public function getcartproduct(){
       $sId = session_id();
       $query = "SELECT * FROM  tbl_cart WHERE sId='$sId' ";
       $result = $this->db->select($query);
       return $result;
       }
public function del_cart_item($id){
       $query = "DELETE  FROM  tbl_cart WHERE cartId='$id' ";
       $result = $this->db->delete($query);
       if($result){            
              $msg = "<span class='success'>Cart item deleted successfully !</span>";
              return $msg;
       }else{
              $msg = "<span class='success'>Cart item not deleted !</span>";
              return $msg;
       }
}
public function up_item_quantity($cartId,$quantity){
$cartId = $this->fm->validation($cartId);       
$quantity = $this->fm->validation($quantity);
//mysqli_part
$cartId = mysqli_real_escape_string($this->db->link , $cartId);
$quantity = mysqli_real_escape_string($this->db->link , $quantity);

if($quantity<=0){
       $msg = "<span class='error'>please input valid quantity number ! </span>";
       return $msg;  
  }else{
   $query = "UPDATE tbl_cart
   SET
   quantity ='$quantity'
   WHERE cartId='$cartId' ";
  $result = $this->db->update($query);
if($result){
       $msg = "<span class='success'>Cart item Updated successfully !</span>";
       return $msg;
}else{
       $msg = "<span class='success'>Cart item not updated !</span>";
       return $msg;
              }
      }
}

//end brackets
}
?>