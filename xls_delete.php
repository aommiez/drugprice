<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 16/12/2556
 * Time: 5:23 น.
 * To change this template use File | Settings | File Templates.
 */

include_once "App.php";
if(!App::isLogin()){
    header("location: index.php");
    exit();
}
try {
    App::db()->beginTransaction();
    App::deleteHistoryData($_GET["id"]);
    App::db()->commit();
    header("location: upload_history.php");
}
catch (Exception $e) {
    App::db()->rollback();
    header("location: upload_history.php");
}
?>