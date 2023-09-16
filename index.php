<?php  include "functions.php"; 
 CheckUser(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Document</title>
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
<div><a href="logout.php">تسجيل خروج</a></div>

  <div><a href="add.php"><i class="fa fa-plus-square" aria-hidden="true"></i>
</a></div>
<table class="table table-hover">
  <thead>
  <tr class="table-info">
      <th scope="col">الاجراء</th>
      <th scope="col">تاريخ الاضافة </th>
      <th scope="col">صورة المستخدم</th>
      <th scope="col">البريد الالكتروني</th>
      <th scope="col">اسم المستخدم</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  
  <tbody>
  
    <?php 
    
     $sql = "SELECT * FROM `users_tbl`";
     $rs = dbQuery($sql);
     while($row=dbFetchArray($rs)){
    ?>
    <tr>
    <td><a href="edit.php?id=<?= $row[0];  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>|<a href="delete.php?id=<?= $row[0];  ?>&img=<?= $row[4] ?>" onclick="return confirm('هل تريد بالتأكيد حذف هذا المستخدم؟')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      <td><?= $row[4] ?></td>
      <td><img src="assets/images/<?= $row[3] ?>" class="img-thumbnail"  width="125" height="125"></td>
       <td><?= $row[2] ?></td>
       <td><?= $row[1] ?></td>
       <td><?= $row[0] ?></td>
    </td>
    <?php } ?>
    <tr class="table-info">
      <th colspan="5">عدد الصفوف</th>
      <th><?= dbNumRows($rs); ?></th>
  
    </tr>
  </tbody>
</table>

<tfoot>
<table class="table table">
<tr class="table-info">
<th scope="col">الاجراء</th>
      <th scope="col">تاريخ الاضافة </th>
      <th scope="col">صورة المستخدم</th>
      <th scope="col">البريد الالكتروني</th>
      <th scope="col">اسم المستخدم</th>
      <th scope="col">#</th>
    </tr>
</tfoot>
</body>
</html>
 
