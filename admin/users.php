<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 8/19/2020
 * Time: 1:09 PM
 */
$page_title = "Registered Users";
require_once '../config/core.php';
require_once 'libs/head.php';
?>

<section class="main-content">
    <h3><?= $page_title ?></h3>
    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-info">
                <div class="panel-heading"><?= $page_title ?>
                    <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                        <em class="fa fa-minus"></em>
                    </a></div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Account Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Account Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $ii =1;
                                $sql = $db->query("SELECT u.*, c.name as country, s.name as city  FROM ".DB_PREFIX."users as u
                                 INNER JOIN ".DB_PREFIX."countries as c INNER JOIN ".DB_PREFIX."states as s 
                                 ON u.country_id = c.id and u.city_id = s.id
                                 WHERE u.role_id =1 ORDER BY u.id DESC");
                                while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?= $ii++ ?></td>
                                        <td><?= $rs['fname'] ?></td>
                                        <td><?= $rs['email'] ?></td>
                                        <td><?= $rs['country'] ?></td>
                                        <td><?= $rs['city'] ?></td>
                                        <td><?= $rs['address'] ?></td>
                                        <td><?= status($rs['status']); ?></td>
                                        <td><?= $rs['created_at'] ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                 </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
</section>

<?php require_once 'libs/foot.php';?>
