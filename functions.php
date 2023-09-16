<?php session_start();

 // للاتصال بقواعد البيانات
   function Connect(){
    $conn = mysqli_connect('localhost', 'root', '','shamil_db');
    return $conn;
   }
 // تنفيذ الاستعلام
  function dbQuery($sql){
    $result = mysqli_query(Connect(), $sql);
    return $result;
  }
  // استرجاع للبيانات من الجدول وتخزينها في مصفوفة
     function dbFetchArray($result, $resultType='MYSQLI_NUM')
     {
       return mysqli_fetch_array($result);
     }

     function dbNumRows($result){
      return mysqli_num_rows($result);
     }
     function doLogin(){
      $errorMessage = "";
      $username = $_POST['txtUserName'];
      $password = $_POST['txtPassword'];
      if($username == "" && $password == ""){
        $errorMessage = "الرجاء ادخال اسم المستخدم أو كلمة المرور";
      }else{
        $sql = "Select id from accounts_tbl  where login='$username' and password='$password'";
        $rs = dbQuery($sql);
        if(dbNumRows($rs) > 0){
         $row = dbFetchArray($rs);
         $_SESSION['id'] = $row[0];
         $_SESSION['name'] = $username;
         header('location:index.php');
        }else{
          $errorMessage = "الرجاء التأكد من اسم المستخدم أو كلمة المرور";
        }
      }
      return $errorMessage;
     }

     function CheckUser(){
      if(!isset($_SESSION['id'])){
        header('location:login.php');
        exit();
      }
     }
?>