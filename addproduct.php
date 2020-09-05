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
       <form class="text-center"  method="POST" action="" enctype="multipart/form-data">
        <?php include 'errors.php' ?>
         <p class="h4 mb-4">Subscribe</p>

         <!-- Name -->
         <input type="text" class="form-control mb-4" placeholder="product_name" name="product_name">

         <!-- Email -->
         <input type="number" class="form-control mb-4" placeholder="product_price" name="product_price">

         <select class="custom-select custom-select-sm mb-4" name="category">
                <option value="" disabled selected>select categorie</option>
                <?php
                    $sql_num_of_categorie = $db_handle->selectcategorie();
                    foreach($sql_num_of_categorie AS $value){
                ?>
                <option value="<?php echo $value['category'] ?>"><?php echo $value['category'] ?></option>
                <?php
                    }
                ?>
        </select>

        <!-- description -->
        <input type="text" class="form-control mb-4" placeholder="product_description" name="product_description">

        <!-- promo -->
        <select class="custom-select custom-select-sm mb-4" name="promotion">
                <option value="" disabled selected>on promotion ou non</option>
                <option value="0">0</option>
                <option value="1">1</option>
        </select>

        <!-- rate -->
        <select class="custom-select custom-select-sm mb-4" name="average_rating">
                <option value="" disabled selected>rating</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
        </select>

        <div class="file-field">
        <div class="mb-4 mt-3">
        </div>
        <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
            <span>poduct img</span>
            <input type="file" name="product_image">
            </div>
        </div>
        </div>

        <div>
        <div class="file-field">
            <div class="mb-4 mt-3">
            </div>
            <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
                <span>related img 1</span>
                <input type="file" name="related_img_1">
            </div>
            </div>
        </div>

        <div class="file-field">
            <div class="mb-4 mt-3">
            </div>
            <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
                <span>related img 2</span>
                <input type="file" name="related_img_2">
            </div>
            </div>
        </div>

        <div class="file-field">
            <div class="mb-4 mt-3">
            </div>
            <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
                <span>related img 3</span>
                <input type="file" name="related_img_3">
            </div>
            </div>
        </div>

        <div class="file-field">
            <div class="mb-4 mt-3">
            </div>
            <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
                <span>related img 4</span>
                <input type="file" name="related_img_4">
            </div>
            </div>
        </div>
        </div>

         <button class="btn btn-info btn-block" type="submit" name="add_product">confirm</button>

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

