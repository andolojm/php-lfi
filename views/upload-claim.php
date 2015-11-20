<?php if(isset($_POST['submission'])){
    $uploaddir = './collision-img/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) { ?>
        <p>Successssss</p>
    <?php } else { ?>
        <p>Errored, try again with less awful data</p>
    <?php }
} else { ?>
    <form enctype="multipart/form-data" method="POST">
        <input type="file" name="photo" />
        <input type="hidden" name="submission" value="1" />
        <input type="submit" value="submit" />
    </form>
<?php } ?>
