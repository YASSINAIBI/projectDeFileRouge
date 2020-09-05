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

    <div class="container my-5 py-5 z-depth-1">

    <?php 

        if(isset($_POST['contact'])){
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        $contactform = array();
        if(strlen($email) < 2){
            $contactform[] = 'please enter your email' . '<br>';
            // array_push($formerrors, 'you must have more than 2 character in message' . '<br>');
        }
        if(strlen($phone) < 2){
            $contactform[] = 'please enter your phone number' . '<br>';
            // array_push($formerrors, 'you must have more than 2 character in message' . '<br>');
        }
        if(strlen($message) < 10){
            $contactform[] = 'you must have more than <strong>10</strong> character in message' . '<br>';
            // array_push($formerrors, 'you must have more than 2 character in message' . '<br>');
        }

        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parametres)]

        $headers = 'From: ' . $email . '\r\n';
        $Myemail = 'aibiyassin8@gmail.com';
        $subject = 'Contact Form';

        if(empty($contactform)){
            mail($Myemail, $subject, $message, $headers);

            $email = '';
            $phone = '';
            $message = '';

            echo "<html>
            <body>
                <meta http-equiv='REFRESH'>
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'we are receirve your message',
                    showConfirmButton: false,
                    timer: 3000
                  })
                </script>
            </body>
            </html>";
        }

    }
    ?>

<!--Section: Content-->
<section class="px-md-5 mx-md-5 text-center dark-grey-text">

  <style>
    .map-container {
      height: 200px;
      position: relative;
    }

    .map-container iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }
  </style>

  <!--Google map-->
  <div id="map-container-google-1" class="z-depth-1 map-container mb-5">
    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
      style="border:0" allowfullscreen></iframe>
  </div>
  <!--Google Maps-->

  <!--Grid row-->
  <div class="row d-flex justify-content-center mb-5">

    <!--Grid column-->
    <div class="col-md-6 text-center">

      <h3 class="font-weight-bold">Contact Us</h3>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <!-- Material outline input -->

        <?php if(!empty($contactform)){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <?php
                        foreach($contactform as $errors){
                            echo $errors;
                        }
                ?>
                    </div>
        <?php } ?>
        <div class="md-form md-outline mt-3">
            <input type="email" id="form-email" class="form-control" name="email" value="<?php if(isset($email)){echo $email; } ?>">
            <label for="form-email">E-mail</label>
        </div>

        <!-- Material outline input -->
        <div class="md-form md-outline">
            <input type="text" id="form-subject" class="form-control" name="phone" value="<?php if(isset($phone)){echo $phone; } ?>">
            <label for="form-subject">phone</label>
        </div>

        <!--Material textarea-->
        <div class="md-form md-outline mb-3">
            <textarea id="form-message" class="md-textarea form-control" rows="5" name="message" value="<?php if(isset($message)){echo $message; } ?>"></textarea>
            <label for="form-message">How we can help?</label>
        </div>

        <button type="submit" class="btn btn-info btn-sm ml-0" name="contact">Submit<i class="far fa-paper-plane ml-2"></i></button>
    </form>

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

  <!--Grid row-->
  <div class="row text-center">

    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

      <i class="fas fa-map-marker-alt fa-2x blue-text"></i>

      <p class="font-weight-bold my-3">Address</p>

      <p class="text-muted">hay salam agadir morocco</p>

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

        <i class="fas fa-phone fa-2x blue-text"></i>

        <p class="font-weight-bold my-3">Phone number</p>

        <p class="text-muted">+212 6 44 46 01 87</p>

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

        <i class="fas fa-envelope fa-2x blue-text"></i>

        <p class="font-weight-bold my-3">E-mail</p>

        <p class="text-muted">agadirmall@gmail.com</p>

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->


</section>
<!--Section: Content-->


</div>


    <!-- start footer -->

    <?php include 'footer.php'; ?>

    <!-- end footer -->

    <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

