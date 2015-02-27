<?php
  //REDIRECTS TO INDEX PAGE IF NO ONE LOGS IN
  //ASSUME A SESSION HAS ALREADY BEEN STARTED
  //include('redirect_to_home.php');
  session_start();
  require_once('DBQuery.php');
  include 'books\view_books.php';  
  $totalPrice = 0; 
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
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
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
            <li><a href="books/explore.php">Explore</a></li>
            <li><a href="#wishlist">Wish List</a></li>
            <li class="active"><a href="#">Cart</a></li>
            <li><a href="logout.php">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
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
                    <p>Check out <a href=\"books/explore.php\">some of our cool books!</a></p>
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
        ?>
    <div class='container'>
      <div class="col-md-12">
        <div class='center-block text-center'>
          <h1>Shopping Cart</h1>
        </div>
        <div class="container"><!--STARBUCK-->
          <div class="menu row">
            <div class="col-sm-12 ">
              <div class="productsrow">
                <?php
                  //DISPLAYS ALL BOOKS IN CART LIST
                  while($row2 = $result2->fetch_assoc()){
                ?>
                  <div class="product menu-category">
                  <div class="menu-category-name list-group-item active">(QTY: 1) <?php print($row2['title'])?></div>
                    <div class="product-image">
                        <a href="books/?isbn=<?php printf("%s",$row2['isbn']); ?>"><img class="product-image menu-item list-group-item" src="<?php print($row2['imgtitle'])?>"></a>
                    </div> <a href="books/?isbn=<?php print($row2['isbn'])?>" class="menu-item list-group-item"><?php print($row2['title'])?><span class="badge">$<?php $price=rand(1,50); $totalPrice += $price; print($price);?></span></a>
                  </div>
                <?php }         
        }//end of else?>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <h3 class="text-right">Total Price: $<?php print($totalPrice)?></h3>
          <p class="text-right"><a href="checkout.php" class="btn btn-success">Secure Checkout</a> <a href="empty_cart.php" class="btn btn-danger">Empty Cart</a></p>
        </div>
      </div>
    </div>

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
