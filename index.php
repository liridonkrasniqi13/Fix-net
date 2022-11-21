<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<?php 
    if(isset($_SESSION['username'])) {
        header("Location: admin ");
    };
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


             <!-- Blog Search Well -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
            </div>
            
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            

        </form>
        <!-- /.input-group -->
    </div>
        
        

          
            <!-- Second Blog Post -->


        </div>

        <!-- Blog Sidebar Widgets Column -->

    </div>
    <!-- /.row -->

    <hr>

    <?php include "includes/footer.php" ?>