<?php

include('includes/header.php');
include('functions/userFunctions.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class='text-white'>Home/Collection</h6>
    </div>
</div>
<div class="py-5">
<div class="container">
    <div class="row ">
        <div class="col-md-12">
        <div class="row ">
            <h1>Our collections</h1>
            <?php
              $categories = getAllActive('categories');
              if(mysqli_num_rows($categories)>0)
              {
                foreach($categories as $item)
                {
                    ?>
                    <div class="col-md-3 mb-2">
                        <a href='products.php?category=<?= $item['slug']; ?>'>
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="uploads/<?= $item['image']; ?>" alt="Image" class="w-100">
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
<?php include('includes/footer.php'); ?>