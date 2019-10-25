<?php include './header.php';?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <br>
<center>
        <div class="col-lg-6 mb-4">
          <?php
            $fetchOrder=mysqli_query($conn,"SELECT * FROM item_order where dish in (SELECT id from dish where added_by='$id') order by id desc");
            while($res=mysqli_fetch_array($fetchOrder)){
              $dishId=$res['dish'];
              $fetchDish=mysqli_query($conn,"SELECT * FROM dish where id='$dishId'");
              $UserId=$res['placed_by'];
              $fetchUser=mysqli_query($conn,"SELECT * from user where id='$UserId'");
              while($DishDetails=mysqli_fetch_array($fetchDish)){
                while($USerDetails=mysqli_fetch_array($fetchUser)){

          ?>
        <div class="card h-100">
          <div class="card-body ">
            <p class="card-text ">
              <b> <?php echo $DishDetails['name']?></b><i> ordered by </i><b><?php echo $USerDetails['name']."(".$USerDetails['email'].")";?></b></p>
              <p class="card-text "><b>Address : </b><?php echo $USerDetails['addr'];?></p>
              <p class="card-text "><font color="gray"><?php echo $res['date'];?></font></p>
              <p class="card-text float-right">Order Total: Rs. <?php echo $DishDetails['price'];?></p>


          </div>
          <!-- <div class="card-footer">
            <a href="#" class="btn btn-primary float-right"><span class="glyphicon glyphicon-shopping-cart"></span> Cancel Order</a>
          </div> -->
        </div><br>

        <?php
              }
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
