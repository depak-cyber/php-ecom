<style>
    input.transparent-input{
       background-color:#FFF;
       border:none !important;
    }
</style>

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
            <a href="checkout.php" class='text-white'>
                Checkout
        </h6>
        </a>

    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
            <form action="functions/placeorder.php" method="POST">
            <div class="row ">
                <div class="col-md-7">
                    <h5>Basic details</h5>
                    <hr>
                    <div class='row'>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" id="name" required placeholder= "Type your name" class="form-control transparent-input">
                            <small class="text-danger name"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">E-mail</label>
                            <input type="email" name="email" id="email" required placeholder= "Type your email" class="form-control">
                            <small class="text-danger email"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Phone</label>
                            <input type="text" name="phone" id="phone" required placeholder= "Type your phone" class="form-control">
                            <small class="text-danger phone"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Pin code</label>
                            <input type="text" name="pincode" id="pincode" required  placeholder= "Type your pincode" class="form-control">
                            <small class="text-danger pincode"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Address</label>
                            <textarea type="text" name="address"  id="address" required placeholder= "Type your address" class="form-control" row="5"></textarea>
                            <small class="text-danger address"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">



                    <div class="row align-items-center">
                        <div class="col-md-2 ">
                            <h7>Image</h7>
                        </div>
                        <div class="col-md-2">
                            <h7>Product</h7>
                        </div>

                        <div class="col-md-2">
                            <h7>Price</h7>
                        </div>
                        <div class="col-md-2">
                            <h7>Quantity</h7>
                        </div>
                        
                    </div>

                    <br>


                    <div id="mycart">

                        <?php $items = getCartItems();

                        $totalPrice=0;




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
                                            <?= $citem['prod_qty'] ?>
                                        </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>
                                            $
                                            <?= $citem['selling_price'] ?>
                                        </h5>
                                    </div>
                                   


                                </div>

                            </div>

                            <?php
                            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];

                        }
                        ?>
                        <hr>
                        <h5>Total price: <span class="float-end">$<?= $totalPrice ?></span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" name="placeOrderBtn" class="btn btn-primary">Confirm</button>
                        <div id="paypal-button-container"></div>
                    </div>
                    </div>
                   
                
                </div>
            </div>
            </form>
        </div>
        
        </div>
    </div>





</div>

<?php include('includes/footer.php'); ?>

<script src="https://www.paypal.com/sdk/js?client-id=ATRQ4XEP6BYdmUXAsLfJ4Yp7_K6_CSUkPc9rJAhEh1pdD29pwUZAZPkI3mf07qNSqvzMxygZVU4kfVi9&currency=USD"></script>

<script>
   
      paypal.Buttons({
        onClick(){
            var name=$('#name').val();
            var email=$('#email').val();
            var phone=$('#phone').val();
            var pincode=$('#pincode').val();
            var address=$('#address').val();


            if(name.length==0)
            {
               $('.name').text('*This is mandatory');
                
            }
            else{
                $('.name').text('');
            }
            if(email.length==0)
            {
               $('.email').text('*This is mandatory');
               
            }
            else{
                $('.email').text('');
            }
            if(phone.length==0)
            {
               $('.phone').text('*This is mandatory');
                
            }
            else{
                $('.phone').text('');
            }
            if(pincode.length==0)
            {
               $('.pincode').text('*This is mandatory');
                
            }
            else{
                $('.pincode').text('');
            }
            if(address.length==0)
            {
               $('.address').text('*This is mandatory');
                
            }
            else{
                $('.address').text('');
            }
            if(name.length ==0 || email.length==0 || phone.length==0 || pincode==0 || address==0){
                return false;
            }


        },
        // Order is created on the server and the order id is returned
        createOrder:(data, actions) => {
          return actions.order.create({
            purchase_units:[{
                amount:{
                    value:'0.1' //'<?= $totalPrice ?>'
                }
            }]
          });
        },
            
        onApprove: (data,actions) =>{
          return actions.order.capture().then(function(orderData){
           console.log('Capture result', orderData,JSON.stringify(orderData, null,2));
            const transaction =orderData.purchase_units[0].payments.capture[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            var name=$('#name').val();
            var email=$('#email').val();
            var phone=$('#phone').val();
            var pincode=$('#pincode').val();
            var address=$('#address').val();
            
            var data={
                'name':name,
                'email':email,
                'phone':phone,
                'pincode':pincode,
                'payment_mode':"paid by payPal",
                'payment_id':transaction.id,
                'placeOrderBtn': true
            }
            $.ajax({
                method: "POSt",
                url: "functions/placeorder.php",
                data: "data",
                
                success: function (response) {
                    if(response=200)
                    {
                       // echo "success";
                        window.location.href='my-orders.php';
                    }
                    
                }
            });

          })

        }
          
      }).render('#paypal-button-container');
    </script>