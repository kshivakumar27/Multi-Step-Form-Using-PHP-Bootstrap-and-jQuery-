

<?php

$connect = new PDO("mysql:host=localhost;dbname=today4", "root", "");
$message = 'connected';
if(isset($_POST["email"]))
{
 sleep(5);
 $query = "
 INSERT INTO tbl_login 
 (fname, lname, email,phone,date,month,year,username, password) VALUES 
 (:fname, :lname, :email, :phone, :date, :month, :year,:username,:password)
 ";
 $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 $user_data = array(
  ':fname'  => $_POST["fname"],
  ':lname'  => $_POST["lname"],
  ':email'   => $_POST["email"],
  ':phone'   => $_POST["phone"],
  ':date'   => $_POST["date"],
  ':month'   => $_POST["month"],
  ':year'  => $_POST["year"],
  ':username'  => $_POST["username"],
':password'   => $password_hash

 );
 $statement = $connect->prepare($query);
 if($statement->execute($user_data))
 {
  $message = '
  <div class="alert alert-success">
  Registration Completed Successfully
  </div>
  ';
 }
 else
 {
  $message = '
  <div class="alert alert-success">
  There is an error in Registration
  </div>
  ';
 }
}
?>

