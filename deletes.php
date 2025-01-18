<?php include 'header.php'; 

if(isset($_POST['deletebtn'])){
    $conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");

    $p_id = $_POST['fs_id'];
    $sql = "DELETE FROM fs_info WHERE fs_id = {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry unsuccessful.");
 
    header("Location: http://localhost/Firestation/indexs.php");

    mysqli_close($conn);

}


?>



<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="fs_id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
