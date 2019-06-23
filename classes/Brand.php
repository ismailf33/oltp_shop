<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Brand{
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
//Add brand name
public function add_brand($brandName){
$brandName = $this->fm->validation($brandName);
$brandName = mysqli_real_escape_string($this->db->link , $brandName);
if($brandName == ""){
    $msg = "Category must not be empty .";
    return $msg;
}else{
    $query  = "INSERT INTO  tbl_brand(brandName) Values('$brandName')";
    $result = $this->db->insert($query); 
    if($result){
    $msg = "<span class='success'>Brand Name Inserted Successfully .</span>";
    return $msg;
    }else{
    $msg = "Brand Name Inserted .";
    return $msg;   
    }    
    }
}
//Select brand list
public function Brand_list(){
        $query  = "SELECT * FROM tbl_brand";
        $result = $this->db->select($query); 
        return $result;         
    }
//delete brand name
public function Brand_del($delid){
    $query  = "DELETE FROM tbl_brand WHERE 	brandId='$delid' ";
    $result = $this->db->delete($query); 
    if($result){
        $msg = "<span class='success'>Brand name Deleted successfully !</span>";
        return $msg;
    }        
}
//edit brand name
public function Brand_edit($braedit){
    $query  = "SELECT * FROM tbl_brand WHERE brandId='$braedit'";
    $result = $this->db->select($query); 
    return $result;         
}
//update brand name
public function update_Brand($brandName ,$braedit){
$brandName = $this->fm->validation($brandName);
$brandName = mysqli_real_escape_string($this->db->link , $brandName);
if($brandName == ""){
    $msg = "<span class='error'>Brand name  must not be empty !</span>";
    return $msg;
}else{
    $query  = "UPDATE  tbl_brand 
    SET brandName = '$brandName'
    WHERE brandId = '$braedit' ";
    $result = $this->db->update($query); 
     if($result){
        $msg = "<span class='success'>Brand name Updated successfully !</span>";
        return $msg;  
     }else{
        $msg = "<span class='error'>Brand name  Not Updated !</span>";
        return $msg; 
     }

     }   
}
//end brackets  
}
