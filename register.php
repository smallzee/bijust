<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/18/2020
 * Time: 12:22 PM
 */

$page_title = "Register";
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
                    <h3>Get more things done with Loggin platform.</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <div class="page-links">
                        <a href="<?= base_url(); ?>" class="active">Login</a><a href="<?= base_url("register"); ?>">Register</a>
                    </div>
                    <form>
                        <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget4.html">Forget password?</a>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
