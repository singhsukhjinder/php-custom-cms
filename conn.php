<?php
  $conn = mysqli_connect('148.72.232.178:3306','rockstudyrock','2^2crUx5','rockstudy');
  //$conn = mysqli_connect('localhost','root','','rockstudy');
  if(!$conn) {
      echo $conn->connect_error;
  }
?>