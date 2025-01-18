<?php
$p_id = $_GET['id'];


$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
   $sql = "DELETE FROM fs_info WHERE fs_id = {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry unsuccessful.");
 
    header("Location: http://localhost/Firestation/indexs.php");

    mysqli_close($conn);





?>