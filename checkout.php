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
    <div class="container my-5 py-3 z-depth-1 rounded">


<!--Section: Content-->
<section class="dark-grey-text">

  <!-- Shopping Cart table -->
  <div class="table-responsive">

    <table class="table product-table mb-0">

      <!-- Table head -->
      <thead class="mdb-color lighten-5">
        <tr>
          <th></th>
          <th class="font-weight-bold">
            <strong>Product</strong>
          </th>
          <th class="font-weight-bold">
            <strong>Price</strong>
          </th>
        </tr>
      </thead>
      <!-- /.Table head -->

      <!-- Table body -->
      <tbody>

        <!-- First row -->
        <?php
    $query = $db_handle->runQuery("SELECT * FROM tbl_products JOIN my_card ON tbl_products.id = my_card.product WHERE my_card.product_for =".$_SESSION['id']."");
    $i = 0;
    if (!empty($query)) {
      foreach ($query as $key => $value) {
        $i++;
    ?>
        <tr>
          <th scope="row">
            <img src="<?php echo $query[$key]["product_image"];?>" alt="" class="img-fluid z-depth-0">
          </th>
          <td>
            <h5 class="mt-3">
              <strong><?php echo $query[$key]["name"]; ?></strong>
            </h5>
          </td>
          <td style="font-size: 30px; color: darkgray;"><?php echo $query[$key]["price"]." MAD"; ?></td>
        </tr>
    <?php
      }
    }
    ?>
        <!-- /.First row -->

        <!-- Fourth row -->
        <tr>
          <td colspan="3"></td>
          <td>
            <h4 class="mt-2">
              <strong style="font-size: 40px;">Total</strong>
            </h4>
          </td>
          <td class="text-right">
            <h4 class="mt-2">
              <strong style="font-size: 30px; color: darkgray;"><?php echo $_SESSION['total_price'] . " MAD" ?></strong>
            </h4>
          </td>
          <td colspan="3" class="text-right">
            <a href="checkout2.php"><button type="button" class="btn btn-primary btn-rounded">continue purchase
              <i class="fas fa-angle-right right"></i>
            </button>
            </a>
          </td>
        </tr>
        <!-- Fourth row -->

      </tbody>
      <!-- /.Table body -->

    </table>

  </div>
  <!-- /.Shopping Cart table -->

</section>
<!--Section: Content-->


</div>

    <!-- start footer -->

    <?php include 'footer.php'; ?>

    <!-- end footer -->

    <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

