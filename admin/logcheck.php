<?php
// Server name must be localhost 
$servername = "localhost"; 
  
// In my case, user name will be root 
$username = "root"; 
  
// Password is empty 
$password = ""; 
$conn = new mysqli($servername,  
$username, $password); 
echo "helo";
// Check connection 
if ($conn->connect_error) { 
    die("Connection failure: " 
        . $conn->connect_error); 
}  
?>