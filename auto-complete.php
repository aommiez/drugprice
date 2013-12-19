<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 13/12/2556
 * Time: 9:41 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("App.php");

$items = APP::auto_complete($_GET["field"], $_GET["query"]);
foreach($items as $key => $value){
    $suggestions[] = array("value"=> $value["a"], "data"=> $value["a"]);
}
$res = array("query"=>"Unit", "suggestions"=> $suggestions);
echo json_encode($res);