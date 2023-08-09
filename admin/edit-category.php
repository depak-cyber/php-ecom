<?php 
include('includes/header.php');

include('../middleware/adminMiddleware.php');

?>
<div class="container">
    <div class="row">
    <div class="col-md-12">
       <h1>Edit category</h1>
       <?php
          if(isset($_GET['id']))
          
          {
            $id= $_GET['id'];
            $category = getById("categories", $id);
            if(mysqli_num_rows($category)> 0)
            {
                $data= mysqli_fetch_array($category);

            ?>
             <div class="card"></div>
             <div class="card-header">
                
             </div>
             <div class="card-body">
             <form action="code.php" method="POST" enctype="multipart/form-data">
             <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="category_id" value= "<?= $data['id'] ?>">
                        <label for="">Name</label>
                        <input type="text" name='name' value="<?= $data['name'] ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" name='slug' value="<?= $data['slug'] ?>" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        
                        <textarea rows="3" name='description'  class="form-control"><?= $data['description'] ?></textarea>
                        
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload image</label>
                        <input type="file" name="image" class="form-control">
                        <label for="">Current image</label>
                        <input type="hidden" name="old_image" class="form-control">
                        <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                    </div>
                   
                    
                    <div class="col-md-12">
                        <label for="">Meta description</label>
                        <textarea rows="3" name='meta_description'  class="form-control"><?= $data['meta_description'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta title</label>
                        <input type="text" name='meta_title' value="<?= $data['meta_title'] ?>"class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta keywords</label>
                        
                        <textarea rows="3" name='meta_keywords' class="form-control"><?= $data['meta_keywords'] ?></textarea>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" <?= $data['status'] ? "checked": ""?> name='status'>
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" <?= $data['popular'] ? "checked": ""?> name='popular'>
                    </div>
                    <div class="col-md-12">
                       
                        <button type="submit" class="btn btn-primary" name='update_category_btn'>Update</button>
                    </div>
                </div>
             </div>
            </form>
            <?php
            }
            else
            {
                echo 'category not found';
            }
          }
          else{ 
            echo 'Id missing';
          }


      ?>

    </div>


</div>

<?php include('includes/footer.php');?>





