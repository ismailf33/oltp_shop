<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Customer{
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
public function customerSignup($post){
$name = $this->fm->validation($post['name']);
$adress = $this->fm->validation($post['adress']);
$city = $this->fm->validation($post['city']);
$country = $this->fm->validation($post['country']);
$zip = $this->fm->validation($post['zip']);
$phone = $this->fm->validation($post['phone']);
$email = $this->fm->validation($post['email']);
$password = md5($this->fm->validation($post['password']));
//mysqli validation
$name = mysqli_real_escape_string($this->db->link , $name);
$adress = mysqli_real_escape_string($this->db->link , $adress);  
$city = mysqli_real_escape_string($this->db->link , $city);  
$country = mysqli_real_escape_string($this->db->link , $country);  
$zip = mysqli_real_escape_string($this->db->link , $zip);  
$phone = mysqli_real_escape_string($this->db->link , $phone);
$email = mysqli_real_escape_string($this->db->link , $email);  
$password = mysqli_real_escape_string($this->db->link , $password); 
$cquery = "SELECT * FROM tbl_customer WHERE email='$email' ";
$cresult = $this->db->insert($cquery)->fetch_assoc();
if($name == "" || $adress == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $password == ""  ){
        $msg = "<span class='error'>Field must not be empty !</span>";
        return $msg;
    }else if($cresult != false){
        $msg = "<span class='error'>Email id already Exist!</span>";
        return $msg;
    }else{
        $query  = "INSERT INTO  tbl_customer(name ,adress , city, country, zip, phone, email, password) 
        Values('$name','$adress','$city','$country','$zip','$phone' ,'$email', '$password' )";
        $result = $this->db->insert($query);
        if($result){
            $msg = "<span class='success'>Registrition Successfully .</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Registrition  Not Successfully  !</span>";
            return $msg;
        }
    } 
  
} 
public function customerLogin($data){
//mysqli validation
$email = mysqli_real_escape_string($this->db->link , $data['email']);
$password = mysqli_real_escape_string($this->db->link , md5($data['password']));
$query = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
        $chk_result = $this->db->select($query);
if($email =="" || $email ==""){
        $msg = "<span class='error'>Field must not be empty !</span>";
        return $msg;
}else if($chk_result == true){
        $value = $chk_result->fetch_assoc();
        Session::set("cmrlogin" , true);
        Session::set("cmrId" , $value['id']);
        Session::set("cmrName" , $value['name']);
        Session::set("cmrEmail" , $value['email']);
        header("location:order.php");
        }else{
        $msg = "<span class='error'>Email or Password not match !</span>";
        return $msg;     
        } 
}  
public function cus_profile($id){
    $query = "SELECT * FROM  tbl_customer WHERE id='$id'";
    $result = $this->db->select($query);
    return $result;
}
//end brackets
}