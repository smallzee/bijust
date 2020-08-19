<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 11:38 AM
 */

$page_title = "Admin Login";
require_once '../config/core.php';
if (is_admin_login() or admin_details('status') == 1){
    redirect(base_url('admin/dashboard'));
    return;
}
if (isset($_POST['login'])){
    $email = strtolower($_POST['email']);
    $password = hash_password($_POST['password']);

    $sql = $db->prepare("SELECT * FROM ".DB_PREFIX."users WHERE email=:email and password=:password");
    $sql->execute(array(
        'email'=>$email,
        'password'=>$password
    ));

    $num_row = $sql->rowCount();

    $rs = $sql->fetch(PDO::FETCH_ASSOC);

    if ($num_row == 0){
        set_flash("Invalid login details", "warning");
    }elseif ($rs['status'] == 0){
        set_flash("Unable to logged in","warning");
    }elseif ($rs['role'] == 1){
        set_flash("Access denied","warning");
    }else{
        $_SESSION['admin-loggedin'] = true;
        $_SESSION[ADMIN_SESSION_HOLDER] = $rs;
        redirect(base_url('admin/dashboard'));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= page_title(@$page_title) . " - ".WEB_TITLE ?></title>
    <link rel="stylesheet" type="text/css" href="<?= CSS_FOLDER_TEMPLATE ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= CSS_FOLDER_TEMPLATE ?>fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= CSS_FOLDER_TEMPLATE ?>iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= CSS_FOLDER_TEMPLATE ?>iofrm-theme22.css">
</head>
<body>
<div class="form-body without-side">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="<?= image_url('graphic3.svg') ?>" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Login to account</h3>
                    <p>Enter your credential to get access.</p>
                    <?php flash(); ?>
                    <form method="post">
                        <input class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" name="login" class="ibtn">Login</button> <a href="#">Forget password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= JS_FOLDER_TEMPLATE ?>jquery.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>popper.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>bootstrap.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>main.js"></script>
</body>
</html>
