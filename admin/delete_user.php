<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P2DC
 * Date: 29/11/2556
 * Time: 3:47 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}
App::deleteUser($_GET["id"]);
header("location: index.php#userList");
exit();