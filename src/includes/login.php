<?php
require "conn.php";

session_start();

if (isset($_REQUEST['login'])){
	$email = valiate_input($_REQUEST['email']);
	$pass = md5(valiate_input($_REQUEST['pass']));

	$sql = "SELECT * FROM users WHERE email='".$email."' AND pass='".$pass."'";
	$query = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);


	if ($query) {
		if ($count == 1){
				$row  = mysqli_fetch_array($query);
        if(is_array($row))
        {
        	$_SESSION['loggedin'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['active'] = $row['active'];
					$_SESSION['last_active'] = $row['last_active'];
					$_SESSION['color_set'] = false;
				}
			header('Location: ../chat/');	
		} else {
			// header('Location: ../?login=error');
		echo 'pass';
		}
	} else {
		echo mysqli_error($conn);
	}
}


function valiate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>