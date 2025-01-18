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
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName"> Name</label>
					<input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $name; ?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Phone Number</label>
					<input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $phone; ?>" disabled>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<!--<label for="Street">Address</label>-->
					<input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $address; ?>" disabled>
				</div>
			</div>
			
			
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary"> Id</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<!--<label for="Street">Address</label>-->
					<input type="text" style="font-weight: bold;" class="form-control" id="fullName" placeholder="<?php echo $id; ?>" disabled>
				</div>
			</div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2 text-primary">Online Payment</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <form method="post" action="pay.php">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Enter Request ID</label>
                        <input type="text" class="form-control" name="request_id" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Amount</label>
                        <input type="text" class="form-control" name="amount"  value="300" required >
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleFormControlFile1">Amount</label> -->
                        <input type="submit" class="btn btn-success" name="payment_submit"  value="Pay Online!" >
                    </div>
                </form>

            </div>
			
			
		</div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2 text-primary">Request History</h6>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Pickup Date</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                        <th scope="col">Approve Status</th>
                        <th scope="col">Cat Status</th>



                    </tr>
                    </thead>
                    <tbody >
                    <?php
                    $sql = "SELECT requests.*, cats.*
                    FROM requests
                    JOIN cats ON requests.id = cats.request_id
                    WHERE requests.customer_id = '$id'";

                    $data = $connection -> query($sql);

                    while ( $values = $data->fetch_assoc()){
                        ?>
                        <td><?php echo $values['request_id']; ?></td>
                        <td><?php echo $values['created_at']; ?></td>
                        <td><?php echo $values['delivery_date']; ?></td>
                        <td><?php echo $values['delivery_date']; ?></td>
                        <td><?php echo $values['payment_status']; ?></td>
                        <td><?php echo $values['total_cost']; ?></td>
                        <td><?php echo $values['paid']; ?></td>
                        <td><?php echo $values['due']; ?></td>
                        <td><?php if($values['is_approved']){
                            echo 'Approved';
                        }
                        else{
                            echo 'Not Approved';
                        } ?></td>
                        <td><a href="cat-status.php?cat_id=<?php echo $values['id']?>">Cat</a></td>
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