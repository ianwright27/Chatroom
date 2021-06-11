<?php
require "conn.php";

session_start();
if (isset($_SESSION['loggedin'])){
    // no longer online anymore
    markUnactive();

    // destroy session
    session_destroy();

    // back to login
    header("Location: ../");
}

// function declaration
function markUnactive(){
  global $conn;
  $sql = "UPDATE users SET `active`= '0' WHERE id='".$_SESSION['id']."'";
  if (!mysqli_query($conn, $sql)){
    echo mysqli_error($conn);
  }
}

?>