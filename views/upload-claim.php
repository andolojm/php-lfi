<?php if(isset($_POST['submission'])){
    $uploaddir = './collision-img/';
    $filename = basename($_FILES['photo']['name']);
    $uploadfile = $uploaddir . $filename;
    if (strpos($filename, 'jpg') !== false){
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) { ?>
            <p>Successssss</p>
        <?php } else { ?>
            <p>Errored, try again with less awful data</p>
        <?php }
    } else { ?>
        <p> LOL U TRYNA HACK </p>  
<?php }
} else { ?>
    <form enctype="multipart/form-data" method="POST">
        <input type="file" name="photo" />
        <input type="hidden" name="submission" value="1" />
        <input type="submit" value="submit" />
    </form>
<?php } ?>
