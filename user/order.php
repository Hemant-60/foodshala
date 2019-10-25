<?php include './header.php';?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <br>
<center>
    <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">Item</th>
      <th scope="col">Restaurant</th>
      <th scope="col">Cost</th>
      <th scope="col">Date</th>
    </tr>
      </thead>
      <tbody>

        <?php
          $fetchOrder=mysqli_query($conn,"SELECT * FROM item_order where placed_by='$id'");
          while($res=mysqli_fetch_array($fetchOrder)){
            $DishId=$res['dish'];
            $fetchDishDetails=mysqli_query($conn,"SELECT * FROM dish where id='$DishId'");
            while($DishDetails=mysqli_fetch_array($fetchDishDetails)){
              $restroId=$DishDetails['added_by'];
              $fetchRestroDetails=mysqli_query($conn,"SELECT * FROM restro where id='$restroId'");
              while($RestroDetails=mysqli_fetch_array($fetchRestroDetails)){
        ?>

                <tr>
                <td scope="row"><?php echo $DishDetails['name'];?></th>
                <td><?php echo $RestroDetails['name'];?></td>
                <td><?php echo $DishDetails['price'];?></td>
                <td><?php echo $res['date'];?></td>
                </tr>

      <?php
            }
          }
        }
      ?>
      <!-- <tr>
      <th scope="row">Shahi Paneer</th>
      <td>Om sweets</td>
      <td>300</td>
      <td>12/12/1997</td>
      </tr> -->

      </tbody>
    </table>

</center>

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
