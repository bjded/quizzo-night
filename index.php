<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header("Location: /home.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzo Night</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- New Sign In -->
    <div class="signin-wrapper">
        <div class="signin-container">
            <img src="img/quizzo-night-black-white.svg" alt="">
            <h2>Login to Your Account</h2>
            <form action="php/inc/signin.inc.php" method="post">
                <div class="form-group">
                    <input type="text" name="signin_email" id="signin_email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" name="signin_password" id="signin_password" placeholder="Password" required>
                </div>
                <div class="form-group btn-group">
                    <input type="submit" value="Sign In" class="btn-alt" name="signin_submit">
                    <a href="#" class="btn" id="signin_forgot_password">Forgot Password</a>
                </div>
            </form>
            <p id="signin_mobile_sign_up">New here? <a href="#" onclick="openSignUp()">Sign Up</a> and let's get started playing some quiz!</p>
            <!-- <p class="footer">Copyright &copy; 2022 Quizzo Night. All rights reserved.</p> -->
        </div>
    </div>

    <div class="new-here-wrapper">
        <div class="new-here-container">
            <h2>New Here?</h2>
            <h3>Sign up and let's get started playing some quiz!</h3>
            <a href="#" class="btn" onclick="openSignUp()">Sign Up</a>
        </div>
        <!-- <p class="footer">Interested in becoming a host? Shoot us an email at <span>letstalk@quizzonight.com</span></p> -->
    </div>

    <div class="signup-wrapper">
        <div class="signup-container">
            <img src="img/quizzo-night-color.svg" alt="">
            <h2>Create Account</h2>
            <form action="php/inc/signup.inc.php" method="post">
                <input type="text" name="signup_name" id="" placeholder="Name">
                <input type="text" name="signup_email" id="" placeholder="Email Address">
                <input type="password" name="signup_password" id="" placeholder="Password">
                <div>
                    <button type="submit" class="btn" name="signup_submit">Sign Up</button>
                </div>
            </form>
            <p class="signup-close" onclick="closeSignUp()">X</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
