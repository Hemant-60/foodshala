<?php include './include/header.php';?>
<?php include 'dbconn.php';?>

<?php
//Login verification
  if(isset($_POST['login_sub'])){
    $email=$_POST['login_email'];
    $pass=$_POST['login_pass'];
    $query="SELECT * FROM `user` WHERE email='$email' and pass='$pass'";
    $execQuery=mysqli_query($conn,$query);
    if(mysqli_num_rows($execQuery)>0){
      while($res=mysqli_fetch_array($execQuery)){
        session_start();
        $_SESSION['id']=$res['id'];
        $_SESSION['type']="user";
        echo"<script>window.location.href='user/account.php'</script>";
      }
    }
    else echo"<script>alert('Wrong Details')</script>";
  }
?>



  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">

<!---------Form Starting ---------->

<div class="container login-container">
  <h2><span class="badge badge-danger">Users</span></h2>
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    <form action="user.php" method="post">
                        <div class="form-group">
                            <input type="text" name="login_email" class="form-control" placeholder="Your Email *"  />
                        </div>
                        <div class="form-group">
                            <input type="password" name="login_pass" class="form-control" placeholder="Your Password *" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login_sub" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Signup</h3>
                    <form action="user_signup.php" method="post">
                      <div class="form-group">
                          <input type="text" name="name" class="form-control" placeholder="Name" value="" />
                      </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email " value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="conf_pass" class="form-control" placeholder="Confirm Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnSubmit" value="Signup" />
                        </div>

                    </form>
                </div>
            </div>
        </div>

<!------End Form------>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="pages/vendor/jquery/jquery.slim.min.js"></script>
  <script src="pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
