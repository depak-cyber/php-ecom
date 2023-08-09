<?php 
session_start();
include('includes/header.php');

if(isset($_SESSION['auth'])){
    $_SESSION['message']= 'Your are already logged in!!!';
    header('Location: index.php');
    exit();

}
 ?>
<div class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <?php if(isset($_SESSION['message'])) 
            {
                ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy!!!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
        <?php
        unset($_SESSION['message']);
            }
        ?>

        </div>
            <div class="card">
                <div class="card-header">
                   <h1>Login</h1>
                </div>
                <div class="card-body">
                <form action="functions/authcode.php" method="POST">
                   
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="type your password">
                        
                    </div>
                    
                    <button type="submit" name="login_btn" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        

 
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>