<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 28/11/2556
 * Time: 4:52 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("App.php");
if(!isset($_POST["email"], $_POST["password"])){
    header("location: index.php");
}

App::login($_POST["email"], $_POST["password"]);
header("location: index.php");