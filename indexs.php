<?php
include 'haders.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $conn = mysqli_connect("localhost","root","","emergency_info") or die("querry vanish");
    $sql = "SELECT * FROM fs_info";
    $result = mysqli_query($conn,$sql) or die("Querry unsuccessful.");
    if(mysqli_num_rows($result) > 0) {
?>
    <table cellpadding="7px">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>ADDRESS</th>
        <th>City</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
              while($row = mysqli_fetch_assoc($result)){
                $id_1 = $row['fs_id'];
                ?>

              
            <tr>
                <td><?php echo $row['fs_id']; ?></td>
                <td><?php echo $row['namev']; ?></td>
                <td><?php echo $row['addressf']; ?></td>
                <td><?php echo $row['cityf']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phonev']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $id_1; ?>'>Edit</a>
                    <a href='deletinit.php?id=<?php echo $id_1; ?>'>Delete</a>
                </td>
            </tr>
            <?php } ?>
            
            
        </tbody>
    </table>
    <?php } ?>
</div>
</div>
</body>
</html>
              
