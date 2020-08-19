<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 10:54 AM
 */

require_once 'config/core.php';
unset($_SESSION['loggedin']);
unset($_SESSION[USER_SESSION_HOLDER]);
set_flash("You have logged out successfully","info");
redirect(base_url());
exit();