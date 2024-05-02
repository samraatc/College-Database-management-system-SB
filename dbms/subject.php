
 <html>
<head>
<title>subject</title>
</head>
<style>
body{
background-size: 80%;
background-position: center;
    background-repeat: no-repeat;

}
 table {
    border-collapse: collapse;
    color: black;
    border: 5px solid red;
    font-size: 33px;
    background-color: #000;
    color: #fff;
    opacity: .5;
}
input[type=submit] {
    font-size: 19px;
    background: gray;
    border: 5px solid red;
    padding: 3px 14px;
}
}
/* .container{
    max-width: 80%;
    padding: 44px;
    margin: auto;
    texts */
}
</style>
<!-- <body>
    <img class="sub2" src="sub2.jpeg" alt="book">

</body>
<div class="contaner"> -->
<body background="sub11.jpeg">
<form action="tables.html" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    </form>
	
<form action="subjectadd.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Add" />
</p>
    
</form>
<form action="subjectdelete.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Delete" />
</p>
    

<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT sub_id, sub_name, department_id FROM subject";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8" border="1">

<tr>
<td align="left"><b>Subject_id</b></td>
<td align="left"><b>Subject Name</b></td>
<td align="left"><b>Department ID</b></td>

</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="center">' . 
$row['sub_id'] . '</td><td align="left">' . 
$row['sub_name'] . '</td><td align="left">' . 
$row['department_id'] . '</td>'  ;

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>

<!-- </div> -->
</body>
</html>