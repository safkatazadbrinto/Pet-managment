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
    $address = $values['address'];


    // update values check
    if ( isset($_POST['update_form_submit']))
    {
        if ( 
            !empty($_POST['pickup_date']) 
            && !empty($_POST['delivery_date'])
            && !empty($_POST['terms_and_conditions']) 
            && !empty($_POST['pet_name']) 
            && !empty($_POST['age']) 
            && !empty($_POST['last_vaccination_date']) 
            && !empty($_POST['food_details']) 
            && !empty($_POST['breed']) 
            && !empty($_POST['gender'])
            )
            {
                $login_id = $_SESSION['profile_id'];
            
                $pickup_date = $_POST['pickup_date'];
                $delivery_date = $_POST['delivery_date'];
                $payment_status = 'incomoplete';
                $terms_and_conditions = $_POST['terms_and_conditions'];
                $is_approved = 'false';
                $customer_id = $id;

                //cat details 
                $pet_name = $_POST['pet_name'];
                $age = $_POST['age'];
                $last_vaccination_date = $_POST['last_vaccination_date'];
                $food_details = $_POST['food_details'];
                $breed = $_POST['breed'];
                $gender = $_POST['gender'];
                $total_cost = 300;
                $paid = 0;
                $due = 300;
                

                $sql ="INSERT INTO requests(pickup_date, delivery_date, payment_status, terms_and_conditions, is_approved, customer_id
                ,total_cost, paid, due) 
                VALUES('$pickup_date','$delivery_date','$payment_status','$terms_and_conditions','$is_approved', '$customer_id', 
                '$total_cost','$paid', '$due') ";

                $sql_3 = "SELECT * FROM requests WHERE customer_id = '$customer_id' ORDER BY created_at DESC LIMIT 1";


                $connection -> query($sql);
                $result = $connection -> query($sql_3);
                $result = $result->fetch_assoc();
                $request_id = $result['id'];

                $sql_2 ="INSERT INTO cats(pet_name, age, last_vaccination_date, food_details, breed, gender, request_id) 
                VALUES('$pet_name','$age','$last_vaccination_date','$food_details','$breed','$gender', '$request_id') ";

                $connection -> query($sql_2);

                header('location:profile.php');
            }
    }
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
                                <img src="user.png" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name"><?php echo $name; ?></h5>
                            <h6 class="user-email"><?php echo $phone; ?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>I'm <?php echo $name; ?> </p>
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
            <form method="POST" >

            <div class="card h-100">
            <div class="card-body">
                    <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Request Details</h6> 
                    </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Pickup Date</label>
                                <input type="date" style="font-weight: bold;" class="form-control" id="blood_group" 
                                    name="pickup_date" >
                            </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Delivery Date</label>
                                <input type="date" style="font-weight: bold;" class="form-control" id="blood_group" 
                                    name="delivery_date" >
                            </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                                <label for="Street">Terms & Condition</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="terms_and_conditions"></textarea>
                            </div>
                        </div>
                    </div>

            </div>


            <div class="card h-100">
            
                <div class="card-body">
                    <div class="row gutters">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Cat Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Pet Name</label>
                                <input type="text" style="font-weight: bold;" class="form-control" name="pet_name" id="pet_name" >
                            </div>
                        </div>
                

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Age</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="age" name="age"  >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Last Vaccination Date</label>
                                <input type="date" style="font-weight: bold;" class="form-control" id="blood_group" name="last_vaccination_date" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Food Details</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="food_details"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Breed</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="breed" name="breed"  >
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="website">Gender</label>
                                <input type="text" style="font-weight: bold;" class="form-control" id="gender" name="gender"  >
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <input type="submit" name="update_form_submit" value="Submit" class="btn btn-success">

            </form>

                            </div>
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