<?php
require_once("./controllers/user.php");
?>
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <form method="POST" class="card card-primary">
            <div class="card-header">
              <h4>Create Account</h4>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="Name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="Surname">Surname</label>
                    <input id="Surname" type="text" class="form-control" name="surname">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="username">Username</label>
                    <input id="username" class="form-control" name="username">
                    <?php if (isset($error["username"])) { ?>
                      <div class="text-danger text-small">
                        <?php echo $error["username"]; ?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <!-- <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" class="form-control" name="password-confirm">
                  </div> -->
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="create-user" class="btn btn-primary btn-lg btn-block">
                    Register
                  </button>
                </div>
              </form>
            </div>
            <div class="mb-4 text-muted text-center">
              Already Registered? <a href="login.php">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>