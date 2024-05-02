<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: departmentlogin.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: tables.html");
	}

?>

 <html>
<head>
<title>Department</title>
</head>
<style>
body{
background-size: 100%;
background-position: center;
    background-repeat: no-repeat;

}
.div2{
	float:left;
}
.floating-box {
    float: left;
margin: 10px;
}
.div1{
	float: right;
}

.floating-box-right {
    float: right;
margin: 10px;
}
.welcome

{
color:red;
}

 table {
	border-collapse: collapse;
    border: 5px solid #1120ed;
    float: left;
    background: #483f3f;
    color: #fff;
    font-size: 21px;
    opacity: 0.5;
}
input[type=submit] {
	font-size: x-large;
    background: #a5a9af;;
    border: 5px solid red;
    padding: 3px 17px;
}

input[type=submit]:hover{
    color: rgb(23, 243, 96);
    background-color: black;
}
</style>
<body background="dep.jpeg">
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

	<?php  if (isset($_SESSION['username'])) : ?>
	<p> <div class="welcome"><h1>Department Control</h1></div>
	<p><a href="departmentindex.php?logout='1'" style="color: blue;"><h3>Click here to Logout</h3></a> </p>
		<?php endif ?>
  
 
<div class="div2">
	
<form action="departmentadd.php" method="post">
    

<p> 
<div class="floating-box">  
    <input type="submit" name="submit" value="Add" />
</p>
    
</div>
</form>
<form action="departmentdelete.php" method="post">
    
   
<p>
<div class="floating-box">  
    <input type="submit" name="submit" value="Delete" />
</p>
    
</div>
</form>
<form action="departmentupdate.php" method="post">
    
   
<p>
<div class="floating-box">  
    <input type="submit" name="submit" value="Update" />
</p>
    
</div>
</form>
</div><br>
<div class="div1">
<form action="studentdelete.php" method="post">
    
   
<p>
<div class="floating-box-right">  
    <input type="submit" name="submit" value="Delete Student" />
</p>
    
</div>
</form>

<form action="student.php" method="post">
    

<p> 
<div class="floating-box-right">  
    <input type="submit" name="submit" value="View Student" />
</p>
    
</div>
</form>
<form action="studentadd.php" method="post">
    

<p> 
<div class="floating-box-right">  
    <input type="submit" name="submit" value="Add Student" />
</p>
    
</div>
</form>
<form action="studentupdatename.php" method="post">
    
   
<p>
<div class="floating-box-right">  
    <input type="submit" name="submit" value="Update Student Name" />
</p>
</div>
    
</form>
    
</form>
<form action="studentupdateaddress.php" method="post">
    
   
<p>
<div class="floating-box-right">  
    <input type="submit" name="submit" value="Update Student Address" />
</p>
    
</div>
</form>
<form action="studentupdatesubject.php" method="post">
    
   
<p>
<div class="floating-box-right">  
    <input type="submit" name="submit" value="Update Student Subject" />
</div>
</p>
</div>  <br>
<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT departmant_id, department_name,department_hod FROM department";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8" border="1">

<tr>
<td align="left"><b>Department ID</b></td>
<td align="left"><b>Department Name</b></td>
<td align="left"><b>Department HOD</b></td>
 
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['departmant_id'] . '</td><td align="left">' . 
$row['department_name'] . '</td><td align="left">' . 
$row['department_hod'] . '</td>' ;

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
