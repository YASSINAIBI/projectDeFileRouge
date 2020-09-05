
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

  <!-- start best deal -->

  <div class="best_deal_bg">
    <div class="best_deal">
      <div class="row" style="margin: 0;">
        <div class="col-3 left_menu">
          <h2>Best Deal</h2>
          <ul style="padding: 0px 5px;">
            <a href="productspages.php?category=automobile-and-part" target="_blank"><li class="icon">Automobiles & Parts</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=smart-watch" target="_blank"><li class="icon">Smart watch</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=casques" target="_blank"><li class="icon">Casques</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=cle-usb" target="_blank"><li class="icon">Cle usb</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=cable" target="_blank"><li class="icon">cables & chargeur</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=haut-parleur" target="_blank"><li class="icon">haut parleur</li></a>
            <div class="line"></div>
            <a href="productspages.php?category=memory-card" target="_blank"><li class="icon">Memory card</li></a>
            <div class="line"></div>
          </ul>
        </div>
        <div class="col">

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/9.jpg" class="d-block w-100" alt="" style="height: 400px; opacity: 0.7;">
                <p class="slider-title">special descend on <br> <span>casque</span><br><br></p>
                <button class="btn btn-primary slider-shop-button">SHOP NOW</button>
                <p class="slider-text-button">50% * <span>off only</span></p>
              </div>
              <div class="carousel-item">
                <img src="img/7.png" class="d-block w-100" alt="" style="height: 400px; opacity: 0.7;">
                <p class="slider-title">special descend on <br> <span>smartwatch</span><br><br></p>
                <button class="btn btn-primary slider-shop-button">SHOP NOW</button>
                <p class="slider-text-button">30% * <span>off only</span></p>
              </div>
              <div class="carousel-item">
                <img src="img/11.png" class="d-block w-100" alt="" style="height: 400px; opacity: 0.7;">
                <p class="slider-title">special descend on <br> <span>clé Usb</span><br><br></p>
                <button class="btn btn-primary slider-shop-button">SHOP NOW</button>
                <p class="slider-text-button">20% * <span>off only</span></p>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
        <div class="col right_img">
          <ul>

          <?php
            $query = $db_handle->runQuery("SELECT * FROM tbl_products ORDER BY id DESC LIMIT 3");
            if (!empty($query)) {
              foreach ($query as $key => $value) {
          ?>
            <li>
              <div class="row">
                <div class="col-3">
                  <img src="<?php echo $query[$key]["product_image"]; ?>">
                </div>
                <div class="col-5" style="padding: 0; margin: 0; padding-left: 48px;">
                  <p class="shoptext"><?php echo $query[$key]["name"]; ?></p>
                  <a href="productdetails.php?id=<?php echo $query[$key]["id"] ?>" target="_blink" class="shoplink">shop now</a>
                </div>
              </div>
            </li>

              <?php
                }
              }
               ?>

          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- end best deal -->

  <!-- start shiping and coast icone -->

  <div class="all_icons">
    <div class="free_chipping">
      <div class="icone">
        <i class="fas fa-truck-moving" style="color: #FF8E0A;"></i>
        <i class="fas fa-truck-moving animate"></i>
      </div>
      <div class="para">
        <p>FREE SHIPPING</p>
        <small>All Order Over $30</small>
      </div>
    </div>

    <div class="support_customer">
      <div class="icone">
        <i class="fas fa-headset" style="color: #FF8E0A;"></i>
        <i class="fas fa-headset animate"></i>
      </div>
      <div class="para">
        <p>SUPPORT CUSTOMER</p>
        <small>support 24/7</small>
      </div>
    </div>

    <div class="payement_security">
      <div class="icone">
        <i class="fab fa-cc-paypal" style="color: #FF8E0A;"></i>
        <i class="fab fa-cc-paypal animate"></i>
      </div>
      <div class="para">
        <p>PAYEMENT SECURITY</p>
        <small>100% Secure</small>
      </div>
    </div>

    <div class="easy_returns">
      <div class="icone">
        <i class="fas fa-hand-holding-usd" style="color: #FF8E0A;"></i>
        <i class="fas fa-hand-holding-usd animate"></i>
      </div>
      <div class="para">
        <p>EASY RETURNS</p>
        <small>Exchange & Return</small>
      </div>
    </div>

  </div>

  <!-- start shiping and coast icone -->

  <!-- start featured categories -->

  <div class="featured-categories text-center">
    <h1 class="featured-categories-title">featured categories</h1>
    <p class="featured-categories-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, omnis reiciendis? Natus eligendi praesentium maiores, quam debitis nisi ex itaque! <br> Harum tempora praesentium voluptatem temporibus eos, reiciendis recusandae assumenda! Quos.</p>
  </div>


  <div class="cards">

    <div class="card fill-orange" data-card="0">
      <div class="card__icon" data-icon="1"><img src="http://wordpress.templatemela.com/woo/WCM03/WCM030059/WP1/wp-content/uploads/2018/04/cat-2-256x320_t.jpg" style="width: 50%; height: 50%; border-radius: 50px;"></div>
      <div class="card__detail">laptop & pc <br> <span>Gaming, Other, Student</span></div>
    </div>
    <div class="card fill-blue" data-card="1">
      <div class="card__icon" data-icon="2"><img src="http://wordpress.templatemela.com/woo/WCM03/WCM030059/WP1/wp-content/uploads/2018/04/cat-4-256x320_t.jpg" style="width: 50%; height: 50%; border-radius: 50px;"></div>
      <div class="card__detail">All fashion <br> <span>baby, kids, Men</span></div>
    </div>
    <div class="card fill-green" data-card="2">
      <div class="card__icon" data-icon="3"><img src="http://wordpress.templatemela.com/woo/WCM03/WCM030059/WP1/wp-content/uploads/2018/04/cat-1-256x320_t.jpg" style="width: 50%; height: 50%; border-radius: 50px;"></div>
      <div class="card__detail">accessoires <br> <span>Computer, Mobile, Watch</span></div>
    </div>

  </div>

  <!-- end featured categories -->

  <!-- start New Products -->

  <div class="new-product">
    <h2>top Products</h2>
    <div class="line"></div>
  </div>

  <div id="gridview" class="wow bounceInLeft">
    <?php
    $query = $db_handle->runQuery("SELECT * FROM tbl_products WHERE id BETWEEN 1 AND 9 ORDER BY id ASC");
    if (!empty($query)) {
      foreach ($query as $key => $value) {
    ?>
        <div class="image view overlay zoom">
          <img src="<?php echo $query[$key]["product_image"]; ?>" />
          <button class="quick_look" data-id="<?php echo $query[$key]["id"]; ?>">Quick Look</button>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <div id="demo-modal"></div>

  <!-- end New Products -->

  <!-- start our client -->

  <div class="container z-depth-1 my-5">

  <!-- Section -->
  <section class="py-5">

    <h1 class="font-weight-bold text-center indigo-text mb-5">Our clients</h1>

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 col-lg-5 offset-lg-1">

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/38.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/34.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/40.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/36.png" alt="Sample image">
        </div>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 col-lg-5">

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/39.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/35.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/41.png" alt="Sample image">
        </div>

        <div class="view">
          <img class="img-fluid mx-auto" src="https://mdbootstrap.com/img/Photos/Template/37.png" alt="Sample image">
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!-- Section -->

</div>
  <!-- end our client -->


  <!-- start counter -->
  <div class="container my-5">


  <!--Section: Content-->
  <section class="p-5 z-depth-1">
    
    <h3 class="text-center font-weight-bold mb-5">statiques</h3>

    <div class="row d-flex justify-content-center">

      <div class="col-md-6 col-lg-3 mb-4 text-center">
        <h4 class="h1 font-weight-normal mb-3">
          <i class="fas fa-file-alt indigo-text"></i>
          <span class="d-inline-block count-up" data-from="0" data-to="100" data-time="2000">100</span>
        </h4>
        <p class="font-weight-normal text-muted">product</p>
      </div>

      <div class="col-md-6 col-lg-3 mb-4 text-center">
        <h4 class="h1 font-weight-normal mb-3">
          <i class="fas fa-layer-group indigo-text"></i>
          <span class="d-inline-block count1" data-from="0" data-to="250" data-time="2000">250</span>
        </h4>
        <p class="font-weight-normal text-muted">satisfy client</p>
      </div>

      <div class="col-md-6 col-lg-3 mb-4 text-center">
        <h4 class="h1 font-weight-normal mb-3">
          <i class="fas fa-pencil-ruler indigo-text"></i>
          <span class="d-inline-block count2" data-from="0" data-to="330" data-time="2000">330</span>
        </h4>
        <p class="font-weight-normal text-muted">order</p>
      </div>
      
      <div class="col-md-6 col-lg-3 mb-4 text-center">
        <h4 class="h1 font-weight-normal mb-3">
          <i class="fab fa-react indigo-text"></i>
          <span class="d-inline-block count3" data-from="0" data-to="430" data-time="2000">430</span>
        </h4>
        <p class="font-weight-normal text-muted">users</p>
      </div>

    </div>

  </section>
  <!--Section: Content-->

</div>
  <!-- end counter -->

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