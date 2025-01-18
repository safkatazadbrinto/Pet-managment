<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" method="post">
        <div class="form-group">
            <label>Address</label>
            <input type="text" required name="addressh" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" required name="cityh" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" required name="email" />
        </div>
        
        <input class="submit" type="submit" name ="submit" value="Save"  />
    </form>


<?php 

$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
if(isset($_POST['submit'])){
 $p_address = $_POST['addressh'];
 $p_city = $_POST['cityh'];
 $p_email = $_POST['email'];



 $sql = "INSERT INTO hospital(addressh,cityh,email) VALUES ('$p_address','$p_city','$p_email')";


 
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

}
?>


</div>
</div>
</body>
</html>
