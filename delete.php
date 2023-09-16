<?php
$id = $_GET['id'];
$img = $_GET['img'];
include "functions.php";
$sql = "DELETE FROM users_tbl WHERE id = $id";
$rs = dbQuery($sql);
if($rs){
  @unlink('assets/images/'.$img);
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
  }else{
    echo "Error";
  }