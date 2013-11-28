<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 28/11/2556
 * Time: 5:14 น.
 * To change this template use File | Settings | File Templates.
 */
include_once "App.php";
if(!App::isLogin()){
    header("location: index.php");
    exit();
}

$user = App::getUser();
$input = isset($_GET)? $_GET: null;

$error_message = null;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        App::db()->beginTransaction();
        if(!App::isLogin()){
            header("location: index.php");
            exit();
        }
        if(!isset($_FILES["excel_doc"]) || !file_exists($_FILES["excel_doc"]["tmp_name"])){
            throw new Exception("Can't found file upload");
        }
        $file = $_FILES["excel_doc"];
        $name = $file["name"];
        $explodeName = explode(".", $name);
        $ext = array_pop($explodeName);
        $allowed = array("xls", "xlsx");
        if(!in_array($ext, $allowed)){
            throw new Exception("File upload allowed only excel file(xls,xlsx)");
        }
        App::importDrug($file["tmp_name"], time().'.'.$ext, $user["iduser"]);
        header("location: index.php");
        App::db()->commit();
        exit();
    }
    catch (Exception $e) {
        App::db()->rollBack();;
        $error_message = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Drug Price</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link href="css/a.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a href="index.php">Search</a></li>
            <li class="active"><a href="upload.php">Upload</a></li>
            <?php if(App::isAdmin()){?>
                <li><a href="admin/index.php">Admin</a></li>
            <?php }?>
        </ul>

        <?php if(!App::isLogin()){?>
            <ul class="nav navbar-nav navbar-right navbar-collapse">
                <form class="navbar-form navbar-left" role="search" method="post" action="login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>
            </ul>
        <?php }else{?>
            <div class="pull-right" style="line-height: 50px;">
                <span style="font-size: 17px; padding: 0 10px;"><?php echo $user["first_name"]." ".$user["last_name"];?></span>
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
        <?php }?>
    </div><!-- /.navbar-collapse -->
</nav>
<div class="jumbotron">
    <div class="container" >
        <div class="text-center">
            ดาวโหลด ไฟล์ตาราง Excel ที่นี่ : <a href="demo.xlsx"> download</a>
        </div>
        <form class="form-inline text-center" role="form" method="post" enctype="multipart/form-data">
            <div class="clearfix"></div>
            <div class="form-group">
                <span class="" style="display: inline-block; font-size: 16px;">อัพโหลดตารางไฟล์</span>
                <input type="file" class="form-control" name="excel_doc" placeholder="Excel file" style="width: 200px;">
            </div>
            <button type="submit" class="btn btn-default">upload</button>
        </form>
        <?php if(!is_null($error_message)){?>
        <div class="alert alert-warning text-center"><?php echo $error_message;?></div>
        <?php }?>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
<script src="js/datatables.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

</script>
</body>
</html>