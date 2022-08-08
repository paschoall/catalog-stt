<?php
	include_once "../../database_credentials.php";
   include_once "../../defines.php";
   session_start();

   $email = $_POST['email'];

   $conn = mysqli_connect($hostname, $username, $password, $database);
   // $mysqli = new mysqli($hostname, $username , $password , $database);

   $result_user = "SELECT NOME FROM USUARIO WHERE EMAIL = '$email'";
   $resultado_user = mysqli_query($conn, $result_user);

   if(($resultado_user) AND ($resultado_user->num_rows == 1)){
      echo true;
   }else{
      echo false;
   }
?>