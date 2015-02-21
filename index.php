<?php
  include 'books/view_books.php';
  $signedin = false;
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Index</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">Amazon Wanna-Be</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--------------------------------------FORM-------------------------------------------------->
          <form action="log.php" class="navbar-form navbar-right" method="POST">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a role="button" href="register.php" class="btn btn-default">Register</a>
            <?php
              //INVALID USERNAME, PASSWORD MESSAGE
              if (isset($_SESSION['invalid'])){
                echo "<p style='color:red; margin:5px'>".$_SESSION['invalid']."</p><br>";
                unset($_SESSION['invalid']);
              }
            ?>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Featured Books</h1>
        <p>Something about how we feature books.</p>
      </div>
    </div>

    <div class="container">
      <!-- row of books -->
      <?php $random1 = rand(0,13); 
            $random2 = rand(0,13); 
            $random3 = rand(0,13);
      ?>
      <div class="row">
        <div class="col-md-4">
          <img src="img/book.png" class="img-responsive" alt="Responsive image">
          <p><?php printf("%s",$thisresult[$random1][1]);?></p>
          <form action="books/index.php" method="POST">
          <button class="btn btn-default" type="submit">View details &raquo;</button>
          <input type="hidden" name="isbn" value="<?php echo $thisresult[$random1][0]; ?>">
          </form>
        </div>
        <div class="col-md-4">
          <img src="img/book.png" class="img-responsive" alt="Responsive image">
          <p><?php printf("%s",$thisresult[$random2][1]);?></p>
          <form action="books/index.php" method="POST">
          <button class="btn btn-default" type="submit">View details &raquo;</button>
          <input type="hidden" name="isbn" value="<?php echo $thisresult[$random2][0]; ?>">
          </form>
       </div>
        <div class="col-md-4">
          <img src="img/book.png" class="img-responsive" alt="Responsive image">
          <p><?php printf("%s",$thisresult[$random3][1]);?></p>
          <form action="books/index.php" method="POST">
          <button class="btn btn-default" type="submit">View details &raquo;</button>
          <input type="hidden" name="isbn" value="<?php echo $thisresult[$random3][0]; ?>">
          </form>
        </div>
    </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
