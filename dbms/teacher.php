

 <html>
<head>
<title>Teacher</title>
</head>
<style>
body{
background-size: 100%;
background-position: center;
    background-repeat: no-repeat;

}
 table {
    border-collapse: collapse;
    border: 5px solid red;
    font-size: 33px;
    background-color: #000;
    color: #fff;
    opacity: .5;
}
input[type=submit] {
    background: #c7c6c6;
    font-size: 17px;
    border: 5px solid red;
    padding: 3px 15px;
}
input[type=submit]:hover{
    color: rgb(23, 243, 96);
    background-color: black;
}
</style>
<body background="te.jpeg">

<form action="tables.html" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    </form>
	
<form action="teacheradd.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Add" />
</p>
    
</form>
<form action="teacherdelete.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Delete" />
</p>
    
</form>
<form action="teacherupdatename.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Update Name" />
</p>
    
</form>
<form action="teacherupdateaddress.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Update Address" />
</p>
    
</form>

<form action="teacherupdatesubject.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Update Subject" />
</p>
    
</form>
<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT teacher_id, first_name, last_name, dob, address_id, subject_id FROM teacher";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8" border="1">

<tr>
<td align="left"><b>Teacher_id</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>DOB</b></td>
<td align="left"><b>Address_id</b></td>
<td align="left"><b>Subject_id</b></td>
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['teacher_id'] . '</td><td align="left">' . 
$row['first_name'] . '</td><td align="left">' . 
$row['last_name'] . '</td><td align="left">' .
$row['dob'] . '</td><td align="left">' .
$row['address_id'] . '</td><td align="left">' . 
$row['subject_id'] . '</td>' ;

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
 
</body>
</html>