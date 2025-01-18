<?php

session_start();
if (isset($_SESSION['profile_id']) )
{
    header('location:profile.php');
}

  if ( isset($_POST['sign_up_submit']))
  {
    //print_r($_POST);
    if ( !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address'])  && !empty($_POST['password']) )
    {
        //echo 'submit hoise';
        // save values into variabel

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        //database connection

        $connection =  new mysqli('localhost','root','','pet_shelter');

        $sql ="INSERT INTO customers(name, phone, email, address, password) VALUES('$name','$phone','$email','$address','$password') ";

        $connection -> query($sql);

        echo "
        <script type='text/javascript'>
            alert('Sign Up Successful!');
            location.assign('login.php');
        </script>
        ";
        



    }
    
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Sign Up</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Customer Registration</h1>

                        <!--  Name -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="name" id="name" placeholder="Name" class="login__input" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="phone" id="phone" placeholder="Phone Number" class="login__input" required>
                        </div>

                        <!-- Email -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="email" id="email" placeholder="Email" class="login__input" required>
                        </div>

                        <!-- Address -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="address" id="address" placeholder="Address" class="login__input" required>
                        </div>

                        <!-- password -->
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" class="login__input" name="password" id="password" required>
                        </div>

                        
                        <!-- <a href="#" class="login__button">Sign In</a> -->
                        <input type="submit" name="sign_up_submit"  value="Sign Up" style="color: white; background-color: purple; padding: 10px 45px;">

                        <div>
                            <span class="login__account">Have an Account ?</span>
                            <a href="login.php" class="login__signin" id="sign-up">Sign In</a><br>
                            <a href="index.php" class="login__signin" id="sign-up">Home</a>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>