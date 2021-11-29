<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM studentlog where Email='$email' and Password='$pass'");
    $row  = mysqli_fetch_array($sql);
    
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["First_Name"]=$row['First_Name'];
        $_SESSION["Last_Name"]=$row['Last_Name']; 
        $_SESSION["Email"]=$row['Email'];
       // $_SESSION["NationalID"]=$row['NationalID"'];
       // $_SESSION["University"]=$row['University'];
       // $_SESSION["Phone"]=$row['Phone'];
       // $_SESSION["UniversityID"]=$row['UniversityID'];
        header("Location: \RoomAnytime/property-grid.html "); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>