<?php
require "../includes/conn.php";
require "../includes/auth.php";

// mark as active
markActive();

// determine active people
$active_chats = getActive();

// get random chat color
if ($_SESSION['color_set'] == false){
  setChatColor();
  $_SESSION['color_set'] = true;
}
// function declarations
function markActive(){
  global $conn;
  $sql = "UPDATE users SET `active`= '1' WHERE id='".$_SESSION['id']."'";
  if (!mysqli_query($conn, $sql)){
    echo mysqli_error($conn);
  }
}

function getActive(){
  global $conn;
  $sql = "SELECT * FROM users WHERE active='1' ";
  $query = mysqli_query($conn, $sql);
  if ($query){
    $count = mysqli_num_rows($query);
    return $count;
  } else {
    echo mysqli_error($conn);
  }
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function setChatColor(){
  global $conn;
  $sql = "UPDATE users SET `color`= '".random_color()."' WHERE id='".$_SESSION['id']."'";
  if (!mysqli_query($conn, $sql)){
    echo mysqli_error($conn);
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo $_SESSION['username'];?> | Chat with others in Chatroom</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <!-- <link href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fontawesome core CSS -->
    <!-- <link rel="stylesheet" href="../assets/libs/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles -->
    <link href="../assets/css/signin.css" rel="stylesheet">
    <link href="../assets/css/my.css" rel="stylesheet">

    <link href="../assets/css/offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="">Chatroom</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../includes/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="nav-scroller bg-white box-shadow">
      <nav class="nav nav-underline">
        <a class="nav-link active" href="#">Edit profile</a>
        <a class="nav-link" href="#">
          Active
          <span class="badge badge-pill bg-light align-text-bottom"><?php echo $active_chats; ?></span>
        </a>
      </nav>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-4">
          <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0"><?php echo $_SESSION['username']; ?></h6>
            <div class="alert alert-info  mt-3 mb-0" role="alert">
              <small>Reminder! Do not use language of offensive nature.</small>
            </div>
            <form action="" method="POST" class="pt-0 pb-0">
              <br>
              <label for="message" class="text-small">
                <small>Message</small>
              </label><br>
              <textarea name="message" id="" cols="30" rows="3" placeholder="Type a message..." class="form-control placeholder-font"></textarea>
              <button class="btn btn-md mt-2 btn-primary " type="submit" name="submit">
                <small>Send</small>
              </button>
            </form>
<?php

require "../includes/conn.php";
if (isset($_REQUEST['submit'])){
  $message = valiate_input($_REQUEST['message']);
  $message = addslashes($message);
  $user_id = $_SESSION['id'];

  $sql = "INSERT into messages (user_id, message) VALUES ('$user_id','$message')";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    ?>
    <script>
      window.location = '';
    </script>
    <?php
  } else {
    echo mysqli_error($conn);
    echo '<br>'.$sql;
  }

}

function valiate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
            <small class="d-block text-right mt-3">
              <!-- <a href="#">All updates</a> -->
            </small>
          </div>
        </div>
        <div class="col-8">
          <div class="my-3 p-3 bg-white rounded box-shadow" style="max-height: 480px;">
            <h6 class="border-bottom border-gray pb-2 mb-0">Chats</h6>
            <div class="my-3 pb-3 bg-white" style="max-height: 370px; overflow-y: hidden; overflow-y: scroll;">
            
<?php
$sql = "SELECT * FROM messages ORDER BY time_sent DESC";
$query = mysqli_query($conn, $sql);

if ($query) {
  // $rows = mysqli_fetch_array($query);
  // if (is_array($rows)){

    while($row = mysqli_fetch_assoc($query)){
      $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["time_sent"] );
      // echo $new_datetime->format('d/m/y, H:i:s');

      // if ($new_datetime->format('Y-m-d') == date('Y-m-d')){
      //   echo 'they are the same';
      // }
      if (checkActive($row["user_id"]) == 1){
        echo 
        '
          <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block mb-1">
              <span class="font-weight-bold" style="color: #'.getColor($row["user_id"]).'">@'.getUsername($row["user_id"]).'</span>
              <span><i class="fa fa-circle active" aria-hidden="true"></i></span></strong>
              '.$row["message"].'
            <span class="pb-0 mb-0 mt-1 d-block small text-secondary font-weight-bold">'.$new_datetime->format('H:i').'</span>
            </p>
          </div>
        ';        
      } else {
        echo 
        '
          <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block mb-1">
              <span class="font-weight-bold" style="color: #'.getColor($row["user_id"]).'">@'.getUsername($row["user_id"]).'</span><br>
              <!--<span><i class="fa fa-circle active" aria-hidden="true"></i></span>--></strong>
              '.$row["message"].'
            <span class="pb-0 mb-0 mt-1 d-block small text-secondary font-weight-bold">'.$new_datetime->format('H:i').'</span>
            </p>
          </div>
        ';
      }

    } 

  // } else {

  //     echo '<p class="mt-5 mb-5 text-secondary text-center"><small>There are no messages yet.</small></p>';

  // }
    
}

function getUsername($user_id){
  global $conn;
  $sql = "SELECT * FROM users WHERE id ='".$user_id."'";
  $query = mysqli_query($conn, $sql);

  if ($query) {  
    $row  = mysqli_fetch_array($query);
    if(is_array($row)) {
      return $row['username'];
    }
  } else {
    echo mysqli_error($conn);
  }
}

function checkActive($user_id){
  global $conn;
  $sql = "SELECT * FROM users WHERE id ='".$user_id."'";
  $query = mysqli_query($conn, $sql);

  if ($query) {  
    $row  = mysqli_fetch_array($query);
    if(is_array($row)) {
      if ($row['active'] == '1'){
        return 1;
      } else {
        return 0;
      }
    }
  } else {
    echo mysqli_error($conn);
  }
}

function getColor($user_id){
  global $conn;
  $sql = "SELECT * FROM users WHERE id ='".$user_id."'";
  $query = mysqli_query($conn, $sql);

  if ($query) {  
    $row  = mysqli_fetch_array($query);
    if(is_array($row)) {
      return $row['color'];
    }
  } else {
    echo mysqli_error($conn);
  }
}

?>
          </div>
            <small class="d-block text-right mt-3">
              <a href="https://github.com/ianwright27"><b>github.com/ianwright27</b></a>
            </small>
        </div>
      </div>
        

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
