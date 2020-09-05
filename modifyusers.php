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
 
 
 <!--Section: Content-->
 <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


   <!--Grid row-->
   <div class="row d-flex justify-content-center">

     <!--Grid column-->
     <div class="col-md-6">

       <!-- Default form subscription -->
       <form class="text-center"  method="POST" action="">
        <?php include 'errors.php' ?>
         <p class="h4 mb-4">Subscribe</p>

         <!-- Name -->
         <input type="text" class="form-control mb-4" placeholder="Name" name="username">

         <!-- Email -->
         <input type="email" class="form-control mb-4" placeholder="E-mail" name="email">

        <!-- password -->
        <input type="password" class="form-control mb-4" placeholder="password" name="password_1">

        <!-- password -->
        <input type="password" class="form-control mb-4" placeholder="password" name="password_2">

        <!-- phone -->
        <input type="text" class="form-control mb-4" placeholder="phone" name="phone">

         <button class="btn btn-info btn-block" type="submit" name="edite_user">confirm</button>


       </form>
       <!-- Default form subscription -->

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

