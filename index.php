<?php
//session_start();
//include('config/dbcon.php');
include('functions/userFunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>
<div class="py-5 bg-f2f2f2">
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h4>Trending Products</h4>
            <div class="underline mb-2"></div>
            <hr>
            <div class="row">
               <div class="owl-carousel">
           
            <?php
           $productsTrend = getAllTrending();
           if(mysqli_num_rows($productsTrend)) {
            foreach($productsTrend as $item){
                ?>
                <div class="item">
                    <a href='product-view.php?product=<?= $item['slug']; ?>'>
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="uploads/<?= $item['image']; ?>" alt="Image" class="w-150">
                        <h4 class='text-center'><?= $item['name']; ?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                  
                <?php

            }

           }

           ?>
          </div>
         </div>

     </div>
    </div>
</div>
</div>

<div class="py-5">
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h4>About us</h4>
            <div class="underline mb-2"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
                
            <br> </br>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>The choice of font and font size with which Lorem ipsum is reproduced answers to specific needs that go beyond the simple and simple filling of spaces dedicated to accepting real texts and allowing to have hands an advertising/publishing product, both web and paper, true to reality.</p>
          

     </div>
    </div>
</div>
</div>

<div class="py-5 bg-dark">
<div class="container">
    <div class="row ">
        <div class="col-md-5">
            <h4 class="text-white">E-shop</h4>
            <div class="underline mb-2"></div>
            <a href="index.php" class="text-white" ><i class="fa fa-anglr-right"></i>Home</a><br>
            <a href="#" class="text-white" ><i class="fa fa-anglr-right"></i>About us</a><br>
            <a href="cart.php" class="text-white" ><i class="fa fa-anglr-right"></i>My Cart</a><br>
            <a href="categories.php" class="text-white" ><i class="fa fa-anglr-right"></i>Our colllection</a><br>
            
           

     </div>
     <div class="col-md-4">
        <h4 class="text-white">Address</h4>
        <p class="text-white">
            4/24 Melbourne Street, Gosford,NSW, 2250
        </p>
        <a href="tel:+61424183105" class="text-white"><i class="fa fa-phone"></i>+61424183105</a><br>
        <a href="mailto:pantraj.deepak@gmail.com" class="text-white"><i class="fa fa-envelop"></i>pantraj.deepak@gmail.com</a>
     </div>
     <div class="col-md-3">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.372368434297!2d151.35050004065954!3d-33.439603897068515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b72b5672005af35%3A0xc4a2b23f243c74ff!2sUnit%204%2F28%20Melbourne%20St%2C%20East%20Gosford%20NSW%202250!5e0!3m2!1sen!2sau!4v1691458148850!5m2!1sen!2sau" class="w-200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
    </div>
</div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All right reserve.copyright@ <a href="https://www.linkedin.com/in/deepak-raj-pant/" target="_blank">deepak</a>-<?=date('Y')?></p>
    </div>
</div>
<?php include('includes/footer.php'); ?>

<script>
$(document).ready(function (){
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
})


</script>