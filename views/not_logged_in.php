<body>

<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="container">
    <div class="masthead">
        <h3 class="text-muted">Sudo Auto Insurance</h3>
        <nav>
            <ul class="nav nav-justified">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Submit a Claim</a></li>
                <li>
                    <form method="post" action="index.php" name="loginform">
                        <input id="login_input_username" size="9" placeholder="Username" class="login_input" type="text" name="user_name" required />
                        <input id="login_input_password" size="9" placeholder="Password" class="login_input" type="password" name="user_password" autocomplete="off" required />
                        <input type="submit"  name="login" value="Log in" />
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- login form box -->
        <a href="register.php">Register new account ADMINS ONLY PLS</a>
    <a href="forgot.php">I'm a dick, and forgot my password</a>
</div>
</body>
</html>
