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
        $passh = password_hash($pass, PASSWORD_DEFAULT);
        $query="INSERT INTO propertylog(First_Name, Last_Name, Email, Password, Company, Phone, Businessno, CountyID, Location, File  ) VALUES ('$first_name', '$last_name', '$email', '$passh', '$company', '$phone_number', '$businessno', '$countyid', '$location','$file')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: /roomanytime-final\property-grid.html?status=success");
 
}

?>