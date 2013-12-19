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
$history = App::getUploadHistory($user["iduser"]);
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
            <?php if(App::isLogin()){?>
                <li><a href="upload.php">Upload</a></li>
                <li class="active"><a href="upload_history.php">Upload History</a></li>
            <?php }?>
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
<div class="container" >
    <h4 class="text-center" style="padding: 20px;">Upload History</h4>
    <table class="table">
        <tr>
            <th class="text-center">เวลา</th>
            <th class="text-center">ไฟล์</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($history as $key =>$value){?>
        <tr>
            <td class="text-center"><?php $dateTime = new DateTime($value["created_at"]); echo $dateTime->format("H:i")." - ".$dateTime->format("j/n/Y");?></td>
            <td class="text-center"><a href="docs/<?php echo $value["filename"];?>">download</a></td>
            <td class="text-center delete-button"><a href="xls_delete.php?id=<?php echo $value["id"];?>">delete</a></td>
            <td class="text-center"><a href="history_data.php?id=<?php echo $value["id"];?>">ดูข้อมูล</a></td>
        </tr>
        <?php }?>
    </table>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
<script src="js/datatables.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(function(){
    $('.delete-button').click(function(e){
        if(!window.confirm("Are you sure for delete this data?")){
            e.preventDefault();
        }
    });
});
</script>
</body>
</html>