<?php
    if(isset($_POST['signup_submit'])) {
        require_once 'dbh.inc.php';

        $name = $_POST['signup_name'];
        $email = $_POST['signup_email'];
        $password = $_POST['signup_password'];
        //$account_status = 0; // 0 - new | 1 - active | 2 - banned

        // Validation
        if (strlen($name) < 2 || strlen($email) < 6 || strlen($password) < 8) {
            header('Location: ../../?error=il');
            exit();
        }
        // if ($confirm_password != $password) {
        //     header('Location: ../../?error=pdm');
        //     exit();
        // }
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Generate Request Code for account verification.
        //$request_code = "";
        //$RANDOM_STRING_LENGTH = 30;
        //$character_set = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //$character_limit = strlen($character_set);
        //for ($i = 0; $i < $RANDOM_STRING_LENGTH; $i++) {
        //    $request_code .= $character_set[mt_rand(0, $character_limit-1)];
        //}

        // Prepared statement for checking if user exists.
        $stmt = $conn -> prepare('SELECT * FROM users WHERE email=?');
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $result = $stmt -> get_result();

        // Check if user exists, if not, register account.
        if ($result -> fetch_assoc()) {
            header('Location: ../../?error=ue');
            exit();
        }
        else {
            // Prepared statement to insert user into table.
            $stmt = $conn -> prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            $stmt -> bind_param("sss", $name, $email, $password_hash);
            $stmt -> execute();

            // Close prepared statement.
            $stmt -> close();
            $conn -> close();

            // Send Validation Email
            //$to = $email;
            //$subject = "Knights Conquest Account Validation";
            //$message = "
            //<html>
            //    <body>
            //        <h1>Knights Conquest</h1>
            //        <p style='font-size: 16px'>Click <a href='https://knightsconquest.com/validate?code=".$request_code."'>here</a> to validate your account now.</p>
            //        <br>
            //        <p>&copy; 2021-2022 Knights Conquest. All Rights Reserved.</p>
            //    </body>
            //</html>
            //";
            //$headers = "MIME-Version: 1.0" . "\r\n";
            //$headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
            //$headers .= 'From: "Knights Conquest" <no-reply@knightsconquest.com>' . "\r\n";
            //mail($to, $subject, $message, $headers);

            // Redirect on success.
            header('Location: ../../');
            exit();
        }
    }
    else {
        header('Location: ../../?error=nfs');
        exit();
    }
?>
