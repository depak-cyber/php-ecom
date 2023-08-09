<?php

session_start();
include('../config.php');
include('../functions/myFunctions.php');

if(isset($_POST['add_category_btn']))
{
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $image=$_FILES['image']['name'];
    $path="../uploads";
    $image_ext= pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $query = "INSERT INTO categories 
    (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES('$name','$slug',' $description', '$meta_title', 
    '$meta_description','$meta_keywords','$status','$popular', '$filename')";
     
     

     $query_run=mysqli_query($con, $query);
     
     if($query_run)
     {
       move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
       // redirect("add-category.php", 'successfully added');
       $_SESSION['message']="successfully added";
       header('Location: add-category.php');
     }
     else
     {
        //redirect("add-category.php", 'something wrong');
        $_SESSION['message']="something wrong";
        header('Location: add-category.php');
     }
}
else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $new_image=$_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "")
    {
      // $update_filename=$new_image;
      $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
      $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename=$old_image;
    }
    $path="../uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description',
    meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords',
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] !="")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "category updated!");
    }
}
else if(isset($_POST['delete_category_btn'])){
    $category_id=mysqli_real_escape_string($con, $_POST['category_id']);
    $delete_query= "DELETE FROM categories WHERE id='$category_id'"; 
    $delete_query_run=mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        //redirect("category.php", "Categories deleted");
        $_SESSION['message']="Categories deleted";
        header('Location: category.php');
    }
    else
    {
       // redirect("category.php", " something wrong");
       $_SESSION['message']="Went wrong";
        header('Location: category.php');

    }
}
else if(isset($_POST['add_product_btn'])){
    $category_id=$_POST['category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $small_description=$_POST['small_description'];
    $description=$_POST['description'];
    $original_price=$_POST['original_price'];
    $selling_price=$_POST['selling_price'];
    $qty=$_POST['qty'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $status=isset($_POST['status']) ? '1':'0';
    $trending=isset($_POST['trending']) ? '1':'0';

    $image=$_FILES['image']['name'];
    $path="../uploads";
    $image_ext= pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

   

        $product_query="INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,image) 
        VALUES
       
        ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title','$meta_description','$meta_keywords','$status','$trending','$filename')";
    
       $product_query_run=mysqli_query($con,$product_query);
       echo '<pre>';echo $product_query_run;
    
       if($product_query_run)
       {
         move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
         // redirect("add-category.php", 'successfully added');
         $_SESSION['message']="successfully added";
         header('Location: index.php');
       }
       else
       {
          //redirect("add-category.php", 'something wrong');
          $_SESSION['message']="something wrong";
          header('Location: add-product.php');
       }

   

  


}
else if(isset($_POST['update_order_btn'])){
    $track_no= $_POST['tracking_no'];
   
    $order_status= $_POST['order_status'];

    $updateOrder_query ="UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
    $updateOrder_query_run= mysqli_query($con, $updateOrder_query );

  //echo '<pre>';echo $updateOrder_query_run;echo exit;
    $_SESSION['message']="successfully updated";
    header("Location: view-order.php?t=$track_no");
  
 
    
} 

//else{
   // header("Location:../index.php");

  //}
?>