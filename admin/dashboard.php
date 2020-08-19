<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 12:08 PM
 */

$page_title = "Dashboard";
require_once '../config/core.php';
require_once 'libs/head.php';
?>

<!-- START Page content-->
<section class="main-content">
    <h3><?= $page_title ?></h3>
    <div class="row">
        <!-- START dashboard main content-->
        <div class="col-md-12">
            <!-- START summary widgets-->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <!-- START widget-->
                    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget">
                        <div class="panel-body bg-primary">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">All <?= WEB_TITLE ?> Users</p>
                                    <h3 class="m0">
                                        <?php
                                            $sql = $db->query("SELECT * FROM ".DB_PREFIX."users WHERE role_id=1");
                                            echo $sql->rowCount();
                                        ?>
                                    </h3>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <em class="fa fa-user fa-2x"><sup class="fa fa-users"></sup>
                                    </em>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Bar chart-->
                            <div class="text-center">
                                <div data-bar-color="primary" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">5,3,4,6,5,9,4,4,10,5,9,6,4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- START widget-->
                    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="500" class="panel widget">
                        <div class="panel-body bg-warning">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">All Admins</p>
                                    <h3 class="m0">
                                        <?php
                                        $sql = $db->query("SELECT * FROM ".DB_PREFIX."users WHERE role_id>1");
                                        echo $sql->rowCount();
                                        ?>
                                    </h3>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <em class="fa fa-users fa-2x"></em>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Bar chart-->
                            <div class="text-center">
                                <div data-bar-color="warning" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">10,30,40,70,50,90,70,50,90,40,40,60,40</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- START widget-->
                    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1000" class="panel widget">
                        <div class="panel-body bg-danger">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">Searchs</p>
                                    <h3 class="m0">50%</h3>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <em class="fa fa-search fa-2x"></em>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Bar chart-->
                            <div class="text-center">
                                <div data-bar-color="danger" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">2,7,5,9,4,2,7,5,7,5,9,6,4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <!-- START widget-->
                    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1500" class="panel widget">
                        <div class="panel-body bg-success">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">Traffic</p>
                                    <h3 class="m0">120 kb</h3>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <em class="fa fa-globe fa-2x"></em>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Bar chart-->
                            <div class="text-center">
                                <div data-bar-color="success" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">4,7,5,9,6,4,8,6,3,4,7,5,9</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END summary widgets-->
        </div>
    </div>
</section>
<!-- END Page content-->

<!-- END Main section-->

<?php require_once 'libs/foot.php';?>
