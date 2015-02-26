<?php

//inside HTML page, index.php for example, say
// include 'view_books.php';
//and you'll get an array with some book's data in it
//You can see the array data table halfway down the page.
//in the HTML page you can access the different pieces of data with the $thisresult[][] variable.
//the first [] will usually be 0 (as in the first thing that SQL replied with) but sometimes it may not be.


$link = new mysqli("localhost","root","","amazon"); /*for local testing only*/


//link database
if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}

$book_request = 0;
if(isset($_REQUEST["isbn"]))
  $book_request = $_REQUEST["isbn"];

function getBooks($isbn,$query){
    /*usage:
    array = getBooks("","");
    array = getBooks(string,string);
    array = getBooks("0618574948","SELECT * from book")

    if you don't specify a query, the $isbn will be used to return one book's data*/

    if($query == "")
        $query = "SELECT * FROM book WHERE isbn = $isbn"; //INNTER JOIN review ON isbn = book_id
    
    $link = new mysqli("localhost","root","","amazon");
    $result = $link->query($query);
    
    if(!$result)
        die ($link->error);
    
    $row_cnt = $result->num_rows;

    if($row_cnt == 0){
        print("It's Empty");
    }

    $i=0;
    /* fetch object array */
    $result_array = array();
    while ($obj = $result->fetch_object()) {
        $result_array[$i][0] = $obj->isbn;
        $result_array[$i][1] = $obj->title;
        $result_array[$i][2] = $obj->author;
        $result_array[$i][3] = $obj->category;
        $result_array[$i][4] = $obj->summary;
        $result_array[$i][5] = $obj->imgtitle;        
        // $result_array[$i][6] = $obj->user_id; //review data
        // $result_array[$i][7] = $obj->book_id; //review data
        // $result_array[$i][8] = $obj->rate; //review data
        // $result_array[$i][9] = $obj->comment; //review data
        $i++;
    }
    return $result_array;
}


function getBooksAndReviews($isbn,$query,&$row_cnt){
    /*usage:
    array = getBooks(string,string,int);
    array = getBooks("0618574948","",0)

    if you don't specify a query, the $isbn will be used to return one book's data*/

    //else, query this
    if($query == "")
        $query = "SELECT book.*, rate, comment, name FROM book LEFT OUTER JOIN review ON isbn = book_id LEFT JOIN user ON review.user_id = user.id WHERE isbn=$isbn";

    $link = new mysqli("localhost","root","","amazon");
    $result = $link->query($query);
    
    if(!$result)
        die ($link->error);
    
    $row_cnt = $result->num_rows;
    //echo $row_cnt;

    if($row_cnt == 0){
        return 0;
    }

    $i=0;
    /* fetch object array */
    $result_array = array();
    while ($obj = $result->fetch_object()) {
        $result_array[$i][0] = $obj->isbn;
        $result_array[$i][1] = $obj->title;
        $result_array[$i][2] = $obj->author;
        $result_array[$i][3] = $obj->category;
        $result_array[$i][4] = $obj->summary;
        $result_array[$i][5] = $obj->imgtitle;        
        //these will be null if non existant
        $result_array[$i][6] = $obj->rate; //review stars as an integer
        $result_array[$i][7] = $obj->comment; //reviewer's comment
        $result_array[$i][8] = $obj->name; //reviewer
        $i++;
    }
    return $result_array;
}


if($book_request){    

    $thisresult = getBooks($book_request,"");

    // print("You selected " . $thisresult[0][0] . " which is " . $thisresult[0][1]);
}
else $thisresult = getBooks($book_request,"SELECT * from book");

// Testing the query worked
    // foreach ($thisresult as $value) {
    //     printf("%s, %s, %s, %s, %s", $value[0], $value[1], $value[2], $value[3], $value[4]);
    //     echo "<br>";
    // }

?>

