<?php
$id=$_GET["id"];
$name_error = $email_error = $dd_error ='';
if (isset($_POST['btnEdit'])){
  $imgSrc=$_FILES['ImgSrc']['name'];
  $name=$_POST['un'];
  $email=$_POST['email'];
  $dd=$_POST['dd'];
  if(empty($name)){
    $name_error = 'Please Enter Your Name';
  }
  if(empty($email)){
    $email_error = 'Please Enter Your Email';
  }
  if(empty($dd)){
    $dd_error = 'Please Enter Your password';
  }
  if(empty($RePassword)){
    $RePassword_error = 'Please Enter Your RePassword';
  }

  if(!empty($name) & !empty($email) & !empty($dd) ){
    $file_name = rand(10000, 100000)."_".$imgSrc;
    move_uploaded_file($_FILES['ImgSrc']['tmp_name'], "assets/images/$file_name");
    include 'functions.php';
    if(empty($imgSrc)){
      $sql="UPDATE `users_tbl` set user_name ='$name',user_email='$email',creation_date='$dd' WHERE id = '$id'";
    }else{
    $sql="UPDATE `users_tbl` set user_name ='$name',user_email='$email',creation_date='$dd',user_image='$file_name' WHERE id = '$id'";}
      $re=dbQuery($sql);
      if($re){
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
      }else{
        echo "Error";
      }
  }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- Content here -->
  <div class="row">
       <div class="col-md-3">
          1 of 3
       </div>
       <div class="col-md-9 text-center">
         2 of 3
       </div>
       
   </div>
  <div class="row">
       <div class="col-md-3">
          1 of 3
       </div>
       <div class="col-md-6 text-center">
      
  
    <?php
     $unerror = $emailerror = $passerror ="";
    include "functions.php";
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM 	users_tbl WHERE id = $id";
    $res = dbQuery($sql1);
    $row = dbFetchArray($res);
   
    ?>
    <form action="" method="post" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" value ="<?= $row[1] ?>" class="form-control" name="un">
      <span class="text-danger"><?= $unerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" value ="<?= $row[2] ?>" class="form-control" name="email">
      <span class="text-danger"><?= $emailerror ?></span>
    </div>
  </div>
  
    
  </div>
  
  <div class="row mb-4">
  
  <label for="iamge" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
     <div>
       <?php
       if($row[3]==''){
       ?>
      <img src="assets/images/no-image.png" class="img-thumbnail"  width="125" height="125">
       <?php }else{ ?>
       <img src="assets/images/<?= $row[3] ?>" class="img-thumbnail"  width="125" height="125">

        <?php } ?>
     </div>
     <div class="clearfix">&nbsp; </div>
    <input type="file" name="ImgSrc" class="form-control">
    <input type="hidden" value="<?= $row[3] ?>" name="oldImg">
    </div>
    <div class="row mb-3">
  <label for="iamge" class="col-sm-2 col-form-label">Datetime</label>
    <div class="col-sm-10">
    <input type="datetime-local" value =<?= $row[4] ?>  class="form-control" name="dd">
    </div>
  </div>
    
  </div>
  <button type="submit" class="btn btn-primary" name="btnEdit">Edit data</button>
  <button type="button" onclick="document.location.href='index.php'" class="btn btn-danger">Cancle</button>
</form>
    
       </div>
       <div class="col-md-3">
         3 of 3
       </div>
   </div>
   
</div>
</body>
</html>