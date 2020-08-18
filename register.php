<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/18/2020
 * Time: 12:22 PM
 */

$page_title = "Register";
require_once 'config/core.php';
$country_array = $city_array = array();
$country_sql = $db->query("SELECT * FROM ".DB_PREFIX."countries ORDER BY name");
while ($rs = $country_sql->fetch(PDO::FETCH_ASSOC)){
    $country_array[] = $rs;
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
                    <h3>Get more things done with <?= WEB_TITLE?> platform.</h3>
                    <p>All field(s) are required.</p>
                    <div class="page-links">
                        <a href="#" class="active"><?= $page_title ?></a>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show with-icon" role="alert">
                        Please fill the following form with your information

                    </div>
                    <form method="post">
                        <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label for="">First Name</label>
                                   <input type="text" name="fname" class="form-control" required placeholder="First Name" id="">
                               </div>
                           </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" class="form-control" required placeholder="Last Name" id="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" class="form-control" required placeholder="Email Address" id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select name="country" class="form-control" required id="country">
                                        <option value="" disabled selected>Select</option>
                                        <?php if (is_array($country_array)): ?>
                                            <?php foreach ($country_array as $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= ucwords($value['name']); ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <select name="city" class="form-control" readonly="" required id="city">
                                        <option value="" disabled selected>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-button">
                            <button id="submit" type="submit" name="add" class="ibtn">Register</button>                         </div>
                    </form>
                    <div class="other-links">
                        <span>Already have an account? </span><a href="<?= base_url() ?>">Login to continue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
