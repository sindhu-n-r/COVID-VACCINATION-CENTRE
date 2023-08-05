<?php

$centername = $_POST['centername'];
$address  = $_POST['address'];
$locality = $_POST['locality'];
$workinghrs = $_POST['workinghrs'];

if (!empty($centername) || !empty($address) || !empty($locality) || !empty($workinghrs) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vaccination";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT centername From vaccinationcenter Where centername = ? Limit 1";
  $INSERT = "INSERT Into  vaccinationcenter (centername , address ,locality,workinghrs )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $centername);
     $stmt->execute();
     $stmt->bind_result($centername);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking centername
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $centername,$address,$locality,$workinghrs);
      $stmt->execute();
      echo '<script>alert ("Added sucessfully")</script>';
      echo '<script>window.location.href = "addvaccine.html"
        </script>';

     } else {
      echo '<script>alert("Someone already registered this center")</script>';
      echo '<script>window.location.href = "addvaccine.html"</script>';
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>