<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Add product</h1>
            </div>
            <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label class='mb-0' for="">Name</label>
                        <input type="text" required name='name' class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class='mb-0' for="">Category</label>
                        <select name="category_id" class="form-select mb-2">
                        <option selected >Select category</option>
                            <?php
                              $categories=getAll('categories');
                              if(mysqli_num_rows($categories)>0){
                                foreach($categories as $item){
                                    ?>
                                    <option value="<?= $item['id'];?>"><?= $item['name'];?></option>
                                    <?php
                                  }

                              }else{
                                echo 'no category available';
                              }
                             

                            ?>
                             
                            

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class='mb-0' for="">Slug</label>
                        <input type="text" required name='slug'class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class='mb-0' for="">small description</label>
                        
                        <textarea rows="3" required name='small_description' class="form-control"></textarea>
                        
                    </div>
                    <div class="col-md-12">
                        <label class='mb-0' for="">description</label>
                        
                        <textarea rows="3" name='description' class="form-control"></textarea>
                        
                    </div>
                    <div class="col-md-6">
                        <label class='mb-0' for="">Original price</label>
                        <input type="text" name='original_price'class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class='mb-0' for="">Selling price</label>
                        <input type="text" name='selling_price'class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class='mb-0' for="">Upload image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                   
                    
                    <div class="col-md-12">
                        <label class='mb-0' for="">Meta description</label>
                        <textarea rows="3" name='meta_description' class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class='mb-0' for="">Meta title</label>
                        <input type="text" name='meta_title' class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class='mb-0' for="">Meta keywords</label>
                        
                        <textarea rows="3" name='meta_keywords' class="form-control"></textarea>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <label class='mb-0' for="">Status</label>
                        <input type="checkbox" name='status'>
                    </div>
                    <div class="col-md-3">
                        <label class='mb-0' for="">Quantity</label>
                        <input type="number" name='qty' class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class='mb-0' for="">Trending</label>
                        <input type="checkbox" name='trending'>
                    </div>
                    </div>
                    <div class="col-md-12">
                       
                        <button type="submit" class="btn btn-primary" name='add_product_btn'>Save</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
  

    </div>


</div>
<?php include('includes/footer.php');?>





