<?php
include "../lib/Session.php";
Session::checkLogin();
include_once "../lib/Database.php";
include_once "../helpers/Format.php";

class Adminlogin{
    private $db;
    private $fm;
public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
} 
public function adminLogin($adminuser,$adminpass){
    $adminuser = $this->fm->validation($adminuser);
    $adminpass = md5($this->fm->validation($adminpass));
//my_sqli validation
$adminuser = mysqli_real_escape_string($this->db->link , $adminuser);
$adminpass = mysqli_real_escape_string($this->db->link , $adminpass);
if(empty($adminuser) || empty($adminuser)){
    $loginmsg = "Username or password must not be empty";
    return $loginmsg;
}else{
    $query  = "SELECT * FROM tbl_admin WHERE adminuser = '$adminuser' AND adminpass = '$adminpass'";
    $result = $this->db->select($query);
    if($result != false){
     $value = $result->fetch_assoc(); 
     Session::set("adminlogin" , true);
     Session::set("adminId" , $value['adminId']);
     Session::set("adminUser" , $value['adminUser']); //correction adminUser to adminName
     Session::set("adminName" , $value['adminName']);
     header("Location:dashbord.php");       
    }else{
        $loginmsg = "Username or password not match";
        return $loginmsg;
    }
}
}
//end brackets  
}
?>