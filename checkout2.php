<?php

if(isset($_POST['send_user_order_information'])){
  header('location: payement.php');
}

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

    <table class="table table-hover container">
          <thead>
            <tr>
              <th>img</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>

          <?php
    $query = $db_handle->runQuery("SELECT * FROM tbl_products JOIN my_card ON tbl_products.id = my_card.product WHERE my_card.product_for =".$_SESSION['id']."");
    if (!empty($query)) {
      foreach ($query as $key => $value) {
    ?>
        <tr> 
              <td><img src="<?php echo $query[$key]["product_image"];?>" alt="card_product" style="width:100px; border-radius: 25px;"></td>
              <td><?php echo $query[$key]["name"]; ?></td>
              <td><?php echo $query[$key]["price"]." MAD"; ?></td>
              <td><a href="checkout2.php?deleteFromCard=<?php echo $query[$key]['id'] ?>"><i class="fas fa-times"></i></a></td>
        </tr>
    <?php
      }
    }
    ?>
          </tbody>
    </table>

    <?php
    if(isset($_POST['send_user_order_information'])){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);

        if(empty($email)){
            $formerrors[] = 'please set your email' . '<br>';
        }

        if(empty($phone)){
          $formerrors[] = 'please set your phone' . '<br>';
      }

        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parametres)]

        $headers = 'From: ' . $email . '\r\n';
        $Myemail = 'aibiyassin8@gmail.com';
        $subject = 'order Form agadirMall';
        $message = $_SESSION['user'] . $email . "<br>" . $phone;

        if(empty($formErrors)){
            mail($Myemail, $subject, $message, $headers);

            $email = '';
            $phone = '';
            $message = '';
        }
    }
?>

<div class="container" style="margin-top: 8%;">
<form class="needs-validation" action="" method="POST">

<?php if(!empty($formerrors)){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <?php
                        foreach($formerrors as $errors){
                            echo $errors;
                        }
                ?>
                    </div>
                <?php } ?>

  <div class="form-row">
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3 md-form">
      <label for="validationCustom032">shiping adress</label>
      <input type="text" class="form-control" id="validationCustom032" name="email" value="<?php if(isset($email)){ echo $email;}?>" required >
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>

    <div class="col-md-3 mb-3 md-form">
      <label for="validationCustom052">phone</label>
      <input type="text" class="form-control" id="validationCustom052" name="phone" value="<?php if(isset($phone)){ echo $phone;}?>" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>

  <input class="btn btn-primary btn-sm btn-rounded" type="submit" value="Complete purchase" name="send_user_order_information">

</form>
</div>

    <!-- start footer -->

    <?php include 'footer.php'; ?>

    <!-- end footer -->

    <!-- JS, Popper.js, and jQuery -->
    <?php include 'allscript.php'; ?>

