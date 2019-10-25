<?php include './header.php';?>

<?php
  if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $addr=$_POST['addr'];
    $pass=$_POST['newPass'];
    $confPass=$_POST['ConfPass'];

    if($name!="" && $email!="" && $addr!="" && $pass!="" && $confPass!="" && $pass==$confPass){
      $execQuery=mysqli_query($conn,"UPDATE `user` SET `name`='$name',`email`='$email',`pass`='$pass',`addr`='$addr' WHERE id='$id'");
      if($execQuery) {
        echo"<script>alert('Updated Successfully')</script>";
        echo"<script>window.location.href='./account.php'</script>";
      }
    }else echo"<script>alert('Details are incorrect')</script>";

  }
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">

        <div class="jumbotron">
          <h1 class="display-4">Account Details</h1>
          <p class="lead">

            <?php

              $fetchDataQuery=mysqli_query($conn,"SELECT * FROM user where id='$id'");

              while($res=mysqli_fetch_array($fetchDataQuery)){
            ?>


            <form method="post" action="account.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" accept=""id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['name'];?>" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['email'];?>" placeholder="Enter email" readonly/>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" name="addr" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['addr'];?>" placeholder="address">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" class="form-control" name="newPass" value="<?php echo $res['pass'];?>" id="exampleInputPassword1" placeholder="New Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm New Password</label>
                <input type="password" class="form-control" name="ConfPass" value="<?php echo $res['pass'];?>" id="exampleInputPassword1" placeholder="Confirm New Password">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Make Changes</button>
            </form>

            <?php
              }
            ?>



          </p>
          <hr class="my-4">
        </div>


      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
