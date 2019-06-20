<?php
class query{
    public function addCategory($catName){
    $query  = "INSERT INTO tbl_category(catName) Values('$catName')";   
}
/*
public function Category_list(){
        $query  = "SELECT * FROM tbl_category";               
    }

public function Category_del($delid){
    $query  = "DELETE FROM tbl_category WHERE catId='$delid' "; 
}
public function Category_edit($editid){
    $query  = "SELECT * FROM tbl_category WHERE catId='$editid'";
    $result = $this->db->select($query); 
    return $result;         
}

public function update_Category($catName,$editid){
$catName = $this->fm->validation($catName);
$catName = mysqli_real_escape_string($this->db->link , $catName);
if($catName == ""){
    $msg = "<span class='error'>Category must not be empty !</span>";
    return $msg;
}else{
    $query  = "UPDATE  tbl_category 
    SET catName = '$catName'
    WHERE catId = '$editid' ";
    $result = $this->db->update($query); 
     if($result){
        $msg = "<span class='error'>Category Updated successfully !</span>";
        return $msg;  
     }else{
        $msg = "<span class='error'>Category Not Updated !</span>";
        return $msg; 
     }

     }   
}
*/
//end 
}