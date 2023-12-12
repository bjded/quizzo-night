<?php
    session_start();

    // Temp Manual Holds
    $_SESSION['account_type'] = "host";

    if (!isset($_SESSION['id'])) {
        header("Location: /");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quizzo Night | Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar-wrapper">
        <div class="navbar-container">
            <a href="#" class="navbar-logo"><img src="img/quizzo-night-color.svg" alt="Quizzo Night Logo"></a>
            <ul class="navbar-links">
                <li><a href="#"><span class="material-symbols-outlined">home</span>Home</a></li>
                <li><a href="#"><span class="material-symbols-outlined">account_circle</span>Account</a></li>
            </ul>
            <ul class="navbar-account">
                <div class="account">
                    <p><?= $_SESSION ? $_SESSION['name'] : 'Long Username'; ?></p>
                    <p><?= $_SESSION ? $_SESSION['account_type'] : 'Player'; ?></p>
                </div>
                <div class="divider"></div>
                <li><a href="#"><span class="material-symbols-outlined">notifications</span></a></li>
                <li><a href="php/inc/signout.inc.php"><span class="material-symbols-outlined">logout</span></a></li>
            </ul>
        </div>
    </nav>

    <div class="qn-wrapper">
        <div class="qn-container">
            <?php if ($_SESSION['account_type'] === 'player') : ?>
                <h2>Let's get you in a game.</h2>
                <form action="" method="">
                    <div class="form-group">
                        <input type="text" name="joingame_code" id="joingame_code" placeholder="Game Code" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="joingame_team_name" id="joingame_team_name" placeholder="Team Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="joingame_number_of_players" id="joingame_number_of_players" placeholder="Number of Players on Team" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Join Game" class="btn" name="joingame_submit">
                    </div>
                </form>
            <?php elseif ($_SESSION['account_type'] === 'host') : ?>
                <h2>Ready to host a game?</h2>
                <a href="#" class="btn">Start Game</a>
            <?php else : ?>
                <h2>There is no current session.</h2>
            <?php endif; ?>
        </div>
    </div>

    <!-- 
    <span class="material-symbols-outlined">leaderboard</span>
    <span class="material-symbols-outlined">close</span>
    <span class="material-symbols-outlined">check</span>
    <span class="material-symbols-outlined">add</span>
    <span class="material-symbols-outlined">remove</span> -->

    <!-- JavaScript -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>
