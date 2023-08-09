<?php 
include('includes/header.php');

include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h2>Admin</h2>
         <div class="card">
            <div class="card-header"><h4>Product</h4></div>
            <div class="card-body">
                <table class="table table-boardered table-striped">
                    <thead>
                        <tr>
                           <th>ID</th> 
                           <th>Name</th> 
                           <th>Image</th> 
                           <th>Status</th> 
                           <th>Action</th> 
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $product= getAll("products");
                          if(mysqli_num_rows($product) > 0)
                          {
                            foreach($product as $item)
                            {
                               ?> 
                               <tr>
                                 <td><?= $item['id']; ?></td>
                                 <td><?= $item['name']; ?></td>
                                 
                                 <td>
                                    <img src="../uploads/<?= $item['image']; ?>" height='50px' width='50px' alt="<?= $item['name']; ?>"> 
                                </td>
                                <td><?= $item['status']=='0'?'visible': 'hidden'; ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="code.php" method="POST">
                                      <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                       <button type="submit" class="btn btn-sm btn-danger" name="delete_product_btn">Delete</button>
                                    
                                   </form>
                                </td>
                                </tr>
                               <?php
                            }

                          }
                          else{
                            echo 'No records found';
                          }
                        ?>  
                    </tbody>

                </table>
            </div>
         </div>
  
    </div>
    </div>


</div>

<?php include('includes/footer.php');?>





