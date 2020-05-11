<?php
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>
    <div class="header">
        <h2>Login</h2>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<p class="bg-danger text-white"> ' . $_SESSION['status'] . ' <p>';
            unset($_SESSION['status']);
        }
        ?>
    </div>
    <form action="login.php" method="post">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>

    </form>
</body>

</html>