<?php

require "conn.php";


if (isset($_REQUEST['signup'])){
	$username = valiate_input($_REQUEST['username']);
	$email = valiate_input($_REQUEST['email']);
	$pass = md5(valiate_input($_REQUEST['pass']));

	$sql = "INSERT into users (username, email, pass) VALUES ('$username', '$email', '$pass')";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		header('Location: ../signup.php?account=success');
	} else {
		header('Location: ../signup.php?account=error');
	}
}


function valiate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>