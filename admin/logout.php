<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 1:34 PM
 */

require_once '../config/core.php';
unset($_SESSION['admin-loggedin']);
unset($_SESSION[ADMIN_SESSION_HOLDER]);
set_flash("You have successfully logged out","info");
redirect(base_url('admin/login'));