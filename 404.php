<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 7:13 AM
 */

$page_title = "404";
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
                    <img src="<?= image_url('404-error.png') ?>" style="width: 100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php'?>
