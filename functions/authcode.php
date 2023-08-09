<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);


session_start();
include('../config.php');
include('functions/myFunctions.php');



if(isset($_POST['register_btn']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

                        
    $check_email_query ="SELECT email FROM users WHERE email= '$email'";
    $check_email_query_run = mysqli_query($con,$check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0)
    {
        
        $_SESSION['message']= "Email alredy exist";
        header('Location: ../register.php');
    }
    else
    {

 
    
    if($password== $cpassword)
    {
        //insert data
        
        $insert_query = "INSERT INTO users (name,phone,email,password) VALUES('$name','$phone','$email','$password')";
        
        $insert_query_run = mysqli_query($con,$insert_query);
    
        if($insert_query_run)
        {
            $_SESSION['message'] = "Registratation successful";
            header('Location: ../login.php');
        }
        else
        {
            $_SESSION['message'] = "Something went wrong!!!";
            header('Location: ../register.php');
        }
    }
    else
    {
    $_SESSION['message']= "Password do not match";
    header('Location: ../register.php');

    }
}

}
  else if(isset($_POST['login_btn']))
{
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $password=mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email= '$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run)>0)
    {
        $_SESSION['auth'] = true;

        $usedata = mysqli_fetch_array($login_query_run);
        $userid= $usedata['id'];
        $username = $usedata['name'];
        $useremail = $usedata['email'];
        $role_as = $usedata['role_as'];

        $_SESSION['auth_user']=
        [
            'user_id' =>$userid,
            'name' =>$username,
            'email' => $useremail
        ];

        /* define role */
        $_SESSION['role_as'] = $role_as;
        if($role_as == 1)
        {
            $_SESSION['message']= 'Welcome to dashboard';
            header('Location: ../admin/index.php');
        }
        else
        {
            $_SESSION['message'] = "You're logged in";
        header('Location: ../index.php');
        }

        
       
    }
    else
    {
        $_SESSION['message'] = 'Invalid credential';
        header('Location: ../login.php');
    }

}



?>