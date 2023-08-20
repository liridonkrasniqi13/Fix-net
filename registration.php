<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php

    if((isset($_SESSION['username']) == 'admin')  ) {
       
    } else {
      header("Location: admin ");
    };


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];


    if (!empty($username)   && !empty($password)) {



        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);


        $query = "SELECT rentSalt FROM users";
        $select_rentSalt_query = mysqli_query($connection, $query);

        if (!$select_rentSalt_query) {
            die("Query failde" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_rentSalt_query);
            $salt = $row['rentSalt']; 
         
        $password = crypt($password, $salt);

        $query = "INSERT INTO users (username, user_email, user_password, user_role, user_firstname, user_lastname) 
        VALUE('{$username}', '{$email}', '{$password}', 'subscriber', '{$user_firstname}' , '{$user_lastname}')";
        $register_user_query = mysqli_query($connection, $query);

        if (!$register_user_query) {
            die("Query Failed" . mysqli_error($connection) . '' . mysqli_errno($connection));
        }
        // echo $salt;


        $message = "<div class='alert alert-success' role='alert'>Your Registration was a success</div>
        <a href='index.php' class='btn btn-md u-btn-primary rounded g-py-13 g-px-25' >Home</a>
        ";
    } else {
        $message = "<div class='alert alert-danger' role='alert'>Your Registration was a Faile</div>";
    } 

    

} else {
    $message = "";
}



?>


<main>
    <!-- Signup -->
    <section class="g-min-height-100vh g-flex-centered g-bg-lightblue-radialgradient-circle">
      <div class="container g-py-50">
        <div class="row justify-content-center">
        <?php echo $message; ?>
          <div class="col-sm-10 col-md-9 col-lg-6">
            <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
              <header class="text-center mb-4">
                <h2 class="h2 g-color-black g-font-weight-600">Create a Account</h2>
              </header>

              <!-- Form -->
              <form class="g-py-15" action="registration.php" method="post" id="login-form">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 mb-4">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">First name:</label>
                    <input name="user_firstname" id="user_firstname" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="John">
                  </div>

                  <div class="col-xs-12 col-sm-6 mb-4">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Last name:</label>
                    <input name="user_lastname" id="user_lastname" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="Doe">
                  </div>
                </div>

                <div class="mb-4">
                  <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                  <input  name="email" id="email" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" placeholder="johndoe@gmail.com">
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-6 mb-4">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Username:</label>
                    <input name="username" id="username" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text  " placeholder="Username">
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 mb-4">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                    <input name="password" id="key" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="password" placeholder="Password">
                  </div>

                </div>

                <div class="row justify-content-between mb-5">
                  <div class="col-4 align-self-center text-right">
                    <button type="submit" name="submit" class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" >Register</button>
                  </div>
                  <div class="col-4 align-self-center text-right">
                    <a href='index.php' class='btn btn-md u-btn-primary rounded g-py-13 g-px-25' >Home</a>
                  </div>
                </div>
              </form>
              <!-- End Form -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Signup -->
  </main>




    <?php include "includes/footer.php"; ?>