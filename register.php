<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/18/2020
 * Time: 12:22 PM
 */

$page_title = "Register";
require_once 'config/core.php';
if (is_user_login() or user_details('status') == 1){
    redirect(MAIN_URL);
    exit();
}

$country_array = $state_array = array();

$country_sql = $db->query("SELECT * FROM ".DB_PREFIX."countries ORDER BY name");
while ($rs = $country_sql->fetch(PDO::FETCH_ASSOC)){
    $country_array[] = $rs;
}

$state_sql = $db->query("SELECT * FROM ".DB_PREFIX."states ORDER BY name");
while ($rs = $state_sql->fetch(PDO::FETCH_ASSOC)){
    $state_array[] = $rs;
}

if (isset($_POST['add'])){
    $email = strtolower($_POST['email']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $country_id = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $sponsor_code = substr(strtolower(md5(uniqid(rand(), true))), 0, 8);$referral_code2 = substr(strtoupper(md5(uniqid(rand(), true))), 0, 8);

    $sql = $db->query("SELECT * FROM ".DB_PREFIX."users WHERE email='$email'");
    $num_row = $sql->rowCount();

    if ($num_row >= 1){
        $error[] = "Your email address has already been used";
    }

    if ($password != $password2){
        $error[] = "Your password did not match confirm password";
    }

    if (!is_numeric($country_id)){
        $error[] = "Invalid country selected";
    }

    if (!is_numeric($city)){
        $error[] = "Invalid city selected";
    }

    if (strlen($fname) > 20 or strlen($fname) < 3 ){
        $error[] = "Invalid first name entered, it should be between 3 - 20 characters long";
    }

    if (strlen($lname) > 20 or strlen($lname) < 3 ){
        $error[] = "Invalid last name entered, it should be between 3 - 20 characters long";
    }

    if (strlen($password) < 6){
        $error[] = "Your password should be more than 6 characters";
    }

    $error_count = count($error);

    if ($error_count == 0){

        $pass = hash_password($password);
        $fname2 = $fname." ".$lname;

        $in = $db->prepare("INSERT INTO ".DB_PREFIX."users (email,password,fname,country_id,city_id,address,sponsor_code)
        VALUES(:email,:password,:fname,:country_id,:city_id,:address,:sponsor_code)");

        $in->execute(array(
            'email'=>$email,
            'password'=>$pass,
            'fname'=>$fname2,
            'country_id'=>$country_id,
            'city_id'=>$city,
            'address'=>$address,
            'sponsor_code'=>$sponsor_code
        ));

        $subject = "Account Details";
        $msg_body = "<p>Dear ".ucwords($fname2)."</p>";
        $msg_body.= "<p> Your account details are stated below! </p>";

        $msg_body.="<ol>".
                "<li> Full Name : ".$fname2."</li>".
                "<li> Email Address : ".$email."</li>".
                "<li> Password : ".$password."</li>".
                "<li> Country : ".get_country($country_id,'name')."</li>".
                "<li> City : ".get_city($city,'name')."</li>".
                "<li> Address : ".$address."</li>".
                "<li> Account status : Active</li>"
            ."</ol>";
        $msg_body.='<p>Thanks for creating account with us </p>';
        $msg_body.= '<p style="text-align:right;">Best Regards <br> '.WEB_TITLE.' - Team </p>';

        send_mail($msg_body,$subject,$email);
        set_flash("Account created successfully, please login to continue","info");

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
                <img src="<?= image_url("graphic1.svg") ?>"  alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Get more things done with <?= WEB_TITLE?> platform.</h3>
                    <div class="page-links">
                        <a href="#" class="active"><?= $page_title ?></a>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show with-icon" role="alert">
                        Please fill the following form with your information
                    </div>
                    <form method="post">

                        <?php flash(); ?>
                        <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label for="">First Name </label>
                                   <input type="text" name="fname" value="<?= @$_POST['fname']; ?>" class="form-control" required placeholder="First Name" id="">
                               </div>
                           </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" value="<?= @$_POST['lname']; ?>" class="form-control" required placeholder="Last Name" id="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" value="<?= @$_POST['email']; ?>" class="form-control" required placeholder="Email Address" id="">
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
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" required style="resize: none; height: 70px;" placeholder="Address">value="<?= @$_POST['address']; ?>"</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" required placeholder="Password" id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password2" class="form-control" required placeholder="Confirm Password" id="">
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
