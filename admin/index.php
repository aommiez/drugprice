<?php
include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}

$user = App::getUser();
$users = App::users();
$hospitals = App::hospitals();
?>
<!DOCTYPE html><html lang="en"><head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">window.alert = function(){}</script>
</head>
<body style="">
<div class="well">
    <div class="pull-right" style="line-height: 30px;">
        <span style="font-size: 17px; padding: 0 10px;"><?php echo $user["first_name"]." ".$user["last_name"];?></span>
        <a href="../logout.php" class="btn btn-primary">Logout</a>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Add User</a></li>
        <li class=""><a href="#addHostpital" data-toggle="tab">Add Hospital</a></li>
        <li class=""><a href="#userList" data-toggle="tab">User List</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="home">
            <form id="tab" action="add_user.php" method="post">
                <label>First Name</label>
                <input type="text" name="first_name" class="input-xlarge">
                <label>Last Name</label>
                <input type="text" name="last_name" class="input-xlarge">
                <label>Email</label>
                <input type="text" name="email" class="input-xlarge">
                <label>Password</label>
                <input type="password" name="password" class="input-xlarge">

                <label>Hostpital</label>
                <select name="hospitalId" id="DropDownTimezone" class="input-xlarge">
                    <?php foreach($hospitals as $key =>$value){?>
                    <option value="<?php echo $value["idhospital"];?>"><?php echo $value["hospital_name"];?></option>
                    <?php }?>
                </select>
                <div>
                    <button class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="addHostpital">
            <form id="tab2" action="add_hospital.php" method="post">
                <label>Add Hostpital</label>
                <input type="text" name="hospital_name" class="input-xlarge">
                <div><br>
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
            <ul>
                <?php foreach($hospitals as $key =>$value){?>
                    <li><?php echo $value["hospital_name"];?></li>
                <?php }?>
            </ul>
        </div>
        <div class="tab-pane" id="userList">
            <ul>
                <?php foreach($users as $key =>$value){?>
                <li><?php echo $value["first_name"]." ".$value["last_name"];?></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div></body></html>