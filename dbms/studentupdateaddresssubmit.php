 
 <html>
<head>
<title>Student</title>
</head>
<style>
 
</style>
<body>

<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['student_id'])){

        // Adds name to array
        $data_missing[] = 'Student ID';

    } else {

        // Trim white space from the name and store the name
        $student_id = trim($_POST['student_id']);

    }
  
     if(empty($_POST['address_id'])){

        // Adds name to array
        $data_missing[] = 'Address ID';

    } else {

        // Trim white space from the name and store the name
        $address_id = trim($_POST['address_id']);

    }
     
    if(empty($data_missing)){
        
        require_once('../mysqli_connection.php');
        
        $query = "UPDATE student 
set address_id=?
where student_id=?";
        
        $stmt = mysqli_prepare($dbc, $query);
        
       
        
       mysqli_stmt_bind_param($stmt, "ii", $address_id,$student_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Student Subject Updated FOR ID: '.$student_id. '<br>'.'Address Updated: '.$address_id;
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>
<form action="department.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    
 
</body>
</html>
