<?php

include './connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('location:login.php');
}

if (isset($_POST['submit'])) {

    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = sha1($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_admins->execute([$name]);

    if ($select_admins->rowCount() > 0) {
        $warning_msg[] = 'Username already taken!';
    } else {
        if ($pass != $c_pass) {
            $warning_msg[] = 'Password not matched!';
        } else {
            $insert_admin = $conn->prepare("INSERT INTO `admins`(id, name, email, password) VALUES(?,?,?,?)");
            $insert_admin->execute([$id, $name, $c_pass]);
            $success_msg[] = 'Registered successfully!';
        }
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
    <div class="signup-form-start">
        <div class="signup-form">
            <h2 class="signup-header">Sign Up</h2>
            <form>
                <div class="signup-form">
                    <label class="signup-label"><span class="label-text">Name</span></label>
                    <input type="text" name="name" class="signup-form-details">
                </div>
                <div class="signup-form">
                    <label class="signup-label"><span class="label-text">Email</span></label>
                    <input type="text" name="email" class="signup-form-details">
                </div>
                <div class="signup-form">
                    <label class="signup-label"><span class="label">Password</span></label>
                    <input type="password" name="password" class="signup-form-details">
                    <label class="signup-label"> <span class="label-text">Forget
                            Password?</span>
                    </label>
                </div>
                <input class="signup-button" type="submit" value="Login">
                <div>

                </div>
            </form>
            <p>Already have an Account<a class="login-write" href="/login.php">Please login</a></p>
            <button class="signup-google-button">CONTINUE WITH GOOGLE</button>
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