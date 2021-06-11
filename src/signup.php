
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
      <form class="form-signin" action="includes/signup.php">
        <img class="mb-4" src="https://img.pngio.com/chat-svg-png-icon-free-download-397748-onlinewebfontscom-chat-icon-png-980_904.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <small><input type="checkbox" value="remember-me"> I agree to the terms and conditions</small>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign up</button>
        <p class="h6 mb-3 mt-2 font-weight-normal text-primary cursor">
          <a href='/chatroom'><small>Already have an account? <b>Log in</b></small></a>
        </p>
        <p class="mt-5 mb-3 text-muted">Copyright &copy; Chatroom <?php echo '20'.date('y');?></p>
      </form>   
    </div>
    <div class="container reduce-width text-center">
      <?php
        if (isset($_REQUEST['account'])){
          if($_REQUEST['account'] == 'success') {
      ?>
      <div class="alert alert-success" role="alert">
        Account created successfully!
      </div>
      <?php } else { ?>
      <div class="alert alert-danger" role="alert">
        Something went wrong, please try again
      </div>
      <?php } 
      }?>
    </div>
    </section>


  </body>
</html>

<style>
</style>
