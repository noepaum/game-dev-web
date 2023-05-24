<?php

require_once('functions.php');

if (isset($_POST["send"])) {
    $bdd = connect();
    $sql = "SELECT * FROM users WHERE `email` = :email;";
    
    $sth = $bdd->prepare($sql);
    
    $sth->execute([
        'email'     => $_POST['email']
    ]);

    $user = $sth->fetch();
    
    if ($user && password_verify($_POST['password'], $user['password']) ) {
        // dd($user);
        $_SESSION['user'] = $user;
        header('Location: persos.php');
    } else {
        $msg = "Email ou mot de passe incorrect !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Login</h2>
                    <?php if (isset($msg)) { echo "<div>" . $msg . "</div>"; } ?>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>
                    </div>
                    <button name="send">Log in</button>
                    <div class="register">
                        <p>Don't have an account <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

