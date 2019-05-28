

<?php
$conn = new mysqli("localhost","root","1234","prueba");
  // Check connection
  if ($conn->connect_error) {
    die("Connexcion mala " . $conn->connect_error);

  } 
  ?>