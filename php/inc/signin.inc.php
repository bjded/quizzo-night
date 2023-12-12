<?php
    if(isset($_POST['signin_submit'])) {
        require_once 'dbh.inc.php';

        $email = $_POST['signin_email'];
        $password = $_POST['signin_password'];

        // Validation
        if (strlen($email) < 6 || strlen($password) < 8) {
            header('Location: ../../?error=il');
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../../?error=fe');
            exit();
        }

        // Check if account exists.
        $stmt = $conn -> prepare("SELECT * FROM users WHERE email=?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $result = $stmt -> get_result();

        // $row is created if result is true to allow access to rows of database item
        if ($user = $result -> fetch_assoc()) {

            // Check to see if the password matches.
            if (password_verify($password, $user['password'])) {

                // Check account status.
                //if ($user['account_status'] == "0") {
                //    header("Location: ../../login?error=vu");
                //    exit();
                //}
                //elseif ($user['account_status'] == "2") {
                //    header("Location: ../../login?error=ub");
                //    exit();
                //}
                //elseif ($user['account_status'] != "1") {
                    // If this happens, the database was tampered with.
                //    header("Location: ../../login?error=dt");
                //    exit();
                //}

                // Start session upon successful login.
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                //$_SESSION['email'] = $user['email'];

                header("Location: ../../home.php");
                exit();
            }
            else {
                header("Location: ../../?error=ic");
                exit();
            }
        }
        else {
            header("Location: ../../?error=ude");
            exit();
        }
    }
    else {
        header('Location: ../../?error=nfs');
        exit();
    }
?>
