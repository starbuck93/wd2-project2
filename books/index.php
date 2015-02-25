<?php
session_start();

include 'view_books.php';

$email = $_SESSION['email'];

$link = new mysqli("localhost","root","","amazon"); /*for local testing only*/
$query = "SELECT id, name FROM user WHERE email = '$email'";
  if ($link->connect_errno) {
      printf("Connect failed: %s\n", $link->connect_error);
      exit();
    }
$result = $link->query($query);
  if(!$result)
    die ($link->error);
$obj = $result->fetch_object();
  $user_id = $obj->id;
  $name = $obj->name;

$row_cnt = 0;
$bookAndReview = getBooksAndReviews($book_request,"",$row_cnt);
        // $bookAndReview[0][0] ||==|| isbn;
        // $bookAndReview[0][1] ||==|| title;
        // $bookAndReview[0][2] ||==|| author;
        // $bookAndReview[0][3] ||==|| category;
        // $bookAndReview[0][4] ||==|| summary;
        // $bookAndReview[0][5] ||==|| imgtitle;        
        // $bookAndReview[0][6] ||==|| rateing; //review data
        // $bookAndReview[0][7] ||==|| comment; //review data
        // $bookAndReview[0][8] ||==|| name; //review data
if ($row_cnt > 6) {
  $row_cnt = 5; //only show 5 reviews per books ... should probably sort by high reviews or low reviews or something in the SQL
}

if(isset($_REQUEST["rating"]) && isset($_REQUEST["reviewPost"])){
  $rating = $_REQUEST["rating"];
  $review = $_REQUEST["reviewPost"];
  $isbn = $_REQUEST["isbn"];
  $myQuery = "INSERT INTO review (user_id, book_id, rate, comment) VALUES ($user_id,\"$isbn\",$rating,\"$review\")";

  $link = new mysqli("localhost","root","","amazon"); /*for local testing only*/
  //link database
  if ($link->connect_errno) {
      printf("Connect failed: %s\n", $link->connect_error);
      exit();
  }
  $result = $link->query($myQuery);
  if(!$result)
    die ($link->error);
    
}


  $category = $bookAndReview[0][3];
  $title = $bookAndReview[0][1];
  $myQuery = "SELECT book.*, rate, comment, name FROM book LEFT OUTER JOIN review ON isbn = book_id LEFT JOIN user ON review.user_id = user.id WHERE category='$category' AND title != '$title'";
$otherBooks = getBooksAndReviews("",$myQuery,$row_cnt_other); //same category
if ($row_cnt_other > 7) {
  $row_cnt_other = 6; //limit the number of extra books to show
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title> Amazon Wanna-Be: <?php print($bookAndReview[0][1]);?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--template-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" style="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../main.php">Amazon Wanna-Be</a>
        </div>
        <div class="collapse navbar-collapse" style="">
            <ul class="nav navbar-nav">
                <li class="active"><a href="." class="" style="">Explore</a></li>
                <li><a href="search.php" class="">Search</a></li>
                <li><a href="#" class="">About</a></li>
            </ul>

        <!--/.nav-collapse -->
				<form action="search.php" method="GET" class="navbar-form navbar-right"> <!--The search.php page should be similar to this page... without the main book. Maybe a grid or list of results-->
					<div class="form-group">
						<input type="text" name="search" placeholder="Search!" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Search</button>
				</form>
			</div>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <div class="center-block text-center">
            <h1>Book Store</h1>
            <p class="lead">We know books.</p>
        </div>
        <div class="container">
            <div class="menu row">
                <div class="product col-sm-6">
                  <a href="index.php?isbn=<?php printf("%s",$thisresult[0][0]); ?>"><img style="max-height: 500px;" src="<?php print($bookAndReview[0][5]);?>"></a>
					<hr>
                    <h2><?php printf("%s",$thisresult[0][1]); ?></h2> <!--Title-->
										<p><?php printf("%s",$thisresult[0][4]); ?></p> <!--description-->
										<p>By: <?php printf("%s",$thisresult[0][2]); ?></p> <!--author-->
										<p>ISBN-10: <?php printf("%s",$thisresult[0][0]); ?></p> <!--isbn-->
                    <hr>
                  	<h2 class="text-right">$<?php print(rand(1,50));?></h2>
										<button class="btn btn-primary btn-lg ">Add to Cart</button>
										<button class="btn btn-success btn-lg ">Add to Wishlist</button>
                    <hr>


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#reviews">Reviews</a></li>
                        <li><a data-toggle="tab" href="#addreview">Add A Review</a></li>
                        <li><a data-toggle="tab" href="#details">Details</a></li>
                    </ul>

                  	<div class="tab-content">
                      <div class="tab-pane active" id="reviews">

                        <h4>Buyer Reviews</h4>
                        <ul class="list-unstyled">
                        <?php for ($i=0; $i < $row_cnt; $i++) { ?>
                          <li class="clearfix">(<?php print($bookAndReview[$i][8]) ?>) <?php print($bookAndReview[$i][7]); for ($j=0; $j < $bookAndReview[$i][6]; $j++) { echo "<i class=\"fa fa-star fa-2x yellow pull-right\"></i>"; }?> </li>
                        <?php } ?>
                        </ul>

                      </div>
                      <div class="tab-pane" id="details"><h4>Product Information</h4>
                        <p>You're paying for a brand new, used book.</p>
												<p>Shipping costs $40 the first time, and $0 every time after that for A WHOLE YEAR. So you better enjoy paying for memberships because that's basically what this is.</p>
											</div>
                      <div class="tab-pane" id="addreview"><h4>Add A Review</h4>
                        <?php //don't let users add multiple reviews?>
                        <form id="review" action="index.php" method="POST">
                          <div class="starRating"> <!--http://code.stephenmorley.org/html-and-css/star-rating-widget/-->
                            <div>
                              <div>
                                <div>
                                  <div>
                                    <input id="rating1" type="radio" name="rating" value="1">
                                    <label for="rating1"><span>1</span></label>
                                  </div>
                                  <input id="rating2" type="radio" name="rating" value="2">
                                  <label for="rating2"><span>2</span></label>
                                </div>
                                <input id="rating3" type="radio" name="rating" value="3">
                                <label for="rating3"><span>3</span></label>
                              </div>
                              <input id="rating4" type="radio" name="rating" value="4">
                              <label for="rating4"><span>4</span></label>
                            </div>
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5"><span>5</span></label>
                          </div>
                          <textarea form="review" name="reviewPost" rows="3" cols="50" required></textarea>
                            <label for="reviewPost"><?php print($name);?>, your name will be submitted along with this review.</label>
                          <input type="hidden" name="isbn" value="<?php printf("%s",$thisresult[0][0]); ?>">
                          <input type="submit" name="submit" value="Submit">
                        </form>

                      </div>
                     </div>


                </div>
                <div class="col-sm-6">
                  <h4 class="text-center">Other Books in this Category</h4>
                    <div class="productsrow">
                        <?php

                          if($row_cnt_other == 0)
                            print("<p>Found none.</p>");
                          for ($i=0; $i < $row_cnt_other; $i++) { 
        // $otherBooks[$i][0] ||==|| isbn;
        // $otherBooks[$i][1] ||==|| title;
        // $otherBooks[$i][2] ||==|| author;
        // $otherBooks[$i][3] ||==|| category;
        // $otherBooks[$i][4] ||==|| summary;
        // $otherBooks[$i][5] ||==|| imgtitle;        
        // $otherBooks[$i][6] ||==|| rateing; //review data
        // $otherBooks[$i][7] ||==|| comment; //review data
        // $otherBooks[$i][8] ||==|| name; //review data
                        ?>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active"><?php print($otherBooks[$i][3]);?></div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="<?php print($otherBooks[$i][5]);?>">
                            </div> <a href="./?isbn=<?php print($otherBooks[$i][0]);?>" class="menu-item list-group-item"><?php print($otherBooks[$i][1]);?><span class="badge">$<?php print(rand(1,50));?></span></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
</div>

<!--/template-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>

