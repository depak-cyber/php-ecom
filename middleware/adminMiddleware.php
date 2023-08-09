<?php

include('../functions/myFunctions.php');

if(isset($_SESSION['auth']))
{
  if($_SESSION['role_as']!= 1)
  {
    //redirect("../index.php", "You are not authorized");
    $_SESSION['message']="You are not authorized";
    header('Location: ../index.php');
    
}
  }

else{
    //redirect("../login.php", "login to continue");
    $_SESSION['message']="login to continue";
   // header('Location: ../login.php');
}
?>