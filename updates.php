<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="fs_id" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
     

    <?php
    if(isset($_POST['showbtn'])){
    $conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");

    $p_id = $_POST['fs_id'];
    $sql = "SELECT * FROM fs_info WHERE fs_id =  {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry Unsuccessful");
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
    

    ?>        
    


    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="fs_id"  value="<?php echo $row['fs_id']; ?>" />
            <input type="text" name="addressf" value="<?php echo $row['addressf']; ?>" />
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="namev" value="<?php echo $row['namev']; ?>" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="cityf" value="<?php echo $row['cityf']; ?>" />
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>" />
        </div>
        <div class="form-group">
            <label>phone</label>
            <input type="text" name="phonev" value="<?php echo $row['phonev']; ?>" />
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
