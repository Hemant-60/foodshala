<?php include 'header.php';?>
<?php
  $DishId=$_GET['dishId'];
  $todayDate=date("Y-m-d") ;
  $placeOrderQuery=mysqli_query($conn,"INSERT INTO `item_order`(`placed_by`, `dish`, `date`) VALUES ('$id','$DishId','$todayDate')");

  if($placeOrderQuery) echo"<script>alert('Order Placed Successfully.')</script>";
  else echo"<script>alert('Order can't be placed')</script>";

  echo"<script>window.location.href='order.php'</script>";

?>
