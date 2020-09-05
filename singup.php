


<!DOCTYPE html>
<html lang="en">

<?php
  include 'head.php';
?>

<body>

  <!-- start navbar -->
<?php
  include 'navbar.php';
?>
  <!-- end navbar -->

  <!-- start content -->

  <div class="container my-5 py-5 z-depth-1">
 
<!--Section: Content-->
<section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


  <!--Grid row-->
  <div class="row d-flex justify-content-center">

    <!--Grid column-->
    <div class="col-md-6">

      <!-- Default form register -->
      <form class="text-center" method="POST" action="singup.php">

      <?php include('errors.php'); ?>
        <p class="h4 mb-4 animated bounce infinite" alt="Transparent MDB Logo" id="animated-img1">Sign up</p>

        <div class="form-row mb-4">
            <!-- full name -->
            <input type="text" id="defaultRegisterFormFullName" class="form-control" placeholder="full name" name="username" value="<?php echo $username ?>" >
        </div>

        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php echo $email ?>" >

        <!-- Password 1-->
        <input type="password" id="defaultRegisterFormPassword1" class="form-control" placeholder="type Password"
          aria-describedby="defaultRegisterFormPasswordHelpBlock1" name="password_1">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
        </small>

        <!-- Password 2-->
        <input type="password" id="defaultRegisterFormPassword2" class="form-control mb-4" placeholder="type Password again"
        aria-describedby="defaultRegisterFormPasswordHelpBlock2" name="password_2">

        <!-- Phone number -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number"
          aria-describedby="defaultRegisterFormPhoneHelpBlock" name="user_phone" value="<?php echo $phone ?>">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
          Optional
        </small>

        <!-- Newsletter -->
        <!-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
          <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our
            youtube chanel</label>
        </div> -->

        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit" name="reg_user">Sign in</button>

        <!-- Social register -->
        <!-- <p>or sign up with:</p>

            <a href="#" class="mx-1" role="button"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="mx-1" role="button"><i class="fab fa-twitter"></i></a>
            <a href="#" class="mx-1" role="button"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="mx-1" role="button"><i class="fab fa-github"></i></a> -->

        <hr>

        <!-- Terms of service -->
        <p>By clicking
          <em>Sign up</em> you agree to our
          <a href="" target="_blank">terms of service</a>

      </form>
      <!-- Default form register -->

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->


</section>
<!--Section: Content-->


</div>

  <!-- end content -->

  <!-- start footer -->

    <?php include 'footer.php'; ?>

  <!-- end footer -->


  <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

    <!-- <script>
      $('link[href="css/mdb.min.css"]').prop('disabled', true);
    </script> -->
</body>

</html>