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
        $query = "SELECT * from book WHERE isbn = $isbn";
    
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
