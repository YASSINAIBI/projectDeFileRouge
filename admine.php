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

  <!--Modal: all product-->
  <div class="modal fade" id="all_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Header-->

        <!--Body-->
        <div class="modal-body text-center mb-1">

          <div class="container my-5">

            <!-- Section: Block Content -->
            <section class="team-section">

              <div class="card" style="box-shadow: unset;">
                <div class="card-header white d-flex justify-content-between">
                  <p class="h5-responsive font-weight-bold mb-0">all products</p>
                </div>

                <form method="POST" action="">
                  <div class="card-body">
                    <div class="row pt-4">
                      <?php
                      $query = $db_handle->runQuery("SELECT * FROM tbl_products ORDER BY category");
                      if (!empty($query)) {
                        foreach ($query as $key => $value) {
                      ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 pb-4 flip-card">
                            <div class="flip-card-inner">
                              <div class="avatar white text-center flip-card-front">
                                <img src="<?php echo $query[$key]['product_image'] ?>" class=" rounded-circle" style="height:235px; width:100% " />
                                <h6 class="font-weight-bold pt-2 mb-0"><?php echo $query[$key]['name'] ?></h6>
                              </div>
                              <div class="text-center mt-2 flip-card-back peach-gradient color-block">
                                <h6 class="font-weight-bold pt-2 mb-0 orange lighten-5"><?php echo $query[$key]['product_description'] ?></h6>
                                <h6 class="font-weight-bold pt-5 mb-0 orange lighten-5"><?php echo $query[$key]['price'] . " MAD" ?></h6>

                                <a href="modifyproducts.php?editeforproduct=<?php echo $query[$key]['id'] ?>"><button type="button" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></button></a>
                                <a href="addproduct.php?editeforproduct=<?php echo $query[$key]['id'] ?>"><button type="button" class="btn btn-success px-3"><i class="fas fa-plus" aria-hidden="true"></i></button></a>
                                
                                <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#modalConfirmDelete2<?php echo $query[$key]['id'] ?>"><i class="fas fa-user-times" aria-hidden="true"></i></button>
                                <!-- Button trigger modal-->

                              </div>
                            </div>
                          </div>

                          <!--Modal: modalConfirmDelete-->
                          <div class="modal fade" id="modalConfirmDelete2<?php echo $query[$key]['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document" style="margin-top: 17%;">
                              <!--Content-->
                              <div class="modal-content text-center">
                                <!--Header-->
                                <div class="modal-header d-flex justify-content-center">
                                  <p class="heading">Are you sure?</p>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                  <i class="fas fa-times fa-4x animated rotateIn" style="margin-top: 17%;"></i>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer flex-center">
                                  <button type="submit" class="btn  btn-outline-danger" name="delete_user">YES</button>
                                  <button type="submit" class="btn  btn-danger waves-effect" data-dismiss="modal">No</button>
                                </div>
                              </div>
                              <!--/.Content-->
                            </div>
                          </div>
                          <!--Modal: modalConfirmDelete-->
                      <?php }
                      }
                      ?>
                    </div>
                  </div>
                </form>

              </div>

            </section>
            <!-- Section: Block Content -->
          </div>

        </div>

      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: all product-->

  <!--Modal: all user-->
  <div class="modal fade" id="all_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Header-->

        <!--Body-->
        <div class="modal-body text-center mb-1">

          <div class="container my-5">

            <!-- Section: Block Content -->
            <section class="team-section">

              <div class="card" style="box-shadow: unset;">
                <div class="card-header white d-flex justify-content-between">
                  <p class="h5-responsive font-weight-bold mb-0">all Members</p>
                </div>
                <form method="POST" action="">
                  <div class="card-body">
                    <div class="row pt-4">
                      <?php
                      $query = $db_handle->runQuery("SELECT * FROM users ORDER BY date DESC");
                      if (!empty($query)) {
                        foreach ($query as $key => $value) {
                      ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 pb-4 flip-card">
                            <div class="flip-card-inner">
                              <div class="avatar white text-center flip-card-front">
                                <img src="<?php echo $query[$key]['avatar'] ?>" class=" rounded-circle" style="height:235px; width:100% " />
                                <h6 class="font-weight-bold pt-2 mb-0"><?php echo $query[$key]['username'] ?></h6>
                              </div>
                              <div class="text-center mt-2 flip-card-back peach-gradient color-block">
                                <h6 class="font-weight-bold pt-2 mb-0 orange lighten-5"><?php echo $query[$key]['email'] ?></h6>
                                <h6 class="font-weight-bold pt-5 mb-0 orange lighten-5"><?php echo $query[$key]['user_phone'] ?></h6>

                                <a href="modifyusers.php?editeforuser=<?php echo $query[$key]['id'] ?>"><button type="button" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></button></a>
                                <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $query[$key]['id'] ?>"><i class="fas fa-user-times" aria-hidden="true"></i></button>
                                <!-- Button trigger modal-->

                                <p class="text-muted mb-0 mt-3"><small style="color: white"><?php echo $query[$key]['date'] ?></small></p>
                              </div>
                            </div>
                          </div>

                          <!--Modal: modalConfirmDelete-->
                          <div class="modal fade" id="modalConfirmDelete<?php echo $query[$key]['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document" style="margin-top: 17%;">
                              <!--Content-->
                              <div class="modal-content text-center">
                                <!--Header-->
                                <div class="modal-header d-flex justify-content-center">
                                  <p class="heading">Are you sure?</p>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                  <i class="fas fa-times fa-4x animated rotateIn" style="margin-top: 17%;"></i>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer flex-center">
                                  <button type="submit" class="btn  btn-outline-danger" name="delete_user">YES</button>
                                  <button type="submit" class="btn  btn-danger waves-effect" data-dismiss="modal">No</button>
                                </div>
                              </div>
                              <!--/.Content-->
                            </div>
                          </div>
                          <!--Modal: modalConfirmDelete-->
                      <?php }
                      }
                      ?>
                    </div>
                  </div>
                </form>
              </div>

            </section>
            <!-- Section: Block Content -->
          </div>

        </div>

      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: all user-->

  <!--Modal: all commentaire-->
  <div class="modal fade" id="all_commentaire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Header-->

        <!--Body-->
        <div class="modal-body mb-1">

          <form method="POST" action="">
            <div class="container my-5">
              <!--Section: Block Content-->
              <section class="dark-grey-text mb-5">

                <!-- Section heading -->
                <h3 class="font-weight-bold text-center mb-5">all Reviews</h3>

                <?php
                $query = $db_handle->runQuery("SELECT * FROM commentaire");
                if (!empty($query)) {
                  foreach ($query as $key => $value) {
                ?>
                    <div class="media">
                      <img class=" card-img-100 rounded-circle z-depth-1-half d-flex mr-3" src="<?php echo $query[$key]["avatar"] ?>" alt="Generic placeholder image">
                      <div class="media-body">
                        <a>
                          <h5 class="user-name font-weight-bold mb-3 mt-3"><?php echo $query[$key]["username"] ?></h5>
                        </a>
                        <!-- Rating -->

                        <p class="dark-grey-text article"><?php echo $query[$key]["comment"] ?></p>

                        <input type="hidden" name="comentfromuser" value="<?php echo  $query[$key]['id'] ?>">

                        <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#modalConfirmDelete2"><i class="fas fa-user-times" aria-hidden="true"></i></button>
                      </div>
                    </div>

                <?php
                  }
                }
                ?>

              </section>
              <!--Section: Block Content-->
              <!--Modal: modalConfirmDelete-->
              <div class="modal fade" id="modalConfirmDelete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-danger" role="document" style="margin-top: 17%;">
                  <!--Content-->
                  <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                      <p class="heading">Are you sure?</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <i class="fas fa-times fa-4x animated rotateIn" style="margin-top: 17%;"></i>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                      <button type="submit" class="btn  btn-outline-danger" name="delete_commentaire">YES</button>
                      <button type="submit" class="btn  btn-danger waves-effect" data-dismiss="modal">No</button>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal: modalConfirmDelete-->
            </div>
          </form>

        </div>

      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: all commentaire-->

  <!-- start card -->

  <div class="container-fluid my-5 py-5">

    <!-- Section: Block Content -->
    <section class="container">

      <style>
        .footer-hover {
          background-color: rgba(0, 0, 0, 0.1);
          -webkit-transition: all .3s ease-in-out;
          transition: all .3s ease-in-out
        }

        .footer-hover:hover {
          background-color: rgba(0, 0, 0, 0.2)
        }

        .text-black-40 {
          color: rgba(0, 0, 0, 0.4)
        }
      </style>

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-4 mb-4">

          <!-- Card -->
          <div class="card primary-color white-text">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <?php
                $sql_num_of_product = $db_handle->numofproduct();
                $num_of_product = mysqli_num_rows($sql_num_of_product);
                ?>
                <p class="h2-responsive font-weight-bold mt-n2 mb-0"><?php echo $num_of_product ?></p>
                <p class="mb-0">all product</p>
              </div>
              <div>
                <i class="fas fa-shopping-bag fa-4x text-black-40"></i>
              </div>
            </div>
            <a class="card-footer footer-hover small text-center white-text border-0 p-2" data-toggle="modal" data-target="#all_product">More info<i class="fas fa-arrow-circle-right pl-2"></i></a>
          </div>
          <!-- Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-4 mb-4">

          <!-- Card -->
          <div class="card warning-color white-text">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <?php
                $sql_num_of_comment = $db_handle->numofcomment();
                $num_of_comment = mysqli_num_rows($sql_num_of_comment);
                ?>
                <p class="h2-responsive font-weight-bold mt-n2 mb-0"><?php echo $num_of_comment ?></p>
                <p class="mb-0">all commentaire</p>

              </div>
              <div>
                <i class="fas fa-chart-bar fa-4x text-black-40"></i>
              </div>
            </div>
            <a class="card-footer footer-hover small text-center white-text border-0 p-2" data-toggle="modal" data-target="#all_commentaire">More info<i class="fas fa-arrow-circle-right pl-2"></i></a>
          </div>
          <!-- Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-12 col-lg-4 mb-4">

          <!-- Card -->
          <div class="card light-blue lighten-1 white-text">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <?php
                $sql_num_of_users = $db_handle->numofusers();
                $num_of_users = mysqli_num_rows($sql_num_of_users);
                ?>
                <p class="h2-responsive font-weight-bold mt-n2 mb-0"><?php echo $num_of_users ?></p>
                <p class="mb-0">User Registrations</p>
              </div>
              <div>
                <i class="fas fa-user-plus fa-4x text-black-40"></i>
              </div>
            </div>
            <a class="card-footer footer-hover small text-center white-text border-0 p-2" data-toggle="modal" data-target="#all_user">More info<i class="fas fa-arrow-circle-right pl-2"></i></a>
          </div>
          <!-- Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-3 mb-4">

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </section>
    <!-- Section: Block Content -->

  </div>

  <!-- end card -->


  <!-- start footer -->

  <?php include 'footer.php'; ?>

  <!-- end footer -->


  <!-- JS, Popper.js, and jQuery -->
  <?php include 'allscript.php'; ?>

</body>

</html>