<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM studentlog where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else
{
        $query="INSERT INTO studentlog(First_Name, Last_Name, Email, NationalID, University, Phone, UniversityID, Password  ) VALUES ('$first_name', '$last_name', '$email',  '$national_id',  '$university',  '$phone_number',  '$university_id', 'md5($pass)')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: /RoomAnytime\Login\login.html?status=success");
  
}

?>