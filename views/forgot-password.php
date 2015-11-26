<html>
<head>
</head>
<body>


<?php  // If the user has specified an email, show recovery questions.
if (isset($_POST['email'])) { ?>
    <form method="POST">
        <p>If you answer your security questions correctly, your password will be changed to your DOB in mmddyyyy format.</p>
        <input type="hidden" value="<?php echo($_POST['email']);?>" name="forgot-email" />
        <p>What is the name of your first pet?</p>
        <input type="text" name="q1" />
        <p>What is the make of your first car?</p>
        <input type="text" name="q2" />
        <p>What is the name of your first employer?</p>
        <input type="text" name="q3" />
        <input type="submit" value="submit" />
    </form>

<?php  // If the user has answered recovery questions, validate them
} else if(isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['forgot-email'])) {
    if ($_POST['q1'] == "Balvenie" && $_POST['q2'] == "Jeep" && $_POST['q3'] == "Olive Garden"){
        $hash = password_hash('11101994',PASSWORD_DEFAULT);
        $sql = "UPDATE users SET user_password_hash = '".$hash."' WHERE user_email = '".$_POST['forgot-email']."';";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($sql);
        header("Location: index.php?reset=true");
    } else {
        header("Location: forgot.php?error=true");
    } ?>

<?php  // If the user is just now rollin up to the page, prompt them for email
} else { ?>
    <form method="POST">
        <p>What is your email?</p>
        <input type="text" name="email" />
        <input type="submit" value="submit" />
    </form>
<?php } ?>


</body>
</html>
