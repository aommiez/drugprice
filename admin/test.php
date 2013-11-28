<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 27/11/2556
 * Time: 23:39 น.
 * To change this template use File | Settings | File Templates.
 */

include_once("../App.php");
$pdo = App::db();
$pdo->beginTransaction();
$st = $pdo->prepare("INSERT INTO hospital(hospital_name) VALUES('test')");
$st->execute();
$st->execute();
$st->execute();
$pdo->rollBack();