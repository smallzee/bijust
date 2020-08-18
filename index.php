<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/18/2020
 * Time: 12:08 PM
 */

$page_title = "Login";
require_once 'config/core.php';
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
                        <a href="<?= base_url(); ?>" class="active">Login</a>
                    </div>
                    <form method="post">
                        <?php flash(); ?>
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Login</button> <a href="<?= base_url("forget") ?>">Forget password?</a>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Don't have an account? </span><a href="#">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
