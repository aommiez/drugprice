<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 28/11/2556
 * Time: 6:20 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}

App::updateHospital($_GET["id"], $_POST);
header("location: index.php#hospital");
exit();