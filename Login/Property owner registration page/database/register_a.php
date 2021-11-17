<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM propertylog where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else
{
        $query="INSERT INTO propertylog(First_Name, Last_Name, Email, Password, Company, Phone, Businessno, CountyID, Location, File  ) VALUES ('$first_name', '$last_name', '$email', 'md5($pass)', '$company', '$phone_number', '$businessno', '$countyid', '$location','$file')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: /RoomAnytime\Login\login.html?status=success");
 
}

?>