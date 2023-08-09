<?php
  //$config['rewrite_short_tags'] = FALSE;
   $host ="localhost";
   $username = "root";
   $password= "";
   $database= "phpecom";

   //create database connection
   $con = mysqli_connect($host,$username,$password, $database);

   // check database connection
  if(!$con)

  {
    die("Connection Failed: ". mysqli_connect_error());
  }
  else 
  {
    //echo "Connected successfully";
  }


?>