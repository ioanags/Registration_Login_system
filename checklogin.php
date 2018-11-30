<?php
include ('server.php');
session_start();


  $email="";
  $password="";


  if (isset($_POST['submit']))
{
  //εισαγωγή των τιμών της φορμας για ασφάλεια απο sql injection
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  //έλεγχος εάν υπάρχει ο χρήστης και εάν υπάρχει έλεγχος εάν ταιριάζει το email με το password
  //εάν ταιριάζουν redirect se page.php και εμ΄φανιση ονόματος και email.

    $sql = "SELECT * FROM xristes WHERE email = '$email'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==0)
       {
        echo"O χρήστης δεν υπάρχει";
       }
       else
       {
  	      $password = md5($password);
  	      $query = "SELECT * FROM xristes WHERE email='$email' AND password='$password'";
  	      $results = mysqli_query($con, $query);
  	      if (mysqli_num_rows($results) == 1)
           {
             while( $row = mysqli_fetch_array($results))
              {
                  $_SESSION["name"] = $row["name"];
              }
  	          $_SESSION['email'] = $email;
  	          header('location:page.php');
  	        }
            else
            {
              echo "<p>Λάθος συνδυασμός email password</p>";
  	        }
       }
 }


?>
