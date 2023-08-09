<?php
error_reporting(0);
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL & ~E_NOTICE);

include('includes/header.php');
include('functions/userFunctions.php');

include('authenticate.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class='text-white'>
            <a href="index.php" class='text-white'>
                Home/
            </a>
            <a href="cart.php" class='text-white'>
                Cart
        </h6>
        </a>

    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class=" card card-body ">
            <div class="row ">
                <div class="col-md-12">



                    <div class="row align-items-center">
                        <div class="col-md-2 ">
                            <h5>Image</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Product</h5>
                        </div>

                        <div class="col-md-2">
                            <h5>Price</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Quantity</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Action</h5>
                        </div>
                    </div>

                    <br>


                    <div id="mycart">

                        <?php $items = getCartItems();




                        foreach ($items as $citem) {

                            ?>
                            <div class="card product_data shadow-sm mb-3">


                                <div class="row align-items-center ">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width='80px'>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>
                                            <?= $citem['name'] ?>
                                        </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>
                                            $
                                            <?= $citem['selling_price'] ?>
                                        </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name='prodId' value='<?= $citem['prod_id'] ?>'>
                                        <div class="input-group mb-3 " style="width:130px">
                                            <button class="input-group-text  decrement-btn updateQty">-</button>

                                            <input type="text" class="form-control text-center input-qty bg-white"
                                                value="<?= $citem['prod_qty'] ?>" disabled>

                                            <button class="input-group-text increment-btn updateQty">+</button>

                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                            <i class="fa fa-trash "></i>Remove</button>

                                    </div>


                                </div>

                            </div>

                            <?php

                        }
                        ?>
                    </div>
                    <div class="float-end">
                        <a href="checkout.php" class= "btn btn-outline-primary">Checkout</a>
                    </div>
                
                </div>
            </div>
        </div>
    </div>





</div>

<?php include('includes/footer.php'); ?>