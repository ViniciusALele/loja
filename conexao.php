<?php 
  // Create connection
  $conn = new mysqli("localhost", "root", "", "lojadovini");
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
?>