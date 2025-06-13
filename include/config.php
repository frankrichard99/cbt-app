<?php 

  $hostname ='localhost';
  $username ='root';
  $password = '';
  $db_name = 'cbt-app';


  $conn = mysqli_connect($hostname, $username, $password, $db_name);

  // if($conn){
  //   echo "Connection successful";
  // }
  // else{
  //   echo "Error: ". mysqli_connect_error($conn);
  // }
?>