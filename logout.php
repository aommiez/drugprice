<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 28/11/2556
 * Time: 5:00 น.
 * To change this template use File | Settings | File Templates.
 */
include_once("App.php");
App::logout();
header("location: index.php");
?>