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
        <input type="text" name="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control" required>
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
        <label for="remember-me">Remember me</label>
      </div>

      <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>

    </form>
</body>

</html>
