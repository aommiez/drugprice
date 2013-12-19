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
$drugs = App::getHistoryData($_GET["id"]);
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
    <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
        <thead>
        <tr>
            <th>วัน เดือน ปี</th>
            <th>ชื่อยา</th>
            <th>ขนาด</th>
            <th>ราคา/หน่วย</th>
            <th>ขนาดบรรจุ</th>
            <th>ปริมาณ</th>
            <th>ราคาสุทธิ</th>
            <th>โรงพยาบาล</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($drugs as $key=> $value){?>
            <tr>
                <td><?php $dateTime = new DateTime($value["dt1"]); echo $dateTime->format("d/m/Y");?></td>
                <td><?php echo $value["NAME"];?></td>
                <td><?php echo $value["CONTENT"];?></td>
                <td class="price-field"><?php echo $value["price"];?></td>
                <td><?php echo $value["pack"];?></td>
                <td><?php echo $value["qty"];?></td>
                <td><?php echo $value["total_money"];?></td>
                <td><?php echo App::getHospitalName($value["hospitalId"]);?></td>
            </tr>
        <?php }?>
    </table>
    <div class="text-center" style="padding: 20px;">
        <a href="upload_history.php">back</a>
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