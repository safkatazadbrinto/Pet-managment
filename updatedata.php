<?php
$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
if(isset($_POST['submit'])){
 $p_id = $_POST['h_id'];
 $p_address = $_POST['addressh'];
 $p_city = $_POST['cityh'];
 $p_email = $_POST['email'];



 $sql = "UPDATE hospital SET addressh = '{$p_address}', cityh = '{$p_city}', email = '{$p_email}' WHERE h_id = {$p_id}";


 
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

 header("Location: http://localhost/hospital/indexv.php");

 mysqli_close($conn);

}

?>