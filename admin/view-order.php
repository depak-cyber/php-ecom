<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

include('includes/header.php');

include('../middleware/adminMiddleware.php');

//include('functions/userFunctions.php');

//include('includes/header.php');
//include('authenticate.php');

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];
   $orderData= checkTrackingNoValid($tracking_no);

   if(mysqli_num_rows($orderData)< 0) 
   {
    ?>
    <h4>Something wrong</h4>
     <?php
     die();
   }
}else{
    ?>
   <h4>Something wrong</h4>
    <?php
    die();
}
$data=mysqli_fetch_array($orderData);
?>

<div class="py-5">
    <div class="container">
        
            <div class="row ">
                <div class="col-md-12">
                   <div class="card-header bg-secondary">
                    <span class="text-white fs-4">View order</span>
                    
                    <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>back</a>
                   </div>
                   <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delicery details</h4>
                            <hr>
                        <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Name</label>
                            <div class="border p-1">
                                <?= $data['name']; ?>
                            </div>
                            </div>
                            <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Email</label>
                            <div class="border p-1">
                                <?= $data['email']; ?>
                            </div>
                            </div>
                            <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Phone</label>
                            <div class="border p-1">
                                <?= $data['phone']; ?>
                            </div>
                            </div>
                            <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Tracking No</label>
                            <div class="border p-1">
                                <?= $data['tracking_no']; ?>
                            </div>
                            </div>
                            <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Address</label>
                            <div class="border p-1">
                                <?= $data['address']; ?>
                            </div>
                            </div>
                            <div class="col-md-12 mb-2">
                            <label class="fw-bold" for="">Code</label>
                            <div class="border p-1">
                                <?= $data['pincode']; ?>
                            </div>
                            </div>
                      </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th class="fw-bold">Product</th>
                                        <th class="fw-bold">Price</th>
                                        <th class="fw-bold">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    

                                    $order_query="SELECT o.id as oid, o.tracking_no,o.user_id, oi.*, oi.qty as orderqty, p.* 
                                    FROM orders o, order_items oi, products p WHERE  oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";

                                    $query_run= mysqli_query($con, $order_query);

                                    if(mysqli_num_rows($query_run)>0) 
                                    {
                                        foreach($query_run as $item) 
                                        {
                                            ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width="50px" height="50px">
                                                </td>
                                                <td class="align-middle">
                                                    <?= $item['price'];?>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $item['orderqty'];?>
                                                </td>
                                            </tr>

                                            <?php

                                        }
                                    }
                                ?>
                                
                           
                            </tbody>
                            </table>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?=$data['total_price']; ?></span></h5>

                            <hr>

                            <label class="fw-bold">Payment Mode</label>
                            <div class="border p-1 mb-3">
                            <?=$data['payment_mode']; ?>
                            </div>
                            <label class="fw-bold">Status</label>
                            <div class="mb-3">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tracking_no" value='<?=$data['tracking_no']; ?>'>
                                <select name="order_status"  id="" class="form-select">
                                    <option value="0" <?= $data['status'] == 0?"selected":"" ?>>Under Process</option>
                                    <option value="1" <?= $data['status'] == 1?"selected":"" ?>>Completed</option>
                                    <option value="2" <?= $data['status'] == 2?"selected":"" ?>>Cancelled</option>
                                    
                                </select>
                                <button type='submit' name="update_order_btn"class="btn btn-success mt-2">Update Status</button>
                                
                            </form>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
                
              
        </div>
    </div>





</div>

<?php include('includes/footer.php'); ?>