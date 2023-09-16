<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Record Page</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
   $user_nameerror = $user_emailerror = "";
    if(isset($_POST['btnSub'])){
        $user_image = $_FILES['ImgSrc']['name'];
        $user_name = $_POST['un'];
        $user_email = $_POST['email'];
        $dt = $_POST['dd'];
        if($user_name == ''){
         $user_nameerror = "Please Enter user_name";
        }
       if($user_email == ""){
            $user_emailerror = "Please Enter Your user_email";
       }
       if($dt == ""){
        $dterror = "Please Enter Your dt";
   }
   
    if(!empty($user_name) & !empty($user_email) & !empty($dt)){
   include "functions.php";
      $file_name = rand(10000, 100000)."-".$user_image;
     
      move_uploaded_file($_FILES['ImgSrc']['tmp_name'], "assets/images/$file_name");
      $sql = "INSERT INTO `users_tbl` (`user_name`, `user_email`, `user_image`) VALUES 
              ('$user_name','$user_email','$file_name')";
      $rs = dbQuery($sql);
      if($rs){
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
      }else{
        echo "Error";
      }
          }
     }
    ?>
<form action="" method="post" enctype="multipart/form-data">
<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="un">
      <span class="text-danger"><?= $user_nameerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email">
      <span class="text-danger"><?= $user_emailerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
  <label for="iamge" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
    <input type="file" name="ImgSrc" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
  <label for="iamge" class="col-sm-2 col-form-label">Datetime</label>
    <div class="col-sm-10">
    <input type="datetime-local" name="dd" class="form-control">
    <span class="text-danger"><?= @$dterror ?></span>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="btnSub">Add data</button>
    
</body>
</html>