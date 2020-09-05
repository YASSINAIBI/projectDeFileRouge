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

      <!-- Default form login -->
      <form class="text-center" method="POST" action="singin.php">
      <?php include('errors.php'); ?>
        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="username" name="username">

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">

        <div class="d-flex justify-content-around">
          <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
              <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
          </div>
          <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
          </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit" name="login_user">Sign in</button>

        <!-- Register -->
        <p>Not a member?
          <a href="singup.php">Register</a>
        </p>

      </form>
      <!-- Default form login -->

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