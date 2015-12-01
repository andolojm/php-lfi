<body>
<div class="container">
    <div class="masthead">
        <h3><code>root@Sudo_Auto_Insurance $</code></h3>
        <nav>
            <ul class="nav nav-justified">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="upload.php">Submit a Claim</a></li>
                <li><?php
                    if ($login->isUserLoggedIn() == true) {
                        include("views/logged_in.php");
                    } else {
                        include("views/not_logged_in.php");
                    }
                ?></li>
            </ul>
        </nav>
    </div>
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
    <div class="jumbotron">
        <h1>Welcome to Sudo Auto</h1>
        <p class="lead">Just two hours on hold can save you $<?php echo rand();?></p>
        <p class="lead">Satisfied? Tweet us at #SudoAutoInsurance.</p>
        <p class="lead">Not Satisfied? <code>rm -rf / --no-preserve-root</code></p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">I LIKE WHAT I SEE, TELL ME MORE</a></p>
    </div>

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
                    <label for="user_name">Email</label>
                    <input id="login_input_username" placeholder="Email" class="login_input form-control" type="text" name="user_name" required />
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
