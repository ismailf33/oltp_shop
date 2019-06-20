<?php
class query{
    public function addCategory($catName){
    $query  = "INSERT INTO tbl_category(catName) Values('$catName')";  // 
}
public function Category_list(){
        $query  = "SELECT * FROM tbl_category";  //             
    }
public function Category_delete($delid){
    $query  = "DELETE FROM tbl_category WHERE catId='$delid' "; //
}
public function Category_list($editid){ //By id
    $query  = "SELECT * FROM tbl_category WHERE catId='$editid'"; //       
}
public function update_Category($catName,$editid){
    $query  = "UPDATE  tbl_category 
    SET catName = '$catName'
    WHERE catId = '$editid' "; // 
}
//end 
}