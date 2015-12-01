<body>
<div class="container">
    <div class="masthead">
        <h3><code>root@Sudo_Auto_Insurance $</code></h3>
        <nav>
            <ul class="nav nav-justified">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="upload.php">Submit a Claim</a></li>
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
    <br />

    <?php if ($login->isUserLoggedIn() == false) {
        include("views/please-log-in.php");
    } else {

        if(isset($_POST['submission'])){
            $uploaddir = './collision-img/';
            $filename = basename($_FILES['photo']['name']);
            $uploadfile = $uploaddir . $filename;
            if (strpos($filename, 'jpg') == true || strpos($filename, 'png') == true){
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) { ?>
                    <p>Claim recieved. Thank you for your time. An agent should be with you shortly.</p>
                <?php } else {
                    header('Location: upload.php?error=true&tell_CTF_admins=true&this=should_not_happen_ever');
                }
            } else {
                header('Location: upload.php?hack=detected');
            }
        } else { ?>
            <p>Car accident? Let us know what happened, and an agent will get into contact with you eventually.</p>
            <form enctype="multipart/form-data" method="POST" class="form-inline" id="submissionForm">
                <table><tr>
                    <td><label>Accident Description</label></td>
                    <td><textarea class="form-control" name="description"></textarea></td>
                </tr><tr>
                    <td><label>Accident Photo</label></td>
                    <td><input type="file" id="userfile" name="photo" class="form-control" />
                        <input type="hidden" name="submission" value="1" /></td>
                </tr></table>

                <button class="btn btn-info">Submit</button>
            </form>
    <?php }
    }
    ?>
