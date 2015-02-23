<?php

include 'view_books.php';
$row_cnt = 0;
$bookAndReview = getBooksAndReviews($book_request,$row_cnt);
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
                  <a href="#"><img class="img-responsive" src="../img/book.png"><i class="btn btn-product fa fa-star"></i></a>
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
												<p>Details details details</p>
											</div>
                     </div>


                </div>
                <div class="col-sm-6">
                    <div class="productsrow">
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Accessories</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Belt<span class="badge">£28</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Jeans</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Dark Blue Jeans<span class="badge">$80</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Pants</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Light Grean Chinos<span class="badge">$59</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Denim</div>
                            <div class="div-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Denim Jacket<span class="badge">$56</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Accessories</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Socks<span class="badge">$56</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Belt</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Brown Belt<span class="badge">£18</span></a>

                        </div>
                        <div class="product menu-category">
                            <div class="menu-category-name list-group-item active">Layer</div>
                            <div class="product-image">
                                <img class="product-image menu-item list-group-item" src="../img/book.png">
                            </div> <a href="#" class="menu-item list-group-item">Shawl Neck<span class="badge">46</span></a>

                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
</div>

<hr>

<div class="container">

             <div class="row">

               <div class="col-sm-3">
                 <a href="#">
                   <br/>
                   <img class="img-responsive" src="../img/book.png" data-alt="" data-title="">
                 </a>
                 <br>

                </div>
                <div class="col-sm-9">

                  <h2><a class="url" href="#"> Gentleman's Socks</a></h2>

                  <ul class="list-group ticketView">
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Color</span>
                          <label> Oatmeal</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Material</span>
                          <label> Cotton</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Sizes</span>
                          <label> Mens's 5-10, 8-12</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Stock #</span>
                           N12325
                      </li>
                  </ul>

                </div><!--/col-->
            </div><!--/row-->

            <div class="row">

               <div class="col-sm-3">
                 <a href="#">
                   <br/>
                   <img class="img-responsive" src="../img/book.png" data-alt="" data-title="">
                 </a>
                 <br>

                </div>
                <div class="col-sm-9">

                  <h2><a class="url" href="#"> Gentleman's Socks</a></h2>

                  <ul class="list-group ticketView">
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Color</span>
                          <label> Oatmeal</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Material</span>
                          <label> Cotton</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Sizes</span>
                          <label> Mens's 5-10, 8-12</label>
                      </li>
                      <li class="list-group-item ticketView">
                          <span class="label label-default">Stock #</span>
                           N12325
                      </li>
                  </ul>

                </div><!--/col-->
            </div><!--/row-->

            <hr>
</div><!--/container-->

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
