
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Create An Account</strong></h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" method="post" action="index.php">
                          <fieldset>
                            <div class="form-group">
                                  <input class="form-control" id="name" placeholder="Name" name="nameActual" type="text" value="" autofocus required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" id="e1" placeholder="E-mail" name="email" type="email" value="" required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" id="e2" placeholder="Confirm E-mail" name="email2" type="email" value="" onkeyup="CheckEm()" required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" id="pswd1" placeholder="Password" name="password" type="password" value="" required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" id="pswd2" placeholder="Confirm Password" name="password2" type="password" value="" required>
                                  <span id="validate-status"></span>
                                  <hr>
                              </div>
                              <!-- Change this to a button or input when using this as a form -->
                              <input type="hidden" name="action" value="add_user" />
                              <button class="btn btn-lg btn-success btn-block">Sign Up</button>
                          </fieldset>
                      </form>
                      <center><a href="."><b>Already have an account?</b></a></center>
                  </div>
              </div>
          </div>
      </div>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
