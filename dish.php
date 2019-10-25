<?php include './include/header.php';?>
<?php include 'dbconn.php';?>

<?php
  $fetchDish=mysqli_query($conn,"SELECT * FROM dish ");

?>
  <!-- Page Content -->
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
<center>

      <div class="col-lg-6 mb-4">
        <?php
          while($DishDetails=mysqli_fetch_array($fetchDish)){
            $restroId=$DishDetails['added_by'];
            $fetchRestro=mysqli_query($conn,"SELECT * from restro where id='$restroId'");
            while($restroDetails=mysqli_fetch_array($fetchRestro)){
        ?>
            <div class="card h-100">
              <div class="card-body ">
                <p class="card-text float-left">
                  <b><?php echo$DishDetails['name'];?></b><i> by </i><b><?php echo$restroDetails['name'];?></b></p><br>
                  <p class="card-text float-right">Rs. <?php echo$DishDetails['price'];?></p>

              </div>
              <div class="card-footer">
                <a href="user.php" class="btn btn-primary float-right"><span class="glyphicon glyphicon-shopping-cart"></span> Place Order</a>
              </div>
            </div><br>

      <?php
            }
          }
      ?>

    </div>

</center>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
