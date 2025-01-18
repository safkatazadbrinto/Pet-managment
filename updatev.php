<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="h_id" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
     

    <?php
    if(isset($_POST['showbtn'])){
    $conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");

    $p_id = $_POST['h_id'];
    $sql = "SELECT * FROM hospital WHERE h_id =  {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry Unsuccessful");
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
    

    ?>        
    


    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="h_id"  value="<?php echo $row['h_id']; ?>" />
            <input type="text" name="addressh" value="<?php echo $row['addressh']; ?>" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="cityh" value="<?php echo $row['cityh']; ?>" />
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>" />
        </div>
    <input class="submit" type="submit" name="submit" value="Update"  />
    </form>
    <?php
        }
    }
}
?>
</div>
</div>
</body>
</html>
