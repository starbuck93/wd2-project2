<?php

include 'view_books.php';
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
$category = $bookAndReview[0][3];
$title = $bookAndReview[0][1];
$myQuery = "SELECT book.*, rate, comment, name FROM book LEFT OUTER JOIN review ON isbn = book_id LEFT JOIN user ON review.user_id = user.id WHERE category='$category' AND title != '$title'";
$otherBooks = getBooksAndReviews("",$myQuery,$row_cnt_other); //same category
        // $otherBooks[#][0] ||==|| isbn;
        // $otherBooks[#][1] ||==|| title;
        // $otherBooks[#][2] ||==|| author;
        // $otherBooks[#][3] ||==|| category;
        // $otherBooks[#][4] ||==|| summary;
        // $otherBooks[#][5] ||==|| imgtitle;        
        // $otherBooks[#][6] ||==|| rateing; //review data
        // $otherBooks[#][7] ||==|| comment; //review data
        // $otherBooks[#][8] ||==|| name; //review data
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
            <a class="navbar-brand" href="../">Amazon Wanna-Be</a>
        </div>
        <div class="collapse navbar-collapse" style="">
            <ul class="nav navbar-nav">
                <li class="active"><a href="." class="" style="">Explore</a></li>
                <li><a href="#" class="">Search</a></li>
                <li><a href="#" class="">About</a></li>
            </ul>

        <!--/.nav-collapse -->
				<form action="search.php" class="navbar-form navbar-right"> <!--The search.php page should be similar to this page... without the main book. Maybe a grid or list of results-->
					<div class="form-group">
						<input type="text" placeholder="Search!" class="form-control">
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
                  <a href="#"><img style="max-height: 500px;" src="<?php print($bookAndReview[0][5]);?>"></a>
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
                        <li><a data-toggle="tab" href="#details">Details</a></li>
                    </ul>

                  	<div class="tab-content">
                      <div class="tab-pane active" id="reviews">

                        <h4>Buyer Reviews</h4>
                        <ul class="list-unstyled">
                        <?php for ($i=0; $i < $row_cnt; $i++) { ?>
                          <li class="clearfix">(<?php print($bookAndReview[$i][8]) ?>) <?php print($bookAndReview[$i][7]); for ($j=0; $j < $bookAndReview[$i][6]; $j++) { echo "<i class=\"fa fa-star fa-2x yellow pull-right\"></i>"; }?> </li>
                        <?php }?>
                        </ul>

                      </div>
                      <div class="tab-pane" id="details"><h4>Product Information</h4>
                        <p>You're paying for a brand new, used book.</p>
												<p>Shipping costs $40 the first time, and $0 every time after that for A WHOLE YEAR. So you better enjoy paying for memberships because that's basically what this is.</p>
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
                            <div class="menu-category-name list-group-item active"><?php print($otherBooks[$i][3])?></div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="<?php print($otherBooks[$i][5])?>">
                            </div> <a href="./?isbn=<?php print($otherBooks[$i][0])?>" class="menu-item list-group-item"><?php print($otherBooks[$i][1])?><span class="badge">$<?php print(rand(1,50));?></span></a>
                        </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Log In</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
    		<label for="exampleInputEmail1">Email address</label>
    		<input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
  		  </div>
		  <div class="form-group">
		  	<label for="exampleInputPassword1">Password</label>
			<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
		  </div>
          <p class="text-right"><a href="#">Forgot password?</a></p>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Log-in</a>
        </div>
      </div>
    </div>
</div>

<!--/template-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
