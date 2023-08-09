<?php

error_reporting(0);
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL & ~E_NOTICE);

include('../middleware/adminMiddleware.php');

include('includes/header.php');


?>

<div class="py-5">
    <div class="container">
        
            <div class="row ">
                <div class="col-md-12">
                <div class="card-header bg-secondary">
                    <h5 class="text-white fs-4">Orders
                     <a href="order-history.php" clas="btn btn-warning float-end ">Order history</a>
                       </h5>
                    <a href="index.php" class="btn btn-primary float-end"><i class="fa fa-reply"></i>back</a>
                   </div>
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Tracking No.</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                      

                                

                            
                    <?php
                   $orders= getAllOrders();

                   if(mysqli_num_rows($orders)>0) 
                   {
                    foreach($orders as $item) 
                    {
                        ?>
                         <tr>
                            <td><?=$item['id']; ?></td>
                            <td><?=$item['name']; ?></td>
                            <td><?=$item['tracking_no']; ?></td>
                            <td><?=$item['total_price']; ?></td>
                            <td><?=$item['created_at']; ?></td>
                            <td>
                                <a href="view-order.php?t=<?=$item['tracking_no']; ?>" class="btn btn-success">View details</a>
                            </td>
                         </tr>
                        <?php

                    }


                   }
                   else{
                    ?>
                    <tr>
                            <td colspan="5">No oders yet</td>
                            
                         </tr>
                    <?php
                   }
                    ?>
                    </tbody>
                </table> 
                </div>
                
              
        </div>
    </div>





</div>

<?php include('includes/footer.php'); ?>