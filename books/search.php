<?php

include 'view_books.php';

$search_req = "asdf";
if(isset($_REQUEST["search"]))
  $search_req = $_REQUEST["search"];

$myQuery = "SELECT book.*, rate, comment, name FROM book LEFT OUTER JOIN review ON isbn = book_id LEFT JOIN user ON review.user_id = user.id WHERE isbn like '%$search_req%' or title like '%$search_req%' or author like '%$search_req%' or category like '%$search_req%' ORDER BY isbn";
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
            <h1>Search Results</h1>
            <p class="lead">We know books.</p>
        </div>
        <div class="container">
            <div class="menu row">
                <div class="col-sm-12 ">
                <?php

                          if($row_cnt_other == 0)
                            print("<p>Enter a new search or refine your current search.</p>");
                ?>
                    <div class="productsrow">
                        <?php
                          for ($i=0; $i < $row_cnt_other; $i++) { 
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


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
