<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" required name="namev" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" required name="addressf" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" required name="cityf" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" required name="email" />
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" required name="phonev" />
        </div>
        
        <input class="submit" type="submit" name ="submit" value="Save"  />
    </form>


<?php 

$conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
if(isset($_POST['submit'])){
    $p_name = $_POST['namev'];
 $p_address = $_POST['addressf'];
 $p_city = $_POST['cityf'];
 $p_email = $_POST['email'];
 $p_phone = $_POST['phonev'];



 $sql = "INSERT INTO fs_info(namev,addressf,cityf,email,phonev) VALUES ('$p_name','$p_address','$p_city','$p_email','$p_phone')";


 
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

}
?>


</div>
</div>
</body>
</html>
