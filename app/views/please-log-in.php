<p>This feature is intended for customers. Please <a href="javascript:void(0);" data-toggle="modal" data-target="#loginmodal">Log in.</a>
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
