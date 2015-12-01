<body>
<div class="container">
    <div class="masthead">
        <h3><code>root@Sudo_Auto_Insurance $</code></h3>
        <nav>
            <ul class="nav nav-justified">
                <li><a href="index.php">Home</a></li>
                <li><a href="upload.php">Submit a Claim</a></li>
                <li class="active"><?php include("views/not_logged_in.php"); ?></li>
            </ul>
        </nav>
    </div>
    <br />

    <?php  // If the user has specified an email, show recovery questions.
    if (isset($_POST['email'])) { ?>
        <form method="POST">
            <p>If you answer your security questions correctly, your password will be changed to your Date of Birth in mmddyyyy format.</p>
            <input type="hidden" value="<?php echo(sanitize_html_string($_POST['email']))?>" name="forgot-email" />
            <table><tr>
                <td><label>What is the name of your first pet?</label></td>
                <td><input type="text" class="form-control" autofocus name="q1" /></td>
            </tr><tr>
                <td><label>What is the make of your first car?</label></td>
                <td><input type="text" class="form-control" name="q2" /></td>
            </tr><tr>
                <td><label>What is the name of your first employer?</label></td>
                <td><input type="text" class="form-control" name="q3" /></td>
            </tr></table>
            <button class="btn btn-info">Submit</button>
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
        <p>To recover your password, you will need to enter your email and answer the security questions you set when you made your account.</p>
        <br />
        <form method="POST" class="form-inline">
            <div class="form-group">
                <label for="email">Account Email Address</label>
                <input type="text" name="email" class="form-control" autofocus />
            </div>
                <button class="btn btn-info">Submit</button>
        </form>
    <?php } ?>

</div>
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form method="POST" action="index.php" name="loginform">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Log in to Sudo Auto</h4>
                </div>
                <div class="modal-body">
                    <label for="user_name">Username</label>
                    <input id="login_input_username" placeholder="Username" class="login_input form-control" type="text" name="user_name" required />
                    <br />
                    <label for="user_password">Password</label>
                    <input id="login_input_password" placeholder="Password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required />
                    <input id="login" placeholder="login" class="hidden" type="hidden" name="login" autocomplete="off" required />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info">Log in</button>
                    <button class="btn btn-primary" type="button" onclick="document.location='forgot.php'">I forgot my password</a>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>

<?php

// sanitize a string for HTML (make sure nothing gets interpreted!)
function sanitize_html_string($string)
{
  $pattern[0] = '/\&/';
  $pattern[1] = '/</';
  $pattern[2] = "/>/";
  $pattern[3] = '/\n/';
  $pattern[4] = '/"/';
  $pattern[5] = "/'/";
  $pattern[6] = "/%/";
  $pattern[7] = '/\(/';
  $pattern[8] = '/\)/';
  $pattern[9] = '/\+/';
  $pattern[10] = '/-/';
  $replacement[0] = '&amp;';
  $replacement[1] = '&lt;';
  $replacement[2] = '&gt;';
  $replacement[3] = '<br>';
  $replacement[4] = '&quot;';
  $replacement[5] = '&#39;';
  $replacement[6] = '&#37;';
  $replacement[7] = '&#40;';
  $replacement[8] = '&#41;';
  $replacement[9] = '&#43;';
  $replacement[10] = '&#45;';
  return preg_replace($pattern, $replacement, $string);
}
