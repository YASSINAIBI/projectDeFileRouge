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

<!--Modal: change username-->

<div class="modal fade" id="modalchangeuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="<?php echo $_SESSION['avatar'] ?>" alt="avatar" class="rounded-circle img-responsive" style="width: 80%; height: 145px;">
      </div>
      <!--Body-->
      
    <form method="POST" action="">
        <div class="modal-body text-center mb-1">
            <h5 class="mt-1 mb-2"><?php echo $_SESSION['user'] ?></h5>

            <div class="md-form ml-0 mr-0">
            <input type="text" type="text" id="form29" class="form-control form-control-sm validate ml-0" name="username">
            <label data-error="wrong" data-success="right" for="form29" class="ml-0">Enter your new username</label>
            </div>

            <div class="text-center mt-4">
            <button class="btn btn-cyan mt-1" type="submit" name="change_username">save <i class="fas fa-sign-in ml-1"></i></button>
            </div>
        </div>
    </form>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: change username-->

<!--Modal: change password-->
<div class="modal fade" id="modalchangepassowrd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="<?php echo $_SESSION['avatar'] ?>" alt="avatar" class="rounded-circle img-responsive" style="width: 80%; height: 145px;">
      </div>
      <!--Body-->
      <form method="POST" action="">
            <div class="modal-body text-center mb-1">

                <h5 class="mt-1 mb-2"><?php echo $_SESSION['user'] ?></h5>

                <div class="md-form ml-0 mr-0">
                <input type="text" type="text" id="formpassword" class="form-control form-control-sm validate ml-0" name="mypassword">
                <label data-error="wrong" data-success="right" for="formpassword" class="ml-0">Enter your new password</label>
                </div>

                <div class="text-center mt-4">
                <button class="btn btn-cyan mt-1" type="submit" name="changepassword">save <i class="fas fa-sign-in ml-1"></i></button>
                </div>
            </div>
      </form>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: change password-->

<!--Modal: change phone-->
<div class="modal fade" id="modalchangephone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="<?php echo $_SESSION['avatar'] ?>" alt="avatar" class="rounded-circle img-responsive" style="width: 80%; height: 145px;">
      </div>
      <!--Body-->
    <form method="POST" action="">
            <div class="modal-body text-center mb-1">

                <h5 class="mt-1 mb-2"><?php echo $_SESSION['user'] ?></h5>

                <div class="md-form ml-0 mr-0">
                <input type="text" type="text" id="formphone" class="form-control form-control-sm validate ml-0" name="phone">
                <label data-error="wrong" data-success="right" for="formphone" class="ml-0">Enter your new phone number</label>
                </div>

                <div class="text-center mt-4">
                <button class="btn btn-cyan mt-1" type="submit" name="change_phone_number">save <i class="fas fa-sign-in ml-1"></i></button>
                </div>
            </div>
    </form>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: change phone-->

<!--Modal: set image-->
<div class="modal fade" id="modalsetimag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <form method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body text-center mb-1">

                <div class="md-form ml-0 mr-0">
                    <div class="file-field">
                        <div class="mb-4">
                        <img src="<?php echo $_SESSION['avatar'] ?>"
                            class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width: 100%">
                        </div>
                        <div class="d-flex justify-content-center">
                        <div class="btn btn-mdb-color btn-rounded float-left">
                            <span>set img</span>
                            <input type="file" name="avatar">
                        </div>
                        </div>
                    </div>
                <button class="btn btn-cyan mt-1" type="submit" name="set_your_img">save <i class="fas fa-sign-in ml-1"></i></button>
                </div>
            </div>
      </form>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: set image-->

    <div class="container my-5">

        <!--Section: Content-->
        <section class="dark-grey-text text-center">

        <!-- Section heading -->
                <!-- Card -->
        <div class="card testimonial-card">

        <!-- Background color -->
        <div class="card-up indigo lighten-1"></div>

        <!-- Avatar -->
        <div class="avatar mx-auto white">
        <img src="<?php echo $_SESSION['avatar'] ?>" class="rounded-circle"
            alt="woman avatar" width="50%">
        </div>

        <!-- Content -->
        <div class="card-body">
        <!-- Name -->
        <h4 class="card-title"><?php echo $_SESSION['user'] ?> </h4>
        <hr>
        <!-- Quotation -->
        <p><i class="fas fa-quote-left"></i> welcome <strong style="font-size: 20px; font-weight: bold;"><?php echo $_SESSION['user'] ?></strong> to your panel here you can edite your username, email ,password, phone, set image for your profile <br> if you have defeclt please contact support team <a href="contact.php">here</a>
        </p>
        </div>

        </div>
        <!-- Card -->
        <hr class="w-header">
        <!-- Section description -->

        <!--First row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-3 mb-4">

            <!-- Card -->
            <a href="#" class="card hoverable" data-toggle="modal" data-target="#modalchangeuser">
                
                <!-- Card content -->
                <div class="card-body my-4">

                    <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
                <h5 class="black-text mb-0">username</h5>

                </div>

            </a>
            <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">

            <!-- Card -->
            <a href="#" class="card hoverable" data-toggle="modal" data-target="#modalchangepassowrd">
                
                <!-- Card content -->
                <div class="card-body my-4">

                    <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
                <h5 class="black-text mb-0">password</h5>
                
                </div>

            </a>
            <!-- Card -->

            </div>
            <!--Grid column-->
            
            <!--Grid column-->
            <div class="col-md-3 mb-4">

            <!-- Card -->
            <a href="#" class="card hoverable" data-toggle="modal" data-target="#modalchangephone">
                
                <!-- Card content -->
                <div class="card-body my-4">

                    <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
                <h5 class="black-text mb-0">phone</h5>
                
                </div>

            </a>
            <!-- Card -->

            </div>
            <!--Grid column-->
            
            <!--Grid column-->
            <div class="col-md-3 mb-4">

            <!-- Card -->
            <a href="#" class="card hoverable" data-toggle="modal" data-target="#modalsetimag">
                
                <!-- Card content -->
                <div class="card-body my-4">

                    <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
                    <h5 class="black-text mb-0">set image</h5>
                
                </div>

            </a>
            <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--First row-->

        </section>

    </div>

    <!-- start footer -->

    <?php include 'footer.php'; ?>

    <!-- end footer -->

    <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

