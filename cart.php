<?php
  //REDIRECTS TO INDEX PAGE IF NO ONE LOGS IN
  //ASSUME A SESSION HAS ALREADY BEEN STARTED
  //include('redirect_to_home.php');
  session_start();
  require_once('DBQuery.php');
  include 'books\view_books.php';   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="navbar-brand" href="#">Project name</a-->
          <?php
            //SHOWS USER'S NAME
            echo "<a class='navbar-brand' href='main.php'>Hello, ".$_SESSION['name']."</a>";
          ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="main.php">Home</a></li>
            <li><a href="#about">Wish List</a></li>
            <li class="active"><a href="#">Cart</a></li>
            <li><a href="logout.php">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php
        //FIX THAT CODING!!! (NOTE TO SELF, RAJ)
        $query = "SELECT * FROM `user` WHERE `email` = '".$_SESSION['email']."';";
        $fetch = new DBQuery($query);
        $fetch->execute_query();
        $result=$fetch->get_result();
        $row = $result->fetch_assoc();
        if(is_null($row['cart'])||$row['cart']===''){
          echo "<div class='container'>
                  <div class='starter-template'>
                    <h1>Shopping Cart</h1>
                    <p class='lead'>Your Shopping Cart is empty.</p>
                  </div>
                </div><!-- /.container -->";
        }
        else{
          //CHANGE TEXT TO ISBN?
          //FETCHES ALL TITLES FROM CART
          $books = explode(",",$row['cart']);
          $query = "SELECT * FROM `book` WHERE";
          foreach($books as $value){
              $query .= " `title` = '".$value."' OR"; 
          }
          $query = chop($query,"OR");
          $query .= ";";
          $fetch->set_query($query);
          $fetch->execute_query();
          $result2=$fetch->get_result();
          //DISPLAYS ALL BOOKS IN CART LIST
          echo "<div class='container'>
                 <div class='starter-template'>
                    <h1>Shopping Cart</h1>
                 </div>";
          while($row2 = $result2->fetch_assoc()){
             echo "<div class='row'>
                      <img src='img/book.png' class='img-responsive' alt='Responsive image'>
                      <p>".$row2['title']."</p>
                      <form action='books/index.php' method='POST'>
                      <button class='btn btn-default' type='submit'>View details &raquo;</button>
                      </form>
                   </div>";
          }
          echo "</div>";

        }
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>