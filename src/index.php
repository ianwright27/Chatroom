
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Chatroom | Welcome to chatroom</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom styles -->
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/my.css" rel="stylesheet">
  </head>

  <body>
    <section>
    <div class="container-fluid text-center d-flex align-items-center">
    <form class="form-signin" action="includes/login.php">
      <img class="mb-4" src="https://img.pngio.com/chat-svg-png-icon-free-download-397748-onlinewebfontscom-chat-icon-png-980_904.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="h6 mb-3 mt-2 font-weight-normal text-primary cursor">
        <a href='signup.php'><small>Are you new? <b>Create a free account</b></small></a>
      </p>
      <p class="mt-5 mb-3 text-muted">Copyright &copy; Chatroom <?php echo '20'.date('y');?></p>
    </form>
    </div>
    <div class="container reduce-width text-center">
      <?php
        if (isset($_REQUEST['login'])){
          if($_REQUEST['login'] != 'success') {
      ?>
      <div class="alert alert-danger" role="alert">
        Invalid email or password, please try again.
      </div>
      <?php } 
      }?>
    </div>
    </section>
  </body>
</html>
