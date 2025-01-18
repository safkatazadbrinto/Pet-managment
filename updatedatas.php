<?php
$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
if(isset($_POST['submit'])){
 $p_id = $_POST['fs_id'];
 $p_name = $_POST['namev'];
 $p_address = $_POST['addressf'];
 $p_city = $_POST['cityf'];
 $p_email = $_POST['email'];
 $p_phone = $_POST['phonev'];




 $sql = "UPDATE fs_info SET namev = '{$p_name}',addressf = '{$p_address}', cityf = '{$p_city}', email = '{$p_email}',phonev = '{$p_phone}' WHERE fs_id = {$p_id}";


 
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

 header("Location: http://localhost/Firestation/indexs.php");

 mysqli_close($conn);

}

?>