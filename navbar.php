
<?php
include_once 'db.php';
$db_handle = new DBController();
?>

<?php include('server.php') ?>

<?php
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: singin.php");
  }
?>

<div class="navbar fist">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li class="pipe">|</li>
      <li><a href="contact.php">contact us</a></li>
    </ul>

    <ul>
      <li><i class="fas fa-phone-volume fa-2x" style="color: #BCBCBC;"></i>Call Us (+212) 6 444 601 87</li>
      <li><i class="fab fa-facebook-square fa-2x" style="color: #BCBCBC;"></i></li>
      <li><i class="fab fa-twitter-square fa-2x" style="color: #BCBCBC;"></i></li>
      <li><i class="fab fa-linkedin fa-2x" style="color: #BCBCBC;"></i></li>
      <li><i class="fab fa-youtube fa-2x" style="color: #BCBCBC;"></i></li>
    </ul>
  </div>

  <div class="navbar secound">
    <ul>
      <!--Dropdown primary-->
      <div class="dropdown">

      <!--Trigger-->

      <li class="shop-by-categorie dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars fa-2x" style="align-self: center; cursor: pointer;"></i><span style="margin: 0px 10px;">Shop By <br> Catgories</span><i class="fas fa-chevron-down" style="align-self: center"></i></li>

      <!--Menu-->
      <div class="dropdown-menu dropdown-primary">
        <a class="dropdown-item" href="productspages.php?category=automobile-and-part">Automobiles & Parts</a>
        <a class="dropdown-item" href="productspages.php?category=smart-watch">Smart watch</a>
        <a class="dropdown-item" href="productspages.php?category=casques">Casques</a>
        <a class="dropdown-item" href="productspages.php?category=cle-usb">Cle usb</a>
        <a class="dropdown-item" href="productspages.php?category=cable">cables & chargeur</a>
        <a class="dropdown-item" href="productspages.php?category=haut-parleur">haut parleur</a>
        <a class="dropdown-item" href="productspages.php?category=memory-card">Memory card</a>
      </div>
      </div>
      <!--/Dropdown primary-->

      <a href="index.php"><li class="logo"><span class="agadir">agadir</span><span class="mall">mall</span></li></a>
      <li>
        <div class="input-group" style="border: 1px solid #ced4da; border-radius: 5px;">
          <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="search products" style="border: none;">

          <div class="input-group-append">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="box-shadow: none;"><span class="inputtext">All categorie</span></button>
            <div class="dropdown-menu">
              <a href="productspages.php?category=automobile-and-part" target="_blank" class="dropdown-item">Automobiles & Parts</a>

              <a href="productspages.php?category=smart-watch" target="_blank" class="dropdown-item">Smart watch</a>

              <a href="productspages.php?category=casques" target="_blank" class="dropdown-item">Casques</a>

              <a href="productspages.php?category=cle-usb" target="_blank" class="dropdown-item">Cle usb</a>

              <a href="productspages.php?category=cable" target="_blank" class="dropdown-item">cables & chargeur</a>

              <a href="productspages.php?category=haut-parleur" target="_blank" class="dropdown-item">haut parleur</a>

              <a href="productspages.php?category=memory-card" target="_blank" class="dropdown-item">Memory card</a>
            </div>
          </div>
        </div>

        <input type="submit" class="btn shearch_btn" value="search">
      </li>

    <?php 
      if (isset($_SESSION['user'])) {
    ?> 

      <!-- Basic dropdown -->
      <li>

      <div class="btn-group">
      <button class="btn peach-gradient dropdown-toggle mr-4" type="submit" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"><?php echo "welcome " . $_SESSION['user'] ?></button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="userspace.php">agadirMall user space</a>
        <a class="dropdown-item" href="#">My Order</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="index.php?logout='1'">logout</a>
      </div>
      </div>
      </li>
      <!-- Basic dropdown -->

<!-- Button trigger modal -->

    <li style="position: relative; cursor: pointer;"  data-toggle="modal" data-target="#modalCart"><i class="fas fa-shopping-bag fa-2x" style="margin-left: -45px !important; display:contents"></i><span class="user_icone">My Cart</span><span class="number_in_card">0</span></li>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Your cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>img</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>

          <?php
    $query = $db_handle->runQuery("SELECT * FROM tbl_products JOIN my_card ON tbl_products.id = my_card.product WHERE my_card.product_for =".$_SESSION['id']."");
    $i = 0;
    if (!empty($query)) {
      foreach ($query as $key => $value) {
        $i++;
    ?>
        <tr> 
              <th scope="row"><?php echo $i ?></th>
              <td><img src="<?php echo $query[$key]["product_image"];?>" alt="card_product" style="width:100px; border-radius: 25px;"></td>
              <td><?php echo $query[$key]["name"]; ?></td>
              <td><?php echo $query[$key]["price"]." MAD"; ?></td>
              <td><a href="index.php?deleteFromCard=<?php echo $query[$key]['id'] ?>"><i class="fas fa-times"></i></a></td>
        </tr>
    <?php
      }
    }
    ?>

    <?php
    $Myquery = $db_handle->runQuery("SELECT SUM(price) FROM tbl_products JOIN my_card ON tbl_products.id = my_card.product WHERE my_card.product_for =".$_SESSION['id']."");
    if (!empty($Myquery)) {
      foreach ($Myquery as $key => $value) {
    ?>
            <tr class="total">
              <td>Total</td>
              <td><?php echo $Myquery[$key]["SUM(price)"] . " MAD" ; $_SESSION['total_price'] = $Myquery[$key]["SUM(price)"] ?></td>
              <td></td>
            </tr>
    <?php
      }
    }
    ?>
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <a href="checkout.php"><button class="btn btn-primary">Checkout</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

    <?php }
    else{

    ?>	
      <a href="singin.php"><li><i class="fas fa-user fa-2x"></i><span class="user_icone">Sing In</span></li></a>

      <li style="position: relative"><i class="fas fa-shopping-bag fa-2x"></i><span class="user_icone">My Cart</span><span class="number_in_card">0</span></li>

    <?php } ?>

      <li></li>
    </ul>
  </div>



