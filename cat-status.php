<?php
session_start();

if ( isset($_SESSION['profile_id']))
{
	//echo 'ekhane ashce if er vitore';
	$login_id = $_SESSION['profile_id'];

	//database connection

    $connection =  new mysqli('localhost','root','','pet_shelter');

	$sql =" SELECT * FROM customers WHERE id = $login_id";

	$data = $connection -> query($sql);

	$values = $data->fetch_assoc();

	$name = $values['name'];
	$id = $values['id'];
	$phone = $values['phone'];
    $email = $values['email'];
	$address = $values['address'];
	$password = $values['password'];

    $cat_id = $_GET['cat_id'];

}
else{
	header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="user.png" alt="image">
				</div>
				<h5 class="user-name"><?php echo $name; ?></h5>
				<h6 class="user-email"><?php echo $phone; ?></h6>
			</div>
			<div class="about">
				<h5>About</h5>
				<p>I'm <?php echo $name; ?></p>
			</div>
            <div class="text-left">
                <a href="index.php" class="btn btn-info">Home</a> <br> <br>
                <a href="logout.php" class="btn btn-primary">Logout</a> <br> <br>
                <a href="update.php" class="btn btn-success">Make Request</a><br> <br>
            </div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2 text-primary">Pet Status</h6>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pet Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>


                    </tr>
                    </thead>
                    <tbody >
                    <?php

                    $sql = "select * from cat_statuses join cats on cats.id = cat_statuses.cat_id where cat_id = '$cat_id'";

                    $data = $connection -> query($sql);

                    while ( $values = $data->fetch_assoc()){
                        ?>
                        <tr>
                        <td><?php echo $values['id']; ?></td>
                        <td><?php echo $values['pet_name']; ?></td>
                        <td><?php echo $values['title']; ?></td>
                        <td><?php echo $values['description']; ?></td>
                        </tr>
                        <?php

                    }
                    ?>



                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
</div>
</div>
</div>

<style type="text/css">
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #ff99cc;
    position: relative;
    height: 100%;
    font-weight: bold;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


</style>

<script type="text/javascript">


</script>
</body>
</html>