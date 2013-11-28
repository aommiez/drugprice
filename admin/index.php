<?php
include_once("../App.php");
if(!App::isAdmin()){
    header("location: ../index.php");
}

$user = App::getUser();
$users = App::filterDeleted(App::users());
$hospitals = App::filterDeleted(App::hospitals());
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
    <script type="text/javascript">//window.alert = function(){}</script>
</head>
<body style="">
<div class="well">
    <div class="pull-right" style="line-height: 30px;">
        <span style="font-size: 17px; padding: 0 10px;"><?php echo $user["first_name"]." ".$user["last_name"];?></span>
        <a href="../index.php" class="btn btn-primary">Back to Home</a>
        <a href="../logout.php" class="btn btn-primary">Logout</a>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Add User</a></li>
        <li class=""><a href="#hospital" data-toggle="tab">Add Hospital</a></li>
        <li class=""><a href="#userList" data-toggle="tab">User List</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="home">
            <form id="tab" action="add_user.php" method="post">
                <h4>Add User</h4>
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
        <div class="tab-pane" id="hospital">
            <form id="tab2" action="add_hospital.php" method="post">
                <h4>Add Hostpital</h4>
                <div class="form-group">
                    <input type="text" name="hospital_name" class="input-xlarge">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Add</button>
                </div>
            </form>
            <form id="edit-hospital-form" action="edit_hospital.php" method="post" style="display: none;">
                <h4>Edit Hostpital</h4>
                <div class="form-group">
                    <input type="text" name="hospital_name" class="input-xlarge">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Edit</button>
                </div>
            </form>
            <table class="table table-hospital">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
                <?php foreach($hospitals as $key =>$value){?>
                <tr class="row-hospital" idhospital="<?php echo $value["idhospital"];?>">
                    <td><?php echo $value["idhospital"];?></td>
                    <td class="field-name"><?php echo $value["hospital_name"];?></td>
                    <td class="text-center"><a class="edit-button" href=""><i class="icon-edit"></i></a></td>
                    <td class="text-center"><a class="remove-button" href="delete_hospital.php?id=<?php echo $value["idhospital"];?>"><i class="icon-remove"></i></a></td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div class="tab-pane" id="userList">
            <div style="min-height: 30px;">
                <form id="edit-user-form" action="edit_user.php" method="post" style="display: none;">
                    <h4>Edit User</h4>
                    <label>First Name</label>
                    <input type="text" name="first_name" class="input-xlarge">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="input-xlarge">
                    <label>Email</label>
                    <input type="text" name="email" class="input-xlarge">
                    <label>Hostpital</label>
                    <select name="hospitalId" class="input-xlarge">
                        <?php foreach($hospitals as $key =>$value){?>
                            <option value="<?php echo $value["idhospital"];?>"><?php echo $value["hospital_name"];?></option>
                        <?php }?>
                    </select>
                    <div>
                        <button class="btn btn-primary">Edit User</button>
                    </div>
                </form>
                <form id="change-password-form" action="change_password.php" method="post" style="display: none;">
                    <h4>Change password</h4>
                    <div class="form-group">
                        <input type="text" name="password" class="input-xlarge">
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Change</button>
                    </div>
                </form>
            </div>
            <table class="table table-hospital">
                <tr>
                    <th>id</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>email</th>
                    <th>hospital</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
                <?php foreach($users as $key =>$value){?>
                    <tr class="row-user" iduser="<?php echo $value["iduser"];?>">
                        <td><?php echo $value["iduser"];?></td>
                        <td class="field-first_name"><?php echo $value["first_name"];?></td>
                        <td class="field-last_name"><?php echo $value["last_name"];?></td>
                        <td class="field-email"><?php echo $value["email"];?></td>
                        <td class="field-hospitalId" hospitalId="<?php echo $value["hospitalId"];?>"><?php echo App::getHospitalName($value["hospitalId"]);?></td>
                        <td class="text-center"><a class="btn btn-default change-password-button" href="">change password</a></td>
                        <td class="text-center"><?php if($value["iduser"]!=1){?><a class="edit-button" href=""><i class="icon-edit"></i></a><?php }?></td>
                        <td class="text-center"><?php if($value["iduser"]!=1){?><a class="remove-button" href="delete_user.php?id=<?php echo $value["iduser"];?>"><i class="icon-remove"></i></a><?php }?></td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    if(window.location.hash=="#home"){
        $("a[href=\"#home\"]").click();
    }
    if(window.location.hash=="#hospital"){
        $("a[href=\"#hospital\"]").click();
    }
    if(window.location.hash=="#userList"){
        $("a[href=\"#userList\"]").click();
    }
    $(".nav.nav-tabs a").click(function(){
        window.location.replace($(this).attr("href"));
    });
});

//hospital script
$(function(){
    $('.row-hospital .edit-button').click(function(e){
        e.preventDefault();
        var form = $('#edit-hospital-form');
        var row = $(this).closest(".row-hospital");
        var id = row.attr("idhospital");
        var name = $('.field-name', row).text();
        form.attr("action", "edit_hospital.php?id="+id);
        $('h4', form).text("Edit Hostpital id #"+id);
        $('input[name="hospital_name"]', form).val(name);
        form.slideDown();
    });
    $('.row-hospital .remove-button').click(function(e){
        if(!window.confirm("Are you sure?")){
            e.preventDefault();
        }
    });
});


//user script
$(function(){
    $('.row-user .change-password-button').click(function(e){
        e.preventDefault();
        var form = $('#change-password-form');
        var row = $(this).closest(".row-user");
        var id = row.attr("iduser");

        form.attr("action", "change_password.php?id="+id);
        $('h4', form).text("Change Password User id #"+id);
        $('input[name="password"]', form).val("");
        form.slideDown();
    });

    $('.row-user .edit-button').click(function(e){
        e.preventDefault();
        var form = $('#edit-user-form');
        var row = $(this).closest(".row-user");
        var id = row.attr("iduser");
        var first_name = $('.field-first_name', row).text();
        var last_name = $('.field-last_name', row).text();
        var email = $('.field-email', row).text();
        var hospitalId = $('.field-hospitalId', row).attr("hospitalId");

        form.attr("action", "edit_user.php?id="+id);
        $('h4', form).text("Edit User id #"+id);
        $('input[name="first_name"]', form).val(first_name);
        $('input[name="last_name"]', form).val(last_name);
        $('input[name="email"]', form).val(email);
        $('select[name="hospitalId"]', form).val(hospitalId);
        form.slideDown();
    });
    $('.row-hospital .remove-button').click(function(e){
        if(!window.confirm("Are you sure?")){
            e.preventDefault();
        }
    });
});
</script>
</body>
</html>