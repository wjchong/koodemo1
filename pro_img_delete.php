<?php
include('config.php');
 echo $id=$_POST['id'];

//
$remove = mysqli_query($conn,"UPDATE products SET image='' WHERE id='$id'");
 //$remove = mysqli_query($conn,"DELETE FROM products WHERE id ='$id'");

?>