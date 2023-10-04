<?php
//connect to database
$conn = mysqli_connect("localhost", "rodrigo", "password", 'ninja_pizza');
// check connection
//if(!$conn){
  //  echo "Connection error: " . mysqli_connect_error();
//}

?>
<?php

include("Templates/header.php");

include("Templates/footer.php");

?>


