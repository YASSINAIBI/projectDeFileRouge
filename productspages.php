<?php
   $getcategyname = htmlspecialchars($_GET["category"]);
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

    <div class="breadcrumb_nav text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $getcategyname ?></li>
            </ol>
        </nav>
    </div>

    <div id="gridview">
    <?php
    $query = $db_handle->runQuery("SELECT * FROM tbl_products WHERE category='$getcategyname'");
    if (!empty($query)) {
      foreach ($query as $key => $value) {
    ?>
        <div class="image">
          <img src="<?php echo $query[$key]["product_image"]; ?>" />
          <button class="quick_look" data-id="<?php echo $query[$key]["id"]; ?>">Quick Look</button>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <div id="demo-modal"></div>

    <!-- start footer -->

    <?php include 'footer.php'; ?>

    <!-- end footer -->

    <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

