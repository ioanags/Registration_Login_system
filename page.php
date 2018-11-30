<?php
session_start();

echo "Email: ". $_SESSION['email'] ;
echo "<br>Όνομα χρήστη: ". $_SESSION['name'];

 ?>
