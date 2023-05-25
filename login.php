<?php

include './connect.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE email = ? AND password = ? LIMIT 1");
   $select_admins->execute([$email, $pass]);
   $row = $select_admins->fetch(PDO::FETCH_ASSOC);

   if($select_admins->rowCount() > 0){
      setcookie('admin_id', $row['id'], time() + 60*60*24*30, '/');
      header('location:index.php');
   }else{
      $warning_msg[] = 'Incorrect username or password!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <title>Document</title>
    </head>
    <body>
        <!-- manu bar start     -->
        <header>
            <div class="header">
                <div class="navbar">
                    <div class="logo">
                        <a href="/">Doctor portal</a>
                    </div>
                    <nav>
                    <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./appointment.php">Appointment</a></li>
                            <li><a href="./login.php">Log in</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- manu bar end -->

        <!-- main section start -->
        <div class="form-start">
            <div class="login-form">
                <h2 class="login-header">Login</h2>
                <form>
                    <div class="form">
                        <label class="label"><span class="label-text">Email</span></label>
                        <input type="text" name="email" class="form-details"></div>
                    <div class="form">
                        <label class="label"><span class="label">Password</span></label>
                        <input type="password" name="password"
                            class="form-details">
                        <label class="label"> <span class="label-text">Forget
                                Password?</span>
                        </label>
                    </div>
                    <input class="login-button" type="submit"
                        value="Login">
                    <div>

                    </div>
                </form>
                <p>New to Doctors Portal <a class="signup-write"
                        href="./signup.php">Create new Account</a></p>
                <button class="google-button">CONTINUE WITH GOOGLE</button>
            </div>
        </div>
        <!-- main section end -->

        <!-- footer start -->
        <footer>
            <div class="footer">
                <div class="footer-col">
                    <span class="footer-title">Services</span>
                    <a class="link link-hover" href="/">Branding</a>
                    <a class="link link-hover" href="/">Design</a>
                    <a class="link link-hover" href="/">Marketing</a>
                    <a class="link link-hover" href="/">Advertisement</a>
                </div>
                <div class="footer-col">
                    <span class="footer-title">Company</span>
                    <a class="link link-hover" href="/">About us</a>
                    <a class="link link-hover" href="/">Contact</a>
                    <a class="link link-hover" href="/">Jobs</a>
                    <a class="link link-hover" href="/">Press kit</a>
                </div>
                <div class="footer-col">
                    <span class="footer-title">Legal</span>
                    <a class="link link-hover" href="/">Terms of use</a>
                    <a class="link link-hover" href="/">Privacy policy</a>
                    <a class="link link-hover" href="/">Cookie policy</a>
                </div>
            </div>
        </footer>
        <!-- footer end  -->



        
    </body>
</html>