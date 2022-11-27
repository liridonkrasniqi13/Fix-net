<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>


<?php 
    if(isset($_SESSION['username'])) {
        header("Location: admin ");
    };
?>


<main>
      <!-- Login -->
      <section class="g-min-height-100vh g-flex-centered g-bg-lightblue-radialgradient-circle">
        <div class="container g-py-100">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
              <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
                <header class="text-center mb-4">
                  <h2 class="h2 g-color-black g-font-weight-600">WeFix Net Login</h2>
                </header>
  
                <!-- Form -->
                <form class="g-py-15" action="includes/login.php" method="post">
                  <div class="mb-4">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Username:</label>
                    <input name="username" id="username"  class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="username">
                  </div>
  
                  <div class="g-mb-35">
                    <div class="row justify-content-between">
                      <div class="col align-self-center">
                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                      </div>

                    </div>
                    <input name="password" id="password" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3" type="password" placeholder="Password">
                    <div class="row justify-content-between">
                      <div class="col-4 align-self-center ">
                        <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit" name="login">Login</button>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- End Form -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Login -->
    </main>

<?php include "includes/footer.php" ?>