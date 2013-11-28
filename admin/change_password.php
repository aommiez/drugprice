<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P2DC
 * Date: 29/11/2556
 * Time: 6:30 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}

App::changePassword($_GET["id"], $_POST["password"]);
header("location: index.php#userList");
exit();