<?php include 'header.php';?>

  <!-- Page Content -->
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
<center>

      <div class="col-lg-6 mb-4">

        <?php
          $fetchDishes=mysqli_query($conn,"SELECT * FROM dish order by id desc");
          while($res=mysqli_fetch_array($fetchDishes)){
            $restroId=$res['added_by'];
            $fetchRestroName=mysqli_query($conn,"SELECT * FROM `restro` where `id`='$restroId'");
            while($restroDetails=mysqli_fetch_array($fetchRestroName)){
        ?>

          <div class="card h-100">
            <div class="card-body ">
              <p class="card-text float-left">
                <b> <?php echo$res['name'];?></b><i> by </i><b><?php echo $restroDetails['name'];?></b></p><br>
                <p class="card-text float-right">Cost: Rs. <?php echo$res['price'];?></p>

            </div>
            <div class="card-footer">
              <a href="place_order.php?dishId=<?php echo $res['id'];?>" class="btn btn-primary float-right"><span class="glyphicon glyphicon-shopping-cart"></span> Place Order</a>
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
  <script src="../pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
