<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 7:13 AM
 */

$page_title = "Forget Password";
require_once 'config/core.php';
if (is_user_login() or user_details('status') == 1){
    redirect(MAIN_URL);
    exit();
}

if (isset($_POST['forget'])){
    $email = strtolower($_POST['email']);
    $sql = $db->prepare("SELECT * FROM ".DB_PREFIX."users WHERE email=:email");
    $num_row = $sql->rowCount();

    if ($num_row == 0){
        set_flash("Invalid email address entered","warning");
    }else{

        $rs = $sql->fetch(PDO::FETCH_ASSOC);

        $verification_code = substr(rand(1000,9999), 0, 4);

        $user_id = $rs['id'];
        $up = $db->query("UPDATE ".DB_PREFIX."users SET verify_code ='$verification_code' WHERE id ='$user_id'");

        $subject = "Verification Code";
        $msg_body = "<p>Dear ".ucwords($rs['fname'])."</p>";
        $msg_body.= "<p> Click the link ".base_url('reset/').$verification_code." confirm your changin of password</p>";
        $msg_body.= '<p style="text-align:right;">Best Regards <br> '.WEB_TITLE.' - Team </p>';

        send_mail($msg_body,$subject,$email);

        set_flash("Verification code has been sent to $email","warning");

    }
}
require_once 'libs/head.php';
?>

<div class="form-body">
    <div class="website-logo">
        <a href="<?= base_url(); ?>">
            <div class="logo">
                <img class="logo-size" src="<?= image_url("graphic5.svg") ?>" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="<?= image_url("graphic5.svg") ?>" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Get more things done with <?= WEB_TITLE ?> platform.</h3>
                    <p>Enter your credential to retrieve your password</p>
                    <div class="page-links">
                        <a href="#" class="active"><?= $page_title ?></a>
                    </div>
                    <form method="post">
                        <?php flash(); ?>
                        <input class="form-control" type="email" value="<?= @$_POST['email'] ?>" name="email" placeholder="E-mail Address" required>
                        <div class="form-button">
                            <button id="submit" type="submit" name="forget" class="ibtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php'?>
