<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
  $conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
  if($_GET['id'] == true){
   echo "ok";
  }
   $p_id = $_GET['id'];
    $sql = "SELECT * FROM fs_info WHERE fs_id =  {$p_id}";
    $result = mysqli_query($conn,$sql) or die("Querry Unsuccessful");
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
     ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="ps_id" value="<?php echo $row['fs_id']; ?>"/>
          <input type="text" name="address" value="<?php echo $row['addressf']; ?>"/>
      </div>
      <div class="form-group">
          <label>Name</label>
          <input type="text" name="Name" value="<?php echo $row['namev']; ?>"/>
      </div>
      <div class="form-group">
          <label>City</label>
          <input type="text" name="city" value="<?php echo $row['cityf']; ?>"/>
      </div>

      <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="<?php echo $row['email']; ?>"/>
      </div>
      <div class="form-group">
          <label>phone</label>
          <input type="text" name="phone" value="<?php echo $row['phonev']; ?>"/>
      </div>
      <input class="submit" type="submit" name="submit" value="Update"/>
    </form>
    <?php
        }
    }

    ?>
</div>
</div>
</body>
</html>
