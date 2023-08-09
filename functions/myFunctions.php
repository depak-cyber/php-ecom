<?php
//session_start();
include('../config.php');
function getAll($table)
{
    global $con;
    $query= "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getById($table, $id)
{
    global $con;
    $query= "SELECT * FROM $table where id= '$id' ";
    return $query_run = mysqli_query($con, $query);
}
function getAllOrders(){
    global $con; 
    $query= "SELECT * FROM orders where status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trakingNo){
    global $con;
   

    $query= "SELECT * FROM orders WHERE tracking_no='$trakingNo' ";
    return  mysqli_query($con, $query);

}
function getOrdersHistory(){
    global $con;
    $query= "SELECT * FROM orders where status!='0' ";
    return $query_run = mysqli_query($con, $query);

}

function redirect ($url, $message)
{
    $_SESSION['message']= $message; 
   header('Location: '.$url);
    exit();
    
}
?>