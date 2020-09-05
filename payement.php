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

        <!-- Card -->
        <div class="container">
            <div class="card testimonial-card">

            <!-- Background color -->
            <div class="card-up indigo lighten-1"></div>

            <!-- Avatar -->
            <div class="avatar mx-auto white">
                <img src="<?php echo $_SESSION['avatar'] ?>" class="rounded-circle"
                alt="woman avatar" width="100%">
            </div>

            <!-- Content -->
            <div class="card-body">
                <!-- Name -->
                <h4 class="card-title" style="font-size: 40px; font-weight: bold;"><?php echo $_SESSION['user'] ?></h4>
                <hr>
                <!-- Quotation -->
                <p><i class="fas fa-quote-left"></i> total payement is :<h1 style="font-size: 60px; padding: 3%; font-weight: bold; font-family: monospace;"><?php echo $_SESSION['total_price'] . " MAD" ?></h1></p>

                
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="aibiyassin8@gmail.com">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="agadirmall">
                    <input type="hidden" name="amount" value="<?php echo $_SESSION['total_price'] * 0.1086 ?>">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                    <input type="submit" class="btn peach-gradient" src="https://www.paypalobjects.com/fr_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" value="place order" style="font-size: 15px; margin: 40px;" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                    <img alt="" border="0" src="https://www.paypalobjects.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
                </form>

            </div>

            </div>
        </div>
        <!-- Card -->

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