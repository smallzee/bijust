<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 11:09 AM
 */

$page_title = "Change Password";
require_once 'config/core.php';
if (isset($_GET['r'])){
    $code = $_GET['r'];

    if ($code == 1){
        redirect(base_url('forget'));
        return;
    }

    $sql = $db->prepare("SELECT * FROM ".DB_PREFIX."users WHERE verify_code=:code");
    $sql->execute(array(
        'code'=>$code
    ));

    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    $user_id = $rs['id'];

    if ($sql->rowCount() == 0){
        set_flash("Unable to verify your request","warning");
        redirect(base_url('forget'));
        return;
    }

}else{
    redirect(base_url('forget'));
}


if (isset($_POST['forget'])){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (strlen($password) < 6){
        $error[] = "Your password should be more than 6 characters";
    }

    if ($password != $password2){
        $error[] = "Your password did not match confirm password";
    }

    $error_count = count($error);
    if ($error_count == 0){

        $pass = hash_password($password);
        $up = $db->query("UPDATE ".DB_PREFIX."users SET password='$pass', verify_code='1' WHERE id ='$user_id'");

        set_flash("Your password has been changed successfully, please login to continue","info");
        redirect(base_url());

    }else{
        $err_msg = $error_count == 1 ? "An error occurred, please check and try again\n" :
            "Some errors occurred, please check and try again\n";
        foreach ($error as $value){
            $err_msg.='<p>'.$value.'</p>';
        }
        set_flash($err_msg,'warning');
    }
}
require_once 'libs/head.php';
?>

<div class="form-body">
    <div class="website-logo">
        <a href="<?= base_url(); ?>">
            <div class="logo">
                <img class="logo-size" src="<?= image_url("graphic1.svg") ?>" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="<?= image_url("graphic1.svg") ?>" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Get more things done with <?= WEB_TITLE ?> platform.</h3>
                    <p>Enter your new password</p>
                    <div class="page-links">
                        <a href="#" class="active"><?= $page_title ?></a>
                    </div>
                    <form method="post">
                        <?php flash(); ?>
                        <input class="form-control" type="password" name="password" placeholder="New Password" required>
                        <input class="form-control" type="password" name="password2" placeholder="Confirm New Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" name="forget" class="ibtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
