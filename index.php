<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/18/2020
 * Time: 12:08 PM
 */

$page_title = "Login";
require_once 'config/core.php';
if (isset($_POST['login'])){
    $email = strtolower($_POST['email']);
    $password = hash_password($_POST['password']);

    $sql = $db->prepare("SELECT * FROM ".DB_PREFIX."users WHERE email=:email and password=:password");

    $sql->execute(array(
        'email'=>$email,
        'password'=>$password
    ));

    $num_row = $sql->rowCount();

    if ($num_row == 0){
        set_flash("Invalid login details","warning");
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
                    <p>Enter your credential to get access</p>
                    <div class="page-links">
                        <a href="#" class="active"><?= $page_title ?></a>
                    </div>
                    <form method="post">
                        <?php flash(); ?>
                        <input class="form-control" type="email" value="<?= @$_POST['email'] ?>" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" name="login" class="ibtn">Login</button> <a href="<?= base_url("forget") ?>">Forget password?</a>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Don't have an account? </span><a href="<?= base_url("register") ?>">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
