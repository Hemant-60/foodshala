<?php include './header.php';?>

<?php
  if(isset($_POST['submit'])){
    $dish_name=$_POST['dish_name'];
    $cost=$_POST['cost'];

    if($dish_name!="" && $cost!=""){
      $insertDishDetails=mysqli_query($conn,"INSERT INTO `dish`(`added_by`, `name`, `price`) VALUES ('$id','$dish_name','$cost')");
      if($insertDishDetails){
        echo"<script>alert('Dish added successfully')</script>";
        echo"<script>window.location.href='dish.php'</script>";
      }
      else echo"<script>alert('Dish not added')</script>";
    }
    else echo"<script>alert('Details must be correct')</script>";

  }
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">

        <div class="jumbotron">
          <h4 class="display-4">Add a Dish</h4>
          <p class="lead">


            <form method="post" action="dish.php">
              <div class="form-group">
                <input type="text" name="dish_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dish Name">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
              <div class="form-group">
                <input type="text" name="cost" class="form-control" id="exampleInputPassword1" placeholder="Cost">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add Dish</button>
            </form>


          </p>
          <hr class="my-4">

          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Dish Id</th>
                <th scope="col">Name</th>
                <th scope="col">Cost</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $fetchDishes=mysqli_query($conn,"SELECT * FROM `dish` where `added_by`='$id' order by id desc");
                while($res=mysqli_fetch_array($fetchDishes)){
              ?>
              <tr>
                <td><?php echo $res['id'];?></td>
                <td><?php echo $res['name'];?></td>
                <td><?php echo $res['price'];?></td>
                <td><h6><a href="deleteDish.php?dishId=<?php echo $res['id'];?>" class="badge badge-danger">Remove</a></h6></td>
              </tr>

              <?php
                }
              ?>

            </tbody>
          </table>

        </div>


      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
