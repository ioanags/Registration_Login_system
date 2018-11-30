<?php
include 'server.php';

//ερώτηση στη β΄άση εάν υπάρχει το email που έχει εισάγει ο χρήστης
 $email = mysqli_real_escape_string($con, $_POST["email"]);
 $query = "SELECT * FROM xristes WHERE email = '".$email."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);


?>
