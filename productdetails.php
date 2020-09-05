<!-- $_GET['id']
$_SESSION["selected_product_id"] -->

<?php
include 'db.php';
$db_handle = new DBController();
?>

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

    <?php $product_id= $_GET['id'] ?>

    <!-- start content -->

    <div class="container my-5 py-5 z-depth-1">


        <!--Section: Content-->
        <section class="text-center">

            <!-- Section heading -->

            <div class="row">

                <div class="col-lg-6">

                <?php
                    $query = $db_handle->runQuery("SELECT * FROM tbl_products WHERE id=$product_id");
                    if (!empty($query)) {
                    foreach ($query as $key => $value) {
                ?>
                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                        <!--Slides-->
                        <div class="carousel-inner text-center text-md-left" role="listbox">
                            <div class="carousel-item active">
                                <img src="<?php echo $query[$key]["product_image"]; ?>" alt="First slide" class="img-fluid" style="border-radius: 20%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo $query[$key]["related_img_1"] ?>" alt="Second slide" class="img-fluid" style="border-radius: 20%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo $query[$key]["related_img_2"] ?>" alt="Third slide" class="img-fluid" style="border-radius: 20%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo $query[$key]["related_img_3"] ?>" alt="fourth slide" class="img-fluid" style="border-radius: 20%;">
                            </div>
                        </div>
                        <!--/.Slides-->

                        <!--Thumbnails-->
                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Thumbnails-->

                    </div>
                    <!--/.Carousel Wrapper-->

                </div>

                <div class="col-lg-5 text-center text-md-left">

                    <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                        <strong><?php echo $query[$key]["name"]; ?></strong>
                    </h2>
                    <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">bestseller</span>
                    <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                        <span class="red-text font-weight-bold">
                            <strong><?php echo $query[$key]["price"] . " MAD" ; ?></strong>
                        </span>
                        <span class="grey-text">
                            <small>
                                <?php
                                 if ($query[$key]["promotion"]==1){
                                    echo '<s>' . $query[$key]["price"] * 1.4000 . ' MAD' . '</s>';
                                 }
                                 ?>

                            </small>
                        </span>
                    </h3>

                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                    <h5 class="mb-0">
                                        Description
                                        <i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                    moon
                                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->

                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <!-- <div class="card-header" role="tab" id="headingThree3">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    <h5 class="mb-0">
                                        Shipping
                                        <i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div> -->

                            <!-- Card body -->
                            <!-- <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                    moon
                                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div> -->
                        </div>
                        <!-- Accordion card -->

                    </div>
                    <!--/.Accordion wrapper-->

                    <!-- Add to Cart -->
                    <section class="color">
                        <div class="mt-5">

                            <div class="row mt-3">
                                <div class="col-md-12 text-center text-md-left text-md-right">
                                <a href="productdetails.php?add_to_card=<?php echo $query[0]["id"] ?> & id=<?php echo $query[0]["id"] ?>"><button class="btn btn-primary btn-rounded">
                                    <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button></a>

                                    <!-- <button class="btn btn-success btn-rounded">
                                        <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> buy now</button> -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.Add to Cart -->

                    <?php }
                    }
                    ?>

                </div>

            </div>

        </section>
        <!--Section: Content-->

    </div>

    <!-- end content -->

    <!--Section: Comments-->
<section class="my-5 container">

<!-- Card header -->
<?php 
      if (isset($_SESSION['user'])) {
?> 
<?php ?>

    <?php 		
        $sql_commentaire = $db_handle->selectcommentaire();
        $num_commentaire = mysqli_num_rows($sql_commentaire); 
    ?>

<div class="card-header border-0 font-weight-bold"><?php echo $num_commentaire . " commentaire" ?></div>

        <?php
            $query=$db_handle->selectcommentaire();
            foreach($query AS $value){
        ?>

<div class="media d-block d-md-flex mt-4">
  <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="<?php echo $value["avatar"] ?>"
    alt="Generic placeholder image">
  <div class="media-body text-center text-md-left ml-md-3 ml-0">
    <h5 class="font-weight-bold mt-0">
      <a class="text-default" href=""><?php echo $value["username"] ?></a>
      <a href="" class="pull-right text-default">
      </a>
    </h5>
    <?php echo $value["comment"]; ?>
  </div>
</div>

              <?php
            }
            ?>

</section>

            <!-- Reply section (logged in user) -->
            <div class="container">
                <form method="POST" action="">
                    <section class="my-5">

                    <div class="card-header border-0 font-weight-bold">Leave a reply (<?php echo $_SESSION['user'] ?>)</div>

                    <div class="d-md-flex flex-md-fill px-1">
                    <div class="d-flex justify-content-center mr-md-5 mt-md-5 mt-4">
                        <img class="card-img-100 z-depth-1 rounded-circle" src="<?php echo $_SESSION['avatar'] ?>"
                        alt="avatar">
                    </div>
                    <div class="md-form w-100">
                        <textarea class="form-control md-textarea pt-0" id="exampleFormControlTextarea1" rows="5" placeholder="Write something here..." name="comment_text"></textarea>
                    </div>
                    </div>
                    <div class="text-center">
                    <input type="submit" class="btn btn-default btn-rounded btn-md" value="Submit" name="leave_your_comment">
                    </div>

                    </section>
                </form>
            </div>
            <!-- Reply section (logged in user) -->

        <?php } ?>
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