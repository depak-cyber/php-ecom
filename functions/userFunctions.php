<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

session_start();
include('config.php');
//include('functions/authcode.php');


function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);

}
function getIdActive($table, $id){
    global $con;
    $query= "SELECT * FROM $table where id= '$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getSlugActive($table, $slug){
    global $con;
    $query= "SELECT * FROM $table where slug= '$slug' AND status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
}
function getProdByCategory($category_id){
    global $con;
    $query = "SELECT * FROM products 
    WHERE category_id=$category_id AND status='0'";
    return $query_run = mysqli_query($con, $query);

}
function getCartItems(){
   global $con;
  // $userid= $_SESSION['auth_user']['user_id'];
  $user_id = $_SESSION['auth_user']['user_id'];
  
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
    FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$user_id' 
 ORDER BY c.id DESC";

    return $query_run= mysqli_query($con, $query);
}
function getOrders(){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query= "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC";
    return $query_run= mysqli_query($con, $query);
}
function checkTrackingNoValid($trakingNo){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query= "SELECT * FROM orders WHERE tracking_no='$trakingNo' AND user_id='$user_id'";
    return  mysqli_query($con, $query);

}
function getAllTrending(){
    global $con;
    $query ="SELECT * FROM products WHERE trending='1' ";
    return  mysqli_query($con, $query);
}
?>