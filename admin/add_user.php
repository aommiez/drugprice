<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 28/11/2556
 * Time: 6:07 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}

if(!App::addUser($_POST)){

}
header("location: index.php");
exit();