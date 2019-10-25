
<?php include 'dbconn.php';?>
<?php
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $conf_pass=$_POST['conf_pass'];

    if(($pass!="") &&($pass==$conf_pass)){
      $query="INSERT INTO `user`( `name`, `email`, `pass`) VALUES ('$name','$email','$pass')";
      $res=mysqli_query($conn,$query);
      if($res){
        echo"<script>alert('Created account successfully. Please login')</script>";
        echo"<script>window.location.href='user.php'</script>";
      }
      else echo"<script>alert('Details are incorrect')</script>";
      // if($res) {
      //   $activateSessionQuery="SELECT * FROM user where email='$email'";
      //   $execQuery=mysqli_query($conn,$activateSessionQuery);
      //
      //   while($fetchRes=mysqli_fetch_array($execQuery)){
      //     session_start();
      //     $_SESSION['id']=$res['id'];
      //     $_SESSION['type']="user";
      //     echo"<script>window.location.href='user/account.php'</script>";
      //   }
      //
      //
      // }
    }


    else echo"<script>alert('Wrong Details')</script>";

  }
?>
