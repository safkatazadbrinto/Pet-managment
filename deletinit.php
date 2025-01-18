<?php
$p_id = $_GET['id'];


$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
   $sql = "DELETE FROM hospital WHERE h_id = {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry unsuccessful.");
 
    header("Location: http://localhost/hospital/indexv.php");

    mysqli_close($conn);





?>