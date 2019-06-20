<?php
include_once "../lib/Database.php";
include_once "../helpers/Format.php";

class Category{
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
public function addCategory($catName){
$catName = $this->fm->validation($catName);
$catName = mysqli_real_escape_string($this->db->link , $catName);
if($catName == ""){
    $catadd_msg = "Category must not be empty .";
    return $catadd_msg;
}else{
    $query  = "INSERT INTO tbl_category(catName) Values('$catName')";
    $result = $this->db->insert($query); 
    if($result){
    $catadd_msg = "Category Inserted Successfully .";
    return $catadd_msg;
    }else{
    $catadd_msg = "Category Not Inserted .";
    return $catadd_msg;   
            }    
        }
    }
}
